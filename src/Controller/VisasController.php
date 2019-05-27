<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Visas Controller
 *
 * @property \App\Model\Table\VisasTable $Visas
 *
 * @method \App\Model\Entity\Visa[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class VisasController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        if ($this->request->is('post')) {
            if (!empty($this->request->getData('name'))) {
                $visa_name = $this->request->getData('name');
                $limit = 1000;
            } else {
                $visa_name = '';
                $limit = 10;
            }
        } else {
            $visa_name = '';
            $limit = 10;
        }
        $this->paginate = [
            'conditions' => array(
                'name LIKE' => '%' . $visa_name . '%'
            ),
            'limit' => $limit,
            'order' => [
                'name' => 'asc'
            ]
        ];
        $this->set('visas', $this->paginate($this->Visas));
        $this->set('_serialize', ['visas']);
    }

    /**
     * View method
     *
     * @param string|null $id Visa id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $visa = $this->Visas->get($id, [
            'contain' => []
        ]);

        $this->set('visa', $visa);
        $this->set('_serialize', ['visa']);

    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $visa = $this->Visas->newEntity();
        if ($this->request->is('post')) {
            $visa = $this->Visas->patchEntity($visa, $this->request->getData());
            $visa['created_by'] = $this->Auth->user('id');
            if ($this->Visas->save($visa)) {
                $this->Flash->success(__('The visa has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The visa could not be saved. Please, try again.'));
        }
        $this->set(compact('visa'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Visa id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $visa = $this->Visas->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $visa = $this->Visas->patchEntity($visa, $this->request->getData());
            $visa['modified_by'] = $this->Auth->user('id');
            if ($this->Visas->save($visa)) {
                $this->Flash->success(__('The visa has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The visa could not be saved. Please, try again.'));
        }
        $this->set(compact('visa'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Visa id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    /*public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $visa = $this->Visas->get($id);
        if ($this->Visas->delete($visa)) {
            $this->Flash->success(__('The visa has been deleted.'));
        } else {
            $this->Flash->error(__('The visa could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    } */
    public function checkVisaName($id = null) {
        $visa_name = $this->request->getData('name');
        if ($id != '') {
            $visaName = $this->Visas->find('all')->select(['name'])->where(['name' => $visa_name, 'NOT' => array('id' => $id)]);
        } else {
            $visaName = $this->Visas->find('all')->select(['name'])->where(['name' => $visa_name]);
        }
        $visaArr = $visaName->toArray();
        if (count($visaArr) > 0) {
            $dataArr['success'] = 'true';
        } else {
            $dataArr['success'] = 'false';
        }
        echo json_encode($dataArr);
        exit;
    }
}

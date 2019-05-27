<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * RateTypes Controller
 *
 * @property \App\Model\Table\RateTypesTable $RateTypes
 *
 * @method \App\Model\Entity\RateType[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class RateTypesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index() {
        if ($this->request->is('post')) {
            if (!empty($this->request->getData('name'))) {
                $rate_name = $this->request->getData('name');
                $limit = 1000;
            } else {
                $rate_name = '';
                $limit = 10;
            }
        } else {
            $rate_name = '';
            $limit = 10;
        }
        $this->paginate = [
            'conditions' => array(
                'name LIKE' => '%' . $rate_name . '%'
            ),
            'limit' => $limit,
            'order' => [
                'name' => 'asc'
            ]
        ];
        $this->set('rateTypes', $this->paginate($this->RateTypes));
        $this->set('_serialize', ['rateTypes']);
    }

    /**
     * View method
     *
     * @param string|null $id Rate Type id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $rateType = $this->RateTypes->get($id, [
            'contain' => []
        ]);

        $this->set('rateType', $rateType);
        $this->set('_serialize', ['rateType']);

    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $rateType = $this->RateTypes->newEntity();
        if ($this->request->is('post')) {
            $rateType = $this->RateTypes->patchEntity($rateType, $this->request->getData());
            $rateType['created_by'] = $this->Auth->user('id');
            if ($this->RateTypes->save($rateType)) {
                $this->Flash->success(__('The rate type has been saved.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The rate type could not be saved. Please, try again.'));
        }
        $this->set(compact('rateType'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Rate Type id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $rateType = $this->RateTypes->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $rateType = $this->RateTypes->patchEntity($rateType, $this->request->getData());
            $rateType['modified_by'] = $this->Auth->user('id');
            if ($this->RateTypes->save($rateType)) {
                $this->Flash->success(__('The rate type has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The rate type could not be saved. Please, try again.'));
        }
        $this->set(compact('rateType'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Rate Type id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    /* public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $rateType = $this->RateTypes->get($id);
        if ($this->RateTypes->delete($rateType)) {
            $this->Flash->success(__('The rate type has been deleted.'));
        } else {
            $this->Flash->error(__('The rate type could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    } */

    public function checkRatetypeName($id = null) {
        $rate_type_name = $this->request->getData('name');
        if ($id != '') {
            $typeName = $this->RateTypes->find('all')->select(['name'])->where(['name' => $rate_type_name, 'NOT' => array('id' => $id)]);
        } else {
            $typeName = $this->RateTypes->find('all')->select(['name'])->where(['name' => $rate_type_name]);
        }
        $typeArr = $typeName->toArray();
        if (count($typeArr) > 0) {
            $dataArr['success'] = 'true';
        } else {
            $dataArr['success'] = 'false';
        }
        echo json_encode($dataArr);
        exit;
    }
}

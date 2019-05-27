<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * StatusCodes Controller
 *
 * @property \App\Model\Table\StatusCodesTable $StatusCodes
 *
 * @method \App\Model\Entity\StatusCode[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class StatusCodesController extends AppController
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
                $status_code = $this->request->getData('name');
                $limit = 1000;
            } else {
                $status_code = '';
                $limit = 10;
            }
        } else {
            $status_code = '';
            $limit = 10;
        }
        $this->paginate = [
            'conditions' => array(
                'name LIKE' => '%' . $status_code . '%'
            ),
            'limit' => $limit,
            'order' => [
                'name' => 'asc'
            ]
        ];
        $this->set('statusCodes', $this->paginate($this->StatusCodes));
        $this->set('_serialize', ['statusCodes']);
    }

    /**
     * View method
     *
     * @param string|null $id Status Code id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $statusCode = $this->StatusCodes->get($id, [
            'contain' => []
        ]);

        $this->set('statusCode', $statusCode);
        $this->set('_serialize', ['statusCode']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $statusCode = $this->StatusCodes->newEntity();
        if ($this->request->is('post')) {
            $statusCode = $this->StatusCodes->patchEntity($statusCode, $this->request->getData());
            $statusCode['created_by'] = $this->Auth->user('id');
            if ($this->StatusCodes->save($statusCode)) {
                $this->Flash->success(__('The status code has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The status code could not be saved. Please, try again.'));
        }
        $this->set(compact('statusCode'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Status Code id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $statusCode = $this->StatusCodes->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $statusCode = $this->StatusCodes->patchEntity($statusCode, $this->request->getData());
            $statusCode['modified_by'] = $this->Auth->user('id');
            if ($this->StatusCodes->save($statusCode)) {
                $this->Flash->success(__('The status code has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The status code could not be saved. Please, try again.'));
        }        
        $this->set(compact('statusCode'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Status Code id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    /* public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $statusCode = $this->StatusCodes->get($id);
        if ($this->StatusCodes->delete($statusCode)) {
            $this->Flash->success(__('The status code has been deleted.'));
        } else {
            $this->Flash->error(__('The status code could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    } */

    public function checkStatusName($id = null) {
        $status_name = $this->request->getData('name');
        if ($id != '') {
            $statusName = $this->StatusCodes->find('all')->select(['name'])->where(['name' => $status_name, 'NOT' => array('id' => $id)]);
        } else {
            $statusName = $this->StatusCodes->find('all')->select(['name'])->where(['name' => $status_name]);
        }
        $statusArr = $statusName->toArray();
        if (count($statusArr) > 0) {
            $dataArr['success'] = 'true';
        } else {
            $dataArr['success'] = 'false';
        }
        echo json_encode($dataArr);
        exit;
    }
}

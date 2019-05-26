<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * States Controller
 *
 * @property \App\Model\Table\StatesTable $States
 *
 * @method \App\Model\Entity\State[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class StatesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index() {
        if ($this->request->is('post')) {
            if (!empty($this->request->getData('name'))) {
                $state_name = $this->request->getData('name');
                $limit = 1000;
            } else {
                $state_name = '';
                $limit = 10;
            }
        } else {
            $state_name = '';
            $limit= 10;
        }
        $this->paginate = [
            'conditions' => array(
                'States.name LIKE' => '%' . $state_name . '%'
            ),
            'limit' => $limit,
            'contain' => ['Countries'],
            'order' => [
                'name' => 'asc'
            ]
        ];
        $this->set('states', $this->paginate($this->States));
        $this->set('_serialize', ['states']);
    }

    /**
     * View method
     *
     * @param string|null $id State id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $state = $this->States->get($id, [
            'contain' => ['Countries']
        ]);

        $this->set('state', $state);
        $this->set('_serialize', ['state']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $state = $this->States->newEntity();
        if ($this->request->is('post')) {
            $state = $this->States->patchEntity($state, $this->request->getData());
            $state['created_by'] = $this->Auth->user('id');
            if ($this->States->save($state)) {
                $this->Flash->success(__('The state has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The state could not be saved. Please, try again.'));
        }
        $countries = $this->States->Countries->find('list', ['limit' => 200]);
        $this->set(compact('state', 'countries'));
        $this->set('_serialize', ['state']);
    }
    
    /**
     * Edit method
     *
     * @param string|null $id State id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null) {
        $state = $this->States->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $state = $this->States->patchEntity($state, $this->request->getData());
            $state['modified_by'] = $this->Auth->user('id');
            if ($this->States->save($state)) {
                $this->Flash->success('The state has been saved.');
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error('The state could not be saved. Please, try again.');
            }
        }
        $countries = $this->States->Countries->find('list', ['limit' => 200]);
        $this->set(compact('state', 'countries'));
    }

    /**
     * Delete method
     *
     * @param string|null $id State id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    /* public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $state = $this->States->get($id);
        if ($this->States->delete($state)) {
            $this->Flash->success(__('The state has been deleted.'));
        } else {
            $this->Flash->error(__('The state could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    } */

    public function checkStateName($id = null) {
        $state_name = $this->request->data['name'];
        if ($id != '') {
            $stateName = $this->States->find('all')->select(['name'])->where(['name' => $state_name, 'NOT' => array('id' => $id)]);
        } else {
            $stateName = $this->States->find('all')->select(['name'])->where(['name' => $state_name]);
        }
        $stateArr = $stateName->toArray();
        if (count($stateArr) > 0) {
            $dataArr['success'] = 'true';
        } else {
            $dataArr['success'] = 'false';
        }
        echo json_encode($dataArr);
        exit;
    }
}

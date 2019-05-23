<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * RoleAccess Controller
 *
 * @property \App\Model\Table\RoleAccessTable $RoleAccess
 *
 * @method \App\Model\Entity\RoleAcces[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class RoleAccessController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Roles']
        ];
        $roleAccess = $this->paginate($this->RoleAccess);

        $this->set(compact('roleAccess'));
    }

    /**
     * View method
     *
     * @param string|null $id Role Acces id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $roleAcces = $this->RoleAccess->get($id, [
            'contain' => ['Roles']
        ]);

        $this->set('roleAcces', $roleAcces);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $roleAcces = $this->RoleAccess->newEntity();
        if ($this->request->is('post')) {
            $roleAcces = $this->RoleAccess->patchEntity($roleAcces, $this->request->getData());
            if ($this->RoleAccess->save($roleAcces)) {
                $this->Flash->success(__('The role acces has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The role acces could not be saved. Please, try again.'));
        }
        $roles = $this->RoleAccess->Roles->find('list', ['limit' => 200]);
        $this->set(compact('roleAcces', 'roles'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Role Acces id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $roleAcces = $this->RoleAccess->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $roleAcces = $this->RoleAccess->patchEntity($roleAcces, $this->request->getData());
            if ($this->RoleAccess->save($roleAcces)) {
                $this->Flash->success(__('The role acces has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The role acces could not be saved. Please, try again.'));
        }
        $roles = $this->RoleAccess->Roles->find('list', ['limit' => 200]);
        $this->set(compact('roleAcces', 'roles'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Role Acces id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $roleAcces = $this->RoleAccess->get($id);
        if ($this->RoleAccess->delete($roleAcces)) {
            $this->Flash->success(__('The role acces has been deleted.'));
        } else {
            $this->Flash->error(__('The role acces could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}

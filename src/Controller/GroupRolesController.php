<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * GroupRoles Controller
 *
 * @property \App\Model\Table\GroupRolesTable $GroupRoles
 *
 * @method \App\Model\Entity\GroupRole[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class GroupRolesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Groups', 'Roles']
        ];
        $groupRoles = $this->paginate($this->GroupRoles);

        $this->set(compact('groupRoles'));
    }

    /**
     * View method
     *
     * @param string|null $id Group Role id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $groupRole = $this->GroupRoles->get($id, [
            'contain' => ['Groups', 'Roles']
        ]);

        $this->set('groupRole', $groupRole);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $groupRole = $this->GroupRoles->newEntity();
        if ($this->request->is('post')) {
            $groupRole = $this->GroupRoles->patchEntity($groupRole, $this->request->getData());
            if ($this->GroupRoles->save($groupRole)) {
                $this->Flash->success(__('The group role has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The group role could not be saved. Please, try again.'));
        }
        $groups = $this->GroupRoles->Groups->find('list', ['limit' => 200]);
        $roles = $this->GroupRoles->Roles->find('list', ['limit' => 200]);
        $this->set(compact('groupRole', 'groups', 'roles'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Group Role id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $groupRole = $this->GroupRoles->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $groupRole = $this->GroupRoles->patchEntity($groupRole, $this->request->getData());
            if ($this->GroupRoles->save($groupRole)) {
                $this->Flash->success(__('The group role has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The group role could not be saved. Please, try again.'));
        }
        $groups = $this->GroupRoles->Groups->find('list', ['limit' => 200]);
        $roles = $this->GroupRoles->Roles->find('list', ['limit' => 200]);
        $this->set(compact('groupRole', 'groups', 'roles'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Group Role id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $groupRole = $this->GroupRoles->get($id);
        if ($this->GroupRoles->delete($groupRole)) {
            $this->Flash->success(__('The group role has been deleted.'));
        } else {
            $this->Flash->error(__('The group role could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}

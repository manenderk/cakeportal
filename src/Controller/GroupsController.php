<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;

/**
 * Groups Controller
 *
 * @property \App\Model\Table\GroupsTable $Groups
 *
 * @method \App\Model\Entity\Group[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class GroupsController extends AppController
{
    private $Roles;
    private $GroupRoles;

    public function initialize()
    {
        parent::initialize();
        $this->Roles = TableRegistry::getTableLocator()->get('Roles');
        $this->GroupRoles = TableRegistry::getTableLocator()->get('GroupRoles');
    }
    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $groups = $this->paginate($this->Groups);

        $this->set(compact('groups'));
    }

    /**
     * View method
     *
     * @param string|null $id Group id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $group = $this->Groups->get($id, [
            'contain' => ['GroupRoles', 'groupRoles']
        ]);

        $this->set('group', $group);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $group = $this->Groups->newEntity();
        if ($this->request->is('post')) {
            $group = $this->Groups->patchEntity($group, $this->request->getData());
            if ($result = $this->Groups->save($group)) {
                //IF ANY ROLES SPECIFIED FOR THIS GROUP
                if (!empty($this->request->getData('groupRoles'))) {
                    //GET ID OF SELECTED ROLES
                    $roles = $this->request->getData('groupRoles');
                    foreach ($roles as $role) {
                        //CREATE NEW GROUP ROLES ENTITY AND LOAD GROUP ID AND ROLE ID
                        $groupRole = $this->GroupRoles->newEntity([
                            'group_id' => $result->id,
                            'role_id' => $role
                        ]);
                        //SAVE NEW GROUP ROLE ENTITY
                        $this->GroupRoles->save($groupRole);
                    }
                }

                $this->Flash->success(__('The group has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The group could not be saved. Please, try again.'));
        }
        //GET LIST OF ALL AVAILABLE ROLES
        $roles = $this->Roles->find('list');
        $this->set(compact('group', 'roles'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Group id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $group = $this->Groups->get($id, [
            'contain' => []
        ]);
        //GET LIST OF ROLES OF THIS GROUP
        $groupRoles = $this->GroupRoles->find()->select(['role_id'])->where(['group_id' => $id]);
        //VARIABLE TO STORE ROLEs ID
        $groupRolesId = [];
        foreach ($groupRoles as $role) {
            $groupRolesId[] = $role->role_id;         //STORE ROLE ID IN VARIABLE
        }

        if ($this->request->is(['patch', 'post', 'put'])) {
            $group = $this->Groups->patchEntity($group, $this->request->getData());
            if ($this->Groups->save($group)) {
                //IF THERE IS ROLE DATA FOR THIS GROUP
                if (!empty($this->request->getData('groupRoles'))) {
                    //GET ID OF NEW ROLES OF THIS GROUP
                    $newGroupRoleId = $this->request->getData('groupRoles');

                    //ITERATE THROUGH LIST OF OLD ROLES ID
                    foreach ($groupRolesId as $roleId) {
                        //IF OLD ROLE ID IS NOT PRESENT IN NEW LIST THEN DELETE CORRESPONDING GROUP ROLE ENTITY
                        if (!in_array($roleId, $newGroupRoleId)) {
                            $this->GroupRoles->deleteAll(['group_id' => $id, 'role_id' => $roleId]);
                        }
                    }
                    //ITERATE THROUGH LIST OF NEW ROLES ID
                    foreach ($newGroupRoleId as $roleId) {
                        //IF NEW ROLE ID IS NOT PRESENT IN OLD LIST THEN ADD CORRESPONDING GROUP ROLE ENTITY
                        if (!in_array($roleId, $groupRolesId)) {
                            $groupRole = $this->GroupRoles->newEntity([
                                'group_id' => $id,
                                'role_id' => $roleId
                            ]);
                            $this->GroupRoles->save($groupRole);
                        }
                    }
                }

                $this->Flash->success(__('The group has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The group could not be saved. Please, try again.'));
        }
        //GET LIST OF ALL AVAILABLE ROLES
        $roles = $this->Roles->find('list');
        $this->set(compact('group', 'groupRolesId', 'roles'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Group id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $group = $this->Groups->get($id);
        if ($this->Groups->delete($group)) {
            $this->Flash->success(__('The group has been deleted.'));
        } else {
            $this->Flash->error(__('The group could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}

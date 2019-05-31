<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\I18n\Time;
use Cake\ORM\TableRegistry;
use Cake\Routing\Router;

/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 *
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class UsersController extends AppController
{
    private $Groups;
    private $UserGroups;

    public function initialize()
    {
        parent::initialize();
        $this->Groups = TableRegistry::getTableLocator()->get('Groups');
        $this->UserGroups = TableRegistry::getTableLocator()->get('UserGroups');
        $this->Auth->allow(['login', 'logout']);
    }
    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $users = $this->paginate($this->Users);

        $this->set(compact('users'));
    }

    /**
     * View method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => []
        ]);

        $this->set('user', $user);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {        
        //CREATE NEW USER ENTITY
        $user = $this->Users->newEntity();
        if ($this->request->is('post')) {
            var_dump($this->request->getData('userGroups'));
            exit;
            //LOAD NEW USER ENTITY WITH POST DATA
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($result = $this->Users->save($user)) {
                //IF ANY GROUPS SPECIFIED FOR THIS USER
                if (!empty($this->request->getData('userGroups'))) {
                    //GET ID OF SELECTED GROUPS
                    $groups = $this->request->getData('userGroups');
                    foreach ($groups as $group) {
                        //CREATE NEW USER GROUP ENTITY AND LOAD USER ID AND GROUP ID
                        $userGroup = $this->UserGroups->newEntity([
                            'user_id' => $result->id,
                            'group_id' => $group
                        ]);
                        //SAVE NEW USER GROUP ENTITY
                        $this->UserGroups->save($userGroup);
                    }
                }
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        //GET LIST OF ALL AVAILABLE GROUPS
        $groups = $this->Groups->find('list');
        $this->set(compact('user', 'groups'));
    }

    /**
     * Edit method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundgroupsException When record not found.
     */
    public function edit($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => []
        ]);
        //GET LIST OF GROUPS OF THIS USER
        $userGroups = $this->UserGroups->find()->select(['group_id'])->where(['user_id' => $id]);
        //VARIABLE TO STORE GROUPS ID
        $userGroupsId = [];
        foreach ($userGroups as $group) {
            $userGroupsId[] = $group->group_id;         //STORE GROUP ID IN VARIABLE
        }
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                //IF THERE IS GROUP DATA FOR THIS USER
                if (!empty($this->request->getData('userGroups'))) {
                    //GET ID OF NEW GROUPS OF THIS USER
                    $newUserGroupsId = $this->request->getData('userGroups');

                    //ITERATE THROUGH LIST OF OLD GROUPS ID
                    foreach ($userGroupsId as $groupId) {
                        //IF OLD GROUP ID IS NOT PRESENT IN NEW LIST THEN DELETE CORRESPONDING USER GROUP ENTITY
                        if (!in_array($groupId, $newUserGroupsId)) {
                            $this->UserGroups->deleteAll(['user_id' => $id, 'group_id' => $groupId]);
                        }
                    }
                    //ITERATE THROUGH LIST OF NEW GROUPS ID
                    foreach ($newUserGroupsId as $groupId) {
                        //IF NEW GROUP ID IS NOT PRESENT IN OLD LIST THEN ADD CORRESPONDING USER GROUP ENTITY
                        if (!in_array($groupId, $userGroupsId)) {
                            $userGroup = $this->UserGroups->newEntity([
                            'user_id' => $id,
                            'group_id' => $groupId
                        ]);
                            $this->UserGroups->save($userGroup);
                        }
                    }
                }

                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $groups = $this->Groups->find('list');
        $this->set(compact('user', 'groups', 'userGroupsId'));
    }

    /**
     * Delete method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    /* public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $user = $this->Users->get($id);
        if ($this->Users->delete($user)) {
            $this->Flash->success(__('The user has been deleted.'));
        } else {
            $this->Flash->error(__('The user could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    } */

    public function login()
    {
        $this->viewBuilder()->setLayout('login');
        if ($this->request->is('post')) {
            $user = $this->Auth->identify();
            if ($user['is_active'] == 0) {
                $this->Auth->logout();
                $dataJson['msg'] = 'You are not authorized to access ATS.';
                $dataJson['success'] = false;
                echo json_encode($dataJson);
                exit;
            }
            if ($user) {
                $this->Users->updateAll(['last_login' => Time::now()], ['id' => $user['id']]);
                $this->Auth->setUser($user);
                //Update last login time stamp
                /* $UsersTable = TableRegistry::get('Users');
                $users = $UsersTable->get($user['id']);
                $users->last_login = date('Y-m-d h:m:s');
                $UsersTable->save($users); */
                $dataJson['success'] = true;
                /* if ($user['user_role_id'] == 6) {
                    $dataJson['url'] = "../job_requirements/add";
                } elseif ($user['user_role_id'] == 2) {
                    $dataJson['url'] = "../job_requirements/today_requirements";
                } elseif ($user['user_role_id'] == 1 || $user['user_role_id'] == 8) {
                    $dataJson['url'] = "../dashboard/view_admin";
                } else {
                    $dataJson['url'] = "../job_requirements";
                } */
                $dataJson['url'] = Router::url(['controller' => 'employees']);
                $dataJson['msg'] = "Authentication Successful!  Redirecting...";
                echo json_encode($dataJson);
                exit;
            //return $this->redirect($this->Auth->redirectUrl());
            } else {
                $dataJson['msg'] = 'Invalid Username/Password.';
                $dataJson['success'] = false;
                echo json_encode($dataJson);
                exit;
            }
            $this->Flash->error('Your username or password is incorrect.');
        }
    }

    public function logout()
    {
        $this->layout = 'logout';
        $this->Flash->success('You are now logged out.');
        return $this->redirect($this->Auth->logout());
    }

    public function checkEmail($id=null)
    {
        $email = $this->request->getData('email');
        if ($id != '') {
            $users = $this->Users->find('all')->where(['email' => $email, 'NOT' => ['id' => $id]])->count();
        } else {
            $users = $this->Users->find('all')->where(['email' => $email])->count();
        }
        if ($users > 0) {
            $dataArr['success'] = 'true';
        } else {
            $dataArr['success'] = 'false';
        }
        echo json_encode($dataArr);
        exit;
    }
}

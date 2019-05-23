<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;
use ReflectionClass;
use ReflectionMethod;

/**
 * Roles Controller
 *
 * @property \App\Model\Table\RolesTable $Roles
 *
 * @method \App\Model\Entity\Role[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class RolesController extends AppController
{
    private $RoleAccess;

    public function initialize()
    {
        parent::initialize();
        $this->RoleAccess = TableRegistry::getTableLocator()->get('RoleAccess');
    }
    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $roles = $this->paginate($this->Roles);

        $this->set(compact('roles'));
    }

    /**
     * View method
     *
     * @param string|null $id Role id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $role = $this->Roles->get($id, [
            'contain' => ['GroupRoles', 'RoleAccess']
        ]);

        $this->set('role', $role);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        //CREATE NEW ROLE ENTITY
        $role = $this->Roles->newEntity();

        if ($this->request->is('post')) {
            //LOAD ROLE ENTITY WITH POST DATA
            $role = $this->Roles->patchEntity($role, $this->request->getData());
            //IF ROLE IS SAVED
            if ($result = $this->Roles->save($role)) {
                //IF THERE IS CONTROLLERS POST DATA
                if (!empty($this->request->getData('controllers'))) {
                    $controllers = $this->request->getData('controllers');
                    //ITERATE THROUGH EACH CONTROLLER
                    foreach ($controllers as $key => $controller) {
                        //IF CONTROLLER.READ ACTION IS TRUE
                        if ($controller['read'] == '1') {
                            //CREATE AND SAVE NEW ROLE ACCESS ENTITY
                            $roleAccess = $this->RoleAccess->newEntity([
                                'role_id' => $result->id,
                                'controller' => $key,
                                'action' => 'read'
                            ]);
                            $this->RoleAccess->save($roleAccess);
                        }
                        //IF CONTROLLER.WRITE ACTION IS TRUE
                        if ($controller['write'] == '1') {
                            //CREATE AND SAVE NEW ROLE ACCESS ENTITY
                            $roleAccess = $this->RoleAccess->newEntity([
                                'role_id' => $result->id,
                                'controller' => $key,
                                'action' => 'write'
                            ]);
                            $this->RoleAccess->save($roleAccess);
                        }
                    }
                }
                $this->Flash->success(__('The role has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The role could not be saved. Please, try again.'));
        }
        //GET LIST OF CONTROLLERS FOR ACL
        $controllers = $this->getControllers();
        $this->set(compact('role', 'controllers'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Role id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $role = $this->Roles->get($id, [
            'contain' => []
        ]);
        //VARIABLE TO STORE ALL ROLE ACCESS CURRENT ROLE HAS
        $previousRoles = [];
        //GET ALL ROLE ACCESS FOR THIS ROLE
        $rolesAccess = $this->RoleAccess->find('all')->where(['role_id' => $id]);
        //ITERATE THROUGH EACH ROLE ACCESS
        foreach ($rolesAccess as $roleAccess) {
            //POPULATE VARIABLE WITH CONTROLLER AND ACTION
            $previousRoles[$roleAccess->controller][$roleAccess->action] = 1;
        }
        if ($this->request->is(['patch', 'post', 'put'])) {
            //LOAD ROLE ENTITY WITH POST DATA
            $role = $this->Roles->patchEntity($role, $this->request->getData());
            //IF ROLE IS SAVED
            if ($this->Roles->save($role)) {
                //IF THERE IS CONTROLLER POST DATA
                if (!empty($this->request->getData('controllers'))) {
                    $controllers = $this->request->getData('controllers');
                    //ITERATE THROUGH EACH CONTROLLER
                    foreach ($controllers as $key => $controller) {
                        //IF CONTROLLER.READ ACTION IS TRUE
                        if ($controller['read'] == '1') {
                            //IF THIS CONTROLLER.READ ACTION WAS NOT PRESENT PREVIOUSLY
                            if (empty($previousRoles[$key]['read'])) {
                                //CREATE AND SAVE ROLE ACCESS ENTITY
                                $roleAccess = $this->RoleAccess->newEntity([
                                    'role_id' => $id,
                                    'controller' => $key,
                                    'action' => 'read'
                                ]);
                                $this->RoleAccess->save($roleAccess);
                            }
                        }
                        //ELSE CONTROLLER.READ ACTION IS FALSE 
                        else {
                            //IF THIS CONTROLLER.READ ACTION WAS PRESENT PREVIOUSLY
                            if (!empty($previousRoles[$key]['read'])) {
                                //DELETE THIS PREVIOUS ROLE ACCESS ENTITY
                                $this->RoleAccess->deleteAll(['role_id' => $id, 'controller' => $key, 'action' => 'read']);
                            }
                        }
                        //IF CONTROLLER.WRITE ACTION IS TRUE
                        if ($controller['write'] == '1') {
                            //IF THIS CONTROLLER.WRITE ACTION WAS NOT PRESENT PREVIOUSLY
                            if (empty($previousRoles[$key]['write'])) {
                                //CREATE AND SAVE ROLE ACCESS ENTITY
                                $roleAccess = $this->RoleAccess->newEntity([
                                    'role_id' => $id,
                                    'controller' => $key,
                                    'action' => 'write'
                                ]);
                                $this->RoleAccess->save($roleAccess);
                            }
                        } 
                        //ELSE CONTROLLER.WRITE ACTION IS FALSE
                        else {
                            //IF THIS CONTROLLER.WRITE ACTION WAS PRESENT PREVIOUSLY
                            if (!empty($previousRoles[$key]['write'])) {
                                //DELETE THIS PREVIOUS ROLE ACCESS ENTITY
                                $this->RoleAccess->deleteAll(['role_id' => $id, 'controller' => $key, 'action' => 'write']);
                            }
                        }
                    }
                }

                $this->Flash->success(__('The role has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The role could not be saved. Please, try again.'));
        }
        //GET LIST OF ALL CONTROLLERS
        $controllers = $this->getControllers();
        $this->set(compact('role', 'previousRoles', 'controllers'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Role id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $role = $this->Roles->get($id);
        if ($this->Roles->delete($role)) {
            $this->Flash->success(__('The role has been deleted.'));
        } else {
            $this->Flash->error(__('The role could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    //FUNCTION TO RETURN LIST OF ALL CONTROLLERS
    private function getControllers()
    {
        //SCAN CONTROLLER DIRECTORY
        $files = scandir('../src/Controller/');

        //VARIABLE TO STORE LIST OF CONTROLLERS
        $results = [];

        //IGNORE LIST OF CONTROLLERS THAT ARE NOT REQUIRED FOR ACL
        $ignoreList = [
            '.',
            '..',
            'Component',
            'AppController.php',
            'ErrorController.php',
            'CustomFieldTypesController.php',
            'CustomFieldChoicesController.php',
            'CustomFieldValuesController.php',
            'PagesController.php',
            'RoleAccessController.php'
        ];
        //FOR EACH CONTROLLER PRESENT IN CONTROLLER DIRECTORY
        foreach ($files as $file) {
            //IF THE CURRENT CONTROLLER IS NOT IN IGNORE LIST
            if (!in_array($file, $ignoreList)) {
                //REMOVE .php FROM CONTROLLER FILE NAME
                $controller = explode('.', $file)[0];
                //REMOVE CONTROLLER WORD FROM FILE NAME AND PUSH IT IN RESULTS VARIABLE
                array_push($results, str_replace('Controller', '', $controller));
            }
        }
        return $results;
    }
}

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
        $role = $this->Roles->newEntity();
        if ($this->request->is('post')) {
            $role = $this->Roles->patchEntity($role, $this->request->getData());
            if ($result = $this->Roles->save($role)) {
                if (!empty($this->request->getData('controllers'))) {
                    $controllers = $this->request->getData('controllers');
                    foreach ($controllers as $key => $controller) {
                        if ($controller['read'] == '1') {
                            $roleAccess = $this->RoleAccess->newEntity([
                                'role_id' => $result->id,
                                'controller' => $key,
                                'action' => 'read'
                            ]);
                            $this->RoleAccess->save($roleAccess);
                        }
                        if ($controller['write'] == '1') {
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
        $previousRoles = [];
        $rolesAccess = $this->RoleAccess->find('all')->where(['role_id' => $id]);
        foreach ($rolesAccess as $roleAccess) {
            $previousRoles[$roleAccess->controller][$roleAccess->action] = 1;
        }
        if ($this->request->is(['patch', 'post', 'put'])) {
            $role = $this->Roles->patchEntity($role, $this->request->getData());
            if ($this->Roles->save($role)) {
                if (!empty($this->request->getData('controllers'))) {
                    $controllers = $this->request->getData('controllers');
                    foreach ($controllers as $key => $controller) {
                        if ($controller['read'] == '1') {
                            if (empty($previousRoles[$key]['read'])) {
                                $roleAccess = $this->RoleAccess->newEntity([
                                    'role_id' => $id,
                                    'controller' => $key,
                                    'action' => 'read'
                                ]);
                                $this->RoleAccess->save($roleAccess);
                            }
                        } 
                        else {
                            if (!empty($previousRoles[$key]['read'])) {
                                $this->RoleAccess->deleteAll(['role_id' => $id, 'controller' => $key, 'action' => 'read']);
                            }
                        }
                        if ($controller['write'] == '1') {
                            if (empty($previousRoles[$key]['write'])) {
                                $roleAccess = $this->RoleAccess->newEntity([
                                    'role_id' => $id,
                                    'controller' => $key,
                                    'action' => 'write'
                                ]);
                                $this->RoleAccess->save($roleAccess);
                            }
                        } 
                        else {
                            if (!empty($previousRoles[$key]['write'])) {
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

    private function getControllers()
    {
        $files = scandir('../src/Controller/');
        $results = [];
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
        foreach ($files as $file) {
            if (!in_array($file, $ignoreList)) {
                $controller = explode('.', $file)[0];
                array_push($results, str_replace('Controller', '', $controller));
            }
        }
        return $results;
    }
}

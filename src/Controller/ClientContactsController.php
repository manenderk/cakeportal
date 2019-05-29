<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;
use Cake\Utility\Security;

/**
 * ClientContacts Controller
 *
 * @property \App\Model\Table\ClientContactsTable $ClientContacts
 *
 * @method \App\Model\Entity\ClientContact[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ClientContactsController extends AppController
{
    private $Users;

    public function initialize()
    {
        parent::initialize();
        $this->Users = TableRegistry::getTableLocator()->get('Users');
    }
    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        /* $condition = array();
        if ($this->request->is('post')) {
            if ($this->request->data['client_id'] != '') {
                $limit = 500;
                $condition['Clients.id'] = $this->request->data['client_id'];
            }
            
            if ($this->request->data['login_name'] != '') {
                $limit = 500;
                $condition['Users.login_name LIKE'] = '%' . @$_POST['login_name'] . '%';
            }
            if ($this->request->data['contact_number'] != '') {
                $limit = 500;
                $condition['Users.contact_number LIKE'] = '%' . @$_POST['contact_number'] . '%';
            }
        }
        $this->paginate = [
            'contain' => ['Clients'],
            'Users' => $this->Users->find(),
            'conditions' => $condition
        ];
        $clients = $this->ClientContacts->Clients->find('list'); */
        $query = $this->ClientContacts->find('all')->leftJoinWith($this->Users, function($q){
            return $q->where([]);
        });
        $this->set('clientContacts', $this->paginate($query));
        $this->set('clients', $clients);
        $this->set('_serialize', ['clientContacts']);
    }

    /**
     * View method
     *
     * @param string|null $id Client Contact id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $clientContact = $this->ClientContacts->get($id, [
            'contain' => ['Clients']
        ]);

        $this->set('clientContact', $clientContact);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $user = $this->Users->newEntity();
        $clientContact = $this->ClientContacts->newEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            $user['password'] = Security::randomString(7);
            $user['is_active'] = 0;
            if ($result = $this->Users->save($user)) {
                $clientContact = $this->ClientContacts->patchEntity($clientContact, $this->request->getData());
                $clientContact['user_id'] = $result->id;
                if ($this->ClientContacts->save($clientContact)) {
                    $this->Flash->success(__('The client contact has been saved.'));

                    return $this->redirect(['action' => 'index']);
                }
                $this->Flash->error(__('The client contact could not be saved. Please, try again.'));
            } else {
                $this->Flash->error(__('The user could not be saved. Please, try again.'));
            }
        }
        $clients = $this->ClientContacts->Clients->find('list');
        $this->set(compact('clientContact', 'clients'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Client Contact id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $clientContact = $this->ClientContacts->get($id, [
            'contain' => ['clients']
        ]);
        $user = $this->Users->get($clientContact->user_id);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $clientContact = $this->ClientContacts->patchEntity($clientContact, $this->request->getData());
                if ($this->ClientContacts->save($clientContact)) {
                    $this->Flash->success(__('The client contact has been saved.'));

                    return $this->redirect(['action' => 'index']);
                }
                $this->Flash->error(__('The client contact could not be saved. Please, try again.'));
            } else {
                $this->Flash->error(__('The user could not be saved. Please, try again.'));
            }
        }
        $clients = $this->ClientContacts->Clients->find('list', ['limit' => 200]);
        
        $this->set(compact('clientContact', 'clients', 'user'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Client Contact id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $clientContact = $this->ClientContacts->get($id);
        if ($this->ClientContacts->delete($clientContact)) {
            $this->Flash->success(__('The client contact has been deleted.'));
        } else {
            $this->Flash->error(__('The client contact could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}

<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * BusinessDomains Controller
 *
 * @property \App\Model\Table\BusinessDomainsTable $BusinessDomains
 *
 * @method \App\Model\Entity\BusinessDomain[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class BusinessDomainsController extends AppController
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
                $domain_name = $this->request->getData('name');
                $limit = 1000;
            } else {
                $domain_name = '';
                $limit = 10;
            }
        } else {
            $domain_name = '';
            $limit = 10;
        }
        $this->paginate = [
            'conditions' => array(
                'name LIKE' => '%' . $domain_name . '%'
            ),
            'limit' => $limit,
            'order' => [
                'name' => 'asc'
            ]
        ];
        $this->set('businessDomains', $this->paginate($this->BusinessDomains));
        $this->set('_serialize', ['businessDomains']);
    }


    /**
     * View method
     *
     * @param string|null $id Business Domain id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $businessDomain = $this->BusinessDomains->get($id, [
            'contain' => []
        ]);
        $this->set('businessDomain', $businessDomain);
        $this->set('_serialize', ['businessDomain']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $businessDomain = $this->BusinessDomains->newEntity();
        if ($this->request->is('post')) {
            $businessDomain = $this->BusinessDomains->patchEntity($businessDomain, $this->request->getData());
            $businessDomain['created_by'] = $this->Auth->user('id');
            if ($this->BusinessDomains->save($businessDomain)) {
                $this->Flash->success(__('The business domain has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The business domain could not be saved. Please, try again.'));
        }
        $this->set(compact('businessDomain'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Business Domain id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $businessDomain = $this->BusinessDomains->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $businessDomain = $this->BusinessDomains->patchEntity($businessDomain, $this->request->getData());
            $businessDomain['modified_by'] = $this->Auth->user('id');
            if ($this->BusinessDomains->save($businessDomain)) {
                $this->Flash->success(__('The business domain has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The business domain could not be saved. Please, try again.'));
        }
        $this->set(compact('businessDomain'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Business Domain id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    /* public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $businessDomain = $this->BusinessDomains->get($id);
        if ($this->BusinessDomains->delete($businessDomain)) {
            $this->Flash->success(__('The business domain has been deleted.'));
        } else {
            $this->Flash->error(__('The business domain could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    } */

    public function check_domain_name($id = null) {
        $domain_name = $this->request->getData('name');
        if ($id != '') {
            $domainName = $this->BusinessDomains->find('all')->select(['name'])->where(['name' => $domain_name, 'NOT' => array('id' => $id)]);
        } else {
            $domainName = $this->BusinessDomains->find('all')->select(['name'])->where(['name' => $domain_name]);
        }
        $domainArr = $domainName->toArray();
        if (count($domainArr) > 0) {
            $dataArr['success'] = 'true';
        } else {
            $dataArr['success'] = 'false';
        }
        echo json_encode($dataArr);
        exit;
    }
}

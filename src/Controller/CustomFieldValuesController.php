<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * CustomFieldValues Controller
 *
 * @property \App\Model\Table\CustomFieldValuesTable $CustomFieldValues
 *
 * @method \App\Model\Entity\CustomFieldValue[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class CustomFieldValuesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Records', 'CustomFields']
        ];
        $customFieldValues = $this->paginate($this->CustomFieldValues);

        $this->set(compact('customFieldValues'));
    }

    /**
     * View method
     *
     * @param string|null $id Custom Field Value id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $customFieldValue = $this->CustomFieldValues->get($id, [
            'contain' => ['Records', 'CustomFields']
        ]);

        $this->set('customFieldValue', $customFieldValue);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $customFieldValue = $this->CustomFieldValues->newEntity();
        if ($this->request->is('post')) {
            $customFieldValue = $this->CustomFieldValues->patchEntity($customFieldValue, $this->request->getData());
            if ($this->CustomFieldValues->save($customFieldValue)) {
                $this->Flash->success(__('The custom field value has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The custom field value could not be saved. Please, try again.'));
        }
        $records = $this->CustomFieldValues->Records->find('list', ['limit' => 200]);
        $customFields = $this->CustomFieldValues->CustomFields->find('list', ['limit' => 200]);
        $this->set(compact('customFieldValue', 'records', 'customFields'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Custom Field Value id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $customFieldValue = $this->CustomFieldValues->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $customFieldValue = $this->CustomFieldValues->patchEntity($customFieldValue, $this->request->getData());
            if ($this->CustomFieldValues->save($customFieldValue)) {
                $this->Flash->success(__('The custom field value has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The custom field value could not be saved. Please, try again.'));
        }
        $records = $this->CustomFieldValues->Records->find('list', ['limit' => 200]);
        $customFields = $this->CustomFieldValues->CustomFields->find('list', ['limit' => 200]);
        $this->set(compact('customFieldValue', 'records', 'customFields'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Custom Field Value id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $customFieldValue = $this->CustomFieldValues->get($id);
        if ($this->CustomFieldValues->delete($customFieldValue)) {
            $this->Flash->success(__('The custom field value has been deleted.'));
        } else {
            $this->Flash->error(__('The custom field value could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}

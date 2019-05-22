<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * CustomFieldChoices Controller
 *
 * @property \App\Model\Table\CustomFieldChoicesTable $CustomFieldChoices
 *
 * @method \App\Model\Entity\CustomFieldChoice[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class CustomFieldChoicesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['CustomFields']
        ];
        $customFieldChoices = $this->paginate($this->CustomFieldChoices);

        $this->set(compact('customFieldChoices'));
    }

    /**
     * View method
     *
     * @param string|null $id Custom Field Choice id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $customFieldChoice = $this->CustomFieldChoices->get($id, [
            'contain' => ['CustomFields']
        ]);

        $this->set('customFieldChoice', $customFieldChoice);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $customFieldChoice = $this->CustomFieldChoices->newEntity();
        if ($this->request->is('post')) {
            $customFieldChoice = $this->CustomFieldChoices->patchEntity($customFieldChoice, $this->request->getData());
            if ($this->CustomFieldChoices->save($customFieldChoice)) {
                $this->Flash->success(__('The custom field choice has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The custom field choice could not be saved. Please, try again.'));
        }
        $customFields = $this->CustomFieldChoices->CustomFields->find('list', ['limit' => 200]);
        $this->set(compact('customFieldChoice', 'customFields'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Custom Field Choice id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $customFieldChoice = $this->CustomFieldChoices->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $customFieldChoice = $this->CustomFieldChoices->patchEntity($customFieldChoice, $this->request->getData());
            if ($this->CustomFieldChoices->save($customFieldChoice)) {
                $this->Flash->success(__('The custom field choice has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The custom field choice could not be saved. Please, try again.'));
        }
        $customFields = $this->CustomFieldChoices->CustomFields->find('list', ['limit' => 200]);
        $this->set(compact('customFieldChoice', 'customFields'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Custom Field Choice id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $customFieldChoice = $this->CustomFieldChoices->get($id);
        if ($this->CustomFieldChoices->delete($customFieldChoice)) {
            $this->Flash->success(__('The custom field choice has been deleted.'));
        } else {
            $this->Flash->error(__('The custom field choice could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}

<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;

/**
 * CustomFields Controller
 *use Cake\ORM\TableRegistry;

 * @property \App\Model\Table\CustomFieldsTable $CustomFields
 *
 * @method \App\Model\Entity\CustomField[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class CustomFieldsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['CustomFieldTypes']
        ];
        $customFields = $this->paginate($this->CustomFields);

        $this->set(compact('customFields'));
    }

    /**
     * View method
     *
     * @param string|null $id Custom Field id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $customField = $this->CustomFields->get($id, [
            'contain' => ['CustomFieldTypes']
        ]);

        $this->set('customField', $customField);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $customField = $this->CustomFields->newEntity();
        if ($this->request->is('post')) {
            $customField = $this->CustomFields->patchEntity($customField, $this->request->getData());
            $customField['table_name'] = 'employees';
            if ($result = $this->CustomFields->save($customField)) {
                if (count($this->request->getData('custom-field-choices')) > 0) {
                    $customFieldId = $result->id;
                    $CustomFieldChoices = TableRegistry::getTableLocator()->get('CustomFieldChoices');
                    foreach ($this->request->getData('custom-field-choices') as $choice) {
                        $customFieldChoice = $CustomFieldChoices->newEntity([
                            'field_id' => $customFieldId,
                            'choice_name' => $choice
                        ]);
                        $CustomFieldChoices->save($customFieldChoice);
                    }
                }
                $this->Flash->success(__('The custom field has been saved.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The custom field could not be saved. Please, try again.'));
        }
        $customFieldTypes = $this->CustomFields->CustomFieldTypes->find('list');
        $this->set(compact('customField', 'customFieldTypes'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Custom Field id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $customField = $this->CustomFields->get($id, [
            'contain' => ['CustomFieldTypes']
        ]);
        //GET CHOICE LIST FOR THIS CUSTOM FIELD
        $customFieldChoiceData = [];
        if ($customField->custom_field_type->field_type) {
            $CustomFieldChoices = TableRegistry::getTableLocator()->get('CustomFieldChoices');
            $customFieldChoices = $CustomFieldChoices->find('all')->where(['field_id' => $customField->id]);
            foreach ($customFieldChoices as $choice) {
                $customFieldChoiceData[$choice->id] = $choice->choice_name;
            }
        }
        if ($this->request->is(['patch', 'post', 'put'])) {
            $customField = $this->CustomFields->patchEntity($customField, $this->request->getData());
            $customField['table_name'] = 'employees';
            if ($this->CustomFields->save($customField)) {
                $previousChoices = $this->request->getData('previous-custom-field-choices'); //MODIFIED OLD CHOICES
                $newChoices = $this->request->getData('custom-field-choices');  //NEW CHOICES
                foreach ($customFieldChoiceData as $key => $choice) {
                    if (!empty($previousChoices[$key])) {
                        //UPDATE
                        $customFieldChoice = $CustomFieldChoices->get($key);
                        $customFieldChoice['choice_name'] = $previousChoices[$key];
                        $CustomFieldChoices->save($customFieldChoice);
                    } else {
                        //DELETE
                        $customFieldChoice = $CustomFieldChoices->get($key);
                        $CustomFieldChoices->delete($customFieldChoice);
                        $CustomFieldValues = TableRegistry::getTableLocator()->get('CustomFieldValues');
                        $CustomFieldValues->deleteAll(['field_value' => $key]);
                    }
                }
                if (!empty($newChoices)) {
                    foreach ($newChoices as $choice) {
                        $customFieldChoice = $CustomFieldChoices->newEntity([
                        'field_id' => $id,
                        'choice_name' => $choice
                    ]);
                        $CustomFieldChoices->save($customFieldChoice);
                    }
                }
                


                $this->Flash->success(__('The custom field has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The custom field could not be saved. Please, try again.'));
        }
        $customFieldTypes = $this->CustomFields->CustomFieldTypes->find('list');
        $this->set(compact('customField', 'customFieldTypes', 'customFieldChoiceData'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Custom Field id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $customField = $this->CustomFields->get($id);
        if ($this->CustomFields->delete($customField)) {
            $this->Flash->success(__('The custom field has been deleted.'));
        } else {
            $this->Flash->error(__('The custom field could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}

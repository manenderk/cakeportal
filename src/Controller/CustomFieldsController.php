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
    private $CustomFieldChoices;
    private $CustomFieldValues;

    public function initialize(){
        parent::initialize();
        $this->CustomFieldChoices = TableRegistry::getTableLocator()->get('CustomFieldChoices');
        $this->CustomFieldValues = TableRegistry::getTableLocator()->get('CustomFieldValues');
    }


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
        //CREATE NEW CUSTOM FIELD ENTITIY
        $customField = $this->CustomFields->newEntity();
        if ($this->request->is('post')) {
            //LOAD POST DATA OF CUSTOM FIELD IN ENTITY
            $customField = $this->CustomFields->patchEntity($customField, $this->request->getData());
            //SET CUSTOM FIELD TABLE NAME TO EMPLOYEE
            $customField['table_name'] = 'employees';
            //IF NEW CUSTOM FIELD IS SAVED
            if ($result = $this->CustomFields->save($customField)) {
                //CHECK IF CUSTOM FIELD HAVE ANY CHOICES
                if (!empty($this->request->getData('custom-field-choices'))) {
                    //GET ID OF SAVED CUSTOM FIELD
                    $customFieldId = $result->id;
                    //ITERATE THROUGH EVERY CHOICE OF CUSTOM FIELD
                    foreach ($this->request->getData('custom-field-choices') as $choice) {
                        //CREATE NEW CUSTOM FIELD CHOICE ENTITY AND LOAD DATA
                        $customFieldChoice = $this->CustomFieldChoices->newEntity([
                            'field_id' => $customFieldId,
                            'choice_name' => $choice
                        ]);
                        //SAVE CUSTOM FIELD CHOICE ENTITY
                        $this->CustomFieldChoices->save($customFieldChoice);
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
        //VARIABLE TO STORE CHOICE LIST FOR THIS CUSTOM FIELD
        $customFieldChoiceData = [];
        //CHECK IF THIS CUSTOM FIELD IS OF TYPE DROPDOWN
        if ($customField->custom_field_type->field_type == 'Dropdown') {
            //FETCH CHOICES FOR THIS DROPDOWN CUSTOM FIELD
            $customFieldChoices = $this->CustomFieldChoices->find('all')->where(['field_id' => $customField->id]);
            //STORE CHOICES IN CHOICE LIST VARIABLE
            foreach ($customFieldChoices as $choice) {
                $customFieldChoiceData[$choice->id] = $choice->choice_name;
            }
        }
        if ($this->request->is(['patch', 'post', 'put'])) {
            //LOAD CUSTOM FIELD ENTITY FROM DATABASE AND APPLY CHANGES THROUGH POST DATA
            $customField = $this->CustomFields->patchEntity($customField, $this->request->getData());
            //SET TABLE FOR THIS CUSTOM FIELD TO EMPLOYEES
            $customField['table_name'] = 'employees';
            //IF THIS CUSTOM FIELD IS SAVED
            if ($this->CustomFields->save($customField)) {
                //GET MODIFIED OLD CHOICES(AFTER MODIFICATION) OF THIS CUSTOM FIELD FROM POST DATA
                $previousChoices = $this->request->getData('previous-custom-field-choices');
                //GET NEW CHOICES ADDED TO THIS CUSTOM FIELD
                $newChoices = $this->request->getData('custom-field-choices');

                //ITERATE THROUGH OLD CHOICE LIST(BEFORE MODIFICATION) OF THIS CUSTOM FIELD
                foreach ($customFieldChoiceData as $key => $choice) {
                    //IF CHOICE IS EDITED
                    if (!empty($previousChoices[$key])) {
                        //GET CUSTOM FIELD CHOICE RECORD
                        $customFieldChoice = $this->CustomFieldChoices->get($key);
                        //UPDATE CHOICE NAME
                        $customFieldChoice['choice_name'] = $previousChoices[$key];
                        //SAVE CUSTOM FIELD CHOICE
                        $this->CustomFieldChoices->save($customFieldChoice);
                    }
                    //IF CHOICE IS DELETED
                    else {
                        //GET CUSTOM FIELD CHOICE RECORD
                        $customFieldChoice = $this->CustomFieldChoices->get($key);
                        //DELETE CUSTOM FIELD CHOICE
                        $this->CustomFieldChoices->delete($customFieldChoice);  
                        //DELETE ALL RECORDS FROM CUSTOM FIELD VALUES TABLE THAT USE THIS CHOICE AS ITS VALUE
                        $this->CustomFieldValues->deleteAll(['field_value' => $key]);
                    }
                }
                //IF THERE ARE NEW CHOICES
                if (!empty($newChoices)) {
                    //ITERATE THROUGH NEW CHOICES
                    foreach ($newChoices as $choice) {
                        //CREATE NEW CHOICE ENTITY AND LOAD DATA
                        $customFieldChoice = $this->CustomFieldChoices->newEntity([
                            'field_id' => $id,
                            'choice_name' => $choice
                        ]);
                        //SAVE NEW CUSTOM FIELD CHOICE
                        $this->CustomFieldChoices->save($customFieldChoice);
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

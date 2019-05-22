<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;

/**
 * Employees Controller
 *
 * @property \App\Model\Table\EmployeesTable $Employees
 *
 * @method \App\Model\Entity\Employee[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class EmployeesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['JobTitles', 'Departments']
        ];
        $employees = $this->paginate($this->Employees);
        
        
        $this->set(compact('employees'));
    }

    /**
     * View method
     *
     * @param string|null $id Employee id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $employee = $this->Employees->get($id, [
            'contain' => ['JobTitles', 'Departments']
        ]);
        
        $Users = TableRegistry::getTableLocator()->get('Users');
        $user = $Users->get($employee['user']);

        $customFieldsData = [];
        $CustomFields = TableRegistry::getTableLocator()->get('CustomFields');
        $CustomFieldValues = TableRegistry::getTableLocator()->get('CustomFieldValues');
        $customFields=$CustomFields->find('all')->where(['table_name' => 'employees'])->contain(['CustomFieldTypes']);
        foreach ($customFields as $customField) {
            $customFieldData = [];
            $customFieldData['name'] = $customField->field_name;
            $customFieldData['value'] = '';
            $customFieldValues = $CustomFieldValues->find('all')->where(['record_id' => $employee->id, 'field_id' => $customField->id])->select(['field_value']);
            foreach ($customFieldValues as $customFieldValue) {
                $customFieldData['value'] = $customFieldValue->field_value;
            }
            
            if ($customField->custom_field_type->field_type == 'Dropdown' && !empty($customFieldData['value'])) {
                $CustomFieldChoices = TableRegistry::getTableLocator()->get('CustomFieldChoices');
                $customFieldChoice = $CustomFieldChoices->get($customFieldData['value']);
                $customFieldData['value'] = $customFieldChoice->choice_name;
            }
            $customFieldsData[] = $customFieldData;
        }

        $this->set(compact('employee', 'user', 'customFieldsData'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $employee = $this->Employees->newEntity();
        if ($this->request->is('post')) {
            $employee = $this->Employees->patchEntity($employee, $this->request->getData());
            $employee['created_by'] = $this->Auth->user('id');
            
            if ($result = $this->Employees->save($employee)) {
                $CustomFieldValues = TableRegistry::getTableLocator()->get('CustomFieldValues');
                $customFieldsData = $this->request->getData('customField');
                foreach ($customFieldsData as $key => $value) {
                    $customFieldValue = $CustomFieldValues->newEntity([
                        'record_id' => $result->id,
                        'field_id' => $key,
                        'field_value' => $value
                    ]);
                
                    $CustomFieldValues->save($customFieldValue);
                }

                $this->Flash->success(__('The employee has been saved.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The employee could not be saved. Please, try again.'));
        }
           
        $Users = TableRegistry::getTableLocator()->get('Users');

        $CustomFields = TableRegistry::getTableLocator()->get('CustomFields');
        $CustomFieldChoices = TableRegistry::getTableLocator()->get('CustomFieldChoices');
        
        $customFieldsArray = [];
        $customFields=$CustomFields->find('all')->where(['table_name' => 'employees'])->contain(['CustomFieldTypes']);
        foreach ($customFields as $customField) {
            $customFieldEntity = [];
            $customFieldEntity['id'] = $customField->id;
            $customFieldEntity['name'] = $customField->field_name;
            if ($customField->custom_field_type->field_type == 'String') {
                $customFieldEntity['type'] = 'text';
            } elseif ($customField->custom_field_type->field_type == 'Number') {
                $customFieldEntity['type'] = 'number';
            } elseif ($customField->custom_field_type->field_type == 'Dropdown') {
                $customFieldEntity['type'] = 'select';
                $customFieldChoices = $CustomFieldChoices->find('all')->select(['id', 'choice_name'])->where(['field_id' => $customField->id]);
                foreach ($customFieldChoices as $choice) {
                    $customFieldEntity['choices'][$choice->id] = $choice->choice_name;
                }
            }
            $customFieldsArray[] = $customFieldEntity;
        }
                
        $users = $Users->find('all')->select(['id', 'first_name', 'middle_name', 'last_name', 'email']);
        $jobTitles = $this->Employees->JobTitles->find('all')->select(['id', 'job_title']);
        $departments = $this->Employees->Departments->find('all')->select(['id', 'department_name']);
        $this->set(compact('employee', 'jobTitles', 'departments', 'users', 'customFieldsArray'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Employee id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $employee = $this->Employees->get($id, [
            'contain' => []
        ]);

        $CustomFields = TableRegistry::getTableLocator()->get('CustomFields');
        $CustomFieldChoices = TableRegistry::getTableLocator()->get('CustomFieldChoices');
        $CustomFieldValues = TableRegistry::getTableLocator()->get('CustomFieldValues');

        $customFieldsArray = [];

        //GET ALL CUSTOM FIELDS FOR EMPLOYEE
        $customFields=$CustomFields->find('all')->where(['table_name' => 'employees'])->contain(['CustomFieldTypes']);
        foreach ($customFields as $customField) {
            $customFieldEntity = [];
            $customFieldEntity['id'] = $customField->id;                //GET CUSTOM FIELD ID
            $customFieldEntity['name'] = $customField->field_name;      //GET CUSTOM FIELD NAME

            //GET CUSTOM FIELD TYPE
            if ($customField->custom_field_type->field_type == 'String') {
                $customFieldEntity['type'] = 'text';
            } elseif ($customField->custom_field_type->field_type == 'Number') {
                $customFieldEntity['type'] = 'number';
            } elseif ($customField->custom_field_type->field_type == 'Dropdown') {
                $customFieldEntity['type'] = 'select';
                $customFieldChoices = $CustomFieldChoices->find('all')->select(['id', 'choice_name'])->where(['field_id' => $customField->id]);
                foreach ($customFieldChoices as $choice) {
                    $customFieldEntity['choices'][$choice->id] = $choice->choice_name;
                }
            }

            //GET CUSTOM FIELD VALUE
            $customFieldEntity['value'] = '';
            $customFieldValues = $CustomFieldValues->find('all')->where(['record_id' => $employee->id, 'field_id' => $customField->id])->select(['field_value']);
            foreach ($customFieldValues as $customFieldValue) {
                $customFieldEntity['value'] = $customFieldValue->field_value;
            }

            $customFieldsArray[] = $customFieldEntity;
        }


        if ($this->request->is(['patch', 'post', 'put'])) {
            $employee = $this->Employees->patchEntity($employee, $this->request->getData());
            $employee['modified_by'] = $this->Auth->user('id');
            if ($this->Employees->save($employee)) {

                //UPDATE CUSTOM FIELDS DATA
                $CustomFieldValues = TableRegistry::getTableLocator()->get('CustomFieldValues');
                $customFieldsData = $this->request->getData('customField');
                foreach ($customFieldsData as $key => $value) {
                    $customFieldValues = $CustomFieldValues->find('all')->where(['record_id' => $id, 'field_id' => $key]);
                    if ($customFieldValues->count() > 0) {
                        foreach ($customFieldValues as $customField) {
                            $field = $CustomFieldValues->get($customField->id);
                            $field['field_value'] = $value;
                            $CustomFieldValues->save($field);
                        }
                    } else {
                        $field = $CustomFieldValues->newEntity([
                            'record_id' => $id,
                            'field_id' => $key,
                            'field_value' => $value
                        ]);
                        $CustomFieldValues->save($field);
                    }
                }

                $this->Flash->success(__('The employee has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The employee could not be saved. Please, try again.'));
        }

        $Users = TableRegistry::getTableLocator()->get('Users');
        $users = $Users->find('all')->select(['id', 'first_name', 'middle_name', 'last_name', 'email']);
        $jobTitles = $this->Employees->JobTitles->find('all');
        $departments = $this->Employees->Departments->find('all');
        $this->set(compact('employee', 'jobTitles', 'departments', 'users', 'customFieldsArray'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Employee id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $employee = $this->Employees->get($id);
        if ($this->Employees->delete($employee)) {
            $CustomFieldValues = TableRegistry::getTableLocator()->get('CustomFieldValues');
            $CustomFieldValues->deleteAll(['record_id' => $id]);
            $this->Flash->success(__('The employee has been deleted.'));
        } else {
            $this->Flash->error(__('The employee could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}

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
    private $Users;
    private $CustomFields;
    private $CustomFieldValues;
    private $CustomFieldChoices;
    public function initialize()
    {
        parent::initialize();
        $this->Users = TableRegistry::getTableLocator()->get('Users');
        $this->CustomFields = TableRegistry::getTableLocator()->get('CustomFields');
        $this->CustomFieldValues = TableRegistry::getTableLocator()->get('CustomFieldValues');
        $this->CustomFieldChoices = TableRegistry::getTableLocator()->get('CustomFieldChoices');
    }
    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        if ($this->request->is('post')) {
            $employeeNum = '';
            if (!empty($this->request->getData('employee_num'))) {
                $employeeNum = $this->request->data['employee_num'];
            }
            
            $usersId = [];
            if (!empty($this->request->getData('email'))) {
                $users = $this->Users->find('all')->select('id')->where(['email LIKE'=>"%".$this->request->getData('email')."%"]);
                foreach ($users as $user) {
                    $usersId[] = $user->id;
                }
            }
            if (!empty($this->request->getData('name'))) {
                $users = $this->Users->find('all')->select('id')->where(
                    ['OR' => [
                            'first_name LIKE' => '%'.$this->request->getData('name').'%',
                            'middle_name LIKE' => '%'.$this->request->getData('name').'%',
                            'last_name LIKE' => '%'.$this->request->getData('name').'%'
                        ]
                    ]
                );
                foreach ($users as $user) {
                    $usersId[] = $user->id;
                }
            }
            $usersId = array_unique($usersId);
        }
        $this->paginate = [
            'contain' => ['JobTitles', 'Departments']
        ];
        if (!empty($employeeNum) && !empty($usersId)) {
            $query = $this->Employees->find('all')->where(['employee_num' => $employeeNum, 'user IN' => $usersId]);
        } elseif (!empty($employeeNum) && empty($usersId)) {
            $query = $this->Employees->find('all')->where(['employee_num' => $employeeNum]);
        } elseif (empty($employeeNum) && !empty($usersId)) {
            $query = $this->Employees->find('all')->where(['user IN' => $usersId]);
        }
        if (isset($query)) {
            $this->set('employees', $this->paginate($query));
        } else {
            $this->set('employees', $this->paginate($this->Employees));
        }
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
        
        //GET USER ENTITY FROM USER TABLE
        $user = $this->Users->get($employee['user']);
        //VARIABLE TO STORE CUSTOM FIELDS DATA
        $customFieldsData = [];
        
        //GET ALL CUSTOM FIELDS ON EMPLOYEES TABLE ALONG WITH THEIR TYPES
        $customFields=$this->CustomFields->find('all')->where(['table_name' => 'employees'])->contain(['CustomFieldTypes']);
        //ITERATE THROUGH EACH CUSTOM FIELD
        foreach ($customFields as $customField) {
            //VARIABLE TO STORE SINGLE CUSTOM FIELD DATA
            $customFieldData = [];
            $customFieldData['name'] = $customField->field_name;
            $customFieldData['value'] = '';
            
            //FIND VALUE FOR THIS CUSTOM FIELD FOR THE CURRENT EMPLOYEE
            $customFieldValues = $this->CustomFieldValues->find('all')->where(['record_id' => $employee->id, 'field_id' => $customField->id])->select(['field_value']);
            foreach ($customFieldValues as $customFieldValue) {
                $customFieldData['value'] = $customFieldValue->field_value;
            }
            //IF THIS CUSTOM FIELD HAS TYPE DROPDOWN
            if ($customField->custom_field_type->field_type == 'Dropdown' && !empty($customFieldData['value'])) {
                $customFieldChoice = $this->CustomFieldChoices->get($customFieldData['value']);
                //GET CHOICE NAME OF THIS CUSTOM DROPDOWN FIELD
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
        //CREATE NEW EMPLOYEE ENTITY
        $employee = $this->Employees->newEntity();
        if ($this->request->is('post')) {
            //LOAD EMPLOYEE ENTITY WITH POST DATA
            $employee = $this->Employees->patchEntity($employee, $this->request->getData());
            //LOAD CREATED BY
            $employee['created_by'] = $this->Auth->user('id');
            
            //IF THE EMPLOYEE IS SAVED
            if ($result = $this->Employees->save($employee)) {
                //GET CUSTOM FIELDS DATA/VALUE FOR THIS EMPLOYEE
                $customFieldsData = $this->request->getData('customField');
                foreach ($customFieldsData as $key => $value) {
                    //CREATE CUSTOM FIELD VALUES ENTITY AND LOAD DATA/VALUE
                    $customFieldValue = $this->CustomFieldValues->newEntity([
                        'record_id' => $result->id,
                        'field_id' => $key,
                        'field_value' => $value
                    ]);
                    
                    //SAVE CUSTOM FIELD VALUES ENTITY
                    $this->CustomFieldValues->save($customFieldValue);
                }
                $this->Flash->success(__('The employee has been saved.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The employee could not be saved. Please, try again.'));
        }
           
        //VARIABLE TO STORE CUSTOM FIELDS ON EMPLOYEES TABLE
        $customFieldsArray = [];
        //FIND ALL CUSTOM FIELDS
        $customFields=$this->CustomFields->find('all')->where(['table_name' => 'employees'])->contain(['CustomFieldTypes']);
        foreach ($customFields as $customField) {
            //VARIABLE TO STORE SINGLE CUSTOM FIELD
            $customFieldEntity = [];
            $customFieldEntity['id'] = $customField->id;
            $customFieldEntity['name'] = $customField->field_name;
            
            //SET HTML INPUT TYPE BASED ON CUSTOM FIELD TYPE
            if ($customField->custom_field_type->field_type == 'String') {
                $customFieldEntity['type'] = 'text';
            } elseif ($customField->custom_field_type->field_type == 'Number') {
                $customFieldEntity['type'] = 'number';
            } elseif ($customField->custom_field_type->field_type == 'Dropdown') {
                $customFieldEntity['type'] = 'select';
                $customFieldChoices = $this->CustomFieldChoices->find('all')->select(['id', 'choice_name'])->where(['field_id' => $customField->id]);
                foreach ($customFieldChoices as $choice) {
                    $customFieldEntity['choices'][$choice->id] = $choice->choice_name;
                }
            }
            //PUSH SINGLE CUSTOM FIELD
            $customFieldsArray[] = $customFieldEntity;
        }
        
        //GET ALL USERS FOR USER AND REPORTING MANAGER INPUT FIELD
        $users = $this->Users->find('all')->select(['id', 'first_name', 'middle_name', 'last_name', 'email']);
        //GET ALL JOB TITLES FOR JOB TITLE INPUT FIELDS
        $jobTitles = $this->Employees->JobTitles->find('list');
        
        //GET ALL DEPARTMENTS FOR DEPARTMENT FIELD
        $departments = $this->Employees->Departments->find('list');
        
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
        //GET EMPLOYEE ENTITY FOR PROVIDED ID
        $employee = $this->Employees->get($id, [
            'contain' => []
        ]);
        //SAVE EMPLOYEE
        if ($this->request->is(['patch', 'post', 'put'])) {
            //LOAD EMPLOYEE ENTITY WITH POST DATA
            $employee = $this->Employees->patchEntity($employee, $this->request->getData());
            //ADD MODIFIED BY
            $employee['modified_by'] = $this->Auth->user('id');
            //IF EMPLOYEE IS SAVED
            if ($this->Employees->save($employee)) {
                $customFieldsData = $this->request->getData('customField');
                //ITERATE THROUGH CUSTOM FIELDS DATA
                foreach ($customFieldsData as $key => $value) {
                    //FIND CUSTOM FIELD VALUE RECORD FOR THIS EMPLOYEE FOR THIS CUSTOM FIELD
                    $customFieldValues = $this->CustomFieldValues->find('all')->where(['record_id' => $id, 'field_id' => $key]);
                    //IF THERE IS ANY CUSTOM FIELD VALUE ENTITY
                    if ($customFieldValues->count() > 0) {
                        //ITERATE THROUGH EVERY CUSTOM FIELD VALUES
                        foreach ($customFieldValues as $customField) {
                            //GET THIS CUSTOM FIELD VALUE ENTITY
                            $field = $this->CustomFieldValues->get($customField->id);
                            //UPDATE VALUE
                            $field['field_value'] = $value;
                            //SAVE CUSTOM FIELD VALUE ENTITY
                            $this->CustomFieldValues->save($field);
                        }
                    }
                    //THERE IS NEW CUSTOM FIELD VALUE ENTITY
                    else {
                        //CREATE NEW CUSTOM FIELD VALUE ENTITY AND LOAD DATA
                        $field = $this->CustomFieldValues->newEntity([
                            'record_id' => $id,
                            'field_id' => $key,
                            'field_value' => $value
                        ]);
                        //SAVE CUSTOM FIELD VALUE ENTITY
                        $this->CustomFieldValues->save($field);
                    }
                }
                
                $this->Flash->success(__('The employee has been saved.'));
                return $this->redirect(['action' => 'index']);
            }            
            $this->Flash->error(__('The employee could not be saved. Please, try again.'));
        }
        //VARIABLE TO STORE CUSTOM FIELDS FOR EMPLOYEE
        $customFieldsArray = [];
        //FIND ALL CUSTOM FIELDS FOR EMPLOYEE
        $customFields=$this->CustomFields->find('all')->where(['table_name' => 'employees'])->contain(['CustomFieldTypes']);
        //ITERATE TROUGH EACH CUSTOM FIELD
        foreach ($customFields as $customField) {
            //VARIABLE TO SORE SINGLE CUSTOM FIELD FOR EMPLOYEE
            $customFieldEntity = [];
            $customFieldEntity['id'] = $customField->id;
            $customFieldEntity['name'] = $customField->field_name;
            //GET HTML INPUT TYPE FORM CUSTOM FIELD TYPE
            if ($customField->custom_field_type->field_type == 'String') {
                $customFieldEntity['type'] = 'text';
            } elseif ($customField->custom_field_type->field_type == 'Number') {
                $customFieldEntity['type'] = 'number';
            } elseif ($customField->custom_field_type->field_type == 'Dropdown') {
                $customFieldEntity['type'] = 'select';
                //IF TYPE IS DROPDOWN THEN GET ITS CHOICES
                $customFieldChoices = $this->CustomFieldChoices->find('all')->select(['id', 'choice_name'])->where(['field_id' => $customField->id]);
                foreach ($customFieldChoices as $choice) {
                    $customFieldEntity['choices'][$choice->id] = $choice->choice_name;
                }
            }
            //VARIABLE TO STORE THIS CUSTOM FIELD VALUE
            $customFieldEntity['value'] = '';
            $customFieldValues = $this->CustomFieldValues->find('all')->where(['record_id' => $employee->id, 'field_id' => $customField->id])->select(['field_value']);
            foreach ($customFieldValues as $customFieldValue) {
                $customFieldEntity['value'] = $customFieldValue->field_value;
            }
            //PUSH SINGLE CUSTOM FIELD ENTITY IN ARRAY
            $customFieldsArray[] = $customFieldEntity;
        }
        //GET ALL USERS FOR USER AND REPORTING MANAGER INPUT FIELD
        $users = $this->Users->find('all')->select(['id', 'first_name', 'middle_name', 'last_name', 'email']);
        //GET ALL JOB TITLES FOR JOB TITLE INPUT FIELDS
        $jobTitles = $this->Employees->JobTitles->find('list');
        
        //GET ALL DEPARTMENTS FOR DEPARTMENT FIELD
        $departments = $this->Employees->Departments->find('list');
        
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

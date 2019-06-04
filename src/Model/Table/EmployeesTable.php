<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Employees Model
 *
 * @property \App\Model\Table\JobTitlesTable|\Cake\ORM\Association\BelongsTo $JobTitles
 * @property \App\Model\Table\DepartmentsTable|\Cake\ORM\Association\BelongsTo $Departments
 *
 * @method \App\Model\Entity\Employee get($primaryKey, $options = [])
 * @method \App\Model\Entity\Employee newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Employee[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Employee|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Employee saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Employee patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Employee[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Employee findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class EmployeesTable extends Table
{
    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('employees');
        $this->setDisplayField('employee_num');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('JobTitles', [
            'foreignKey' => 'job_title_id'
        ]);
        $this->belongsTo('Departments', [
            'foreignKey' => 'department_id'
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->allowEmptyString('id', 'create');

        $validator
            ->requirePresence('user', 'create')
            ->allowEmptyString('user', false)
            ->add('user', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);

        $validator
            ->scalar('employee_num')
            ->maxLength('employee_num', 20)
            ->requirePresence('employee_num', 'create')
            ->allowEmptyString('employee_num', false);

        $validator
            ->allowEmptyString('reporting_manager');

        $validator
            ->scalar('duty_type')
            ->maxLength('duty_type', 16)
            ->requirePresence('duty_type', 'create')
            ->allowEmptyString('duty_type', false);

        $validator
            ->date('hire_date')
            ->requirePresence('hire_date', 'create')
            ->allowEmptyDate('hire_date', false);

        $validator
            ->scalar('termination_date')
            ->requirePresence('termination_date', 'create')
            ->allowEmptyDate('termination_date', false);

        $validator
            ->scalar('termination_reason')
            ->allowEmptyString('termination_reason');

        $validator
            ->scalar('contract_duration')
            ->maxLength('contract_duration', 24)
            ->allowEmptyString('contract_duration');

        $validator
            ->scalar('rate_type')
            ->maxLength('rate_type', 16)
            ->requirePresence('rate_type', 'create')
            ->allowEmptyString('rate_type', false);

        $validator
            ->scalar('hourly_rate')
            ->maxLength('hourly_rate', 24)
            ->allowEmptyString('hourly_rate');

        $validator
            ->scalar('salary')
            ->maxLength('salary', 24)
            ->requirePresence('salary', 'create')
            ->allowEmptyString('salary', false);

        $validator
            ->scalar('pay_frequency')
            ->maxLength('pay_frequency', 24)
            ->requirePresence('pay_frequency', 'create')
            ->allowEmptyString('pay_frequency', false);

        $validator
            ->date('dob')
            ->requirePresence('dob', 'create')
            ->allowEmptyDate('dob', false);

        $validator
            ->scalar('maritial_status')
            ->maxLength('maritial_status', 16)
            ->requirePresence('maritial_status', 'create')
            ->allowEmptyString('maritial_status', false);

        $validator
            ->scalar('gender')
            ->maxLength('gender', 16)
            ->requirePresence('gender', 'create')
            ->allowEmptyString('gender', false);

        $validator
            ->scalar('home_phone')
            ->maxLength('home_phone', 24)
            ->allowEmptyString('home_phone');

        $validator
            ->scalar('personal_email')
            ->maxLength('personal_email', 255)
            ->allowEmptyString('personal_email');

        $validator
            ->scalar('current_address_street')
            ->maxLength('current_address_street', 255)
            ->requirePresence('current_address_street', 'create')
            ->allowEmptyString('current_address_street', false);

        $validator
            ->scalar('current_address_city')
            ->maxLength('current_address_city', 255)
            ->requirePresence('current_address_city', 'create')
            ->allowEmptyString('current_address_city', false);

        $validator
            ->scalar('current_address_state')
            ->maxLength('current_address_state', 255)
            ->requirePresence('current_address_state', 'create')
            ->allowEmptyString('current_address_state', false);

        $validator
            ->scalar('current_address_country')
            ->maxLength('current_address_country', 255)
            ->requirePresence('current_address_country', 'create')
            ->allowEmptyString('current_address_country', false);

        $validator
            ->scalar('permanent_address_street')
            ->maxLength('permanent_address_street', 255)
            ->requirePresence('permanent_address_street', 'create')
            ->allowEmptyString('permanent_address_street', false);

        $validator
            ->scalar('permanent_address_city')
            ->maxLength('permanent_address_city', 255)
            ->requirePresence('permanent_address_city', 'create')
            ->allowEmptyString('permanent_address_city', false);

        $validator
            ->scalar('permanent_address_state')
            ->maxLength('permanent_address_state', 255)
            ->requirePresence('permanent_address_state', 'create')
            ->allowEmptyString('permanent_address_state', false);

        $validator
            ->scalar('permanent_address_country')
            ->maxLength('permanent_address_country', 255)
            ->requirePresence('permanent_address_country', 'create')
            ->allowEmptyString('permanent_address_country', false);

        $validator
            ->scalar('emergency_contact_person_name_1')
            ->maxLength('emergency_contact_person_name_1', 255)
            ->requirePresence('emergency_contact_person_name_1', 'create')
            ->allowEmptyString('emergency_contact_person_name_1', false);

        $validator
            ->scalar('emergency_contact_person_contact_1')
            ->maxLength('emergency_contact_person_contact_1', 24)
            ->requirePresence('emergency_contact_person_contact_1', 'create')
            ->allowEmptyString('emergency_contact_person_contact_1', false);

        $validator
            ->scalar('emergency_contact_person_name_2')
            ->maxLength('emergency_contact_person_name_2', 255)
            ->allowEmptyString('emergency_contact_person_name_2');

        $validator
            ->scalar('emergency_contact_person_contact_2')
            ->maxLength('emergency_contact_person_contact_2', 24)
            ->allowEmptyString('emergency_contact_person_contact_2');

        $validator
            ->boolean('is_active')
            ->requirePresence('is_active', 'create')
            ->allowEmptyString('is_active', false);

        $validator
            ->allowEmptyString('created_by');

        $validator
            ->allowEmptyString('modified_by');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->isUnique(['user']));
        $rules->add($rules->existsIn(['job_title_id'], 'JobTitles'));
        $rules->add($rules->existsIn(['department_id'], 'Departments'));

        return $rules;
    }

    /**
     * Returns the database connection name to use by default.
     *
     * @return string
     */
    public static function defaultConnectionName()
    {
        return 'hrms';
    }
}

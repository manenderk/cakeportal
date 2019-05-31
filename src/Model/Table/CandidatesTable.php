<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Candidates Model
 *
 * @method \App\Model\Entity\Candidate get($primaryKey, $options = [])
 * @method \App\Model\Entity\Candidate newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Candidate[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Candidate|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Candidate saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Candidate patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Candidate[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Candidate findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class CandidatesTable extends Table
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

        $this->setTable('candidates');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Currencies', [
            'foreignKey' => 'current_salary_code',
            'foreignKey' => 'expected_salary_code'
        ]);

        $this->belongsTo('Visas', [
            'foreignKey' => 'visa_status'
        ]);

        $this->belongsTo('Countries', [
            'foreignKey' => 'candidate_country'
        ]);

        $this->belongsTo('States', [
            'foreignKey' => 'candidate_state'
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
            ->scalar('salutation')
            ->maxLength('salutation', 6)
            ->requirePresence('salutation', 'create')
            ->allowEmptyString('salutation', false);

        $validator
            ->scalar('candidate_first_name')
            ->maxLength('candidate_first_name', 100)
            ->requirePresence('candidate_first_name', 'create')
            ->allowEmptyString('candidate_first_name', false);

        $validator
            ->scalar('candidate_middle_name')
            ->maxLength('candidate_middle_name', 50)
            ->allowEmptyString('candidate_middle_name');

        $validator
            ->scalar('candidate_last_name')
            ->maxLength('candidate_last_name', 100)
            ->requirePresence('candidate_last_name', 'create')
            ->allowEmptyString('candidate_last_name', false);

        $validator
            ->scalar('candidate_email')
            ->maxLength('candidate_email', 100)
            ->requirePresence('candidate_email', 'create')
            ->allowEmptyString('candidate_email', false)
            ->add('candidate_email', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);

        $validator
            ->scalar('password')
            ->maxLength('password', 255)
            ->requirePresence('password', 'create')
            ->allowEmptyString('password', false);

        $validator
            ->scalar('candidate_alternate_email')
            ->maxLength('candidate_alternate_email', 100)
            ->allowEmptyString('candidate_alternate_email');

        $validator
            ->scalar('candidate_phone')
            ->maxLength('candidate_phone', 12)
            ->requirePresence('candidate_phone', 'create')
            ->allowEmptyString('candidate_phone', false);

        $validator
            ->scalar('area_code1')
            ->maxLength('area_code1', 6)
            ->allowEmptyString('area_code1');

        $validator
            ->scalar('area_code2')
            ->maxLength('area_code2', 6)
            ->allowEmptyString('area_code2');

        $validator
            ->scalar('dob')
            ->maxLength('dob', 6)
            ->requirePresence('dob', 'create')
            ->allowEmptyString('dob', false);

        $validator
            ->scalar('gender')
            ->allowEmptyString('gender');

        $validator
            ->scalar('current_location')
            ->maxLength('current_location', 250)
            ->requirePresence('current_location', 'create')
            ->allowEmptyString('current_location', false);

        $validator
            ->scalar('nationality')
            ->maxLength('nationality', 20)
            ->requirePresence('nationality', 'create')
            ->allowEmptyString('nationality', false);

        $validator
            ->scalar('ssn_no')
            ->maxLength('ssn_no', 5)
            ->requirePresence('ssn_no', 'create')
            ->allowEmptyString('ssn_no', false);

        $validator
            ->allowEmptyString('visa_status');

        $validator
            ->scalar('candidate_street')
            ->maxLength('candidate_street', 100)
            ->requirePresence('candidate_street', 'create')
            ->allowEmptyString('candidate_street', false);

        $validator
            ->scalar('candidate_city')
            ->maxLength('candidate_city', 45)
            ->requirePresence('candidate_city', 'create')
            ->allowEmptyString('candidate_city', false);

        $validator
            ->scalar('candidate_state')
            ->maxLength('candidate_state', 45)
            ->requirePresence('candidate_state', 'create')
            ->allowEmptyString('candidate_state', false);

        $validator
            ->nonNegativeInteger('candidate_country')
            ->allowEmptyString('candidate_country');

        $validator
            ->scalar('candidate_zipcode')
            ->maxLength('candidate_zipcode', 45)
            ->requirePresence('candidate_zipcode', 'create')
            ->allowEmptyString('candidate_zipcode', false);

        $validator
            ->scalar('contact_no_alternate')
            ->maxLength('contact_no_alternate', 12)
            ->allowEmptyString('contact_no_alternate');

        $validator
            ->scalar('total_it_experience')
            ->maxLength('total_it_experience', 10)
            ->requirePresence('total_it_experience', 'create')
            ->allowEmptyString('total_it_experience', false);

        $validator
            ->scalar('total_overall_experience')
            ->maxLength('total_overall_experience', 10)
            ->requirePresence('total_overall_experience', 'create')
            ->allowEmptyString('total_overall_experience', false);

        $validator
            ->scalar('key_skills')
            ->requirePresence('key_skills', 'create')
            ->allowEmptyString('key_skills', false);

        $validator
            ->scalar('specialization')
            ->requirePresence('specialization', 'create')
            ->allowEmptyString('specialization', false);

        $validator
            ->scalar('current_job_title')
            ->maxLength('current_job_title', 255)
            ->allowEmptyString('current_job_title');

        $validator
            ->scalar('current_employer')
            ->maxLength('current_employer', 100)
            ->allowEmptyString('current_employer');

        $validator
            ->scalar('expected_salary')
            ->maxLength('expected_salary', 100)
            ->allowEmptyString('expected_salary');

        $validator
            ->scalar('current_salary')
            ->maxLength('current_salary', 100)
            ->allowEmptyString('current_salary');

        $validator
            ->nonNegativeInteger('current_salary_code')
            ->allowEmptyString('current_salary_code');

        $validator
            ->nonNegativeInteger('expected_salary_code')
            ->allowEmptyString('expected_salary_code');

        $validator
            ->scalar('twitterid')
            ->maxLength('twitterid', 100)
            ->allowEmptyString('twitterid');

        $validator
            ->scalar('skypeid')
            ->maxLength('skypeid', 100)
            ->allowEmptyString('skypeid');

        $validator
            ->scalar('candidate_description')
            ->requirePresence('candidate_description', 'create')
            ->allowEmptyString('candidate_description', false);

        $validator
            ->scalar('resume')
            ->maxLength('resume', 255)
            ->requirePresence('resume', 'create')
            ->allowEmptyString('resume', false);

        $validator
            ->scalar('cover_letter')
            ->maxLength('cover_letter', 255)
            ->allowEmptyString('cover_letter');

        $validator
            ->scalar('other_files')
            ->maxLength('other_files', 255)
            ->allowEmptyFile('other_files');

        $validator
            ->scalar('profile_pic')
            ->maxLength('profile_pic', 200)
            ->allowEmptyFile('profile_pic');

        $validator
            ->allowEmptyString('candidate_submitted_by');

        $validator
            ->allowEmptyString('candidate_modified_by');

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
        $rules->add($rules->isUnique(['candidate_email']));

        return $rules;
    }

    /**
     * Returns the database connection name to use by default.
     *
     * @return string
     */
    public static function defaultConnectionName()
    {
        return 'atms';
    }
}

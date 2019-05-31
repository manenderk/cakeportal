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
            ->requirePresence('candidate_middle_name', 'create')
            ->allowEmptyString('candidate_middle_name', false);

        $validator
            ->scalar('candidate_last_name')
            ->maxLength('candidate_last_name', 100)
            ->requirePresence('candidate_last_name', 'create')
            ->allowEmptyString('candidate_last_name', false);

        $validator
            ->scalar('candidate_email')
            ->maxLength('candidate_email', 100)
            ->requirePresence('candidate_email', 'create')
            ->allowEmptyString('candidate_email', false);

        $validator
            ->scalar('candidate_alternate_email')
            ->maxLength('candidate_alternate_email', 100)
            ->requirePresence('candidate_alternate_email', 'create')
            ->allowEmptyString('candidate_alternate_email', false);

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
            ->requirePresence('contact_no_alternate', 'create')
            ->allowEmptyString('contact_no_alternate', false);

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
            ->requirePresence('current_job_title', 'create')
            ->allowEmptyString('current_job_title', false);

        $validator
            ->scalar('current_employer')
            ->maxLength('current_employer', 100)
            ->requirePresence('current_employer', 'create')
            ->allowEmptyString('current_employer', false);

        $validator
            ->scalar('expected_salary')
            ->maxLength('expected_salary', 100)
            ->requirePresence('expected_salary', 'create')
            ->allowEmptyString('expected_salary', false);

        $validator
            ->scalar('current_salary')
            ->maxLength('current_salary', 100)
            ->requirePresence('current_salary', 'create')
            ->allowEmptyString('current_salary', false);

        $validator
            ->scalar('current_salary_code')
            ->maxLength('current_salary_code', 4)
            ->requirePresence('current_salary_code', 'create')
            ->allowEmptyString('current_salary_code', false);

        $validator
            ->scalar('expected_salary_code')
            ->maxLength('expected_salary_code', 4)
            ->requirePresence('expected_salary_code', 'create')
            ->allowEmptyString('expected_salary_code', false);

        $validator
            ->scalar('twitterid')
            ->maxLength('twitterid', 100)
            ->requirePresence('twitterid', 'create')
            ->allowEmptyString('twitterid', false);

        $validator
            ->scalar('skypeid')
            ->maxLength('skypeid', 100)
            ->requirePresence('skypeid', 'create')
            ->allowEmptyString('skypeid', false);

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
            ->requirePresence('cover_letter', 'create')
            ->allowEmptyString('cover_letter', false);

        $validator
            ->scalar('other_files')
            ->maxLength('other_files', 255)
            ->requirePresence('other_files', 'create')
            ->allowEmptyFile('other_files', false);

        $validator
            ->scalar('profile_pic')
            ->maxLength('profile_pic', 200)
            ->requirePresence('profile_pic', 'create')
            ->allowEmptyFile('profile_pic', false);

        $validator
            ->integer('candidate_submitted_by')
            ->requirePresence('candidate_submitted_by', 'create')
            ->allowEmptyString('candidate_submitted_by', false);

        $validator
            ->integer('candidate_modified_by')
            ->requirePresence('candidate_modified_by', 'create')
            ->allowEmptyString('candidate_modified_by', false);

        return $validator;
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

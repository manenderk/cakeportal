<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Candidate Entity
 *
 * @property int $id
 * @property string $salutation
 * @property string $candidate_first_name
 * @property string $candidate_middle_name
 * @property string $candidate_last_name
 * @property string $candidate_email
 * @property string $candidate_alternate_email
 * @property string $candidate_phone
 * @property string|null $area_code1
 * @property string|null $area_code2
 * @property string $dob
 * @property string|null $gender
 * @property string $current_location
 * @property string $nationality
 * @property string $ssn_no
 * @property int|null $visa_status
 * @property string $candidate_street
 * @property string $candidate_city
 * @property string $candidate_state
 * @property int|null $candidate_country
 * @property string $candidate_zipcode
 * @property string $contact_no_alternate
 * @property string $total_it_experience
 * @property string $total_overall_experience
 * @property string $key_skills
 * @property string $specialization
 * @property string $current_job_title
 * @property string $current_employer
 * @property string $expected_salary
 * @property string $current_salary
 * @property string $current_salary_code
 * @property string $expected_salary_code
 * @property string $twitterid
 * @property string $skypeid
 * @property string $candidate_description
 * @property string $resume
 * @property string $cover_letter
 * @property string $other_files
 * @property string $profile_pic
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime|null $modified
 * @property int $candidate_submitted_by
 * @property int $candidate_modified_by
 */
class Candidate extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        'salutation' => true,
        'candidate_first_name' => true,
        'candidate_middle_name' => true,
        'candidate_last_name' => true,
        'candidate_email' => true,
        'candidate_alternate_email' => true,
        'candidate_phone' => true,
        'area_code1' => true,
        'area_code2' => true,
        'dob' => true,
        'gender' => true,
        'current_location' => true,
        'nationality' => true,
        'ssn_no' => true,
        'visa_status' => true,
        'candidate_street' => true,
        'candidate_city' => true,
        'candidate_state' => true,
        'candidate_country' => true,
        'candidate_zipcode' => true,
        'contact_no_alternate' => true,
        'total_it_experience' => true,
        'total_overall_experience' => true,
        'key_skills' => true,
        'specialization' => true,
        'current_job_title' => true,
        'current_employer' => true,
        'expected_salary' => true,
        'current_salary' => true,
        'current_salary_code' => true,
        'expected_salary_code' => true,
        'twitterid' => true,
        'skypeid' => true,
        'candidate_description' => true,
        'resume' => true,
        'cover_letter' => true,
        'other_files' => true,
        'profile_pic' => true,
        'created' => true,
        'modified' => true,
        'candidate_submitted_by' => true,
        'candidate_modified_by' => true
    ];
}

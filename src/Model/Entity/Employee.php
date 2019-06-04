<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Employee Entity
 *
 * @property int $id
 * @property int $user
 * @property string $employee_num
 * @property int|null $reporting_manager
 * @property int|null $job_title_id
 * @property int|null $department_id
 * @property string $duty_type
 * @property \Cake\I18n\FrozenDate $hire_date
 * @property string|null $termination_date
 * @property string|null $termination_reason
 * @property string|null $contract_duration
 * @property string $rate_type
 * @property string|null $hourly_rate
 * @property string $salary
 * @property string $pay_frequency
 * @property \Cake\I18n\FrozenDate $dob
 * @property string $maritial_status
 * @property string $gender
 * @property string|null $home_phone
 * @property string|null $personal_email
 * @property string $current_address_street
 * @property string $current_address_city
 * @property string $current_address_state
 * @property string $permanent_address_street
 * @property string $permanent_address_city
 * @property string $permanent_address_state
 * @property string $permanent_address_country
 * @property string $emergency_contact_person_name_1
 * @property string $emergency_contact_person_contact_1
 * @property string|null $emergency_contact_person_name_2
 * @property string|null $emergency_contact_person_contact_2
 * @property bool $is_active
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 * @property int|null $created_by
 * @property int|null $modified_by
 *
 * @property \App\Model\Entity\JobTitle $job_title
 * @property \App\Model\Entity\Department $department
 */
class Employee extends Entity
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
        'user' => true,
        'employee_num' => true,
        'reporting_manager' => true,
        'job_title_id' => true,
        'department_id' => true,
        'duty_type' => true,
        'hire_date' => true,
        'termination_date' => true,
        'termination_reason' => true,
        'contract_duration' => true,
        'rate_type' => true,
        'hourly_rate' => true,
        'salary' => true,
        'pay_frequency' => true,
        'dob' => true,
        'maritial_status' => true,
        'gender' => true,
        'home_phone' => true,
        'personal_email' => true,
        'current_address_street' => true,
        'current_address_city' => true,
        'current_address_state' => true,
        'current_address_country' => true,
        'permanent_address_street' => true,
        'permanent_address_city' => true,
        'permanent_address_state' => true,
        'permanent_address_country' => true,
        'emergency_contact_person_name_1' => true,
        'emergency_contact_person_contact_1' => true,
        'emergency_contact_person_name_2' => true,
        'emergency_contact_person_contact_2' => true,
        'is_active' => true,
        'created' => true,
        'modified' => true,
        'created_by' => true,
        'modified_by' => true,
        'job_title' => true,
        'department' => true
    ];
}

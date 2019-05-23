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
        'is_active' => true,
        'created' => true,
        'modified' => true,
        'created_by' => true,
        'modified_by' => true,
        'job_title' => true,
        'department' => true
    ];
}

<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * CustomFieldValue Entity
 *
 * @property int $id
 * @property int $record_id
 * @property int $field_id
 * @property string $field_value
 *
 * @property \App\Model\Entity\Record $record
 * @property \App\Model\Entity\CustomField $custom_field
 */
class CustomFieldValue extends Entity
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
        'record_id' => true,
        'field_id' => true,
        'field_value' => true,
        'record' => true,
        'custom_field' => true
    ];
}

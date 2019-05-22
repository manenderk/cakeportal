<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * CustomField Entity
 *
 * @property int $id
 * @property string $field_name
 * @property int $field_type_id
 * @property string $table_name
 * @property \Cake\I18n\FrozenDate $created
 * @property \Cake\I18n\FrozenDate $modified
 *
 * @property \App\Model\Entity\CustomFieldType $custom_field_type
 */
class CustomField extends Entity
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
        'field_name' => true,
        'field_type_id' => true,
        'table_name' => true,
        'created' => true,
        'modified' => true,
        'custom_field_type' => true
    ];
}

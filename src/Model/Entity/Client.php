<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Client Entity
 *
 * @property int $id
 * @property string $name
 * @property string|null $client_manager_name
 * @property string $email
 * @property string $description
 * @property bool $status
 * @property bool|null $is_contract_signed
 * @property \Cake\I18n\FrozenDate|null $contract_expiry_date
 * @property string|null $client_logo
 * @property \Cake\I18n\FrozenDate $created
 * @property \Cake\I18n\FrozenDate $modified
 * @property int $created_by
 * @property int $modified_by
 */
class Client extends Entity
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
        'name' => true,
        'client_manager_name' => true,
        'email' => true,
        'description' => true,
        'status' => true,
        'is_contract_signed' => true,
        'contract_expiry_date' => true,
        'client_logo' => true,
        'created' => true,
        'modified' => true,
        'created_by' => true,
        'modified_by' => true
    ];
}

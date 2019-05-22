<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * CustomFieldTypes Model
 *
 * @method \App\Model\Entity\CustomFieldType get($primaryKey, $options = [])
 * @method \App\Model\Entity\CustomFieldType newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\CustomFieldType[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\CustomFieldType|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\CustomFieldType saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\CustomFieldType patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\CustomFieldType[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\CustomFieldType findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class CustomFieldTypesTable extends Table
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

        $this->setTable('custom_field_types');
        $this->setDisplayField('field_type');
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
            ->nonNegativeInteger('id')
            ->allowEmptyString('id', 'create');

        $validator
            ->scalar('field_type')
            ->maxLength('field_type', 255)
            ->requirePresence('field_type', 'create')
            ->allowEmptyString('field_type', false);

        return $validator;
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

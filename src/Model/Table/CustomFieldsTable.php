<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * CustomFields Model
 *
 * @property \App\Model\Table\CustomFieldTypesTable|\Cake\ORM\Association\BelongsTo $CustomFieldTypes
 *
 * @method \App\Model\Entity\CustomField get($primaryKey, $options = [])
 * @method \App\Model\Entity\CustomField newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\CustomField[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\CustomField|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\CustomField saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\CustomField patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\CustomField[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\CustomField findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class CustomFieldsTable extends Table
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

        $this->setTable('custom_fields');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('CustomFieldTypes', [
            'foreignKey' => 'field_type_id',
            'joinType' => 'INNER'
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
            ->nonNegativeInteger('id')
            ->allowEmptyString('id', 'create');

        $validator
            ->scalar('field_name')
            ->maxLength('field_name', 255)
            ->requirePresence('field_name', 'create')
            ->allowEmptyString('field_name', false);

        $validator
            ->scalar('table_name')
            ->maxLength('table_name', 255)
            ->requirePresence('table_name', 'create')
            ->allowEmptyString('table_name', false);

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
        $rules->add($rules->existsIn(['field_type_id'], 'CustomFieldTypes'));

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

<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * CustomFieldValues Model
 *
 * @property \App\Model\Table\RecordsTable|\Cake\ORM\Association\BelongsTo $Records
 * @property \App\Model\Table\CustomFieldsTable|\Cake\ORM\Association\BelongsTo $CustomFields
 *
 * @method \App\Model\Entity\CustomFieldValue get($primaryKey, $options = [])
 * @method \App\Model\Entity\CustomFieldValue newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\CustomFieldValue[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\CustomFieldValue|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\CustomFieldValue saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\CustomFieldValue patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\CustomFieldValue[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\CustomFieldValue findOrCreate($search, callable $callback = null, $options = [])
 */
class CustomFieldValuesTable extends Table
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

        $this->setTable('custom_field_values');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('CustomFields', [
            'foreignKey' => 'field_id',
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
            ->scalar('field_value')
            ->requirePresence('field_value', 'create')
            ->allowEmptyString('field_value', false);

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
        $rules->add($rules->existsIn(['field_id'], 'CustomFields'));

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

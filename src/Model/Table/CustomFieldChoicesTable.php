<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * CustomFieldChoices Model
 *
 * @property \App\Model\Table\CustomFieldsTable|\Cake\ORM\Association\BelongsTo $CustomFields
 *
 * @method \App\Model\Entity\CustomFieldChoice get($primaryKey, $options = [])
 * @method \App\Model\Entity\CustomFieldChoice newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\CustomFieldChoice[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\CustomFieldChoice|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\CustomFieldChoice saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\CustomFieldChoice patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\CustomFieldChoice[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\CustomFieldChoice findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class CustomFieldChoicesTable extends Table
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

        $this->setTable('custom_field_choices');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

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
            ->scalar('choice_name')
            ->maxLength('choice_name', 255)
            ->requirePresence('choice_name', 'create')
            ->allowEmptyString('choice_name', false);

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

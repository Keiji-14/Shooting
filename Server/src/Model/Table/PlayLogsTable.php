<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * PlayLogs Model
 *
 * @property \App\Model\Table\UsersTable&\Cake\ORM\Association\BelongsTo $Users
 * @property \App\Model\Table\WeaponsTable&\Cake\ORM\Association\BelongsTo $Weapons
 * @property \App\Model\Table\SkinsTable&\Cake\ORM\Association\BelongsTo $Skins
 * @property \App\Model\Table\StagesTable&\Cake\ORM\Association\BelongsTo $Stages
 *
 * @method \App\Model\Entity\PlayLog newEmptyEntity()
 * @method \App\Model\Entity\PlayLog newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\PlayLog[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\PlayLog get($primaryKey, $options = [])
 * @method \App\Model\Entity\PlayLog findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\PlayLog patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\PlayLog[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\PlayLog|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\PlayLog saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\PlayLog[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\PlayLog[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\PlayLog[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\PlayLog[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class PlayLogsTable extends Table
{
    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('play_logs');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp', [
            'events' => [
                'Model.beforeSave' => [
                    'create_date' => 'new',
                    'update_date' => 'always',
                ]
            ]
        ]);

        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
        ]);
        $this->belongsTo('Weapons', [
            'foreignKey' => 'weapon_id',
        ]);
        $this->belongsTo('Skins', [
            'foreignKey' => 'skin_id',
        ]);
        $this->belongsTo('Stages', [
            'foreignKey' => 'stage_id',
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator): Validator
    {
        $validator
            ->scalar('user_id')
            ->maxLength('user_id', 255)
            ->allowEmptyString('user_id');

        $validator
            ->scalar('weapon_id')
            ->maxLength('weapon_id', 255)
            ->allowEmptyString('weapon_id');

        $validator
            ->scalar('skin_id')
            ->maxLength('skin_id', 255)
            ->allowEmptyString('skin_id');

        $validator
            ->scalar('stage_id')
            ->maxLength('stage_id', 255)
            ->allowEmptyString('stage_id');

        $validator
            ->integer('score_type')
            ->allowEmptyString('score_type');

        $validator
            ->scalar('score')
            ->maxLength('score', 255)
            ->allowEmptyString('score');

        $validator
            ->boolean('play_result')
            ->allowEmptyString('play_result');

        $validator
            ->integer('coin_result')
            ->allowEmptyString('coin_result');

        $validator
            ->dateTime('update_date')
            ->allowEmptyDateTime('update_date');

        $validator
            ->dateTime('create_date')
            ->allowEmptyDateTime('create_date');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules): RulesChecker
    {
        $rules->add($rules->existsIn('user_id', 'Users'), ['errorField' => 'user_id']);
        $rules->add($rules->existsIn('weapon_id', 'Weapons'), ['errorField' => 'weapon_id']);
        $rules->add($rules->existsIn('skin_id', 'Skins'), ['errorField' => 'skin_id']);
        $rules->add($rules->existsIn('stage_id', 'Stages'), ['errorField' => 'stage_id']);

        return $rules;
    }
}

<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * WeaponInfors Model
 *
 * @property \App\Model\Table\UsersTable&\Cake\ORM\Association\BelongsTo $Users
 * @property \App\Model\Table\WeaponsTable&\Cake\ORM\Association\BelongsTo $Weapons
 * @property \App\Model\Table\GachaLogsTable&\Cake\ORM\Association\BelongsTo $GachaLogs
 *
 * @method \App\Model\Entity\WeaponInfor newEmptyEntity()
 * @method \App\Model\Entity\WeaponInfor newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\WeaponInfor[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\WeaponInfor get($primaryKey, $options = [])
 * @method \App\Model\Entity\WeaponInfor findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\WeaponInfor patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\WeaponInfor[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\WeaponInfor|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\WeaponInfor saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\WeaponInfor[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\WeaponInfor[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\WeaponInfor[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\WeaponInfor[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class WeaponInforsTable extends Table
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

        $this->setTable('weapon_infors');
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
        $this->belongsTo('GachaLogs', [
            'foreignKey' => 'gacha_log_id',
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
            ->scalar('gacha_log_id')
            ->maxLength('gacha_log_id', 255)
            ->allowEmptyString('gacha_log_id');

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
        $rules->add($rules->existsIn('gacha_log_id', 'GachaLogs'), ['errorField' => 'gacha_log_id']);

        return $rules;
    }
}

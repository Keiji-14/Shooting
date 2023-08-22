<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * GachaLogs Model
 *
 * @property \App\Model\Table\GachasTable&\Cake\ORM\Association\BelongsTo $Gachas
 * @property \App\Model\Table\UsersTable&\Cake\ORM\Association\BelongsTo $Users
 * @property \App\Model\Table\WeaponsTable&\Cake\ORM\Association\BelongsTo $Weapons
 * @property \App\Model\Table\SkinsTable&\Cake\ORM\Association\BelongsTo $Skins
 * @property \App\Model\Table\SkinInforsTable&\Cake\ORM\Association\HasOne $SkinInfors
 * @property \App\Model\Table\WeaponInforsTable&\Cake\ORM\Association\HasOne $WeaponInfors
 *
 * @method \App\Model\Entity\GachaLog newEmptyEntity()
 * @method \App\Model\Entity\GachaLog newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\GachaLog[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\GachaLog get($primaryKey, $options = [])
 * @method \App\Model\Entity\GachaLog findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\GachaLog patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\GachaLog[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\GachaLog|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\GachaLog saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\GachaLog[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\GachaLog[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\GachaLog[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\GachaLog[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class GachaLogsTable extends Table
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

        $this->setTable('gacha_logs');
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

        $this->belongsTo('Gachas', [
            'foreignKey' => 'gacha_id',
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
        $this->hasOne('SkinInfors', [
            'foreignKey' => 'gacha_log_id',
        ]);
        $this->hasOne('WeaponInfors', [
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
            ->scalar('gacha_id')
            ->maxLength('gacha_id', 255)
            ->allowEmptyString('gacha_id');

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
        $rules->add($rules->existsIn('gacha_id', 'Gachas'), ['errorField' => 'gacha_id']);
        $rules->add($rules->existsIn('user_id', 'Users'), ['errorField' => 'user_id']);
        $rules->add($rules->existsIn('weapon_id', 'Weapons'), ['errorField' => 'weapon_id']);
        $rules->add($rules->existsIn('skin_id', 'Skins'), ['errorField' => 'skin_id']);

        return $rules;
    }
}

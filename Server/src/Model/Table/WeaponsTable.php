<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Weapons Model
 *
 * @property \App\Model\Table\GachaLogsTable&\Cake\ORM\Association\HasMany $GachaLogs
 * @property \App\Model\Table\GachaRatesTable&\Cake\ORM\Association\HasMany $GachaRates
 * @property \App\Model\Table\PlayLogsTable&\Cake\ORM\Association\HasMany $PlayLogs
 * @property \App\Model\Table\WeaponInforsTable&\Cake\ORM\Association\HasMany $WeaponInfors
 *
 * @method \App\Model\Entity\Weapon newEmptyEntity()
 * @method \App\Model\Entity\Weapon newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Weapon[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Weapon get($primaryKey, $options = [])
 * @method \App\Model\Entity\Weapon findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Weapon patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Weapon[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Weapon|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Weapon saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Weapon[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Weapon[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Weapon[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Weapon[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class WeaponsTable extends Table
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

        $this->setTable('weapons');
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

        $this->hasMany('GachaLogs', [
            'foreignKey' => 'weapon_id',
        ]);
        $this->hasMany('GachaRates', [
            'foreignKey' => 'weapon_id',
        ]);
        $this->hasMany('PlayLogs', [
            'foreignKey' => 'weapon_id',
        ]);
        $this->hasMany('WeaponInfors', [
            'foreignKey' => 'weapon_id',
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
            ->scalar('weapon_name')
            ->maxLength('weapon_name', 255)
            ->allowEmptyString('weapon_name');

        $validator
            ->integer('weapon_type')
            ->allowEmptyString('weapon_type');

        $validator
            ->numeric('weapon_damage')
            ->allowEmptyString('weapon_damage');

        $validator
            ->numeric('weapon_speed')
            ->allowEmptyString('weapon_speed');

        $validator
            ->dateTime('update_date')
            ->allowEmptyDateTime('update_date');

        $validator
            ->dateTime('create_date')
            ->allowEmptyDateTime('create_date');

        return $validator;
    }
}

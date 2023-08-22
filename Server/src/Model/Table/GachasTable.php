<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Gachas Model
 *
 * @property \App\Model\Table\GachaLogsTable&\Cake\ORM\Association\HasMany $GachaLogs
 * @property \App\Model\Table\GachaRatesTable&\Cake\ORM\Association\HasMany $GachaRates
 *
 * @method \App\Model\Entity\Gacha newEmptyEntity()
 * @method \App\Model\Entity\Gacha newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Gacha[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Gacha get($primaryKey, $options = [])
 * @method \App\Model\Entity\Gacha findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Gacha patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Gacha[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Gacha|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Gacha saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Gacha[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Gacha[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Gacha[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Gacha[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class GachasTable extends Table
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

        $this->setTable('gachas');
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
            'foreignKey' => 'gacha_id',
        ]);
        $this->hasMany('GachaRates', [
            'foreignKey' => 'gacha_id',
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
            ->scalar('gacha_name')
            ->maxLength('gacha_name', 255)
            ->allowEmptyString('gacha_name');

        $validator
            ->integer('gacha_type')
            ->allowEmptyString('gacha_type');

        $validator
            ->integer('gacha_count')
            ->allowEmptyString('gacha_count');

        $validator
            ->integer('consume_coin')
            ->allowEmptyString('consume_coin');

        $validator
            ->dateTime('update_date')
            ->allowEmptyDateTime('update_date');

        $validator
            ->dateTime('create_date')
            ->allowEmptyDateTime('create_date');

        return $validator;
    }
}

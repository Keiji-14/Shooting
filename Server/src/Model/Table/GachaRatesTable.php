<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * GachaRates Model
 *
 * @property \App\Model\Table\SkinsTable&\Cake\ORM\Association\BelongsTo $Skins
 * @property \App\Model\Table\WeaponsTable&\Cake\ORM\Association\BelongsTo $Weapons
 * @property \App\Model\Table\GachasTable&\Cake\ORM\Association\BelongsTo $Gachas
 *
 * @method \App\Model\Entity\GachaRate newEmptyEntity()
 * @method \App\Model\Entity\GachaRate newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\GachaRate[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\GachaRate get($primaryKey, $options = [])
 * @method \App\Model\Entity\GachaRate findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\GachaRate patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\GachaRate[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\GachaRate|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\GachaRate saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\GachaRate[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\GachaRate[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\GachaRate[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\GachaRate[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class GachaRatesTable extends Table
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

        $this->setTable('gacha_rates');
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

        $this->belongsTo('Skins', [
            'foreignKey' => 'skin_id',
        ]);
        $this->belongsTo('Weapons', [
            'foreignKey' => 'weapon_id',
        ]);
        $this->belongsTo('Gachas', [
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
            ->scalar('skin_id')
            ->maxLength('skin_id', 255)
            ->allowEmptyString('skin_id');

        $validator
            ->scalar('weapon_id')
            ->maxLength('weapon_id', 255)
            ->allowEmptyString('weapon_id');

        $validator
            ->scalar('gacha_id')
            ->maxLength('gacha_id', 255)
            ->allowEmptyString('gacha_id');

        $validator
            ->numeric('gacha_rate')
            ->allowEmptyString('gacha_rate');

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
        $rules->add($rules->existsIn('skin_id', 'Skins'), ['errorField' => 'skin_id']);
        $rules->add($rules->existsIn('weapon_id', 'Weapons'), ['errorField' => 'weapon_id']);
        $rules->add($rules->existsIn('gacha_id', 'Gachas'), ['errorField' => 'gacha_id']);

        return $rules;
    }
}

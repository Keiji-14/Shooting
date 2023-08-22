<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Skins Model
 *
 * @property \App\Model\Table\GachaLogsTable&\Cake\ORM\Association\HasMany $GachaLogs
 * @property \App\Model\Table\GachaRatesTable&\Cake\ORM\Association\HasMany $GachaRates
 * @property \App\Model\Table\PlayLogsTable&\Cake\ORM\Association\HasMany $PlayLogs
 * @property \App\Model\Table\SkinInforsTable&\Cake\ORM\Association\HasMany $SkinInfors
 *
 * @method \App\Model\Entity\Skin newEmptyEntity()
 * @method \App\Model\Entity\Skin newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Skin[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Skin get($primaryKey, $options = [])
 * @method \App\Model\Entity\Skin findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Skin patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Skin[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Skin|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Skin saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Skin[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Skin[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Skin[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Skin[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class SkinsTable extends Table
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

        $this->setTable('skins');
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
            'foreignKey' => 'skin_id',
        ]);
        $this->hasMany('GachaRates', [
            'foreignKey' => 'skin_id',
        ]);
        $this->hasMany('PlayLogs', [
            'foreignKey' => 'skin_id',
        ]);
        $this->hasMany('SkinInfors', [
            'foreignKey' => 'skin_id',
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
            ->scalar('skin_name')
            ->maxLength('skin_name', 255)
            ->allowEmptyString('skin_name');

        $validator
            ->scalar('address')
            ->maxLength('address', 255)
            ->allowEmptyString('address');

        $validator
            ->dateTime('update_date')
            ->allowEmptyDateTime('update_date');

        $validator
            ->dateTime('create_date')
            ->allowEmptyDateTime('create_date');

        return $validator;
    }
}

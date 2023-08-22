<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * User Entity
 *
 * @property int $id
 * @property string|null $user_name
 * @property string|null $password
 * @property int|null $current_coin
 * @property \Cake\I18n\FrozenTime|null $update_date
 * @property \Cake\I18n\FrozenTime|null $create_date
 *
 * @property \App\Model\Entity\GachaLog[] $gacha_logs
 * @property \App\Model\Entity\PlayLog[] $play_logs
 * @property \App\Model\Entity\SkinInfor[] $skin_infors
 * @property \App\Model\Entity\WeaponInfor[] $weapon_infors
 */
class User extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array<string, bool>
     */
    protected $_accessible = [
        'user_name' => true,
        'password' => true,
        'current_coin' => true,
        'update_date' => true,
        'create_date' => true,
        'gacha_logs' => true,
        'play_logs' => true,
        'skin_infors' => true,
        'weapon_infors' => true,
    ];

    /**
     * Fields that are excluded from JSON versions of the entity.
     *
     * @var array<string>
     */
    protected $_hidden = [
        'password',
    ];
}

<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * GachaRate Entity
 *
 * @property int $id
 * @property string|null $skin_id
 * @property string|null $weapon_id
 * @property string|null $gacha_id
 * @property float|null $gacha_rate
 * @property \Cake\I18n\FrozenTime|null $update_date
 * @property \Cake\I18n\FrozenTime|null $create_date
 *
 * @property \App\Model\Entity\Skin $skin
 * @property \App\Model\Entity\Weapon $weapon
 * @property \App\Model\Entity\Gacha $gacha
 */
class GachaRate extends Entity
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
        'skin_id' => true,
        'weapon_id' => true,
        'gacha_id' => true,
        'gacha_rate' => true,
        'update_date' => true,
        'create_date' => true,
        'skin' => true,
        'weapon' => true,
        'gacha' => true,
    ];
}

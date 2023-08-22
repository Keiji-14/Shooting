<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Skin Entity
 *
 * @property int $id
 * @property string|null $skin_name
 * @property string|null $address
 * @property \Cake\I18n\FrozenTime|null $update_date
 * @property \Cake\I18n\FrozenTime|null $create_date
 *
 * @property \App\Model\Entity\GachaLog[] $gacha_logs
 * @property \App\Model\Entity\GachaRate[] $gacha_rates
 * @property \App\Model\Entity\PlayLog[] $play_logs
 * @property \App\Model\Entity\SkinInfor[] $skin_infors
 */
class Skin extends Entity
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
        'skin_name' => true,
        'address' => true,
        'update_date' => true,
        'create_date' => true,
        'gacha_logs' => true,
        'gacha_rates' => true,
        'play_logs' => true,
        'skin_infors' => true,
    ];
}

<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Gacha Entity
 *
 * @property int $id
 * @property string|null $gacha_name
 * @property int|null $gacha_type
 * @property int|null $gacha_count
 * @property int|null $consume_coin
 * @property \Cake\I18n\FrozenTime|null $update_date
 * @property \Cake\I18n\FrozenTime|null $create_date
 *
 * @property \App\Model\Entity\GachaLog[] $gacha_logs
 * @property \App\Model\Entity\GachaRate[] $gacha_rates
 */
class Gacha extends Entity
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
        'gacha_name' => true,
        'gacha_type' => true,
        'gacha_count' => true,
        'consume_coin' => true,
        'update_date' => true,
        'create_date' => true,
        'gacha_logs' => true,
        'gacha_rates' => true,
    ];
}

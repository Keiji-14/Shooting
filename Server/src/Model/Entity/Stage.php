<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Stage Entity
 *
 * @property int $id
 * @property int|null $stage_level
 * @property int|null $stage_level_level
 * @property string|null $address
 * @property \Cake\I18n\FrozenTime|null $update_date
 * @property \Cake\I18n\FrozenTime|null $create_date
 *
 * @property \App\Model\Entity\PlayLog[] $play_logs
 */
class Stage extends Entity
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
        'stage_level' => true,
        'stage_level_level' => true,
        'address' => true,
        'update_date' => true,
        'create_date' => true,
        'play_logs' => true,
    ];
}

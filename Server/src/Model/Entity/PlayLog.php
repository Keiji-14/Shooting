<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * PlayLog Entity
 *
 * @property int $id
 * @property string|null $user_id
 * @property string|null $weapon_id
 * @property string|null $skin_id
 * @property string|null $stage_id
 * @property int|null $score_type
 * @property string|null $score
 * @property bool|null $play_result
 * @property int|null $coin_result
 * @property \Cake\I18n\FrozenTime|null $update_date
 * @property \Cake\I18n\FrozenTime|null $create_date
 *
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\Weapon $weapon
 * @property \App\Model\Entity\Skin $skin
 * @property \App\Model\Entity\Stage $stage
 */
class PlayLog extends Entity
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
        'user_id' => true,
        'weapon_id' => true,
        'skin_id' => true,
        'stage_id' => true,
        'score_type' => true,
        'score' => true,
        'play_result' => true,
        'coin_result' => true,
        'update_date' => true,
        'create_date' => true,
        'user' => true,
        'weapon' => true,
        'skin' => true,
        'stage' => true,
    ];
}

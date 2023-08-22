<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Weapon $weapon
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Weapon'), ['action' => 'edit', $weapon->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Weapon'), ['action' => 'delete', $weapon->id], ['confirm' => __('Are you sure you want to delete # {0}?', $weapon->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Weapons'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Weapon'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="weapons view content">
            <h3><?= h($weapon->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Weapon Name') ?></th>
                    <td><?= h($weapon->weapon_name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($weapon->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Weapon Type') ?></th>
                    <td><?= $weapon->weapon_type === null ? '' : $this->Number->format($weapon->weapon_type) ?></td>
                </tr>
                <tr>
                    <th><?= __('Weapon Damage') ?></th>
                    <td><?= $weapon->weapon_damage === null ? '' : $this->Number->format($weapon->weapon_damage) ?></td>
                </tr>
                <tr>
                    <th><?= __('Weapon Speed') ?></th>
                    <td><?= $weapon->weapon_speed === null ? '' : $this->Number->format($weapon->weapon_speed) ?></td>
                </tr>
                <tr>
                    <th><?= __('Update Date') ?></th>
                    <td><?= h($weapon->update_date) ?></td>
                </tr>
                <tr>
                    <th><?= __('Create Date') ?></th>
                    <td><?= h($weapon->create_date) ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related Gacha Logs') ?></h4>
                <?php if (!empty($weapon->gacha_logs)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Gacha Id') ?></th>
                            <th><?= __('User Id') ?></th>
                            <th><?= __('Weapon Id') ?></th>
                            <th><?= __('Skin Id') ?></th>
                            <th><?= __('Update Date') ?></th>
                            <th><?= __('Create Date') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($weapon->gacha_logs as $gachaLogs) : ?>
                        <tr>
                            <td><?= h($gachaLogs->id) ?></td>
                            <td><?= h($gachaLogs->gacha_id) ?></td>
                            <td><?= h($gachaLogs->user_id) ?></td>
                            <td><?= h($gachaLogs->weapon_id) ?></td>
                            <td><?= h($gachaLogs->skin_id) ?></td>
                            <td><?= h($gachaLogs->update_date) ?></td>
                            <td><?= h($gachaLogs->create_date) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'GachaLogs', 'action' => 'view', $gachaLogs->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'GachaLogs', 'action' => 'edit', $gachaLogs->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'GachaLogs', 'action' => 'delete', $gachaLogs->id], ['confirm' => __('Are you sure you want to delete # {0}?', $gachaLogs->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
            <div class="related">
                <h4><?= __('Related Gacha Rates') ?></h4>
                <?php if (!empty($weapon->gacha_rates)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Skin Id') ?></th>
                            <th><?= __('Weapon Id') ?></th>
                            <th><?= __('Gacha Id') ?></th>
                            <th><?= __('Gacha Rate') ?></th>
                            <th><?= __('Update Date') ?></th>
                            <th><?= __('Create Date') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($weapon->gacha_rates as $gachaRates) : ?>
                        <tr>
                            <td><?= h($gachaRates->id) ?></td>
                            <td><?= h($gachaRates->skin_id) ?></td>
                            <td><?= h($gachaRates->weapon_id) ?></td>
                            <td><?= h($gachaRates->gacha_id) ?></td>
                            <td><?= h($gachaRates->gacha_rate) ?></td>
                            <td><?= h($gachaRates->update_date) ?></td>
                            <td><?= h($gachaRates->create_date) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'GachaRates', 'action' => 'view', $gachaRates->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'GachaRates', 'action' => 'edit', $gachaRates->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'GachaRates', 'action' => 'delete', $gachaRates->id], ['confirm' => __('Are you sure you want to delete # {0}?', $gachaRates->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
            <div class="related">
                <h4><?= __('Related Play Logs') ?></h4>
                <?php if (!empty($weapon->play_logs)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('User Id') ?></th>
                            <th><?= __('Weapon Id') ?></th>
                            <th><?= __('Skin Id') ?></th>
                            <th><?= __('Stage Id') ?></th>
                            <th><?= __('Score Type') ?></th>
                            <th><?= __('Score') ?></th>
                            <th><?= __('Play Result') ?></th>
                            <th><?= __('Coin Result') ?></th>
                            <th><?= __('Update Date') ?></th>
                            <th><?= __('Create Date') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($weapon->play_logs as $playLogs) : ?>
                        <tr>
                            <td><?= h($playLogs->id) ?></td>
                            <td><?= h($playLogs->user_id) ?></td>
                            <td><?= h($playLogs->weapon_id) ?></td>
                            <td><?= h($playLogs->skin_id) ?></td>
                            <td><?= h($playLogs->stage_id) ?></td>
                            <td><?= h($playLogs->score_type) ?></td>
                            <td><?= h($playLogs->score) ?></td>
                            <td><?= h($playLogs->play_result) ?></td>
                            <td><?= h($playLogs->coin_result) ?></td>
                            <td><?= h($playLogs->update_date) ?></td>
                            <td><?= h($playLogs->create_date) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'PlayLogs', 'action' => 'view', $playLogs->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'PlayLogs', 'action' => 'edit', $playLogs->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'PlayLogs', 'action' => 'delete', $playLogs->id], ['confirm' => __('Are you sure you want to delete # {0}?', $playLogs->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
            <div class="related">
                <h4><?= __('Related Weapon Infors') ?></h4>
                <?php if (!empty($weapon->weapon_infors)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('User Id') ?></th>
                            <th><?= __('Weapon Id') ?></th>
                            <th><?= __('Gacha Log Id') ?></th>
                            <th><?= __('Update Date') ?></th>
                            <th><?= __('Create Date') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($weapon->weapon_infors as $weaponInfors) : ?>
                        <tr>
                            <td><?= h($weaponInfors->id) ?></td>
                            <td><?= h($weaponInfors->user_id) ?></td>
                            <td><?= h($weaponInfors->weapon_id) ?></td>
                            <td><?= h($weaponInfors->gacha_log_id) ?></td>
                            <td><?= h($weaponInfors->update_date) ?></td>
                            <td><?= h($weaponInfors->create_date) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'WeaponInfors', 'action' => 'view', $weaponInfors->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'WeaponInfors', 'action' => 'edit', $weaponInfors->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'WeaponInfors', 'action' => 'delete', $weaponInfors->id], ['confirm' => __('Are you sure you want to delete # {0}?', $weaponInfors->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>

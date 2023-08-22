<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Skin $skin
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Skin'), ['action' => 'edit', $skin->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Skin'), ['action' => 'delete', $skin->id], ['confirm' => __('Are you sure you want to delete # {0}?', $skin->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Skins'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Skin'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="skins view content">
            <h3><?= h($skin->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Skin Name') ?></th>
                    <td><?= h($skin->skin_name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Address') ?></th>
                    <td><?= h($skin->address) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($skin->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Update Date') ?></th>
                    <td><?= h($skin->update_date) ?></td>
                </tr>
                <tr>
                    <th><?= __('Create Date') ?></th>
                    <td><?= h($skin->create_date) ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related Gacha Logs') ?></h4>
                <?php if (!empty($skin->gacha_logs)) : ?>
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
                        <?php foreach ($skin->gacha_logs as $gachaLogs) : ?>
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
                <?php if (!empty($skin->gacha_rates)) : ?>
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
                        <?php foreach ($skin->gacha_rates as $gachaRates) : ?>
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
                <?php if (!empty($skin->play_logs)) : ?>
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
                        <?php foreach ($skin->play_logs as $playLogs) : ?>
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
                <h4><?= __('Related Skin Infors') ?></h4>
                <?php if (!empty($skin->skin_infors)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('User Id') ?></th>
                            <th><?= __('Skin Id') ?></th>
                            <th><?= __('Gacha Log Id') ?></th>
                            <th><?= __('Update Date') ?></th>
                            <th><?= __('Create Date') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($skin->skin_infors as $skinInfors) : ?>
                        <tr>
                            <td><?= h($skinInfors->id) ?></td>
                            <td><?= h($skinInfors->user_id) ?></td>
                            <td><?= h($skinInfors->skin_id) ?></td>
                            <td><?= h($skinInfors->gacha_log_id) ?></td>
                            <td><?= h($skinInfors->update_date) ?></td>
                            <td><?= h($skinInfors->create_date) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'SkinInfors', 'action' => 'view', $skinInfors->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'SkinInfors', 'action' => 'edit', $skinInfors->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'SkinInfors', 'action' => 'delete', $skinInfors->id], ['confirm' => __('Are you sure you want to delete # {0}?', $skinInfors->id)]) ?>
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

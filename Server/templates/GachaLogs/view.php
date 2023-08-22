<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\GachaLog $gachaLog
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Gacha Log'), ['action' => 'edit', $gachaLog->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Gacha Log'), ['action' => 'delete', $gachaLog->id], ['confirm' => __('Are you sure you want to delete # {0}?', $gachaLog->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Gacha Logs'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Gacha Log'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="gachaLogs view content">
            <h3><?= h($gachaLog->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Gacha') ?></th>
                    <td><?= $gachaLog->has('gacha') ? $this->Html->link($gachaLog->gacha->id, ['controller' => 'Gachas', 'action' => 'view', $gachaLog->gacha->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('User') ?></th>
                    <td><?= $gachaLog->has('user') ? $this->Html->link($gachaLog->user->id, ['controller' => 'Users', 'action' => 'view', $gachaLog->user->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Weapon') ?></th>
                    <td><?= $gachaLog->has('weapon') ? $this->Html->link($gachaLog->weapon->id, ['controller' => 'Weapons', 'action' => 'view', $gachaLog->weapon->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Skin') ?></th>
                    <td><?= $gachaLog->has('skin') ? $this->Html->link($gachaLog->skin->id, ['controller' => 'Skins', 'action' => 'view', $gachaLog->skin->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($gachaLog->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Update Date') ?></th>
                    <td><?= h($gachaLog->update_date) ?></td>
                </tr>
                <tr>
                    <th><?= __('Create Date') ?></th>
                    <td><?= h($gachaLog->create_date) ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related Skin Infors') ?></h4>
                <?php if (!empty($gachaLog->skin_infors)) : ?>
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
                        <?php foreach ($gachaLog->skin_infors as $skinInfors) : ?>
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
            <div class="related">
                <h4><?= __('Related Weapon Infors') ?></h4>
                <?php if (!empty($gachaLog->weapon_infors)) : ?>
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
                        <?php foreach ($gachaLog->weapon_infors as $weaponInfors) : ?>
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

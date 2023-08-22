<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\WeaponInfor $weaponInfor
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Weapon Infor'), ['action' => 'edit', $weaponInfor->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Weapon Infor'), ['action' => 'delete', $weaponInfor->id], ['confirm' => __('Are you sure you want to delete # {0}?', $weaponInfor->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Weapon Infors'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Weapon Infor'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="weaponInfors view content">
            <h3><?= h($weaponInfor->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('User') ?></th>
                    <td><?= $weaponInfor->has('user') ? $this->Html->link($weaponInfor->user->id, ['controller' => 'Users', 'action' => 'view', $weaponInfor->user->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Weapon') ?></th>
                    <td><?= $weaponInfor->has('weapon') ? $this->Html->link($weaponInfor->weapon->id, ['controller' => 'Weapons', 'action' => 'view', $weaponInfor->weapon->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Gacha Log') ?></th>
                    <td><?= $weaponInfor->has('gacha_log') ? $this->Html->link($weaponInfor->gacha_log->id, ['controller' => 'GachaLogs', 'action' => 'view', $weaponInfor->gacha_log->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($weaponInfor->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Update Date') ?></th>
                    <td><?= h($weaponInfor->update_date) ?></td>
                </tr>
                <tr>
                    <th><?= __('Create Date') ?></th>
                    <td><?= h($weaponInfor->create_date) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>

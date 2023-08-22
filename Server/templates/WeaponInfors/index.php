<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\WeaponInfor> $weaponInfors
 */
?>
<div class="weaponInfors index content">
    <?= $this->Html->link(__('New Weapon Infor'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Weapon Infors') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('user_id') ?></th>
                    <th><?= $this->Paginator->sort('weapon_id') ?></th>
                    <th><?= $this->Paginator->sort('gacha_log_id') ?></th>
                    <th><?= $this->Paginator->sort('update_date') ?></th>
                    <th><?= $this->Paginator->sort('create_date') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($weaponInfors as $weaponInfor): ?>
                <tr>
                    <td><?= $this->Number->format($weaponInfor->id) ?></td>
                    <td><?= $weaponInfor->has('user') ? $this->Html->link($weaponInfor->user->id, ['controller' => 'Users', 'action' => 'view', $weaponInfor->user->id]) : '' ?></td>
                    <td><?= $weaponInfor->has('weapon') ? $this->Html->link($weaponInfor->weapon->id, ['controller' => 'Weapons', 'action' => 'view', $weaponInfor->weapon->id]) : '' ?></td>
                    <td><?= $weaponInfor->has('gacha_log') ? $this->Html->link($weaponInfor->gacha_log->id, ['controller' => 'GachaLogs', 'action' => 'view', $weaponInfor->gacha_log->id]) : '' ?></td>
                    <td><?= h($weaponInfor->update_date) ?></td>
                    <td><?= h($weaponInfor->create_date) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $weaponInfor->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $weaponInfor->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $weaponInfor->id], ['confirm' => __('Are you sure you want to delete # {0}?', $weaponInfor->id)]) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>
    </div>
</div>

<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\SkinInfor> $skinInfors
 */
?>
<div class="skinInfors index content">
    <?= $this->Html->link(__('New Skin Infor'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Skin Infors') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('user_id') ?></th>
                    <th><?= $this->Paginator->sort('skin_id') ?></th>
                    <th><?= $this->Paginator->sort('gacha_log_id') ?></th>
                    <th><?= $this->Paginator->sort('update_date') ?></th>
                    <th><?= $this->Paginator->sort('create_date') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($skinInfors as $skinInfor): ?>
                <tr>
                    <td><?= $this->Number->format($skinInfor->id) ?></td>
                    <td><?= $skinInfor->has('user') ? $this->Html->link($skinInfor->user->id, ['controller' => 'Users', 'action' => 'view', $skinInfor->user->id]) : '' ?></td>
                    <td><?= $skinInfor->has('skin') ? $this->Html->link($skinInfor->skin->id, ['controller' => 'Skins', 'action' => 'view', $skinInfor->skin->id]) : '' ?></td>
                    <td><?= $skinInfor->has('gacha_log') ? $this->Html->link($skinInfor->gacha_log->id, ['controller' => 'GachaLogs', 'action' => 'view', $skinInfor->gacha_log->id]) : '' ?></td>
                    <td><?= h($skinInfor->update_date) ?></td>
                    <td><?= h($skinInfor->create_date) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $skinInfor->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $skinInfor->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $skinInfor->id], ['confirm' => __('Are you sure you want to delete # {0}?', $skinInfor->id)]) ?>
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

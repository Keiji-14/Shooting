<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\GachaLog> $gachaLogs
 */
?>
<div class="gachaLogs index content">
    <?= $this->Html->link(__('New Gacha Log'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Gacha Logs') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('gacha_id') ?></th>
                    <th><?= $this->Paginator->sort('user_id') ?></th>
                    <th><?= $this->Paginator->sort('weapon_id') ?></th>
                    <th><?= $this->Paginator->sort('skin_id') ?></th>
                    <th><?= $this->Paginator->sort('update_date') ?></th>
                    <th><?= $this->Paginator->sort('create_date') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($gachaLogs as $gachaLog): ?>
                <tr>
                    <td><?= $this->Number->format($gachaLog->id) ?></td>
                    <td><?= $gachaLog->has('gacha') ? $this->Html->link($gachaLog->gacha->id, ['controller' => 'Gachas', 'action' => 'view', $gachaLog->gacha->id]) : '' ?></td>
                    <td><?= $gachaLog->has('user') ? $this->Html->link($gachaLog->user->id, ['controller' => 'Users', 'action' => 'view', $gachaLog->user->id]) : '' ?></td>
                    <td><?= $gachaLog->has('weapon') ? $this->Html->link($gachaLog->weapon->id, ['controller' => 'Weapons', 'action' => 'view', $gachaLog->weapon->id]) : '' ?></td>
                    <td><?= $gachaLog->has('skin') ? $this->Html->link($gachaLog->skin->id, ['controller' => 'Skins', 'action' => 'view', $gachaLog->skin->id]) : '' ?></td>
                    <td><?= h($gachaLog->update_date) ?></td>
                    <td><?= h($gachaLog->create_date) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $gachaLog->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $gachaLog->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $gachaLog->id], ['confirm' => __('Are you sure you want to delete # {0}?', $gachaLog->id)]) ?>
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

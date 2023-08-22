<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Gacha> $gachas
 */
?>
<div class="gachas index content">
    <?= $this->Html->link(__('New Gacha'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Gachas') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('gacha_name') ?></th>
                    <th><?= $this->Paginator->sort('gacha_type') ?></th>
                    <th><?= $this->Paginator->sort('gacha_count') ?></th>
                    <th><?= $this->Paginator->sort('consume_coin') ?></th>
                    <th><?= $this->Paginator->sort('update_date') ?></th>
                    <th><?= $this->Paginator->sort('create_date') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($gachas as $gacha): ?>
                <tr>
                    <td><?= $this->Number->format($gacha->id) ?></td>
                    <td><?= h($gacha->gacha_name) ?></td>
                    <td><?= $gacha->gacha_type === null ? '' : $this->Number->format($gacha->gacha_type) ?></td>
                    <td><?= $gacha->gacha_count === null ? '' : $this->Number->format($gacha->gacha_count) ?></td>
                    <td><?= $gacha->consume_coin === null ? '' : $this->Number->format($gacha->consume_coin) ?></td>
                    <td><?= h($gacha->update_date) ?></td>
                    <td><?= h($gacha->create_date) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $gacha->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $gacha->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $gacha->id], ['confirm' => __('Are you sure you want to delete # {0}?', $gacha->id)]) ?>
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

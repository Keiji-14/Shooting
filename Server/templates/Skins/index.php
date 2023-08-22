<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Skin> $skins
 */
?>
<div class="skins index content">
    <?= $this->Html->link(__('New Skin'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Skins') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('skin_name') ?></th>
                    <th><?= $this->Paginator->sort('address') ?></th>
                    <th><?= $this->Paginator->sort('update_date') ?></th>
                    <th><?= $this->Paginator->sort('create_date') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($skins as $skin): ?>
                <tr>
                    <td><?= $this->Number->format($skin->id) ?></td>
                    <td><?= h($skin->skin_name) ?></td>
                    <td><?= h($skin->address) ?></td>
                    <td><?= h($skin->update_date) ?></td>
                    <td><?= h($skin->create_date) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $skin->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $skin->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $skin->id], ['confirm' => __('Are you sure you want to delete # {0}?', $skin->id)]) ?>
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

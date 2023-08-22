<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Stage> $stages
 */
?>
<div class="stages index content">
    <?= $this->Html->link(__('New Stage'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Stages') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('stage_level') ?></th>
                    <th><?= $this->Paginator->sort('stage_level_level') ?></th>
                    <th><?= $this->Paginator->sort('address') ?></th>
                    <th><?= $this->Paginator->sort('update_date') ?></th>
                    <th><?= $this->Paginator->sort('create_date') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($stages as $stage): ?>
                <tr>
                    <td><?= $this->Number->format($stage->id) ?></td>
                    <td><?= $stage->stage_level === null ? '' : $this->Number->format($stage->stage_level) ?></td>
                    <td><?= $stage->stage_level_level === null ? '' : $this->Number->format($stage->stage_level_level) ?></td>
                    <td><?= h($stage->address) ?></td>
                    <td><?= h($stage->update_date) ?></td>
                    <td><?= h($stage->create_date) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $stage->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $stage->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $stage->id], ['confirm' => __('Are you sure you want to delete # {0}?', $stage->id)]) ?>
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

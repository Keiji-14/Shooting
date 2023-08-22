<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\PlayLog> $playLogs
 */
?>
<div class="playLogs index content">
    <?= $this->Html->link(__('New Play Log'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Play Logs') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('user_id') ?></th>
                    <th><?= $this->Paginator->sort('weapon_id') ?></th>
                    <th><?= $this->Paginator->sort('skin_id') ?></th>
                    <th><?= $this->Paginator->sort('stage_id') ?></th>
                    <th><?= $this->Paginator->sort('score_type') ?></th>
                    <th><?= $this->Paginator->sort('score') ?></th>
                    <th><?= $this->Paginator->sort('play_result') ?></th>
                    <th><?= $this->Paginator->sort('coin_result') ?></th>
                    <th><?= $this->Paginator->sort('update_date') ?></th>
                    <th><?= $this->Paginator->sort('create_date') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($playLogs as $playLog): ?>
                <tr>
                    <td><?= $this->Number->format($playLog->id) ?></td>
                    <td><?= $playLog->has('user') ? $this->Html->link($playLog->user->id, ['controller' => 'Users', 'action' => 'view', $playLog->user->id]) : '' ?></td>
                    <td><?= $playLog->has('weapon') ? $this->Html->link($playLog->weapon->id, ['controller' => 'Weapons', 'action' => 'view', $playLog->weapon->id]) : '' ?></td>
                    <td><?= $playLog->has('skin') ? $this->Html->link($playLog->skin->id, ['controller' => 'Skins', 'action' => 'view', $playLog->skin->id]) : '' ?></td>
                    <td><?= $playLog->has('stage') ? $this->Html->link($playLog->stage->id, ['controller' => 'Stages', 'action' => 'view', $playLog->stage->id]) : '' ?></td>
                    <td><?= $playLog->score_type === null ? '' : $this->Number->format($playLog->score_type) ?></td>
                    <td><?= h($playLog->score) ?></td>
                    <td><?= h($playLog->play_result) ?></td>
                    <td><?= $playLog->coin_result === null ? '' : $this->Number->format($playLog->coin_result) ?></td>
                    <td><?= h($playLog->update_date) ?></td>
                    <td><?= h($playLog->create_date) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $playLog->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $playLog->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $playLog->id], ['confirm' => __('Are you sure you want to delete # {0}?', $playLog->id)]) ?>
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

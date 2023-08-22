<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Weapon> $weapons
 */
?>
<div class="weapons index content">
    <?= $this->Html->link(__('New Weapon'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Weapons') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('weapon_name') ?></th>
                    <th><?= $this->Paginator->sort('weapon_type') ?></th>
                    <th><?= $this->Paginator->sort('weapon_damage') ?></th>
                    <th><?= $this->Paginator->sort('weapon_speed') ?></th>
                    <th><?= $this->Paginator->sort('update_date') ?></th>
                    <th><?= $this->Paginator->sort('create_date') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($weapons as $weapon): ?>
                <tr>
                    <td><?= $this->Number->format($weapon->id) ?></td>
                    <td><?= h($weapon->weapon_name) ?></td>
                    <td><?= $weapon->weapon_type === null ? '' : $this->Number->format($weapon->weapon_type) ?></td>
                    <td><?= $weapon->weapon_damage === null ? '' : $this->Number->format($weapon->weapon_damage) ?></td>
                    <td><?= $weapon->weapon_speed === null ? '' : $this->Number->format($weapon->weapon_speed) ?></td>
                    <td><?= h($weapon->update_date) ?></td>
                    <td><?= h($weapon->create_date) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $weapon->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $weapon->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $weapon->id], ['confirm' => __('Are you sure you want to delete # {0}?', $weapon->id)]) ?>
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

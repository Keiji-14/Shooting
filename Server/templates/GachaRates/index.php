<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\GachaRate> $gachaRates
 */
?>
<div class="gachaRates index content">
    <?= $this->Html->link(__('New Gacha Rate'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Gacha Rates') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('skin_id') ?></th>
                    <th><?= $this->Paginator->sort('weapon_id') ?></th>
                    <th><?= $this->Paginator->sort('gacha_id') ?></th>
                    <th><?= $this->Paginator->sort('gacha_rate') ?></th>
                    <th><?= $this->Paginator->sort('update_date') ?></th>
                    <th><?= $this->Paginator->sort('create_date') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($gachaRates as $gachaRate): ?>
                <tr>
                    <td><?= $this->Number->format($gachaRate->id) ?></td>
                    <td><?= $gachaRate->has('skin') ? $this->Html->link($gachaRate->skin->id, ['controller' => 'Skins', 'action' => 'view', $gachaRate->skin->id]) : '' ?></td>
                    <td><?= $gachaRate->has('weapon') ? $this->Html->link($gachaRate->weapon->id, ['controller' => 'Weapons', 'action' => 'view', $gachaRate->weapon->id]) : '' ?></td>
                    <td><?= $gachaRate->has('gacha') ? $this->Html->link($gachaRate->gacha->id, ['controller' => 'Gachas', 'action' => 'view', $gachaRate->gacha->id]) : '' ?></td>
                    <td><?= $gachaRate->gacha_rate === null ? '' : $this->Number->format($gachaRate->gacha_rate) ?></td>
                    <td><?= h($gachaRate->update_date) ?></td>
                    <td><?= h($gachaRate->create_date) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $gachaRate->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $gachaRate->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $gachaRate->id], ['confirm' => __('Are you sure you want to delete # {0}?', $gachaRate->id)]) ?>
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

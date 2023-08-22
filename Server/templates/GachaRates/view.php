<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\GachaRate $gachaRate
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Gacha Rate'), ['action' => 'edit', $gachaRate->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Gacha Rate'), ['action' => 'delete', $gachaRate->id], ['confirm' => __('Are you sure you want to delete # {0}?', $gachaRate->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Gacha Rates'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Gacha Rate'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="gachaRates view content">
            <h3><?= h($gachaRate->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Skin') ?></th>
                    <td><?= $gachaRate->has('skin') ? $this->Html->link($gachaRate->skin->id, ['controller' => 'Skins', 'action' => 'view', $gachaRate->skin->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Weapon') ?></th>
                    <td><?= $gachaRate->has('weapon') ? $this->Html->link($gachaRate->weapon->id, ['controller' => 'Weapons', 'action' => 'view', $gachaRate->weapon->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Gacha') ?></th>
                    <td><?= $gachaRate->has('gacha') ? $this->Html->link($gachaRate->gacha->id, ['controller' => 'Gachas', 'action' => 'view', $gachaRate->gacha->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($gachaRate->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Gacha Rate') ?></th>
                    <td><?= $gachaRate->gacha_rate === null ? '' : $this->Number->format($gachaRate->gacha_rate) ?></td>
                </tr>
                <tr>
                    <th><?= __('Update Date') ?></th>
                    <td><?= h($gachaRate->update_date) ?></td>
                </tr>
                <tr>
                    <th><?= __('Create Date') ?></th>
                    <td><?= h($gachaRate->create_date) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>

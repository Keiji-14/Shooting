<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\SkinInfor $skinInfor
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Skin Infor'), ['action' => 'edit', $skinInfor->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Skin Infor'), ['action' => 'delete', $skinInfor->id], ['confirm' => __('Are you sure you want to delete # {0}?', $skinInfor->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Skin Infors'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Skin Infor'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="skinInfors view content">
            <h3><?= h($skinInfor->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('User') ?></th>
                    <td><?= $skinInfor->has('user') ? $this->Html->link($skinInfor->user->id, ['controller' => 'Users', 'action' => 'view', $skinInfor->user->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Skin') ?></th>
                    <td><?= $skinInfor->has('skin') ? $this->Html->link($skinInfor->skin->id, ['controller' => 'Skins', 'action' => 'view', $skinInfor->skin->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Gacha Log') ?></th>
                    <td><?= $skinInfor->has('gacha_log') ? $this->Html->link($skinInfor->gacha_log->id, ['controller' => 'GachaLogs', 'action' => 'view', $skinInfor->gacha_log->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($skinInfor->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Update Date') ?></th>
                    <td><?= h($skinInfor->update_date) ?></td>
                </tr>
                <tr>
                    <th><?= __('Create Date') ?></th>
                    <td><?= h($skinInfor->create_date) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>

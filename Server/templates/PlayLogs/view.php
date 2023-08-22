<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\PlayLog $playLog
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Play Log'), ['action' => 'edit', $playLog->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Play Log'), ['action' => 'delete', $playLog->id], ['confirm' => __('Are you sure you want to delete # {0}?', $playLog->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Play Logs'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Play Log'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="playLogs view content">
            <h3><?= h($playLog->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('User') ?></th>
                    <td><?= $playLog->has('user') ? $this->Html->link($playLog->user->id, ['controller' => 'Users', 'action' => 'view', $playLog->user->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Weapon') ?></th>
                    <td><?= $playLog->has('weapon') ? $this->Html->link($playLog->weapon->id, ['controller' => 'Weapons', 'action' => 'view', $playLog->weapon->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Skin') ?></th>
                    <td><?= $playLog->has('skin') ? $this->Html->link($playLog->skin->id, ['controller' => 'Skins', 'action' => 'view', $playLog->skin->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Stage') ?></th>
                    <td><?= $playLog->has('stage') ? $this->Html->link($playLog->stage->id, ['controller' => 'Stages', 'action' => 'view', $playLog->stage->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Score') ?></th>
                    <td><?= h($playLog->score) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($playLog->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Score Type') ?></th>
                    <td><?= $playLog->score_type === null ? '' : $this->Number->format($playLog->score_type) ?></td>
                </tr>
                <tr>
                    <th><?= __('Coin Result') ?></th>
                    <td><?= $playLog->coin_result === null ? '' : $this->Number->format($playLog->coin_result) ?></td>
                </tr>
                <tr>
                    <th><?= __('Update Date') ?></th>
                    <td><?= h($playLog->update_date) ?></td>
                </tr>
                <tr>
                    <th><?= __('Create Date') ?></th>
                    <td><?= h($playLog->create_date) ?></td>
                </tr>
                <tr>
                    <th><?= __('Play Result') ?></th>
                    <td><?= $playLog->play_result ? __('Yes') : __('No'); ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>

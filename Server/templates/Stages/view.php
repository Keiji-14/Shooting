<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Stage $stage
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Stage'), ['action' => 'edit', $stage->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Stage'), ['action' => 'delete', $stage->id], ['confirm' => __('Are you sure you want to delete # {0}?', $stage->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Stages'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Stage'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="stages view content">
            <h3><?= h($stage->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Address') ?></th>
                    <td><?= h($stage->address) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($stage->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Stage Level') ?></th>
                    <td><?= $stage->stage_level === null ? '' : $this->Number->format($stage->stage_level) ?></td>
                </tr>
                <tr>
                    <th><?= __('Stage Level Level') ?></th>
                    <td><?= $stage->stage_level_level === null ? '' : $this->Number->format($stage->stage_level_level) ?></td>
                </tr>
                <tr>
                    <th><?= __('Update Date') ?></th>
                    <td><?= h($stage->update_date) ?></td>
                </tr>
                <tr>
                    <th><?= __('Create Date') ?></th>
                    <td><?= h($stage->create_date) ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related Play Logs') ?></h4>
                <?php if (!empty($stage->play_logs)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('User Id') ?></th>
                            <th><?= __('Weapon Id') ?></th>
                            <th><?= __('Skin Id') ?></th>
                            <th><?= __('Stage Id') ?></th>
                            <th><?= __('Score Type') ?></th>
                            <th><?= __('Score') ?></th>
                            <th><?= __('Play Result') ?></th>
                            <th><?= __('Coin Result') ?></th>
                            <th><?= __('Update Date') ?></th>
                            <th><?= __('Create Date') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($stage->play_logs as $playLogs) : ?>
                        <tr>
                            <td><?= h($playLogs->id) ?></td>
                            <td><?= h($playLogs->user_id) ?></td>
                            <td><?= h($playLogs->weapon_id) ?></td>
                            <td><?= h($playLogs->skin_id) ?></td>
                            <td><?= h($playLogs->stage_id) ?></td>
                            <td><?= h($playLogs->score_type) ?></td>
                            <td><?= h($playLogs->score) ?></td>
                            <td><?= h($playLogs->play_result) ?></td>
                            <td><?= h($playLogs->coin_result) ?></td>
                            <td><?= h($playLogs->update_date) ?></td>
                            <td><?= h($playLogs->create_date) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'PlayLogs', 'action' => 'view', $playLogs->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'PlayLogs', 'action' => 'edit', $playLogs->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'PlayLogs', 'action' => 'delete', $playLogs->id], ['confirm' => __('Are you sure you want to delete # {0}?', $playLogs->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>

<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Gacha $gacha
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Gacha'), ['action' => 'edit', $gacha->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Gacha'), ['action' => 'delete', $gacha->id], ['confirm' => __('Are you sure you want to delete # {0}?', $gacha->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Gachas'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Gacha'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="gachas view content">
            <h3><?= h($gacha->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Gacha Name') ?></th>
                    <td><?= h($gacha->gacha_name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($gacha->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Gacha Type') ?></th>
                    <td><?= $gacha->gacha_type === null ? '' : $this->Number->format($gacha->gacha_type) ?></td>
                </tr>
                <tr>
                    <th><?= __('Gacha Count') ?></th>
                    <td><?= $gacha->gacha_count === null ? '' : $this->Number->format($gacha->gacha_count) ?></td>
                </tr>
                <tr>
                    <th><?= __('Consume Coin') ?></th>
                    <td><?= $gacha->consume_coin === null ? '' : $this->Number->format($gacha->consume_coin) ?></td>
                </tr>
                <tr>
                    <th><?= __('Update Date') ?></th>
                    <td><?= h($gacha->update_date) ?></td>
                </tr>
                <tr>
                    <th><?= __('Create Date') ?></th>
                    <td><?= h($gacha->create_date) ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related Gacha Logs') ?></h4>
                <?php if (!empty($gacha->gacha_logs)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Gacha Id') ?></th>
                            <th><?= __('User Id') ?></th>
                            <th><?= __('Weapon Id') ?></th>
                            <th><?= __('Skin Id') ?></th>
                            <th><?= __('Update Date') ?></th>
                            <th><?= __('Create Date') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($gacha->gacha_logs as $gachaLogs) : ?>
                        <tr>
                            <td><?= h($gachaLogs->id) ?></td>
                            <td><?= h($gachaLogs->gacha_id) ?></td>
                            <td><?= h($gachaLogs->user_id) ?></td>
                            <td><?= h($gachaLogs->weapon_id) ?></td>
                            <td><?= h($gachaLogs->skin_id) ?></td>
                            <td><?= h($gachaLogs->update_date) ?></td>
                            <td><?= h($gachaLogs->create_date) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'GachaLogs', 'action' => 'view', $gachaLogs->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'GachaLogs', 'action' => 'edit', $gachaLogs->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'GachaLogs', 'action' => 'delete', $gachaLogs->id], ['confirm' => __('Are you sure you want to delete # {0}?', $gachaLogs->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
            <div class="related">
                <h4><?= __('Related Gacha Rates') ?></h4>
                <?php if (!empty($gacha->gacha_rates)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Skin Id') ?></th>
                            <th><?= __('Weapon Id') ?></th>
                            <th><?= __('Gacha Id') ?></th>
                            <th><?= __('Gacha Rate') ?></th>
                            <th><?= __('Update Date') ?></th>
                            <th><?= __('Create Date') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($gacha->gacha_rates as $gachaRates) : ?>
                        <tr>
                            <td><?= h($gachaRates->id) ?></td>
                            <td><?= h($gachaRates->skin_id) ?></td>
                            <td><?= h($gachaRates->weapon_id) ?></td>
                            <td><?= h($gachaRates->gacha_id) ?></td>
                            <td><?= h($gachaRates->gacha_rate) ?></td>
                            <td><?= h($gachaRates->update_date) ?></td>
                            <td><?= h($gachaRates->create_date) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'GachaRates', 'action' => 'view', $gachaRates->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'GachaRates', 'action' => 'edit', $gachaRates->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'GachaRates', 'action' => 'delete', $gachaRates->id], ['confirm' => __('Are you sure you want to delete # {0}?', $gachaRates->id)]) ?>
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

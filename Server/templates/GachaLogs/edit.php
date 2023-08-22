<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\GachaLog $gachaLog
 * @var string[]|\Cake\Collection\CollectionInterface $gachas
 * @var string[]|\Cake\Collection\CollectionInterface $users
 * @var string[]|\Cake\Collection\CollectionInterface $weapons
 * @var string[]|\Cake\Collection\CollectionInterface $skins
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $gachaLog->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $gachaLog->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Gacha Logs'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="gachaLogs form content">
            <?= $this->Form->create($gachaLog) ?>
            <fieldset>
                <legend><?= __('Edit Gacha Log') ?></legend>
                <?php
                    echo $this->Form->control('gacha_id', ['options' => $gachas, 'empty' => true]);
                    echo $this->Form->control('user_id', ['options' => $users, 'empty' => true]);
                    echo $this->Form->control('weapon_id', ['options' => $weapons, 'empty' => true]);
                    echo $this->Form->control('skin_id', ['options' => $skins, 'empty' => true]);
                    echo $this->Form->control('update_date', ['empty' => true]);
                    echo $this->Form->control('create_date', ['empty' => true]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>

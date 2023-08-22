<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\PlayLog $playLog
 * @var \Cake\Collection\CollectionInterface|string[] $users
 * @var \Cake\Collection\CollectionInterface|string[] $weapons
 * @var \Cake\Collection\CollectionInterface|string[] $skins
 * @var \Cake\Collection\CollectionInterface|string[] $stages
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Play Logs'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="playLogs form content">
            <?= $this->Form->create($playLog) ?>
            <fieldset>
                <legend><?= __('Add Play Log') ?></legend>
                <?php
                    echo $this->Form->control('user_id', ['options' => $users, 'empty' => true]);
                    echo $this->Form->control('weapon_id', ['options' => $weapons, 'empty' => true]);
                    echo $this->Form->control('skin_id', ['options' => $skins, 'empty' => true]);
                    echo $this->Form->control('stage_id', ['options' => $stages, 'empty' => true]);
                    echo $this->Form->control('score_type');
                    echo $this->Form->control('score');
                    echo $this->Form->control('play_result');
                    echo $this->Form->control('coin_result');
                    echo $this->Form->control('update_date', ['empty' => true]);
                    echo $this->Form->control('create_date', ['empty' => true]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>

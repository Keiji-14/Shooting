<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\WeaponInfor $weaponInfor
 * @var string[]|\Cake\Collection\CollectionInterface $users
 * @var string[]|\Cake\Collection\CollectionInterface $weapons
 * @var string[]|\Cake\Collection\CollectionInterface $gachaLogs
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $weaponInfor->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $weaponInfor->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Weapon Infors'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="weaponInfors form content">
            <?= $this->Form->create($weaponInfor) ?>
            <fieldset>
                <legend><?= __('Edit Weapon Infor') ?></legend>
                <?php
                    echo $this->Form->control('user_id', ['options' => $users, 'empty' => true]);
                    echo $this->Form->control('weapon_id', ['options' => $weapons, 'empty' => true]);
                    echo $this->Form->control('gacha_log_id', ['options' => $gachaLogs, 'empty' => true]);
                    echo $this->Form->control('update_date', ['empty' => true]);
                    echo $this->Form->control('create_date', ['empty' => true]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>

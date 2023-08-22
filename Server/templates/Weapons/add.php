<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Weapon $weapon
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Weapons'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="weapons form content">
            <?= $this->Form->create($weapon) ?>
            <fieldset>
                <legend><?= __('Add Weapon') ?></legend>
                <?php
                    echo $this->Form->control('weapon_name');
                    echo $this->Form->control('weapon_type');
                    echo $this->Form->control('weapon_damage');
                    echo $this->Form->control('weapon_speed');
                    echo $this->Form->control('update_date', ['empty' => true]);
                    echo $this->Form->control('create_date', ['empty' => true]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>

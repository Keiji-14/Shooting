<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Skin $skin
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Skins'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="skins form content">
            <?= $this->Form->create($skin) ?>
            <fieldset>
                <legend><?= __('Add Skin') ?></legend>
                <?php
                    echo $this->Form->control('skin_name');
                    echo $this->Form->control('address');
                    echo $this->Form->control('update_date', ['empty' => true]);
                    echo $this->Form->control('create_date', ['empty' => true]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>

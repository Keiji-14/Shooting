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
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $stage->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $stage->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Stages'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="stages form content">
            <?= $this->Form->create($stage) ?>
            <fieldset>
                <legend><?= __('Edit Stage') ?></legend>
                <?php
                    echo $this->Form->control('stage_level');
                    echo $this->Form->control('stage_level_level');
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

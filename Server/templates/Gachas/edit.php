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
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $gacha->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $gacha->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Gachas'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="gachas form content">
            <?= $this->Form->create($gacha) ?>
            <fieldset>
                <legend><?= __('Edit Gacha') ?></legend>
                <?php
                    echo $this->Form->control('gacha_name');
                    echo $this->Form->control('gacha_type');
                    echo $this->Form->control('gacha_count');
                    echo $this->Form->control('consume_coin');
                    echo $this->Form->control('update_date', ['empty' => true]);
                    echo $this->Form->control('create_date', ['empty' => true]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>

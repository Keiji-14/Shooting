<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\GachaRate $gachaRate
 * @var string[]|\Cake\Collection\CollectionInterface $skins
 * @var string[]|\Cake\Collection\CollectionInterface $weapons
 * @var string[]|\Cake\Collection\CollectionInterface $gachas
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $gachaRate->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $gachaRate->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Gacha Rates'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="gachaRates form content">
            <?= $this->Form->create($gachaRate) ?>
            <fieldset>
                <legend><?= __('Edit Gacha Rate') ?></legend>
                <?php
                    echo $this->Form->control('skin_id', ['options' => $skins, 'empty' => true]);
                    echo $this->Form->control('weapon_id', ['options' => $weapons, 'empty' => true]);
                    echo $this->Form->control('gacha_id', ['options' => $gachas, 'empty' => true]);
                    echo $this->Form->control('gacha_rate');
                    echo $this->Form->control('update_date', ['empty' => true]);
                    echo $this->Form->control('create_date', ['empty' => true]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>

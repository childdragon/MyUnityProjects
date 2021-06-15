<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Shootingranking $shootingranking
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Shootingranking'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="shootingranking form large-9 medium-8 columns content">
    <?= $this->Form->create($shootingranking) ?>
    <fieldset>
        <legend><?= __('Add Shootingranking') ?></legend>
        <?php
            echo $this->Form->control('Name');
            echo $this->Form->control('Score');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>

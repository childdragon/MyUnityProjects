<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Shootingranking $shootingranking
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Shootingranking'), ['action' => 'edit', $shootingranking->Id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Shootingranking'), ['action' => 'delete', $shootingranking->Id], ['confirm' => __('Are you sure you want to delete # {0}?', $shootingranking->Id)]) ?> </li>
        <li><?= $this->Html->link(__('List Shootingranking'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Shootingranking'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="shootingranking view large-9 medium-8 columns content">
    <h3><?= h($shootingranking->Id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($shootingranking->Name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($shootingranking->Id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Score') ?></th>
            <td><?= $this->Number->format($shootingranking->Score) ?></td>
        </tr>
    </table>
</div>

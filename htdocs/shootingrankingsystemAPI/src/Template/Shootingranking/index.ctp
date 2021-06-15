<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Shootingranking[]|\Cake\Collection\CollectionInterface $shootingranking
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Shootingranking'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="shootingranking index large-9 medium-8 columns content">
    <h3><?= __('Shootingranking') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('Id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('Name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('Score') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($shootingranking as $shootingranking): ?>
            <tr>
                <td><?= $this->Number->format($shootingranking->Id) ?></td>
                <td><?= h($shootingranking->Name) ?></td>
                <td><?= $this->Number->format($shootingranking->Score) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $shootingranking->Id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $shootingranking->Id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $shootingranking->Id], ['confirm' => __('Are you sure you want to delete # {0}?', $shootingranking->Id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>

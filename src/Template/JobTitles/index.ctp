<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\JobTitle[]|\Cake\Collection\CollectionInterface $jobTitles
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Job Title'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="jobTitles index large-9 medium-8 columns content">
    <h3><?= __('Job Titles') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('job_title') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created_by') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified_by') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($jobTitles as $jobTitle): ?>
            <tr>
                <td><?= $this->Number->format($jobTitle->id) ?></td>
                <td><?= h($jobTitle->job_title) ?></td>
                <td><?= h($jobTitle->created) ?></td>
                <td><?= h($jobTitle->modified) ?></td>
                <td><?= $this->Number->format($jobTitle->created_by) ?></td>
                <td><?= $this->Number->format($jobTitle->modified_by) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $jobTitle->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $jobTitle->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $jobTitle->id], ['confirm' => __('Are you sure you want to delete # {0}?', $jobTitle->id)]) ?>
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

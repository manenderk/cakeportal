<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\JobTitle $jobTitle
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Job Title'), ['action' => 'edit', $jobTitle->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Job Title'), ['action' => 'delete', $jobTitle->id], ['confirm' => __('Are you sure you want to delete # {0}?', $jobTitle->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Job Titles'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Job Title'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="jobTitles view large-9 medium-8 columns content">
    <h3><?= h($jobTitle->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Job Title') ?></th>
            <td><?= h($jobTitle->job_title) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($jobTitle->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created By') ?></th>
            <td><?= $this->Number->format($jobTitle->created_by) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified By') ?></th>
            <td><?= $this->Number->format($jobTitle->modified_by) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($jobTitle->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($jobTitle->modified) ?></td>
        </tr>
    </table>
</div>

<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\CustomFieldChoice $customFieldChoice
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Custom Field Choice'), ['action' => 'edit', $customFieldChoice->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Custom Field Choice'), ['action' => 'delete', $customFieldChoice->id], ['confirm' => __('Are you sure you want to delete # {0}?', $customFieldChoice->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Custom Field Choices'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Custom Field Choice'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="customFieldChoices view large-9 medium-8 columns content">
    <h3><?= h($customFieldChoice->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Choice Name') ?></th>
            <td><?= h($customFieldChoice->choice_name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($customFieldChoice->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Field Id') ?></th>
            <td><?= $this->Number->format($customFieldChoice->field_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($customFieldChoice->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($customFieldChoice->modified) ?></td>
        </tr>
    </table>
</div>

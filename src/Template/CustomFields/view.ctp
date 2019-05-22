<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\CustomField $customField
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Custom Field'), ['action' => 'edit', $customField->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Custom Field'), ['action' => 'delete', $customField->id], ['confirm' => __('Are you sure you want to delete # {0}?', $customField->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Custom Fields'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Custom Field'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Custom Field Types'), ['controller' => 'CustomFieldTypes', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Custom Field Type'), ['controller' => 'CustomFieldTypes', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="customFields view large-9 medium-8 columns content">
    <h3><?= h($customField->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Field Name') ?></th>
            <td><?= h($customField->field_name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Custom Field Type') ?></th>
            <td><?= $customField->has('custom_field_type') ? $this->Html->link($customField->custom_field_type->id, ['controller' => 'CustomFieldTypes', 'action' => 'view', $customField->custom_field_type->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Table Name') ?></th>
            <td><?= h($customField->table_name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($customField->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($customField->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($customField->modified) ?></td>
        </tr>
    </table>
</div>

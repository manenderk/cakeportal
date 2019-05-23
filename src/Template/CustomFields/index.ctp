<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\CustomField[]|\Cake\Collection\CollectionInterface $customFields
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Custom Field'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Custom Field Types'), ['controller' => 'CustomFieldTypes', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Custom Field Type'), ['controller' => 'CustomFieldTypes', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="customFields index large-9 medium-8 columns content">
    <h3><?= __('Custom Fields') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('field_name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('field_type_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('table_name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($customFields as $customField): ?>
            <tr>
                <td><?= $this->Number->format($customField->id) ?></td>
                <td><?= h($customField->field_name) ?></td>
                <td><?= $customField->has('custom_field_type') ? $this->Html->link($customField->custom_field_type->id, ['controller' => 'CustomFieldTypes', 'action' => 'view', $customField->custom_field_type->id]) : '' ?></td>
                <td><?= h($customField->table_name) ?></td>
                <td><?= h($customField->created) ?></td>
                <td><?= h($customField->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $customField->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $customField->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $customField->id], ['confirm' => __('Are you sure you want to delete # {0}?', $customField->id)]) ?>
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

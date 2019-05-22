<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\CustomFieldValue $customFieldValue
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Custom Field Value'), ['action' => 'edit', $customFieldValue->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Custom Field Value'), ['action' => 'delete', $customFieldValue->id], ['confirm' => __('Are you sure you want to delete # {0}?', $customFieldValue->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Custom Field Values'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Custom Field Value'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="customFieldValues view large-9 medium-8 columns content">
    <h3><?= h($customFieldValue->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($customFieldValue->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Record Id') ?></th>
            <td><?= $this->Number->format($customFieldValue->record_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Field Id') ?></th>
            <td><?= $this->Number->format($customFieldValue->field_id) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Field Value') ?></h4>
        <?= $this->Text->autoParagraph(h($customFieldValue->field_value)); ?>
    </div>
</div>

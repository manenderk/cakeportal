<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\CustomFieldType $customFieldType
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $customFieldType->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $customFieldType->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Custom Field Types'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="customFieldTypes form large-9 medium-8 columns content">
    <?= $this->Form->create($customFieldType) ?>
    <fieldset>
        <legend><?= __('Edit Custom Field Type') ?></legend>
        <?php
            echo $this->Form->control('field_type');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>

<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\CustomFieldType $customFieldType
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Custom Field Types'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="customFieldTypes form large-9 medium-8 columns content">
    <?= $this->Form->create($customFieldType) ?>
    <fieldset>
        <legend><?= __('Add Custom Field Type') ?></legend>
        <?php
            echo $this->Form->control('field_type');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>

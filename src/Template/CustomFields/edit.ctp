<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\CustomField $customField
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $customField->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $customField->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Custom Fields'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Custom Field Types'), ['controller' => 'CustomFieldTypes', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Custom Field Type'), ['controller' => 'CustomFieldTypes', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="customFields form large-9 medium-8 columns content">
    <?= $this->Form->create($customField) ?>
    <fieldset>
        <legend><?= __('Edit Custom Field') ?></legend>
        <?php
            echo $this->Form->control('field_name');
            echo $this->Form->control('field_type_id', ['options' => $customFieldTypes]);            
        ?>
        <div id="dropdown-choices-container">            
        </div>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
<script>
    var previousChoices = <?=json_encode($customFieldChoiceData); ?>;
</script>

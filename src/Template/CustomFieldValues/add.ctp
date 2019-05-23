<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\CustomFieldValue $customFieldValue
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Custom Field Values'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="customFieldValues form large-9 medium-8 columns content">
    <?= $this->Form->create($customFieldValue) ?>
    <fieldset>
        <legend><?= __('Add Custom Field Value') ?></legend>
        <?php
            echo $this->Form->control('record_id');
            echo $this->Form->control('field_id');
            echo $this->Form->control('field_value');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>

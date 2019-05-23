<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\CustomFieldChoice $customFieldChoice
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Custom Field Choices'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="customFieldChoices form large-9 medium-8 columns content">
    <?= $this->Form->create($customFieldChoice) ?>
    <fieldset>
        <legend><?= __('Add Custom Field Choice') ?></legend>
        <?php
            echo $this->Form->control('field_id');
            echo $this->Form->control('choice_name');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>

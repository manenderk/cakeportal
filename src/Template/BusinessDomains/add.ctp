<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\BusinessDomain $businessDomain
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Business Domains'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="businessDomains form large-9 medium-8 columns content">
    <?= $this->Form->create($businessDomain) ?>
    <fieldset>
        <legend><?= __('Add Business Domain') ?></legend>
        <?php
            echo $this->Form->control('name');
            echo $this->Form->control('description');
            echo $this->Form->control('created_by');
            echo $this->Form->control('modified_by');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>

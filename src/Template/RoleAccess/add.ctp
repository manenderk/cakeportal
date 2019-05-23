<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\RoleAcces $roleAcces
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Role Access'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Roles'), ['controller' => 'Roles', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Role'), ['controller' => 'Roles', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="roleAccess form large-9 medium-8 columns content">
    <?= $this->Form->create($roleAcces) ?>
    <fieldset>
        <legend><?= __('Add Role Acces') ?></legend>
        <?php
            echo $this->Form->control('role_id', ['options' => $roles]);
            echo $this->Form->control('controller');
            echo $this->Form->control('action');
            echo $this->Form->control('created_by');
            echo $this->Form->control('modified_by');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>

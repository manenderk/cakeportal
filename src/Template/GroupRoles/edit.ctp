<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\GroupRole $groupRole
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $groupRole->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $groupRole->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Group Roles'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Groups'), ['controller' => 'Groups', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Group'), ['controller' => 'Groups', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Roles'), ['controller' => 'Roles', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Role'), ['controller' => 'Roles', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="groupRoles form large-9 medium-8 columns content">
    <?= $this->Form->create($groupRole) ?>
    <fieldset>
        <legend><?= __('Edit Group Role') ?></legend>
        <?php
            echo $this->Form->control('group_id', ['options' => $groups]);
            echo $this->Form->control('role_id', ['options' => $roles]);
            echo $this->Form->control('created_by');
            echo $this->Form->control('modified_by');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>

<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Group $group
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $group->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $group->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Groups'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Group Roles'), ['controller' => 'GroupRoles', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Group Role'), ['controller' => 'GroupRoles', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List User Groups'), ['controller' => 'UserGroups', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User Group'), ['controller' => 'UserGroups', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="groups form large-9 medium-8 columns content">
    <?= $this->Form->create($group) ?>
    <fieldset>
        <legend><?= __('Edit Group') ?></legend>
        <?php
            echo $this->Form->control('group_name');
            echo $this->Form->control('active');
        ?>
    </fieldset>
    <hr>
    <fieldset>
        <legend><?= __('Group Roles') ?></legend>
        <?= $this->Form->Control('groupRoles' , ['options' => $roles, 'value' => $groupRolesId, 'label' => false, 'multiple'=>true]); ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>

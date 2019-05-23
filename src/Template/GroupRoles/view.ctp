<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\GroupRole $groupRole
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Group Role'), ['action' => 'edit', $groupRole->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Group Role'), ['action' => 'delete', $groupRole->id], ['confirm' => __('Are you sure you want to delete # {0}?', $groupRole->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Group Roles'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Group Role'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Groups'), ['controller' => 'Groups', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Group'), ['controller' => 'Groups', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Roles'), ['controller' => 'Roles', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Role'), ['controller' => 'Roles', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="groupRoles view large-9 medium-8 columns content">
    <h3><?= h($groupRole->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Group') ?></th>
            <td><?= $groupRole->has('group') ? $this->Html->link($groupRole->group->id, ['controller' => 'Groups', 'action' => 'view', $groupRole->group->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Role') ?></th>
            <td><?= $groupRole->has('role') ? $this->Html->link($groupRole->role->id, ['controller' => 'Roles', 'action' => 'view', $groupRole->role->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($groupRole->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created By') ?></th>
            <td><?= $this->Number->format($groupRole->created_by) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified By') ?></th>
            <td><?= $this->Number->format($groupRole->modified_by) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($groupRole->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($groupRole->modified) ?></td>
        </tr>
    </table>
</div>

<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\RoleAcces $roleAcces
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Role Acces'), ['action' => 'edit', $roleAcces->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Role Acces'), ['action' => 'delete', $roleAcces->id], ['confirm' => __('Are you sure you want to delete # {0}?', $roleAcces->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Role Access'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Role Acces'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Roles'), ['controller' => 'Roles', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Role'), ['controller' => 'Roles', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="roleAccess view large-9 medium-8 columns content">
    <h3><?= h($roleAcces->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Role') ?></th>
            <td><?= $roleAcces->has('role') ? $this->Html->link($roleAcces->role->id, ['controller' => 'Roles', 'action' => 'view', $roleAcces->role->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Controller') ?></th>
            <td><?= h($roleAcces->controller) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Action') ?></th>
            <td><?= h($roleAcces->action) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($roleAcces->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created By') ?></th>
            <td><?= $this->Number->format($roleAcces->created_by) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified By') ?></th>
            <td><?= $this->Number->format($roleAcces->modified_by) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($roleAcces->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($roleAcces->modified) ?></td>
        </tr>
    </table>
</div>

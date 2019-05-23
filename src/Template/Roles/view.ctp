<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Role $role
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Role'), ['action' => 'edit', $role->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Role'), ['action' => 'delete', $role->id], ['confirm' => __('Are you sure you want to delete # {0}?', $role->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Roles'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Role'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Group Roles'), ['controller' => 'GroupRoles', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Group Role'), ['controller' => 'GroupRoles', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Role Access'), ['controller' => 'RoleAccess', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Role Acces'), ['controller' => 'RoleAccess', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="roles view large-9 medium-8 columns content">
    <h3><?= h($role->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Role Name') ?></th>
            <td><?= h($role->role_name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($role->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created By') ?></th>
            <td><?= $this->Number->format($role->created_by) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified By') ?></th>
            <td><?= $this->Number->format($role->modified_by) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($role->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($role->modified) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Active') ?></th>
            <td><?= $role->active ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Group Roles') ?></h4>
        <?php if (!empty($role->group_roles)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Group Id') ?></th>
                <th scope="col"><?= __('Role Id') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col"><?= __('Created By') ?></th>
                <th scope="col"><?= __('Modified By') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($role->group_roles as $groupRoles): ?>
            <tr>
                <td><?= h($groupRoles->id) ?></td>
                <td><?= h($groupRoles->group_id) ?></td>
                <td><?= h($groupRoles->role_id) ?></td>
                <td><?= h($groupRoles->created) ?></td>
                <td><?= h($groupRoles->modified) ?></td>
                <td><?= h($groupRoles->created_by) ?></td>
                <td><?= h($groupRoles->modified_by) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'GroupRoles', 'action' => 'view', $groupRoles->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'GroupRoles', 'action' => 'edit', $groupRoles->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'GroupRoles', 'action' => 'delete', $groupRoles->id], ['confirm' => __('Are you sure you want to delete # {0}?', $groupRoles->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Role Access') ?></h4>
        <?php if (!empty($role->role_access)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Role Id') ?></th>
                <th scope="col"><?= __('Controller') ?></th>
                <th scope="col"><?= __('Action') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col"><?= __('Created By') ?></th>
                <th scope="col"><?= __('Modified By') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($role->role_access as $roleAccess): ?>
            <tr>
                <td><?= h($roleAccess->id) ?></td>
                <td><?= h($roleAccess->role_id) ?></td>
                <td><?= h($roleAccess->controller) ?></td>
                <td><?= h($roleAccess->action) ?></td>
                <td><?= h($roleAccess->created) ?></td>
                <td><?= h($roleAccess->modified) ?></td>
                <td><?= h($roleAccess->created_by) ?></td>
                <td><?= h($roleAccess->modified_by) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'RoleAccess', 'action' => 'view', $roleAccess->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'RoleAccess', 'action' => 'edit', $roleAccess->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'RoleAccess', 'action' => 'delete', $roleAccess->id], ['confirm' => __('Are you sure you want to delete # {0}?', $roleAccess->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>

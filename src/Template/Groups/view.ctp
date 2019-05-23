<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Group $group
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Group'), ['action' => 'edit', $group->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Group'), ['action' => 'delete', $group->id], ['confirm' => __('Are you sure you want to delete # {0}?', $group->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Groups'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Group'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Group Roles'), ['controller' => 'GroupRoles', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Group Role'), ['controller' => 'GroupRoles', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List User Groups'), ['controller' => 'UserGroups', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User Group'), ['controller' => 'UserGroups', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="groups view large-9 medium-8 columns content">
    <h3><?= h($group->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Group Name') ?></th>
            <td><?= h($group->group_name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($group->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created By') ?></th>
            <td><?= $this->Number->format($group->created_by) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified By') ?></th>
            <td><?= $this->Number->format($group->modified_by) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($group->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($group->modified) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Active') ?></th>
            <td><?= $group->active ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Group Roles') ?></h4>
        <?php if (!empty($group->group_roles)): ?>
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
            <?php foreach ($group->group_roles as $groupRoles): ?>
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
        <h4><?= __('Related User Groups') ?></h4>
        <?php if (!empty($group->user_groups)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('User Id') ?></th>
                <th scope="col"><?= __('Group Id') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col"><?= __('Created By') ?></th>
                <th scope="col"><?= __('Modified By') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($group->user_groups as $userGroups): ?>
            <tr>
                <td><?= h($userGroups->id) ?></td>
                <td><?= h($userGroups->user_id) ?></td>
                <td><?= h($userGroups->group_id) ?></td>
                <td><?= h($userGroups->created) ?></td>
                <td><?= h($userGroups->modified) ?></td>
                <td><?= h($userGroups->created_by) ?></td>
                <td><?= h($userGroups->modified_by) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'UserGroups', 'action' => 'view', $userGroups->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'UserGroups', 'action' => 'edit', $userGroups->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'UserGroups', 'action' => 'delete', $userGroups->id], ['confirm' => __('Are you sure you want to delete # {0}?', $userGroups->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>

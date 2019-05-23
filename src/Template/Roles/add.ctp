<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Role $role
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Roles'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Group Roles'), ['controller' => 'GroupRoles', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Group Role'), ['controller' => 'GroupRoles', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Role Access'), ['controller' => 'RoleAccess', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Role Acces'), ['controller' => 'RoleAccess', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="roles form large-9 medium-8 columns content">
    <?= $this->Form->create($role) ?>
    <fieldset>
        <legend><?= __('Add Role') ?></legend>
        <?php
            echo $this->Form->control('role_name');
            echo $this->Form->control('active');
        ?>
    </fieldset>
    <hr>
    <fieldset>
        <legend><?= __('Roles Access') ?></legend>
        <table>
            <?php foreach ($controllers as $controller) : ?>
                <tr class="acl-controller-list">
                    <td><b><?= implode(" ",preg_split('/(?=[A-Z])/',$controller)) ?></b></td>
                    <td><?= $this->Form->control("controllers[$controller][read]", ['type'=>'checkbox', 'label'=>'Read']) ?></td>
                    <td><?= $this->Form->control("controllers[$controller][write]", ['type'=>'checkbox', 'label'=>'Write']) ?></td>
                </tr>
            <?php endforeach; ?>
        </table>
        
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>

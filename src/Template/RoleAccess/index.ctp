<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\RoleAcces[]|\Cake\Collection\CollectionInterface $roleAccess
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Role Acces'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Roles'), ['controller' => 'Roles', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Role'), ['controller' => 'Roles', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="roleAccess index large-9 medium-8 columns content">
    <h3><?= __('Role Access') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('role_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('controller') ?></th>
                <th scope="col"><?= $this->Paginator->sort('action') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created_by') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified_by') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($roleAccess as $roleAcces): ?>
            <tr>
                <td><?= $this->Number->format($roleAcces->id) ?></td>
                <td><?= $roleAcces->has('role') ? $this->Html->link($roleAcces->role->id, ['controller' => 'Roles', 'action' => 'view', $roleAcces->role->id]) : '' ?></td>
                <td><?= h($roleAcces->controller) ?></td>
                <td><?= h($roleAcces->action) ?></td>
                <td><?= h($roleAcces->created) ?></td>
                <td><?= h($roleAcces->modified) ?></td>
                <td><?= $this->Number->format($roleAcces->created_by) ?></td>
                <td><?= $this->Number->format($roleAcces->modified_by) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $roleAcces->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $roleAcces->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $roleAcces->id], ['confirm' => __('Are you sure you want to delete # {0}?', $roleAcces->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>

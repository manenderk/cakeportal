<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Employee[]|\Cake\Collection\CollectionInterface $employees
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Employee'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Job Titles'), ['controller' => 'JobTitles', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Job Title'), ['controller' => 'JobTitles', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Departments'), ['controller' => 'Departments', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Department'), ['controller' => 'Departments', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Custom Fields'), ['controller' => 'CustomFields', 'action' => 'index']) ?>
        </li>
        <li><?= $this->Html->link(__('New Custom Fields'), ['controller' => 'CustomFields', 'action' => 'add']) ?>
        </li>
    </ul>
</nav>
<div class="employees index large-9 medium-8 columns content">
    <h3><?= __('Employees') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('user') ?></th>
                <th scope="col"><?= $this->Paginator->sort('employee_num') ?></th>
                <th scope="col"><?= $this->Paginator->sort('reporting_manager') ?></th>
                <th scope="col"><?= $this->Paginator->sort('job_title_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('department_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('is_active') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($employees as $employee): ?>
            <tr>
                <td><?= $this->Number->format($employee->id) ?></td>                
                <td><?= $this->UserFunctions->getUserDisplayNameWithLink($employee->user) ?></td>
                <td><?= h($employee->employee_num) ?></td>
                <td><?= $this->UserFunctions->getUserDisplayNameWithLink($employee->reporting_manager) ?></td>
                <td><?= $employee->has('job_title') ? $this->Html->link($employee->job_title->job_title, ['controller' => 'JobTitles', 'action' => 'view', $employee->job_title->id]) : '' ?></td>
                <td><?= $employee->has('department') ? $this->Html->link($employee->department->department_name, ['controller' => 'Departments', 'action' => 'view', $employee->department->id]) : '' ?></td>
                <td><?= $employee->is_active == 1 ? 'Yes' : 'No' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $employee->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $employee->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $employee->id], ['confirm' => __('Are you sure you want to delete # {0}?', $employee->id)]) ?>
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

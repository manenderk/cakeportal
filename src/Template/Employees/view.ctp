<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Employee $employee
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Employee'), ['action' => 'edit', $employee->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Employee'), ['action' => 'delete', $employee->id], ['confirm' => __('Are you sure you want to delete # {0}?', $employee->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Employees'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Employee'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Job Titles'), ['controller' => 'JobTitles', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Job Title'), ['controller' => 'JobTitles', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Departments'), ['controller' => 'Departments', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Department'), ['controller' => 'Departments', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="employees view large-9 medium-8 columns content">
    <h3><?= h($employee->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Employee Num') ?></th>
            <td><?= h($employee->employee_num) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Job Title') ?></th>
            <td><?= $employee->has('job_title') ? $this->Html->link($employee->job_title->job_title, ['controller' => 'JobTitles', 'action' => 'view', $employee->job_title->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Department') ?></th>
            <td><?= $employee->has('department') ? $this->Html->link($employee->department->department_name, ['controller' => 'Departments', 'action' => 'view', $employee->department->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($employee->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('First Name') ?></th>
            <td><?= h($user->first_name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Middle Name') ?></th>
            <td><?= h($user->middle_name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Last Name') ?></th>
            <td><?= h($user->last_name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Email') ?></th>
            <td><?= h($user->email) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Contact Number') ?></th>
            <td><?= h($user->contact_number) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Reporting Manager') ?></th>
            <td><?= $this->UserFunctions->getUserDisplayNameWithLink($employee->reporting_manager) ?></td>
        </tr>
        <?php foreach($customFieldsData as $customFieldData) : ?>
        <tr>
            <th scope="row"><?= __($customFieldData['name']) ?></th>
            <td><?= h($customFieldData['value']) ?></td>
        </tr>
        <?php endforeach; ?>
        <tr>
            <th scope="row"><?= __('Created By') ?></th>
            <td><?= $this->UserFunctions->getUserDisplayNameWithLink($employee->created_by) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified By') ?></th>
            <td><?= $this->UserFunctions->getUserDisplayNameWithLink($employee->modified_by) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($employee->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($employee->modified) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Is Active') ?></th>
            <td><?= $employee->is_active ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
</div>

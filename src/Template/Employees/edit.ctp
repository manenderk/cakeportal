<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Employee $employee
 */
$userOptions=[];
$jobTitleOptions=[];
$departmentOptions=[];

foreach ($users as $user) {
    $userOptions[$user['id']] = $user['first_name'] . " " . $user['middle_name'] . "  " . $user['last_name'] . " " . $user['email'];
}

foreach ($jobTitles as $jobTitle) {
    $jobTitleOptions[$jobTitle['id']] = $jobTitle['job_title'];
}

foreach ($departments as $department) {
    $departmentOptions[$department['id']]  = $department['department_name'];
}

?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?>
        </li>
        <li><?= $this->Form->postLink(
    __('Delete'),
    ['action' => 'delete', $employee->id],
    ['confirm' => __('Are you sure you want to delete # {0}?', $employee->id)]
            )
        ?>
        </li>
        <li><?= $this->Html->link(__('List Employees'), ['action' => 'index']) ?>
        </li>
        <li><?= $this->Html->link(__('List Job Titles'), ['controller' => 'JobTitles', 'action' => 'index']) ?>
        </li>
        <li><?= $this->Html->link(__('New Job Title'), ['controller' => 'JobTitles', 'action' => 'add']) ?>
        </li>
        <li><?= $this->Html->link(__('List Departments'), ['controller' => 'Departments', 'action' => 'index']) ?>
        </li>
        <li><?= $this->Html->link(__('New Department'), ['controller' => 'Departments', 'action' => 'add']) ?>
        </li>
    </ul>
</nav>
<div class="employees form large-9 medium-8 columns content">
    <?= $this->Form->create($employee) ?>
    <fieldset>
        <legend><?= __('Edit Employee') ?>
        </legend>
        <?php
            echo $this->Form->control('user', ['options' => $userOptions, 'empty' => false]);
            echo $this->Form->control('employee_num');
            echo $this->Form->control('reporting_manager', ['options' => $userOptions, 'empty' => false]);
            echo $this->Form->control('job_title_id', ['options' => $jobTitleOptions, 'empty' => true]);
            echo $this->Form->control('department_id', ['options' => $departmentOptions, 'empty' => true]);
            echo $this->Form->control('is_active');
            foreach ($customFieldsArray as $field) {
                if ($field['type'] == 'select') {
                    echo $this->Form->control('customField['.$field['id'].']', ['type'=>$field['type'], 'options' => $field['choices'], 'label' => $field['name'], 'value' => $field['value']]);
                } else {
                    echo $this->Form->control('customField['.$field['id'].']', ['type'=>$field['type'], 'label' => $field['name'], 'value' => $field['value']]);
                }
            }

        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
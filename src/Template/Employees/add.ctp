<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Employee $employee
 */

$userOptions=[];

foreach ($users as $user) {
    $userOptions[$user['id']] = $user['first_name'] . " " . $user['middle_name'] . "  " . $user['last_name'] . " " . $user['email'];
}

?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?>
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
        <li><?= $this->Html->link(__('List Custom Fields'), ['controller' => 'CustomFields', 'action' => 'index']) ?>
        </li>
        <li><?= $this->Html->link(__('New Custom Fields'), ['controller' => 'CustomFields', 'action' => 'add']) ?>
        </li>
    </ul>
</nav>
<div class="employees form large-9 medium-8 columns content">
    <?= $this->Form->create($employee) ?>
    <fieldset>
        <legend><?= __('Add Employee') ?>
        </legend>
        <?php
            echo $this->Form->control('user', ['options' => $userOptions, 'empty' => false]);
            echo $this->Form->control('employee_num');
            echo $this->Form->control('reporting_manager', ['options' => $userOptions, 'empty' => false]);
            echo $this->Form->control('job_title_id', ['options' => $jobTitles, 'empty' => true]);
            echo $this->Form->control('department_id', ['options' => $departments, 'empty' => true]);
            echo $this->Form->control('is_active');
            foreach($customFieldsArray as $field){
                if($field['type'] == 'select')
                    echo $this->Form->control('customField['.$field['id'].']', ['type'=>$field['type'], 'options' => $field['choices'], 'label' => $field['name']]);
                else
                    echo $this->Form->control('customField['.$field['id'].']', ['type'=>$field['type'], 'label' => $field['name']]);
            }   
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
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

<div class="row">

    <div class="col-md-12">
        <div class="page-title">EMPLOYEE
            <small>[ Add EMPLOYEE ]</small>
            <span class="pull-right short-ico">
                <a
                    href="<?php echo $_SERVER["HTTP_REFERER"]; ?>">
                    <i class="fa fa-hand-o-left fa-2x" title="Click to go back" data-toggle="tooltip"
                        data-placement="bottom"></i> Go Back
                </a>
                <a id="cancelBtn">
                    <i class="cursor-pointer fa fa-close fa-2x" title="Click to close this page" data-toggle="tooltip"
                        data-placement="bottom"></i> Close
                </a>
            </span>
        </div>
    </div>
</div>

<?= $this->Form->create($employee, ['id'=>'employeeForm','autocomplete'=>'Off']); ?>
<div class="panel-body bg-gray-lighter">
    <div class="panel-body">
        <div class="row">
            <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12 margintop3">
                <div class="row form-group">
                    <label class="col-lg-3 col-md-3 col-sm-3 col-xs-12 control-label">
                        <span class="text-danger">*</span>User</label>
                    <div class="col-lg-8 col-md-8 col-xs-12 col-sm-9">
                        <?php echo $this->Form->control('user', ['label'=>false, 'options' => $userOptions,'class'=>'input-sm bg-gray form-control','empty'=>'Select User']); ?>
                    </div>
                </div>
                <div class="row form-group">
                    <label class="col-lg-3 col-md-3 col-sm-3 col-xs-12 control-label">
                        <span class="text-danger">*</span>Employee Number</label>
                    <div class="col-lg-8 col-md-8 col-xs-12 col-sm-9">
                        <?php echo $this->Form->control('employee_num', ['label'=>false,  'type'=>'text', 'placeholder'=>'Enter Employee Number','class'=>'input-sm bg-gray form-control','autocomplete'=>'off']); ?>
                        <span id='message'></span>
                    </div>
                </div>
                <div class="row form-group">
                    <label class="col-lg-3 col-md-3 col-sm-3 col-xs-12 control-label">
                        <span class="text-danger">*</span>Reporting Manager</label>
                    <div class="col-lg-8 col-md-8 col-xs-12 col-sm-9">
                        <?php echo $this->Form->control('reporting_manager', ['label'=>false, 'options' => $userOptions,'class'=>'input-sm bg-gray form-control','empty'=>'Select Reporting Manager']); ?>
                    </div>
                </div>
                <div class="row form-group">
                    <label class="col-lg-3 col-md-3 col-sm-3 col-xs-12 control-label">
                        <span class="text-danger">*</span>Job Title</label>
                    <div class="col-lg-8 col-md-8 col-xs-12 col-sm-9">
                        <?php echo $this->Form->control('job_title_id', ['label'=>false, 'options' => $jobTitles,'class'=>'input-sm bg-gray form-control','empty'=>'Select Job Title']); ?>
                    </div>
                </div>
                <div class="row form-group">
                    <label class="col-lg-3 col-md-3 col-sm-3 col-xs-12 control-label">
                        <span class="text-danger">*</span>Department</label>
                    <div class="col-lg-8 col-md-8 col-xs-12 col-sm-9">
                        <?php echo $this->Form->control('department_id', ['label'=>false, 'options' => $departments,'class'=>'input-sm bg-gray form-control','empty'=>'Select Department']); ?>
                    </div>
                </div>
                <div class="row form-group">
                    <label class="col-lg-3 col-md-3 col-sm-3 col-xs-12 control-label">
                        <span class="text-danger">*</span>Active</label>
                    <div class="col-lg-8 col-md-8 col-xs-12 col-sm-9">
                        <?= $this->Form->control('is_active'); ?>
                    </div>
                </div>
                <?php
                foreach ($customFieldsArray as $field) : ?>
                <div class="row form-group">
                    <label class="col-lg-3 col-md-3 col-sm-3 col-xs-12 control-label"><?= $field['name'] ?></label>
                    <div class="col-lg-8 col-md-8 col-xs-12 col-sm-9">
                        <?php
                        if ($field['type'] == 'select') {
                            echo $this->Form->control('customField['.$field['id'].']', ['type'=>$field['type'], 'options' =>
                            $field['choices'], 'label' => false, 'class'=>'input-sm bg-gray form-control', 'empty'=>'Select '.$field['name']]);
                        } else {
                            echo $this->Form->control('customField['.$field['id'].']', ['type'=>$field['type'], 'label' =>
                            false, 'class'=>'input-sm bg-gray form-control', 'placeholder' => 'Enter '.$field['name']]);
                        }   
                        ?>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>

    </div>
    <div class="panel-footer">
        <div class="panel-body">
            <button class="btn btn-labeled btn btn-success" type="submit" title="Click here to save this client contact"
                data-toggle="tooltip" data-placement="bottom" id='submitBtn'>
                <i aria-hidden="true" class="fa fa-hdd-o"></i> Save</button>
        </div>
    </div>

</div>
<?= $this->Form->end() ?>
<?= $this->Html->script('jquery-validate');?>

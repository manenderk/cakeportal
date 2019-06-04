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

<div class="panel-body bg-gray-lighter">
    <div class="panel-body">
        <?= $this->Form->create($employee, ['id'=>'employeeForm','autocomplete'=>'Off']); ?>
        <div class="row">
            <h3>Employment Information</h3>
            <section>
                <div class="form-group col-md-6">
                    <label class="col-lg-3 col-md-3 col-sm-3 col-xs-12 control-label">
                        <span class="text-danger">*</span>User</label>
                    <div class="col-lg-8 col-md-8 col-xs-12 col-sm-9">
                        <?php echo $this->Form->control('user', ['label'=>false, 'options' => $userOptions,'class'=>'input-sm bg-gray form-control','empty'=>'Select User']); ?>
                    </div>
                </div>
                <div class="form-group col-md-6">
                    <label class="col-lg-3 col-md-3 col-sm-3 col-xs-12 control-label">
                        <span class="text-danger">*</span>Employee Number</label>
                    <div class="col-lg-8 col-md-8 col-xs-12 col-sm-9">
                        <?php echo $this->Form->control('employee_num', ['label'=>false,  'type'=>'text', 'placeholder'=>'Enter Employee Number','class'=>'input-sm bg-gray form-control','autocomplete'=>'off']); ?>
                        <span id='message'></span>
                    </div>
                </div>
                <div class="form-group col-md-6">
                    <label class="col-lg-3 col-md-3 col-sm-3 col-xs-12 control-label">
                        <span class="text-danger">*</span>Reporting Manager</label>
                    <div class="col-lg-8 col-md-8 col-xs-12 col-sm-9">
                        <?php echo $this->Form->control('reporting_manager', ['label'=>false, 'options' => $userOptions,'class'=>'input-sm bg-gray form-control','empty'=>'Select Reporting Manager', 'required'=>true]); ?>
                    </div>
                </div>
                <div class="form-group col-md-6">
                    <label class="col-lg-3 col-md-3 col-sm-3 col-xs-12 control-label">
                        <span class="text-danger">*</span>Job Title</label>
                    <div class="col-lg-8 col-md-8 col-xs-12 col-sm-9">
                        <?php echo $this->Form->control('job_title_id', ['label'=>false, 'options' => $jobTitles,'class'=>'input-sm bg-gray form-control','empty'=>'Select Job Title', 'required'=>true]); ?>
                    </div>
                </div>
                <div class="form-group col-md-6">
                    <label class="col-lg-3 col-md-3 col-sm-3 col-xs-12 control-label">
                        <span class="text-danger">*</span>Department</label>
                    <div class="col-lg-8 col-md-8 col-xs-12 col-sm-9">
                        <?php echo $this->Form->control('department_id', ['label'=>false, 'options' => $departments,'class'=>'input-sm bg-gray form-control','empty'=>'Select Department', 'required' => true]); ?>
                    </div>
                </div>
                <div class="form-group col-md-6">
                    <label class="col-lg-3 col-md-3 col-sm-3 col-xs-12 control-label">
                        <span class="text-danger">*</span>Active</label>
                    <div class="col-lg-8 col-md-8 col-xs-12 col-sm-9">
                        <?= $this->Form->control('is_active'); ?>
                    </div>
                </div>
            </section>
            <h3>Hiring Information</h3>
            <section>
                <div class="form-group col-md-6">
                    <label class="col-lg-3 col-md-3 col-sm-3 col-xs-12 control-label">
                        <span class="text-danger">*</span>Duty Type</label>
                    <div class="col-lg-8 col-md-8 col-xs-12 col-sm-9">
                        <?php echo $this->Form->control('duty_type', ['label'=>false, 'options' => ['Full Time'=>'Full Time', 'Part Time' => 'Part Time', 'Contract' => 'Contact', 'Other' => 'Other'] ,'class'=>'input-sm bg-gray form-control','empty'=>'Select Duty Type', 'required' => true]); ?>
                    </div>
                </div>
                <div class="form-group col-md-6">
                    <label class="col-lg-3 col-md-3 col-sm-3 col-xs-12 control-label">
                        <span class="text-danger">*</span>Hire Date</label>
                    <div class="col-lg-8 col-md-8 col-xs-12 col-sm-9">
                        <?php echo $this->Form->control('hire_date', ['type' => 'text', 'placeholder' => 'Select Hire Date', 'label'=>false,'class'=>'input-sm bg-gray form-control', 'required' => true]); ?>
                    </div>
                </div>
                <div class="form-group col-md-6">
                    <label class="col-lg-3 col-md-3 col-sm-3 col-xs-12 control-label">Termination Date</label>
                    <div class="col-lg-8 col-md-8 col-xs-12 col-sm-9">
                        <?php echo $this->Form->control('termination_date', ['type' => 'text', 'placeholder' => 'Select Termination Date','label'=>false,'class'=>'input-sm bg-gray form-control']); ?>
                    </div>
                </div>
                <div class="form-group col-md-6">
                    <label class="col-lg-3 col-md-3 col-sm-3 col-xs-12 control-label">Termination Reason</label>
                    <div class="col-lg-8 col-md-8 col-xs-12 col-sm-9">
                        <?php echo $this->Form->control('termination_reason', ['type' => 'textarea', 'placeholder' => 'Enter Termination Reason','label'=>false,'class'=>'input-sm bg-gray form-control']); ?>
                    </div>
                </div>
                <div class="form-group col-md-6">
                    <label class="col-lg-3 col-md-3 col-sm-3 col-xs-12 control-label">Contract Duration</label>
                    <div class="col-lg-8 col-md-8 col-xs-12 col-sm-9">
                        <?php $contractDurationOptions = [];
                        for ($i=1; $i<=48; $i++) {
                            if ($i == 1) {
                                $m = 'month';
                            } else {
                                $m = 'months';
                            }
                            $contractDurationOptions[$i." ".$m] = $i." ".$m;
                        }
                        ?>
                        <?php echo $this->Form->control('contract_duration', ['label'=>false, 'options' => $contractDurationOptions, 'empty' => 'Select Contract Duration', 'class'=>'input-sm bg-gray form-control']); ?>
                    </div>
                </div>
                <div class="form-group col-md-6">
                    <label class="col-lg-3 col-md-3 col-sm-3 col-xs-12 control-label">
                        <span class="text-danger">*</span>Rate Type</label>
                    <div class="col-lg-8 col-md-8 col-xs-12 col-sm-9">
                        <?php echo $this->Form->control('rate_type', ['label'=>false, 'options' => ['Hourly'=>'Hourly', 'Salaried' => 'Salaried'] ,'class'=>'input-sm bg-gray form-control','empty'=>'Select Rate Type', 'required' => true]); ?>
                    </div>
                </div>
                <div class="form-group col-md-6">
                    <label class="col-lg-3 col-md-3 col-sm-3 col-xs-12 control-label">
                        <span class="text-danger">*</span>Pay Frequency</label>
                    <div class="col-lg-8 col-md-8 col-xs-12 col-sm-9">
                        <?php echo $this->Form->control('pay_frequency', ['label'=>false, 'options' => ['Weekly'=>'Weekly', 'Monthly' => 'Monthly', 'Annualy' => 'Annualy', 'Others' => 'Others'] ,'class'=>'input-sm bg-gray form-control','empty'=>'Select Pay Frequency', 'required' => true]); ?>
                    </div>
                </div>
                <div class="form-group col-md-6">
                    <label class="col-lg-3 col-md-3 col-sm-3 col-xs-12 control-label">
                        <span class="text-danger">*</span>Salary</label>
                    <div class="col-lg-8 col-md-8 col-xs-12 col-sm-9">
                        <?php echo $this->Form->control('salary', ['label'=>false ,'class'=>'input-sm bg-gray form-control','empty'=>'Enter Salary', 'required' => true]); ?>
                    </div>
                </div>
            </section>
            <h3>Personal Information</h3>
            <section>
                <div class="form-group col-md-6">
                    <label class="col-lg-3 col-md-3 col-sm-3 col-xs-12 control-label">
                        <span class="text-danger">*</span>Date of Birth</label>
                    <div class="col-lg-8 col-md-8 col-xs-12 col-sm-9">
                        <?php echo $this->Form->control('dob', ['type' => 'text', 'placeholder' => 'Select Date of birth', 'label'=>false,'class'=>'input-sm bg-gray form-control', 'required' => true]); ?>
                    </div>
                </div>
                <div class="form-group col-md-6">
                    <label class="col-lg-3 col-md-3 col-sm-3 col-xs-12 control-label">
                        <span class="text-danger">*</span>Maritial Status</label>
                    <div class="col-lg-8 col-md-8 col-xs-12 col-sm-9">
                        <?php echo $this->Form->control('maritial_status', ['label'=>false, 'options' => ['Unmarried'=>'Unmarried', 'Married' => 'Married'] ,'class'=>'input-sm bg-gray form-control','empty'=>'Select Maritial Status', 'required' => true]); ?>
                    </div>
                </div>
                <div class="form-group col-md-6">
                    <label class="col-lg-3 col-md-3 col-sm-3 col-xs-12 control-label">
                        <span class="text-danger">*</span>Gender</label>
                    <div class="col-lg-8 col-md-8 col-xs-12 col-sm-9">
                        <?php echo $this->Form->control('gender', ['label'=>false, 'options' => ['Female' => 'Female', 'Male' => 'Male', 'Others' => 'Others'] ,'class'=>'input-sm bg-gray form-control','empty'=>'Select Gender', 'required' => true]); ?>
                    </div>
                </div>
                <div class="form-group col-md-6">
                    <label class="col-lg-3 col-md-3 col-sm-3 col-xs-12 control-label">
                        <span class="text-danger">*</span>Home Phone</label>
                    <div class="col-lg-8 col-md-8 col-xs-12 col-sm-9">
                        <?php echo $this->Form->control('home_phone', ['label'=>false, 'type' => 'text' ,'class'=>'input-sm bg-gray form-control','placeholder'=>'Enter Home Phone', 'required' => true]); ?>
                    </div>
                </div>
                <div class="form-group col-md-6">
                    <label class="col-lg-3 col-md-3 col-sm-3 col-xs-12 control-label">
                        <span class="text-danger">*</span>Personal Email</label>
                    <div class="col-lg-8 col-md-8 col-xs-12 col-sm-9">
                        <?php echo $this->Form->control('personal_email', ['label'=>false, 'type' => 'email' ,'class'=>'input-sm bg-gray form-control','placeholder'=>'Enter Personal Email', 'required' => true]); ?>
                    </div>
                </div>

                <div class="col-md-12">
                    <h5>Current Address</h5>
                </div>
                <hr>
                <div class="form-group col-md-6">
                    <label class="col-lg-3 col-md-3 col-sm-3 col-xs-12 control-label">
                        <span class="text-danger">*</span>Street Address</label>
                    <div class="col-lg-8 col-md-8 col-xs-12 col-sm-9">
                        <?php echo $this->Form->control('current_address_street', ['label'=>false, 'type' => 'text' ,'class'=>'input-sm bg-gray form-control','placeholder'=>'Street Address', 'required' => true]); ?>
                    </div>
                </div>
                <div class="form-group col-md-6">
                    <label class="col-lg-3 col-md-3 col-sm-3 col-xs-12 control-label">
                        <span class="text-danger">*</span>City</label>
                    <div class="col-lg-8 col-md-8 col-xs-12 col-sm-9">
                        <?php echo $this->Form->control('current_address_city', ['label'=>false, 'type' => 'text' ,'class'=>'input-sm bg-gray form-control','placeholder'=>'City', 'required' => true]); ?>
                    </div>
                </div>
                <div class="form-group col-md-6">
                    <label class="col-lg-3 col-md-3 col-sm-3 col-xs-12 control-label">
                        <span class="text-danger">*</span>State</label>
                    <div class="col-lg-8 col-md-8 col-xs-12 col-sm-9">
                        <?php echo $this->Form->control('current_address_state', ['label'=>false, 'type' => 'text' ,'class'=>'input-sm bg-gray form-control','placeholder'=>'State', 'required' => true]); ?>
                    </div>
                </div>
                <div class="form-group col-md-6">
                    <label class="col-lg-3 col-md-3 col-sm-3 col-xs-12 control-label">
                        <span class="text-danger">*</span>Country</label>
                    <div class="col-lg-8 col-md-8 col-xs-12 col-sm-9">
                        <?php echo $this->Form->control('current_address_country', ['label'=>false, 'type' => 'text' ,'class'=>'input-sm bg-gray form-control','placeholder'=>'Country', 'required' => true]); ?>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-6">
                            <h5>Permanent Address</h5>
                        </div>
                        <div class="col-md-6">
                            <label class="checkbox-inline">
                                <input type="checkbox" id="sameAsCurrentAddress">Same as Current Address
                            </label>
                            
                        </div>
                    </div>
                </div>
                <hr>
                <div class="form-group col-md-6">
                    <label class="col-lg-3 col-md-3 col-sm-3 col-xs-12 control-label">
                        <span class="text-danger">*</span>Street Address</label>
                    <div class="col-lg-8 col-md-8 col-xs-12 col-sm-9">
                        <?php echo $this->Form->control('permanent_address_street', ['label'=>false, 'type' => 'text' ,'class'=>'input-sm bg-gray form-control','placeholder'=>'Street Address', 'required' => true]); ?>
                    </div>
                </div>
                <div class="form-group col-md-6">
                    <label class="col-lg-3 col-md-3 col-sm-3 col-xs-12 control-label">
                        <span class="text-danger">*</span>City</label>
                    <div class="col-lg-8 col-md-8 col-xs-12 col-sm-9">
                        <?php echo $this->Form->control('permanent_address_city', ['label'=>false, 'type' => 'text' ,'class'=>'input-sm bg-gray form-control','placeholder'=>'City', 'required' => true]); ?>
                    </div>
                </div>
                <div class="form-group col-md-6">
                    <label class="col-lg-3 col-md-3 col-sm-3 col-xs-12 control-label">
                        <span class="text-danger">*</span>State</label>
                    <div class="col-lg-8 col-md-8 col-xs-12 col-sm-9">
                        <?php echo $this->Form->control('permanent_address_state', ['label'=>false, 'type' => 'text' ,'class'=>'input-sm bg-gray form-control','placeholder'=>'State', 'required' => true]); ?>
                    </div>
                </div>
                <div class="form-group col-md-6">
                    <label class="col-lg-3 col-md-3 col-sm-3 col-xs-12 control-label">
                        <span class="text-danger">*</span>Country</label>
                    <div class="col-lg-8 col-md-8 col-xs-12 col-sm-9">
                        <?php echo $this->Form->control('permanent_address_country', ['label'=>false, 'type' => 'text' ,'class'=>'input-sm bg-gray form-control','placeholder'=>'Country', 'required' => true]); ?>
                    </div>
                </div>
            </section>
            <h3>Additional Information</h3>
            <section>
                <div class="form-group col-md-6">
                    <label class="col-lg-3 col-md-3 col-sm-3 col-xs-12 control-label">
                        <span class="text-danger">*</span>Emergency Contact Person 1</label>
                    <div class="col-lg-8 col-md-8 col-xs-12 col-sm-9">
                        <?php echo $this->Form->control('emergency_contact_person_name_1', ['label'=>false, 'type' => 'text' ,'class'=>'input-sm bg-gray form-control','placeholder'=>'Person Name', 'required' => true]); ?>
                    </div>
                </div>

                <div class="form-group col-md-6">
                    <label class="col-lg-3 col-md-3 col-sm-3 col-xs-12 control-label">
                        <span class="text-danger">*</span>Emergency Contact Person Contact Number 1</label>
                    <div class="col-lg-8 col-md-8 col-xs-12 col-sm-9">
                        <?php echo $this->Form->control('emergency_contact_person_contact_1', ['label'=>false, 'type' => 'text' ,'class'=>'input-sm bg-gray form-control','placeholder'=>'Contact Number', 'required' => true]); ?>
                    </div>
                </div>

                <div class="form-group col-md-6">
                    <label class="col-lg-3 col-md-3 col-sm-3 col-xs-12 control-label">Emergency Contact Person 2</label>
                    <div class="col-lg-8 col-md-8 col-xs-12 col-sm-9">
                        <?php echo $this->Form->control('emergency_contact_person_name_2', ['label'=>false, 'type' => 'text' ,'class'=>'input-sm bg-gray form-control','placeholder'=>'Person Name']); ?>
                    </div>
                </div>

                <div class="form-group col-md-6">
                    <label class="col-lg-3 col-md-3 col-sm-3 col-xs-12 control-label">Emergency Contact Person Contact
                        Number 2</label>
                    <div class="col-lg-8 col-md-8 col-xs-12 col-sm-9">
                        <?php echo $this->Form->control('emergency_contact_person_contact_2', ['label'=>false, 'type' => 'text' ,'class'=>'input-sm bg-gray form-control','placeholder'=>'Contact Number']); ?>
                    </div>
                </div>
                <?php
                foreach ($customFieldsArray as $field) : ?>
                <div class="form-group col-md-6">
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
            </section>
        </div>
        <?= $this->Form->end() ?>
    </div>
</div>
<script>
    var form = $("#employeeForm");
    form.validate({
        errorPlacement: function errorPlacement(error, element) {
            element.before(error);
        }
        /* ,
                rules: {
                    confirm: {
                        equalTo: "#password"
                    }
                } */
    });
    form.children("div").steps({
        headerTag: "h3",
        bodyTag: "section",
        transitionEffect: "slideLeft",
        onStepChanging: function(event, currentIndex, newIndex) {
            form.validate().settings.ignore = ":disabled,:hidden";
            return form.valid();
        },
        onStepChanged: function(event, currentIndex, priorIndex) {
            $('.wizard > .content').height($('#steps-uid-1-p-' + currentIndex).height() + 50);
        },
        onFinishing: function(event, currentIndex) {
            form.validate().settings.ignore = ":disabled";
            return form.valid();
        },
        onFinished: function(event, currentIndex) {
            form.submit();
        }
    });

    $('#hire-date').datepicker({
        format: 'yyyy-mm-dd'
    });

    $('#termination-date').datepicker({
        format: 'yyyy-mm-dd'
    });
    $('#dob').datepicker({
        format: 'yyyy-mm-dd'
    });

    $('#sameAsCurrentAddress').change(function() {
        if ($(this).val() == 'on') {
            $('#permanent-address-street').val($('#current-address-street').val());
            $('#permanent-address-city').val($('#current-address-city').val());
            $('#permanent-address-state').val($('#current-address-state').val());
            $('#permanent-address-country').val($('#current-address-country').val());
        }
    })
</script>
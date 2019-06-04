<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Employee $employee
 */
?>
<div class="row">

    <div class="col-md-12">
        <div class="page-title">VIEW EMPLOYEE
            <span class="pull-right short-ico">

                <a href="<?php echo $_SERVER["HTTP_REFERER"]; ?>"
                    title="Back" data-toggle="tooltip" data-placement="top">
                    <button class="btn btn-labeled btn-default" type="button">
                        <span class="btn-label"><i class="fa fa-hand-o-left"></i>
                        </span>Back</button>
                </a>
                <!-- TODO: HIDE THIS AS PER ACL -->
                <a
                    href="<?php echo $this->Url->build(["controller" => "employees", "action" => "edit", $employee->id]); ?>">
                    <button class="btn btn-labeled btn-default" type="button">
                        <span class="btn-label"><i class="fa fa-pencil-square-o"></i>
                        </span>Edit</button>
                </a>
            </span>
        </div>
    </div>

</div>



<?php ?>
<div class="row">
           
    <div class="col-lg-12">
        <div class="panel-body">
            <div class="row">
                <div class="col-lg-9">
                    
                    <div class="skillbx-area">
                        <h4>Employee Information</h4>
                        <ul class="skillbx-area-info-list">
                            <li>
                                <span class="info-icon-style">
                                    <i aria-hidden="true" class="fa fa-user"></i>
                                </span>
                                <span>Employee Number</span>
                                <?= h($employee->employee_num) ?>
                            </li>  
                            <li>
                                <span class="info-icon-style">
                                    <i aria-hidden="true" class="fa fa-user"></i>
                                </span>
                                <span>Job Title</span>
                                <?= $employee->has('job_title') ? $this->Html->link($employee->job_title->job_title, ['controller' => 'JobTitles', 'action' => 'view', $employee->job_title->id]) : '' ?>
                            </li>    
                                                           
                            <li>
                                <span class="info-icon-style">
                                    <i aria-hidden="true" class="fa fa-user"></i>
                                </span>
                                <span>First Name</span>
                                <?= h($user->first_name) ?>
                            </li>
                                
                            <li>
                                <span class="info-icon-style">
                                    <i aria-hidden="true" class="fa fa-user"></i>
                                </span>
                                <span>Middle Name</span>
                                <?= h($user->middle_name) ?>
                            </li>
                            <li>
                                <span class="info-icon-style">
                                    <i aria-hidden="true" class="fa fa-user"></i>
                                </span>
                                <span>Last Name</span>
                                <?= h($user->last_name) ?>
                            </li>
                            
                            <li>
                                <span class="info-icon-style">
                                    <i aria-hidden="true" class="fa fa-user"></i>
                                </span>
                                <span>Email</span>
                                <?= h($user->email) ?>
                            </li>
                            <li>
                                <span class="info-icon-style">
                                    <i aria-hidden="true" class="fa fa-user"></i>
                                </span>
                                <span>Contact Number</span>
                                <?= h($user->contact_number) ?>
                            </li>
                                                    
                            <li>
                                <span class="info-icon-style">
                                    <i aria-hidden="true" class="fa fa-user"></i>
                                </span>
                                <span>Department</span>
                                <?= $employee->has('department') ? $this->Html->link($employee->department->department_name, ['controller' => 'Departments', 'action' => 'view', $employee->department->id]) : '' ?>
                            </li> 
                            <li>
                                <span class="info-icon-style">
                                    <i aria-hidden="true" class="fa fa-user"></i>
                                </span>
                                <span>Reporting Manager</span>
                                <?= $this->UserFunctions->getUserDisplayNameWithLink($employee->reporting_manager) ?>
                            </li>
                            <li>
                                <span class="info-icon-style">
                                    <i aria-hidden="true" class="fa fa-user"></i>
                                </span>
                                <span>Duty Type</span>
                                <?= h($employee->duty_type) ?>
                            </li>
                            
                            <li>
                                <span class="info-icon-style">
                                    <i aria-hidden="true" class="fa fa-user"></i>
                                </span>
                                <span>Hire Date</span>
                                <?= h($employee->hire_date) ?>
                            </li>
                            
                            <li>
                                <span class="info-icon-style">
                                    <i aria-hidden="true" class="fa fa-user"></i>
                                </span>
                                <span>Termination Date</span>
                                <?= h($employee->termination_date) ?>
                            </li>
                            
                            <li>
                                <span class="info-icon-style">
                                    <i aria-hidden="true" class="fa fa-user"></i>
                                </span>
                                <span>Termination Reason</span>
                                <?= h($employee->termination_reason) ?>
                            </li>
                            
                            <li>
                                <span class="info-icon-style">
                                    <i aria-hidden="true" class="fa fa-user"></i>
                                </span>
                                <span>Contract Duration</span>
                                <?= h($employee->contract_duration) ?>
                            </li>
                            
                            <li>
                                <span class="info-icon-style">
                                    <i aria-hidden="true" class="fa fa-user"></i>
                                </span>
                                <span>Rate Type</span>
                                <?= h($employee->rate_type) ?>
                            </li>
                            
                            <li>
                                <span class="info-icon-style">
                                    <i aria-hidden="true" class="fa fa-user"></i>
                                </span>
                                <span>Hourly Rate</span>
                                <?= h($employee->hourly_rate) ?>
                            </li>
                            
                            <li>
                                <span class="info-icon-style">
                                    <i aria-hidden="true" class="fa fa-user"></i>
                                </span>
                                <span>Salary</span>
                                <?= h($employee->salary) ?>
                            </li>
                            
                            <li>
                                <span class="info-icon-style">
                                    <i aria-hidden="true" class="fa fa-user"></i>
                                </span>
                                <span>Pay Frequency</span>
                                <?= h($employee->pay_frequency) ?>
                            </li>
                            
                            <li>
                                <span class="info-icon-style">
                                    <i aria-hidden="true" class="fa fa-user"></i>
                                </span>
                                <span>Date of birth</span>
                                <?= h($employee->dob) ?>
                            </li>
                            
                            <li>
                                <span class="info-icon-style">
                                    <i aria-hidden="true" class="fa fa-user"></i>
                                </span>
                                <span>Maritial Status</span>
                                <?= h($employee->maritial_status) ?>
                            </li>
                            
                            <li>
                                <span class="info-icon-style">
                                    <i aria-hidden="true" class="fa fa-user"></i>
                                </span>
                                <span>Gender</span>
                                <?= h($employee->gender) ?>
                            </li>
                            
                            <li>
                                <span class="info-icon-style">
                                    <i aria-hidden="true" class="fa fa-user"></i>
                                </span>
                                <span>Home Phone</span>
                                <?= h($employee->home_phone) ?>
                            </li>
                            
                            <li>
                                <span class="info-icon-style">
                                    <i aria-hidden="true" class="fa fa-user"></i>
                                </span>
                                <span>Personal Email</span>
                                <?= h($employee->personal_email) ?>
                            </li>
                            
                            <li>
                                <span class="info-icon-style">
                                    <i aria-hidden="true" class="fa fa-user"></i>
                                </span>
                                <span>Current Address</span>
                                <?= h($employee->current_address_street .", ". $employee->current_address_city .", ". $employee->current_address_state. ", ". $employee->current_address_country) ?>
                            </li>
                            
                            <li>
                                <span class="info-icon-style">
                                    <i aria-hidden="true" class="fa fa-user"></i>
                                </span>
                                <span>Permanent Address</span>
                                <?= h($employee->permanent_address_street .", ". $employee->permanent_address_city .", ". $employee->permanent_address_state. ", ". $employee->permanent_address_country) ?>
                            </li>
                            
                            <li>
                                <span class="info-icon-style">
                                    <i aria-hidden="true" class="fa fa-user"></i>
                                </span>
                                <span>Emergency Contact 1</span>
                                <?= h($employee->emergency_contact_person_name_1.", ".$employee->emergency_contact_person_contact_1) ?>
                            </li>
                            
                            <li>
                                <span class="info-icon-style">
                                    <i aria-hidden="true" class="fa fa-user"></i>
                                </span>
                                <span>Emergency Contact 2</span>
                                <?= h($employee->emergency_contact_person_name_2.", ".$employee->emergency_contact_person_contact_2) ?>
                            </li>
                            
                                                       
                            <?php foreach ($customFieldsData as $customFieldData) : ?>
                            <li>
                                <span class="info-icon-style">
                                    <i aria-hidden="true" class="fa fa-user"></i>
                                </span>
                                <span><?= __($customFieldData['name']) ?></span>
                                <?= h($customFieldData['value']) ?>
                            </li>
                            <?php endforeach; ?>
                            <li>
                                <span class="info-icon-style">
                                    <i aria-hidden="true" class="fa fa-user"></i>
                                </span>
                                <span>Status</span>
                                <?= $employee->is_active ? __('Active') : __('Inactive'); ?>
                            </li>

                        </ul>
                    </div>
                </div>               
            </div>
        </div>


    </div>
</div>
<?= $this->Html->css('font-awesome-animation.min.css') ?>
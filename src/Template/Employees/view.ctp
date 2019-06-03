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
                                <span>Department</span>
                                <?= $employee->has('department') ? $this->Html->link($employee->department->department_name, ['controller' => 'Departments', 'action' => 'view', $employee->department->id]) : '' ?>
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
                                <span>Reporting Manager</span>
                                <?= $this->UserFunctions->getUserDisplayNameWithLink($employee->reporting_manager) ?>
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

<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Employee[]|\Cake\Collection\CollectionInterface $employees
 */
?>
<div class="row">
    <div class="col-md-12">
        <div class="page-title"> EMPLOYEES
            <span class="pull-right short-ico">
                <a
                    href="<?php echo $_SERVER["HTTP_REFERER"]; ?>">
                    <button type="button" class="btn btn-labeled btn-default">
                        <span class="btn-label"><i class="fa fa-hand-o-left"></i>
                        </span>Back</button>
                </a>
                <!-- TODO: ACL - SHOW ONLY WHEN USER HAS WRITE ACCESS -->
                <a
                    href="<?php echo $this->Url->build(["controller" => "employees", "action" => "add"]); ?>">
                    <button type="button" class="btn btn-labeled btn-default">
                        <span class="btn-label"><i class="fa fa-plus"></i>
                        </span>Add</button>
                </a>
            </span>
        </div>
    </div>
</div>

<div class="row">
    <div class="panel-body user-seabx">
        <?php echo $this->Form->create('Employees', ['role'=>'form','class'=>'form-inline', 'url' => ['action' =>'index']]); ?>
        <div class="col-lg-5 col-md-5 text-center col-xs-12 col-sm-5">
            <?php echo $this->Form->control('name', ['label'=>false,'placeholder'=>'Employee Name','class'=>'form-control atsborder input-sm','default'=>@$_POST['name']]); ?>
        </div>
        <div class="col-lg-3 col-md-3 text-center col-xs-12 col-sm-3">
            <?php echo $this->Form->control('email', ['label'=>false,'placeholder'=>'Email','class'=>'form-control atsborder input-sm','default'=>@$_POST['email']]); ?>
        </div>
        <div class="col-lg-3 text-center col-md-3 col-xs-12 col-sm-3">
            <?php echo $this->Form->control('employee_num', ['label'=>false,'placeholder'=>'Employee Number','class'=>'form-control atsborder input-sm','default'=>@$_POST['employee_num']]); ?>
        </div>
        <div class="col-lg-1 text-center col-xs-12 col-md-1 col-sm-1">
            <button class="mb-sm btn btn-success" type="submit" title="Click here to serach" data-toggle="tooltip"
                data-placement="bottom">
                Search
            </button>
        </div>
        <?php echo $this->Form->end(); ?>
    </div>
</div>

<div class="panel panel-default">
    <div class="table-responsive">
        <table id="employees" class="table table-bordered table-hover">
            <thead class="bg-gray">
                <tr>
                    <th><?= $this->Paginator->sort('employee_num') ?>
                    </th>
                    <th><?= $this->Paginator->sort('email') ?>
                    </th>
                    <th><?= $this->Paginator->sort('employee_num') ?>
                    </th>
                    <th><?= $this->Paginator->sort('job_title_id') ?>
                    </th>
                    <th><?= $this->Paginator->sort('department_id') ?>
                    </th>
                    <th><?= $this->Paginator->sort('is_active') ?>
                    </th>
                    <!-- TODO: HIDE THIS AS PER ACL -->
                    <th>
                    </th>
                </tr>
            </thead>
            <tbody id="newrow1">
                <?php foreach ($employees as $employee) : ?>
                <?php $user = $this->UserFunctions->getUserDetails($employee->user);?>
                <tr class="bg-gray-lighter">
                    <td>
                        <?= $this->Html->link( $user['first_name']." ".$user['middle_name']." ".$user['last_name'], ['controller' => 'Employees', 'action' => 'view', $employee->id]) ?>
                    </td>
                    <td>
                        <?= $user['email'] ?>
                    </td>
                    <td>
                        <?= $employee->employee_num ?>
                    </td>
                    <td><?= $employee->has('job_title') ? $this->Html->link($employee->job_title->job_title, ['controller' => 'JobTitles', 'action' => 'view', $employee->job_title->id]) : '' ?>
                    </td>
                    <td><?= $employee->has('department') ? $this->Html->link($employee->department->department_name, ['controller' => 'Departments', 'action' => 'view', $employee->department->id]) : '' ?>
                    </td>
                    <td><?= $employee->is_active == 1 ? 'Yes' : 'No' ?>
                    </td>
                    <!-- TODO: HIDE THIS AS PER ACL  -->
                    <td>
                        <a
                            href="<?php echo $this->Url->build(["controller" => "employees", "action" => "edit",$employee->id]); ?>">
                            <em class="fa fa-pencil-square-o pull-right faa-tada"
                                title="Click to edit this Employee" data-toggle="tooltip"
                                data-placement="left"></em>
                        </a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <!-- END table-responsive-->

</div>
<div class="paginator">
    <ul class="pagination">
        <?php echo $this->Paginator->next('Show more Employees...'); ?>
    </ul>
</div>
<script>
    // For unlimited scrolling by user
    $(function() {
        var $container = $('#employees');
        $container.infinitescroll({
            navSelector: '.next', // selector for the paged navigation 
            nextSelector: '.next a', // selector for the NEXT link (to page 2)
            itemSelector: '#newrow1', // selector for all items you'll retrieve
            debug: true,
            dataType: 'html',
            loading: {
                finishedMsg: 'No more Employees',
                img: 'img/spinner.gif'
            }
        });
    });
</script>
<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\JobType $jobType
 */
?>
<div class="row">
    <div class="col-md-12">
        <div class="page-title">JOB TYPE
            <span class="pull-right short-ico">
                <a href="<?php echo $_SERVER["HTTP_REFERER"]; ?>">
                    <i class="fa fa-hand-o-left fa-2x" title="Click to go back" data-toggle="tooltip"
                        data-placement="bottom"></i> Go Back
                </a>
                <!-- TODO: HIDE THIS AS PER ACL -->
                <a href="<?php echo $this->Url->build(["controller" => "jobTypes", "action" => "edit", $jobType->id]); ?>">
                    <i class="fa fa-pencil-square-o fa-2x faa-tada" title="Click here to edit this job type"
                        data-toggle="tooltip" data-placement="bottom">
                        Edit
                    </i>
                </a>
            </span>
        </div>
    </div>
</div>
<div class="panel widget">
    <div class="panel-body">
        <div class="col-lg-6 col-md-6 pnl-pr">
            <!-- START panel-->
            <div class="panel panel-warning pnl-mb">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <em class="fa fa-comments fa-5x"></em>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div class="text-md">Job Type Name</div>
                            <p class="m0"><?= h($jobType->title) ?>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END panel-->
        </div>
    </div>
</div>
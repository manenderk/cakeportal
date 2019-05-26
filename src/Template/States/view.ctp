<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\State $state
 */
?>
<div class="row">
    <div class="col-md-12">
        <div class="page-title">STATE
            <span class="pull-right short-ico">
                <a href="<?php echo $_SERVER["HTTP_REFERER"]; ?>" title="Back">
                    <button class="btn btn-labeled btn-default" type="button">
                        <span class="btn-label"><i class="fa fa-hand-o-left"></i>
                        </span>Back</button>
                </a>
                <!-- TODO: HIDE THIS AS PER ACL -->
                <a href="<?php echo $this->Url->build(["controller" => "states", "action" => "edit", $state->id]); ?>" title="Edit">
                    <button class="btn btn-labeled btn-default" type="button">Edit
                        <span class="btn-label btn-label-right"><i class="fa fa-pencil-square-o"></i>
                        </span>
                    </button>
                </a>
            </span>
        </div>
    </div>
</div>
<div class="panel widget pnl-mb ">
    <div class="panel-body p-l-p-r">
        <div class="col-lg-6 col-md-6 panel-mbtm">
            <!-- START panel-->
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <em class="fa fa-globe fa-5x"></em>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div class="text-md">Country Name</div>
                            <p class="m0" title="Click to view this country" data-toggle="tooltip" data-placement="">
                                <?= $state->has('country') ? $this->Html->link($state->country->name, ['controller' =>
                                'Countries', 'action' => 'view', $state->country->id]) : '' ?></p>
                        </div>
                    </div>
                </div>
                <!-- END panel-->
            </div>
        </div>
        <div class="col-lg-6 col-md-6 panel-mbtm">
            <!-- START panel-->
            <div class="panel panel-warning">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <em class="fa fa-location-arrow fa-5x"></em>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div class="text-md">State Name</div>
                            <p class="m0"><?= h($state->name) ?></h4>
                        </div>
                        </p>
                    </div>
                </div>
            </div>
            <!-- END panel-->
        </div>
        <div class="col-lg-6 col-md-6">
            <!-- START panel-->
            <div class="panel panel-success">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <em class="fa fa-comments fa-5x"></em>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div class="text-md">Description</div>
                            <p class="m0"><?= h($state->comments) ?></h4>
                        </div>
                        </p>
                    </div>
                </div>
            </div>
            <!-- END panel-->
        </div>
        <div class="col-lg-6 col-md-6">
            <!-- START panel-->
            <div class="panel panel-danger">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <em class="fa fa-globe fa-5x"></em>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div class="text-md">Status</div>
                            <p class="m0"><?= $state->is_active ? __('Yes') : __('No'); ?></h4>
                        </div>
                        </p>
                    </div>
                </div>
            </div>
            <!-- END panel-->
        </div>
    </div>
</div>
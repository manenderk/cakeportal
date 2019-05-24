<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Country $country
 */
?>
<div class="row">
    <div class="col-md-12">
        <div class="page-title">COUNTRY
            <span class="pull-right short-ico">
                <a href="<?php echo $_SERVER["HTTP_REFERER"]; ?>"
                    title="Back">
                    <button class="btn btn-labeled btn-default" type="button">
                        <span class="btn-label"><i class="fa fa-hand-o-left"></i>
                        </span>Back</button>
                </a>
                <!-- TODO: ACL - SHOW ONLY WHEN USER HAS WRITE ACCESS -->
                <a href="<?php echo $this->Url->build(["controller" => "countries", "action" => "edit",$country->id]); ?>">
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
        <div class="col-lg-4 col-md-4">
            <!-- START panel-->
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <em class="fa fa-globe fa-5x"></em>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div class="text-md">Country Name</div>
                            <p class="m0"><?= h($country->name) ?>
                            </p>
                        </div>
                    </div>
                </div>
                <!-- END panel-->
            </div>
        </div>
        <div class="col-lg-4 col-md-4">
            <!-- START panel-->
            <div class="panel panel-warning">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <em class="fa fa-comments fa-5x"></em>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div class="text-md">Description</div>
                            <p class="m0"><?= h($country->comments) ?>
                            </p>
                        </div>
                    </div>
                </div>

            </div>
            <!-- END panel-->
        </div>
        <div class="col-lg-4 col-md-4">
            <!-- START panel-->
            <div class="panel panel-success">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <em class="fa fa-exclamation-triangle fa-5x"></em>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div class="text-md">Status</div>
                            <p class="m0"><?= $country->is_active ? __('Yes') : __('No'); ?>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END panel-->
        </div>
    </div>
</div>
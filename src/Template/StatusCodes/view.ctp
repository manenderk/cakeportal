<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\StatusCode $statusCode
 */
?>
<div class="row">
    <div class="col-md-12">
        <div class="page-title">STATUS CODE
            <span class="pull-right short-ico">
                <a
                    href="<?php echo $_SERVER["HTTP_REFERER"]; ?>">
                    <button class="btn btn-labeled btn-default" type="button">
                        <span class="btn-label"><i class="fa fa-hand-o-left"></i>
                        </span>Back</button>
                </a>
                <!-- TODO: HIDE THIS AS PER ACL -->
                <a
                    href="<?php echo $this->Url->build(["controller" => "statusCodes", "action" => "edit",$statusCode->id]); ?>">
                    <button class="btn btn-labeled btn-default" type="button">Edit
                        <span class="btn-label btn-label-right"><i class="fa fa-pencil-square-o"></i>
                        </span>
                    </button>
                </a>

            </span></div>
    </div>
</div>
<div class="panel widget">
    <div class="panel-body">
        <div class="col-lg-6 col-md-6 pnl-pl">
            <!-- START panel-->
            <div class="panel panel-primary pnl-mb">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <em class="fa fa-globe fa-5x"></em>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div class="text-md">Status Code Name</div>
                            <p class="m0"><?= h($statusCode->name) ?>
                            </p>
                        </div>
                    </div>
                </div>
                <!-- END panel-->
            </div>
        </div>
        <div class="col-lg-6 col-md-6 pnl-pr">
            <!-- START panel-->
            <div class="panel panel-warning pnl-mb">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <em class="fa fa-comments fa-5x"></em>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div class="text-md">Description</div>
                            <p class="m0"><?= h($statusCode->description) ?>
                            </p>
                        </div>
                    </div>
                </div>

            </div>
            <!-- END panel-->
        </div>
    </div>
</div>
<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\BusinessDomain $businessDomain
 */
?>
<div class="row">
    <div class="col-md-12">
        <div class="page-title">BUSINESS DOMAIN
            <span class="pull-right short-ico">
                <a href="<?php echo $_SERVER["HTTP_REFERER"]; ?>"
                    title="Back">
                    <button type="button" class="btn btn-labeled btn-default">
                        <span class="btn-label"><i class="fa fa-hand-o-left"></i>
                        </span>Back</button>
                </a>
                <!-- TODO: ACL - SHOW ONLY WHEN USER HAS WRITE ACCESS -->
                <a href="<?php echo $this->Url->build(["controller" => "businessDomains", "action" => "edit",$businessDomain->id]); ?>"
                    title="Edit">
                    <button type="button" class="btn btn-labeled btn-default">
                        <span class="btn-label"><i class="fa fa-pencil-square-o"></i>
                        </span>Edit</button>
                </a>
            </span>
        </div>
    </div>
</div>
<div class="panel widget pnl-mb">
    <div class="panel-body p-l-p-r">
        <div class="col-lg-6 col-md-6">
            <!-- START panel-->
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <em class="fa fa-globe fa-5x"></em>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div class="text-md">Business Domain Name</div>
                            <p class="m0"><?= h($businessDomain->name) ?>
                            </p>
                        </div>
                    </div>
                </div>
                <!-- END panel-->
            </div>
        </div>
        <div class="col-lg-6 col-md-6">
            <!-- START panel-->
            <div class="panel panel-warning">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <em class="fa fa-comments fa-5x"></em>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div class="text-md">Description</div>
                            <p class="m0"><?= h($businessDomain->description) ?>
                            </p>
                        </div>
                    </div>
                </div>

            </div>
            <!-- END panel-->
        </div>
    </div>
</div>
<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Client $client
 */
?>

<div class="row">
    <div class="col-md-12">
        <div class="page-title">CLIENT
            <span class="pull-right short-ico">
                <a
                    href="<?php echo $_SERVER["HTTP_REFERER"]; ?>">
                    <i class="fa fa-hand-o-left fa-2x" title="Click to go back" data-toggle="tooltip"
                        data-placement="bottom"></i> Go Back
                </a>
                <!-- TODO: HIDE THIS AS PER ACL -->
                <a
                    href="<?php echo $this->Url->build(["controller" => "clients", "action" => "edit",$client->id]); ?>">
                    <i class="fa fa-pencil-square-o fa-2x faa-tada " title="Click here to edit this business domain"
                        data-toggle="tooltip" data-placement="bottom"></i> Edit
                </a>
            </span>
        </div>
    </div>
</div>
<div class="row">
    <div class="panel widget">
        <div class="panel-body">
            <div class="col-lg-6 col-md-6 pnl-pl c-view-bx">
                <!-- START panel-->
                <div class="panel panel-primary pnl-mb">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-3">
                                <em class="fa fa-user fa-5x"></em>
                            </div>
                            <div class="col-xs-9 text-right">
                                <div class="text-md">Client Name</div>
                                <p class="m0"><?= h($client->name) ?>
                                </p>
                            </div>
                        </div>
                    </div>

                    <!-- END panel-->
                </div>
            </div>
            <div class="col-lg-6 col-md-6 pnl-pr c-view-bx">
                <!-- START panel-->
                <div class="panel panel-warning pnl-mb">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-3">
                                <em class="fa fa-comments fa-5x"></em>
                            </div>
                            <div class="col-xs-9 text-right">
                                <div class="text-md">Description</div>
                                <p class="m0"><?= h($client->description) ?>
                                </p>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- END panel-->
            </div>
            <div class="col-lg-6 col-md-6 pnl-pl c-view-bx">
                <!-- START panel-->
                <div class="panel panel-danger pnl-mb">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-3">
                                <em class="fa fa-square-o fa-5x"></em>
                            </div>
                            <div class="col-xs-9 text-right">
                                <div class="text-md">Status</div>
                                <p class="m0"><?= $client->status == 1 ? 'Active ' : 'Inactive' ?>
                                </p>
                            </div>
                        </div>
                    </div>

                    <!-- END panel-->
                </div>
            </div>
            <div class="col-lg-6 col-md-6 pnl-pr c-view-bx">
                <!-- START panel-->
                <div class="panel panel-success pnl-mb">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-3">
                                <em class="fa fa-calendar fa-5x"></em>
                            </div>
                            <div class="col-xs-9 text-right">
                                <div class="text-md">Contract Expiry Date</div>
                                <p class="m0"><?= h($client->contract_expiry_date) ?>
                                </p>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- END panel-->
            </div>
            <div class="col-lg-6 col-md-6 pnl-pl c-view-bx">
                <!-- START panel-->
                <div class="panel panel-inverse pnl-mb">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-3">
                                <em class="fa fa-edit fa-5x"></em>
                            </div>
                            <div class="col-xs-9 text-right">
                                <div class="text-md">Contract Signed ?</div>
                                <p class="m0"><?= $client->is_contract_signed ? __('Yes') : __('No'); ?>
                                </p>
                            </div>
                        </div>
                    </div>
                    <!-- END panel-->
                </div>
            </div>
            <div class="col-lg-6 col-md-6 pnl-pr c-view-bx">
                <!-- START panel-->
                <div class="panel pnl-mb">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-3">
                                <?php if(!empty($client->client_logo)) {
                                    echo $this->Html->image('client-logo/'.$client->client_logo, ['alt' => $client->client_logo]);
                                } 
                                else{
                                    echo $this->Html->image('client-logo/avatar.png', ['alt' => $client->client_logo]);

                                }?>
                            </div>
                            <div class="col-xs-9 text-right">
                                <div class="text-md">Client Logo</div>
                                <p class="m0"></p>
                            </div>
                        </div>
                    </div>
                    <!-- END panel-->
                </div>
            </div>
        </div>
    </div>
</div>
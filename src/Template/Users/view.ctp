<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>
<div class="row">
    <div class="col-md-12">
        <div class="page-title">USER
            <span class="pull-right short-ico">
                <a href="<?php echo $_SERVER["HTTP_REFERER"]; ?>"
                    title="Back">
                    <button class="btn btn-labeled btn-default" type="button">
                        <span class="btn-label"><i class="fa fa-hand-o-left"></i>
                        </span>Back</button>
                </a>
                <!-- TODO: HIDE THIS AS PER ACL -->
                <a href="<?php echo $this->Url->build(["controller" => "users", "action" => "edit",$user->id]); ?>"
                    title="Edit">
                    <button class="btn btn-labeled btn-default" type="button">
                        <span class="btn-label"><i class="fa fa-pencil-square-o"></i>
                        </span>Edit</button>
                </a>
            </span>
        </div>
    </div>
</div>
<div class="panel-body user-viewbx">
    <div class="col-lg-4">
        <!-- START widget-->
        <div class="panel widget">
            <div class="row row-table row-flush">
                <div class="col-xs-4 bg-primary text-center user-view-section">
                    <em class="fa fa-sign-in fa-3x"></em>
                </div>
                <div class="col-xs-8">
                    <div class="panel-body text-left">
                        <h4 class="mt0">Email</h4>
                        <span class="mb0 text-muted"><?= h($user->email) ?></span>
                    </div>
                </div>
            </div>
        </div>
        <!-- END widget-->
    </div>
    <!-- <div class="col-lg-4">
        <!-- START widget-->
        <!-- <div class="panel widget">
            <div class="row row-table row-flush">
                <div class="col-xs-4 bg-danger text-center user-view-section">
                    <em class="fa fa-user fa-3x"></em>
                </div>
                <div class="col-xs-8">
                    <div class="panel-body text-left">
                        <h4 class="mt0">User Role</h4>
                        <span class="mb0 text-muted"><?= $user->has('user_role') ? $this->Html->link($user->user_role->name, ['controller' => 'UserRoles', 'action' => 'view', $user->user_role->id]) : '' ?></span>
                    </div>
                </div>
            </div>
        </div> -->
        <!-- END widget-->
    <!--</div> -->

   <!--  <div class="col-lg-4">
        <!-- START widget-->
        <!--<div class="panel widget">
            <div class="row row-table row-flush">
                <div class="col-xs-4 bg-inverse  text-center user-view-section">
                    <em class="fa fa-user fa-3x"></em>
                </div>
                <div class="col-xs-8">
                    <div class="panel-body text-left">
                        <h4 class="mt0">User Type</h4>
                        <span class="mb0 text-muted"><?= $user->has('user_type') ? $this->Html->link($user->user_type->title, ['controller' => 'UserTypes', 'action' => 'view', $user->user_type->id]) : '' ?></span>
                    </div>
                </div>
            </div>
        </div>
        <!-- END widget-->
    <!--</div> -->

    <div class="col-lg-4">
        <!-- START widget-->
        <div class="panel widget">
            <div class="row row-table row-flush">
                <div class="col-xs-4 bg-green text-center user-view-section">
                    <em class="fa fa-meh-o fa-3x"></em>
                </div>
                <div class="col-xs-8">
                    <div class="panel-body text-left">
                        <h4 class="mt0">Name</h4>
                        <span class="mb0 text-muted"><?= h($user->first_name) ?> <?= h($user->middle_name) ?> <?= h($user->last_name) ?></span></span>
                    </div>
                </div>
            </div>
        </div>
        <!-- END widget-->
    </div>
    <div class="col-lg-4">
        <!-- START widget-->
        <div class="panel widget">
            <div class="row row-table row-flush">
                <div class="col-xs-4 bg-purple  text-center user-view-section">
                    <em class="fa fa-mobile fa-3x"></em>
                </div>
                <div class="col-xs-8">
                    <div class="panel-body text-left">
                        <h4 class="mt0">Contact Number</h4>
                        <span class="mb0 text-muted"><?= h($user->contact_country_code) ?> <?= h($user->contact_number) ?></span>
                    </div>
                </div>
            </div>
        </div>
        <!-- END widget-->
    </div>
    <!-- <div class="col-lg-4">
        <!-- START widget-->
        <!--<div class="panel widget">
            <div class="row row-table row-flush">
                <div class="col-xs-4 bg-success  text-center user-view-section">
                    <em class="fa fa-building-o fa-3x"></em>
                </div>
                <div class="col-xs-8">
                    <div class="panel-body text-left">
                        <h4 class="mt0">Work Phone</h4>
                        <span class="mb0 text-muted"><?= h($user->word_country_code) ?> <?= h($user->work_contact_number) ?></span>
                    </div>
                </div>
            </div>
        </div>
        <!-- END widget-->
    <!--</div> -->
    <!-- <div class="col-lg-4">
        <!-- START widget-->
        <!-- <div class="panel widget">
            <div class="row row-table row-flush">
                <div class="col-xs-4 bg-info  text-center user-view-section">
                    <em class="fa fa-home fa-3x"></em>
                </div>
                <div class="col-xs-8">
                    <div class="panel-body text-left">
                        <h4 class="mt0">Home Phone</h4>
                        <span class="mb0 text-muted"><?= h($user->home_country_code) ?> <?= h($user->home_contact_number) ?></span>
                    </div>
                </div>
            </div>
        </div> -->
        <!-- END widget-->
    <!--</div> -->
    <div class="col-lg-4">
        <!-- START widget-->
        <div class="panel widget">
            <div class="row row-table row-flush">
                <div class="col-xs-4 bg-default  text-center user-view-section">
                    <?php
               $image = $user->profile_pic;
               if (empty($image)) {
                   $image = 'avatar.png';
               }
               ?>
                    <?php echo $this->Html->image('user-profile-pic/'.$image, ['alt' => $user->first_name]); ?>
                </div>
                <div class="col-xs-8">
                    <div class="panel-body text-left">
                        <h4 class="mt0">Profile Picture</h4>
                        <!-- <span class="mb0 text-muted"><?= h($user->home_country_code) ?> <?= h($user->home_contact_number) ?></span> -->
                    </div>
                </div>
            </div>
        </div>
        <!-- END widget-->
    </div>
</div>
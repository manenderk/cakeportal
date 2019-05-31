<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User[]|\Cake\Collection\CollectionInterface $users
 */
?>
<div class="row">

    <div class="col-md-12">
        <div class="page-title">USERS
            <span class="pull-right short-ico">
                <a href="<?php echo $_SERVER["HTTP_REFERER"]; ?>"
                    title="Back">
                    <button class="btn btn-labeled btn-default" type="button">
                        <span class="btn-label"><i class="fa fa-hand-o-left"></i>
                        </span>Back</button>
                </a>
                <!-- TODO HIDE THIS AS PER ACL -->
                <a href="<?php echo $this->Url->build(["controller" => "users", "action" => "add"]); ?>"
                    title="Add more">
                    <button class="btn btn-labeled btn-default" type="button">
                        <span class="btn-label"><i class="fa fa-plus"></i>
                        </span>Add</button>
                </a>  
            </span>
        </div>
    </div>
</div>
<div class="row">
    <div class="panel-body user-seabx">
        <?php echo $this->Form->create('User', ['role'=>'form','class'=>'form-inline', 'url' => ['action' =>'index']]); ?>
        <div class="col-lg-3">
            <?php echo $this->Form->control('email', ['label'=>false,'placeholder'=>'Email', 'class'=>'form-control input-sm','default'=>@$_POST['email']]); ?>
        </div>
        <div class="col-lg-2">
            <?php echo $this->Form->control('first_name', ['label'=>false, array('autocomplete'=>'off'), 'placeholder'=>' First Name','class'=>'input-sm form-control','default'=>@$_POST['first_name']]); ?>
        </div>
        <div class="col-lg-2">
            <?php echo $this->Form->control('contact_number', ['label'=>false,'placeholder'=>'Contact number', 'maxlength'=>'12','class'=>'input-sm form-control','default'=>@$_POST['contacct_number']]); ?>
        </div>        
        <div class="col-lg-2">
            <?php echo $this->Form->control('is_active', ['options' => ['0' => 'Inactive', '1' => 'Active' ],'label'=>false,'placeholder'=>'Status', 'class'=>'input-sm form-control','empty'=>'Select Status','default'=>@$_POST['is_active']]); ?>
        </div>
        <div class="col-lg-1">
            <span class="input-group-btn">
                <button class="mb-sm btn btn-success" type="submit">Search
                </button>
            </span>
        </div>
        <?php echo $this->Form->end(); ?>
    </div>
</div>
<!-- <div class="row">
    <div class="col-md-12">
        <div role="tabpanel" class="panel panel-transparent">
            <ul role="tablist" class="nav nav-tabs nav-justified">
                <li role="presentation" class="active">
                    <a
                        href='<?=$this->Url->build(["controller" => "Users","action" => "index"]);?>'>
                        <em class="fa fa-clock-o fa-fw" id=""></em>All Users</a>
                </li>
                <li role="presentation">
                    <a
                        href='<?=$this->Url->build(["controller" => "Users","action" => "internal_users"]);?>'>
                        <em class="fa fa-clock-o fa-fw" id=""></em>Internal Users</a>
                </li>
                <li role="presentation">
                    <a
                        href='<?=$this->Url->build(["controller" => "Users","action" => "external_users"]);?>'>
                        <em class="fa fa-clock-o fa-fw" id=""></em>External Users</a>
                </li>
            </ul>

        </div>
    </div>
</div> -->
<div class="panel panel-default">    
    <!-- START table-responsive-->
    <div class="table-responsive">
        <table id="Users" class="table table-hover">
            <thead class="bg-gray">
                <tr>
                    <th>Picture</th>
                    <th><?php echo $this->Paginator->sort('email') ?>
                    </th>
                    <th><?php echo $this->Paginator->sort('first_name') ?>
                    </th>
                    <th><?php echo $this->Paginator->sort('middle_name') ?>
                    </th>
                    <th><?php echo $this->Paginator->sort('last_name') ?>
                    </th>
                    <th><?php echo $this->Paginator->sort('contact_number') ?>
                    </th>                    
                    <th><?php echo $this->Paginator->sort('is_active') ?>
                    </th>
                    <th></th>                    
                </tr>
            </thead>
            <?php foreach ($users as $user): ?>                      
            <tbody id="newrow" class="bg-gray-lighter">
                <tr>
                    <td>
                        <div class="media">
                            <?php echo $this->Html->image('user-profile-pic/'.$user->profile_pic, ['class'=>'media-box-object img-responsive img-rounded thumb64','alt' => $user->profile_pic,'height'=>'65']); ?>
                        </div>
                    </td>
                    <td><a href="<?php echo $this->Url->build(["controller" => "users", "action" => "view", $user->id]); ?>"
                            class="text-info"><?php echo h($user->email) ?></a></td>
                    <td><?php echo h($user->first_name) ?>
                    </td>
                    <td><?php echo h($user->middle_name) ?>
                    </td>
                    <td><?php echo $user->last_name; ?>
                    </td>
                    <td><?php echo $user->contact_number; ?>
                    </td>
                    <td><?= $user->is_active == 1 ? 'Active' : 'Inactive' ?></td>
                    <!-- TODO: HIDE THIS AS PER ACL -->                        
                    <td><a href="<?php echo $this->Url->build(["controller" => "users", "action" => "edit",$user->id]); ?>">
                            <em class="fa fa-pencil-square-o pull-right" data-toggle="tooltip" data-placement="left"
                                title="You can edit this user by click on this icon"></em></a></td>
                
                </tr>
            </tbody> 
            <?php endforeach; ?>
        </table>
    </div>
    <!-- END table-responsive-->
</div>
<div class="paginator">
    <ul class="pagination">
        <?php echo $this->Paginator->next('Show more users...'); ?>
    </ul>
</div>
<script>
    // For unlimited scrolling by user
    $(function() {
        var $container = $('#Users');
        $container.infinitescroll({
            navSelector: '.next', // selector for the paged navigation 
            nextSelector: '.next a', // selector for the NEXT link (to page 2)
            itemSelector: '#newrow', // selector for all items you'll retrieve
            debug: true,
            dataType: 'html',
            loading: {
                finishedMsg: 'No more users',
                img: 'img/spinner.gif'
            }
        });
    });

    //Endble access of user
    /* function getCheckedId(id) {
        var user_id = id;
        var r = confirm("Are you sure to change user's access on ATS!!");
        if (r == true) {
            $.ajax({
                type: "POST",
                url: "<?php echo $this->Url->build(["controller" => "Users","action" => "enable_disable_access"]);?>",
                data: 'user_id=' + user_id,
                success: function(result) {
                    var obj = $.parseJSON(result);
                    if (obj.success == true) {

                    }
                }
            });
        } else {
            $.ajax({
                type: "POST",
                url: "<?php echo $this->Url->build(["controller" => "Users","action" => "get_enable_disable_access_value"]);?>",
                data: 'user_id=' + user_id,
                success: function(result) {
                    var obj = $.parseJSON(result);
                    if (obj.success == true) {
                        if (obj.active == 0) {
                            $('#is_active_' + id).prop('checked', false);
                        } else {
                            $('#is_active_' + id).prop('checked', true);
                        }
                    }
                }
            });
        }
    } */
</script>
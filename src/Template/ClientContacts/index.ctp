<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ClientContact[]|\Cake\Collection\CollectionInterface $clientContacts
 */
?>
<div class="row">
    <div class="col-md-12">
        <div class="page-title">CLIENT MANAGER
            <span class="pull-right short-ico">
                <a href="<?php echo $_SERVER["HTTP_REFERER"]; ?>"
                    title="Back">

                    <i class="fa fa-hand-o-left fa-2x" title="Click to go back" data-toggle="tooltip"
                        data-placement="bottom"></i> Go Back
                </a>
                <!-- TODO: HIDE THIS AS PER ACL -->
                <a href="<?php echo $this->Url->build(["controller" => "clientContacts", "action" => "add"]); ?>"
                    title="Add more">
                    <i class="fa fa-plus fa-2x " title="Click to add more client manager" data-toggle="tooltip"
                        data-placement="bottom"></i> Add
                </a>
            </span>
        </div>
    </div>
</div>

<div class="row">
    <div class="panel-body user-seabx">
        <?php echo $this->Form->create('ClientManager', array('role'=>'form','class'=>'form-inline','action' =>'/index')); ?>
        <div class="col-lg-5 col-md-5 text-center col-xs-12 col-sm-5">
            <?php echo $this->Form->control('client_id', ['options' => $clients,'class'=>'input-sm atsborder form-control','empty'=>'Select client','label'=>false]); ?>
        </div>
        <div class="col-lg-3 col-md-3 text-center col-xs-12 col-sm-3">
            <?php echo $this->Form->control('email', ['label'=>false,'placeholder'=>'Email','class'=>'form-control atsborder input-sm','default'=>@$_POST['email']]); ?>
        </div>
        <div class="col-lg-3 text-center col-md-3 col-xs-12 col-sm-3">
            <?php echo $this->Form->control('contact_number', ['class' => 'form-control atsborder input-sm', 'maxlength'=>'12','placeholder'=>'Contact Number','default'=>@$_POST['contact_number'],'label'=>false]); ?>
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
        <table id="Clientcontacts" class="table table-bordered table-hover">
            <thead class="bg-gray">
                <tr>
                    <th>Picture</th>
                    <th><?php echo $this->Paginator->sort('client') ?>
                    </th>
                    <th><?php echo $this->Paginator->sort('login_name') ?>
                    </th>
                    <th><?php echo $this->Paginator->sort('first_name') ?>
                    </th>
                    <th><?php echo $this->Paginator->sort('middle_name') ?>
                    </th>
                    <th><?php echo $this->Paginator->sort('last_name') ?>
                    </th>
                    <th><?php echo $this->Paginator->sort('phone_number') ?>
                    </th>
                </tr>
            </thead>
            <tbody id="newrow1">
                <!-- <tr class="bg-gray-lighter">
                    <td>
                        <div class="media">
                            <?php echo $this->Html->image('profile_img/'.$image, ['alt' => $clientContact->user->profile_pic]); ?>
                        </div>
                    </td>
                    <td><?= $clientContact->client->name;?>
                    </td>
                    <td><a href="<?php echo $this->Url->build(["controller" => "clientContacts", "action" => "view", $clientContact->id]); ?>"
                            title="Click here to view this client manager contact details" data-toggle="tooltip"
                            data-placement="bottom"><?= $clientContact->user->login_name;?></a></td>
                    <td><?=$clientContact->user->first_name;?>
                    </td>
                    <td><?=$clientContact->user->middle_name;?>
                    </td>
                    <td><?=$clientContact->user->last_name;?>
                    </td>
                    <td><?=$clientContact->user->contact_number;?>

                        <?php
                // 1=>admin, 2=> Manager, 3=>Recruiter , 4=>Applicant , 5=> client , 6=> data entry operator
                if (in_array($_SESSION['Auth']['User']['user_role_id'], array(1,2,8))) { ?>
                        <a
                            href="<?php echo $this->Url->build(["controller" => "clientContacts", "action" => "edit",$clientContact->id]); ?>">
                            <em class="fa fa-pencil-square-o pull-right faa-tada"
                                title="Click to edit this client manager contact details" data-toggle="tooltip"
                                data-placement="left"></em>
                        </a> </td>
                    <?php } ?>



                </tr> -->
            </tbody>
        </table>
    </div>
    <!-- END table-responsive-->

</div>
<div class="paginator">

    <ul class="pagination">
        <?php echo $this->Paginator->next('Show more client contacts...'); ?>
    </ul>
</div>
<script>
    // For unlimited scrolling by user
    $(function() {
        var $container = $('#Clientcontacts');
        $container.infinitescroll({
            navSelector: '.next', // selector for the paged navigation 
            nextSelector: '.next a', // selector for the NEXT link (to page 2)
            itemSelector: '#newrow1', // selector for all items you'll retrieve
            debug: true,
            dataType: 'html',
            loading: {
                finishedMsg: 'No more Candidates',
                img: 'img/spinner.gif'
            }
        });
    });
</script>
<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Client[]|\Cake\Collection\CollectionInterface $clients
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
                    href="<?php echo $this->Url->build(["controller" => "clients", "action" => "add"]); ?>">
                    <i class="fa fa-plus fa-2x faa-ring" title="Click to add more client" data-toggle="tooltip"
                        data-placement="bottom"></i> Add
                </a>
            </span>
        </div>
    </div>
</div>
<?php echo $this->Form->create('Currencies', ['role'=>'form', 'url' => ['action' =>'index']]); ?>
<div class="panel panel-body atsborder">
    <div class="">
        <div class="input-group">
            <input type="text" placeholder="Search client .." class="form-control" name="name">
            <span class="input-group-btn">
                <span class="input-group-addon"><i class="fa fa-search"></i>
                </span>
            </span>
        </div>
    </div>
</div>
<?php echo $this->Form->end(); ?>
<div class="panel panel-default">
    <!-- START table-responsive-->
    <div class="table-responsive">
        <table id="Clients" class="table table-bordered table-hover">
            <thead class="bg-gray">
                <tr>
                    <th>Picture</th>
                    <th><?=$this->Paginator->sort('name', "Client Name <em class='fa fa-sort-alpha-desc'></em>", ['escape' => false]);?>
                    </th>
                    <th><?=$this->Paginator->sort('description', "Description <em class='fa fa-sort-alpha-desc'></em>", ['escape' => false]);?>
                    </th>
                    <th><?=$this->Paginator->sort('status', "Status <em class='fa fa-sort-alpha-desc'></em>", ['escape' => false]);?>
                    </th>
                    <th><?=$this->Paginator->sort('is_contract_signed', "Contract Signed <em class='fa fa-sort-alpha-desc'></em>", ['escape' => false]);?>
                    </th>
                    <th><?=$this->Paginator->sort('contract_expiry_date', "Contract Expiry Date <em class='fa fa-sort-alpha-desc'></em>", ['escape' => false]);?>
                    </th>
                </tr>
            </thead>

            <tbody id="newrow1">
                <?php foreach ($clients as $client): ?>
                <tr class="bg-gray-lighter">
                    <td class="text-center">
                        <div class="media">
                            <?php if(!empty($client->client_logo)){
                                echo $this->Html->image('client-logo/'.$client->client_logo, ['alt' => $client->client_logo]);
                            }
                            else{
                                echo $this->Html->image('client-logo/avatar.png', ['alt' => $client->client_logo]);

                            }
                            ?>
                        </div>
                    </td>
                    <td><a href="<?php echo $this->Url->build(["controller" => "clients", "action" => "view", $client->id]); ?>"
                            title="Click here to view this client" data-toggle="tooltip" data-placement="bottom"><?php echo h($client->name) ?></a></td>
                    <td><?= h($client->description) ?>
                    </td>
                    <td><?= $client->status == 1 ? 'Active' : 'Inactive' ?>
                    </td>
                    <td><?= ($client->is_contract_signed == 1) ? 'Yes' : 'No' ?>
                    </td>
                    <td><?= h($client->contract_expiry_date) ?>
                        <!-- TODO: HIDE THIS AS PER ACL -->
                        <a href="<?php echo $this->Url->build(["controller" => "clients", "action" => "edit",$client->id]); ?>"
                            title="Edit">
                            <em class="fa fa-pencil-square-o pull-right faa-tada" title="Click to edit this client"
                                data-toggle="tooltip" data-placement="left"></em>
                        </a>
                    </td>
                </tr>
            </tbody>
            <?php endforeach; ?>
        </table>
    </div>
</div>
<div class="paginator">
    <ul class="pagination">
        <?php echo $this->Paginator->next('Show more clients...'); ?>
    </ul>
</div>

<script>
    // For unlimited scrolling by user
    $(function() {
        var $container = $('#Clients');
        $container.infinitescroll({
            navSelector: '.next', // selector for the paged navigation 
            nextSelector: '.next a', // selector for the NEXT link (to page 2)
            itemSelector: '#newrow1', // selector for all items you'll retrieve
            debug: true,
            dataType: 'html',
            loading: {
                finishedMsg: 'No more Clients',
                img: 'img/spinner.gif'
            }
        });
    });
</script>
<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\State[]|\Cake\Collection\CollectionInterface $states
 */
?>
<div class="row">
    <div class="col-md-12">
        <div class="page-title">STATE
            <span class="pull-right short-ico">
                <a href="<?php echo $_SERVER["HTTP_REFERER"]; ?>">
                    <button type="button" class="btn btn-labeled btn-default">
                        <span class="btn-label"><i class="fa fa-hand-o-left"></i>
                        </span>Back</button>
                </a>
                <!--  TODO: HIDE THIS BUTTON AS PER ACL -->
                <a href="<?php echo $this->Url->build(["controller" => "states", "action" => "add"]); ?>">
                    <button type="button" class="btn btn-labeled btn-default">
                        <span class="btn-label"><i class="fa fa-plus"></i>
                        </span>Add</button>
                </a>
            </span>
        </div>
    </div>
</div>
<?= $this->Form->create('States', ['role'=>'form', 'url' => ['action' =>'index']]); ?>
<div class="panel panel-body atsborder m-lr">
    <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
        <div class="input-group m-b">
            <input type="text" placeholder="Search state .." class="form-control input-sm" name="name">
            <span class="input-group-addon">
                <button type="submit" class="tp-style"><i class="fa fa-search"></i>
                </button>
            </span>
        </div>
    </div>
</div>
<?php echo $this->Form->end(); ?>
<div class="rTable" id="states">
    <div class="rTableRow">
        <ul class="tclass-head-1">
            <li>
                <span>
                    <div class="rTableHead"><?= $this->Paginator->sort('name', "State <em class='fa fa-sort-alpha-desc'></em>", ['escape' => false]); ?></div>
                </span>
                <span>
                    <div class="rTableHead">Country</div>
                </span>
                <span>
                    <div class="rTableHead"><?= $this->Paginator->sort('is_active', "Status <em class='fa fa-sort-alpha-desc'></em>", ['escape' => false]); ?></div>
                </span>
                <!-- TODO: HIDE THIS AS PER ACL -->
                <span>
                    <div class="rTableHead"><?= $this->Paginator->sort('name', "Description <em class='fa fa-sort-alpha-desc'></em>", ['escape' => false]); ?></div>
                </span>
            </li>
        </ul>
    </div>
    <div class="rTableRow" id="newrow">
        <ul class="tclass-cell-1">
            <?php foreach ($states as $state) : ?>
                <li><span>
                        <div class="rTableCell">
                            <a href="<?php echo $this->Url->build(["controller" => "states", "action" => "view", $state->id]); ?>" title="Click here to view this state" data-toggle="tooltip" data-placement="bottom"><?= h($state->name) ?></a>
                        </div>
                    </span>

                    <span>
                        <div class="rTableCell"><?= $state->has('country') ? $this->Html->link($state->country->name, ['controller' => 'Countries', 'action' => 'view', $state->country->id]) : '' ?>
                        </div>
                    </span>

                    <span>
                        <div class="rTableCell">
                            <?= $state->is_active == 1 ? 'Active' : 'Inactive' ?>

                        </div>
                    </span>
                    <!-- TODO: HIDE THIS AS PER ACL -->
                    <span>
                        <div class="rTableCell">
                            <?= h($state->comments) ?>
                            <a href="<?php echo $this->Url->build(["controller" => "states", "action" => "edit", $state->id]); ?>" title="Edit">
                                <em class="fa fa-pencil-square-o pull-right" title="Click to edit this state" data-toggle="tooltip" data-placement="left"></em>
                            </a>
                        </div>
                    </span>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>
</div>
<!--rTable end here-->
<div class="paginator">
    <ul class="pagination">
        <?php echo $this->Paginator->next('Show more states...'); ?>
    </ul>
</div>
<script>
    // For unlimited scrolling by user
    $(function() {
        var $container = $('#states');
        $container.infinitescroll({
            navSelector: '.next', // selector for the paged navigation 
            nextSelector: '.next a', // selector for the NEXT link (to page 2)
            itemSelector: '#newrow', // selector for all items you'll retrieve
            debug: true,
            dataType: 'html',
            loading: {
                finishedMsg: 'No more states',
                img: 'img/spinner.gif'
            }
        });
    });
</script>
<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\StatusCode[]|\Cake\Collection\CollectionInterface $statusCodes
 */
?>
<div class="row">
    <div class="col-md-12">
        <div class="page-title">STATUS CODE
            <span class="pull-right short-ico">
                <a
                    href="<?php echo $_SERVER["HTTP_REFERER"]; ?>">
                    <button type="button" class="btn btn-labeled btn-default">
                        <span class="btn-label"><i class="fa fa-hand-o-left"></i>
                        </span>Back</button>
                </a>
                <!-- TODO: HIDE THIS AS PER ACL -->
                <a
                    href="<?php echo $this->Url->build(["controller" => "statusCodes", "action" => "add"]); ?>">
                    <button type="button" class="btn btn-labeled btn-default">
                        <span class="btn-label"><i class="fa fa-plus"></i>
                        </span>Add</button>
                </a>
            </span>
        </div>
    </div>    
</div>
<?php echo $this->Form->create('StatusCodes', ['role'=>'form', 'url' => ['action' =>'index']]); ?>
<div class="panel panel-body atsborder m-lr">
    <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
        <div class="input-group m-b">
            <input type="text" placeholder="Search status code here .." class="form-control input-sm" name="name">
            <span class="input-group-addon">
                <button type="submit" class="tp-style"><i class="fa fa-search"></i>
                </button>
            </span>
        </div>
    </div>
</div>
<?php echo $this->Form->end(); ?>
<div class="rTable" id="status">
    <div class="rTableRow">
        <ul class="tclass-head">
            <li>
                <span>
                    <div class="rTableHead"><?=$this->Paginator->sort('name', "Status Name <em class='fa fa-sort-alpha-desc'></em>", ['escape' => false]);?>
                    </div>
                </span>
                <span>
                    <div class="rTableHead"><?=$this->Paginator->sort('description', "Description <em class='fa fa-sort-alpha-desc'></em>", ['escape' => false]);?>
                    </div>
                </span>
                <!-- TODO: HIDE THIS AS PER ACL -->
                <span>
                    <div class="rTableHead">&nbsp;</div>
                </span></li>
        </ul>
    </div>
    <div class="rTableRow" id="newrow">
        <ul class="tclass-cell">
            <?php foreach ($statusCodes as $statusCode): ?>
            <li><span>
                    <div class="rTableCell">
                        <a href="<?php echo $this->Url->build(["controller" => "statusCodes", "action" => "view",$statusCode->id]); ?>"
                            title="Click here to view this status code" data-toggle="tooltip"
                            data-placement="bottom"><?= h($statusCode->name) ?></a>
                    </div>
                </span>
                <span>
                    <div class="rTableCell">
                        <?= h($statusCode->description) ?>
                    </div>
                </span>
                <!-- TODO: HIDE THIS AS PER ACL -->
                <span>
                    <div class="rTableCell">
                        <a
                            href="<?php echo $this->Url->build(["controller" => "statusCodes", "action" => "edit",$statusCode->id]); ?>">
                            <em class="fa fa-pencil-square-o pull-right" title="Click to edit this status code"
                                data-toggle="tooltip" data-placement="left">
                            </em>
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
        <?php echo $this->Paginator->next('Show more status codes...'); ?>
    </ul>
</div>
<script>
    // For unlimited scrolling by user
    $(function() {
        var $container = $('#status');
        $container.infinitescroll({
            navSelector: '.next', // selector for the paged navigation 
            nextSelector: '.next a', // selector for the NEXT link (to page 2)
            itemSelector: '#newrow', // selector for all items you'll retrieve
            debug: true,
            dataType: 'html',
            loading: {
                finishedMsg: 'No more status code in ATS',
                img: 'img/spinner.gif'
            }
        });
    });
</script>
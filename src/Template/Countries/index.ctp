<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Country[]|\Cake\Collection\CollectionInterface $countries
 */
?>
<div class="row">
    <div class="col-md-12">
        <div class="page-title">COUNTRY
            <span class="pull-right short-ico">
                <a
                    href="<?php echo $_SERVER["HTTP_REFERER"]; ?>">
                    <button type="button" class="btn btn-labeled btn-default">
                        <span class="btn-label"><i class="fa fa-hand-o-left"></i>
                        </span>Back</button>
                </a>
                <!-- TODO: ACL - SHOW ONLY WHEN USER HAS WRITE ACCESS -->
                <a
                    href="<?php echo $this->Url->build(["controller" => "countries", "action" => "add"]); ?>">
                    <button type="button" class="btn btn-labeled btn-default">
                        <span class="btn-label"><i class="fa fa-plus"></i>
                        </span>Add</button>
                </a>
            </span>
        </div>
    </div>
</div>

<?= $this->Form->create('Countries', ['role'=>'form', 'url' => ['action' =>'index']]); ?>
    <div class="panel panel-body atsborder m-lr">
        <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
            <div class="input-group m-b">
                <input type="text" placeholder="Search country .." class="form-control input-sm" name="name">
                <span class="input-group-addon">
                    <button type="submit" class="tp-style"><i class="fa fa-search"></i>
                    </button>
                </span>
            </div>
        </div>
    </div>
<?= $this->Form->end(); ?>

<div class="rTable" id="country">
    <div class="rTableRow">
        <ul class="tclass-head-1">
            <li>
                <span>
                    <div class="rTableHead"><?=$this->Paginator->sort('name', "Country <em class='fa fa-sort-alpha-desc'></em>", ['escape' => false]);?>
                    </div>
                </span>
                <span>
                    <div class="rTableHead"><?=$this->Paginator->sort('comments', "Description <em class='fa fa-sort-alpha-desc'></em>", ['escape' => false]);?>
                    </div>
                </span>
                <span>
                    <div class="rTableHead"><?=$this->Paginator->sort('is_active', "Status <em class='fa fa-sort-alpha-desc'></em>", ['escape' => false]);?>
                    </div>
                </span>
                <!-- TODO: ACL - SHOW ONLY WHEN USER HAS WRITE ACCESS -->
                <span>
                    <div class="rTableHead">&nbsp;</div>
                </span>
            </li>
        </ul>
    </div>
    <div class="rTableRow" id="newrow">
        <ul class="tclass-cell-1">
            <?php foreach ($countries as $country): ?>
            <li><span>
                    <div class="rTableCell">
                        <a href="<?php echo $this->Url->build(["controller" => "countries", "action" => "view",$country->id]); ?>"
                            title="Click here to view this country" data-toggle="tooltip"
                            data-placement="bottom"><?= h($country->name) ?></a>
                    </div>
                </span>
                <span>
                    <div class="rTableCell"> <?= $country->comments; ?>
                    </div>
                </span>
                <span>
                    <div class="rTableCell">
                        <?= $country->is_active == 1 ? 'Active' : 'Inactive' ?>

                    </div>
                </span>
                <!-- TODO: ACL - SHOW ONLY WHEN USER HAS WRITE ACCESS -->
                <span>
                    <div class="rTableCell"> <a
                            href="<?php echo $this->Url->build(["controller" => "countries", "action" => "edit",$country->id]); ?>"
                            title="Edit">
                            <em class="fa fa-pencil-square-o pull-right" title="Click to edit this country"
                                data-toggle="tooltip" data-placement="left"></em>
                        </a></div>
                </span>
            </li>
            <?php endforeach; ?>
        </ul>
    </div>


</div>
<!--rTable end here-->
<div class="paginator">
    <ul class="pagination">
        <?php echo $this->Paginator->next('Show more business domains...'); ?>
    </ul>
</div>
<script>
    // For unlimited scrolling by user
    $(function() {
        var $container = $('#country');
        $container.infinitescroll({
            navSelector: '.next', // selector for the paged navigation 
            nextSelector: '.next a', // selector for the NEXT link (to page 2)
            itemSelector: '#newrow', // selector for all items you'll retrieve
            debug: true,
            dataType: 'html',
            loading: {
                finishedMsg: 'No more Job Requirements',
                img: '<?= $this->request->getAttribute('webroot') ?>img/spinner.gif'
            }
        });
    });
</script>
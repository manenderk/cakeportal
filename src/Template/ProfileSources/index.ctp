<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ProfileSource[]|\Cake\Collection\CollectionInterface $profileSources
 */
?>
<div class="row">
    <div class="col-md-12">
        <div class="page-title">PROFILE SOURCE
            <span class="pull-right short-ico">
                <a
                    href="<?php echo $_SERVER["HTTP_REFERER"]; ?>">
                    <button type="button" class="btn btn-labeled btn-default">
                        <span class="btn-label"><i class="fa fa-hand-o-left"></i>
                        </span>Back</button>
                </a>
                <!-- TODO: HIDE THIS AS PER ACL -->
                <a
                    href="<?php echo $this->Url->build(["controller" => "ProfileSources", "action" => "add"]); ?>">
                    <button type="button" class="btn btn-labeled btn-default">
                        <span class="btn-label"><i class="fa fa-plus"></i>
                        </span>Add</button>
                </a>
            </span>
        </div>
    </div>
</div>
<?php echo $this->Form->create('ProfileSources', array('role'=>'form', 'url' => ['action' =>'index'])); ?>
<div class="panel panel-body atsborder m-lr">
    <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
        <div class="input-group m-b">
            <input type="text" placeholder="Search profile source here .." class="form-control input-sm" name="title">
            <span class="input-group-addon">
                <button type="submit" class="tp-style"><i class="fa fa-search"></i>
                </button>
            </span>
        </div>
    </div>
</div>
<?php echo $this->Form->end(); ?>
<div class="rTable" id="profile">
    <div class="rTableRow">
        <ul class="tclass-head">
            <li>
                <span>
                    <div class="rTableHead"><?=$this->Paginator->sort('title', "Profile Source <em class='fa fa-sort-alpha-desc'></em>", ['escape' => false]);?>
                    </div>
                </span>
                <span>
                    <div class="rTableHead"><?=$this->Paginator->sort('description', "Description <em class='fa fa-sort-alpha-desc'></em>", ['escape' => false]);?>
                    </div>
                </span>
                <!-- TODO: HIDE THIS AS PER ACL -->
                <span>
                    <div class="rTableHead">&nbsp;</div>
                </span>
            </li>
        </ul>
    </div>
    <div class="rTableRow">
        <ul class="tclass-cell">
            <?php foreach ($profileSources as $profileSource): ?>
            <li>
                <span>
                    <div class="rTableCell">
                        <a href="<?php echo $this->Url->build(["controller" => "profileSources", "action" => "view",$profileSource->id]); ?>"
                            title="Click here to view this profile source" data-toggle="tooltip"
                            data-placement="bottom"><?= h($profileSource->title) ?></a>
                    </div>
                </span>

                <span>
                    <div class="rTableCell">
                        <?= h($profileSource->description) ?>

                    </div>
                </span>
                <!-- HIDE THIS AS PER ACL -->
                <span>
                    <div class="rTableCell">
                        <a
                            href="<?php echo $this->Url->build(["controller" => "profileSources", "action" => "edit", $profileSource->id]); ?>">
                            <em class="fa fa-pencil-square-o pull-right" title="Click to edit this profile source"
                                data-toggle="tooltip" data-placement="left"></em></a>
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
        <?php echo $this->Paginator->next('Show more profile sources...'); ?>
    </ul>
</div>
<script>
    // For unlimited scrolling by user
    $(function() {
        var $container = $('#profile');
        $container.infinitescroll({
            navSelector: '.next', // selector for the paged navigation 
            nextSelector: '.next a', // selector for the NEXT link (to page 2)
            itemSelector: '#newrow', // selector for all items you'll retrieve
            debug: true,
            dataType: 'html',
            loading: {
                finishedMsg: 'No more profile source',
                img: 'img/spinner.gif'
            }
        });
    });
</script>
<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Job[]|\Cake\Collection\CollectionInterface $jobs
 */
?>
<div class="row">
    <div class="col-md-12">
        <div class="page-title">JOBS
            <span class="pull-right short-ico">
                <a
                    href="<?php echo $_SERVER["HTTP_REFERER"]; ?>">
                    <button type="button" class="btn btn-labeled btn-default">
                        <span class="btn-label"><i class="fa fa-hand-o-left"></i>
                        </span>Back</button>
                </a>
                <!-- TODO: HIDE THIS AS PER ACL -->
                <a
                    href="<?php echo $this->Url->build(["controller" => "jobs", "action" => "add"]); ?>">
                    <button type="button" class="btn btn-labeled btn-default">
                        <span class="btn-label"><i class="fa fa-plus"></i>
                        </span>Add</button>
                </a>
            </span>
        </div>
    </div>
</div>

<?php echo $this->Form->create('Jobs', ['role'=>'form','class'=>'form-inline', 'url' => ['action' =>'index']]); ?>
<div class="panel panel-body atsborder m-lr">
    <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
        <div class="input-group m-b">
            <?php echo $this->Form->control('job_title', ['label'=>false,'placeholder'=>'Job Title...','class'=>'input-sm form-control','default'=>@$_POST['Login_name']]); ?>
            <span class="input-group-addon">
                <button class="tp-style" type="submit"><i class="fa fa-search" title="Search"></i>
                </button>
            </span>
        </div>
    </div>
</div>
<?php echo $this->Form->end(); ?>
<div class="rTable" id="Jobs">
    <div class="rTableRow">
        <ul class="tclass-head">
            <li>
                <span>
                    <div class="rTableHead"><?=$this->Paginator->sort('title', "Job Title <em class='fa fa-sort-alpha-desc'></em>", ['escape' => false]);?>
                    </div>
                </span>
                <span>
                    <div class="rTableHead"><?=$this->Paginator->sort('status', "Status <em class='fa fa-sort-alpha-desc'></em>", ['escape' => false]);?>
                    </div>
                </span>
                <!-- TODO: HIDE THIS AS PER ACL -->
                <span>
                    <div class="rTableHead">&nbsp;</div>
                </span></li>
        </ul>
    </div>
    <?php foreach ($jobs as $job): ?>
    <div class="rTableRow" id="newrow">
        <ul class="tclass-cell">
            <li>
                <span>
                    <div class="rTableCell">
                        <a href="<?php echo $this->Url->build(["controller" => "jobs","action" =>"view",$job->id]); ?>"
                            title="Click here to view this job title" data-toggle="tooltip"
                            data-placement="bottom"><?php echo h($job->title) ?></a>
                    </div>
                </span>
                <span>
                    <div class="rTableCell">
                        <?= $job->status == 1  ? 'Active' : 'Inactive' ?>
                        </div>
                </span>
                <!-- TODO: HIDE THIS AS PER ACL -->
                <span>
                    <div class="rTableCell">
                        <a
                            href="<?php echo $this->Url->build(["controller" => "jobs", "action" => "edit",$job->id]); ?>">
                            <em class="fa fa-pencil-square-o pull-right" title="Click to edit this job title"
                                data-toggle="tooltip" data-placement="left"></em>
                        </a>
                    </div>
                </span>
            </li>
        </ul>
    </div>
    <?php endforeach; ?>
</div>
<!--rTable end here-->
<div class="paginator">
    <ul class="pagination">
        <?php echo $this->Paginator->next('Show more requirements...'); ?>
    </ul>
</div>
<script>
    // For unlimited scrolling by user
    $(function() {
        var $container = $('#Jobs');
        $container.infinitescroll({
            navSelector: '.next', // selector for the paged navigation 
            nextSelector: '.next a', // selector for the NEXT link (to page 2)
            itemSelector: '#newrow', // selector for all items you'll retrieve
            debug: true,
            dataType: 'html',
            loading: {
                finishedMsg: 'No more Jobs',
                img: 'img/spinner.gif'
            }
        });
    });
</script>
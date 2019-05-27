<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\JobType[]|\Cake\Collection\CollectionInterface $jobTypes
 */
?>
<div class="row">
    <div class="col-md-12">
        <div class="page-title">JOB TYPE
            <span class="pull-right short-ico">
                <a
                    href="<?php echo $_SERVER["HTTP_REFERER"]; ?>">
                    <i class="fa fa-hand-o-left fa-2x" title="Click to go back" data-toggle="tooltip"
                        data-placement="bottom"></i> Go Back
                </a>
                <!-- TODO: HIDE THIS AS PER ACL -->
                <a
                    href="<?php echo $this->Url->build(["controller" => "jobTypes", "action" => "add"]); ?>">
                    <i class="fa fa-plus pull-right fa-2x" title="Click to add more job type" data-toggle="tooltip"
                        data-placement="bottom"></i>Add
                </a>
            </span>
        </div>
    </div>
</div>
<?php echo $this->Form->create('JobTypes', array('role'=>'form', 'url' => ['action' =>'index'])); ?>
<div class="panel panel-body atsborder m-lr">
    <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
        <div class="input-group m-b">
            <input type="text" placeholder="Search job type here .." class="form-control input-sm" name="title">
            <span class="input-group-addon">
                <button type="submit" class="tp-style"><i class="fa fa-search"></i>
                </button>
            </span>
        </div>
    </div>
</div>
<?php echo $this->Form->end(); ?>
<div class="panel panel-default">
    <div class="table-responsive">
        <table id="jobtype" class="table table-bordered table-hover">
            <thead>
                <tr class="bg-gray">
                    <th><?=$this->Paginator->sort('title', "Job Type <em class='fa fa-sort-alpha-desc'></em>", ['escape' => false]);?>
                    </th>
                    <!-- HIDE THIS AS PER ACL -->
                    <th></th>
                </tr>
            </thead>
            <tbody id="newrow">
                <?php foreach ($jobTypes as $jobType): ?>
                <tr class="bg-gray-lighter">
                    <td>
                        <a href="<?php echo $this->Url->build(["controller" => "jobTypes", "action" => "view",$jobType->id]); ?>"
                            title="Click here to view this job type" data-toggle="tooltip"
                            data-placement="bottom"><?= h($jobType->title) ?></a>
                    </td>
                    <!-- TODO: HIDE THIS AS PER ACL -->
                    <td>
                        <a href="<?php echo $this->Url->build(["controller" => "jobTypes", "action" => "edit", $jobType->id]); ?>">
                            <em class="fa fa-pencil-square-o pull-right mb-sm btn btn-success"
                                    title="Click to edit this job type" data-toggle="tooltip"
                                    data-placement="left"></em></a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

    </div>
</div>
<div class="paginator">
    <ul class="pagination">
        <?php echo $this->Paginator->next('Show more job type...'); ?>
    </ul>
</div>
<script>
    // For unlimited scrolling by user
    $(function() {
        var $container = $('#jobtype');
        $container.infinitescroll({
            navSelector: '.next', // selector for the paged navigation 
            nextSelector: '.next a', // selector for the NEXT link (to page 2)
            itemSelector: '#newrow', // selector for all items you'll retrieve
            debug: true,
            dataType: 'html',
            loading: {
                finishedMsg: 'No more job types',
                img: 'img/spinner.gif'
            }
        });
    });
</script>
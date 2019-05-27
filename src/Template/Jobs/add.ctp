<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Job $job
 */
?>
<div class="row">
    <div class="col-md-12">
        <div class="page-title">JOB <small>Add Job</small>
            <span class="pull-right short-ico">
                <a
                    href="<?php echo $_SERVER["HTTP_REFERER"]; ?>">
                    <button class="btn btn-labeled btn-default" type="button">
                        <span class="btn-label"><i class="fa fa-hand-o-left"></i>
                        </span>Back</button>
                </a>
                <a id="cancelBtn" title="Cancel">
                    <button class="btn btn-labeled btn-default" type="button">close
                        <span class="btn-label btn-label-right"><i class="fa fa-close"></i>
                        </span>
                    </button>
                </a>
            </span>
        </div>
    </div>

</div>
<?= $this->Form->create($job, ['id'=>'Jobs']); ?>
<div class="wrapper bg-white atsborder">
    <!-- START panel-->
    <div class="panel-body">
        <div class="row form-group">
            <div class="col-lg-12 col-sm-12 col-md-9 col-xs-12">
                <label class="control-label text-center">Job Title</label>
                <?php echo $this->Form->control('title', ['label'=>false, 'placeholder'=>'Enter Job Title','class'=>'form-control bg-gray']); ?>

            </div>
        </div>
        <div class="form-group row">

            <div class="col-lg-12 col-sm-12 col-md-9 col-xs-12">
                <label class="control-label text-center">Description</label>

                <?php echo $this->Form->control('description', ['type' => 'textarea', 'label'=>false, 'placeholder'=>'Enter Job Description','class'=>'form-control bg-gray']); ?>
            </div>
        </div>
        <div class="form-group row">
            <div class="col-lg-12 col-sm-12 col-md-9 col-xs-12">
                <label class="control-label text-center">Status</label>
                <?php echo $this->Form->control('status', ['label' => 'Is Active'])?>
            </div>
        </div>
        <div class="form-group row">
            <div class=" col-lg-12 col-sm-12">
                <button class="btn btn-labeled btn-success pull-right" type="submit" id="submitBtn"
                    title="Click here to save this job title" data-toggle="tooltip" data-placement="bottom">
                    <i class="fa fa-hdd-o" aria-hidden="true"></i> Save</button>
                <span id="valid-msg"></span>
            </div>
        </div>
    </div>
</div>
<?= $this->Form->end() ?>
<script>
    $("#cancelBtn").click(function() {
        location.href =
            "<?php echo $this->Url->build(["controller" => "jobs","action" => "index"]);?>";
    });
    $('#Jobs').submit(function() {
        $('#submitBtn').attr("disabled", true);
        $('#valid-msg').html('Wait...');
    });
</script>
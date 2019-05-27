<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\JobType $jobType
 */
?>
<div class="row">
    <div class="col-md-12">
        <div class="page-title">JOB TYPE <small>Edit Job Type</small>
            <span class="pull-right short-ico">
                <a
                    href="<?php echo $_SERVER["HTTP_REFERER"]; ?>">
                    <i class="fa fa-hand-o-left fa-2x" title="Click to go back" data-toggle="tooltip"
                        data-placement="bottom"></i> Go Back
                </a>
                <a id="cancelBtn" title="Cancel">
                    <i class="cursor-pointer fa fa-close pull-right fa-2x" title="Click to close this page"
                        data-toggle="tooltip" data-placement="bottom"></i> Close
                </a>
            </span>
        </div>
    </div>
</div>
<?= $this->Form->create($jobType, ['id'=>'Jobtypes']); ?>
<div class="wrapper bg-white atsborder">
    <!-- START panel-->
    <div class="panel-body">
        <div class="row form-group">
            <div class="col-lg-12 col-sm-12 col-md-9 col-xs-12">
                <label class="control-label text-center">Job Type</label>
                <?php echo $this->Form->control('title', ['label'=>false, 'placeholder'=>'Enter job type','class'=>'form-control bg-gray']); ?>
                <span id='message'></span>
            </div>
        </div>
        <div class="form-group">
            <div class=" col-lg-12 col-sm-12">
                <button class="btn btn-labeled btn-success pull-right" type="submit" id="submitBtn"
                    title="Click here to save this job type" data-toggle="tooltip" data-placement="bottom">
                    <i class="fa fa-hdd-o" aria-hidden="true"></i> Save</button>
                <span id="valid-msg"></span>
            </div>
        </div>
    </div>
</div>
<?= $this->Form->end() ?>
<script>
    $(document).ready(function() {
        $("#title").blur(function() {
            var type_name = $("#title").val();
            var dataString = 'title=' + type_name;
            // AJAX Code To Submit Form.
            $('#message').show();
            $('#message').html(
                "<img src='/img/loading.gif'>&nbsp;&nbsp;<span style='font-weight: bold;font-size:12px;'>Checking Job Type....</span>"
            );
            $.ajax({
                type: "POST",
                url: "<?=$this->Url->build(["controller" => "JobTypes","action" => "check-jobtype", $jobType->id]);?>",
                data: dataString,
                headers: {
                    'X-CSRF-Token' : <?= json_encode($this->request->getParam('_csrfToken')) ?>
                },
                cache: false,
                success: function(result) {
                    var obj = $.parseJSON(result);
                    if (obj.success == 'true') {
                        $('#message').show();
                        $('#message').html('JOb Type already exist! Please try another');
                        $('#message').css("color", "red");
                        $('#submitBtn').attr('disabled', true);
                    }
                    if (obj.success == 'false') {
                        $('#message').hide();
                        $('#message').html('');
                        $('#submitBtn').attr('disabled', false);
                    }
                }
            });
            return false;
        });
    });

    $("#cancelBtn").click(function() {
        location.href =
            "<?php echo $this->Url->build(["controller" => "jobTypes","action" => "index"]);?>";
    });
    // prevent double click form submission
    $('#Jobtypes').submit(function() {
        $('#submitBtn').attr("disabled", true);
        $('#valid-msg').html('Wait...');
    });
</script>
<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ProfileSource $profileSource
 */
?>
<div class="row">
    <div class="col-md-12">
        <div class="page-title">PROFILE SOURCE <small>Add Profile Source</small>
            <span class="pull-right short-ico">
                <a
                    href="<?php echo $_SERVER["HTTP_REFERER"]; ?>">
                    <button class="btn btn-labeled btn-default" type="button">
                        <span class="btn-label"><i class="fa fa-hand-o-left"></i>
                        </span>Back</button>
                </a>
                <a id="cancelBtn" title="Cancel">
                    <button class="btn btn-labeled btn-default" type="button">Close
                        <span class="btn-label btn-label-right"><i class="fa fa-close"></i>
                        </span>
                    </button>
                </a>
            </span>
        </div>
    </div>
</div>
<?= $this->Form->create($profileSource, ['id'=>'Profilesource']); ?>
<div class="wrapper bg-white atsborder">
    <div class="panel-body">
        <div class="form-horizontal">
            <div class="form-group row">
                <div class="col-lg-12 col-sm-12 col-md-9 col-xs-12">
                    <label class="control-label text-center">Profile Source</label>
                    <?php echo $this->Form->control('title', ['label'=>false, 'placeholder'=>'Enter profile source','class'=>'bg-gray form-control']); ?>
                    <span id='message'></span>
                </div>
            </div>
            <div class="form-group row">

                <div class="col-lg-12 col-sm-12 col-md-9 col-xs-12">
                    <label class="control-label text-center">Description</label>
                    <?php echo $this->Form->control('description', ['type' => 'textarea', 'label'=>false, 'placeholder'=>'Enter description','class'=>'form-control bg-gray']); ?>
                </div>
            </div>
            <div class="form-group">
                <div class=" col-lg-12 col-sm-12">
                    <button class="btn btn-labeled btn-success pull-right" type="submit" id="submitBtn"
                        title="Click here to save this profile source" data-toggle="tooltip" data-placement="bottom">
                        <i class="fa fa-hdd-o" aria-hidden="true"></i> Save</button>
                    <span id="valid-msg"></span>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->Form->end() ?>
<script>
    $(document).ready(function() {
        $("#title").blur(function() {
            var source_name = $("#title").val();
            var dataString = 'title=' + source_name;
            // AJAX Code To Submit Form.
            $('#message').show();
            $('#message').html(
                "<img src='/img/loading.gif'>&nbsp;&nbsp;<span style='font-weight: bold;font-size:12px;'>Checking Profile Source name....</span>"
            );
            $.ajax({
                type: "POST",
                url: "<?=$this->Url->build(["controller" => "ProfileSources","action" => "check-source-name"]);?>",
                data: dataString,
                cache: false,
                headers: {
                    'X-CSRF-Token': <?= json_encode($this->request->getParam('_csrfToken')) ?>
                },
                success: function(result) {
                    var obj = $.parseJSON(result);
                    if (obj.success == 'true') {
                        $('#message').show();
                        $('#message').html(
                            'Profile Source already exist! Please try another');
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
            "<?php echo $this->Url->build(["controller" => "profileSource","action" => "index"]);?>";
    });
    $('#Profilesource').submit(function() {
        $('#submitBtn').attr("disabled", true);
        $('#valid-msg').html('Wait...');
    });
</script>
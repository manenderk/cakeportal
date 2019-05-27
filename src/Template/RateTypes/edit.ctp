<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\RateType $rateType
 */
?>
<div class="row">
    <div class="col-md-12">
        <div class="page-title">RATE TYPE <small>Edit Rate Type</small>
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
<?= $this->Form->create($rateType, ['id'=>'Ratetypes']); ?>
<div class="wrapper bg-white atsborder">
    <!-- START panel-->
    <div class="panel-body">
        <div class="row form-group">
            <div class="col-lg-12 col-sm-12 col-md-9 col-xs-12">
                <label class="control-label text-center">Rate Type</label>
                <?php echo $this->Form->control('name', ['label'=>false, 'placeholder'=>'Enter rate type','class'=>'form-control bg-gray']); ?>
                <span id='message'></span>
            </div>
        </div>
        <div class="form-group row">

            <div class="col-lg-12 col-sm-12 col-md-9 col-xs-12">
                <label class="control-label text-center">Description</label>
                <?php echo $this->Form->control('description', ['type'=>'textarea', 'label'=>false, 'placeholder'=>'Enter description','class'=>'bg-gray form-control']); ?>
            </div>
        </div>
        <div class="form-group">
            <div class="">
                <button class="btn btn-labeled btn-success pull-right" type="submit" id="submitBtn"
                    title="Click here to save this rate type" data-toggle="tooltip" data-placement="bottom">
                    <i class="fa fa-hdd-o" aria-hidden="true"></i> Save</button>
                <span id="valid-msg"></span>
            </div>
        </div>
    </div>
</div>
<?= $this->Form->end() ?>
<script>
    $(document).ready(function() {
        $("#name").blur(function() {
            var type_name = $("#name").val();
            var dataString = 'name=' + type_name;
            // AJAX Code To Submit Form.
            $('#message').show();
            $('#message').html(
                "<img src='/img/loading.gif'>&nbsp;&nbsp;<span style='font-weight: bold;font-size:12px;'>Checking Profile Rate Type....</span>"
            );
            $.ajax({
                type: "POST",
                url: "<?=$this->Url->build(["controller" => "RateTypes","action" => "check-ratetype-name", $rateType->id]);?>",
                data: dataString,
                cache: false,
                headers: {
                    'X-CSRF-Token': <?= json_encode($this->request->getParam('_csrfToken')) ?>
                },
                success: function(result) {
                    var obj = $.parseJSON(result);
                    if (obj.success == 'true') {
                        $('#message').show();
                        $('#message').html('Rate type already exist! Please try another');
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
            "<?php echo $this->Url->build(["controller" => "rateTypes","action" => "index"]);?>";
    });
    $('#Ratetypes').submit(function() {
        $('#submitBtn').attr("disabled", true);
        $('#valid-msg').html('Wait...');
    });
</script>
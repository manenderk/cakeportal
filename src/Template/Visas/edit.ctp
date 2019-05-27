<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Visa $visa
 */
?>
<div class="row">
    <div class="col-md-12">
        <div class="page-title">VISA <small>Edit Visa</small>
            <span class="pull-right short-ico">
                <a
                    href="<?php echo $_SERVER["HTTP_REFERER"]; ?>">
                    <button class="btn btn-labeled btn-default" type="button">
                        <span class="btn-label"><i class="fa fa-hand-o-left"></i>
                        </span>Back</button>
                </a>
                <a id="cancelBtn">
                    <button class="btn btn-labeled btn-default" type="button">Close
                        <span class="btn-label btn-label-right"><i class="fa fa-close"></i>
                        </span>
                    </button>
                </a>
            </span>
        </div>
    </div>
</div>

<?= $this->Form->create($visa, ['id'=>'Visa']); ?>
<div class="wrapper bg-white atsborder">
    <!-- START panel-->
    <div class="panel-body">
        <div class="row form-group">
            <div class="col-lg-12 col-sm-12 col-md-9 col-xs-12">
                <label class="text-center">Visa Name</label>
                <?php echo $this->Form->control('name', ['label'=>false, 'placeholder'=>'Enter new visa','class'=>'form-control bg-gray']); ?>
                <span id='message'></span>
            </div>
        </div>
        <div class="form-group row">

            <div class="col-lg-12 col-sm-12 col-md-9 col-xs-12">
                <label class="text-center">Description</label>
                <?php echo $this->Form->control('description', ['type'=>'textarea', 'label'=>false, 'placeholder'=>'Enter description','class'=>'form-control bg-gray']); ?>
            </div>
        </div>
        <div class="form-group">
            <div class="">
                <button class="btn btn-labeled btn-success  pull-right" type="submit" id="submitBtn"
                    title="Click here to save this visa" data-toggle="tooltip" data-placement="bottom">
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
            var visa_name = $("#name").val();
            var dataString = 'name=' + visa_name;
            // AJAX Code To Submit Form.
            $('#message').show();
            $('#message').html(
                "<img src='/img/loading.gif'>&nbsp;&nbsp;<span style='font-weight: bold;font-size:12px;'>Checking Visa....</span>"
            );
            $.ajax({
                type: "POST",
                url: "<?=$this->Url->build(["controller" => "visas","action" => "check-visa-name", $visa->id]);?>",
                data: dataString,
                cache: false,
                headers: {
                    'X-CSRF-Token': <?= json_encode($this->request->getParam('_csrfToken')) ?>
                },
                success: function(result) {
                    var obj = $.parseJSON(result);
                    if (obj.success == 'true') {
                        $('#message').show();
                        $('#message').html('Visa already exist! Please try another');
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
            "<?php echo $this->Url->build(["controller" => "visa","action" => "index"]);?>";
    });
    $('#Visa').submit(function() {
        $('#submitBtn').attr("disabled", true);
        $('#valid-msg').html('Wait...');
    });
</script>
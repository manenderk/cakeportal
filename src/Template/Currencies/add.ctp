<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Currency $currency
 */
?>
<div class="row">
    <div class="col-md-12">
        <div class="page-title">CURRENCY <small>Add Currency</small>
            <span class="pull-right short-ico">
                <a href="<?php echo $_SERVER["HTTP_REFERER"]; ?>"
                    title="Back">
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
<?= $this->Form->create($currency, ['id'=>'Currencies']); ?>
<div class="wrapper bg-white atsborder">
    <!-- START panel-->
    <div class="panel-body">
        <div class="row form-group">

            <div class="col-lg-12 col-sm-12 col-md-9 col-xs-12">
                <label class="text-center">Currency Name</label>
                <?php echo $this->Form->control('name', ['label'=>false, 'placeholder'=>'Enter Currency Name', 'class'=>'form-control bg-gray']); ?>
                <span id='message'></span>
            </div>
        </div>
        <div class="form-group row">

            <div class="col-lg-12 col-sm-12 col-md-9 col-xs-12">
                <label class="text-center">Currency Code</label>
                <?php echo $this->Form->control('code', ['label'=>false, 'placeholder'=>'Enter Currency Code','class'=>'form-control bg-gray']); ?>
            </div>
        </div>
        <div class="form-group row">
            <div class="col-lg-12 col-sm-12">
                <button data-placement="bottom" data-toggle="tooltip" title="" id="submitBtn" type="submit"
                    class="btn btn-labeled btn-success  pull-right"
                    data-original-title="Click here to save this currency">
                    <i aria-hidden="true" class="fa fa-hdd-o"></i> Save</button>
                <span id="valid-msg"></span>
            </div>
        </div>
    </div>
</div>
<?= $this->Form->end() ?>
<script>
    $(document).ready(function() {
        $("#name").blur(function() {
            var currency_name = $("#name").val();
            var dataString = 'name=' + currency_name;

            // AJAX Code To Submit Form.
            $('#message').show();
            $('#message').html(
                "<img src='/img/loading.gif'>&nbsp;&nbsp;<span style='font-weight: bold;font-size:12px;'>Checking Currency name....</span>"
                );
            $.ajax({
                type: "POST",
                url: "<?=$this->Url->build(["controller" => "Currencies","action" => "check-currency-name"]);?>",
                data: dataString,
                cache: false,
                headers: {
                    'X-CSRF-Token' : <?= json_encode($this->request->getParam('_csrfToken')) ?>
                },
                success: function(result) {
                    var obj = $.parseJSON(result);
                    if (obj.success == 'true') {
                        $('#message').show();
                        $('#message').html('Currency already exist! Please try another');
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
        location.href = "<?php echo $this->Url->build(["controller" => "countries","action" => "index"]);?>";
    });
    // prevent double click form submission
    $('#Currencies').submit(function() {
        $('#submitBtn').attr("disabled", true);
        $('#valid-msg').html('Wait...');
    });
</script>
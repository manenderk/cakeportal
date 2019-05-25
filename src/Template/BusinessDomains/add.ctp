<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\BusinessDomain $businessDomain
 */
?>
<div class="row">
    <div class="col-md-12">
        <div class="page-title">BUSINESS DOMAIN <small>Add Business Domain</small>
            <span class="pull-right short-ico">
                <a href="<?php echo $_SERVER["HTTP_REFERER"]; ?>">
                    <button type="button" class="btn btn-labeled btn-default">
                        <span class="btn-label"><i class="fa fa-hand-o-left"></i>
                        </span>Back</button>
                </a>
                <a id="cancelBtn" title="Cancel">
                    <button type="button" class="btn btn-labeled btn-default">
                        <span class="btn-label"><i class="fa fa-close"></i>
                        </span>Close</button>
                </a>
            </span>
        </div>
    </div>
</div>



<?= $this->Form->create($businessDomain, ['id' => 'BusinessDomain']); ?>
<div class="wrapper bg-white atsborder">
    <div class="panel-body">
        <div class="row form-group">
            <div class="col-lg-12 col-sm-12 col-md-9 col-xs-12">
                <label class="control-label text-center">Business Domain</label>
                <?php echo $this->Form->control('name', ['label' => false, 'placeholder' => 'Enter Business Domain', 'class' => 'form-control bg-gray']); ?>
                <span id='message'></span>
            </div>
        </div>
        <div class="row form-group">
            <div class="col-lg-12 col-sm-12 col-md-9 col-xs-12">
                <label class="control-label text-center">Description</label>
                <?php echo $this->Form->control('description', ['type' => 'textarea', 'label' => false, 'placeholder' => 'Enter Business Domain Description', 'class' => 'form-control bg-gray']); ?>
            </div>
        </div>
        <div class="row form-group">
            <div class=" col-lg-12 col-sm-12">
                <button class="btn btn-labeled btn-success pull-right" type="submit" id="submitBtn" title="Click here to save this business domain" data-toggle="tooltip" data-placement="bottom">
                    <i class="fa fa-hdd-o" aria-hidden="true"></i> Save</button>
                <span id="valid-msg"></span>
            </div>
        </div>
    </div>
</div>
<?= $this->Form->end() ?>
<script>
    // TODO: Add CSRF THIS IS NOT COMPLETE ALSO NEEDED TO DO SAME THING IN EDIT.CTP
    $(document).ready(function() {
        $("#name").blur(function() {
            var domain_name = $("#name").val();
            var dataString = 'name=' + domain_name;
            // AJAX Code To Submit Form.
            var url = "<?= $this->Url->build(["controller" => "BusinessDomains", "action" => "check_domain_name"]); ?>";
            $('#message').show();
            $('#message').html("<img src='/img/loading.gif'>&nbsp;&nbsp;<span style='font-weight: bold;font-size:12px;'>Checking domain name....</span>");
            $.ajax({
                type: "POST",
                url: "<?= $this->Url->build(["controller" => "BusinessDomains", "action" => "check_domain_name"]); ?>",
                data: dataString,
                cache: false,
                success: function(result) {
                    var obj = $.parseJSON(result);
                    if (obj.success == 'true') {
                        $('#message').show();
                        $('#message').html('Business Domain name already exist! Please try another');
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
        location.href = "<?php echo $this->Url->build(["controller" => "businessDomains", "action" => "index"]); ?>";
    });
    $('#BusinessDomain').submit(function() {
        $('#submitBtn').attr("disabled", true);
        $('#valid-msg').html('Wait...');

    });
</script>
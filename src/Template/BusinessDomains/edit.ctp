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
                <a id="cancelBtn">
                    <button type="button" class="btn btn-labeled btn-default">
                        <span class="btn-label"><i class="fa fa-close"></i>
                        </span>Close</button>
                </a>
            </span>
        </div>
    </div>
</div>
<?= $this->Form->create($businessDomain, ['id' => 'BusinessDomain']); ?>
<div class="wrapper bg-white">
    <div class="panel-body">
        <div class="row form-group">
            <div class="col-lg-12 col-sm-12 col-md-9 col-xs-12">
                <label class="text-center">Business Domain</label>
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
            <div class="col-lg-12 col-sm-12">
                <button class="btn btn-labeled btn-success  pull-right" type="submit" id="submitBtn" title="Click here to save this business domain" data-toggle="tooltip" data-placement="bottom">
                    <i class="fa fa-hdd-o" aria-hidden="true"></i> Save</button>

            </div>
        </div>
    </div>
</div>

<?= $this->Form->end() ?>
<script>
    $("#cancelBtn").click(function() {
        location.href = "<?php echo $this->Url->build(["controller" => "businessDomains", "action" => "index"]); ?>";
    });
    // prevent double click form submission
    $('#BusinessDomain').submit(function() {
        $('#submitBtn').attr("disabled", true);
        $('#valid-msg').html('Wait...');
    });
</script>
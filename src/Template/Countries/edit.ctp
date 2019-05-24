<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Country $country
 */
?>
<div class="row">
    <div class="col-md-12">
        <div class="page-title">COUNTRY <small>Edit Country</small>
            <span class="pull-right short-ico">
                <a href="<?php echo $_SERVER["HTTP_REFERER"]; ?>">
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

<?= $this->Form->create($country); ?>
<div class="wrapper bg-white atsborder">
    <div class="panel-body">
        <div class="row form-group">
            <div class="col-lg-12 col-sm-12 col-md-9 col-xs-12">
                <label class="text-center">Country Name</label>
                <?php echo $this->Form->control('name', ['label'=>false, 'placeholder'=>'Enter Country Name','class'=>'form-control bg-gray']); ?>
            </div>
        </div>
        <div class="row form-group">

            <div class="col-lg-12 col-sm-12 col-md-9 col-xs-12">
                <label class="text-center">Description</label>
                <?php echo $this->Form->control('comments', ['type' => 'textarea', 'label'=>false, 'placeholder'=>'Enter Country Description','class'=>'form-control bg-gray']); ?>
            </div>
        </div>
        <div class="row form-group">
            <div class="col-lg-12 col-sm-12 col-md-9 col-xs-12">
                <label class="text-center">
                    Status
                </label>
                <?php echo $this->Form->control('is_active'); ?>
            </div>
        </div>
        <div class="row form-group">
            <div class="col-lg-12 col-sm-12">
                <button data-placement="bottom" data-toggle="tooltip" title="" id="submitBtn" type="submit"
                    class="btn btn-labeled btn-success  pull-right"
                    data-original-title="Click here to save this country">
                    <i aria-hidden="true" class="fa fa-hdd-o"></i> Save</button>
            </div>
        </div>
    </div>
</div>
<?= $this->Form->end() ?>
<script>
    $("#cancelBtn").click(function() {
        location.href =
            "<?php echo $this->Url->build(["controller" => "countries","action" => "index"]);?>";
    });
</script>
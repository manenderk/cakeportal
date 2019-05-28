<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Client $client
 */
?>
<div class="row">
    <div class="col-md-12">
        <div class="page-title">CLIENT <span class="short-text-heading">Edit Client</span>
            <span class="pull-right short-ico">
                <a
                    href="<?php echo $_SERVER["HTTP_REFERER"]; ?>">
                    <i class="fa fa-hand-o-left fa-2x" title="Click to go back" data-toggle="tooltip"
                        data-placement="bottom"></i> Go Back
                </a>

                <a id="cancelBtn">
                    <i class="cursor-pointer fa fa-close fa-2x" title="Click to close this page" data-toggle="tooltip"
                        data-placement="bottom"></i> Close
                </a>
            </span>
        </div>
    </div>
</div>

<?= $this->Form->create($client, ['type' => 'file']); ?>
<div class="wrapper bg-white atsborder">
    <div class="panel-body">

        <div class="row">
            <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12 margintop3">
                <div class="row form-group">

                </div>
                <div class="row form-group">
                    <label class="col-lg-3 col-md-3 col-sm-3 col-xs-12 control-label">Client Name</label>
                    <div class="col-lg-8 col-xs-12 col-sm-9">
                        <?php echo $this->Form->control('name', ['label'=>false, 'type'=>'text','placeholder'=>'Enter name','class' => 'input-sm form-control bg-gray']); ?>
                    </div>
                </div>
                <div class="row form-group">
                    <label class="col-lg-3 col-md-3 col-sm-3 col-xs-12 control-label">Email</label>
                    <div class="col-lg-8 col-xs-12 col-sm-9">
                        <?php echo $this->Form->control('email', ['label'=>false, 'type'=>'text','placeholder'=>'Enter email','class' => 'input-sm form-control bg-gray']); ?>
                    </div>
                </div>
                <div class="row form-group">
                    <label class="col-lg-3 col-md-3 col-sm-3 col-xs-12 control-label">Active</label>
                    <div class="col-lg-8 col-xs-12 col-sm-9">
                        <?php echo $this->Form->control('status', ['label'=>false,'placeholder'=>'Enter status','options'=>[ 1=>'Active', 0=>'Inactive'],'class' =>'input-sm form-control bg-gray','empty'=>'Select option']); ?>
                    </div>
                </div>
                <div class="row form-group">
                    <label class="col-lg-3 col-md-3 col-sm-3 col-xs-12 control-label">Contract Expiry Date</label>
                    <div class="col-lg-8 col-xs-12 col-sm-9">
                        <?php echo $this->Form->control('contract_expiry_date', array('type' => 'text', 'label'=>false,'empty' => true, 'default' => '','placeholder'=>'Contract Expiry Date','class'=>'input-sm form-control bg-gray', 'value' => $client->contract_expiry_date->i18nFormat('yyyy-MM-dd')));?>
                    </div>
                </div>
                <div class="row form-group">
                    <label class="col-lg-3 col-md-3 col-sm-3 col-xs-12 control-label">Description</label>
                    <div class="col-lg-8 col-xs-12 col-sm-9">
                        <?php echo $this->Form->control('description', ['type' => 'textarea', 'label'=>false,'placeholder'=>'Enter description','class' =>'input-sm form-control bg-gray','maxlength' => 300]); ?>
                    </div>
                </div>
                <div class="row form-group">
                    <label class="col-lg-3 col-md-3 col-sm-3 col-xs-12 control-label">Contract Signed</label>
                    <div class="col-lg-8 col-xs-12 col-sm-9">
                        <?php echo $this->Form->control('is_contract_signed', ['label'=>false,'placeholder'=>'Enter status','options'=>[ 1=>'Active', 0=>'Inactive'],'class' =>'input-sm form-control bg-gray','empty'=>'Select option']); ?>
                    </div>
                </div>
            </div>
            <aside class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                <div class="panel-heading">
                    <h4>Client Logo</h4>
                </div>
                <div class="panel-body">
                    <div class="panel widget">
                        <?php echo $this->Html->image('client-logo/'.$client->client_logo, ['id' => 'blah', 'height'=>'150']); ?>
                        <?php echo $this->Form->control('client_logo', array('type' => 'file', 'label' => false, 'class'=>'img-responsive'));?>
                    </div>
                </div>
            </aside>
        </div>
    </div>
    <div class="panel-footer">
        <div class="panel-body">
            <button class="btn btn-sm btn-success" type="submit" title="Click here to save this client"
                data-toggle="tooltip" data-placement="bottom">
                <i aria-hidden="true" class="fa fa-hdd-o"></i> Save</button>
        </div>
    </div>
</div>
<?= $this->Form->end() ?>


<?= $this->Html->script('jquery.maskedinput.min') ?>
<?= $this->Html->script('jquery-validate');?>
<script>
    /*
    $(document).ready(function() {
        $('#blah').hide();
        $("#contract-expiry-date").mask("99-99-9999", {
            placeholder: "mm-dd-yyyy"
        });
        $("#clientForm").validate({
            ignore: ":hidden:not(select)",
            //set this to false if you don't what to set focus on the first invalid input
            focusInvalid: true,
            //by default validation will run on input keyup and focusout
            //set this to false to validate on submit only
            onkeyup: function(element) {
                $(element).valid()
            },
            onfocusout: true,
            //by default the error elements is a <label>
            errorElement: "div",
            //place all errors in a <div id="errors"> element
            errorPlacement: function(error, element) {
                error.insertAfter(element);
            },
            rules: {
                "name": {
                    required: true
                },
                "description": {
                    required: true
                },
                "status": {
                    required: true
                },
                "contract_expiry_date": {
                    required: true
                },
                "client_logo": {
                    required: true
                }
            },
            messages: {
                "name": {
                    required: "You must enter Client name"
                },
                "description": {
                    required: "You must enter Description"
                },
                "status": {
                    required: "You must select status"
                },
                "contract_expiry_date": {
                    number: "You must enter expiry date"
                },
                "client_logo": {
                    number: "You must select client logo"
                }
            }

        });
    });
    
    */
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
                $('#blah').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }
    //$('#blah').hide();
    $("#client-logo").change(function() {
        $('#blah').show();
        readURL(this);
    });
    $("#cancelBtn").click(function() {
        location.href =
            "<?php echo $this->Url->build(["controller" => "clients","action" => "index"]);?>";
    });
    var expiryDate = $('#contract-expiry-date').datepicker({
        format: 'yyyy-mm-dd',
    });
    
</script>
<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ClientContact $clientContact
 */
?>
<div class="row">

    <div class="col-md-12">
        <div class="page-title">CLIENT MANAGER
            <small>[ Add Client Manager ]</small>
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

<?= $this->Form->create($clientContact, ['id'=>'contactForm','type'=>'file','autocomplete'=>'Off']); ?>
<div class="panel-body bg-gray-lighter">
    <div class="panel-body">
        <div class="row">
            <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12 margintop3">
                <div class="row form-group">
                    <label class="col-lg-3 col-md-3 col-sm-3 col-xs-12 control-label">
                        <span class="text-danger">*</span>Client</label>
                    <div class="col-lg-8 col-md-8 col-xs-12 col-sm-9">
                        <?php echo $this->Form->control('client_id', ['label'=>false, 'options' => $clients,'class'=>'input-sm bg-gray form-control','empty'=>'Select client']); ?>
                    </div>
                </div>
                <div class="row form-group">
                    <label class="col-lg-3 col-md-3 col-sm-3 col-xs-12 control-label">
                        <span class="text-danger">*</span>Login Name</label>
                    <div class="col-lg-8 col-md-8 col-xs-12 col-sm-9">
                        <?php echo $this->Form->control('email', ['label'=>false,  'type'=>'email', 'placeholder'=>'Enter Valid Email Id','class'=>'input-sm bg-gray form-control','autocomplete'=>'off']); ?>
                        <span id='message'></span>
                    </div>
                </div>
                <div class="row form-group">
                    <label class="col-lg-3 col-md-3 col-sm-3 col-xs-12 control-label">
                        <span class="text-danger">*</span>First Name</label>
                    <div class="col-lg-8 col-md-8 col-xs-12 col-sm-9">
                        <?php echo $this->Form->control('first_name', ['label'=>false, 'placeholder'=>'First Name','class'=>'form-control input-sm bg-gray','autocomplete'=>'off']); ?>
                    </div>
                </div>
                <div class="row form-group">
                    <label class="col-lg-3 col-md-3 col-sm-3 col-xs-12 control-label">Middle Name</label>
                    <div class="col-lg-8 col-md-8 col-xs-12 col-sm-9">
                        <?php echo $this->Form->control('middle_name', ['label'=>false, 'class' => 'form-control input-sm bg-gray','placeholder'=>'Middle Name','autocomplete'=>'off']); ?>
                    </div>
                </div>
                <div class="row form-group">
                    <label class="col-lg-3 col-md-3 col-sm-3 col-xs-12 control-label">
                        <span class="text-danger">*</span>Last Name</label>
                    <div class="col-lg-8 col-md-8 col-xs-12 col-sm-9">
                        <?php echo $this->Form->control('last_name', ['label'=>false, 'class' => 'form-control input-sm bg-gray','placeholder'=>'Last Name','autocomplete'=>'off']); ?>
                    </div>
                </div>
                <div class="row">
                    <label class="col-lg-3 col-md-3 col-sm-3 col-xs-12 control-label">
                        Mobile Number</label>
                    <div class="form-group col-md-2 col-lg-2 col-xs-12 col-sm-3">
                        <?php echo $this->Form->control('contact_country_code', ['label'=>false, 'empty'=>'Code','options'=>array('001'=>'001','0091'=>'0091'),'class'=>'input-sm bg-gray form-control']);?>
                    </div>
                    <div class="form-group col-md-6 col-sm-6 col-xs-12 col-lg-6">
                        <?php echo $this->Form->control('contact_number', ['label'=>false, 'maxlength'=>'12', 'class' => 'bg-gray form-control input-sm','placeholder'=>'Max 12 digits only']); ?>
                    </div>
                </div>
                <!-- <div class="row">
                    <label class="col-lg-3 col-md-3 col-sm-3 col-xs-12 control-label">Work Phone</label>
                    <div class="form-group col-md-2 col-lg-2 col-xs-12 col-sm-3">
                        <?php echo $this->Form->input('word_country_code', ['label'=>false, 'empty'=>'Code','options'=>array('001'=>'001','0091'=>'0091'),'class'=>'input-sm bg-gray form-control']);?>
                    </div>
                    <div class="form-group col-md-6 col-sm-6 col-xs-12 col-lg-6">
                        <?php echo $this->Form->input('work_contact_number', ['label'=>false, 'type'=>'text', 'maxlength'=>'12', 'class' => 'bg-gray form-control input-sm ','placeholder'=>'Max 12 digits only']); ?>
                    </div>
                </div>
                <div class="row">
                    <label class="col-lg-3 col-md-3 col-sm-3 col-xs-12 control-label">Home Phone</label>
                    <div class="form-group col-md-2 col-lg-2 col-xs-12 col-sm-3">
                        <?php echo $this->Form->input('home_country_code', ['label'=>false, 'empty'=>'Code','options'=>array('001'=>'001','0091'=>'0091'),'class'=>'input-sm bg-gray form-control']);?>
                    </div>
                    <div class="form-group col-md-6 col-sm-6 col-xs-12 col-lg-6">
                        <?php echo $this->Form->input('home_contact_number', ['label'=>false, 'type'=>'text', 'maxlength'=>'12', 'class' => 'bg-gray form-control input-sm ','placeholder'=>'Max 12 digits only']); ?>
                    </div>
                </div> -->
            </div>
            <aside class="col-lg-3 col-sm-6 pull-right col-xs-12">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="panel widget">
                            <p><b>Profile Picture</b></p>
                            <img id="blah" src="#" alt="" height="150" />
                            <?php echo $this->Form->control('profile_pic', ['type' => 'file', 'label' => false]);?>
                        </div>
                    </div>
                </div>
            </aside>
        </div>

    </div>
    <div class="panel-footer">
        <div class="panel-body">
            <button class="btn btn-labeled btn btn-success" type="submit" title="Click here to save this client contact"
                data-toggle="tooltip" data-placement="bottom" id='submitBtn'>
                <i aria-hidden="true" class="fa fa-hdd-o"></i> Save</button>
        </div>
    </div>

</div>
<?= $this->Form->end() ?>
<?= $this->Html->script('jquery-validate');?>
<script>
    $(document).ready(function() {
        $('#blah').hide();
        $("#contactForm").validate({
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
                "client_id": {
                    required: true
                },
                "email": {
                    required: true,
                    email: true
                },
                "first_name": {
                    required: true
                },
                "last_name": {
                    required: true
                },
                "contact_number": {
                    required: true,
                    number: true
                },
                /* "work_contact_number": {
                    number: true
                },
                "home_contact_number": {
                    number: true
                } */
            },
            messages: {
                "client_id": {
                    required: "You must select client"
                },
                "email": {
                    required: "You must enter Login name"
                },
                "first_name": {
                    required: "You must enter first name"
                },
                "last_name": {
                    required: "You must enter last name"
                },
                "contact_number": {
                    required: "You must enter number",
                    number: "You must enter only number"
                },
                /* "work_contact_number": {
                    number: "You must enter only number"
                },
                "home_contact_number": {
                    number: "You must enter only number"
                } */
            }

        });

        $("#cancelBtn").click(function() {
            location.href =
                "<?php echo $this->Url->build(["controller" => "ClientContacts","action" => "index"]);?>";
        });
    });

    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
                $('#blah').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }
    $("#profile-pic").change(function() {
        $('#blah').show();
        readURL(this);
    });

    $("#email").blur(function() {
        var email = $("#email").val();
        var dataString = 'email=' + email;

        // AJAX Code To Submit Form.
        var url =
            "<?php echo $this->Url->build(["controller" => "Users","action" => "check_email"]);?>";
        $('#message').show();
        $('#message').html(
            "<img src='/img/loading.gif'>&nbsp;&nbsp;<span style='font-weight: bold;font-size:12px;'>Checking login name validity....</span>"
            );
        $.ajax({
            type: "POST",
            url: "<?php echo $this->Url->build(["controller" => "Users","action" => "check_email"]);?>",
            data: dataString,
            cache: false,
            headers: {
                'X-CSRF-Token' : <?= json_encode($this->request->getParam('_csrfToken')) ?>
            },
            success: function(result) {
                var obj = $.parseJSON(result);
                if (obj.success == 'true') {
                    $('#message').show();
                    $('#message').html('An account with this email already exist! Please try another');
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
</script>
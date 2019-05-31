<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>
<div class="row">
    <div class="col-md-12">
        <div class="page-title">USERS
            <small>[ Edit User ]</small>
            <span class="pull-right short-ico">
                <a href="<?php echo $_SERVER["HTTP_REFERER"]; ?>">
                    <i class="fa fa-hand-o-left fa-2x" title="Click to go back" data-toggle="tooltip" data-placement="bottom"></i> Go Back
                </a>
                <a id="cancelBtn">
                    <i class="fa fa-close fa-2x cursor-pointer" title="Click here to close this page...." data-toggle="tooltip" data-placement="bottom"></i> Close
                </a>
            </span>
        </div>
    </div>
</div>
<?= $this->Form->create($user, ['type' => 'file', 'id' => 'UserFrm']); ?>
<div class="panel-body bg-gray-lighter">
    <div>
        <div>
            <div class="field-bx">
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 add-user-pl add-user-mb">
                    <label class="control-label">
                        <span class="text-danger">*</span>Email</label>
                    <?php echo $this->Form->control('email', ['label' => false, 'type' => 'email', 'placeholder' => 'Enter email', 'class' =>
                    'input-sm bg-gray form-control', 'auto-complete' => 'off']); ?>
                    <span id='login-msg'></span>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 add-user-pr add-user-mb">
                    <label class="control-label">
                        <span class="text-danger">*</span>Password</label><span id='password-msg'> (Alphanumeric Characters Only)</span>
                    <?php echo $this->Form->control('password', ['label' => false, 'type' => 'password', 'class' => 'bg-gray form-control
			 input-sm ', 'placeholder' => 'Password']); ?>

                </div>
            </div>
            <div class="field-bx">
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 add-user-pl add-user-mb">
                    <label class="control-label">
                        <span class="text-danger">*</span>First Name</label>
                    <?php echo $this->Form->control('first_name', ['label' => false, 'type' => 'text', 'class' => 'bg-gray
				  form-control input-sm ', 'placeholder' => 'First Name']); ?>
                    <span id='first-name-msg'></span>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 add-user-pr add-user-mb">
                    <label class="control-label">Middle Name</label>
                    <?php echo $this->Form->control('middle_name', ['label' => false, 'type' => 'text', 'class' => 'bg-gray form-control input-sm', 'placeholder' => 'Middle Name']); ?>
                    <span id='middle-name-msg'></span>
                </div>
            </div>
            <div class="field-bx">
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 add-user-pl add-user-mb">
                    <label class="control-label">
                        <span class="text-danger">*</span>Last Name</label>
                    <?php echo $this->Form->control('last_name', [
                        'label' => false, 'type' => 'text', 'class' => 'input-sm bg-gray form-control', 'placeholder' => 'Last Name'
                    ]); ?>
                    <span id='last-name-msg'></span>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 add-user-pr add-user-mb">
                    <label class="control-label">
                        <span class="text-danger">*</span>Mobile Number</label>
                    <div class="clearfix"></div>
                    <div class="col-md-3 col-lg-4 col-sm-4 col-xs-12 add-user-pl">
                        <?php echo $this->Form->control('contact_country_code', [
                            'label' => false, 'empty' => 'Code',
                            'options' => array('001' => '001', '0091' => '0091'), 'class' => 'bg-gray form-control input-sm'
                        ]); ?>
                        <span id='contact-num-msg'></span>
                    </div>
                    <div class="col-md-9 col-lg-8 col-sm-8 col-xs-12 add-user-pr">
                        <?php echo $this->Form->control('contact_number', ['label' => false, 'type' => 'text', 'maxlength' => '12', 'class' => 'bg-gray form-control input-sm', 'placeholder' => 'Max 12 digits only']); ?>
                    </div>
                </div>
            </div>
            <!-- <div class="field-bx">
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 add-user-pl add-user-mb">
                    <label class="control-label">Work Phone</label>
                    <div class="clearfix"></div>
                    <div class="col-md-3 col-lg-4 col-sm-4 col-xs-12 add-user-pl">
                        <?php echo $this->Form->control('word_country_code', [
                            'label' => false, 'empty' => 'Code',
                            'options' => array('001' => '001', '0091' => '0091'), 'class' => 'bg-gray form-control input-sm'
                        ]); ?>
                        <span id='work-num-msg'></span>
                    </div>
                    <div class="col-md-9 col-lg-8 col-sm-8 col-xs-12 add-user-pr">
                        <?php echo $this->Form->control('work_contact_number', [
                            'label' => false, 'type' => 'text',
                            'maxlength' => '12', 'class' => 'bg-gray form-control input-sm ', 'placeholder' => 'Max 12 digits only'
                        ]); ?>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 add-user-pr add-user-mb">
                    <label class="control-label">Home Phone</label>
                    <div class="clearfix"></div>
                    <div class="col-md-3 col-lg-4 col-sm-4 col-xs-12 add-user-pl">
                        <?php echo $this->Form->control('home_country_code', [
                            'label' => false, 'empty' => 'Code',
                            'options' => array('001' => '001', '0091' => '0091'), 'class' => 'bg-gray form-control input-sm'
                        ]); ?>
                        <span id='home-num-msg'></span>
                    </div>
                    <div class="col-md-9 col-lg-8 col-sm-8 col-xs-12 add-user-pr">
                        <?php echo $this->Form->control('home_contact_number', ['label' => false, 'type' => 'text', 'maxlength' => '12', 'class' => 'bg-gray form-control input-sm ', 'placeholder' => 'Max 12 digits only']); ?>
                    </div>
                </div>
            </div> -->
            <div class="field-bx">
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 add-user-pl add-user-mb">
                    <label class="control-label">
                        <span class="text-danger">*</span>Active</label>
                    <?php echo $this->Form->control('is_active', ['label' => 'Active']) ?>
                    <span id='last-name-msg'></span>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 add-user-pr add-user-mb">
                    <label class="control-label">Profile Image</label>
                    <div class="clearfix"></div>
                    <?php echo $this->Html->image('user-profile-pic/'.$user->profile_pic, ['id' => 'blah', 'height'=>'150']); ?>
                    <?php echo $this->Form->control('profile_pic', ['label' => false, 'type' => 'file', 'class' => 'form-control']); ?>
                </div>
            </div>
            <div class="field-bx">
                <hr>
                <h4>User's Group</h4>
                <?= $this->Form->Control('userGroups', ['options' => $groups, 'label' => false, 'multiple' => true, 'class'=>'form-control']); ?>
            </div>
            <div class="row form-group">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <button class="btn btn-labeled btn btn-success pull-right" type="submit" id='submitBtn' title="Click here to save user details" data-toggle="tooltip" data-placement="bottom">
                        <i class="fa fa-hdd-o" aria-hidden="true"></i> Save</button>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->Form->end() ?>
<?= $this->Html->script('jquery-validate'); ?>
<script>
    $("#email").blur(function() {
        var project_name = document.getElementById('email').value;

        if (project_name.length == 1 || project_name == "") {

            document.getElementById("login-msg").innerHTML = "Please give a valid login name";
            document.getElementById("login-msg").style.color = "red";


            //document.getElementById('task-name').focus();
        }
        if (project_name.length > 1 || project_name.length == 1) {
            var special_chars = "~`!#$%^&*+=-[]\';,/{}|\":<>?1234567890";

            for (var i = 0; i < project_name.length; i++) {
                if (special_chars.indexOf(project_name.charAt(i)) != -1) {
                    document.getElementById("login-msg").innerHTML = "Please give a valid login name";
                    document.getElementById("login-msg").style.color = "red";
                } else {

                    document.getElementById("login-msg").innerHTML = "";
                }
            }
        } else {

            document.getElementById("login-msg").innerHTML = "";
        }
    });
</script>

<script>
    $("#password").blur(function() {
        var project_name = document.getElementById('password').value;

        if (project_name.length == 1 || project_name == "") {

            document.getElementById("password-msg").innerHTML = "Please give a valid password";
            document.getElementById("password-msg").style.color = "red";


            //document.getElementById('task-name').focus();
        }
        if (project_name.length > 1 || project_name.length == 1) {
            var special_chars = "~`!#$%^&*+=-[]\';,/{}|\":<>?";

            for (var i = 0; i < project_name.length; i++) {
                if (special_chars.indexOf(project_name.charAt(i)) != -1) {
                    document.getElementById("password-msg").innerHTML = "Please give a valid password";
                    document.getElementById("password-msg").style.color = "red";
                } else {

                    document.getElementById("password-msg").innerHTML = "";
                }
            }
        } else {

            document.getElementById("password-msg").innerHTML = "";
        }
    });
</script>

<script>
    $("#first-name").blur(function() {
        var project_name = document.getElementById('first-name').value;

        if (project_name.length == 1 || project_name == "") {

            document.getElementById("first-name-msg").innerHTML = "Please give a valid first name";
            document.getElementById("first-name-msg").style.color = "red";


            //document.getElementById('task-name').focus();
        }
        if (project_name.length > 1 || project_name.length == 1) {
            var special_chars = "~`!#$%^&*+=-[]\';,/{}|\":<>?1234567890";

            for (var i = 0; i < project_name.length; i++) {
                if (special_chars.indexOf(project_name.charAt(i)) != -1) {
                    document.getElementById("first-name-msg").innerHTML = "Please give a valid first name";
                    document.getElementById("first-name-msg").style.color = "red";
                } else {

                    document.getElementById("first-name-msg").innerHTML = "";
                }
            }
        } else {

            document.getElementById("first-name-msg").innerHTML = "";
        }
    });
</script>

<script>
    $("#middle-name").blur(function() {
        var project_name = document.getElementById('middle-name').value;

        if (project_name.length == 1 || project_name == "") {

            document.getElementById("middle-name-msg").innerHTML = "Please give a valid middle name";
            document.getElementById("middle-name-msg").style.color = "red";


            //document.getElementById('task-name').focus();
        }
        if (project_name.length > 1 || project_name.length == 1) {
            var special_chars = "~`!#$%^&*+=-[]\';,/{}|\":<>?1234567890";

            for (var i = 0; i < project_name.length; i++) {
                if (special_chars.indexOf(project_name.charAt(i)) != -1) {
                    document.getElementById("middle-name-msg").innerHTML = "Please give a valid middle name";
                    document.getElementById("middle-name-msg").style.color = "red";
                } else {

                    document.getElementById("middle-name-msg").innerHTML = "";
                }
            }
        } else {

            document.getElementById("middle-name-msg").innerHTML = "";
        }
    });
</script>

<script>
    $("#last-name").blur(function() {
        var project_name = document.getElementById('last-name').value;

        if (project_name.length == 1 || project_name == "") {

            document.getElementById("last-name-msg").innerHTML = "Please give a valid last name";
            document.getElementById("last-name-msg").style.color = "red";


            //document.getElementById('task-name').focus();
        }
        if (project_name.length > 1 || project_name.length == 1) {
            var special_chars = "~`!#$%^&*+=-[]\';,/{}|\":<>?1234567890";

            for (var i = 0; i < project_name.length; i++) {
                if (special_chars.indexOf(project_name.charAt(i)) != -1) {
                    document.getElementById("last-name-msg").innerHTML = "Please give a valid last name";
                    document.getElementById("last-name-msg").style.color = "red";
                } else {

                    document.getElementById("last-name-msg").innerHTML = "";
                }
            }
        } else {

            document.getElementById("last-name-msg").innerHTML = "";
        }
    });
</script>

<script>
    $("#contact-number").blur(function() {
        var project_name = document.getElementById('contact-number').value;

        if (project_name.length == 1 || project_name == "") {

            document.getElementById("contact-num-msg").innerHTML = "Please give a valid work number";
            document.getElementById("contact-num-msg").style.color = "red";


            //document.getElementById('task-name').focus();
        }
        var regExp = /^[a-z]+$/i;
        if (regExp.test(project_name)) {
            document.getElementById("contact-num-msg").innerHTML = "";
            document.getElementById("contact-num-msg").innerHTML = "Please give a valid work number";
            document.getElementById("contact-num-msg").style.color = "red";
        } else {
            if (project_name.length > 1 || project_name.length == 1) {
                var special_chars = "~`!#$%^&*+=-[]\';,/{}|\":<>?";
                for (var i = 0; i < project_name.length; i++) {
                    if (special_chars.indexOf(project_name.charAt(i)) != -1) {
                        document.getElementById("contact-num-msg").innerHTML = "Please give a valid work number";
                        document.getElementById("contact-num-msg").style.color = "red";
                    } else {
                        document.getElementById("contact-num-msg").innerHTML = "";
                    }
                }
            } else {
                document.getElementById("contact-num-msg").innerHTML = "";
            }
        }
    });
</script>


<script>
    $("#work-contact-number").blur(function() {
        var project_name = document.getElementById('work-contact-number').value;

        if (project_name.length == 1 || project_name == "") {

            document.getElementById("work-num-msg").innerHTML = "Please give a valid work number";
            document.getElementById("work-num-msg").style.color = "red";


            //document.getElementById('task-name').focus();
        }
        var regExp = /^[a-z]+$/i;
        if (regExp.test(project_name)) {
            document.getElementById("work-num-msg").innerHTML = "";
            document.getElementById("work-num-msg").innerHTML = "Please give a valid work number";
            document.getElementById("work-num-msg").style.color = "red";
        } else {
            if (project_name.length > 1 || project_name.length == 1) {
                var special_chars = "~`!#$%^&*+=-[]\';,/{}|\":<>?";
                for (var i = 0; i < project_name.length; i++) {
                    if (special_chars.indexOf(project_name.charAt(i)) != -1) {
                        document.getElementById("work-num-msg").innerHTML = "Please give a valid work number";
                        document.getElementById("work-num-msg").style.color = "red";
                    } else {
                        document.getElementById("work-num-msg").innerHTML = "";
                    }
                }
            } else {
                document.getElementById("work-num-msg").innerHTML = "";
            }
        }
    });
</script>

<script>
    $("#home-contact-number").blur(function() {
        var project_name = document.getElementById('home-contact-number').value;

        if (project_name.length == 1 || project_name == "") {

            document.getElementById("home-num-msg").innerHTML = "Please give a valid work number";
            document.getElementById("home-num-msg").style.color = "red";


            //document.getElementById('task-name').focus();
        }
        var regExp = /^[a-z]+$/i;
        if (regExp.test(project_name)) {
            document.getElementById("home-num-msg").innerHTML = "";
            document.getElementById("home-num-msg").innerHTML = "Please give a valid work number";
            document.getElementById("home-num-msg").style.color = "red";
        } else {
            if (project_name.length > 1 || project_name.length == 1) {
                var special_chars = "~`!#$%^&*+=-[]\';,/{}|\":<>?";
                for (var i = 0; i < project_name.length; i++) {
                    if (special_chars.indexOf(project_name.charAt(i)) != -1) {
                        document.getElementById("home-num-msg").innerHTML = "Please give a valid work number";
                        document.getElementById("home-num-msg").style.color = "red";
                    } else {
                        document.getElementById("home-num-msg").innerHTML = "";
                    }
                }
            } else {
                document.getElementById("home-num-msg").innerHTML = "";
            }
        }
    });
</script>

<script>
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
                $('#blah').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }
    $('#blah').hide();
    $("#profile-pic").change(function() {
        $('#blah').show();
        readURL(this);
    });
    $("#cancelBtn").click(function() {
        location.href = "<?php echo $this->Url->build(["controller" => "users", "action" => "index"]); ?>";
    });
    $(function() {
        $("#UserFrm").validate({
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
                "user_type_id": {
                    required: true
                },
                "user_role_id": {
                    required: true
                },
                "email": {
                    required: true,
                    email: true
                },
                "password": {
                    required: true
                },
                "first_name": {
                    required: true
                },
                "last_name": {
                    required: true
                },
                "mobile_country_code": {
                    required: true
                },
                "contact_number": {
                    required: true
                }
            },
            messages: {
                "user_type_id": {
                    required: "You must select user type"
                },
                "user_role_id": {
                    required: "You must select user role"
                },
                "email": {
                    required: "You must enter login name",

                },
                "password": {
                    required: "You must enter password"
                },
                "first_name": {
                    required: "You must first name"
                },
                "last_name": {
                    required: "You must enter last name"
                },
                "mobile_country_code": {
                    required: "You must enter country code"
                },
                "contact_number": {
                    required: "You must enter contect number"
                }
            }

        });

        $("#email").blur(function() {
            var email = $("#email").val();
            var dataString = 'email=' + email;

            // AJAX Code To Submit Form.
            $('#login-msg').show();
            $('#login-msg').html("<img src='/img/loading.gif'>&nbsp;&nbsp;<span style='font-weight: bold;font-size:12px;'>Checking login name validity....</span>");
            $.ajax({
                type: "POST",
                url: "<?= $this->Url->build(["controller" => "Users", "action" => "check-email"]); ?>",
                data: dataString,
                cache: false,
                headers: {
                    'X-CSRF-Token': <?= json_encode($this->request->getParam('_csrfToken')) ?>
                },
                success: function(result) {
                    var obj = $.parseJSON(result);
                    if (obj.success == 'true') {
                        $('#login-msg').show();
                        $('#login-msg').html('Login name already exist! Please try another');
                        $('#login-msg').css("color", "red");
                        $('#submitBtn').attr('disabled', true);
                    }
                    if (obj.success == 'false') {
                        $('#login-msg').hide();
                        $('#login-msg').html();
                        $('#submitBtn').attr('disabled', false);
                    }
                }
            });
            return false;
        });


    });
</script>
<script>
    var selectedGroupIds = <?= empty($userGroupsId) ? json_encode([]) : json_encode($userGroupsId) ?>;
    $('#usergroups option').each(function(){        
        if(selectedGroupIds.indexOf(parseInt($(this).val())) > -1){
            $(this).prop('selected', true);
        }
    })
    $('#usergroups').multiSelect();
</script>
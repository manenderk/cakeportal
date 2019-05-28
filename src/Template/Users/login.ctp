<?= $this->Html->css('app.css') ?>
<?= $this->Html->css('font-awesome.min.css') ?>

<div class="sky">

    <div class="clouds_one"></div>
    <div class="clouds_two"></div>
    <div class="clouds_three"></div>
</div>

<div class="wrapper margin-top-five">
    <div class="block-center mt-xl wd-xl login-form">
        <!-- START panel-->
        <div class="panel panel-dark panel-flat">
            <div class="panel-heading text-center bg-gray-dark ">

                <div class="login-logo"><?php echo $this->Html->image('login-logo.png', ['alt' => 'MAMSYS']);?>
                </div>
                <h3>iProats</h3>


            </div>
            <div class="panel-body">
                <p class="ep">Enter your email and password to login</p>
                <p id="message-login"></p>
                <?= $this->Form->create(null, ['id' => 'loginForm', 'name' => 'loginForm']) ?>
                    <div class="form-group has-feedback">
                        <?= $this->Form->control('email', ['label'=>false,  'class' => 'form-control','placeholder'=>'User Login Email','required'=>'required','autocomplete'=>'off']) ?>
                        <span
                            class="fa fa-envelope fa-2x form-control-feedback text-gray float-right margin-fa-login"></span>
                    </div>
                    <div class="form-group has-feedback">
                        <?= $this->Form->control('password', ['label'=>false, 'class' => ' form-control','placeholder'=>'Password','required'=>'required','autocomplete'=>'off']) ?>
                        <span
                            class="fa fa-lock fa-2x form-control-feedback text-gray float-right margin-fa-login2"></span>
                    </div>
                    <div class="clearfix">
                        <div class="pull-right">
                            <a
                                href="<?php echo $this->Url->build(["controller" => "Users","action" => "forgot"]);?>">
                                Forgot your password?</a>
                        </div>
                    </div>                    
                    <button type="submit" class="btn btn-block btn-primary mt-lg" id="loginBtn">Login</button>
                <?= $this->Form->end() ?>
            </div>

        </div>

        <!-- END panel-->
        <div class="p-lg text-center">
            <span>&copy;</span>
            <span>2017</span>
            <span>Mamsys - GET THE BEST</span>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        
        $('#loginForm').submit(function(e){
            e.preventDefault();
        });

        $("#loginBtn").click(function() {
            var username = $("#email").val();
            var password = $("#password").val();

            // Remember Me Check Validates Here
            var regex = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
            if (regex.test(username) == false) {
                $('#message-login').show();
                $('#message-login').html('Invalid Login Name');
                $('#message-login').css("color", "#29b2e1");
                return false;
            }
            // Returns successful data submission message when the entered information is stored in database.

            //var dataString = 'email=' + username + '&password=' + password;
            var dataString = $('#loginForm').serialize();

            // AJAX Code To Submit Form.
            var url = "login";
            $('#message-login').show();
            $('#message-login').html(
                "<img src='/img/loading.gif'>&nbsp;&nbsp;<span style='font-weight: bold;font-size:12px;'>Validating your details....</span>"
            );
            $.ajax({
                type: "POST",
                url: "<?= $this->Url->build('/users/login/') ?>",
                data: dataString,
                cache: false,
                success: function(result) {
                    var obj = $.parseJSON(result);
                    if (obj.success == true) {
                        $('#message-login').show();
                        $('#message-login').html(obj.msg);
                        $('#message-login').css("color", "#29b2e1");
                        //$('#message-login').css("font-weight", "bold");
                        //$('#loginBtn').prop('disabled', true);
                        location.href = obj.url;
                    }
                    if (obj.success == false) {
                        $('#message-login').show();
                        $('#message-login').html(obj.msg);
                        $('#message-login').css("color", "#29b2e1");
                        //$('#message-login').css("font-weight", "bold");
                    }
                }
            });
            return false;
        });
    });
</script>
<div class="contianer">
    <div class="row">
        <div class="col-md-12 col-sm-12">
            <div class="login-box-body">
                <div class="card card-primary">
                    <div class="card-header">
                        <p class="login-box-msg">Sign in</p>
                    </div>

                    <form method="post" name="myForm" id="login" class="form-s" action="">
                        <div class="card-body">
                            <div class="form-group has-feedback">
                                <lable>Email</lable>
                                <input type="text" id="email" placeholder="Email" value="" class="form-control " name="username" tabindex="1">
                                <span class="glyphicon glyphicon-envelope form-control-feedback icon-login"></span>
                            </div>
                            <div class="form-group has-feedback">
                                <lable>Password</lable>
                                <input type="password" id="login-pass" placeholder="Password" value="" class="form-control " name="password" tabindex="2">
                                <span class="glyphicon glyphicon-lock form-control-feedback icon-login"></span>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <input type="submit" class="btn btn-primary btn-block btn-flat login" value="Login" tabindex="3">
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>



<div class="login-logo ">
    <div class="login-header orggen">
        <a href="http://www.ogcrm.com/" title="" target="_blank" style="font-size:18px">Powered By:<b> OrgGen Technologies LLP</b></a>

    </div>
</div>

<div class="login-form-links" id="forgotwrapper" style="display: none;" data-keyboard="false" data-backdrop="static">
    <div class="form-group row">
        <form method="post" name="myForm" class="form-horizontal" id="forgotform" action="">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <p class="login-page-title">Enter your Registered Email-Id
                </p>
            </div>
            <div class="col-md-12 col-sm-12 col-xs-12 ">
                <div class="input-group add-on" id="forgot_div">
                    <div class="input-group-btn">
                        <span class="btn btn-default" type="submit"><i class="glyphicon glyphicon-user"></i></span>
                    </div>
                    <input type="text" id="email" placeholder="Your Email address here.." value="" class="form-control login-field" name="login_email" data-fv-field="login_email">
                </div>
            </div>
            <div class=" col-md-12 col-sm-12 col-xs-12 text-right">
                <input type="submit" class="btn ib-btn modal-login-btn " value="Send OTP">
            </div>

        </form>
    </div>
</div>

</div><!-- end of login box  -->

<!--close nav-->
<!--close row-->

<script src="<?php echo JS_PATH_BACKEND; ?>jquery.validate.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $("#login").validate({
            rules: {
                username: {
                    required: true,
                    email: true
                },
                password: {
                    required: true,
                    minlength: 7
                }
            },
            messages: {
                username: {
                    required: "Email Required",
                    email: "Enter Valid Email ID"
                },
                password: {
                    required: "Password Required",
                    minlength: "Minimum 7 Character Required"
                }
            },
            errorElement: 'p',
            errorPlacement: function(error, element) {
                error.insertAfter(element);
            },
            submitHandler: function(form) {

                $.ajax({
                    type: "POST",
                    url: "<?php echo site_url('login/admin_login/uvf_login'); ?>",
                    data: $(form).serialize(),
                    success: function(data) {
                        window.location = "<?php echo site_url('adminx'); ?>";
                    },
                    error: function(data) {
                        alert('The email and password you entered dont match!');
                    }
                });
                return false;
            }

        });
    });
</script>
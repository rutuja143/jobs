<div class="modal fade register" id="login_modal" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button class="close" data-dismiss="modal" type="button">&times;</button>
                <h2 class="title">Login</h2>
            </div>
            <div class="modal-body">
                <form enctype="multipart/form-data" method="post" id="admin_login" class="form-horizontal login-sec col-md-12">
                    
                    <p class="form-group form-row form-row-wide">
                        <label for="reg_email">Email id <span class="required">*</span></label>
                        <input type="email" class="input-text form-control" name="login_email" id="reg_email" value="">
                    </p>

                    <p class="form-group form-row form-row-wide">
                        <label for="reg_password">Password <span class="required">*</span></label>
                        <input type="password" class="input-text form-control" name="login_password" id="reg_password">
                    </p>

                    <p class="form-group form-row">
                        <input type="submit" class="btn btn-info btn-block" name="login" value="Login">
                    </p>

                </form>
                <div class="create text-center">
                    <div class="line-border center">
                        <span class="center-line">
                            <p>Forgot your password? <a class="text-primary" href="<?php echo site_url('login/show_forgot_form'); ?>"><strong>Click here</strong></a> to reset.</p>
                            <div class="checkbox"></div>

                        </span>
                    </div>
                </div>
                <button class="login btn btn-second" id="register"   title="Login"><i class="fa fa-sign-in" aria-hidden="true"></i>Register</button>
                    
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    jQuery(document).ready(function() {
        jQuery("#admin_login").validate({
            rules: {
                login_email: {
                    required: true,
                },
                login_password: {
                    required: true,
                }
            },
            messages: {
                login_email: {
                    required: "Email Required",
                },
                login_password: {
                    required: "Password Required",
                }
            },
            errorElement: 'p',
            errorPlacement: function(error, element) {
                error.insertAfter(element);
            },
            submitHandler: function(form) {
                jQuery.ajax({
                    type: "POST",
                    url: "<?php echo site_url(); ?>login/uvf_login",
                    data: jQuery(form).serialize(),
                    success: function(data) {
                        window.location = "<?php 
                            $currentURL = current_url(); //for simple URL
                            $params = $_SERVER['QUERY_STRING']; //for parameters
                            $fullURL = $currentURL . '?' . $params;
                            echo $fullURL; ?>";
                    },
                    error: function(data) {
                        alert('The email and password you entered dont match!');
                    }
                });
                return false;
            }

        });
        jQuery("#register").click(function(){
            jQuery('#login_modal').modal('hide')
            jQuery('#register_modal').modal('show')
        })

    });
</script>
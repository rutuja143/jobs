<br><br><br>
<div class="container">
    <div id="customer_register" class="content-register register_login_wrapper active">
        <h3 class="title">Forgot Password</h3>
        <form id="forgot_form" method="post" action="<?php echo site_url('login/send_password'); ?>">
            <p class="form-group form-row form-row-wide">
                <label for="reg_email">Email address <span class="required">*</span></label>
                <input type="email" class="input-text form-control" name="email" id="reg_email" value="" required="required">
            </p>

            <div class="woocommerce-privacy-policy-text"><p>Note: You will receive reset password link if email id is registered..</p>
            </div>
            <p class="form-group form-row">
                <input type="submit" class="btn btn-info btn-block" name="register" value="Submit">
            </p>
        </form>
    </div>
</div>

<script type="text/javascript">

    jQuery(document).ready(function () {
        jQuery.validator.addMethod("check_email", function (value, element) {
            var response = false;
            jQuery.ajax({
                url: "<?php echo base_url('login/check_email'); ?>",
                type: "POST",
                async: false,
                data: {email_id: value},
                beforeSend: function () {

                },
                success: function (result) {
                    response = true;
                },
                error: function (result) {
                    response = false;
                }
            });
            return response;
        }, "Email id Not Exist.");
        jQuery("#forgot_form").validate({
            debug: false,
            rules:
                    {
                        'email': {
                            required: true,
                            check_email: true
                        }
                    },
            messages: {
                'email': {
                    required: 'Email id Required',
                    check_email: 'Email id Not Exist.'
                }
            },
            errorElement: 'p',
            errorPlacement: function (error, element) {
                jQuery(element).parent().append(error);
            },
            submitHandler: function (form) {

                return true;
            }
        });
    });
</script>
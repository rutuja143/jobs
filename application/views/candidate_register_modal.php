<div class="modal fade register modal-popup" id="register_modal" role="dialog" aria-labelledby="exampleModalScrollableTitle"  aria-hidden="true"  >
    <div class="modal-dialog modal-dialog-scrollable">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button class="close" data-dismiss="modal" type="button">&times;</button>
               
				<h2 class="modal-title register-header" id="exampleModalScrollableTitle">Register</h2>
            </div>
            <div class="modal-body">
                <form enctype="multipart/form-data" method="post" id="register_form" class="form-horizontal login-sec col-md-12" action="<?php echo base_url('page_management/register_candidiate'); ?>">
                    <p class="form-group form-row form-row-wide">
                        <label for="reg_name">Name <span class="required">*</span></label>
                        <input type="text" class="input-text form-control" name="fullname" id="reg_name" value="">
                    </p>
                    <p class="form-group form-row form-row-wide">
                        <label for="reg_email">Email id <span class="required">*</span></label>
                        <input type="email" class="input-text form-control" name="email" id="reg_email" value="">
                    </p>
                    <p class="form-group form-row form-row-wide">
                        <label for="mobile_number">Mobile number <span class="required">*</span></label>
                        <input type="text" class="input-text form-control" name="mobile" id="mobile_number" value="">
                    </p>

                    <p class="form-group form-row form-row-wide">
                        <label for="reg_password">Password <span class="required">*</span></label>
                        <input type="password" class="input-text form-control" name="password" id="reg_ppassword">
                    </p>

                    <p class="form-group form-row form-row-wide">
                        <label for="reg_cpassword">Confirm Password <span class="required">*</span></label>
                        <input type="password" class="input-text form-control" name="cpassword" id="reg_cpassword">
                    </p>

                    
                    
                     <p class="form-group form-row">
                        <input type="submit" class="btn btn-info btn-block" name="register" value="Register">
                    </p>
                </form>
                <div class="create text-center">
                    <div class="line-border center">
                        <span class="center-line">or</span>
                    </div>
                    <button class="login btn btn-second" id="login"   title="Login"><i class="fa fa-sign-in" aria-hidden="true"></i>Login</button>
                                                         
                 </div>
            </div>
        </div>
    </div>
</div>


<script type="text/javascript">
    jQuery(document).ready(function() {
        jQuery.validator.addMethod("check_email", function(value, element) {
            var response = false;
            jQuery.ajax({
                url: "<?php echo base_url('page_management/check_email_register'); ?>",
                type: "POST",
                async: false,
                data: {
                    email_id: value
                },
                beforeSend: function() {

                },
                success: function(result) {
                    response = true;
                },
                error: function(result) {
                    response = false;
                }
            });
            return response;
        }, "Email id already registered.Please login.");
        jQuery("#register_form").validate({
            debug: false,
            rules: {
                'fullname': {
                    required: true
                },
                'email': {
                    required: true,
                    check_email: true
                },
                'mobile': {
                    required: true,
                },
                'password': {
                    required: true,
                    rangelength: [3, 42],
                },
                
                'cpassword': {
                    required: true,
                    equalTo: "#reg_ppassword"
                },
            },
            messages: {
                'fullname': {
                    required: 'Name Required'
                },
                'email': {
                    required: 'Email id Required',
                    check_email: 'Email id already registered.Please login.'
                },
                'mobile': {
                    required: 'Mobile number Required',
                },
                'password': {
                    required: 'Password Required',
                },
               
                'cpassword': {
                    required: 'Password Required',
                },
            },
            errorElement: 'p',
            errorPlacement: function(error, element) {
                jQuery(element).parent().append(error);
            },
            submitHandler: function(form) {

                return true;
            }
        });
        jQuery("#login").click(function(){
            jQuery('#register_modal').modal('hide')
            
          jQuery('#login_modal').modal('show')
            
        })
    });
</script>
         <!-- Content Wrapper. Contains page content -->
         <div class="content-wrapper">
             <!-- Content Header (Page header) -->
             <section class="content-header">
                 <div class="container-fluid">
                     <div class="row mb-2">
                         <div class="col-sm-12">
                             <h1> <?php if($mode == "update") {
                                 echo "Update Employee" ;
                             }
                             else {
                                 echo "Add New Employee"; } ?> </h1>
                         </div>
                     </div>
                 </div>
                 <!-- /.container-fluid -->
             </section>
             <!-- Main content -->
             <section class="content">
                 <form id="employee_add" enctype="multipart/form-data" method="post" action="<?php echo isset($mode) && $mode == 'update' ? site_url('employee/employee_admin/update') : site_url('employee/employee_admin/insert'); ?>">

                     <div class="container-fluid">
                         <!-- /.row -->
                         <div class="row">
                             <div class="col-md-6 col-lg-8 col-sm-6 col-sm-12">
                                 <!-- general form elements -->
                                 <div class="card card-primary">
                                     <div class="card-header">
                                         <h3 class="card-title">Basic Information</h3>
                                     </div>
                                     <!-- /.card-header -->
                                     <!-- form start -->
                                     <div class="card-body">
                                         <div class="form-group">
                                             <label>Employee Name</label>
                                             <input type="hidden" name="user[id]" class="form-control" placeholder="Enter Jobs Title" value="<?php echo isset($employee['user_id'])  ? $employee['user_id'] : ''; ?>">
                                             <input type="text" name="employee[name]" class="form-control" placeholder="Enter Jobs Title" value="<?php echo isset($employee['name']) ? $employee['name'] : ''; ?>">
                                         </div>


                                         <div class="form-group">
                                             <label>Role</label>
                                             <select class="form-control" name="employee[role]" id="division">
                                                 <option value="">select</option>
                                                 <?php
                                                    $roles = $this->config->item('roles');
                                                    foreach ($roles as $key => $value) {
                                                        ?><option <?php
                                                                        if (isset($employee['role'])) {
                                                                            if ($key == $employee['role']) {
                                                                                echo 'selected';
                                                                            }
                                                                        }
                                                                        ?> value="<?php echo $key; ?>"><?php echo $value; ?></option> <?php
                                                                                                                                        }
                                                                                                                                        ?>
                                             </select>

                                         </div>

                                         <!-- /.card-body -->


                                         <div class="form-group">
                                             <label>E-mail</label>
                                             <input type="text" name="employee[email]" class="form-control" placeholder="Enter ..." value="<?php echo isset($employee['email']) ? $employee['email'] : ''; ?>">
                                         </div>
                                         <div class="form-group">
                                             <label>Contact No.</label>
                                             <input type="text" name="employee[contactno]" class="form-control" placeholder="Enter ..." value="<?php echo isset($employee['contactno']) ? $employee['contactno'] : ''; ?>">
                                         </div>
                                         
                                    <?php if($mode=='update') {?>
                                        <label> Update Password </label> <input type="checkbox" value='1' class="update_password" >
                                 <div class='mcq_div' style="display:none">
                                 <div class="form-group">
                                    <label>Password</label>
                                    <input type="password" class="form-control" id="pwd" tabindex="5" value="<?php echo (!isset($mode)) ? '' : ''; ?>" name="employee[password]" id="password">
                                         
                                  </div>
                                 <div class="form-group">
                                    <label>Same-Password</label>
                                    <input type="password" class="form-control" id="pwd" tabindex="5" value="<?php echo (!isset($mode)) ? '' : ''; ?>" name="employee[password]" id="password">
                                         </div>
      </div>
      <?php }else {?>  <div class="form-group">
                                    <label>Password</label>
                                    <input type="password" class="form-control" id="pwd" tabindex="5" value="<?php echo (!isset($mode)) ? '' : ''; ?>" name="employee[password]" id="password">
                                         </div>
                                 <div class="form-group">
                                    <label>Same-Password</label>
                                    <input type="password" class="form-control" id="pwd" tabindex="5" value="<?php echo (!isset($mode)) ? '' : ''; ?>" name="employee[password]" id="password">
                                          </div>
      <?php } ?>
                                        <div class="form-group">
                                        <label>Address</label>
                                             <textarea class="form-control" name="employee[address]" rows="3" placeholder="Enter ..."><?php echo isset($employee['address']) ? $employee['address'] : ''; ?></textarea>
                                     </div>




                                     </div>
                                     <!-- /.card-body -->

                                     <!-- /.card -->
                                 </div>
                             </div>
                         </div>

                         <!--2nd row end here-->
                         <div class="row">
                             <div class="col-md-6 col-lg-12 col-sm-6 col-sm-12">
                                 <center>
                                     <button type="submit" class="btn btn-primary" style="margin:2px 0px 24px 0px;">Submit</button>
                                 </center>
                                 <!-- /.container-fluid -->
                             </div>
                         </div>
                 </form>
             </section>
             <!-- /.content -->
         </div>

         <!-- /.content-wrapper -->
         <script src="<?php echo JS_PATH_BACKEND; ?>jquery.validate.js"></script>

         <script>
             $(document).ready(function() {
                $(".update_password").change(function () {
            var question_type = $(this).val();
            
            if ($(this).prop('checked')==true){ 
                $(".mcq_div").show();
            } else {
                $(".mcq_div").hide();
            }
        });
                $.validator.addMethod("check_email", function(value, element) {
            var response = false;
            $.ajax({
                url: "<?php echo base_url('employee/employee_admin/check_email_register'); ?>",
                type: "POST",
                async: false,
                data: {
                    email_id: value,
                    mode:'<?php echo $mode;?>',
                    id:'<?php echo $employee['user_id']; ?>'
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
                 $.validator.addMethod("lettersonly", function(value, element) {
                     return this.optional(element) || /^[^-\s][a-zA-Z,""\s]+$/i.test(value);
                 });
                 $.validator.addMethod("digitonly", function(value, element) {
                     return this.optional(element) || /^[^-\s][0-9,""\s]+$/i.test(value);
                 });
                 $.validator.addMethod("lettersdigitonly", function(value, element) {
                     return this.optional(element) || /^[^-\s][a-zA-Z0-9,""\s]+$/i.test(value);
                 });

                 $("#employee_add").validate({
                     //ignore: [],
                     rules: {
                         'employee[name]': {
                             required: true,
                             rangelength: [3, 50],
                             lettersonly: true
                         },
                         'employee[email]': {
                             required: true,
                             email:true,
                             check_email:true
                         },
                         'employee[contactno]': {
                             required: true,
                             digits: true,
                             rangelength: [10, 10]
                         },
                         'employee[password]': {
                             required: true,
                             rangelength: [3, 7]
                         },
                         'employee[samepassword]': {
                             equalTo: "#pwd"
                         },
                         'employee[address]': {
                             required: true,
                             rangelength: [3, 500]
                         },
                         'language[]': {
                             required: true
                         },
                         'file': {
                             required: true
                         },
                         'employee[code]': {
                             required: true
                         }
                     },
                     messages: {
                         'employee[name]': {
                             required: "Name Required",
                             rangelength: "Minimum 3 & Maximum 50 Character Required",
                             lettersonly: "Enter Correct Name without space"
                         },
                         'employee[contactno]': {
                             required: "Contact Required",
                             rangelength: "Minimum 3 & Maximum 50 Character Required",
                             lettersonly: "Enter Correct Name without space"
                         },
                         'employee[address]': {
                             required: "Address Required"
                         },
                         'file': {
                             required: "Image is Required"
                         },
                         'employee[code]': {
                             required: "Code is Required"
                         },
                         'employee[email]':{
                            check_email:'Email id already registered.Please login. '
                         }
                     },
                     errorElement: 'p',
                     errorPlacement: function(error, element) {
                         jQuery(element).parent().append(error);
                     },
                     submitHandler: function(form) {
                         var id = '<?php echo $this->input->get('id'); ?>';
                         $.ajax({
                             type: "POST",
                             url: "<?php echo site_url('employee/check_url') ?>",
                             data: {
                                 'email': $('#email').val(),
                                 'id': id
                             },
                             success: function(data) {
                                 form.submit();
                             },
                             error: function(data) {
                                 alert('Email ID already Exist');
                             }
                         });

                     }
                 });
                 $("#pwdupdate_chkbox").change(function() {
                     if (this.checked) {
                         $("#password_wrapper").show();
                         $("#pwd").val('');
                         $("#confirmpwd").val('');
                     } else {
                         $("#password_wrapper").hide();
                         $("#pwd").val('123');
                         $("#confirmpwd").val('123');
                     }
                 });

             });
         </script>

         <?php /*

<div class="form">
    <div class="row">
        <div class="col-md-12 col-sm-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Add Employee</h2>
                </div>
                <div class="x_content">
                    <br>
                    <form id="employee_add" class="form-horizontal add_form" enctype="multipart/form-data" method="post" action="<?php echo isset($mode) && $mode == 'update' ? site_url('employee/update') : site_url('employee/insert') ?>"> 
                        <input type="hidden" name="empid" value="<?php echo isset($employee['id']) ? $employee['id'] : ''; ?>">
                        <div class="row">
                            <div class="text-center">
                                <p class="note">The fields marked as <span>*</span> are mandatory.</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group">
                                <label class="control-label col-md-2 col-sm-2 col-sm-offset-2" for="employee">Employee Name<span class="required">*</span></label>
                                <div class="col-md-2 col-sm-2">
                                    <input type = "text" class = "form-control" tabindex="1" value="<?php echo isset($employee['name']) ? $employee['name'] : ''; ?>" autofocus="on" id="employee" name="employee[name]">
                                </div>
                                <label class="control-label col-md-1 col-sm-1" for="role">Designation<span class="required">*</span></label>
                                <div class="col-md-2 col-sm-2">
                                    <select  class="searchselected form-control" tabindex="2" id="role" name="employee[role]">

                                        <?php
                                        $roles = $this->config->item('roles');
                                        foreach ($roles as $key => $value) {
                                            ?><option
                                            <?php
                                            if (isset($employee['role'])) {
                                                if ($key == $employee['role']) {
                                                    echo 'selected';
                                                }
                                            }
                                            ?>
                                                value="<?php echo $key; ?>"><?php echo $value; ?></option> <?php
                                            }
                                            ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group">
                                <label class="control-label col-md-2 col-sm-2 col-sm-offset-2" for="email">E-mail<span class="required">*</span></label>
                                <div class="col-md-2 col-sm-2">
                                    <input type="email" class="form-control" id="email" value="<?php echo isset($employee['email']) ? $employee['email'] : ''; ?>" tabindex="3" name="employee[email]">
                                </div>
                                <label class = "control-label col-md-1 col-sm-1" for="contact">Contact No.<span class = "required">*</span></label>
                                <div class = "col-md-2 col-sm-2">
                                    <input type = "number" class = "form-control" tabindex="8" value="<?php echo isset($employee['contactno']) ? $employee['contactno'] : ''; ?>" id="contact" maxlength="10" name="employee[contactno]">
                                </div>
                            </div>
                        </div>
                        <div class="row" >
                            <?php
                            if (isset($mode) && $mode == 'update') {
                                ?>

                                <div class="form-group">
                                    <label class="control-label col-md-2 col-sm-2 col-sm-offset-2">Change Password<span class="required">*</span></label>
                                    <div class="col-md-2 col-sm-2">
                                        <input type="checkbox"  id="pwdupdate_chkbox" tabindex="" name="employee[check_password]" >
                                    </div>

                                </div>
                                <?php
                            }
                            ?>
                        </div>
                        <div id="password_wrapper" class="row" <?php echo (isset($mode) && $mode == 'update') ? 'style="display:none;"' : ''; ?>>
                            <div class="form-group">
                                <label class="control-label col-md-2 col-sm-2 col-sm-offset-2" for="pwd">Password<span class="required">*</span></label>
                                <div class="col-md-2 col-sm-2">
                                    <input type="password" class="form-control" id="pwd" tabindex="5" value="<?php echo (!isset($mode)) ? '' : ''; ?>" name="employee[password]"  id="password">
                                </div>
                                <label class="control-label col-md-1 col-sm-1" for="confirmpwd">Password (again)<span class="required">*</span></label>
                                <div class="col-md-2 col-sm-2">
                                    <input type="password" class="form-control" id="confirmpwd" tabindex="6" value="<?php echo (!isset($mode)) ? '' : ''; ?>" name="employee[samepassword]" >
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group">
<!--                                <label class="control-label col-md-2 col-sm-2 col-sm-offset-2" for="">Employee Code<span class="required">*</span></label>
                                <div class="col-md-2 col-sm-2">

                                    <input type="text" class="form-control" id="ecode" tabindex="3" value="<?php echo isset($employee['code']) ? $employee['code'] : ''; ?>" maxlength="5" name="employee[code]" <?php
                                if (isset($mode) && $mode == 'update') {
                                    echo 'disabled';
                                }
                                ?>>
                                </div>-->
                                <label class = "control-label col-md-2 col-sm-2 col-sm-offset-2" for="address">Address<span class = "required">*</span></label>
                                <div class="col-md-2 col-sm-2">
                                    <textarea id="address" class="form-control"  tabindex="5" name="employee[address]"><?php echo isset($employee['address']) ? $employee['address'] : ''; ?></textarea>
                                </div>
                                <label class = "control-label col-md-1 col-sm-1" for="country">Emergency Contact<span class = "required">*</span></label>
                                <div class=" col-md-2 col-sm-2">
                                    <input type = "text" class = "form-control" tabindex="4" value="<?php echo isset($employee['landline']) ? $employee['landline'] : ''; ?>" id="contact" maxlength="12" name="employee[landline]">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group">
                                <label class="control-label col-md-2 col-sm-2 col-sm-offset-3">Employee Image<span class="required">*</span>
                                </label>
                                <div class="col-md-2 col-sm-2">    
                                    <input
                                    <?php
                                    if ($mode == 'update') {
                                        echo 'style="display:none;"';
                                    }
                                    ?>
                                        type='file' id="imgInp" name="file" />
                                        <?php if ($mode == 'update') { ?>

                                        <img id="blah" src="<?php echo MEDIA_PATH_FRONTEND . $employee['image']; ?>" alt="click on choose file" class="img-responsive" />
                                        <?php
                                    }
                                    if ($mode == 'update') {
                                        ?>
                                        <input required type="hidden" name="delete" id="delete">
                                        <p onclick="jQuery('#delete').val(1);
                                                    jQuery(this).hide();
                                                    jQuery('#blah').hide();
                                                    jQuery('#imgInp').show();">Delete</p>
                                           <?php
                                       }
                                       ?>
                                </div>
                                <label class = "control-label col-md-1 col-sm-1" for="country">Code<span class = "required">*</span></label>
                                <div class=" col-md-2 col-sm-2">
                                    <input type = "text" class = "form-control" tabindex="6" value="<?php echo isset($employee['code']) ? $employee['code'] : ''; ?>" id="code" maxlength="12" name="employee[code]">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group hidden">
                                <label class = "control-label col-md-2 col-sm-2 col-sm-offset-2" for="country">State<span class = "required">*</span></label>
                                <div class="col-md-2 col-sm-2">
                                    <select class="chosen-select" tabindex="7" id="country">
                                        <option>Select State</option>
                                        <option>Agartala</option>
                                        <option>Agatti</option>
                                        <option>Agra</option>
                                        <option>Ahemdabad</option>
                                        <option>Aizawal</option>
                                        <option>Allahbad</option>
                                        <option>Amritsar</option>
                                        <option>Anand</option>
                                        <option>Aurangabad</option>
                                        <option>Bagdogra</option>
                                        <option>Banglore</option>
                                        <option>Belgaum</option>
                                    </select>
                                </div>
                                <label class="control-label col-md-1 col-sm-1" for="city">City<span class="required">*</span></label>
                                <div class="col-md-2 col-sm-2">
                                    <select class="chosen-select" tabindex="8" id="city">
                                        <option>Select City</option>
                                        <option>Agartala</option>
                                        <option>Agatti</option>
                                        <option>Agra</option>
                                        <option>Ahemdabad</option>
                                        <option>Aizawal</option>
                                        <option>Allahbad</option>
                                        <option>Amritsar</option>
                                        <option>Anand</option>
                                        <option>Aurangabad</option>
                                        <option>Bagdogra</option>
                                        <option>Banglore</option>
                                        <option>Belgaum</option>
                                    </select>
                                </div>

                            </div>
                        </div>
                        <div class = "row">
                            <div class = "submit col-md-4 col-md-offset-6">
                                <button type = "submit" class = "btn btn-default submit-btn"tabindex="9">Save</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script src = "<?php echo JS_PATH_BACKEND; ?>jquery.validate.js"></script>
<script>
                                            var input = document.getElementById('ecode');



                                            jQuery.validator.addMethod("lettersonly", function (value, element) {
                                                return this.optional(element) || /^[^-\s][a-zA-Z,""\s]+$/i.test(value);
                                            });
                                            jQuery.validator.addMethod("digitonly", function (value, element) {
                                                return this.optional(element) || /^[^-\s][0-9,""\s]+$/i.test(value);
                                            });
                                            jQuery.validator.addMethod("lettersdigitonly", function (value, element) {
                                                return this.optional(element) || /^[^-\s][a-zA-Z0-9,""\s]+$/i.test(value);
                                            });
                                            jQuery.validator.addMethod("codeonly", function (value, element) {
                                                return value.indexOf(" ") < 0 && value != "";
                                            });
                                            $("#employee_add").validate({
                                                //ignore: [],
                                                rules: {
                                                    'employee[name]': {
                                                        required: true,
                                                        rangelength: [3, 50],
                                                        lettersonly: true
                                                    },
                                                    'employee[email]': {
                                                        required: true,
                                                        email: true
                                                    },
                                                    'employee[contactno]': {
                                                        required: true,
                                                        digits: true,
                                                        rangelength: [10, 10]
                                                    },
                                                    'employee[password]': {
                                                        required: true,
                                                        rangelength: [3, 7]
                                                    },
                                                    'employee[samepassword]': {
                                                        equalTo: "#pwd"
                                                    },
                                                    'employee[address]': {
                                                        required: true,
                                                        rangelength: [3, 500]
                                                    },
                                                    'language[]': {
                                                        required: true
                                                    },
                                                    'file': {
                                                        required: true
                                                    },
                                                    'employee[code]': {
                                                        required: true
                                                    }
                                                },
                                                messages: {
                                                    'employee[name]': {
                                                        required: "Name Required",
                                                        rangelength: "Minimum 3 & Maximum 50 Character Required",
                                                        lettersonly: "Enter Correct Name without space"
                                                    },
                                                    'employee[contactno]': {
                                                        required: "Contact Required",
                                                        rangelength: "Minimum 3 & Maximum 50 Character Required",
                                                        lettersonly: "Enter Correct Name without space"
                                                    },
                                                    'employee[address]': {
                                                        required: "Address Required"
                                                    },
                                                    'file': {
                                                        required: "Image is Required"
                                                    },
                                                     'employee[code]': {
                                                        required: "Code is Required"
                                                    }
                                                },
                                                errorElement: 'p',
                                                errorPlacement: function (error, element) {
                                                    jQuery(element).parent().append(error);
                                                },
                                                submitHandler: function (form) {
                                                    var id = '<?php echo $this->input->get('id'); ?>';
                                                    $.ajax({
                                                        type: "POST",
                                                        url: "<?php echo site_url('employee/check_url') ?>",
                                                        data: {'email': $('#email').val(),
                                                            'id': id},
                                                        success: function (data) {
                                                            form.submit();
                                                        },
                                                        error: function (data) {
                                                            alert('Email ID already Exist');
                                                        }
                                                    });

                                                }
                                            });
                                            $("#pwdupdate_chkbox").change(function () {
                                                if (this.checked) {
                                                    $("#password_wrapper").show();
                                                    $("#pwd").val('');
                                                    $("#confirmpwd").val('');
                                                } else {
                                                    $("#password_wrapper").hide();
                                                    $("#pwd").val('123');
                                                    $("#confirmpwd").val('123');
                                                }
                                            });

</script> */ ?>
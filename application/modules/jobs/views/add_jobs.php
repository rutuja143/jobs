         <!-- Content Wrapper. Contains page content -->
         <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
               <div class="container-fluid">
                  <div class="row mb-2">
                     <div class="col-sm-12">
                        <h1>
                           <?php if ($mode == "update"){ 
                           echo "Update job"; } else {
                           echo "Add New job"; }?> 
                        </h1>
                     </div>
                  </div>
               </div>
               <!-- /.container-fluid -->
            </section>
            <!-- Main content -->
            <section class="content">
               <form id="jobs_add" enctype="multipart/form-data" method="post" action="<?php echo isset($mode) && $mode == 'update' ? site_url('jobs/jobs_admin/update') : site_url('jobs/jobs_admin/set_jobs'); ?>">

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
                                    <label>Job Title</label>
                                    <input type="hidden" name="jobid" class="form-control" placeholder="Enter Jobs Title" value="<?php echo isset($jobs['id'])  ? $jobs['id'] : ''; ?>">

                                    <input type="text" name="jobs[title]" class="form-control" placeholder="Enter Jobs Title" value="<?php echo isset($jobs['title'])  ? $jobs['title'] : ''; ?>">
                                 </div>
                                 <div class="form-group">
                                    <label>Employer Name</label>
                                    <input type="text" name="jobs[employer_name]" class="form-control" placeholder="Enter " value="<?php echo isset($jobs['employer_name'])  ? $jobs['employer_name'] : ''; ?>">
                                 </div>


                                 <div class="form-group">
                                    <label>Division</label>
                                    <select class="form-control" name="jobs[industry]" id="division">
                                       <option value="">select Division</option>
                                       <?php
                                       if (isset($division) && is_array($division) && count($division) > 0) {
                                          foreach ($division as $ckey => $cvalue) {
                                             ?>
                                             <option value="<?php echo $ckey; ?>" <?php echo isset($jobs['division']) && $jobs['division'] == $ckey ? 'selected' : ''; ?>> <?php echo ucwords($cvalue); ?></option>
                                       <?php
                                          }
                                       }
                                       ?>
                                    </select>

                                 </div>



                                 <div class="form-group">
                                    <label>Designation</label>
                                    <select class="form-control" name="jobs[designation]" id="designation">
                                       <?php
                                       if (isset($designation) && is_array($designation) && count($designation) > 0) {
                                          foreach ($designation as $ckey => $cvalue) {
                                             ?>
                                             <option value="<?php echo $ckey; ?>" <?php echo isset($jobs['designation']) && $jobs['designation'] == $ckey ? 'selected' : ''; ?>><?php echo ucwords($cvalue); ?></option>
                                       <?php
                                          }
                                       }
                                       ?>
                                    </select>

                                 </div>
                                 <!-- /.card-body -->


                                 <div class="form-group">
                                    <label>Min Experience(in Years)</label>
                                    <input type="number" name="jobs[min_experience]" class="form-control" placeholder="Enter ..." value="<?php echo isset($jobs['min_experience'])  ? $jobs['min_experience'] : ''; ?>">
                                 </div>
                                 <div class="form-group">
                                    <label>Max Experience(In Years)</label>
                                    <input type="number" name="jobs[max_experience]" class="form-control" placeholder="Enter ..." value="<?php echo isset($jobs['max_experience'])  ? $jobs['max_experience'] : ''; ?>">
                                 </div>
                                 <div class="form-group">
                                    <label>Number Of Requirements</label>
                                    <input type="number" name="jobs[requirements]" class="form-control" placeholder="Enter ..." value="<?php echo isset($jobs['requirements'])  ? $jobs['requirements'] : ''; ?>">
                                 </div>
                                 <div class="form-group">
                                    <label>Job Location</label>
                                    <input type="text" name="jobs[locations]" class="form-control" placeholder="Enter ..." value="<?php echo isset($jobs['location'])  ? $jobs['location'] : ''; ?>">
                                 </div>
                                 <div class="form-group">
                                    <label>Salary [Per-Month]</label>
                                    <div class="row">
                                       <input type="text" name="jobs[salary]" class="form-control col-md-4" placeholder="Enter ..." value="<?php echo isset($jobs['salary'])  ? $jobs['salary'] : ''; ?>">
                                       &nbsp;&nbsp;&nbsp;&nbsp; <select class="form-control col-md-4" name="jobs[currency]">
                                          <option value="">Select currency</option>
                                          <?php
                                          if (isset($currency) && is_array($currency) && count($currency) > 0) {
                                             foreach ($currency as $ckey => $cvalue) {
                                                ?>
                                                <option value="<?php echo $ckey; ?>" <?php echo isset($jobs['currency_id']) && $jobs['currency_id'] == $ckey ? 'selected' : ''; ?>><?php echo $cvalue['code']; ?>(<?php echo $cvalue['symbol']; ?>)</option>
                                          <?php
                                             }
                                          }
                                          ?>
                                       </select>
                                    </div>
                                 </div>


                                 <div class="form-group">
                                    <label>Nationality</label>

                                    <select class="form-control" name="jobs[nationality]">
                                       <option value="">Select Nationality</option>
                                       <?php
                                       if (isset($countries) && is_array($countries) && count($countries) > 0) {
                                          foreach ($countries as $ckey => $cvalue) {
                                             ?>
                                             <option value="<?php echo $ckey; ?>" <?php echo isset($jobs['nationality']) && $jobs['nationality'] == $ckey ? 'selected' : ''; ?>><?php echo $cvalue; ?></option>
                                       <?php
                                          }
                                       }
                                       ?>
                                    </select>

                                 </div>

                                 <div class="form-group">
                                    <label>Job Description</label>
                                    <textarea required id="editor1" name="jobs[description]"><?php echo isset($jobs['description'])  ? $jobs['description'] : ''; ?></textarea>
                                 </div>
                                 <div class="form-group">
                                    <label>Certification Requirement</label>
                                    <input type="text" name="jobs[certification]" class="form-control" placeholder="Enter ..." value="<?php echo isset($jobs['certification'])  ? $jobs['certification'] : ''; ?>">
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
         <script src="<?php echo site_url(); ?>ckeditor/ckeditor.js"></script>
         <link rel="stylesheet" type="text/css" href="<?php echo CSS_PATH_BACKEND; ?>daterangepicker.css">
         <script type="text/javascript" src="<?php echo JS_PATH_BACKEND; ?>moment.js"></script>
         <script type="text/javascript" src="<?php echo JS_PATH_BACKEND; ?>daterangepicker.js"></script>
         <script>
            $(document).ready(function() {
               CKEDITOR.replace('editor1', {
                  filebrowserBrowseUrl: '<?php echo site_url('image_upload/sent_blog_images'); ?>',
                  filebrowserImageBrowseUrl: '<?php echo site_url('image_upload/sent_blog_images'); ?>',
                  filebrowserUploadUrl: '<?php echo site_url('image_upload/do_upload_ck_editor'); ?>',
                  filebrowserImageUploadUrl: '<?php echo site_url('image_upload/do_upload_ck_editor'); ?>'
               });


               $.validator.addMethod("lettersonly", function(value, element) {
                  return this.optional(element) || /^[^-\s][a-zA-Z,""\s]+$/i.test(value);
               });
               $.validator.addMethod("digitonly", function(value, element) {
                  return this.optional(element) || /^[^-\s][0-9,""\s]+$/i.test(value);
               });
               $.validator.addMethod("lettersdigitonly", function(value, element) {
                  return this.optional(element) || /^[^-\s][0-9,""\s]+$/i.test(value);
               });
               $("#jobs_add").validate({
                  debug: false,
                  rules: {
                     'jobs[title]': {
                        required: true,

                     },
                     'jobs[designation]': {
                        required: true
                     },
                     'jobs[nationality]': {
                        required: true
                     },
                     'jobs[description]': {
                        required: true
                     },

                     'jobs[min_experience]': {
                        required: true
                     },
                     'jobs[industry]': {
                        required: true
                     },
                     'jobs[max_experience]': {
                        required: true
                     },
                     'jobs[salary]': {
                        required: true,
                        lettersdigitonly: true
                     },
                     'jobs[locations]': {
                        required: true
                     },
                     'jobs[requirements]': {
                        required: true
                     },
                     'jobs[currency]': {
                        required: true
                     },
                  },
                  messages: {
                     'jobs[title]': {
                        required: 'Required Job Title'
                     },
                     'jobs[designation]': {
                        required: 'Required Job designation'
                     },
                     'jobs[nationality]': {
                        required: 'Required Job nationality'
                     },
                     'jobs[description]': {
                        required: 'Required Job description'
                     },

                     'jobs[experience]': {
                        required: 'Required Job experience'
                     },
                     'jobs[industry]': {
                        required: 'Required Job Division'
                     },
                  },
               });
               /**
                *call function
                */

               $(function() {
                  $("#division").change(function() {

                     get_designation_data();
                  });
               });
            });

            function get_designation_data() {
               var division_id = $('#division option:selected').val();
               $('#designation').prop('disabled', false);
               $('#designation').find('option')
                  .remove()
                  .end()
                  .append('<option value="" >Select Designation</option>')
                  .val('');

               var data_url = "<?php echo site_url('jobs/jobs_admin/get_designation'); ?>";


               jQuery.ajax({
                  url: data_url,
                  type: "POST",
                  data: {
                     division_id: division_id
                  },
                  success: function(msg) {
                     var parsed = JSON.parse(msg);
                     var mySelect = $('#designation');
                     $.each(parsed, function(key, item) {
                        mySelect.append(
                           $('<option></option>').val(key).html(item)
                        );
                     });
                  },
                  error: function() {
                     alert('Something Wrong');
                  }
               });
            }
         </script>
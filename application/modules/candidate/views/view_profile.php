 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <section class="content-header">
     <div class="container-fluid">
       <div class="row mb-2">
         <div class="col-sm-6">
           <h1>Profile</h1>
         </div>
         <div class="col-sm-6">
           <ol class="breadcrumb float-sm-right">
             <li class="breadcrumb-item"><a href="#">Home</a></li>
             <li class="breadcrumb-item active">User Profile</li>
           </ol>
         </div>
       </div>
     </div><!-- /.container-fluid -->
   </section>

   <!-- Main content -->
   <section class="content">
     <div class="container-fluid">
       <div class="row">
         <div class="col-md-3">

           <!-- Profile Image -->
           <div class="card card-primary card-outline">
             <div class="card-body box-profile">
               <div class="text-center">
                 <img class="profile-user-img img-fluid img-circle" src="<?php
                                                                          if ($candidate['profile_image'] != '') {

                                                                            echo base_url() . $candidate['profile_image'];
                                                                          } else {

                                                                            echo IMAGE_PATH_FRONTEND . 'avatar-1577909_640.png';
                                                                            //exit;
                                                                          }
                                                                          ?>" alt="User profile picture">
               </div>

               <h3 class="profile-username text-center"><?php echo isset($candidate['name']) ? $candidate['name'] : ''; ?></h3>

               <p class="text-muted text-center">
                 <?php echo isset($division['name']) ? $division['name'] : ''; ?> --
                 <?php echo isset($designation['name']) ? $designation['name'] : ''; ?></p>

             </div>
             <!-- /.card-body -->
           </div>
           <!-- /.card -->

           <!-- About Me Box -->
           <div class="card card-primary">
             <div class="card-header">
               <h3 class="card-title">About Me</h3>
             </div>
             <!-- /.card-header -->
             <div class="card-body">
               <strong><i class="fas fa-envelope mr-1"></i>Email id</strong>

               <p class="text-muted">
                 <?php echo isset($candidate['email_id']) ? $candidate['email_id'] : ''; ?>
               </p>

               <hr>

               <strong><i class="fas fa-calendar mr-1"></i>Date of birth</strong>

               <p class="text-muted"><?php echo (isset($candidate['dob']) && $candidate['dob'] != '1970-01-01') ? date('d-m-Y', strtotime($candidate['dob'])) : 'Not Mention'; ?></p>

               <hr>

               <strong><i class="fas fa-building"></i>Residential country</strong>

               <p class="text-muted"><?php echo isset($countries['name']) ? $countries['name'] : ''; ?></p>

               <hr>
               <strong><i class="fas fa-flag mr-1"></i>Nationality</strong>

               <p class="text-muted"><?php echo isset($nationality['name']) ?  $nationality['name'] : ''; ?></p>

               <hr>
               <strong><i class="fas fa-language mr-1"></i>Primary language</strong>

               <p class="text-muted"><?php echo isset($language[$candidate['primary_language']]) ? $language[$candidate['primary_language']] : ''; ?></p>

               <hr>
               <strong><i class="fas fa-language mr-1"></i>language Known</strong>
               <?php
                if (isset($candidate_lang) && is_array($candidate_lang) && count($candidate_lang) > 0) {
                  foreach ($candidate_lang as $qkey => $qvalue) {
                    ?>
                   <p class="text-muted"><?php echo isset($candidate['name']) ? $language[$candidate_lang[$qvalue]] : ''; ?></p>
               <?php }
                } ?>
               <hr>

               <strong><i class="fas fa-mobile  mr-1"></i>Mobile number</strong>

               <p class="text-muted">
                 <?php echo isset($candidate['mobile_number_country_code']) ? $candidate['mobile_number_country_code'] : " "; ?>
                 <?php echo isset($candidate['mobile_number']) ? $candidate['mobile_number'] : " "; ?></p>


               <hr>
               <strong><i class="fa fa-skype mr-1"></i>Skype id</strong>
               <p class="text-muted">
                 <?php echo isset($candidate['skype_id']) ? $candidate['skype_id'] : " "; ?>
               </p>
               <hr>
               <strong><i class="fas fa-address-card mr-1"></i>Address</strong>

               <p class="text-muted"><?php echo isset($candidate['address']) ? $candidate['address'] : " "; ?></p>

               <hr>
               <strong><i class="fas fa-city mr-1"></i>City</strong>

               <p class="text-muted"><?php echo isset($cities['name']) ? $cities['name'] : " "; ?></p>

               <hr>

               <strong><i class="fas fa-city mr-1"></i>State</strong>

               <p class="text-muted"><?php echo  isset($state['name']) ? $state['name'] : " "; ?></p>

               <hr>
               <strong><i class="fas fa-file mr-1"></i>Resume title</strong>

               <p class="text-muted"><?php echo isset($candidate['resume_title']) ? $candidate['resume_title'] : " "; ?></p>

               <hr>


               <strong><i class="fas fa-envelope mr-1"></i>Notice Period</strong>
              

               <p class="text-muted"><?php echo isset($candidate['notice_period']) ? $candidate['notice_period'] : "Not Define"; ?></p>
               <hr>

               <strong><i class="fa fa-money mr-1"></i>Current Salary </strong>
               <p class="text-muted"><?php echo (isset($candidate['current_salary']) && $candidate['current_salary'] != 0) ? $candidate['current_salary'] : 'NA'; ?></p>
               <hr>

               <strong><i class="fas fa-city mr-1"></i>Expected Salary</strong>
               <p class="text-muted"><?php echo (isset($candidate['expected_salary']) && $candidate['expected_salary'] != 0) ? $candidate['expected_salary'] : 'NA'; ?></p>
               <hr>


               <strong><i class="fas fa-pencil-alt mr-1"></i>Pin Code</strong>

               <p class="text-muted"><?php echo isset($candidate['pin_code']) ? $candidate['pin_code'] : " "; ?></p>
               <hr>
               <strong><i class="fas fa-pencil-alt mr-1"></i>is authorized</strong>

               <p class="text-muted"><?php

                                      if ($candidate['is_authorized'] == 1) {
                                        echo 'Yes';
                                      } else {
                                        echo 'No';
                                      } ?></p>


             </div>
             <!-- /.card-body -->
           </div>
           <!-- /.card -->
         </div>
         <!-- /.col -->
         <div class="col-md-9">
           <div class="card">
             <div class="card-header p-2">
               <ul class="nav nav-pills">
                 <li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab">Education qualification</a></li>
                 <li class="nav-item"><a class="nav-link" href="#timeline" data-toggle="tab">Career summary</a></li>
                 <li class="nav-item"><a class="nav-link" href="#course" data-toggle="tab">certificate summary</a></li>

               </ul>
             </div><!-- /.card-header -->
             <div class="card-body">
               <div class="tab-content">
                 <div class="active tab-pane" id="activity">
                   <div class="container">
                     <div class="row">
                       <div class="col-sm-12">
                         <div class="card">

                           <!-- /.card-header -->

                           <div class="card-body table-responsive p-0">
                             <table class="table table-hover">
                               <thead>
                                 <tr>
                                   <th>Qualification</th>
                                   <th>University</th>
                                   <th>Passing year</th>
                                   <th>Country</th>

                                 </tr>
                               </thead>
                               <tbody>
                                 <?php
                                  if (isset($qualification) && is_array($qualification) && count($qualification) > 0) {
                                    foreach ($qualification as $qkey => $qvalue) {
                                      ?>
                                     <tr>
                                       <td><?php echo isset($edu_course[$qvalue['qualification']]) ? $edu_course[$qvalue['qualification']] : " "; ?></td>
                                       <td><?php echo isset($qvalue['university']) ? $qvalue['university'] : " "; ?></td>

                                       <td><?php echo isset($qvalue['passing_year']) ? $qvalue['passing_year'] : " "; ?></td>
                                       <td><?php echo isset($edu_country[$qvalue['country']]) ? $edu_country[$qvalue['country']] : " "; ?></td>

                                     </tr>
                                 <?php }
                                  } ?>

                               </tbody>
                             </table>
                           </div>
                           <!-- /.card-body -->

                           <div class="card-footer">
                             <div class="row">
                               <div class="col-sm-6">
                                 <h3 class="card-title"></h3>
                               </div>


                             </div>
                           </div>
                           <!-- /.card -->
                         </div>
                       </div>
                     </div>
                   </div>
                 </div>
                 <!-- /.tab-pane -->
                 <div class="tab-pane" id="timeline">
                   <div class="container">
                     <div class="row">
                       <div class="col-sm-12">
                         <div class="card">

                           <!-- /.card-header -->

                           <div class="card-body table-responsive p-0">
                             <table class="table table-hover">
                               <thead>



                                 <tr>
                                   <th>Position</th>
                                   <th>Employer</th>
                                   <th>Country</th>
                                   <th>FromDate</th>
                                   <th>ToDate</th>


                                 </tr>
                               </thead>
                               <tbody>
                                 <?php
                                  if (isset($career) && is_array($career) && count($career) > 0) {
                                    foreach ($career as $qkey => $qvalue) {
                                      ?>
                                     <tr>
                                       <td><?php echo isset($qvalue['position']) ? $qvalue['position'] : " "; ?></td>
                                       <td><?php echo  isset($qvalue['till_date']) && $qvalue['till_date'] == 1 ? "In Reputed Company" : $qvalue['employer'];?></td>
                                       <td><?php echo isset($edu_country[$qvalue['country']]) ? $edu_country[$qvalue['country']] : " "; ?></td>
                                       <td><?php echo isset($qvalue['from_date']) ? $qvalue['from_date'] : " "; ?></td>

                                       <td><?php echo isset($qvalue['to_date']) ? $qvalue['to_date'] : " "; ?></td>

                                     </tr>
                                 <?php }
                                  } ?>

                               </tbody>
                             </table>
                           </div>
                           <!-- /.card-body -->

                           <div class="card-footer">
                             <div class="row">
                               <div class="col-sm-6">
                                 <h3 class="card-title"></h3>
                               </div>


                             </div>
                           </div>
                           <!-- /.card -->
                         </div>

                       </div>
                     </div>
                   </div>

                 </div>
                 <!-- /.tab-pane -->
                 <div class="tab-pane" id="course">
                   <div class="container">
                     <div class="row">
                       <div class="col-sm-12">
                         <div class="card">

                           <!-- /.card-header -->

                           <div class="card-body table-responsive p-0">
                             <table class="table table-hover">
                               <thead>



                                 <tr>
                                   <th>Name of Course</th>
                                   <th>Course Date</th>
                                   <th>valid Date</th>
                                   <th>Organization</th>

                                 </tr>
                               </thead>
                               <tbody>
                                 <?php
                                  if (isset($certificate) && is_array($certificate) && count($certificate) > 0) {
                                    foreach ($certificate as $qkey => $qvalue) {
                                      ?>
                                     <tr>
                                       <td><?php echo isset($qvalue['course']) ? $qvalue['course'] : " "; ?></td>
                                       <td><?php echo isset($qvalue['course_date']) ? date('d-m-y', strtotime($qvalue['course_date'])) : " "; ?></td>
                                       <td><?php echo isset($qvalue['valid_date']) ? date('d-m-y', strtotime($qvalue['valid_date'])) : " "; ?></td>
                                       <td><?php echo isset($qvalue['organization']) ? $qvalue['organization'] : " "; ?></td>

                                     </tr>
                                 <?php }
                                  } ?>

                               </tbody>
                             </table>
                           </div>
                           <!-- /.card-body -->

                           <div class="card-footer">
                             <div class="row">
                               <div class="col-sm-6">
                                 <h3 class="card-title"></h3>
                               </div>


                             </div>
                           </div>
                           <!-- /.card -->
                         </div>

                       </div>
                     </div>
                   </div>

                 </div>

                 <!-- /.tab-pane -->
               </div>
               <!-- /.tab-content -->
             </div><!-- /.card-body -->
           </div>
           additional info: <?php echo $candidate['additional_info']; ?><br>
           additional skill: <?php echo $candidate['additional_skill']; ?>
                      <!-- /.nav-tabs-custom -->
         </div>
         <!-- /.col -->
       </div>
       <!-- /.row -->
     </div><!-- /.container-fluid -->
   </section>
   <!-- /.content -->
 </div>
 
 <!-- /.content-wrapper -->
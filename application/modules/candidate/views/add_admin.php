         <!-- Content Wrapper. Contains page content -->
         <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
               <div class="container-fluid">
                  <div class="row mb-2">
                     <div class="col-sm-12">
                        
                        <h1><?php if ($mode == "update"){ 
                           echo "Update candidate"; } else {
                           echo "Add New Candidate";
                        }
                        ?> </h1>
                     </div>
                  </div>
               </div>
               <!-- /.container-fluid -->
            </section>
            <!-- Main content -->
            <section class="content">
               <form id="candidate_add" enctype="multipart/form-data" method="post" action="<?php echo isset($mode) && $mode == 'update' ? site_url('candidate/candidate_admin/update') : site_url('candidate/candidate_admin/set_candidate'); ?>">
<input type="hidden" name="till_date_id" class="till_date_id" value="">
                  <div class="container-fluid">
                     <!-- /.row -->
                     <div class="row">
                        <div class="col-md-6 col-lg-6 col-sm-6 col-sm-12">
                           <!-- general form elements -->
                           <div class="card card-primary">
                              <div class="card-header">
                                 <h3 class="card-title">Basic Information</h3>
                              </div>
                              <!-- /.card-header -->
                              <!-- form start -->
                              <div class="card-body">
                                 <div class="form-group">
                                    <label>Name</label>
                                    <input type="hidden" name="candidate_id" value="<?php echo isset($candidate['id'])  ? $candidate['id'] : ''; ?>">
                                    <input type="hidden" name="user_id" value="<?php echo isset($candidate['user_id'])  ?$candidate['user_id'] : ''; ?>">
                                    <input type="text" name="candidate[name]" class="form-control" placeholder="Enter Name" value="<?php echo isset($candidate['name'])  ? $candidate['name'] : ''; ?>">
                                 </div>
                                 <div class="form-group">
                                    <label>Email id</label>
                                    <input type="email" name="candidate[email_id]" class="form-control" placeholder="Enter ..." value="<?php echo isset($candidate['email_id'])  ? $candidate['email_id'] : ''; ?>">
                                 </div>
                                 <?php if($mode=='update'){?>
                                 <h5>Update Password</h5>
                                 <input type="checkbox" value='1' class="update_password" >
                                 <div class='mcq_div' style="display:none">
                                 <div class="form-group">
                                    <label>Password</label>
                                    <input type="password" name="user[password]" class="form-control" id="pwd" placeholder="Enter ...">
                                 </div>
                                 <div class="form-group">
                                    <label>Same-Password</label>
                                    <input type="password" name="user[samepassword]" id="pwd" class="form-control" placeholder="Enter ...">
                                 </div>
      </div>
      <?php }else {?>  <div class="form-group">
                                    <label>Password</label>
                                    <input type="password" name="user[password]" class="form-control" id="pwd" placeholder="Enter ...">
                                 </div>
                                 <div class="form-group">
                                    <label>Same-Password</label>
                                    <input type="password" class="form-control" name="user[samepassword]" id="pwd"  placeholder="Enter ...">
                                 </div>
      <?php } ?>

                                 <div class="form-group">
                                    <label>Date of birth</label>
                                    <input type="text" name="candidate[dob]" readonly class="form-control  datepicker" autocomplete="off" placeholder="Enter ..." value="<?php echo isset($candidate['dob'])  ? date('d-m-Y', strtotime($candidate['dob'])) : ''; ?>">
                                 </div>
                                 <div class="form-group">
                                    <label for="exampleInputFile">Image</label>
                                    <div class="input-group">
                                       <div class="custom-file">
                                          <input type="file" name="profile_image">
                                       </div>

                                    </div>
                                 </div>
                                 <div class="form-group">
                                    <label>Resume Title(Position)</label>
                                    <input type="text" name="candidate[resume_title]" class="form-control" placeholder="Enter ..." value="<?php echo isset($candidate['resume_title'])  ? $candidate['resume_title'] : ''; ?>">
                                 </div>
                                 <div class="form-group">
                                    <label for="exampleInputFile">Resume</label>
                                    <div class="input-group">
                                       <div class="custom-file">
                                          <input type="file" name="resume">
                                       </div>

                                    </div>
                                 </div>
                                 <div class="form-group">
                                    <label for="exampleInputFile">Notice Period(Days)</label>
                                    <div class="input-group">
                                       <div class="custom-file">
                                          <select class="form-control" name="candidate[notice]">
                                             <option value="">Select Notice period</option>
                                             <?php $notice_period = $this->config->item('notice_period');
                                             for ($i = 0; $i <= $notice_period; $i++) { ?>
                                                <option value="<?php echo $i; ?>"<?php echo isset($candidate['notice_period']) && $candidate['notice_period'] == $i ? 'selected' : ''; ?>><?php echo $i; ?> </option>
                                             <?php } ?>
                                          </select>
                                       </div>

                                    </div>
                                 </div>
                                 <div class="form-group">
                                    <label for="exampleInputFile">Current Salary (Per month)</label>
                                    <div class="input-group">
                                       <div class="custom-file">
                                       <input type="text" name="candidate[current_salary]" class="form-control" placeholder="Enter ..." value="<?php echo isset($candidate['current_salary'])  ? $candidate['current_salary'] : ''; ?>">
                                
                                       </div>

                                    </div>
                                 </div>
                                 <div class="form-group">
                                    <label for="exampleInputFile">Expected Salary(Per month)</label>
                                    <div class="input-group">
                                       <div class="custom-file">
                                       <input type="text" name="candidate[expected_salary]" class="form-control" placeholder="Enter ..." value="<?php echo isset($candidate['expected_salary'])  ? $candidate['expected_salary'] : ''; ?>">
                                
                                       </div>

                                    </div>
                                 </div>
                                 <div class="form-group">
                                    <label>Primary Language</label>
                                    <select class="form-control" name="candidate[primary]">
                                       <option value="">Select Language</option>
                                       <?php
                                       if (isset($languages) && is_array($languages) && count($languages) > 0) {
                                          foreach ($languages as $ckey => $cvalue) {
                                             ?>
                                             <option value="<?php echo $ckey; ?>" <?php echo isset($candidate['primary_language']) && $candidate['primary_language'] == $ckey ? 'selected' : ''; ?>><?php echo $cvalue; ?></option>
                                       <?php
                                          }
                                       }
                                       ?>
                                    </select>

                                 </div>

                                 <div class="form-group">
                                    <label> Secondary Language</label>
                                    <select class="form-control" name="languages[]" id="my-select" multiple="multiple">

                                       <?php
                                       if (isset($languages) && is_array($languages) && count($languages) > 0) {
                                          foreach ($languages as $ckey => $cvalue) {
                                             ?>
                                             <option value="<?php echo $ckey; ?>" <?php
                                                                                          if (isset($candidate_lang) && array_key_exists($ckey, $candidate_lang)) {
                                                                                             echo 'selected';
                                                                                          }
                                                                                          ?>> <?php echo ucwords($cvalue); ?></option>
                                       <?php
                                          }
                                       }
                                       ?>
                                    </select>

                                 </div>

                              </div>
                              <!-- /.card-body -->

                              <!-- /.card -->
                           </div>
                        </div>
                        <div class=" col-sm-6">
                           <!-- general form elements -->
                           <div class="card card-warning">
                              <div class="card-header general">
                                 <h3 class="card-title">Contact Information</h3>
                              </div>
                              <!-- /.card-header -->
                              <div class="card-body">

                                 <div class="row">

                                    <div class="col-sm-12">
                                       <div class="form-group">
                                          <label>Nationality</label>

                                          <select class="form-control nationality" name="candidate[nationality]">
                                             <option value="">Select Nationality</option>
                                             <?php
                                             if (isset($countries) && is_array($countries) && count($countries) > 0) {
                                                foreach ($countries as $ckey => $cvalue) {
                                                   ?>
                                                   <option value="<?php echo $ckey; ?>" <?php echo isset($candidate['nationality']) && $candidate['nationality'] == $ckey ? 'selected' : ''; ?>><?php echo $cvalue; ?></option>
                                             <?php
                                                }
                                             }
                                             ?>
                                          </select>

                                       </div>
                                    </div>
                                    <div class="col-sm-12">
                                       <div class="form-group">
                                          <label>Phone number</label>
                                          <input type="text" name="candidate[phone_number]" class="form-control" placeholder="Enter ..." value="<?php echo isset($candidate['phone_number']) ? $candidate['phone_number'] : ''; ?>">
                                       </div>
                                    </div>
                                    <div class="col-sm-12">
                                       <div class="form-group">
                                       
                                          <label>Mobile number</label>
                                          <div class="row">
                                          <select class="form-control col-md-2" name="candidate[phonecode]">
                                                      <option value="">Select phone code</option>
                                                      <?php
                                                            if (isset($phonecode) && is_array($phonecode) && count($phonecode) > 0) {
                                                               foreach ($phonecode as $ckey => $cvalue) {
                                                                  ?>
                                                            <option value="<?php echo $cvalue; ?>" <?php echo isset($candidate['mobile_number_country_code']) && $candidate['mobile_number_country_code'] == $cvalue ? 'selected' : ''; ?>><?php echo $cvalue; ?></option>
                                                      <?php
                                                               }
                                                            }
                                                            ?>
                                                   </select>&nbsp;&nbsp;
                                          <input type="text" name="candidate[mobile_number]" value="<?php echo isset($candidate['mobile_number']) ? $candidate['mobile_number'] : ''; ?>" class="form-control col-md-9" placeholder="Enter ...">
                                                         </div>
                                       </div>
                                    </div>
                                    <div class="col-sm-12">
                                       <div class="form-group">
                                          <label>skype id</label>
                                          <input type="text" name="candidate[skype_id]" class="form-control" value="<?php echo isset($candidate['skype_id']) ? $candidate['skype_id'] : ''; ?>" placeholder="Enter ...">
                                       </div>
                                    </div>
                                    <div class="col-sm-12">
                                       <!-- textarea -->
                                       <div class="form-group">
                                          <label>Address</label>
                                          <textarea class="form-control" name="candidate[address]" rows="3" placeholder="Enter ..."><?php echo isset($candidate['address']) ? $candidate['address'] : ''; ?></textarea>
                                       </div>
                                    </div>
                                    <div class="col-sm-12">
                                       <div class="form-group">
                                          <label>Countries</label>

                                          <select class="form-control countries" name="candidate[contries]">
                                             <option>Select Country</option>
                                             <?php
                                             if (isset($countries) && is_array($countries) && count($countries) > 0) {
                                                foreach ($countries as $ckey => $cvalue) {
                                                   ?>
                                                   <option value="<?php echo $ckey; ?>" <?php echo isset($candidate['country']) && $candidate['country'] == $ckey ? 'selected' : ''; ?>><?php echo $cvalue; ?></option>
                                             <?php
                                                }
                                             }
                                             ?>
                                          </select>

                                       </div>
                                    </div>
                                    <div class="col-sm-12">
                                       <div class="form-group">
                                          <label>State</label>
                                          <select class="form-control " name="candidate[state]" id="state">
                                             <?php
                                             if (isset($state) && is_array($state) && count($state) > 0) {
                                                foreach ($state as $ckey => $cvalue) {
                                                   ?>
                                                   <option value="<?php echo $ckey; ?>" <?php echo isset($candidate['state']) && $candidate['state'] == $ckey ? 'selected' : ''; ?>><?php echo ucwords($cvalue); ?></option>
                                             <?php
                                                }
                                             }
                                             ?>
                                          </select>

                                       </div>
                                    </div>
                                    <div class="col-sm-12">
                                       <div class="form-group">
                                          <label>City</label>
                                          <select class="form-control" name="candidate[city]" id="cities">
                                             <?php
                                             if (isset($cities) && is_array($cities) && count($cities) > 0) {
                                                foreach ($cities as $ckey => $cvalue) {
                                                   ?>
                                                   <option value="<?php echo $ckey; ?>" <?php echo isset($candidate['city']) && $candidate['city'] == $ckey ? 'selected' : ''; ?>><?php echo ucwords($cvalue); ?></option>
                                             <?php
                                                }
                                             }
                                             ?>
                                          </select>

                                       </div>
                                    </div>


                                    <div class="col-sm-12">
                                       <div class="form-group">
                                          <label>Pin Code</label>
                                          <input type="text" name="candidate[pin_code]" value="<?php echo isset($candidate['pin_code']) ? $candidate['pin_code'] : ''; ?>" class="form-control" placeholder="Enter ...">
                                       </div>
                                    </div>
                                 </div>
                                 <br><br>
                                 <!--2nd row start here-->
                              </div>
                              <!-- /.card-body -->

                           </div>
                           <!-- /.card -->
                        </div>
                        <!-- /.col-6 end here -->
                        <div class="col-md-6 col-lg-6 col-sm-6 col-sm-12">
                           <!-- general form elements -->
                           <div class="card card-primary">
                              <div class="card-header">
                                 <h3 class="card-title">Division</h3>
                              </div>
                              <!-- /.card-header -->
                              <!-- form start -->

                              <div class="card-body">

                                 <div class="col-sm-12">
                                    <div class="form-group">
                                       <label>Division</label>
                                       <select class="form-control" name="candidate[division]" id="division">
                                          <option>select Division </option>
                                          <?php
                                          if (isset($division) && is_array($division) && count($division) > 0) {
                                             foreach ($division as $ckey => $cvalue) {
                                                ?>
                                                <option value="<?php echo $ckey; ?>" <?php echo isset($candidate['division']) && $candidate['division'] == $ckey ? 'selected' : ''; ?>> <?php echo ucwords($cvalue); ?></option>
                                          <?php
                                             }
                                          }
                                          ?>
                                       </select>

                                    </div>
                                 </div>

                                 <div class="col-sm-12">
                                    <div class="form-group">
                                       <label>Designation</label>
                                       <select class="form-control" name="candidate[designation]" id="designation">
                                          <?php
                                          if (isset($designation) && is_array($designation) && count($designation) > 0) {
                                             foreach ($designation as $ckey => $cvalue) {
                                                ?>
                                                <option value="<?php echo $ckey; ?>" <?php echo isset($candidate['designation']) && $candidate['designation'] == $ckey ? 'selected' : ''; ?>><?php echo ucwords($cvalue); ?></option>
                                          <?php
                                             }
                                          }
                                          ?>
                                       </select>

                                    </div>
                                    <!-- /.card-body -->

                                 </div>
                                 <!-- /.card -->
                                 <!-- Form Element sizes -->
                                 <!-- Input addon -->
                                 <!-- /.card -->
                                 <!-- Horizontal Form -->
                              </div>
                           </div>
                        </div>
                        <div class="row">
                           <!--start 6 grid form here-->
                           <div class="col-12">
                              <div class="card card-warning">
                                 <div class="card-header general">
                                    <h3 class="card-title ">Education qualification</h3>
                                 </div>
                                 <!-- /.card-header -->
                                 <div class="card-body" id="qualification_data">

                                    <?php
                                    $q_count = 0;
                                    if (isset($qualification) && is_array($qualification) && count($qualification) > 0) {
                                       foreach ($qualification as $qkey => $qvalue) {
                                          ?>
                                          <div class="row" id="heading_row_<?php echo $qkey; ?>">

                                             <!-- text input -->
                                             <div class="col-sm-2">
                                                <div class="form-group">
                                                   <?php if ($qkey == 0) {
                                                            echo '<label>Qualification</label>';
                                                         } ?>
                                                   <select class="form-control" name="edu_qualification[]">
                                                      <option value="">Select course</option>
                                                      <?php
                                                            if (isset($course) && is_array($course) && count($course) > 0) {
                                                               foreach ($course as $ckey => $cvalue) {
                                                                  ?>
                                                            <option value="<?php echo $ckey; ?>" <?php echo isset($qvalue['qualification']) && $qvalue['qualification'] == $ckey ? 'selected' : ''; ?>><?php echo ucwords($cvalue); ?></option>
                                                      <?php
                                                               }
                                                            }
                                                            ?>
                                                   </select>

                                                </div>

                                             </div>
                                             <div class="col-sm-2">
                                                <div class="form-group">
                                                   <?php if ($qkey == 0) {
                                                            echo '<label>University</label>';
                                                         } ?>

                                                   <input type="text" class="form-control" name="edu_university[]" placeholder="Enter ..." value="<?php echo $qvalue['university']; ?>">
                                                </div>
                                             </div>
                                             <div class="col-sm-2">
                                                <div class="form-group">
                                                   <?php if ($qkey == 0) {
                                                            echo '<label>Passing year</label>';
                                                         } ?>

                                                   <select class="form-control" name="edu_year[]" id="category_data">
                                                      <option value="">Select Year</option>
                                                      <?php
                                                            if (isset($edu_years) && is_array($edu_years) && count($edu_years) > 0) {
                                                               foreach ($edu_years as $ckey => $cvalue) {
                                                                  ?>
                                                            <option value="<?php echo ($cvalue['id']); ?>" <?php echo isset($qvalue['passing_year']) && $qvalue['passing_year'] == $cvalue['id'] ? 'selected' : ''; ?>>
                                                               <?php echo ucwords($cvalue['name']); ?>
                                                            </option>
                                                      <?php
                                                               }
                                                            }
                                                            ?>
                                                   </select>
                                                </div>
                                             </div>
                                             <div class="col-sm-2">
                                                <div class="form-group">
                                                   <?php if ($qkey == 0) {
                                                            echo '<label>Country</label>';
                                                         } ?>


                                                   <select class="form-control" name="edu_country[]">
                                                      <option>Select Country</option>
                                                      <?php
                                                            if (isset($countries) && is_array($countries) && count($countries) > 0) {
                                                               foreach ($countries as $ckey => $cvalue) {
                                                                  ?>
                                                            <option value="<?php echo $ckey; ?>" <?php echo isset($qvalue['country']) && $qvalue['country'] == $ckey ? 'selected' : ''; ?>><?php echo $cvalue; ?></option>
                                                      <?php
                                                               }
                                                            }
                                                            ?>
                                                   </select>
                                                </div>
                                             </div>
                                             <div class="col-sm-3">
                                                <div class="form-group">

                                                   <?php if ($qkey == 0) {
                                                            echo '<label>Action</label>';
                                                            ?>

                                                      <button type="button" id="add_more_but" class="btn btn-block bg-gradient-primary ">Add</button>
                                                   <?php } else { ?>

                                                      <button type="button" data-value="<?php echo $qkey; ?>" class="btn btn-block bg-gradient-primary remove_field">Remove</button>

                                                   <?php } ?>
                                                </div>
                                             </div>
                                          </div>
                                       <?php $q_count++;
                                          }
                                       } else {
                                          $q_count = 0;
                                          ?>
                                       <div class="row">
                                          <div class="col-sm-2">
                                             <div class="form-group">

                                                <label>Qualification</label>

                                                <select class="form-control" name="edu_qualification[]">
                                                   <option value="">Select course</option>
                                                   <?php
                                                      if (isset($course) && is_array($course) && count($course) > 0) {
                                                         foreach ($course as $ckey => $cvalue) {
                                                            ?>
                                                         <option value="<?php echo $ckey; ?>" <?php echo isset($candidate['qualification']) && $candidate['qualification'] == $ckey ? 'selected' : ''; ?>><?php echo ucwords($cvalue); ?></option>
                                                   <?php
                                                         }
                                                      }
                                                      ?>
                                                </select>
                                             </div>
                                          </div>
                                          <div class="col-sm-2">
                                             <div class="form-group">
                                                <label>University</label>
                                                <input type="text" class="form-control" name="edu_university[]" placeholder="Enter ...">
                                             </div>
                                          </div>
                                          <div class="col-sm-2">
                                             <div class="form-group">
                                                <label>Passing year</label>
                                                <select class="form-control" name="edu_year[]" id="category_data">
                                                   <option value="">Select Year</option>
                                                   <?php
                                                      if (isset($edu_years) && is_array($edu_years) && count($edu_years) > 0) {
                                                         foreach ($edu_years as $ckey => $cvalue) {
                                                            ?>
                                                         <option value="<?php echo ($cvalue['id']); ?>">
                                                            <?php echo ucwords($cvalue['name']); ?>
                                                         </option>
                                                   <?php
                                                         }
                                                      }
                                                      ?>
                                                </select>
                                             </div>
                                          </div>
                                          <div class="col-sm-2">
                                             <div class="form-group">
                                                <label>Country</label>

                                                <select class="form-control" name="edu_country[]">
                                                   <option value="">Select Country</option>
                                                   <?php
                                                      if (isset($countries) && is_array($countries) && count($countries) > 0) {
                                                         foreach ($countries as $ckey => $cvalue) {
                                                            ?>
                                                         <option value="<?php echo $ckey; ?>"><?php echo $cvalue; ?></option>
                                                   <?php
                                                         }
                                                      }
                                                      ?>
                                                </select>
                                             </div>
                                          </div>
                                          <div class="col-sm-3">
                                             <div class="form-group">
                                                <label>Action</label>
                                                <button type="button" id="add_more_but" class="btn btn-block bg-gradient-primary ">Add</button>
                                             </div>
                                          </div>
                                       </div>
                                    <?php } ?>

                                 </div>
                              </div>
                           </div>
                           <!--col 12 end here-->
                           <!--start here career summary col-12-->
                           <div class="col-12">
                              <div class="card card-warning">
                                 <div class="card-header general">
                                    <h3 class="card-title ">Career summary </h3>
                                 </div>
                                 <!-- /.card-header -->
                                 <div class="card-body" id="career_data">
                                    <?php
                                    //echo '<pre>';
                                    //print_r($career);
                                    $c_count = 0;
                                    if (isset($career) && is_array($career) && count($career) > 0) {
                                       foreach ($career as $qkey => $qvalue) {
                                          ?>
                                          <div class="row" id="heading_career_row_<?php echo $qkey; ?>">
                                             <div class="col-sm-2">
                                                <!-- text input -->
                                                <div class="form-group">
                                                   <?php if ($qkey == 0) {
                                                            echo '<label>Position</label>';
                                                         } ?>
                                                   <input type="hidden" class="form-control" name="career_id[]" value="<?php echo $qvalue['id']; ?>">
                                                   <input type="text" class="form-control" name="career_position[]" placeholder="Enter ..." value="<?php echo $qvalue['position']; ?>">
                                                </div>
                                             </div>
                                             <div class="col-sm-2">
                                                <div class="form-group">
                                                   <?php if ($qkey == 0) {
                                                            echo '<label>Employer</label>';
                                                         } ?>
                                                   <input type="text" class="form-control" name="career_Employeer[]" placeholder="Enter ..." value="<?php echo $qvalue['employer']; ?>">
                                                </div>
                                             </div>
                                             <div class="col-sm-2">
                                                <div class="form-group">
                                                   <?php if ($qkey == 0) {
                                                            echo '<label>Country</label>';
                                                         } ?>
                                                   <select class="form-control" name="career_country[]">
                                                      <option>Select Country</option>
                                                      <?php
                                                            if (isset($countries) && is_array($countries) && count($countries) > 0) {
                                                               foreach ($countries as $ckey => $cvalue) {
                                                                  ?>
                                                            <option value="<?php echo $ckey; ?>" <?php echo isset($qvalue['country']) && $qvalue['country'] == $ckey ? 'selected' : ''; ?>><?php echo $cvalue; ?></option>
                                                      <?php
                                                               }
                                                            }
                                                            ?>
                                                   </select>
                                                </div>
                                             </div>
                                             <div class="col-sm-2">
                                                <div class="form-group">
                                                   <?php if ($qkey == 0) {
                                                            echo '<label>From Date</label>';
                                                         } ?>
                                                   <input type="text" readonly class="form-control date_picker" name="career_fromdate[]" placeholder="Enter ..." value="<?php echo $qvalue['from_date']; ?>">
                                                </div>
                                             </div>
                                             <div class="col-sm-2">
                                                <div class="form-group">
                                                   <?php if ($qkey == 0) {
                                                            echo '<label>To Date</label>';
                                                         } ?>
                                                   <input type="text" readonly class="form-control date_picker" name="career_todate[]" placeholder="Enter ..." value="<?php echo $qvalue['to_date']; ?>">
                                                </div>
                                             </div>
                                             <div class="col-sm-2">
                                                <div class="form-group">
                                                   <?php if ($qkey == 0) {
                                                            echo '<label>Till Date</label>';
                                                         } ?>
                                                   <input type="radio" class="" class="radio-btn tilldate" value="1" onclick="career_tilldate(<?php echo $qkey; ?>)" name="career_till[]" <?php echo isset($qvalue['till_date']) && $qvalue['till_date'] == 1 ? 'checked' : '';?>>
                                                
                                                </div>
                                                
                                             </div>
                                             <div class="col-sm-2">
                                                <div class="form-group">
                                                   <?php if ($qkey == 0) {
                                                            echo '<label>Action</label>';
                                                            ?>
                                                      <button type="button" id="add_more_career" class="btn btn-block bg-gradient-primary ">Add</button>
                                                   <?php } else { ?>
                                                      <button type="button" data-value="<?php echo $qkey; ?>" class="btn btn-block bg-gradient-primary remove_field">Remove</button>
                                                   <?php } ?>
                                                </div>
                                             </div>
                                          </div>
                                       <?php $c_count++;
                                          }
                                       } else { ?>
                                       <div class="row">
                                          <div class="col-sm-2">
                                             <!-- text input -->
                                             <div class="form-group">
                                                <input type="hidden" class="form-control" name="career_id[]" value="0">
                                                <label>Position</label>
                                                <input type="text" class="form-control" name="career_position[]" placeholder="Enter ...">
                                             </div>
                                          </div>
                                          <div class="col-sm-2">
                                             <div class="form-group">
                                                <label>Employer</label>
                                                <input type="text" class="form-control" name="career_Employeer[]" placeholder="Enter ...">
                                             </div>
                                          </div>
                                          <div class="col-sm-2">
                                             <div class="form-group">
                                                <label>Country</label>

                                                <select class="form-control" name="career_country[]">
                                                   <option value="">Select Country</option>
                                                   <?php
                                                      if (isset($countries) && is_array($countries) && count($countries) > 0) {
                                                         foreach ($countries as $ckey => $cvalue) {
                                                            ?>
                                                         <option value="<?php echo $ckey; ?>"><?php echo $cvalue; ?></option>
                                                   <?php
                                                         }
                                                      }
                                                      ?>
                                                </select>
                                             </div>
                                          </div>
                                          <div class="col-sm-2">
                                             <div class="form-group">
                                                <label>From Date</label>
                                                <input type="text" readonly class="form-control date_picker" name="career_fromdate[]" placeholder="Enter ...">
                                             </div>
                                          </div>
                                          <div class="col-sm-2">
                                             <div class="form-group">
                                                <label>To Date</label>
                                                <input type="text" readonly class="form-control date_picker" name="career_todate[]" placeholder="Enter ...">
                                             </div>
                                          </div>
                                          <div class="col-sm-1">
                                             <div class="form-group">
                                                <label>Till Date</label>
                                                <input type="radio" class="radio-btn tilldate" value="1" onclick="career_tilldate(0)" name="career_till[]" >
                                             </div>
                                          </div>
                                          <div class="col-sm-1">
                                             <div class="form-group">
                                                <label>Action</label>
                                                <button type="button" id="add_more_career" class="btn btn-block bg-gradient-primary ">Add</button>
                                             </div>
                                          </div>
                                       </div>

                                    <?php  } ?>

                                 </div>
                              </div>
                           </div>
                           <!--end here col-12 career summary-->

                           <div class="col-12">
                              <div class="card card-warning">
                                 <div class="card-header general">
                                    <h3 class="card-title ">Additional Certificate And Technical Qualification</h3>
                                 </div>
                                 <!-- /.card-header -->
                                 <div class="card-body" id="Course_data">
                                    <?php
                                    //echo '<pre>';
                                    //print_r($career);
                                    $co_count = 0;
                                    if (isset($certificate) && is_array($certificate) && count($certificate) > 0) {
                                       foreach ($certificate as $qkey => $qvalue) {
                                          ?>
                                          <div class="row" id="heading_course_row_<?php echo $qkey; ?>">
                                             <div class="col-sm-2">
                                                <!-- text input -->
                                                <div class="form-group">
                                                   <?php if ($qkey == 0) {
                                                            echo '<label>Name of the Course</label>';
                                                         } ?>
                                                   <input type="hidden" class="form-control" name="course_id[]" value="<?php echo $qvalue['id']; ?>">
                                                   <input type="text" class="form-control" name="course_name[]" placeholder="Enter ..." value="<?php echo $qvalue['course']; ?>">
                                                </div>
                                             </div>
                                             <div class="col-sm-2">
                                                <div class="form-group">
                                                   <?php if ($qkey == 0) {
                                                            echo '<label>Course Date</label>';
                                                         } ?>
                                                   <input type="text" class="form-control" name="course_date[]" placeholder="Enter ..." value="<?php echo date('d-m-Y',strtotime($qvalue['course_date'])); ?>">
                                                </div>
                                             </div>
                                             <div class="col-sm-2">
                                                <div class="form-group">
                                                   <?php if ($qkey == 0) {
                                                            echo '<label>Valid Upto</label>';
                                                         } ?>
                                                     <input type="text" class="form-control" name="valid_date[]" placeholder="Enter ..." value="<?php echo date('d-m-Y',strtotime($qvalue['valid_date'])); ?>">
                                               
                                                </div>
                                             </div>
                                             <div class="col-sm-2">
                                                <div class="form-group">
                                                   <?php if ($qkey == 0) {
                                                            echo '<label>Organisation</label>';
                                                         } ?>
                                                   <input type="text" class="form-control" name="organization[]" placeholder="Enter ..." value="<?php echo $qvalue['organization']; ?>">
                                                </div>
                                             </div>
                                             <div class="col-sm-3">
                                                <div class="form-group">
                                                   <?php if ($qkey == 0) {
                                                            echo '<label>Action</label>';
                                                            ?>
                                                      <button type="button" id="add_more_course" class="btn btn-block bg-gradient-primary ">Add</button>
                                                   <?php } else { ?>
                                                      <button type="button" data-value="<?php echo $qkey; ?>" class="btn btn-block bg-gradient-primary remove_field">Remove</button>
                                                   <?php } ?>
                                                </div>
                                             </div>
                                          </div>
                                       <?php $co_count++;
                                          }
                                       } else { ?>
                                       <div class="row">
                                          <div class="col-sm-2">
                                             <!-- text input -->
                                             <div class="form-group">
                                                <input type="hidden" class="form-control" name="course_id[]" value="0">
                                                <label>Name of the Course</label>
                                                <input type="text" class="form-control" name="course_name[]" placeholder="Enter ...">
                                             </div>
                                          </div>
                                          <div class="col-sm-2">
                                             <div class="form-group">
                                                <label>Course Date</label>
                                                <input type="text" class="form-control datepicker" readonly name="course_date[]" autocomplete="off"  placeholder="Enter ...">
                                             </div>
                                          </div>
                                          <div class="col-sm-2">
                                             <div class="form-group">
                                                <label>Valid Upto</label>

                                                <input type="text" class="form-control datepicker" readonly  name="valid_date[]" autocomplete="off" placeholder="Enter ...">

                                             </div>
                                          </div>
                                          <div class="col-sm-2">
                                             <div class="form-group">
                                                <label>Organisation</label>
                                                <input type="text" class="form-control" name="organization[]" placeholder="Enter ...">
                                             </div>
                                          </div>
                                          <div class="col-sm-3">
                                             <div class="form-group">
                                                <label>Action</label>
                                                <button type="button" id="add_more_course" class="btn btn-block bg-gradient-primary ">Add</button>
                                             </div>
                                          </div>
                                       </div>

                                    <?php  } ?>

                                 </div>
                              </div>
                           </div>
                           <!--end here col-12 career summary-->
                           <div class="col-md-6 col-lg-6 col-sm-6 col-sm-12">
                              <!-- general form elements -->
                              <div class="card card-primary">
                                 <div class="card-header">
                                    <h3 class="card-title">Additional Skills</h3>
                                 </div>
                                 <!-- /.card-header -->
                                 <!-- form start -->

                                 <div class="card-body">
                                    <textarea required id="editor1" name="candidate[additional_skill]"><?php echo isset($candidate['additional_skill']) ? $candidate['additional_skill'] : ''; ?></textarea>
                                 </div>
                              </div>
                           </div>
                           <div class="col-md-6 col-lg-6 col-sm-6 col-sm-12">
                              <!-- general form elements -->
                              <div class="card card-primary">
                                 <div class="card-header">
                                    <h3 class="card-title">Additional Information </h3>
                                 </div>
                                 <!-- /.card-header -->
                                 <!-- form start -->

                                 <div class="card-body">
                                    <textarea required id="editor2" name="candidate[additional_info]"><?php echo isset($candidate['additional_info']) ? $candidate['additional_info'] : ''; ?></textarea>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div>
                           <?php if($mode == "update"){ ?>
                           Authorised ? : <input type="checkbox" name="candidate[is_authorized]" value="1" <?php echo isset($candidate['is_authorized']) && $candidate['is_authorized'] == 1 ? 'checked' : "" ; ?>>
                           <?php } else{ ?>
                              Authorised ? : <input type="checkbox" name="candidate[is_authorized]" value="1" checked
                          
                           <?php } ?>
                           <strong>Note:</strong> If you uncheck this your CV will not be display anywhere.
                        </div>
                     </div>
                     <!--2nd row end here-->
                     <center>
                        <button type="submit" class="btn btn-primary" style="margin:2px 0px 24px 0px;">Submit</button>
                     </center>
                     <!-- /.container-fluid -->
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
         <link rel="stylesheet" type="text/css" href="<?php echo CSS_PATH_BACKEND; ?>jquery.multiselect.css">
         <script type="text/javascript" src="<?php echo JS_PATH_BACKEND; ?>jquery.multiselect.js"></script>
         <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/datepicker/0.6.5/datepicker.css">
         <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/datepicker/0.6.5/datepicker.js"></script>

         <script>

        function career_tilldate(rowid)
{
   $('.till_date_id').val(rowid);
}            var productDivCount = '<?php echo $q_count + 1; ?>';
            var careerDivCount = '<?php echo $c_count + 1; ?>';
            var courseDivCount = '<?php echo $co_count + 1; ?>';
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
                url: "<?php echo base_url('candidate/candidate_admin/check_email_register'); ?>",
                type: "POST",
                async: false,
                data: {
                    email_id: value,
                    mode:'<?php echo $mode;?>',
                    id:'<?php echo isset($candidate['user_id'])?$candidate['user_id']:''; ?>'
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
               CKEDITOR.replace('editor1', {
                  filebrowserBrowseUrl: '<?php echo site_url('image_upload/sent_blog_images'); ?>',
                  filebrowserImageBrowseUrl: '<?php echo site_url('image_upload/sent_blog_images'); ?>',
                  filebrowserUploadUrl: '<?php echo site_url('image_upload/do_upload_ck_editor'); ?>',
                  filebrowserImageUploadUrl: '<?php echo site_url('image_upload/do_upload_ck_editor'); ?>'
               });
               CKEDITOR.replace('editor2', {
                  filebrowserBrowseUrl: '<?php echo site_url('image_upload/sent_blog_images'); ?>',
                  filebrowserImageBrowseUrl: '<?php echo site_url('image_upload/sent_blog_images'); ?>',
                  filebrowserUploadUrl: '<?php echo site_url('image_upload/do_upload_ck_editor'); ?>',
                  filebrowserImageUploadUrl: '<?php echo site_url('image_upload/do_upload_ck_editor'); ?>'
               });
               $('#my-select').multiselect();
               $('.datepicker').datepicker({
                  
                  locale: {
                     format: 'DD-MM-YYYY'
                  }
               });
               $('.date_picker').datepicker({

                  format: "mm/yyyy",
                  startView: "year",
                  minViewMode: "months"

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
              
               $("#candidate_add").validate({
                  debug: false,
                  rules: {
                     'candidate[name]': {
                        required: true
                     },
                     'candidate[email_id]': {
                        required: true,
                        check_email:true
                     },
                     'candidate[dob]': {
                        required: true
                     },
                     'candidate[residential_country]': {
                        required: true
                     },
                     'candidate[state]': {
                        required: true
                     },
                     'candidate[country]': {
                        required: true
                     },
                     'candidate[nationality]': {
                        required: true
                     },
                     'candidate[phone_number]': {
                        required: true,
                        minlength:6,
                        digitonly:true
                     },
                     'candidate[mobile_number]': {
                        required: true,
                        minlength:8,
                        digitonly:true
                     },
                     'candidate[address]': {
                        required: true
                     },
                     'candidate[city]': {
                        required: true
                     },
                     
                     'candidate[pin_code]': {
                        required: true,
                        digitonly:true,
                        minlength:6,
                        maxlength:6
                     
                     },
                     'candidate[division]': {
                        required: true
                     },
                     'candidate[designation]': {
                        required: true
                     },
                     'user[password]': {
                        required: true
                     },
                     'user[samepassword]':{
                        equalTo: "#pwd"
                     },
                     'candidate[primary]': {
                        required: true
                     },
                     'edu_qualification[]': {
                        required: true
                     },
                     'candidate[current_salary]':{
                        required:true,
                        lettersdigitonly:true
                     },
                     'candidate[expected_salary]':{
                        required:true,
                        lettersdigitonly:true
                     },
                     'edu_country[]': {
                        required: true
                     },
                     'edu_university[]': {
                        required: true
                     },
                     'edu_year[]': {
                        required: true
                     },
                     
        

                  },
                  messages: {
                     'candidate[name]': {
                        required: 'Required name'
                     },
                     'candidate[email_id]': {
                        required: 'Required email',
                        check_email:'Email id already registered.Please login. '
                     },
                     'candidate[dob]': {
                        required: 'Required dob'
                     },

                     'candidate[state]': {
                        required: 'Required status'
                     },
                     'candidate[country]': {
                        required: 'Required country'
                     },

                     'candidate[phone_number]': {
                        required: 'Required phone number',
                        minlength:"Enter Atlest 6 digit",
                        digitonly:"please enter digits only"
                     },
                     'candidate[mobile_number]': {
                        required: 'Required mobile number',
                        minlength:"Enter Atlest 8 digit",
                        digitonly:"please enter digits only"
                     },
                     'candidate[address]': {
                        required: 'Required address'
                     },
                     'candidate[city]': {
                        required: 'Required city'
                     },
                     'candidate[current_salary]':{
                     
                     lettersdigitonly:'You Can only use , in salary field'
                  },
                     'candidate[expected_salary]':{
                     
                        lettersdigitonly:'You Can only use , in salary field'
                     },
                     'candidate[pin_code]': {
                        required: 'Required pin code',
                        digitonly:"please enter digits only",
                        minlength:"Enter valid pincode",
                        maxlength:"Enter valid pincode"
                     },
                     'candidate[division]': {
                        required: 'Required divison'
                     },

                     'user[password]': {
                        required: 'Required password'
                     },
                  },
               });
               /**
                *call function
                */
               $(function() {
                  $(".countries").change(function() {
                     get_state_data();
                  });
               });
               $(function() {
                  $("#state").change(function() {

                     get_cities_data();
                  });
               });
               $(function() {
                  $("#division").change(function() {

                     get_designation_data();
                  });
               });
               $(document).on('click', '#add_more_but', function() {
                  var divToAppend = '<div class="row" id="heading_row_' + productDivCount + '"><div class="col-sm-2"><div class="form-group">';
                  divToAppend += '<input type="hidden" class="form-control" name="edu_id[]"  value="0">';
                  divToAppend += ' <select class="form-control" name="edu_qualification[]"><option value="">Select course</option>';
                  <?php
                  if (isset($course) && is_array($course) && count($course) > 0) {
                     foreach ($course as $ckey => $cvalue) {
                        ?>
                        divToAppend += '<option value="<?php echo $ckey; ?>" <?php echo isset($candidate['qualification']) && $candidate['qualification'] == $ckey ? 'selected' : ''; ?>><?php echo ucwords($cvalue); ?></option>';
                  <?php
                     }
                  }
                  ?>
                  divToAppend += ' </select></div></div>';
                  divToAppend += ' <div class="col-sm-2"> <div class="form-group"> <input type="text"  name="edu_university[]" class="form-control" required  placeholder="Enter ..."> </div> </div>';
                  divToAppend += ' <div class="col-sm-2"> <div class="form-group"><select class="form-control" name="edu_year[]"id="category_data" required > <option value="">Select Year</option>';
                  <?php
                  if (isset($edu_years) && is_array($edu_years) && count($edu_years) > 0) {
                     foreach ($edu_years as $ckey => $cvalue) {
                        ?>
                        divToAppend += ' <option value="<?php echo ($cvalue['id']); ?>"><?php echo ucwords($cvalue['name']); ?></option>';
                  <?php
                     }
                  }
                  ?>
                  divToAppend += '</select></div></div>';
                  divToAppend += ' <div class="col-sm-2"> <div class="form-group"><select class="form-control" required  name="edu_country[]"><option>Select Country</option>';
                  <?php
                  if (isset($countries) && is_array($countries) && count($countries) > 0) {
                     foreach ($countries as $ckey => $cvalue) {
                        ?>
                        divToAppend += '<option value="<?php echo $ckey; ?>"><?php echo $cvalue; ?></option>';
                  <?php
                     }
                  }
                  ?>
                  divToAppend += '</select></div></div>';
                  divToAppend += '<div class="col-sm-3"><div class="form-group"><button type="button" data-value="' + productDivCount + '"  class="btn btn-block bg-gradient-primary remove_field">Remove</button></div></div></div>';

                  $("#qualification_data").append(divToAppend);
                  $("#candidate_add").validate();
                  productDivCount = parseInt(productDivCount) + 1;
               });
               $("#qualification_data").on("click", ".remove_field", function(e) {
                  var row_id = $(this).attr('data-value');
                  $('#heading_row_' + row_id).remove();
               });
               $(document).on('click', '#add_more_career', function() {
                  var divToAppend = '<div class="row" id="heading_career_row_' + careerDivCount + '"><div class="col-sm-2"><div class="form-group"><input type="text" class="form-control" name="career_position[]" placeholder="Enter ..."></div></div>';
                  divToAppend += '<div class="col-sm-2"><div class="form-group"><input type="hidden" class="form-control" name="career_id[]"  value="0"><input type="text" class="form-control" name="career_Employeer[]" placeholder="Enter ..."></div></div>';
                  divToAppend += '<div class="col-sm-2"><div class="form-group"><select class="form-control " name="career_country[]"><option>Select Country</option>';
                  <?php
                  if (isset($countries) && is_array($countries) && count($countries) > 0) {
                     foreach ($countries as $ckey => $cvalue) {
                        ?>
                        divToAppend += '<option value="<?php echo $ckey; ?>"><?php echo $cvalue; ?></option>';
                  <?php
                     }
                  }
                  ?>
                  divToAppend += ' </select></div></div>';
                  divToAppend += '<div class="col-sm-2"><div class="form-group"><input type="text" class="form-control date_picker" name="career_fromdate[]" readonly placeholder="Enter ..."></div></div>';

                  divToAppend += '<div class="col-sm-2"><div class="form-group"><input type="text" class="form-control date_picker" name="career_todate[]" readonly placeholder="Enter ..."></div></div>';
                  divToAppend += '<div class="col-sm-1"><div class="form-group"><input type="radio" class="radio-btn tilldate" value="1" name="career_till[]" data-val="'+careerDivCount+'" onclick="career_tilldate('+careerDivCount+')"></div></div>';
                  divToAppend += '<div class="col-sm-1.5"><div class="form-group"><button type="button" data-value="' + careerDivCount + '"  class="btn btn-block bg-gradient-primary remove_field">Remove</button></div></div></div>';

                  $("#career_data").append(divToAppend);

                  $('.date_picker').datepicker({

                     format: "mm/yyyy",
                     startView: "year",
                     minViewMode: "months"

                  });
                
                  careerDivCount = parseInt(careerDivCount) + 1;


               });
               $("#career_data").on("click", ".remove_field", function(e) {
                  var row_id = $(this).attr('data-value');
                  $('#heading_career_row_' + row_id).remove();
               });

               $(document).on('click', '#add_more_course', function() {
                  var divToAppend = '<div class="row" id="heading_course_row_' + courseDivCount + '"><div class="col-sm-2"><div class="form-group"><input type="text" class="form-control" name="course_name[]" placeholder="Enter ..."></div></div>';
                  divToAppend += '<div class="col-sm-2"><div class="form-group"><input type="hidden" class="form-control" name="course_id[]"  value="0"><input type="text" class="form-control datepicker" readonly name="course_date[]" placeholder="Enter ..."></div></div>';

                  divToAppend += '<div class="col-sm-2"><div class="form-group"><input type="text" class="form-control datepicker" name="valid_date[]" readonly placeholder="Enter ..."></div></div>';
                  divToAppend += '<div class="col-sm-2"><div class="form-group"><input type="text" class="form-control" name="organisation[]" placeholder="Enter ..."></div></div>';
                  divToAppend += '<div class="col-sm-3"><div class="form-group"><button type="button" data-value="' + courseDivCount + '"  class="btn btn-block bg-gradient-primary remove_field">Remove</button></div></div></div>';

                  $("#Course_data").append(divToAppend);
                  $('.datepicker').datepicker({
                     
                     locale: {
                        format: 'DD-MM-YYYY'
                     }
                  });
                  courseDivCount = parseInt(courseDivCount) + 1;


               });
               $("#Course_data").on("click", ".remove_field", function(e) {
                  var row_id = $(this).attr('data-value');
                  $('#heading_course_row_' + row_id).remove();
               });
            });
         </script>

         <script>
            /**
             * get state data
             */
            function get_state_data() {
               var countries_id = $('.countries option:selected').val();
               $('#state').prop('disabled', false);
               $('#state').find('option')
                  .remove()
                  .end()
                  .append('<option value="" >Select State</option>')
                  .val('');

               var data_url = "<?php echo site_url('candidate/candidate_admin/get_state'); ?>";


               jQuery.ajax({
                  url: data_url,
                  type: "POST",
                  data: {
                     countries_id: countries_id
                  },
                  success: function(msg) {
                     var parsed = JSON.parse(msg);
                     var mySelect = $('#state');
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

            function get_cities_data() {
               var state_id = $('#state option:selected').val();
               $('#cities').prop('disabled', false);
               $('#cities').find('option')
                  .remove()
                  .end()
                  .append('<option value="" >Select City</option>')
                  .val('');

               var data_url = "<?php echo site_url('candidate/candidate_admin/get_cities'); ?>";


               jQuery.ajax({
                  url: data_url,
                  type: "POST",
                  data: {
                     state_id: state_id
                  },
                  success: function(msg) {
                     var parsed = JSON.parse(msg);
                     var mySelect = $('#cities');
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

            function get_designation_data() {
               var division_id = $('#division option:selected').val();
               $('#designation').prop('disabled', false);
               $('#designation').find('option')
                  .remove()
                  .end()
                  .append('<option value="" >Select Designation</option>')
                  .val('');

               var data_url = "<?php echo site_url('candidate/candidate_admin/get_designation'); ?>";


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
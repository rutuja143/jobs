<?php $get = $this->input->get(); ?>
<div id="apus-main-content">
   <section id="apus-breadscrumb" class="breadcrumb-page apus-breadscrumb has_img" style="background-image:url('http://testbed.ogcrm.com/falcon/wp-content/uploads/2017/12/bg-jobs.jpg')">
      <div class="container">
         <div class="wrapper-breads">
            <div class="wrapper-breads-inner">
               <h3 class="bread-title"><?php echo $jobs['title']; ?></h3>
               <div class="breadscrumb-inner">
                  <ol class="breadcrumb">
                     <li><a href="<?php echo site_url(); ?>">Home</a> </li>
                     <li><a href="<?php echo site_url('jobs/job_list?div=' . $industry['id']); ?>"><?php echo $industry['name']; ?></a></li>
                     <li><a href="<?php echo site_url('jobs/job_list?div=' . $industry['id'] . '&desi=' . $designation['id']); ?>"><?php echo $designation['name']; ?></a></li>
                     <li><span class="active"><?php echo $jobs['title']; ?></span></li>
                  </ol>
               </div>
            </div>
         </div>
      </div>
   </section>
   <section id="main-container" class="main-content container inner">
      <div id="main-content">
         <main id="main" class="site-main layout-blog" role="main">
            <div class="row">
               <div class="col-sm-12 col-md-8 col-sm-12 col-xs-12 ">
                  <div class="single_job_listing">
                     <div class="job-content-wrapper">
                        <div id="job-description" class="job-description widget">
                           <h3 class="widget-title"><span>Description</span></h3>
                           <div class="box-inner">
                              <div class="wrapper-content"><?php echo $jobs['description']; ?></div>
                              
                              <div class="wrapper-content">
                                 <h3 class="widget-title">Certification Requirement</h3>
                                 <ul class="list-second">
                                    <?php echo $jobs['certification']; ?>
                                 </ul>
                              </div>
                              <div class="wrapper-content">
                                 <h3 class="widget-title">How To Apply</h3>
                                 <p>(For more details, feel free to contact us at <a href="mailto:hr6@falconmsl.com">hr6@falconmsl.com</a> or <a href="<?php echo site_url('contact-us'); ?>">click here)</a></p>
                              </div>
                           </div>
                        </div>
                        <div id="job-location" class="job-location widget">
                           <h3 class="widget-title"><span>Location : <?php echo $jobs['location']; ?></span></h3>
                           <div class="box-inner">
                              <div id="apus-single-listing-map" class="apus-google-map">
                                 <iframe width="640" height="380" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.it/maps?q=<?php echo $jobs['location']; ?>&output=embed"></iframe>
                              </div>
                           </div>
                        </div>
                        <div class="apus-social-share">
                           <!--<div class="bo-social-icons bo-sicolor social-radius-rounded">
                              <span class="title">Share: </span>
                              <a class="bo-social-facebook" data-toggle="tooltip" data-placement="top" data-animation="true" data-original-title="Facebook" href="http://www.facebook.com/share.php?u=[<?php echo base_url(uri_string()); ?>]&title=[<?php echo $jobs['title']; ?>]" target="_blank" title="Share on facebook">
                                 <i class="fa fa-facebook"></i>
                              </a>
                              <a class="bo-social-twitter" data-toggle="tooltip" data-placement="top" data-animation="true" data-original-title="Twitter" href="http://twitter.com/home?status=Web Developer – PHP http://testbed.ogcrm.com/falcon/job/web-developer-php/" target="_blank" title="Share on Twitter">
                                 <i class="fa fa-twitter"></i>
                              </a>
                              <a class="bo-social-linkedin" data-toggle="tooltip" data-placement="top" data-animation="true" data-original-title="LinkedIn" href="http://linkedin.com/shareArticle?mini=true&amp;url=http://testbed.ogcrm.com/falcon/job/web-developer-php/&amp;title=Web Developer – PHP" target="_blank" title="Share on LinkedIn">
                                 <i class="fa fa-linkedin"></i>
                              </a>
                              <a class="bo-social-google" data-toggle="tooltip" data-placement="top" data-animation="true" data-original-title="Google plus" href="https://plus.google.com/share?url=http://testbed.ogcrm.com/falcon/job/web-developer-php/" onclick="javascript:window.open(this.href,
                                 '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;" target="_blank" title="Share on Google plus">
                                 <i class="fa fa-google-plus"></i>
                              </a>
                              <a class="bo-social-pinterest" data-toggle="tooltip" data-placement="top" data-animation="true" data-original-title="Pinterest" href="http://pinterest.com/pin/create/button/?url=http%3A%2F%2Ftestbed.ogcrm.com%2Ffalcon%2Fjob%2Fweb-developer-php%2F&amp;description=Web+Developer+%E2%80%93+PHP&amp;media=http%3A%2F%2Ftestbed.ogcrm.com%2Ffalcon%2Fwp-content%2Fuploads%2F2017%2F12%2Fc9.jpg" target="_blank" title="Share on Pinterest">
                                 <i class="fa fa-pinterest"></i>
                              </a>
                           </div>-->
                        </div>
                        <div class="job_tags"></div>
                     </div>
                  </div>

               </div>
               <!-- sidebar -->
               <div class="col-md-4 col-sm-12 col-xs-12">
                  <aside class="sidebar sidebar-right" itemscope="itemscope" itemtype="http://schema.org/WPSideBar">
                     <aside class="widget widget_apus_job_overview_widget">
                        <h2 class="widget-title"><span>Job Overview</span></h2>
                        <div class="widget-job-overview">
                           <div class="company-info text-center">

                              <h3 class="title-job-list"><?php echo $jobs['title']; ?></h3>
                              
                              <div class="actions">
                                 <!-- listing types -->
                                 <!--<a class="job-type btn-sm-list btn-list-green" href="javascript:void(0);">Premium Job</a>-->
                              </div>
                           </div>
                           <div class="job-info">
                              <ul class="job-listing-info">
                                 <li class="job-date">
                                    <span class="icon text-second"><i class="fa fa-calendar-o" aria-hidden="true"></i></span>
                                    <div class="info-content">
                                       Dated Posted: <span><?php echo date('d-m-y', strtotime($jobs['created_date'])); ?></span>
                                    </div>
                                 </li>
                                 <li class="job-location">
                                    <span class="icon text-second"><i class="fa fa-location-arrow" aria-hidden="true"></i></span>
                                    <div class="info-content">
                                       Location: <span><?php echo $jobs['location']; ?></span>
                                    </div>
                                 </li>
                                 <li class="job-title">
                                    <span class="icon text-second"><i class="fa fa-info-circle" aria-hidden="true"></i></span>
                                    <div class="info-content">
                                       Title: <span> <?php echo $jobs['title']; ?></span>
                                    </div>
                                 </li>
                                 <li class="job-salary">
                                    <span class="icon text-second"><i class="fa fa-money" aria-hidden="true"></i></span>
                                    <div class="info-content">
                                       Salary: <span><?php echo $jobs['salary']; ?>&nbsp;(<?php echo $currency_id['code']; ?>)</span>
                                    </div>
                                 </li>
                                 <li class="job-category">
                                    <span class="icon text-second"><i class="fa fa-th-large" aria-hidden="true"></i></span>
                                    <div class="info-content">
                                       Nationality: <span><?php echo ucwords($nationality['name']); ?></span>
                                    </div>

                                 </li>
                                 <li class="job-category">
                                    <span class="icon text-second"><i class="fa fa-th-large" aria-hidden="true"></i></span>
                                    <div class="info-content">

                                       Division: <span><?php echo ucwords($industry['name']); ?></span>
                                    </div>

                                 </li>
                                 <li class="job-category">
                                    <span class="icon text-second"><i class="fa fa-th-large" aria-hidden="true"></i></span>
                                    <div class="info-content">

                                       Designation: <span> <?php echo ucwords($designation['name']); ?></span>
                                    </div>

                                 </li>
                                 <li class="job-category">
                                    <span class="icon text-second"><i class="fa fa-th-large" aria-hidden="true"></i></span>
                                    <div class="info-content">
                                       Experience: <span>
                                          <ul>Min Experience :<p class="text-muted"><?php echo $jobs['min_experience']; ?></p>
                                          </ul>
                                          <ul>Max Experience : <p class="text-muted"><?php echo $jobs['max_experience']; ?></p>
                                          </ul>
                                       </span>
                                    </div>
                                 </li>
                                 <li class="job-category">
                                    <span class="icon text-second"><i class="fa fa-th-large" aria-hidden="true"></i></span>
                                    <div class="info-content">
                                    Number Of Requirements: <span><?php echo $jobs['requirements']; ?></span>
                                    </div>
                                 </li>

                              </ul>
                              <div class="job_application application">
                                 <?php
                                
                                 if (isset($candidate_job_list) && in_array($jobs['id'], $candidate_job_list)) { ?>
                                    <input type="button" class="application_button button btn btn-second btn-block" value="Applied!!" />

                                 <?php } else {  ?>
                                    <?php if (isset($session)) { ?>
                                       <a class="application_button button btn btn-second btn-block job_apply" href="javascript:void(0);" data-jobid="<?php echo $jobs['id']; ?>">Apply</a><?php
                                                                                                                                                                                                } else {
                                                                                                                                                                                                   ?> <a href="javascript:void(0);" class="application_button button btn btn-second btn-block" data-toggle="modal" data-target="#login_modal" title="Login">Apply</a>
                                 <?php
                                    }
                                 } ?>
                                 <div class="application_details">
                                    <p>(For more details, feel free to contact us at <a href="mailto:hr6@falconmsl.com">hr6@falconmsl.com</a> or <a href="<?php echo site_url('contact-us'); ?>">click here)</a></p>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </aside>
                  </aside>
               </div>
            </div>
         </main>
         <!-- .site-main -->
      </div>
      <!-- .content-area -->
   </section>
</div>
<!-- .site-content -->
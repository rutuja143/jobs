<?php $get = $this->input->get(); ?>
<div id="apus-main-content">
   <section id="apus-breadscrumb" class="breadcrumb-page apus-breadscrumb has_img" style="background-image:url('')">
      <div class="container">
         <div class="wrapper-breads">
            <div class="wrapper-breads-inner">
               <h3 class="bread-title">Jobs in <?php echo $divisions[$_GET['div']] ?></h3>
               <div class="breadscrumb-inner">
                  <ol class="breadcrumb">
                     <li><a href="<?php echo site_url(); ?>">Home</a> </li>
                     <li><span class="active"><?php echo $divisions[$_GET['div']] ?></span></li>
                  </ol>
               </div>
            </div>
         </div>
      </div>
   </section>
   <section id="main-container" class="inner">
      <div id="primary" class="content-area">
         <div class="entry-content">
            <main id="main" class="site-main" role="main">
               <div class="job_listings" data-location="" data-keywords="" data-show_filters="true" data-show_pagination="false" data-per_page="12" data-orderby="featured" data-order="DESC" data-categories="">
                  <section class="main-listing-content container">
                     <div style="height:20px;" class=""></div>
                     <div class="row">
                        <div class="col-sm-12 col-md-9 col-sm-12 col-xs-12 pull-right">
                           <?php if (isset($list) && is_array($list) && count($list) > 0) { ?>

                              <div class="listing-action clearfix">
                                 <div class="resumes clearfix row">
                                    <div class="md-clear-2 col-md-8 col-sm-8 col-xs-12">
                                       <?php echo $this->pagination->create_links(); ?>
                                    </div>
                                    <div class="md-clear-2 col-md-4 col-sm-4 col-xs-12">
                                       Total Jobs :&nbsp;<?php echo isset($total['total']) ? $total['total'] : 0; ?>
                                    </div>
                                 </div>
                              </div>
                           <?php }   ?>
                           <div class="job_listings job_listings_cards clearfix row">
                              <?php
                              if (isset($list) && is_array($list) && count($list) > 0) {
                                 foreach ($list as $key => $value) {
                                    ?>
                                    <div class="md-clear-2 col-md-6 col-sm-6 col-xs-12 list-item-job	">
                                       <div class="job-grid job-list post-448 job_listing type-job_listing status-publish has-post-thumbnail hentry job_listing_category-medical job_listing_type-freelance job_listing_region-new-york job_listing_tag-media job_listing_tag-medicla job_listing_tag-restaurants job-type-freelance job_position_featured" data-longitude="40.7212282" data-latitude="-73.7782106">
                                          <div class="job-content-wrapper media">
                                             <div class="media-body media-middle">
                                                <div class="position">
                                                   <h3 class="title-job-list"><a href="<?php echo site_url('jobs'); ?>/<?php echo isset($value['sef']) ? $value['sef'] : ""; ?>/<?php echo $value['id']; ?>"><?php echo isset($value['title']) ? $value['title'] : " "; ?></a></h3>
                                                   <div class="company">
                                                      <strong class="text-theme"><?php echo isset($divisions[$value['division']]) ? $divisions[$value['division']] : " "; ?> /
                                                         <?php echo isset($designation[$value['designation']]) ? $designation[$value['designation']]['name'] : " "; ?></strong>
                                                   </div>
                                                </div>
                                                <div class="job-metas">
                                                   <div class="job-salary">
                                                      <?php if ($value['salary'] > 0) { ?>
                                                         <i class="text-second fa fa-money" aria-hidden="true"></i>

                                                         <?php echo $value['salary']; ?>&nbsp;&nbsp;(<?php echo isset($currency_id[$value['currency_id']]['code']) ? $currency_id[$value['currency_id']]['code'] : " "; ?>)&nbsp;&nbsp;Per Month
                                                      <?php } else { ?>
                                                         <i class="text-second fa fa-money" aria-hidden="true"></i>
                                                         -
                                                      <?php } ?>
                                                   </div>
                                                   <div class="Experience">
                                                      <i class="text-second fa fa-map-marker" aria-hidden="true"></i>
                                                      <?php if ($value['min_experience'] == '' || $value['max_experience'] == '') {
                                                               if ($value['min_experience'] != '') {
                                                                  echo 'Experience (in years): ' . $value['min_experience'] . '- 0';
                                                               } elseif ($value['max_experience'] != '') {
                                                                  echo 'Experience (in years): 0-' . $value['max_experience'];
                                                               } else {
                                                                  echo 'Experience (in years): 0-0 ';
                                                               }
                                                            } else {
                                                               echo 'Experience (in years): ' . $value['min_experience'] . '-' . $value['max_experience'];
                                                            } ?>
                                                   </div>
                                                   <div class="location">
                                                      <i class="text-second fa fa-map-marker" aria-hidden="true"></i>
                                                      <?php if ($value['location'] == '') { ?> Location : Not mention<?php } else {
                                                                                                                              echo 'Location: ' . $value['location'];
                                                                                                                           } ?>
                                                   </div>
                                                   <div class="nationality">
                                                      <i class="text-second fa fa-map-marker" aria-hidden="true"></i>
                                                      <?php echo 'Nationality : ' . isset($nationality[$value['nationality']]) ? $nationality[$value['nationality']] : ""; ?>
                                                   </div>
                                                </div>
                                             </div>
                                             <div class="listing-buttons">
                                                <?php
                                                      if (isset($candidate_job_list) && in_array($value['id'], $candidate_job_list)) { ?>
                                                   <a class="btn-sm-list btn-list-second " href="#">Applied</a>

                                                <?php } else {  ?>
                                                   <?php if (isset($session)) { ?>
                                                      <a class="btn-sm-list btn-list-second job_apply" href="javascript:void(0);" data-jobid="<?php echo $value['id']; ?>">Apply</a><?php
                                                                                                                                                                                             } else {
                                                                                                                                                                                                ?> <a href="javascript:void(0);" class="btn-sm-list btn-list-second" data-toggle="modal" data-target="#login_modal" title="Login">Apply</a>
                                                <?php
                                                         }
                                                      } ?>
                                                <a class="job-type btn-sm-list btn-list-green" href="<?php echo site_url('jobs'); ?>/<?php echo $value['sef']; ?>/<?php echo $value['id']; ?>" style="background-color: #23293a;border-color: #23293a;color: #ffffff">View Detail</a>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                 <?php } ?>

                              <?php } else { ?>
                                 <div class="listing-action clearfix">
                                    <div class="resumes clearfix row">
                                       <div class="md-clear-2 col-md-6 col-sm-6 col-xs-12">
                                          <strong>
                                             <h3> Record Not Found!!!</h3>
                                          </strong>
                                       </div>
                                    </div>
                                 </div>
                              <?php } ?>
                           </div>
                           <div class="listing-action clearfix">
                              <div class="resumes clearfix row">
                                 <div class="md-clear-2 col-md-8 col-sm-8 col-xs-12">
                                    <?php echo $this->pagination->create_links(); ?>
                                 </div>
                                 <div class="md-clear-2 col-md-4 col-sm-4 col-xs-12">
                                    Total Jobs :&nbsp;<?php echo isset($total['total']) ? $total['total'] : 0; ?>
                                 </div>
                              </div>
                           </div>

                        </div>
                        <form id="candidate_search" enctype="multipart/form-data" method="post" action="<?php echo site_url('jobs/search'); ?>">
                           <input type="hidden" name="div" value="<?php echo isset($get['div']) ? $get['div'] : ''; ?>" />

                           <div class="col-md-3 col-sm-12 col-xs-12 hidden-sm hidden-xs">
                              <aside class="sidebar sidebar-left" itemscope="itemscope" itemtype="http://schema.org/WPSideBar">
                                 <aside class="widget widget_apus_job_taxonomy_widget widget-job-taxonomy">
                                    <a class="view-more-list view-more" href="<?php echo site_url('jobs/job_list') . "?div=" . $get['div']; ?>"><i class="fa fa-filter" aria-hidden="true"></i>Clear Filter</a>
                                 </aside>
                                 <aside class="widget widget_apus_job_taxonomy_widget">
                                    <h2 class="widget-title"><span>Jobs by designation</span></h2>
                                    <div class="widget-job-taxonomy">
                                       <?php if (isset($designation) && is_array($designation) && count($designation) > 0) { ?>
                                          <ul>
                                             <?php

                                                foreach ($designation as $dkey => $dvalue) {

                                                   $search_desi = (isset($get['desi']) && $get['desi'] != '') ? explode(",", $get['desi']) : array();
                                                   //echo '<pre>';

                                                   ?>
                                                <li>
                                                   <input id="designation_<?php echo $dkey; ?>" value="<?php echo $dkey; ?>" type="checkbox" name="designation[]" <?php echo isset($search_desi) && in_array($dkey, $search_desi) ? 'checked' : ''; ?> /> <label for="designation_<?php echo $dkey; ?>"><?php echo ucwords($dvalue['name']); ?></label>
                                                <?php }
                                                   ?>
                                          </ul>

                                       <?php }
                                       ?>

                                    </div>
                                 </aside>
                                 <aside class="widget widget_apus_job_taxonomy_widget">
                                    <h2 class="widget-title"><span>Jobs by Title</span></h2>
                                    <div class="widget-job-taxonomy">
                                       <input type="text" class="input-text form-control job_title" name="job_title" value="<?php echo isset($get['title']) && $get['title'] != '' ? $get['title'] : ''; ?>" placeholder="Resume Title(Position)">
                                    </div>
                                 </aside>



                              </aside>
                           </div>

                        </form>
                     </div>
                  </section>
               </div>

            </main>
         </div>
      </div>
   </section>
</div>
<style type='text/css'>
   body {
      background: #f9f9f9;
   }
</style>
<link rel="stylesheet" type="text/css" href="<?php echo CSS_PATH_BACKEND; ?>jquery.multiselect.css">
<script type="text/javascript" src="<?php echo JS_PATH_BACKEND; ?>jquery.multiselect.js"></script>

<script>
   jQuery(document).ready(function() {
      jQuery('.select_multiselect').multiselect({
         placeholder: 'Search Here...',
         search: true,
         selectAll: true
      });
      jQuery("input[type=checkbox]").change(function() {
         jQuery('#candidate_search').submit();
      });

      jQuery(".job_title").keypress(function(e) {
         if (e.which == 10 || e.which == 13) {
            jQuery('#candidate_search').submit();
         }
      });
   });
</script>
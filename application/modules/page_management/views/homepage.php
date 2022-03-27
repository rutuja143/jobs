<div id="apus-main-content">
   <section id="main-container" class="container inner">
      <div class="row">
         <div id="main-content" class="main-page col-xs-12 clearfix">
            <main id="main" class="site-main clearfix" role="main">
               <div data-vc-full-width="true" data-vc-full-width-init="false" class="vc_row wpb_row vc_row-fluid overflow-visible">
                  <div class="wpb_column vc_column_container vc_col-sm-12">
                     <div class="vc_column-inner">
                        <div class="wpb_wrapper">
                           <div class="vc_row wpb_row vc_inner vc_row-fluid absolute-center vc_custom_1513932357821">
                              <div class="wpb_column vc_column_container vc_col-sm-12">
                                 <div class="vc_column-inner vc_custom_1513932344030">
                                    <div class="wpb_wrapper">
                                       <div class="widget no-margin widget-search-form  horizontal white">
                                          <h3 class="title">
                                             <!--<span><strong>3,000+ </strong>Browse Jobs</span>-->
                                          </h3>
                                          <div class="des">
                                             <span>Find Jobs, Employment &amp; Career Opportunities</span>
                                          </div>
                                          <div class="content">

                                             <form class="job_search_form  js-search-form job_filters" id="search" action="<?php echo site_url('jobs/search'); ?>" method="post" role="search">
                                                <div class="search_jobs clearfix search_jobs--frontpage">
                                                   <div class="search_jobs_inner">
                                                      <div class="table-visiable ">
                                                         <!-- keywords -->
                                                         <div class="search-field-wrapper  search-filter-wrapper">
                                                            <label for="search_keywords" class="hidden">Keywords</label>
                                                            <input class="search-field" autocomplete="off" type="text" name="job_title" id="search_keywords" placeholder="What are you looking for?" value="" />
                                                         </div>
                                                         <!-- location -->
                                                         <!--<div class="wrapper-location search-filter-wrapper">
                                                            <select class="regions-select " placeholder="" name="job_region_select">
                                                               <option value="">All Regions</option>
                                                               <option value="66">New York</option>
                                                            </select>
                                                         </div>-->
                                                         <div class="wrapper-categories search-filter-wrapper">
                                                            <select name='div' id='search_categories' class='job-manager-category-dropdown '>
                                                               <option value="">All Divisions</option>
                                                               <?php
                                                               if (isset($division) && is_array($division) && count($division) > 0) {
                                                                  foreach ($division as $ckey => $cvalue) {
                                                                     ?>
                                                                     <option class="level-0" value="<?php echo $ckey; ?>" <?php echo isset($jobs['division']) && $jobs['division'] == $ckey ? 'selected' : ''; ?>> <?php echo ucwords($cvalue); ?></option>
                                                               <?php
                                                                  }
                                                               }
                                                               ?>
                                                            </select>
                                                         </div>
                                                         <div class="submit">
                                                            <button class="search-submit btn btn-theme pull-right" name="submit">
                                                               <i class="fa fa-search"></i> SEARCH </button>
                                                         </div>
                                                      </div>
                                                   </div>
                                                </div>
                                             </form>
                                             <!-- suggestion -->
                                             <div class="suggestion-menu-wrapper">

                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="wpb_revslider_element wpb_content_element">
                              <div id="rev_slider_1_1_wrapper" class="rev_slider_wrapper fullwidthbanner-container" data-source="gallery" style="margin:0px auto;background:transparent;padding:0px;margin-top:0px;margin-bottom:0px;">
                                 <!-- START REVOLUTION SLIDER 5.4.8.3 fullwidth mode -->
                                 <div id="rev_slider_1_1" class="rev_slider fullwidthabanner tp-overflow-hidden" style="display:none;" data-version="5.4.8.3">
                                    <ul>
                                       <!-- SLIDE  -->
                                       <li data-index="rs-15" data-transition="fade" data-slotamount="default" data-hideafterloop="0" data-hideslideonmobile="off" data-easein="default" data-easeout="default" data-masterspeed="300" data-thumb="<?php echo IMAGE_PATH_FRONTEND; ?>slider3-100x50.jpg" data-rotate="0" data-saveperformance="off" data-title="Slide" data-param1="" data-param2="" data-param3="" data-param4="" data-param5="" data-param6="" data-param7="" data-param8="" data-param9="" data-param10="" data-description="">
                                          <!-- MAIN IMAGE -->
                                          <img src="falcon/wp-content/uploads/2019/10/slider3.jpg" alt="" title="slider3" width="1920" height="1280" data-bgposition="center center" data-bgfit="cover" data-bgrepeat="no-repeat" class="rev-slidebg" data-no-retina>
                                          <!-- LAYERS -->
                                          <!-- LAYER NR. 1 -->
                                          <div class="tp-caption tp-shape tp-shapewrapper  tp-resizeme" id="slide-15-layer-1" data-x="['left','left','left','left']" data-hoffset="['1','1','1','1']" data-y="['top','top','top','top']" data-voffset="['629','629','629','629']" data-width="full" data-height="391" data-whitespace="nowrap" data-type="shape" data-responsive_offset="on" data-frames='[{"delay":0,"speed":300,"frame":"0","from":"opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;","ease":"Power3.easeInOut"}]' data-textAlign="['inherit','inherit','inherit','inherit']" data-paddingtop="[0,0,0,0]" data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]" style="z-index: 5;background-color:rgba(124,124,124,0.5);"> </div>
                                       </li>
                                       <!-- SLIDE  -->
                                       <li data-index="rs-16" data-transition="fade" data-slotamount="7" data-hideafterloop="0" data-hideslideonmobile="off" data-easein="default" data-easeout="default" data-masterspeed="300" data-thumb="<?php echo IMAGE_PATH_FRONTEND; ?>slider1-100x50.jpg" data-rotate="0" data-saveperformance="off" data-title="Slide" data-param1="" data-param2="" data-param3="" data-param4="" data-param5="" data-param6="" data-param7="" data-param8="" data-param9="" data-param10="" data-description="">
                                          <!-- MAIN IMAGE -->
                                          <img src="<?php echo IMAGE_PATH_FRONTEND; ?>slider1.jpg" alt="" title="slider1" width="1920" height="1280" data-bgposition="center center" data-bgfit="cover" data-bgrepeat="no-repeat" class="rev-slidebg" data-no-retina>
                                          <!-- LAYERS -->
                                       </li>
                                       <!-- SLIDE  -->
                                       <li data-index="rs-17" data-transition="fade" data-slotamount="7" data-hideafterloop="0" data-hideslideonmobile="off" data-easein="default" data-easeout="default" data-masterspeed="300" data-thumb="<?php echo IMAGE_PATH_FRONTEND; ?>slider2-100x50.jpg" data-rotate="0" data-saveperformance="off" data-title="Slide" data-param1="" data-param2="" data-param3="" data-param4="" data-param5="" data-param6="" data-param7="" data-param8="" data-param9="" data-param10="" data-description="">
                                          <!-- MAIN IMAGE -->
                                          <img src="<?php echo IMAGE_PATH_FRONTEND; ?>slider2.jpg" alt="" title="slider2" width="1920" height="1280" data-bgposition="center center" data-bgfit="cover" data-bgrepeat="no-repeat" class="rev-slidebg" data-no-retina>
                                          <!-- LAYERS -->
                                       </li>
                                    </ul>
                                    <script>
                                       var htmlDiv = document.getElementById("rs-plugin-settings-inline-css");
                                       var htmlDivCss = "";
                                       if (htmlDiv) {
                                          htmlDiv.innerHTML = htmlDiv.innerHTML + htmlDivCss;
                                       } else {
                                          var htmlDiv = document.createElement("div");
                                          htmlDiv.innerHTML = "<style>" + htmlDivCss + "</style>";
                                          document.getElementsByTagName("head")[0].appendChild(htmlDiv.childNodes[0]);
                                       }
                                    </script>
                                    <div class="tp-bannertimer" style="height: 5px; background: rgba(0,0,0,0.15);"></div>
                                 </div>
                                 <script>
                                    var htmlDiv = document.getElementById("rs-plugin-settings-inline-css");
                                    var htmlDivCss = "";
                                    if (htmlDiv) {
                                       htmlDiv.innerHTML = htmlDiv.innerHTML + htmlDivCss;
                                    } else {
                                       var htmlDiv = document.createElement("div");
                                       htmlDiv.innerHTML = "<style>" + htmlDivCss + "</style>";
                                       document.getElementsByTagName("head")[0].appendChild(htmlDiv.childNodes[0]);
                                    }
                                 </script>
                                 <script type="text/javascript">
                                    if (setREVStartSize !== undefined) setREVStartSize({
                                       c: '#rev_slider_1_1',
                                       responsiveLevels: [1240, 1024, 778, 480],
                                       gridwidth: [1920, 1024, 778, 480],
                                       gridheight: [840, 700, 500, 450],
                                       sliderLayout: 'fullwidth'
                                    });

                                    var revapi1,
                                       tpj;
                                    (function() {
                                       if (!/loaded|interactive|complete/.test(document.readyState)) document.addEventListener("DOMContentLoaded", onLoad);
                                       else onLoad();

                                       function onLoad() {
                                          if (tpj === undefined) {
                                             tpj = jQuery;
                                             if ("off" == "on") tpj.noConflict();
                                          }
                                          if (tpj("#rev_slider_1_1").revolution == undefined) {
                                             revslider_showDoubleJqueryError("#rev_slider_1_1");
                                          } else {
                                             revapi1 = tpj("#rev_slider_1_1").show().revolution({
                                                sliderType: "standard",
                                                jsFileLocation: "<?php echo JS_PATH_FRONTEND; ?>",
                                                sliderLayout: "fullwidth",
                                                dottedOverlay: "none",
                                                delay: 9000,
                                                navigation: {
                                                   keyboardNavigation: "off",
                                                   keyboard_direction: "horizontal",
                                                   mouseScrollNavigation: "off",
                                                   mouseScrollReverse: "default",
                                                   onHoverStop: "off",
                                                   touch: {
                                                      touchenabled: "on",
                                                      touchOnDesktop: "off",
                                                      swipe_threshold: 75,
                                                      swipe_min_touches: 1,
                                                      swipe_direction: "horizontal",
                                                      drag_block_vertical: false
                                                   },
                                                   arrows: {
                                                      style: "uranus",
                                                      enable: true,
                                                      hide_onmobile: false,
                                                      hide_onleave: true,
                                                      hide_delay: 200,
                                                      hide_delay_mobile: 1200,
                                                      tmp: '',
                                                      left: {
                                                         h_align: "left",
                                                         v_align: "center",
                                                         h_offset: 0,
                                                         v_offset: 0
                                                      },
                                                      right: {
                                                         h_align: "right",
                                                         v_align: "center",
                                                         h_offset: 0,
                                                         v_offset: 0
                                                      }
                                                   }
                                                },
                                                responsiveLevels: [1240, 1024, 778, 480],
                                                visibilityLevels: [1240, 1024, 778, 480],
                                                gridwidth: [1920, 1024, 778, 480],
                                                gridheight: [840, 700, 500, 450],
                                                lazyType: "none",
                                                shadow: 0,
                                                spinner: "spinner0",
                                                stopLoop: "off",
                                                stopAfterLoops: -1,
                                                stopAtSlide: -1,
                                                shuffle: "off",
                                                autoHeight: "off",
                                                hideThumbsOnMobile: "off",
                                                hideSliderAtLimit: 0,
                                                hideCaptionAtLimit: 0,
                                                hideAllCaptionAtLilmit: 0,
                                                debugMode: false,
                                                fallbacks: {
                                                   simplifyAll: "off",
                                                   nextSlideOnWindowFocus: "off",
                                                   disableFocusListener: false,
                                                }
                                             });
                                          }; /* END OF revapi call */

                                       }; /* END OF ON LOAD FUNCTION */
                                    }()); /* END OF WRAPPING FUNCTION */
                                 </script>
                                 <script>
                                    var htmlDivCss = unescape("%23rev_slider_1_1%20.uranus.tparrows%20%7B%0A%20%20width%3A50px%3B%0A%20%20height%3A50px%3B%0A%20%20background%3Argba%28255%2C255%2C255%2C0%29%3B%0A%20%7D%0A%20%23rev_slider_1_1%20.uranus.tparrows%3Abefore%20%7B%0A%20width%3A50px%3B%0A%20height%3A50px%3B%0A%20line-height%3A50px%3B%0A%20font-size%3A40px%3B%0A%20transition%3Aall%200.3s%3B%0A-webkit-transition%3Aall%200.3s%3B%0A%20%7D%0A%20%0A%20%20%23rev_slider_1_1%20.uranus.tparrows%3Ahover%3Abefore%20%7B%0A%20%20%20%20opacity%3A0.75%3B%0A%20%20%7D%0A");
                                    var htmlDiv = document.getElementById('rs-plugin-settings-inline-css');
                                    if (htmlDiv) {
                                       htmlDiv.innerHTML = htmlDiv.innerHTML + htmlDivCss;
                                    } else {
                                       var htmlDiv = document.createElement('div');
                                       htmlDiv.innerHTML = '<style>' + htmlDivCss + '</style>';
                                       document.getElementsByTagName('head')[0].appendChild(htmlDiv.childNodes[0]);
                                    }
                                 </script>
                              </div>
                              <!-- END REVOLUTION SLIDER -->
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="vc_row-full-width vc_clearfix"></div>
               <div data-vc-full-width="true" data-vc-full-width-init="false" class="vc_row wpb_row vc_row-fluid top-percent vc_custom_1513739878445 vc_row-has-fill">
                  <div class="wpb_column vc_column_container vc_col-sm-12">
                     <div class="vc_column-inner">
                        <div class="wpb_wrapper">
                           <div class="no-margin widget widget-job-categories  default">
                              <div class="row row-item table-visiable-lt">
                                 <?php if (isset($banner_division) && is_array($banner_division) && count($banner_division) > 0) {
                                    foreach ($banner_division as $ckey => $cvalue) { ?>
                                       <div class="col-sm-2 col-xs-6">
                                          <a href="<?php echo site_url('jobs/job_list?div=' . $cvalue); ?>" class="category-wrapper-item default">
                                             <div class="icon-wrapper">
                                                <i class="fa fa-code"></i>
                                             </div>
                                             <div class="content-wrapper">
                                                <h3 class="category-title"><?php echo ucwords($division[$cvalue]); ?></h3>
                                                <div class="count">
                                                   <?php echo isset($job_count[$cvalue]) ? $job_count[$cvalue] : 0; ?>
                                                </div>
                                             </div>
                                          </a>
                                       </div>
                                 <?php }
                                 } ?>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="vc_row-full-width vc_clearfix"></div>
               <div class="vc_row wpb_row vc_row-fluid">
                  <div class="wpb_column vc_column_container vc_col-sm-12">
                     <div class="vc_column-inner">
                        <div class="wpb_wrapper">
                           <div class="vc_empty_space  hidden-xs" style="height: 20px"><span class="vc_empty_space_inner"></span></div>
                           <div class="vc_empty_space" style="height: 20px"><span class="vc_empty_space_inner"></span></div>

                        </div>
                     </div>
                  </div>
               </div>
               <div class="vc_row wpb_row vc_row-fluid">
                  <div class="wpb_column vc_column_container vc_col-sm-12 vc_col-lg-9 vc_col-md-9">
                     <div class="vc_column-inner">
                        <div class="wpb_wrapper">

                           <div class="widget widget-jobs-tabs  default">
                              <div class="widget-title-wrapper">
                                 <h3 class="widget-title ">
                                    <span>Jobs</span>
                                 </h3>
                                 <ul class="nav nav-tabs tab-jobs">
                                    <li class="active">
                                       <a data-toggle="tab" href="#featuredjobs">Premium Jobs</a>
                                    </li>
                                    <!--<li>
                                       <a data-toggle="tab" href="#fulltime">Jobs</a>
                                    </li>-->
                                 </ul>
                              </div>
                              <div class="widget-content">
                                 <div class="tab-content">
                                    <div id="featuredjobs" class="tab-pane active">
                                       <?php if (isset($list) && is_array($list) && count($list) > 0) {
                                          foreach ($list as $ckey => $cvalue) { ?>
                                             <div class="job-list post-443 job_listing type-job_listing status-publish has-post-thumbnail hentry job_listing_category-medical job_listing_type-part-time job_listing_region-delhi job_listing_tag-design job_listing_tag-medicla job_listing_tag-restaurants job-type-part-time" data-longitude="28.7576533" data-latitude="77.0658539">
                                                <div class="job-content-wrapper media">

                                                   <div class="media-body media-middle">
                                                      <div class="position">
                                                         <h3 class="title-job-list"><a href="<?php echo site_url('jobs'); ?>/<?php echo $cvalue['sef']; ?>/<?php echo $cvalue['id']; ?> "> <?php echo $cvalue['title']; ?> </a></h3>
                                                         <div class="company">
                                                            <p><span>Min Experience:</span><?php echo $cvalue['min_experience']; ?>
                                                               <span>Max Experience:</span><?php echo $cvalue['max_experience']; ?></p>
                                                         </div>
                                                      </div>
                                                      <div class="job-metas">
                                                         <div class="job-salary">
                                                            <i class="text-second fa fa-money" aria-hidden="true"></i>
                                                            <?php echo $cvalue['salary']; ?>
                                                         </div>
                                                         <div class="location">
                                                            <i class="text-second fa fa-map-marker" aria-hidden="true"></i>
                                                            <?php echo $cvalue['location']; ?>
                                                         </div>
                                                      </div>
                                                   </div>
                                                   <div class="media-right media-middle">
                                                      <div class="left-content">
                                                         <a class="job-type btn-sm-list btn-list-green" href="<?php echo site_url('jobs'); ?>/<?php echo $cvalue['sef']; ?>/<?php echo $cvalue['id']; ?>">View Detail</a>
                                                         
                                                         <?php if (isset($candidateappliedjobids) && in_array($cvalue['id'], $candidateappliedjobids)) { ?>
                                                            <span class="btn-sm-list btn-list-second">Applied</span>

                                                         <?php } else {  ?>
                                                            <?php if (isset($user)) { ?>
                                                               <a class="btn-sm-list btn-list-second job_apply" href="javascript:void(0);" data-jobid="<?php echo $cvalue['id']; ?>">Apply</a><?php
                                                                                                                                                                                                         } else {
                                                                                                                                                                                                            ?> <a href="javascript:void(0);" class="btn-sm-list btn-list-second" data-toggle="modal" data-target="#login_modal" title="Login">Apply</a>
                                                         <?php
                                                                  }
                                                               } ?>

                                                      </div>
                                                   </div>
                                                </div>
                                             </div>
                                       <?php }
                                       } ?>

                                    </div>
                                    <div id="fulltime" class="tab-pane ">
                                       <div class="job-list post-450 job_listing type-job_listing status-publish has-post-thumbnail hentry job_listing_category-technology job_listing_type-temporary job_listing_region-delhi job_listing_tag-developer job_listing_tag-jobs job_listing_tag-working job-type-temporary" data-longitude="28.7334315" data-latitude="77.0517066">
                                          <div class="job-content-wrapper media">
                                             <div class="media-left media-middle">
                                                <a href="falcon/it-project-manager.html">
                                                   <img class="company_logo" src="falcon/wp-content/uploads/2017/12/c1.jpg" alt="Akshay INC." /> </a>
                                             </div>
                                             <div class="media-body media-middle">
                                                <div class="position">
                                                   <h3 class="title-job-list"><a href="falcon/it-project-manager.html">IT Project Manager</a></h3>
                                                   <div class="company">
                                                      <a href="falcon/company/Akshay INC./Akshay INC..html">
                                                         <strong class="text-theme">Akshay INC.</strong> </a>
                                                   </div>
                                                </div>
                                                <div class="job-metas">
                                                   <div class="job-salary">
                                                      <i class="text-second fa fa-money" aria-hidden="true"></i>
                                                      $15k - $25K
                                                   </div>
                                                   <div class="location">
                                                      <i class="text-second fa fa-map-marker" aria-hidden="true"></i>
                                                      12 Lane No 5 Jain Nagar Delhi, 110039
                                                   </div>
                                                </div>
                                             </div>
                                             <div class="media-right media-middle">
                                                <div class="job-favorite">
                                                   <a href="falcon.html#apus-favorite-not-login" class="apus-favorite-not-login" data-id="450" data-toggle="tooltip" data-placement="top" title="favorite">
                                                      <i class="fa fa-heart-o" aria-hidden="true"></i><span class="hidden">Add to favorites</span>
                                                   </a>
                                                </div>
                                                <div class="left-content">
                                                   <a class="job-type btn-sm-list btn-list-green" href="falcon/job-type/temporary/temporary.html">Temporary</a>
                                                   <a class="btn-sm-list btn-list-second" href="falcon/it-project-manager.html">Apply</a>
                                                </div>
                                             </div>
                                          </div>
                                          <div class="job_tags"><i aria-hidden="true" class="fa fa-tags text-theme"></i><strong>Tagged as:</strong> <a href="falcon/job-tag/developer/developer.html" rel="tag">developer</a>, <a href="falcon/job-tag/jobs/jobs.html" rel="tag">Jobs</a>, <a href="falcon/job-tag/working/working.html" rel="tag">Working</a></div>
                                       </div>
                                       <div class="job-list post-449 job_listing type-job_listing status-publish has-post-thumbnail hentry job_listing_category-technology job_listing_type-part-time job_listing_region-delhi job_listing_tag-it-company job_listing_tag-jobs job_listing_tag-working job-type-part-time" data-longitude="28.7265012" data-latitude="77.0581939">
                                          <div class="job-content-wrapper media">
                                             <div class="media-left media-middle">
                                                <a href="falcon/tech-companies-in-delhi.html">
                                                   <img class="company_logo" src="falcon/wp-content/uploads/2017/12/c2.jpg" alt="Camera Inc." /> </a>
                                             </div>
                                             <div class="media-body media-middle">
                                                <div class="position">
                                                   <h3 class="title-job-list"><a href="falcon/tech-companies-in-delhi.html">Tech Companies in Delhi</a></h3>
                                                   <div class="company">
                                                      <a href="falcon/company/Camera Inc./Camera Inc..html">
                                                         <strong class="text-theme">Camera Inc.</strong> </a>
                                                   </div>
                                                </div>
                                                <div class="job-metas">
                                                   <div class="job-salary">
                                                      <i class="text-second fa fa-money" aria-hidden="true"></i>
                                                      $15k - $18k
                                                   </div>
                                                   <div class="location">
                                                      <i class="text-second fa fa-map-marker" aria-hidden="true"></i>
                                                      Budh Bazar Road Jain Colony Delhi, 110039
                                                   </div>
                                                </div>
                                             </div>
                                             <div class="media-right media-middle">
                                                <div class="job-favorite">
                                                   <a href="falcon.html#apus-favorite-not-login" class="apus-favorite-not-login" data-id="449" data-toggle="tooltip" data-placement="top" title="favorite">
                                                      <i class="fa fa-heart-o" aria-hidden="true"></i><span class="hidden">Add to favorites</span>
                                                   </a>
                                                </div>
                                                <div class="left-content">
                                                   <a class="job-type btn-sm-list btn-list-green" href="falcon/job-type/part-time/part-time.html">Part Time</a>
                                                   <a class="btn-sm-list btn-list-second" href="falcon/tech-companies-in-delhi.html">Apply</a>
                                                </div>
                                             </div>
                                          </div>
                                          <div class="job_tags"><i aria-hidden="true" class="fa fa-tags text-theme"></i><strong>Tagged as:</strong> <a href="falcon/job-tag/it-company/it-company.html" rel="tag">it company</a>, <a href="falcon/job-tag/jobs/jobs.html" rel="tag">Jobs</a>, <a href="falcon/job-tag/working/working.html" rel="tag">Working</a></div>
                                       </div>
                                       <div class="job-list post-447 job_listing type-job_listing status-publish has-post-thumbnail hentry job_listing_category-restaurants job_listing_type-freelance job_listing_tag-holtel job_listing_tag-restaurants job-type-freelance" data-longitude="" data-latitude="">
                                          <div class="job-content-wrapper media">
                                             <div class="media-left media-middle">
                                                <a href="falcon/restaurant-dishwasher.html">
                                                   <img class="company_logo" src="falcon/wp-content/uploads/2017/12/c4.jpg" alt="Coriea Inc." /> </a>
                                             </div>
                                             <div class="media-body media-middle">
                                                <div class="position">
                                                   <h3 class="title-job-list"><a href="falcon/restaurant-dishwasher.html">Restaurant Dishwasher</a></h3>
                                                   <div class="company">
                                                      <a href="falcon/company/Coriea Inc./Coriea Inc..html">
                                                         <strong class="text-theme">Coriea Inc.</strong> </a>
                                                   </div>
                                                </div>
                                                <div class="job-metas">
                                                   <div class="job-salary">
                                                      <i class="text-second fa fa-money" aria-hidden="true"></i>
                                                      $35k - $40k
                                                   </div>
                                                   <div class="location">
                                                      <i class="text-second fa fa-map-marker" aria-hidden="true"></i>
                                                      2-36 E Palai St Hilo
                                                   </div>
                                                </div>
                                             </div>
                                             <div class="media-right media-middle">
                                                <div class="job-favorite">
                                                   <a href="falcon.html#apus-favorite-not-login" class="apus-favorite-not-login" data-id="447" data-toggle="tooltip" data-placement="top" title="favorite">
                                                      <i class="fa fa-heart-o" aria-hidden="true"></i><span class="hidden">Add to favorites</span>
                                                   </a>
                                                </div>
                                                <div class="left-content">
                                                   <a class="job-type btn-sm-list btn-list-green" href="falcon/job-type/freelance/freelance.html">Freelance</a>
                                                   <a class="btn-sm-list btn-list-second" href="falcon/restaurant-dishwasher.html">Apply</a>
                                                </div>
                                             </div>
                                          </div>
                                          <div class="job_tags"><i aria-hidden="true" class="fa fa-tags text-theme"></i><strong>Tagged as:</strong> <a href="falcon/job-tag/holtel/holtel.html" rel="tag">Holtel</a>, <a href="falcon/job-tag/restaurants/restaurants.html" rel="tag">Restaurants</a></div>
                                       </div>
                                       <div class="job-list post-446 job_listing type-job_listing status-publish has-post-thumbnail hentry job_listing_category-restaurants job_listing_type-freelance job_listing_region-hawaii job_listing_tag-blogs job_listing_tag-new job-type-freelance" data-longitude="19.884226" data-latitude="-155.1202836">
                                          <div class="job-content-wrapper media">
                                             <div class="media-left media-middle">
                                                <a href="falcon/restaurant-team-member.html">
                                                   <img class="company_logo" src="falcon/wp-content/uploads/2017/12/c5.jpg" alt="Webstrot Inc." /> </a>
                                             </div>
                                             <div class="media-body media-middle">
                                                <div class="position">
                                                   <h3 class="title-job-list"><a href="falcon/restaurant-team-member.html">Restaurant Team Member</a></h3>
                                                   <div class="company">
                                                      <a href="falcon/company/Webstrot Inc./Webstrot Inc..html">
                                                         <strong class="text-theme">Webstrot Inc.</strong> </a>
                                                   </div>
                                                </div>
                                                <div class="job-metas">
                                                   <div class="job-salary">
                                                      <i class="text-second fa fa-money" aria-hidden="true"></i>
                                                      $28k - $35k
                                                   </div>
                                                   <div class="location">
                                                      <i class="text-second fa fa-map-marker" aria-hidden="true"></i>
                                                      Hawaii Belt Rd Hilo Hawaii
                                                   </div>
                                                </div>
                                             </div>
                                             <div class="media-right media-middle">
                                                <div class="job-favorite">
                                                   <a href="falcon.html#apus-favorite-not-login" class="apus-favorite-not-login" data-id="446" data-toggle="tooltip" data-placement="top" title="favorite">
                                                      <i class="fa fa-heart-o" aria-hidden="true"></i><span class="hidden">Add to favorites</span>
                                                   </a>
                                                </div>
                                                <div class="left-content">
                                                   <a class="job-type btn-sm-list btn-list-green" href="falcon/job-type/freelance/freelance.html">Freelance</a>
                                                   <a class="btn-sm-list btn-list-second" href="falcon/restaurant-team-member.html">Apply</a>
                                                </div>
                                             </div>
                                          </div>
                                          <div class="job_tags"><i aria-hidden="true" class="fa fa-tags text-theme"></i><strong>Tagged as:</strong> <a href="falcon/job-tag/blogs/blogs.html" rel="tag">Blogs</a>, <a href="falcon/job-tag/new/new.html" rel="tag">New</a></div>
                                       </div>
                                       <div class="job-list post-444 job_listing type-job_listing status-publish has-post-thumbnail hentry job_listing_category-developer job_listing_type-freelance job_listing_region-hawaii job_listing_tag-developer job_listing_tag-it-company job_listing_tag-jobs job-type-freelance" data-longitude="19.5868121" data-latitude="-155.0167812">
                                          <div class="job-content-wrapper media">
                                             <div class="media-left media-middle">
                                                <a href="falcon/front-end-web-developer.html">
                                                   <img class="company_logo" src="falcon/wp-content/uploads/2017/12/c7.jpg" alt="Envato Inc." /> </a>
                                             </div>
                                             <div class="media-body media-middle">
                                                <div class="position">
                                                   <h3 class="title-job-list"><a href="falcon/front-end-web-developer.html">Front-End Web Developer</a></h3>
                                                   <div class="company">
                                                      <a href="falcon/company/Envato Inc./Envato Inc..html">
                                                         <strong class="text-theme">Envato Inc.</strong> </a>
                                                   </div>
                                                </div>
                                                <div class="job-metas">
                                                   <div class="job-salary">
                                                      <i class="text-second fa fa-money" aria-hidden="true"></i>
                                                      $18k - $20k
                                                   </div>
                                                   <div class="location">
                                                      <i class="text-second fa fa-map-marker" aria-hidden="true"></i>
                                                      Old Government Rd Keaau HI 96720 Hawaii
                                                   </div>
                                                </div>
                                             </div>
                                             <div class="media-right media-middle">
                                                <div class="job-favorite">
                                                   <a href="falcon.html#apus-favorite-not-login" class="apus-favorite-not-login" data-id="444" data-toggle="tooltip" data-placement="top" title="favorite">
                                                      <i class="fa fa-heart-o" aria-hidden="true"></i><span class="hidden">Add to favorites</span>
                                                   </a>
                                                </div>
                                                <div class="left-content">
                                                   <a class="job-type btn-sm-list btn-list-green" href="falcon/job-type/freelance/freelance.html">Freelance</a>
                                                   <a class="btn-sm-list btn-list-second" href="falcon/front-end-web-developer.html">Apply</a>
                                                </div>
                                             </div>
                                          </div>
                                          <div class="job_tags"><i aria-hidden="true" class="fa fa-tags text-theme"></i><strong>Tagged as:</strong> <a href="falcon/job-tag/developer/developer.html" rel="tag">developer</a>, <a href="falcon/job-tag/it-company/it-company.html" rel="tag">it company</a>, <a href="falcon/job-tag/jobs/jobs.html" rel="tag">Jobs</a></div>
                                       </div>
                                       <div class="job-list post-443 job_listing type-job_listing status-publish has-post-thumbnail hentry job_listing_category-medical job_listing_type-part-time job_listing_region-delhi job_listing_tag-design job_listing_tag-medicla job_listing_tag-restaurants job-type-part-time" data-longitude="28.7576533" data-latitude="77.0658539">
                                          <div class="job-content-wrapper media">
                                             <div class="media-left media-middle">
                                                <a href="falcon/designer-medical-logo.html">
                                                   <img class="company_logo" src="falcon/wp-content/uploads/2017/12/c8.jpg" alt="FShop Inc." /> </a>
                                             </div>
                                             <div class="media-body media-middle">
                                                <div class="position">
                                                   <h3 class="title-job-list"><a href="falcon/designer-medical-logo.html">Designer Medical Logo</a></h3>
                                                   <div class="company">
                                                      <a href="falcon/company/FShop Inc./FShop Inc..html">
                                                         <strong class="text-theme">FShop Inc.</strong> </a>
                                                   </div>
                                                </div>
                                                <div class="job-metas">
                                                   <div class="job-salary">
                                                      <i class="text-second fa fa-money" aria-hidden="true"></i>
                                                      $600 - $2,300
                                                   </div>
                                                   <div class="location">
                                                      <i class="text-second fa fa-map-marker" aria-hidden="true"></i>
                                                      Bawana Rd Sector 36, Rohini Delhi, 110039
                                                   </div>
                                                </div>
                                             </div>
                                             <div class="media-right media-middle">
                                                <div class="job-favorite">
                                                   <a href="falcon.html#apus-favorite-not-login" class="apus-favorite-not-login" data-id="443" data-toggle="tooltip" data-placement="top" title="favorite">
                                                      <i class="fa fa-heart-o" aria-hidden="true"></i><span class="hidden">Add to favorites</span>
                                                   </a>
                                                </div>
                                                <div class="left-content">
                                                   <a class="job-type btn-sm-list btn-list-green" href="falcon/job-type/part-time/part-time.html">Part Time</a>
                                                   <a class="btn-sm-list btn-list-second" href="falcon/designer-medical-logo.html">Apply</a>
                                                </div>
                                             </div>
                                          </div>
                                          <div class="job_tags"><i aria-hidden="true" class="fa fa-tags text-theme"></i><strong>Tagged as:</strong> <a href="falcon/job-tag/design/design.html" rel="tag">design</a>, <a href="falcon/job-tag/medicla/medicla.html" rel="tag">Medicla</a>, <a href="falcon/job-tag/restaurants/restaurants.html" rel="tag">Restaurants</a></div>
                                       </div>
                                    </div>
                                    <div id="jobstab-2-kBJ1u" class="tab-pane ">
                                       <div class="job-list post-449 job_listing type-job_listing status-publish has-post-thumbnail hentry job_listing_category-technology job_listing_type-part-time job_listing_region-delhi job_listing_tag-it-company job_listing_tag-jobs job_listing_tag-working job-type-part-time" data-longitude="28.7265012" data-latitude="77.0581939">
                                          <div class="job-content-wrapper media">
                                             <div class="media-left media-middle">
                                                <a href="falcon/tech-companies-in-delhi.html">
                                                   <img class="company_logo" src="falcon/wp-content/uploads/2017/12/c2.jpg" alt="Camera Inc." /> </a>
                                             </div>
                                             <div class="media-body media-middle">
                                                <div class="position">
                                                   <h3 class="title-job-list"><a href="falcon/tech-companies-in-delhi.html">Tech Companies in Delhi</a></h3>
                                                   <div class="company">
                                                      <a href="falcon/company/Camera Inc./Camera Inc..html">
                                                         <strong class="text-theme">Camera Inc.</strong> </a>
                                                   </div>
                                                </div>
                                                <div class="job-metas">
                                                   <div class="job-salary">
                                                      <i class="text-second fa fa-money" aria-hidden="true"></i>
                                                      $15k - $18k
                                                   </div>
                                                   <div class="location">
                                                      <i class="text-second fa fa-map-marker" aria-hidden="true"></i>
                                                      Budh Bazar Road Jain Colony Delhi, 110039
                                                   </div>
                                                </div>
                                             </div>
                                             <div class="media-right media-middle">
                                                <div class="job-favorite">
                                                   <a href="falcon.html#apus-favorite-not-login" class="apus-favorite-not-login" data-id="449" data-toggle="tooltip" data-placement="top" title="favorite">
                                                      <i class="fa fa-heart-o" aria-hidden="true"></i><span class="hidden">Add to favorites</span>
                                                   </a>
                                                </div>
                                                <div class="left-content">
                                                   <a class="job-type btn-sm-list btn-list-green" href="falcon/job-type/part-time/part-time.html">Part Time</a>
                                                   <a class="btn-sm-list btn-list-second" href="falcon/tech-companies-in-delhi.html">Apply</a>
                                                </div>
                                             </div>
                                          </div>
                                          <div class="job_tags"><i aria-hidden="true" class="fa fa-tags text-theme"></i><strong>Tagged as:</strong> <a href="falcon/job-tag/it-company/it-company.html" rel="tag">it company</a>, <a href="falcon/job-tag/jobs/jobs.html" rel="tag">Jobs</a>, <a href="falcon/job-tag/working/working.html" rel="tag">Working</a></div>
                                       </div>
                                       <div class="job-list post-443 job_listing type-job_listing status-publish has-post-thumbnail hentry job_listing_category-medical job_listing_type-part-time job_listing_region-delhi job_listing_tag-design job_listing_tag-medicla job_listing_tag-restaurants job-type-part-time" data-longitude="28.7576533" data-latitude="77.0658539">
                                          <div class="job-content-wrapper media">
                                             <div class="media-left media-middle">
                                                <a href="falcon/designer-medical-logo.html">
                                                   <img class="company_logo" src="falcon/wp-content/uploads/2017/12/c8.jpg" alt="FShop Inc." /> </a>
                                             </div>
                                             <div class="media-body media-middle">
                                                <div class="position">
                                                   <h3 class="title-job-list"><a href="falcon/designer-medical-logo.html">Designer Medical Logo</a></h3>
                                                   <div class="company">
                                                      <a href="falcon/company/FShop Inc./FShop Inc..html">
                                                         <strong class="text-theme">FShop Inc.</strong> </a>
                                                   </div>
                                                </div>
                                                <div class="job-metas">
                                                   <div class="job-salary">
                                                      <i class="text-second fa fa-money" aria-hidden="true"></i>
                                                      $600 - $2,300
                                                   </div>
                                                   <div class="location">
                                                      <i class="text-second fa fa-map-marker" aria-hidden="true"></i>
                                                      Bawana Rd Sector 36, Rohini Delhi, 110039
                                                   </div>
                                                </div>
                                             </div>
                                             <div class="media-right media-middle">
                                                <div class="job-favorite">
                                                   <a href="falcon.html#apus-favorite-not-login" class="apus-favorite-not-login" data-id="443" data-toggle="tooltip" data-placement="top" title="favorite">
                                                      <i class="fa fa-heart-o" aria-hidden="true"></i><span class="hidden">Add to favorites</span>
                                                   </a>
                                                </div>
                                                <div class="left-content">
                                                   <a class="job-type btn-sm-list btn-list-green" href="falcon/job-type/part-time/part-time.html">Part Time</a>
                                                   <a class="btn-sm-list btn-list-second" href="falcon/designer-medical-logo.html">Apply</a>
                                                </div>
                                             </div>
                                          </div>
                                          <div class="job_tags"><i aria-hidden="true" class="fa fa-tags text-theme"></i><strong>Tagged as:</strong> <a href="falcon/job-tag/design/design.html" rel="tag">design</a>, <a href="falcon/job-tag/medicla/medicla.html" rel="tag">Medicla</a>, <a href="falcon/job-tag/restaurants/restaurants.html" rel="tag">Restaurants</a></div>
                                       </div>
                                       <div class="job-list post-385 job_listing type-job_listing status-publish has-post-thumbnail hentry job_listing_category-developer job_listing_type-part-time job_listing_region-new-york job_listing_tag-design job_listing_tag-developer job_listing_tag-it-company job-type-part-time" data-longitude="40.7187424" data-latitude="-73.7159445">
                                          <div class="job-content-wrapper media">
                                             <div class="media-left media-middle">
                                                <a href="falcon/javascript-developer-website.html">
                                                   <img class="company_logo" src="falcon/wp-content/uploads/2017/12/c7.jpg" alt="Envato Inc." /> </a>
                                             </div>
                                             <div class="media-body media-middle">
                                                <div class="position">
                                                   <h3 class="title-job-list"><a href="falcon/javascript-developer-website.html">JavaScript Developer Website</a></h3>
                                                   <div class="company">
                                                      <a href="falcon/company/Envato Inc./Envato Inc..html">
                                                         <strong class="text-theme">Envato Inc.</strong> </a>
                                                   </div>
                                                </div>
                                                <div class="job-metas">
                                                   <div class="job-salary">
                                                      <i class="text-second fa fa-money" aria-hidden="true"></i>
                                                      $700 - $900
                                                   </div>
                                                   <div class="location">
                                                      <i class="text-second fa fa-map-marker" aria-hidden="true"></i>
                                                      57 Chestnut Ave, Floral Park NY 11003 New York
                                                   </div>
                                                </div>
                                             </div>
                                             <div class="media-right media-middle">
                                                <div class="job-favorite">
                                                   <a href="falcon.html#apus-favorite-not-login" class="apus-favorite-not-login" data-id="385" data-toggle="tooltip" data-placement="top" title="favorite">
                                                      <i class="fa fa-heart-o" aria-hidden="true"></i><span class="hidden">Add to favorites</span>
                                                   </a>
                                                </div>
                                                <div class="left-content">
                                                   <a class="job-type btn-sm-list btn-list-green" href="falcon/job-type/part-time/part-time.html">Part Time</a>
                                                   <a class="btn-sm-list btn-list-second" href="falcon/javascript-developer-website.html">Apply</a>
                                                </div>
                                             </div>
                                          </div>
                                          <div class="job_tags"><i aria-hidden="true" class="fa fa-tags text-theme"></i><strong>Tagged as:</strong> <a href="falcon/job-tag/design/design.html" rel="tag">design</a>, <a href="falcon/job-tag/developer/developer.html" rel="tag">developer</a>, <a href="falcon/job-tag/it-company/it-company.html" rel="tag">it company</a></div>
                                       </div>
                                    </div>
                                    <div id="jobstab-3-kBJ1u" class="tab-pane ">
                                       <div class="job-list post-436 job_listing type-job_listing status-publish has-post-thumbnail hentry job_listing_category-media-news job_listing_type-full-time job_listing_region-virginia job_listing_tag-call-center job_listing_tag-design job_listing_tag-it-company job-type-full-time" data-longitude="36.8116966" data-latitude="-76.0544015">
                                          <div class="job-content-wrapper media">
                                             <div class="media-left media-middle">
                                                <a href="falcon/apus-marketing-manager.html">
                                                   <img class="company_logo" src="falcon/wp-content/uploads/2017/12/c3.jpg" alt="Pay Walt" /> </a>
                                             </div>
                                             <div class="media-body media-middle">
                                                <div class="position">
                                                   <h3 class="title-job-list"><a href="falcon/apus-marketing-manager.html">Apus Marketing Manager</a></h3>
                                                   <div class="company">
                                                      <a href="falcon/company/Pay Walt/Pay Walt.html">
                                                         <strong class="text-theme">Pay Walt</strong> </a>
                                                   </div>
                                                </div>
                                                <div class="job-metas">
                                                   <div class="job-salary">
                                                      <i class="text-second fa fa-money" aria-hidden="true"></i>
                                                      $800 - $2,000
                                                   </div>
                                                   <div class="location">
                                                      <i class="text-second fa fa-map-marker" aria-hidden="true"></i>
                                                      Lillian Vernon Dr Virginia Beach Virginia
                                                   </div>
                                                </div>
                                             </div>
                                             <div class="media-right media-middle">
                                                <div class="job-favorite">
                                                   <a href="falcon.html#apus-favorite-not-login" class="apus-favorite-not-login" data-id="436" data-toggle="tooltip" data-placement="top" title="favorite">
                                                      <i class="fa fa-heart-o" aria-hidden="true"></i><span class="hidden">Add to favorites</span>
                                                   </a>
                                                </div>
                                                <div class="left-content">
                                                   <a class="job-type btn-sm-list btn-list-green" href="falcon/job-type/full-time/full-time.html">Full Time</a>
                                                   <a class="btn-sm-list btn-list-second" href="falcon/apus-marketing-manager.html">Apply</a>
                                                </div>
                                             </div>
                                          </div>
                                          <div class="job_tags"><i aria-hidden="true" class="fa fa-tags text-theme"></i><strong>Tagged as:</strong> <a href="falcon/job-tag/call-center/call-center.html" rel="tag">call center</a>, <a href="falcon/job-tag/design/design.html" rel="tag">design</a>, <a href="falcon/job-tag/it-company/it-company.html" rel="tag">it company</a></div>
                                       </div>
                                       <div class="job-list post-435 job_listing type-job_listing status-publish has-post-thumbnail hentry job_listing_category-media-news job_listing_type-full-time job_listing_region-virginia job_listing_tag-blogs job_listing_tag-media job_listing_tag-new job-type-full-time" data-longitude="36.7944193" data-latitude="-76.0648339">
                                          <div class="job-content-wrapper media">
                                             <div class="media-left media-middle">
                                                <a href="falcon/group-marketing-manager.html">
                                                   <img class="company_logo" src="falcon/wp-content/uploads/2017/12/c4.jpg" alt="Coriea Inc." /> </a>
                                             </div>
                                             <div class="media-body media-middle">
                                                <div class="position">
                                                   <h3 class="title-job-list"><a href="falcon/group-marketing-manager.html">Group Marketing Manager</a></h3>
                                                   <div class="company">
                                                      <a href="falcon/company/Coriea Inc./Coriea Inc..html">
                                                         <strong class="text-theme">Coriea Inc.</strong> </a>
                                                   </div>
                                                </div>
                                                <div class="job-metas">
                                                   <div class="job-salary">
                                                      <i class="text-second fa fa-money" aria-hidden="true"></i>
                                                      $400 - $1,200
                                                   </div>
                                                   <div class="location">
                                                      <i class="text-second fa fa-map-marker" aria-hidden="true"></i>
                                                      1337 Taylor Farm Rd Virginia Beach Virginia
                                                   </div>
                                                </div>
                                             </div>
                                             <div class="media-right media-middle">
                                                <div class="job-favorite">
                                                   <a href="falcon.html#apus-favorite-not-login" class="apus-favorite-not-login" data-id="435" data-toggle="tooltip" data-placement="top" title="favorite">
                                                      <i class="fa fa-heart-o" aria-hidden="true"></i><span class="hidden">Add to favorites</span>
                                                   </a>
                                                </div>
                                                <div class="left-content">
                                                   <a class="job-type btn-sm-list btn-list-green" href="falcon/job-type/full-time/full-time.html">Full Time</a>
                                                   <a class="btn-sm-list btn-list-second" href="falcon/group-marketing-manager.html">Apply</a>
                                                </div>
                                             </div>
                                          </div>
                                          <div class="job_tags"><i aria-hidden="true" class="fa fa-tags text-theme"></i><strong>Tagged as:</strong> <a href="falcon/job-tag/blogs/blogs.html" rel="tag">Blogs</a>, <a href="falcon/job-tag/media/media.html" rel="tag">Media</a>, <a href="falcon/job-tag/new/new.html" rel="tag">New</a></div>
                                       </div>
                                       <div class="job-list post-224 job_listing type-job_listing status-publish has-post-thumbnail hentry job_listing_category-technology job_listing_type-full-time job_listing_region-ohio job_listing_tag-design job_listing_tag-developer job_listing_tag-it-company job-type-full-time" data-longitude="40.5360051" data-latitude="-81.1439218">
                                          <div class="job-content-wrapper media">
                                             <div class="media-left media-middle">
                                                <a href="falcon/senior-php-developer-wordpress.html">
                                                   <img class="company_logo" src="falcon/wp-content/uploads/2017/12/c2.jpg" alt="Camera Inc." /> </a>
                                             </div>
                                             <div class="media-body media-middle">
                                                <div class="position">
                                                   <h3 class="title-job-list"><a href="falcon/senior-php-developer-wordpress.html">Senior PHP Developer &#8211; WordPress</a></h3>
                                                   <div class="company">
                                                      <a href="falcon/company/Camera Inc./Camera Inc..html">
                                                         <strong class="text-theme">Camera Inc.</strong> </a>
                                                   </div>
                                                </div>
                                                <div class="job-metas">
                                                   <div class="job-salary">
                                                      <i class="text-second fa fa-money" aria-hidden="true"></i>
                                                      $2K - 8k P.A.
                                                   </div>
                                                   <div class="location">
                                                      <i class="text-second fa fa-map-marker" aria-hidden="true"></i>
                                                      2762-1564 Co Hwy 11 Carrollton Ohio
                                                   </div>
                                                </div>
                                             </div>
                                             <div class="media-right media-middle">
                                                <div class="job-favorite">
                                                   <a href="falcon.html#apus-favorite-not-login" class="apus-favorite-not-login" data-id="224" data-toggle="tooltip" data-placement="top" title="favorite">
                                                      <i class="fa fa-heart-o" aria-hidden="true"></i><span class="hidden">Add to favorites</span>
                                                   </a>
                                                </div>
                                                <div class="left-content">
                                                   <a class="job-type btn-sm-list btn-list-green" href="falcon/job-type/full-time/full-time.html">Full Time</a>
                                                   <a class="btn-sm-list btn-list-second" href="falcon/senior-php-developer-wordpress.html">Apply</a>
                                                </div>
                                             </div>
                                          </div>
                                          <div class="job_tags"><i aria-hidden="true" class="fa fa-tags text-theme"></i><strong>Tagged as:</strong> <a href="falcon/job-tag/design/design.html" rel="tag">design</a>, <a href="falcon/job-tag/developer/developer.html" rel="tag">developer</a>, <a href="falcon/job-tag/it-company/it-company.html" rel="tag">it company</a></div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="vc_empty_space" style="height: 30px"><span class="vc_empty_space_inner"></span></div>
                           <div class="apus-register  ">
                              <div class="row no-margin table-visiable-lt">
                                 <div class="no-padding col-xs-12 col-sm-6 col-xs-12">
                                    <div class="item style1">
                                       <div class="icon-mg">
                                          <img class="img" src="<?php echo IMAGE_PATH_FRONTEND; ?>Icon4.png" alt="Image">
                                       </div>
                                       <h3 class="title">I’m an EMPLOYER</h3>
                                       <div class="line-under"></div>
                                       <div class="description">Signed in companies are able to post new job offers, searching for candidate...</div>
                                       <a class="btn btn-theme" href="<?php echo site_url('contact-us'); ?>"><i aria-hidden="true" class="fa fa-plus-circle"></i> REGISTER AS COMPANY</a>
                                       <div class="space"><span>OR</span></div>
                                    </div>
                                 </div>
                                 <div class="no-padding col-xs-12 col-sm-6 col-xs-12">
                                    <div class="item style2" style="background-image:url(<?php echo IMAGE_PATH_FRONTEND; ?>Image2.png)">
                                       <span class="price">free</span>
                                       <div class="icon-mg">
                                          <img class="img" src="<?php echo IMAGE_PATH_FRONTEND; ?>Icon5.png" alt="Image">
                                       </div>
                                       <h3 class="title">I’m an CANDIDATE</h3>
                                       <div class="line-under"></div>
                                       <div class="description">Signed in companies are able to post new job offers, searching for candidate...</div>
                                       <a class="btn btn-second" data-toggle="modal" data-target="#login_modal"><i aria-hidden="true" class="fa fa-plus-circle"></i> REGISTER CANDIDATE</a>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="vc_empty_space  hidden-sm hidden-xs" style="height: 40px"><span class="vc_empty_space_inner"></span></div>
                        </div>
                     </div>
                  </div>
                  <div class="sidebar wpb_column vc_column_container vc_col-sm-12 vc_col-lg-3 vc_col-md-3">
                     <div class="vc_column-inner">
                        <div class="wpb_wrapper">
                           <div class="wpb_single_image wpb_content_element vc_align_left   hidden-sm hidden-xs">
                              <figure class="wpb_wrapper vc_figure">
                                 <a href="" target="_self" class="vc_single_image-wrapper   vc_box_border_grey"><img width="270" height="345" src="falcon/wp-content/uploads/2018/01/Add-Section-1.jpg" class="vc_single_image-img attachment-full" alt="" srcset="http://testbed.ogcrm.com/falcon/wp-content/uploads/2018/01/Add-Section-1.jpg 270w, http://testbed.ogcrm.com/falcon/wp-content/uploads/2018/01/Add-Section-1-235x300.jpg 235w" sizes="(max-width: 270px) 100vw, 270px" /></a>
                              </figure>
                           </div>
                           <div class="widget widget-jobs-spotlight  carousel">


                           </div>
                           <div class="widget widget-list-categories ">
                              <div class="widget-title-wrapper">
                                 <h3 class="widget-title">
                                    <span>Jobs by Divisions</span>
                                 </h3>
                              </div>
                              <div class="widget-content">
                                 <ul>
                                    <?php
                                    foreach ($division as $divkey => $divvalue) {
                                       ?>
                                       <li><a href="<?php echo site_url('jobs/job_list?div=') ?><?php echo $divkey; ?>"><?php echo $divvalue; ?></a></li>
                                    <?php
                                    }
                                    ?>
                                 </ul>
                                 <div class="clear-bottom">
                                    
                                 </div>
                              </div>
                           </div>

                           <!--<div class="widget widget-list-locations ">
                              <div class="widget-title-wrapper">
                                 <h3 class="widget-title">
                                    <span>Jobs by Location</span>
                                 </h3>
                              </div>
                              <div class="widget-content">
                                 <ul>
                                    <li><a href="falcon/region/delhi/delhi.html">Jobs in Delhi </a> (0)</li>
                                    <li><a href="falcon/region/gurgaon/gurgaon.html">Jobs in Gurgaon </a> (0)</li>
                                    <li><a href="falcon/region/hawaii/hawaii.html">Jobs in Hawaii </a> (0)</li>
                                    <li><a href="falcon/region/hyderabad/hyderabad.html">Jobs in Hyderabad </a> (0)</li>
                                    <li><a href="falcon/region/kolkata/kolkata.html">Jobs in Kolkata </a> (0)</li>
                                    <li><a href="falcon/region/new-york/new-york.html">Jobs in New York </a> (3)</li>
                                    <li><a href="falcon/region/ohio/ohio.html">Jobs in Ohio </a> (0)</li>
                                    <li><a href="falcon/region/virginia/virginia.html">Jobs in Virginia </a> (0)</li>
                                 </ul>
                                 <div class="clear-bottom">
                                    <a class="btn-view-all link-more" href="falcon.html#"><i class="fa fa-plus-circle" aria-hidden="true"></i> View All Loacation</a>
                                 </div>
                              </div>
                           </div>-->
                        </div>
                     </div>
                  </div>
               </div>
               <div class="vc_row wpb_row vc_row-fluid">
                  <div class="wpb_column vc_column_container vc_col-sm-12">
                     <div class="vc_column-inner">
                        <div class="wpb_wrapper">
                           <div class="counters  ">
                              <div class="row no-margin">
                                 <div class="no-padding col-xs-6 col-sm-3">
                                    <div class="counter-item" style="color:#ffffff; background:#23c0e9">
                                       <div class="number">
                                          <span class="counter counterUp">60000</span>
                                          <span class="prefix">+</span>
                                       </div>
                                       <div class="clearfix">
                                          <span class="line-center"></span>
                                       </div>
                                       <h3 class="title" style="color:#ffffff">Jobs Available</h3>
                                    </div>
                                 </div>
                                 <div class="no-padding col-xs-6 col-sm-3">
                                    <div class="counter-item" style="color:#ffffff; background:#22b5db">
                                       <div class="number">
                                          <span class="counter counterUp">85472</span>
                                          <span class="prefix">+</span>
                                       </div>
                                       <div class="clearfix">
                                          <span class="line-center"></span>
                                       </div>
                                       <h3 class="title" style="color:#ffffff">Members</h3>
                                    </div>
                                 </div>
                                 <div class="no-padding col-xs-6 col-sm-3">
                                    <div class="counter-item" style="color:#ffffff; background:#23c0e9">
                                       <div class="number">
                                          <span class="counter counterUp">51428</span>
                                          <span class="prefix">+</span>
                                       </div>
                                       <div class="clearfix">
                                          <span class="line-center"></span>
                                       </div>
                                       <h3 class="title" style="color:#ffffff">Resumes</h3>
                                    </div>
                                 </div>
                                 <div class="no-padding col-xs-6 col-sm-3">
                                    <div class="counter-item" style="color:#ffffff; background:#22b5db">
                                       <div class="number">
                                          <span class="counter counterUp">1420</span>
                                          <span class="prefix">+</span>
                                       </div>
                                       <div class="clearfix">
                                          <span class="line-center"></span>
                                       </div>
                                       <h3 class="title" style="color:#ffffff">Employer</h3>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>               
            </main>
            <!-- .site-main -->
         </div>
         <!-- .content-area -->
      </div>
   </section>
</div>
<!-- .site-content -->
<style>
   .vc_custom_1513826006135 {
      margin-right: 0px !important;
      margin-left: 0px !important;
   }
</style>
<script>
   jQuery(document).ready(function() {

      jQuery("#search").validate({
         debug: false,
         rules: {
            'div': {
               required: true,

            },
            'job_title': {
               required: true
            },
         },
         messages: {
            'div': {
               required: 'Required Job division'
            },
            'job_title': {
               required: 'Required Job title'
            },
         },
      });
   });
</script>
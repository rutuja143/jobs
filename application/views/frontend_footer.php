<footer id="apus-footer" class="apus-footer" role="contentinfo">
    <div class="footer-inner">
        <div class="clearfix ">
            <div class="footer-builder-wrapper container footer-1">
                <div data-vc-full-width="true" data-vc-full-width-init="false" data-vc-stretch-content="true" class="vc_row wpb_row vc_row-fluid vc_custom_1513582546419 vc_row-has-fill">
                    <div class="wpb_column vc_column_container vc_col-sm-12">
                        <div class="vc_column-inner">
                            <div class="wpb_wrapper">

                                <div class="vc_row wpb_row vc_inner vc_row-fluid">
                                    <div class="wpb_column vc_column_container vc_col-sm-12">
                                        <div class="vc_column-inner">
                                            <div class="wpb_wrapper">
                                                <div class="vc_empty_space" style="height: 20px"><span class="vc_empty_space_inner"></span></div>

                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="vc_row wpb_row vc_inner vc_row-fluid box-container">
                                    <div class="wpb_column vc_column_container vc_col-sm-12 vc_col-lg-3 vc_col-md-3">
                                        <div class="vc_column-inner">
                                            <div class="wpb_wrapper">
                                                <div class="wpb_text_column wpb_content_element ">
                                                    <div class="wpb_wrapper">
                                                        <div class="widget-about widget">
                                                            <h3 class="widget-title">Who We Are</h3>
                                                            <div class="content">
                                                                <div class="space-20">Founded in the year 2006, with a vision of establishing a paradigm of complete manpower solutions, Falcon turned out to be a foremost professional organization in the field of staffing services for domestic (India) and overseas countries. We are duly organized and existing under and by Virtue of the laws of the Indian Govt.</div>
                                                            </div>
                                                        </div>
                                                        <div class="readmore-link"><a class="link-more" href="falcon.html#"><i class="fa fa-plus-circle" aria-hidden="true"></i>Read More</a></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="wpb_column vc_column_container vc_col-sm-4 vc_col-lg-3 vc_col-md-3">
                                        <div class="vc_column-inner">
                                            <div class="wpb_wrapper">
                                                <div class="apus_custom_menu wpb_content_element ">
                                                    <div class="widget widget_nav_menu">
                                                        <h2 class="widgettitle">For CANDIDATE</h2>
                                                        <div class="menu-footer-1-container">
                                                            <ul id="menu-footer-1" class="menu">
                                                                <?php

                                                                $session_data = $this->session->userdata('user');
                                                                /*echo '<pre>';
                                                                print_r($session_data);
                                                                echo '</pre>';
                                                                exit;*/
                                                                if (isset($session_data) && is_array($session_data) && count($session_data) > 0) {
                                                                    if ($session_data['type'] == 2) {
                                                                        ?>
                                                                        <li id="menu-item-943" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-943"><a href="<?php echo site_url('candidate/edit'); ?>" >Add a Resume</a></li>
                                                                        <li id="menu-item-948" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-948"><a href="<?php echo site_url('payment/transactions'); ?>">My Account</a></li>
                                                                    <?php
                                                                        }
                                                                    } else {
                                                                        ?>
                                                                    <li id="menu-item-943" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-943"><a data-toggle="modal" data-target="#register_modal"  title="" href="">Add a Resume</a></li>
                                                                    <li id="menu-item-948" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-948"><a data-toggle="modal" data-target="#register_modal"  title="" href="">My Account</a></li>
                                                                <?php
                                                                }
                                                                ?>
                                                                <li id="menu-item-948" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-948"><a title="Candidate Packages" href="<?php echo site_url('candidate-package'); ?>">Candidate Packages</a></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="wpb_column vc_column_container vc_col-sm-4 vc_col-lg-3 vc_col-md-3">
                                        <div class="vc_column-inner">
                                            <div class="wpb_wrapper">
                                                <div class="apus_custom_menu wpb_content_element ">
                                                    <div class="widget widget_nav_menu">
                                                        <h2 class="widgettitle">For Employers</h2>
                                                        <div class="menu-footer-2-container">
                                                            <ul id="menu-footer-2" class="menu">


                                                                <li id="menu-item-952" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-952"><a title="" href="<?php echo site_url('contact-us'); ?>">Add Job</a></li>
                                                                <li id="menu-item-956" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-956"><a title="" href="<?php echo site_url('contact-us'); ?>">My Account</a></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="wpb_column vc_column_container vc_col-sm-4 vc_col-lg-3 vc_col-md-3">
                                        <div class="vc_column-inner">
                                            <div class="wpb_wrapper">
                                                <div class="apus_custom_menu wpb_content_element ">
                                                    <div class="widget widget_nav_menu">
                                                        <h2 class="widgettitle">Information</h2>
                                                        <div class="menu-footer-3-container">
                                                            <ul id="menu-footer-3" class="menu">
                                                                <li id="menu-item-957" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-957"><a title="
                                                                                                                                                                        " href="<?php echo site_url('who-we-are'); ?>">Who We Are</a></li>
                                                                <li id="menu-item-958" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-958"><a title="
                                                                                                                                                                        " href="<?php echo site_url('terms-conditions'); ?>">Terms &#038; Conditions</a></li>
                                                                <li id="menu-item-959" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-959"><a title="
                                                                                                                                                                        " href="<?php echo site_url('disclaimer-privacy-policy'); ?>">Disclaimer & Privacy Policy</a></li>
                                                                <li id="menu-item-960" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-960"><a title="
                                                                                                                                                                        " href="<?php echo site_url('why-falcon'); ?>">Why Falcon</a></li>
                                                                <li id="menu-item-961" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-961"><a title="
                                                                                                                                                                        " href="<?php echo site_url('what-we-do'); ?>">What We Do</a></li>
                                                                <li id="menu-item-962" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-962"><a title="
                                                                                                                                                                        " href="<?php echo site_url('contact-us'); ?>">Contact Us</a></li>

                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="vc_row wpb_row vc_inner vc_row-fluid box-container">
                                    <div class="wpb_column vc_column_container vc_col-sm-12">
                                        <div class="vc_column-inner">
                                            <div class="wpb_wrapper">
                                                <div class="vc_empty_space" style="height: 20px"><span class="vc_empty_space_inner"></span></div>
                                                <div class="vc_separator wpb_content_element vc_separator_align_center vc_sep_width_100 vc_sep_pos_align_center vc_separator_no_text vc_custom_1547864275254  vc_custom_1547864275254"><span class="vc_sep_holder vc_sep_holder_l"><span style="border-color:#262b3c;" class="vc_sep_line"></span></span><span class="vc_sep_holder vc_sep_holder_r"><span style="border-color:#262b3c;" class="vc_sep_line"></span></span></div>
                                                <div class="vc_empty_space  hidden-xs" style="height: 30px"><span class="vc_empty_space_inner"></span></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="vc_row wpb_row vc_inner vc_row-fluid apus-copyright box-container">
                                    <div class="wpb_column vc_column_container vc_col-sm-6">
                                        <div class="vc_column-inner">
                                            <div class="wpb_wrapper">
                                                <div class="wpb_text_column wpb_content_element  vc_custom_1517019624558">
                                                    <div class="wpb_wrapper">
                                                        <p>© <?php echo date('Y'); ?> <?php echo WEBSITE_NAME; ?>. All Rights Reserved.
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="wpb_column vc_column_container vc_col-sm-6">
                                        <div class="vc_column-inner">
                                            <div class="wpb_wrapper">
                                                <div class="widget widget-social  right ">
                                                    <div class="widget-des">
                                                        <P><a href="http://www.orggen.com/" class="bottom-footer" target="_blank" style="color:#fff;"> Developed By Orggen Technologies LLP</a></P>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="vc_empty_space  hidden-xs" style="height: 25px"><span class="vc_empty_space_inner"></span></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="vc_row-full-width vc_clearfix"></div>
            </div>
        </div>
    </div>
    <a href="falcon.html#" id="back-to-top" class="add-fix-top">
        <i class="fa fa-angle-up" aria-hidden="true"></i>
    </a>
</footer>
<!-- .site-footer -->
</div><!-- .site -->
<div class="hidden apus-favorite-login-info">
    Please login to add this job. <a class="login-button" href="falcon/my-account.html">
        Click here to login </a>
</div>
<script>
    (function() {
        function addEventListener(element, event, handler) {
            if (element.addEventListener) {
                element.addEventListener(event, handler, false);
            } else if (element.attachEvent) {
                element.attachEvent('on' + event, handler);
            }
        }

        function maybePrefixUrlField() {
            if (this.value.trim() !== '' && this.value.indexOf('http') !== 0) {
                this.value = "http://" + this.value;
            }
        }

        var urlFields = document.querySelectorAll('.mc4wp-form input[type="url"]');
        if (urlFields && urlFields.length > 0) {
            for (var j = 0; j < urlFields.length; j++) {
                addEventListener(urlFields[j], 'blur', maybePrefixUrlField);
            }
        } /* test if browser supports date fields */
        var testInput = document.createElement('input');
        testInput.setAttribute('type', 'date');
        if (testInput.type !== 'date') {

            /* add placeholder & pattern to all date fields */
            var dateFields = document.querySelectorAll('.mc4wp-form input[type="date"]');
            for (var i = 0; i < dateFields.length; i++) {
                if (!dateFields[i].placeholder) {
                    dateFields[i].placeholder = 'YYYY-MM-DD';
                }
                if (!dateFields[i].pattern) {
                    dateFields[i].pattern = '[0-9]{4}-(0[1-9]|1[012])-(0[1-9]|1[0-9]|2[0-9]|3[01])';
                }
            }
        }

    })();
</script>
<script type="text/javascript">
    function revslider_showDoubleJqueryError(sliderID) {
        var errorMessage = "Revolution Slider Error: You have some jquery.js library include that comes after the revolution files js include.";
        errorMessage += "<br> This includes make eliminates the revolution slider libraries, and make it not work.";
        errorMessage += "<br><br> To fix it you can:<br>&nbsp;&nbsp;&nbsp; 1. In the Slider Settings -> Troubleshooting set option:  <strong><b>Put JS Includes To Body</b></strong> option to true.";
        errorMessage += "<br>&nbsp;&nbsp;&nbsp; 2. Find the double jquery.js include and remove it.";
        errorMessage = "<span style='font-size:16px;color:#BC0C06;'>" + errorMessage + "</span>";
        jQuery(sliderID).show().html(errorMessage);
    }
</script>




<script type='text/javascript' src='<?php echo JS_PATH_FRONTEND; ?>jquery.magnific-popup.min.js?ver=1.1.0'></script>

<script type='text/javascript' src='<?php echo JS_PATH_FRONTEND; ?>underscore.min.js'></script>
<script type='text/javascript' src='<?php echo JS_PATH_FRONTEND; ?>wp-util.min.js'></script>
<script type='text/javascript' src='<?php echo JS_PATH_FRONTEND; ?>bootstrap.min.js'></script>
<script type='text/javascript' src='<?php echo JS_PATH_FRONTEND; ?>slick.min.js'></script>
<script type='text/javascript' src='<?php echo JS_PATH_FRONTEND; ?>countdown.js'></script>

<script type='text/javascript' src='<?php echo JS_PATH_FRONTEND; ?>jquery.unveil.js'></script>
<script type='text/javascript' src='<?php echo JS_PATH_FRONTEND; ?>perfect-scrollbar.jquery.min.js'></script>
<script type='text/javascript' src='<?php echo JS_PATH_FRONTEND; ?>jquery.mmenu.js'></script>

<script type='text/javascript' src='<?php echo JS_PATH_FRONTEND; ?>functions.js'></script>
<script type='text/javascript' src='<?php echo JS_PATH_FRONTEND; ?>js_composer_front.min.js?ver=6.0.2'></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/waypoints/2.0.5/waypoints.min.js"></script>
<script type='text/javascript' src='<?php echo JS_PATH_FRONTEND; ?>jquery.counterup.min.js'></script>
<script type='text/javascript' src='<?php echo JS_PATH_FRONTEND; ?>skrollr.min.js'></script>
<script type="text/javascript">
    if (jQuery('.alert-success').show())
        setTimeout(function() {
            jQuery(".alert-success").fadeOut('slow');
        }, 5000);
</script>


<script>
    jQuery(document).ready(function() {
        jQuery('.job_apply').click(function() {
            var jobid = jQuery(this).attr('data-jobid');
            jQuery.ajax({
                url: "<?php echo base_url('jobs/job_apply'); ?>",
                type: "POST",
                async: false,
                data: {
                    jobid: jobid
                },
                success: function(result) {
                    alert('Job Applied Successfully.');
                    document.location.reload();
                },
                error: function(result) {
                    response = false;
                }
            });
        });
    });
</script>
</body>

</html>
<?php
if (isset($_GET['ep'])) {
    $this->output->enable_profiler(true);
}
?>
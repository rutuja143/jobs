<!DOCTYPE html>
<html lang="en-US" class="no-js">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width">
    <title><?php echo (isset($title) && $title != '') ? $title : DEFAULT_TITLE; ?></title>
    <link rel="shortcut icon" href="<?php echo IMAGE_PATH_FRONTEND; ?>favicon.ico" type="image/x-icon">
    <link rel="icon" href="<?php echo IMAGE_PATH_FRONTEND; ?>favicon.ico" type="image/x-icon">
    <!--  below css files commented by yuvraj -->
    <!--<link rel='stylesheet' id='wp-block-library-css' href="<?php echo CSS_PATH_FRONTEND; ?>style.min.css" type='text/css' media='all' />-->
    <!--<link rel='stylesheet' id='wp-block-library-theme-css' href="<?php echo CSS_PATH_FRONTEND; ?>theme.min.css" type='text/css' media='all' />-->
    <!--<link rel='stylesheet' id='wc-block-style-css' href='<?php echo CSS_PATH_FRONTEND; ?>styleMin.css' type='text/css' media='all' />-->

    <link rel='stylesheet' id='rs-plugin-settings-css' href='<?php echo CSS_PATH_FRONTEND; ?>settings.css?<?php echo date('YmdHis', filemtime(ROOTBASEPATH . 'css/frontend/settings.css')); ?>' type='text/css' media='all' />

    <?php
    $page = $this->uri->segment(1);
    $page2 = $this->uri->segment(2);
    if ($page == 'candidate' && $page2 == 'view') { ?>
        <!-- this css is required on only candidate detail page -->
        <link rel='stylesheet' href="<?php echo CSS_PATH_FRONTEND; ?>job-manager-resume-detail-page-css.css?<?php echo date('YmdHis', filemtime(ROOTBASEPATH . 'css/frontend/job-manager-resume-detail-page-css.css')); ?>" type='text/css' media='all'>
    <?php }
    ?>
    <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
    <link rel='stylesheet' id='js_composer_front-css' href='<?php echo CSS_PATH_FRONTEND; ?>js_composer.min.css?<?php echo date('YmdHis', filemtime(ROOTBASEPATH . 'css/frontend/js_composer.min.css')); ?>' type='text/css' media='all' />

    <link rel='stylesheet' id='font-awesome-css' href='<?php echo CSS_PATH_FRONTEND; ?>font-awesome.min.css?<?php echo date('YmdHis', filemtime(ROOTBASEPATH . 'css/frontend/font-awesome.min.css')); ?>' type='text/css' media='all' />
    <!--<link rel='stylesheet' id='font-themify-css' href='<?php echo CSS_PATH_FRONTEND; ?>themify-icons.css' type='text/css' media='all' />-->
    <!--<link rel='stylesheet' id='ionicons-css' href='<?php echo CSS_PATH_FRONTEND; ?>ionicons.css' type='text/css' media='all' />-->
    <!--<link rel='stylesheet' id='animate-css' href='<?php echo CSS_PATH_FRONTEND; ?>animate.css' type='text/css' media='all' />-->
    <!--  required in job list page and home page
    comment added by yuvraj -->
    <link rel='stylesheet' id='bootstrap-css' href='<?php echo CSS_PATH_FRONTEND; ?>bootstrap.css?<?php echo date('YmdHis', filemtime(ROOTBASEPATH . 'css/frontend/bootstrap.css')); ?>' type='text/css' media='all' />
    <link rel='stylesheet' id='entaro-template-css' href='<?php echo CSS_PATH_FRONTEND; ?>template.css?<?php echo date('YmdHis', filemtime(ROOTBASEPATH . 'css/frontend/template.css')); ?>' type='text/css' media='all' />
    <link rel='stylesheet' href="<?php echo CSS_PATH_FRONTEND; ?>custom.css?<?php echo date('YmdHis', filemtime(ROOTBASEPATH . 'css/frontend/custom.css')); ?>" type='text/css' media='all'>
    <style id='entaro-template-inline-css' type='text/css'>
        .vc_custom_1513582546419 {
            background-image: url() !important;
        }

        .vc_custom_1513582147833 {
            background-color: rgba(255, 255, 255, 0.05) !important;
            *background-color: rgb(255, 255, 255) !important;
        }

        .vc_custom_1517020043923 {
            margin-bottom: 0px !important;
        }

        .vc_custom_1513582102112 {
            margin-bottom: 0px !important;
        }

        .vc_custom_1547864275254 {
            margin-bottom: 0px !important;
        }

        .vc_custom_1517019624558 {
            margin-top: 12px !important;
        }
    </style>
    <link rel='stylesheet' id='entaro-style-css' href='<?php echo CSS_PATH_FRONTEND; ?>style.css?<?php echo date('YmdHis', filemtime(ROOTBASEPATH . 'css/frontend/style.css')); ?>' type='text/css' media='all' />
    <link rel='stylesheet' id='slick-css' href='<?php echo CSS_PATH_FRONTEND; ?>slick.css?<?php echo date('YmdHis', filemtime(ROOTBASEPATH . 'css/frontend/slick.css')); ?>' type='text/css' media='all' />
    <link rel='stylesheet' id='magnific-popup-css' href='<?php echo CSS_PATH_FRONTEND; ?>magnific-popup.css?<?php echo date('YmdHis', filemtime(ROOTBASEPATH . 'css/frontend/magnific-popup.css')); ?>' type='text/css' media='all' />
    <link rel='stylesheet' id='perfect-scrollbar-css' href='<?php echo CSS_PATH_FRONTEND; ?>perfect-scrollbar.css?<?php echo date('YmdHis', filemtime(ROOTBASEPATH . 'css/frontend/perfect-scrollbar.css')); ?>' type='text/css' media='all' />
    <link rel='stylesheet' id='jquery-mmenu-css' href='<?php echo CSS_PATH_FRONTEND; ?>jquery.mmenu.css?<?php echo date('YmdHis', filemtime(ROOTBASEPATH . 'css/frontend/jquery.mmenu.css')); ?>' type='text/css' media='all' />
    <script type='text/javascript' src='<?php echo JS_PATH_FRONTEND; ?>jquery.js'></script>
    <script type='text/javascript' src='<?php echo JS_PATH_FRONTEND; ?>jquery-migrate.min.js'></script>
    <script type='text/javascript' src='<?php echo JS_PATH_FRONTEND; ?>jquery.themepunch.tools.min.js'></script>
    <script type='text/javascript' src='<?php echo JS_PATH_FRONTEND; ?>jquery.themepunch.revolution.min.js'></script>
    <script type='text/javascript' src='<?php echo JS_PATH_FRONTEND; ?>jquery.blockUI.min.js'></script>
    <script src="<?php echo JS_PATH_BACKEND; ?>jquery.validate.js"></script>
    <style type="text/css">
        .recentcomments a {
            display: inline !important;
            padding: 0 !important;
            margin: 0 !important;
        }
    </style>
    <script type="text/javascript">
        function setREVStartSize(e) {
            try {
                e.c = jQuery(e.c);
                var i = jQuery(window).width(),
                    t = 9999,
                    r = 0,
                    n = 0,
                    l = 0,
                    f = 0,
                    s = 0,
                    h = 0;
                if (e.responsiveLevels && (jQuery.each(e.responsiveLevels, function(e, f) {
                        f > i && (t = r = f, l = e), i > f && f > r && (r = f, n = e)
                    }), t > r && (l = n)), f = e.gridheight[l] || e.gridheight[0] || e.gridheight, s = e.gridwidth[l] || e.gridwidth[0] || e.gridwidth, h = i / s, h = h > 1 ? 1 : h, f = Math.round(h * f), "fullscreen" == e.sliderLayout) {
                    var u = (e.c.width(), jQuery(window).height());
                    if (void 0 != e.fullScreenOffsetContainer) {
                        var c = e.fullScreenOffsetContainer.split(",");
                        if (c)
                            jQuery.each(c, function(e, i) {
                                u = jQuery(i).length > 0 ? u - jQuery(i).outerHeight(!0) : u
                            }), e.fullScreenOffset.split("%").length > 1 && void 0 != e.fullScreenOffset && e.fullScreenOffset.length > 0 ? u -= jQuery(window).height() * parseInt(e.fullScreenOffset, 0) / 100 : void 0 != e.fullScreenOffset && e.fullScreenOffset.length > 0 && (u -= parseInt(e.fullScreenOffset, 0))
                    }
                    f = u
                } else
                    void 0 != e.minHeight && f < e.minHeight && (f = e.minHeight);
                e.c.closest(".rev_slider_wrapper").css({
                    height: f
                })
            } catch (d) {
                console.log("Failure at Presize of Slider:" + d)
            }
        };
    </script>
    <noscript>
        <style type="text/css">
            .wpb_animate_when_almost_visible {
                opacity: 1;
            }
        </style>
    </noscript>
</head>
<?php

$bodyclass = '';
if ($page == '') {
    $bodyclass = ' home ';
}
if ($page == 'candidate') {
    $bodyclass = ' resume-template-default single single-resume ';
}
?>

<body class="<?php echo $bodyclass; ?> page-template-default page  wp-embed-responsive theme-entaro apus-body-loading image-lazy-loading entaro vc_responsive">
    <?php $this->load->view('candidate_register_modal'); ?>
    <?php $this->load->view('candidate_login_modal'); ?>
    <div id="wrapper-container" class="wrapper-container">
        <nav id="navbar-offcanvas" class="navbar hidden-lg hidden-md" role="navigation">
            <ul>
                <li id="menu-item-942" class="has-submenu active menu-item-942">
                    <a title="" href="<?php echo base_url(); ?>">Home</a>
                </li>
                <li id="menu-item-1005" class="has-submenu menu-item-1005">
                    <a title="" href="#">Jobs</a>
                    <ul class="sub-menu">
                        <?php
                        $all_division = get_division();
                        ?>
                        <?php if (isset($all_division) && is_array($all_division) && count($all_division) > 0) { ?>


                            <?php foreach ($all_division as $dkey => $dvalue) { ?>
                                <li id="menu-item-1014" class="menu-item-1014"><a href="<?php echo site_url('jobs/job_list?div=' . $dkey); ?>"><?php echo ucwords($dvalue); ?></a></li>
                            <?php } ?>

                        <?php }
                        ?>
                    </ul>
                </li>


                <li id="menu-item-964" class="has-submenu menu-item-964">
                    <a title="" href="#">Candidates</a>
                    <ul class="sub-menu">
                       
                        <?php if (isset($all_division) && is_array($all_division) && count($all_division) > 0) { ?>


                            <?php foreach ($all_division as $dkey => $dvalue) { ?>
                                <li id="menu-item-1008" class="menu-item-1008"><a href="<?php echo site_url('candidate/resume?div=' . $dkey); ?>"><?php echo ucwords($dvalue); ?></a></li>
                            <?php } ?>

                        <?php }
                        ?>
                    </ul>
                </li>

                <li id="menu-item-1000" class="menu-item-1000"><a title="" href="<?php echo site_url('contact-us'); ?>">Contact Us</a></li>
				
				
            </ul>
        </nav>
        <div id="apus-header-mobile" class="header-mobile hidden-lg clearfix">
            <div class="container">
                <div class="heder-mobile-inner">
                    <div class="box-left">
                        <a href="#navbar-offcanvas" class="btn btn-showmenu"><i class="fa fa-bars text-theme"></i></a>
                    </div>
                    <div class="logo logo-theme text-center">
                        <a href="<?php echo base_url();?>" title="FalconJobs" >
                            <img src="<?php echo IMAGE_PATH_FRONTEND; ?>logo.png" alt="falcon" >
                        </a>
                    </div>
                    <div class="box-right">
                        <!-- Setting -->
                        <div class="top-cart">
                            <div class="apus-topcart">
                                <div class="dropdown version-1 cart">
								<a class="register login-button " data-toggle="modal" data-target="#register_modal" title="Sign up"><i class="fa fa-user" aria-hidden="true"></i>Sign up</a>
								<br>
								<a class="login login-button " data-toggle="modal" data-target="#login_modal" title="Login"><i class="fa fa-sign-in" aria-hidden="true"></i>Login</a>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <div class="widget_shopping_cart_content">
                                            <div class="shopping_cart_content">
                                                <div class="cart_list ">
                                                    <p class="total text-theme empty"><strong>Currently Empty:</strong> <span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol">&#36;</span>0</span></p>
                                                    <p class="buttons clearfix">
                                                        <a href="falcon/shop/shop.html" class="btn btn-block btn-primary wc-forward">Continue shopping</a>
                                                    </p>
                                                </div>
                                                <!-- end product list -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <?php

        $class = 'header-v1';
        if ($page ==  '' || $page == 'contact-us') {
            $class = 'header-v1';
        } else {
            $class = 'header-v2';
        } ?>

        <header id="apus-header" class="apus-header <?php echo $class; ?> hidden-sm hidden-xs clearfix" role="banner">
            <div id="apus-topbar" class="apus-topbar" style="display:none;">
                <div class="wrapper-large clearfix">
                    <div class="pull-left">
                        <div class="topbar-left">
                            <aside class="widget widget_text">
                                <div class="textwidget">
                                    <p><span><i class="fa fa-phone"></i> Phone : <a href="tel:00912264192207">+00912264192207</a></span><span><i aria-hidden="true" class="fa fa-envelope"></i> Email : <a href="mailto:hr6@falconmsl.com">hr6@falconmsl.com</a></span></p>
                                </div>
                            </aside>
                        </div>
                    </div>
                    <div class="topbar-right pull-right">
                        <div class="table-visiable-dk">
                            <div class="social-topbar">
                                <ul class="social-top">
                                    <li class="social-item">
                                        <span>Mumbai (India) |</span>
                                    </li>
                                    <li class="social-item">
                                        <span>Ahmedabad (India) |</span>
                                    </li>
                                    <li class="social-item">
                                        <span>Jakarta (Indonesia) </span>
                                    </li>

                                </ul>
                            </div>
                            <div class="login-topbar">
                                <div id="google_translate_element"></div>
                                <script type="text/javascript">
                                    function googleTranslateElementInit() {
                                        new google.translate.TranslateElement({
                                                pageLanguage: 'en'
                                            },
                                            'google_translate_element'
                                        );
                                    }
                                </script>
                                <script type="text/javascript" src="https://translate.google.com/translate_a/element.js?cb=googleTranslateElementInit">
                                </script>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="main-sticky-header-wrapper">
                <div class="main-sticky-header">
                    <div class="wrapper-large">
                        <div class="header-middle">
                            <div class="row">
                                <div class="table-visiable-dk">
                                    <div class="col-md-1">
                                        <div class="logo-in-theme ">
                                            <div class="logo">
                                                <a href="<?php echo base_url(); ?>">
                                                    <img src="<?php echo IMAGE_PATH_FRONTEND; ?>logo.png" alt="falcon">
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <a class="logo" href="<?php echo base_url(); ?>">
                                            <div class="">
                                                <span class="header-logo">Falcon Multi Services LTD</span>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="col-md-9">
                                        <div class="pull-right">
                                            <div class="table-visiable-dk">
                                                <div class="left-content">
                                                    <div class="table-visiable-dk">
                                                        <div class="main-menu">
                                                            <nav data-duration="400" class="hidden-xs hidden-sm apus-megamenu slide animate navbar p-static" role="navigation">
                                                                <div class="collapse navbar-collapse no-padding">
                                                                    <ul id="primary-menu" class="nav navbar-nav megamenu">
                                                                        <li class="dropdown <?php echo active('', $level = 1, 'active'); ?> menu-item-942 aligned-left">
                                                                            <a href="<?php echo base_url(); ?>" class="dropdown-toggle" data-hover="dropdown" data-toggle="dropdown">Home <b class="text-theme"></b></a>

                                                                        </li>
                                                                        <li class="dropdown menu-item-1005 aligned-left <?php echo active('jobs', $level = 1, 'active'); ?>">

                                                                            <a title="" href="#" class="dropdown-toggle" data-hover="dropdown" data-toggle="dropdown">Jobs <b class="fa fa-angle-down text-theme"></b></a>
                                                                            <?php
                                                                            $all_division = get_division();
                                                                            ?>
                                                                            <?php if (isset($all_division) && is_array($all_division) && count($all_division) > 0) { ?>

                                                                                <ul class="dropdown-menu">
                                                                                    <?php foreach ($all_division as $dkey => $dvalue) { ?>
                                                                                        <li class="menu-item-378 aligned-"><a href="<?php echo site_url('jobs/job_list?div=' . $dkey); ?>"><?php echo ucwords($dvalue); ?></a></li>
                                                                                    <?php } ?>
                                                                                </ul>
                                                                            <?php }
                                                                            ?>
                                                                        </li>
                                                                        <li class="dropdown menu-item-364 aligned-left <?php echo active('candidate', $level = 1, 'active'); ?>"><a href="javascript:void(0);" class="dropdown-toggle" data-hover="dropdown" data-toggle="dropdown">Candidates <b class="fa fa-angle-down text-theme"></b></a>
                                                                            <?php
                                                                            $all_division = get_division();
                                                                            ?>
                                                                            <?php if (isset($all_division) && is_array($all_division) && count($all_division) > 0) { ?>

                                                                                <ul class="dropdown-menu">
                                                                                    <?php foreach ($all_division as $dkey => $dvalue) { ?>
                                                                                        <li class="menu-item-378 aligned-"><a href="<?php echo site_url('candidate/resume?div=' . $dkey); ?>"><?php echo ucwords($dvalue); ?></a></li>
                                                                                    <?php } ?>
                                                                                </ul>
                                                                            <?php }
                                                                            ?>
                                                                        </li>
                                                                        <li class="menu-item-1000 aligned-left <?php echo active('contact-us', $level = 1, 'active'); ?>"><a title="contact us" href="<?php echo site_url('contact-us'); ?>">Contact Us</a></li>
                                                                    </ul>
                                                                </div>
                                                            </nav>
                                                        </div>
                                                        <div class="search-header">
                                                            <span class="icon-search"> <i class="fa fa-search"></i> </span>
                                                            <div class="widget-search">
                                                                <form action="falcon.html" method="get">
                                                                    <div class="input-group">
                                                                        <input type="text" placeholder="Search" name="s" class="form-control" />
                                                                        <span class="input-group-btn"> <button type="submit" class="btn"><i class="fa fa-search"></i></button> </span>
                                                                    </div>
                                                                    <input type="hidden" name="post_type" value="post" class="post_type" />
                                                                </form>
                                                            </div>
                                                            <div class="over-click"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <?php
                                                $session_data = $this->session->userdata('user');

                                                if (isset($session_data) && is_array($session_data) && count($session_data) > 0) {
                                                    if ($session_data['type'] == 2) {
                                                        ?>
                                                        <div class="right-content">
                                                            <div class="login-topbar pull-right">
                                                                <ul id="primary-menu" class="nav navbar-nav megamenu">
                                                                    <li class="dropdown menu-item-364 aligned-left">
                                                                        <a href="javascript:void(0);" class="dropdown-toggle" data-hover="dropdown" data-toggle="dropdown">Hi, <?php echo $session_data['name']; ?> <b class="fa fa-angle-down text-theme"></b></a>
                                                                        <ul class="dropdown-menu">
                                                                            <li class="menu-item-378 aligned-"><a href="<?php echo site_url('candidate/view/user/' . $session_data['id']); ?>" class="login" title="Login"><i class="fa fa-sign-in" aria-hidden="true"></i>My Profile</a></li>
                                                                            <li class="menu-item-378 aligned-"><a href="<?php echo site_url('payment/transactions/'); ?>" class="login" title="Login"><i class="fa fa-sign-in" aria-hidden="true"></i>My Transactions</a></li>
                                                                            <li class="menu-item-378 aligned-"><a href="<?php echo site_url('candidate/edit'); ?>" class="login" title="Login"><i class="fa fa-sign-in" aria-hidden="true"></i>Update Profile</a></li>
                                                                            <li class="menu-item-378 aligned-"><a href="<?php echo site_url('login/logout'); ?>" class="login" title="Login"><i class="fa fa-sign-in" aria-hidden="true"></i>Logout</a></li>
                                                                        </ul>

                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    <?php } else if ($session_data['type'] == 3) { ?>
                                                        <div class="right-content">
                                                            <div class="login-topbar pull-right">
                                                                <ul id="primary-menu" class="nav navbar-nav megamenu">
                                                                    <li class="dropdown menu-item-364 aligned-left">
                                                                        <a href="javascript:void(0);" class="dropdown-toggle" data-hover="dropdown" data-toggle="dropdown">Hi, <?php echo $session_data['name']; ?> <b class="fa fa-angle-down text-theme"></b></a>
                                                                        <ul class="dropdown-menu">
                                                                            <li class="menu-item-378 aligned-"><a href="<?php echo site_url('user/profile'); ?>" class="login" title="Login"><i class="fa fa-sign-in" aria-hidden="true"></i>My Profile</a></li>
                                                                            <li class="menu-item-378 aligned-"><a href="<?php echo site_url('payment/transactions'); ?>" class="login" title="Login"><i class="fa fa-sign-in" aria-hidden="true"></i>My Payment</a></li>
                                                                            <li class="menu-item-378 aligned-"><a href="<?php echo site_url('login/logout'); ?>" class="login" title="Login"><i class="fa fa-sign-in" aria-hidden="true"></i>Logout</a></li>
                                                                        </ul>

                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    <?php } else { ?>
                                                        <div class="right-content">
                                                            <div class="login-topbar pull-right">
                                                                <a class="register btn btn-second" data-toggle="modal" data-target="#register_modal" title="Sign up"><i class="fa fa-user" aria-hidden="true"></i>Sign up</a>
                                                                <a class="login btn btn-second" data-toggle="modal" data-target="#login_modal" title="Login"><i class="fa fa-sign-in" aria-hidden="true"></i>Login</a>
                                                            </div>
                                                        </div>
                                                    <?php }
                                                    } else { ?>
                                                    <div class="right-content">
                                                        <div class="login-topbar pull-right">
                                                            <a class="register btn btn-second" data-toggle="modal" data-target="#register_modal" title="Sign up"><i class="fa fa-user" aria-hidden="true"></i>Sign up</a>
                                                            <a class="login btn btn-second" data-toggle="modal" data-target="#login_modal" title="Login"><i class="fa fa-sign-in" aria-hidden="true"></i>Login</a>
                                                        </div>
                                                    </div>
                                                <?php } ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php
            $item = $this->session->flashdata('message');
            if (!empty($item)) {
                ?>
                <div class="alert alert-success"> <strong>Success!</strong> <?php echo $item; ?> </div>
            <?php
            }
            ?>
        </header>
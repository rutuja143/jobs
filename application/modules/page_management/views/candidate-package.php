<div id="apus-main-content">
    <section id="apus-breadscrumb" class="breadcrumb-page apus-breadscrumb has_img" style="background-image:url('https://demoapus.com/entaro/wp-content/uploads/2017/12/bg-breadcrum.jpg')">
        <div class="container">
            <div class="wrapper-breads">
                <div class="wrapper-breads-inner">
                    <h3 class="bread-title">Candidate Package</h3>
                    <div class="breadscrumb-inner">
                        <ol class="breadcrumb">
                            <li><a href="<?php echo site_url(); ?>">Home</a> </li>
                            <li><span class="active">Candidate Package</span></li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php
    $user = $this->session->get_userdata('user');
    //print_r($user);
    //exit;
    ?>
    <section id="main-container" class="container inner">
        <div class="row">
            <div id="main-content" class="main-page col-xs-12 clearfix">
                <main id="main" class="site-main clearfix" role="main">
                    <div class="vc_row wpb_row vc_row-fluid">
                        <div class="wpb_column vc_column_container vc_col-sm-12">
                            <div class="vc_column-inner">
                                <div class="wpb_wrapper">
                                    <div class="vc_empty_space" style="height: 32px"><span class="vc_empty_space_inner"></span></div>
                                    <div class="widget widget-subcribes ">
                                        <div class="center">
                                        </div>
                                        <div class="row">
                                            <div class="col-xs-12 col-sm-2 col-xs-12">
                                                <div class="subwoo-inner card-plan">
                                                
                                                    <div class="header-sub  ">
                                                        <div class="wdiget no-margin">
                                                            <h3 class="widget-title line-center">Basic Plan</h3>
                                                            <div class="price 111">
                                                                <div class="price-inner  bg-theme text-white">
                                                                    <div class="inner">
                                                                        <span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol">BHD</span>29</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="bottom-sub clearfix">
                                                        <div class="content">
                                                            <ul>
                                                                <li><i class="fa fa-plus-circle" aria-hidden="true"></i> 1 Month (30 days)</li>
                                                            </ul>
                                                        </div>
                                                        <div class="button-action button-position text-center">
                                                            <?php
                                                           
                                                            if (isset($user['user']['candidate_id']) && $user['user']['candidate_id'] > 0) {
                                                                ?>
                                                                <a href="<?php echo site_url('payment/request_payment/1'); ?>" class="buy-button" ><i aria-hidden="true" class="fa fa-plus-circle"></i> Buy Now</a><?php
                                                                                                                                                                                                                                                                                                                                                                } else {
                                                                                                                                                                                                                                                                                                                                                                    ?>
                                                                <a data-toggle="modal" data-target="#login_modal" class="buy-button" ><i aria-hidden="true" class="fa fa-plus-circle"></i> Buy Now</a><?php
                                                                                                                                                                                                                                                                                                                                                                }
                                                                                                                                                                                                                                                                                                                                                                ?>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xs-12 col-sm-2 col-xs-12">
                                                <div class="subwoo-inner card-plan featured">
                                                    <span class="armorial"><i class="fa fa-star" aria-hidden="true"></i></span>
                                                    <div class="header-sub  ">
                                                        <div class="wdiget no-margin">
                                                            <h3 class="widget-title line-center">Premium Plan</h3>
                                                            <div class="price 111">
                                                                <div class="price-inner  bg-second text-white">
                                                                    <div class="inner">
                                                                        <span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol">BHD</span>76</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="bottom-sub clearfix">
                                                        <div class="content">
                                                            <ul>
                                                                <li><i class="fa fa-plus-circle" aria-hidden="true"></i> 3 Months (90 days)</li>

                                                            </ul>
                                                        </div>
                                                        <div class="button-action button-position text-center">
                                                        <?php
                                                           
                                                           if (isset($user['user']['candidate_id']) && $user['user']['candidate_id'] > 0) {
                                                               ?>
                                                               <a href="<?php echo site_url('payment/request_payment/2'); ?>" class="buy-button" ><i aria-hidden="true" class="fa fa-plus-circle"></i> Buy Now</a><?php
                                                                                                                                                                                                                                                                                                                                                               } else {
                                                                                                                                                                                                                                                                                                                                                                   ?>
                                                               <a data-toggle="modal" data-target="#login_modal" class="buy-button" ><i aria-hidden="true" class="fa fa-plus-circle"></i> Buy Now</a><?php
                                                                                                                                                                                                                                                                                                                                                               }
                                                                                                                                                                                                                                                                                                                                                               ?>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xs-12 col-sm-3 col-xs-12">
                                                <div class="subwoo-inner card-plan">
                                                    <div class="header-sub  ">
                                                        <div class="wdiget no-margin">
                                                            <h3 class="widget-title line-center">Advanced Plan</h3>
                                                            <div class="price 111">
                                                                <div class="price-inner  bg-theme text-white">
                                                                    <div class="inner">
                                                                        <span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol">BHD</span>114</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="bottom-sub clearfix">
                                                        <div class="content">
                                                            <ul>
                                                                <li><i class="fa fa-plus-circle" aria-hidden="true"></i> 6 Months (120 days)</li>
                                                            </ul>
                                                        </div>
                                                        <div class="button-action button-position1 text-center">
                                                        <?php
                                                           
                                                           if (isset($user['user']['candidate_id']) && $user['user']['candidate_id'] > 0) {
                                                               ?>
                                                               <a href="<?php echo site_url('payment/request_payment/3'); ?>" class="buy-button" ><i aria-hidden="true" class="fa fa-plus-circle"></i> Buy Now</a><?php
                                                                                                                                                                                                                                                                                                                                                               } else {
                                                                                                                                                                                                                                                                                                                                                                   ?>
                                                               <a data-toggle="modal" data-target="#login_modal" class="buy-button" ><i aria-hidden="true" class="fa fa-plus-circle"></i> Buy Now</a><?php
                                                                                                                                                                                                                                                                                                                                                               }
                                                                                                                                                                                                                                                                                                                                                               ?>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xs-12 col-sm-3 col-xs-12">
                                                <div class="subwoo-inner card-plan">
                                                    <div class="header-sub  ">
                                                        <div class="wdiget no-margin">
                                                            <h3 class="widget-title line-center">Advanced Plan</h3>
                                                            <div class="price 111">
                                                                <div class="price-inner  bg-theme text-white">
                                                                    <div class="inner">
                                                                        <span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol">BHD</span>188</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="bottom-sub clearfix">
                                                        <div class="content">
                                                            <ul>
                                                                <li><i class="fa fa-plus-circle" aria-hidden="true"></i> 1 Year (365 days)</li>
                                                            </ul>
                                                        </div>
                                                        <div class="button-action button-position1 text-center">
                                                        <?php
                                                           
                                                           if (isset($user['user']['candidate_id']) && $user['user']['candidate_id'] > 0) {
                                                               ?>
                                                               <a href="<?php echo site_url('payment/request_payment/4'); ?>" class="buy-button" ><i aria-hidden="true" class="fa fa-plus-circle"></i> Buy Now</a><?php
                                                                                                                                                                                                                                                                                                                                                               } else {
                                                                                                                                                                                                                                                                                                                                                                   ?>
                                                               <a data-toggle="modal" data-target="#login_modal" class="buy-button" ><i aria-hidden="true" class="fa fa-plus-circle"></i> Buy Now</a><?php
                                                                                                                                                                                                                                                                                                                                                               }
                                                                                                                                                                                                                                                                                                                                                               ?>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xs-12 col-sm-2 col-xs-12">
                                                <div class="subwoo-inner card-plan">
                                                    <div class="header-sub  ">
                                                        <div class="wdiget no-margin">
                                                            <h3 class="widget-title line-center">Advanced Plan</h3>
                                                            <div class="price 111">
                                                                <div class="price-inner  bg-theme text-white">
                                                                    <div class="inner">
                                                                        <span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol">BHD</span>377</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="bottom-sub clearfix">
                                                        <div class="content">
                                                            <ul>
                                                                <li><i class="fa fa-plus-circle" aria-hidden="true"></i> Lifetime (No Limit)</li>
                                                            </ul>
                                                        </div>
                                                        <div class="button-action  button-position text-center">
                                                        <?php
                                                           
                                                           if (isset($user['user']['candidate_id']) && $user['user']['candidate_id'] > 0) {
                                                               ?>
                                                               <a href="<?php echo site_url('payment/request_payment/5'); ?>" class="buy-button" ><i aria-hidden="true" class="fa fa-plus-circle"></i> Buy Now</a><?php
                                                                                                                                                                                                                                                                                                                                                               } else {
                                                                                                                                                                                                                                                                                                                                                                   ?>
                                                               <a data-toggle="modal" data-target="#login_modal" class="buy-button" ><i aria-hidden="true" class="fa fa-plus-circle"></i> Buy Now</a><?php
                                                                                                                                                                                                                                                                                                                                                               }
                                                                                                                                                                                                                                                                                                                                                               ?>

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
                    <div class="vc_row-full-width vc_clearfix"></div>
                </main>
            </div>
        </div>
    </section>
</div>
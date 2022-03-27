<?php
/*
 * admin login header and client log in header view
 * 
 * 
 */
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <link rel="shortcut icon" href="<?php echo IMAGE_PATH_FRONTEND ?>trans.png">
        <title><?php echo WEBSITE_NAME ?>: Admin Panel</title>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="robots" content="noindex,nofollow" />
        <meta name="robots" content="noarchive" />
        <link rel="stylesheet" href="<?php echo CSS_PATH_BACKEND; ?>adminlte.min.css">
        <link type="text/css" rel="stylesheet" href="<?php echo CSS_PATH_BACKEND; ?>style.css">
        
        <link href='http://fonts.googleapis.com/css?family=Roboto+Condensed' rel='stylesheet' type='text/css'>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
        <!-- Bootstrap 3.3.6 -->
        <script src="<?php echo JS_PATH_BACKEND; ?>bootstrap.min.js"></script>
    </head>
    <body class="admin-login hold-transition login-page">
        <div class="login-box">
            <div class="login-logo ">
                <div class="login-header">
                    <div id="logo">
                        <a title="RPSP" href="<?php echo site_url(); ?>"><img width="50%" title="<?php echo WEBSITE_NAME ?>" alt="<?php echo WEBSITE_NAME ?>" src="<?php echo IMAGE_PATH_BACKEND; ?>logo.png"></a>
                    </div>
                </div>
            </div>

<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>Email Template</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <style>
            body{color:#000;}
            p{margin:3px;}
            tr, td{font-size: 14px;}
            th{color:#795548;padding:5px;}
            h1{margin: 0;text-align:center;font-size:25px;color:#607D8B;}
            h2{font-size:16px;}
            button{font-size: 16px;
                   display: block;
                   margin: 20px 0;
                   background-color: #F44336;
                   color: #fff;
                   padding: 10px;
                   border: none;
                   border-radius: 5px;}
            .main-table{background-color:#fafafa;font-family: 'Helvetica' , sans-serif; font-size:14px; margin:0; padding:0;}
            .report-table{border-collapse: collapse;display:block;text-align:center;}
            .report-table tr{border-bottom: 2px solid #795548;}
            .report-table tr td{padding:5px;}
            @media only screen and (max-width: 600px) {

            }
        </style>
    </head>
    <body>
        <table class="main-table" cellspacing="0" cellpadding="0" border="0" height="100%" width="100%">
            <tbody><tr>
                    <td align="center" valign="top" style="padding:20px 0 20px 0">
                        <table bgcolor="#FFFFFF" cellspacing="0" cellpadding="10" border="0" width="600" style="border:1px solid #dddddd;">
                            <tbody>
                                <tr>
                                    <td colspan="1" style="padding:0px;background-color: #fff">
                                        <table width="100%" cellspacing="0" cellpadding="0">
                                            <tbody><tr>
                                                    <td colspan="2" style="padding:10px 0 0 0;text-align:center;color: #fff;">
                                                        <a href="<?php echo site_url(); ?>" target="_blank"><img src="<?php echo IMAGE_PATH_FRONTEND ?>logo.png" width="200px"/></a>
                                                    </td>
                                                </tr>
                                            </tbody></table>
                                    </td>
                                </tr>

                                <tr style="
                                    /* background: #edf7f0; */
                                    ">
                                    <td colspan="2" style="padding-left: 22px;padding-right: 22px;padding-top: 15px;padding-bottom: 15px;">
                                        <table width="100%" cellspacing="0" cellpadding="0" style="
                                               background: #edf7f0;
                                               ">
                                            <tbody><tr>
                                                    <td colspan="2" style="padding: 5px 20px;text-align:center;font-weight:700;/* margin-left: 16px; */">
                                                        <p style="text-transform: uppercase">Candidate Register</p>

                                                    </td>
                                                </tr>
                                            </tbody></table>
                                    </td>
                                </tr>


                                <tr>
                                    <td colspan="2" style="padding:0px;padding-left: 22px;padding-right: 22px;">
                                        <table width="100%" cellspacing="0" cellpadding="0" style="
                                               /* background: #edf7f0; */
                                               ">
                                            <tbody><tr>
                                                    <?php
//                                                  
                                                    if (isset($candidate) && is_array($candidate) && count($candidate) > 0) {
                                                        ?>
                                                        <td colspan="2" style="line-height: 24px;padding:0 20px 10px;text-align:left;/* margin-left: 16px; */">
                                                            <p style="margin-top:15px;">candidate name: <strong><?php echo isset($candidate['name']) ? $candidate['name'] : ''; ?></strong> 
                                                           <?php
                                                        }
                                                        ?>
                                                                                        


                                                    </td>
                                                </tr>
                                            </tbody></table>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2" style="padding:0px;background-color:#fff;padding: 0 22px;">
                                        <table width="100%" cellspacing="0" cellpadding="0">
                                            <tbody><tr>
                                                    <td colspan="2" style="padding:0 20px;text-align:left;padding: 0 0 0 20px;text-align: left;">
                                                        <p><a target="_blank" href="<?php echo site_url('candidate/candidate_admin/view'); ?>/<?php echo $candidate_id; ?>" style="display:inline-block; padding:5px 10px; color:#fff; background:#0e9046; text-decoration:none; margin-right:10px;">View Prodile in admin Panel</a> 
                                                            <!--                                                            <a style="display:inline-block; padding:5px 10px; color:#fff; background:#ec1f25; text-decoration:none;" href="#">Reject</a>-->
                                                        </p>

                                                        <p style="height:20px;"></p>
                                                        <p style="margin-top:15px;">Warm Regards</p>
                                                        <p style="height:20px;"></p>
                                                       <p style="font-style:italic;font-weight:700;color: #2fa260;">Falcon jobs</p>
                                                    </td>
                                                </tr>
                                            </tbody></table>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2" style="padding: 5px;background-color:#fff;">
                                        <table width="100%" cellspacing="0" cellpadding="0">
                                            <tbody><tr>
                                                    <td colspan="2" style="padding:0 20px;text-align:left;padding: 0 20px 15px;text-align: left;font-weight: 700;/* border-left: 2px solid green; */">

                                                    </td>
                                                </tr>
                                            </tbody></table>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2" style="padding: 0px;background: #0e9046;">
                                        <table width="100%" cellspacing="0" cellpadding="0">
                                            <tbody><tr>
                                                    <td colspan="2" style="background-color: #0e9046;padding: 15px 0;text-align: center;color: #fff;">
                                                        <p class="text-center" style="font-size:14px;"></p>
                                                        <p style="color: #fff;"></td>
                                                </tr>
                                            </tbody></table>
                                    </td>
                                </tr>
                            </tbody></table>
                    </td>
                </tr>
            </tbody></table>
    </body>
</html>

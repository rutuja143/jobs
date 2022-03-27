<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>

    <head>
        <title>Candidate Resume</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <style>
            body{ margin:0}
            @page { margin-top: 10px; margin-bottom: 50px; }
            .container{width:700px; margin: 0px auto;}
            .h1{text-align: center; margin-bottom: 20px; text-decoration: underline;font-size: 36px;}
            .h4{background:#000; color:#fff; display:block; padding:4px 20px; text-align:center; margin-top: 0; margin-bottom: 0;font-size: 15px;}
            ul{list-style: none; margin: 0; padding: 0}
            .p-tag{margin-top:0;margin-bottom:10px;float:left; width:50%;} 
            .p-tagf{width:100%;float: none}
            li{overflow: hidden}
            .head_color{background-color: #007bff;}
            p.underline{ display:inline-block; width:72%;font-size: 15px; margin:0}
            p.f-w{width: 22%;display: inline-block;margin-right: 5px;font-size: 14px; margin:0}
            p.f-a{width: 27%;display: inline-block;margin-right: 5px;font-size: 14px; margin:0}
            #customers {border-collapse: collapse;width: 100%;}
            #customers td, #customers th { border:1px solid #adadad;padding: 8px;}
            #customers th {#customers th {text-align: center;}}
            label {display: block;border: 1px solid #000; margin-bottom: 50px;padding:10px;}
            .flyleaf {page-break-after: always;}
            #header,#footer {position: fixed;left: 0;right: 0;color: #000;font-size: 0.9em;}

            #header {top: -10px;}

            #footer {bottom: 10px;border-top: 0.1pt solid #000;}

            #header table,#footer table {width: 100%;border-collapse: collapse;border: none;}

            #header td,#footer td {padding: 0;width: 50%;}

            table {
                border-left: 0.01em solid #ccc;
                border-right: 0;
                border-top: 0.01em solid #ccc;
                border-bottom: 0;
                border-collapse: collapse;
            }
            table td,
            table th {
                border-left: 0;
                border-right: 0.01em solid #ccc;
                border-top: 0;
                border-bottom: 0.01em solid #ccc;
            }
            .info_li{margin-bottom: 15px;}
            .page-number {text-align: center;}

            .page-number:before { content: "Page " counter(page);}
        </style>
    <body>
        <div id="header">

        </div>
        <div id="footer">
            <p class="page-number"></p>
        </div>
        <div class="container">
            <h2><p align="center">Basic Information</p></h2>
            <table border="1" cellspacing="0" cellpadding="0" width="100%">
                <tbody>
                    <tr>
                        <td style="width:20%;"><p align="center">Name</p></td>
                        <td><p align="center"><?php echo isset($candidate['name']) ? ucwords($candidate['name']) : ''; ?></p></td>
                    </tr>
                    <?php if(isset($session['role']) && $session['role']==1){?>
                    <tr>
                        <td style="width:20%;"><p align="center">Phone Number</p></td>
                        <td><p align="center"><?php echo isset($candidate['phone_number']) ? $candidate['phone_number'] : ''; ?></p></td>
                    </tr>
                    <tr>
                        <td style="width:20%;"><p align="center">Mobile Number</p></td>
                        <td><p align="center"><?php echo isset($candidate['mobile_number_country_code'])&& isset($candidate['mobile_number']) ? "(".$candidate['mobile_number_country_code'].")".$candidate['mobile_number'] : ''; ?></p></td>
                    </tr>
                    <tr>
                        <td style="width:20%;"><p align="center">Email id</p></td>
                        <td><p align="center"><?php echo isset($candidate['email_id']) ? $candidate['email_id'] : ''; ?></p></td>
                    </tr>
                    <tr>
                        <td style="width:20%;"><p align="center">skype id</p></td>
                        <td><p align="center"><?php echo isset($candidate['skype_id']) ?$candidate['skype_id']:'';?></p></td>
                    </tr>
                    <?php }?>
                    <tr>
                        <td style="width:20%;"><p align="center">Date of birth</p></td>
                        <td><p align="center"><?php echo isset($candidate['dob']) && $candidate['dob'] != '0000-00-00' ? date('d M,Y', strtotime($candidate['dob'])) : ''; ?></p></td>
                    </tr>
                    <tr>
                        <td style="width:20%;"><p align="center">Resume Title(Position)</p></td>
                        <td><p align="center"><?php echo isset($candidate['resume_title']) ? ucwords($candidate['resume_title']) : ''; ?></p></td>
                    </tr>
                    <tr>
                        <td style="width:20%;"><p align="center">Notice Period(Days)</p></td>
                        <td><p align="center"><?php echo isset($candidate['notice_period']) ? $candidate['notice_period'] : ''; ?></p></td>
                    </tr>
                    <tr>
                        <td style="width:20%;"><p align="center">Primary Language</p></td>
                        <td><p align="center"><?php echo isset($language[$candidate['primary_language']]) ? $language[$candidate['primary_language']]:'';?></p></td>
                    </tr>
                    <tr>
                        <td style="width:20%;"><p align="center">Secondary Language</p></td>
                        <td><p align="center"> <?php
                if (isset($candidate_lang) && is_array($candidate_lang) && count($candidate_lang) > 0) {
                    foreach ($candidate_lang as $qkey => $qvalue) {
                                                   ?>
                <li align="center"><?php echo $language[$candidate_lang[$qvalue]];?></li>
                    <?php }} ?>
                </p></td>
                    </tr>
                    <tr>
                        <td style="width:20%;"><p align="center">Division</p></td>
                        <td><p align="center"><?php echo isset($division['name']) ?$division['name']:'';?></p></td>
                    </tr>
                    <tr>
                        <td style="width:20%;"><p align="center">Designation</p></td>
                        <td><p align="center"><?php echo isset($designation['name']) ?$designation['name']:'';?></p></td>
                    </tr>

                </tbody>
            </table>

            <h2><p align="center">Contact Information</p></h2>
            <table border="1" cellspacing="0" cellpadding="0" width="100%">
                <tbody>
                

                    <tr>
                        <td style="width:20%;"><p align="center">Nationality</p></td>
                        <td><p align="center"><?php echo isset($nationality['name']) ? $nationality['name']:'';?></p></td>
                    </tr>
                   
                    <tr>
                        <td style="width:20%;"><p align="center">Address</p></td>
                        <td><p align="center"><?php echo isset($candidate['address']) ?$candidate['address']:'';?></p></td>
                    </tr>
                    <tr>
                        <td style="width:20%;"><p align="center">Residential Country</p></td>
                        <td><p align="center"><?php echo isset( $countries['name']) ?  $countries['name']:'';?></p></td>
                    </tr>
                    <tr>
                        <td style="width:20%;"><p align="center">State</p></td>
                        <td><p align="center"><?php echo isset($state['name']) ? $state['name']:'';?></p></td>
                    </tr>
                    <tr>
                        <td style="width:20%;"><p align="center">City</p></td>
                        <td><p align="center"><?php echo isset($cities['name']) ? $cities['name']:'';?></p></td>
                    </tr>
                    <tr>
                        <td style="width:20%;"><p align="center">Pin Code</p></td>
                        <td><p align="center"><?php echo isset($candidate['pin_code']) ? $candidate['pin_code']:'';?></p></td>
                    </tr>


                </tbody>
            </table>
            <div class="flyleaf"></div>

            <h2><p align="center">Education qualification</p></h2>
            <table border="1" cellspacing="0" cellpadding="0" width="100%">
                <tbody>
                    <tr>
                        <td><p align="center">Qualification</p></td>
                        <td><p align="center">University</p></td>
                        <td><p align="center">Passing year</p></td>
                        <td><p align="center">Country</p></td>
                    </tr>
                   
                    <?php
											  if (isset($qualification) && is_array($qualification) && count($qualification) > 0) {
                                                foreach ($qualification as $qkey => $qvalue) {
                                                   ?>
												 <tr>
													<td><?php echo isset($edu_course[$qvalue['qualification']])?$edu_course[$qvalue['qualification']]:'';?></td>
													<td><?php echo $qvalue['university'];?></td>
													
													<td><?php echo isset($qvalue['passing_year'])? $qvalue['passing_year']:"";?></td>
													<td><?php echo isset($edu_country[$qvalue['country']])? $edu_country[$qvalue['country']]:"";?></td>
													
												 </tr>
												<?php }} ?>
                    
                </tbody>
            </table>

            <h2><p align="center">Career summary</p></h2>
            <table border="1" cellspacing="0" cellpadding="0" width="100%">
                <tbody>
                    <tr>
                        <td><p align="center">Position</p></td>
                        <td><p align="center">Employer</p></td>
                        <td><p align="center">Country</p></td>
                        <td><p align="center">From Date</p></td>
                        <td><p align="center">To Date</p></td>
                        <td><p align="center">Till Date</p></td>
                    </tr>
                    
                    <?php
											  if (isset($career) && is_array($career) && count($career) > 0) {
                                                foreach ($career as $qkey => $qvalue) {
                                                   ?>
												 <tr>
													<td><?php echo $qvalue['position'];?></td>
													<td><?php echo  isset($qvalue['till_date']) && $qvalue['till_date'] == 1 ? "In Reputed Company" : $qvalue['employer'];?></td>
                                                     <td><?php echo isset($edu_country[$qvalue['country']])?$edu_country[$qvalue['country']]:"";?></td>
                                                      <td><?php echo isset($qvalue['from_date'])? $qvalue['from_date']:0;?></td>
													
                                                    <td><?php echo isset($qvalue['to_date'])? $qvalue['to_date']:0;?></td>
                                                    <td><?php echo isset($qvalue['till_date'])&& $qvalue['till_date']==1 ? "Currently Working here":" ";?></td>
                                                    
													
												 </tr>
												<?php }} ?>
                   
                </tbody>
            </table>

            <h2><p align="center">Additional Certificate And Technical Qualification</p></h2>
            <table border="1" cellspacing="0" cellpadding="0" width="100%">
                <tbody>
                    <tr>
                        <td><p align="center">Name of the Course</p></td>
                        <td><p align="center">Course Date</p></td>
                        <td><p align="center">Valid Upto</p></td>
                        <td><p align="center">Organisation</p></td>
                    </tr>
                    
                    <?php
											  if (isset($certificate) && is_array($certificate) && count($certificate) > 0) {
                                                foreach ($certificate as $qkey => $qvalue) {
                                                   ?>
												 <tr>
													<td><?php echo isset($qvalue['course'])?$qvalue['course']:"";?></td>
													<td><?php echo date('d M,Y',strtotime($qvalue['course_date']));?></td>
													<td><?php echo date('d M,Y',strtotime($qvalue['valid_date']));?></td>
													<td><?php echo isset($qvalue['organization'])?$qvalue['organization']:"";?></td>
													
												 </tr>
												<?php }} ?>
                    
                </tbody>
            </table>

            <h2><p align="center">Other</p></h2>
            <table border="1" cellspacing="0" cellpadding="0" width="100%">
                <tbody>
                    <tr>
                        <td style="width:50%"><p align="center">Additional Skills</p></td>
                        <td style="width:50%"><p align="center">Additional Information</p></td>
                    </tr>
                    <tr>
                        <td><p align="center"><?php echo isset($candidate['additional_skill']) ?$candidate['additional_skill']:'';?></p></td>
                        <td><p align="center"><?php echo isset($candidate['additional_info']) ?$candidate['additional_info']:'';?></p></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </body>
</head>
</html>

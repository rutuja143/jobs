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
   <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
   <style>
      body {
         font-family: 'Roboto', sans-serif;
         margin: 0
      }

      @page {
         margin-top: 10px;
         margin-bottom: 50px;
      }

      .container {
         width: 700px;
         margin: 0px auto;
      }

      .h1 {
         text-align: center;
         margin-bottom: 20px;
         text-decoration: underline;
         font-size: 36px;
      }

      h4 {
         padding: 3px 6px 4px 10px;
         text-transform: uppercase;
      }

      h2 {
         font-size: 19px;
         font-weight: 500;
         padding: 3px 6px 4px 10px;
         text-transform: uppercase;
      }

      ul {
         list-style: none;
         margin: 0;
         padding: 0
      }

      .p-tag {
         margin-top: 0;
         margin-bottom: 10px;
         float: left;
         width: 50%;
      }

      .p-tagf {
         width: 100%;
         float: none
      }

      li {
         overflow: hidden
      }

      .head_color {
         background-color: #007bff;
      }

      p.underline {
         display: inline-block;
         width: 72%;
         font-size: 15px;
         margin: 0
      }

      p.f-w {
         width: 22%;
         display: inline-block;
         margin-right: 5px;
         font-size: 14px;
         margin: 0
      }

      p.f-a {
         width: 27%;
         display: inline-block;
         margin-right: 5px;
         font-size: 14px;
         margin: 0
      }

      #customers {
         border-collapse: collapse;
         width: 100%;
      }

      #customers td,
      #customers th {
         border: 1px solid #adadad;
         padding: 8px;
      }

      #customers th {
         #customers th {
            text-align: center;
         }
      }

      label {
         display: block;
         border: 1px solid #000;
         margin-bottom: 50px;
         padding: 10px;
      }

      .flyleaf {
         page-break-after: always;
      }

      #header,
      #footer {
         position: fixed;
         left: 0;
         right: 0;
         color: #000;
         font-size: 0.9em;
      }

      #header {
         top: -10px;
      }

      #footer {
         bottom: 10px;
         border-top: 0.1pt solid #000;
      }

      #header table,
      #footer table {
         width: 100%;
         border-collapse: collapse;
         border: none;
      }

      #header td,
      #footer td {
         padding: 0;
         width: 50%;
      }

      table {
         /* border-left: 0.01em solid #ccc;
         border-right: 0;
         border-top: 0.01em solid #ccc;
         border-bottom: 0;
         border-collapse: collapse; */
      }

      table td,
      table th {
         /* border-left: 0;
         border-right: 0.01em solid #ccc;
         border-top: 0;
         border-bottom: 0.01em solid #ccc; */
      }

      .info_li {
         margin-bottom: 15px;
      }

      .page-number {
         text-align: center;
      }

      .page-number:before {
         content: "Page "counter(page);
      }

      table {
         border-collapse: collapse;
         width: 100%;
      }

      td,
      th {
         text-transform: capitalize;
         text-align: left;
         padding: 8px;
      }

      tr:nth-child(even) {}
   </style>

<body>
   <div id="header">
   </div>
   <?php /*<div id="footer">
      <p class="page-number"></p>
   </div> */ ?>
   <div class="container">
      <!-- <table  cellspacing="0" cellpadding="0" width="100%">
            <tbody>
            
            
            <tr>
                        <td style="width:20%;"><img src="<?php echo IMAGE_PATH_FRONTEND; ?>logo.png" alt="falcon"></td>
                        <td>201 Creado Apartments,</td>
                    
                    </tr>
                    <tr>
                        
                        <td>201 Creado Apartments,</td>
                        <td>Juhu Church Raod</td>
                        <td>Juhu, Mumbai- 400049 India</td>
                        <td>P : +91 88980 0902</td>
                        <td>E : deepak@falconmsl.com</td>
                        <td>W : www.falconjobs.net</td>
                    </tr>
                    </tbody>
            </table> -->
      <table>
         <tbody>
            <tr>
               <td style="width:60%;"><img src="<?php echo IMAGE_PATH_FRONTEND; ?>logo.png" alt="falcon" style="height: 129px;"></td>
               <td style="text-transform:none;">201 Creado Apartments,<br>
                  Juhu Church Raod,<br>
                  Juhu, Mumbai- 400049 India<br>
                  P : +91 8898080904<br>
                  E : hr6@falconmsl.com<br>
                  W : www.falconjobs.net<br>
               </td>
            </tr>
            <tr>
            </tr>
         </tbody>
      </table>
      <table>
         <tbody>
            <h4 style="text-transform:upercase;">FALCON ID # <?php echo $candidate['id']; ?></h4>
            <h4 style="text-transform:upercase;"><?php echo ucwords($division['name']); ?> / <?php echo ucwords($designation['name']); ?></h4>
            <tr>
               <th>Residential Country : </th>
               <td><?php echo $edu_country[$candidate['country']]; ?></td>
               <th>Nationality :</th>
               <td><?php echo $edu_country[$candidate['nationality']]; ?></td>
            </tr>
            <tr>
               <th>Resume Title :</th>
               <td><?php echo $candidate['resume_title']; ?></td>
               <th>Notice Period : </th>
               <td><?php echo $candidate['notice_period']; ?> days</td>
            </tr>
         </tbody>
      </table>
      <table border="1">
         <h2 style="text-transform:upercase; background-color:#1a51a4; color:#fff;margin: 22px 0px 0px 0px;">EDUCATION</h2>
         <tbody>
            <tr>
               <th>Qualification</th>
               <th>Institute / College /University </th>
               <th>Year</th>
               <th>Country</th>
            </tr>
            <?php
            if (isset($qualification) && is_array($qualification) && count($qualification) > 0) {
               foreach ($qualification as $key => $value) {
                  ?>
                  <tr>
                     <td><?php echo $edu_course[$value['qualification']]; ?></td>
                     <td><?php echo $value['university']; ?></td>
                     <td><?php echo $value['passing_year']; ?></td>
                     <td><?php

                                 if (isset($edu_country[$value['country']])) {
                                    echo $edu_country[$value['country']];
                                 } else {
                                    echo 'Not Mention';
                                 }; ?></td>
                  </tr>
            <?php
               }
            }
            ?>

         </tbody>
      </table>
      <table border="1">
         <h2 style="text-transform:upercase; background-color:#1a51a4; color:#fff;margin: 22px 0px 0px 0px;">CAREER SUMMARY</h2>
         <tbody>
            <tr>
               <th>Position </th>
               <th>Employer </th>
               <th>Country </th>
               <th>From Month/ Year </th>
               <th>To Month/ Year </th>
            </tr>

            <?php
            if (isset($career) && is_array($career) && count($career) > 0) {
               foreach ($career as $key => $value) {
                  ?>
                  <tr>
                     <td><?php echo $value['position']; ?></td>
                     <td><?php echo $value['employer']; ?></td>
                     <td><?php echo $edu_country[$value['country']]; ?></td>
                     <td><?php echo $value['from_date']; ?></td>
                     <td><?php echo $value['to_date']; ?></td>
                  </tr>
            <?php
               }
            }
            ?>
         </tbody>
      </table>
      <table border="1">
         <h2 style="text-transform:upercase; background-color:#1a51a4; color:#fff;    margin: 22px 0px 0px 0px;">ADDITIONAL CERTIFICATE AND TECHNICAL QUALIFICATION</h2>
         <tbody>
            <tr>
               <th>Name of the Course </th>
               <th>Course Date</th>
               <th>Valid upto </th>
               <th>Name of Organisation </th>
            </tr>
            <?php
            if (isset($certificate) && is_array($certificate) && count($certificate) > 0) {
               foreach ($certificate as $key => $value) {
                  ?>
                  <tr>
                     <td><?php echo $value['course']; ?></td>
                     <td><?php echo date('d M Y', strtotime($value['course_date'])); ?></td>
                     <td><?php echo date('d M Y', strtotime($value['valid_date'])); ?></td>
                     <td><?php echo $value['organization']; ?></td>
                  </tr>
            <?php
               }
            }
            ?>
         </tbody>
      </table>
      <br>
      <table>
         <tbody>
            <tr>
               <th style="padding: 0px 0px 0px 0px; width: 25%;">Current Salary :</th>
               <td style="padding: 0px 0px 0px 0px;"><?php echo ($candidate['current_salary'] != 0) ? $candidate['current_salary'] : 'Not Mention'; ?></th>
               <th style="padding: 0px 0px 0px 0px; width: 25%;">Expected Salary : </th>
               <td style="padding: 0px 0px 0px 0px;"><?php echo ($candidate['expected_salary'] != 0) ?  $candidate['expected_salary'] : 'Not Mention'; ?> </th>
            </tr>
         </tbody>
      </table>
      <br>

       <h2 style="padding: 1px 0px 10px 0px; text-transform:upercase; font-weight: 900;">Additional Skills :</h2>
               <p style="padding: 18px 0px 0px 0px; ">
               <?php echo $candidate['additional_skill']; ?>
               </p>
       <h2 style="padding: 1px 0px 10px 0px; text-transform:upercase; font-weight: 900;">Additional Information :</h2>
               <p style="padding: 18px 0px 0px 0px; ">
               <?php echo $candidate['additional_info']; ?>
               </p>
   </div>
</body>
</head>

</html>
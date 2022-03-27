<style>
table th{
    background-color:#1a51a4;
    color:#fff;
    text-transform: capitalize;
}

.transaction-section{
    margin: 47px 0px 23px 0px;
}

#Extension1
{
   border-collapse: collapse;
   border-spacing: 0;
   border:1px #DDDDDD solid;   color: #333333;
   font-family: Arial;
   font-size: 13px;
   font-weight: normal;
   font-style: normal;
   width: 100%;
}
#Extension1 th,
#Extension1 td
{
   padding: 4px 4px 4px 4px;
   vertical-align: top;
}
#Extension1 th 
{
   text-align: left;
  
   font-weight: normal;
   font-style: normal;
   background-color:#1a51a4;
    color:#fff;
    text-transform: capitalize;
}
#Extension1 thead th
{
    background-color:#1a51a4;
    color:#fff;
    font-size: 16px;
    text-transform: capitalize;
}
#Extension1 > tbody > tr:nth-child(2n+1) > td, #Extension1 > tbody > tr:nth-child(2n+1) > th 
{
   
}
@media screen and (max-width:768px)
{
   #Extension1 thead:after
   {
      clear: both;
      content: " ";
      display: block;
      font-size: 0;
      height: 0;
	     visibility: hidden;
   }
   #Extension1 th,
   #Extension1 td 
   {
      margin: 0;
      vertical-align: top;
   }
   #Extension1 th
   {
      text-align: left;
   }
   #Extension1
   {
      display: block;
      position: relative;
      width: 100%;
   }
   #Extension1 thead
   {
      display: block;
      float: left;
   }
   #Extension1 tbody
   {
      display: block;
      position: relative;
      overflow-x: auto;
      white-space: nowrap;
      width: auto;
   }
   #Extension1 thead tr
   {
      display: block;
   }
   #Extension1 th
   {
      display: block;
      text-align: right;
   }
   #Extension1 tbody tr
   {
      display: inline-block;
      vertical-align: top;
   }
   #Extension1 td
   {
      display: block;
      min-height: 1.25em;
      text-align: left;
   }
   #Extension1 th
   {
      border-bottom: 0;
      border-left: 0;
   }
   #Extension1 td
   {
      border-left: 0;
      border-right: 0;
      border-bottom: 0;
   }
   #Extension1 tbody tr
   {
      border-left: 1px solid #DDDDDD;
   }
   #Extension1 th:last-child,
   #Extension1 td:last-child
   {
      border-bottom: 1px solid #DDDDDD;
   }
}
#wb_LayoutGrid1
{
   clear: both;
   position: relative;
   table-layout: fixed;
   display: table;
   text-align: center;
   width: 100%;
   background-color: transparent;
   background-image: none;
   border: 0px #CCCCCC solid;
   -webkit-box-sizing: border-box;
   -moz-box-sizing: border-box;
   box-sizing: border-box;
   margin-right: auto;
   margin-left: auto;
   max-width: 1020px;
}
#LayoutGrid1
{
   -webkit-box-sizing: border-box;
   -moz-box-sizing: border-box;
   box-sizing: border-box;
   padding: 0px 15px 0px 15px;
   margin-right: auto;
   margin-left: auto;
}
#LayoutGrid1 .row
{
   margin-right: -15px;
   margin-left: -15px;
}
#LayoutGrid1 .col-1
{
   -webkit-box-sizing: border-box;
   -moz-box-sizing: border-box;
   box-sizing: border-box;
   font-size: 0px;
   min-height: 1px;
   padding-right: 15px;
   padding-left: 15px;
   position: relative;
}
#LayoutGrid1
{
}
#LayoutGrid1 .col-1
{
   float: left;
}
#LayoutGrid1 .col-1
{
   width: 100%;
   text-align: left;
}
#LayoutGrid1:before,
#LayoutGrid1:after,
#LayoutGrid1 .row:before,
#LayoutGrid1 .row:after
{
   display: table;
   content: " ";
}
#LayoutGrid1:after,
#LayoutGrid1 .row:after
{
   clear: both;
}
@media (max-width: 480px)
{
#LayoutGrid1 .col-1
{
   float: none;
   width: 100%;
}
}
#wb_Heading1
{
   background-color: transparent;
   background-image: none;
   border: 0px #FFFFFF solid;
   -webkit-box-sizing: border-box;
   -moz-box-sizing: border-box;
   box-sizing: border-box;
   padding: 25px 0px 25px 0px;
}
#Heading1
{
   color: #696969;
   font-family: Arial;
   font-weight: bold;
   font-size: 32px;
   margin: 0;
   text-align: center;
}
#wb_Extension1
{
   display: inline-block;
   width: 100%;
   z-index: 1;
}
#wb_Heading1
{
   display: inline-block;
   width: 100%;
   text-align: center;
   z-index: 0;
}



</style>

<section class="transaction-section">
<div class="container">
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="table-transaction" >
            <table class="table-heading" id="Extension1" >
            <thead>
    <tr>
        <th>Order Id</th>
        
        <th>payment method</th>
        <th>created date</th>
        <th>description</th>
        <th>status</th>
    <tr>

    <thead>

    <tbody>
        <?php

        if (isset($list) && is_array($list) && count($list) > 0) {
            foreach ($list as $key => $value) {
                ?>
    <tr>
        <td><?php echo $value['id']; ?></td>
        
        <td>Credi Max payment gateway</td>
        <td><?php echo date('d-m-Y h:i a', strtotime($value['created_date'])); ?></td>
        <td><?php echo $value['description']; ?></td>
        <td><?php
                    if ($value['status'] == 1) {
                        echo 'requested ';
                    }
                    
                    if ($value['status'] == 2) {
                        echo ' cancel by user ';
                    }
                    
                    if ($value['status'] == 3) {
                        echo 'success  ';
                    }
                    
                    if ($value['status'] == 4) {
                        echo 'fail  ';
                    }
                     ?></td>
    <tr>
<?php
    }
}
?>
</tbody>
</table>
            
            
            </div>
        
        </div>
    </div>
</div>
</section>
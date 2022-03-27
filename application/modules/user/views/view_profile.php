 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <section class="content-header">
     <div class="container-fluid">
       <div class="row mb-2">
         <div class="col-sm-6">
           <h1>Profile</h1>
         </div>
         <div class="col-sm-6">
           <ol class="breadcrumb float-sm-right">
             <li class="breadcrumb-item"><a href="#">Home</a></li>
             <li class="breadcrumb-item active">User Profile</li>
           </ol>
         </div>
       </div>
     </div><!-- /.container-fluid -->
   </section>

   <!-- Main content -->
   <section class="content">
     <div class="container-fluid">
       <div class="row">
         <div class="col-md-3">

           <!-- Profile Image -->
           <div class="card card-primary card-outline">
             <div class="card-body box-profile">
               <div class="text-center">

               </div>

               <h3 class="profile-username text-center"><?php echo $employer_info['name']; ?></h3>

               <p class="text-muted text-center"><?php echo $employer_info['email']; ?></p>

             </div>
             <!-- /.card-body -->
           </div>
           <!-- /.card -->

           <!-- About Me Box -->
           <div class="card card-primary">
             <div class="card-header">
               <h3 class="card-title">About Me</h3>
             </div>
             <!-- /.card-header -->
             <div class="card-body">
               <strong><i class="fas fa-envelope mr-1"></i>contactno</strong>

               <p class="text-muted">
                 <?php echo $employer_info['contactno']; ?>
               </p>

               <hr>




             </div>
             <!-- /.card-body -->
           </div>
           <!-- /.card -->
         </div>
         <!-- /.col -->
         <div class="col-md-9">
           <div class="card">
             <div class="card-header p-2">
               <ul class="nav nav-pills">
                 <li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab">Payment Transactions</a></li>
               </ul>
             </div><!-- /.card-header -->
             <div class="card-body">
               <div class="tab-content">
                 <div class="active tab-pane" id="activity">
                   <div class="container">
                     <div class="row">
                       <div class="col-sm-12">
                         <div class="card">

                           <!-- /.card-header -->

                           <div class="card-body table-responsive p-0">
                             <table class="table table-hover">
                               <thead>
                                 <tr>
                                   <th>Transaction id</th>
                                   <th>Package Info</th>
                                   <th>Payment Method</th>
                                   <th>Status</th>
                                   <th>Description</th>
                                   <th>Created Date</th>
                                   <th>Created By</th>

                                 </tr>
                               </thead>
                               <tbody>
                                 <?php
                                  if (isset($payment_transactions) && is_array($payment_transactions) && count($payment_transactions) > 0) {
                                    foreach ($payment_transactions as $qkey => $qvalue) {
                                      ?>
                                     <tr>
                                       <td><?php echo $qvalue['id']; ?></td>
                                       <td><?php echo $employer_packages[$qvalue['package_id']]['package_name']; ?></td>
                                       <td><?php if ($qvalue['payment_method'] == 1) {
                                                  echo 'Bank Transfer';
                                                } else {
                                                  echo 'Payment Gateway';
                                                }; ?></td>
                                       <td><?php if ($qvalue['status'] == 1) {
                                                  echo 'Active';
                                                }; ?></td>
                                       <td><?php echo $qvalue['description']; ?></td>
                                       <td><?php echo date('d M Y H:i a', strtotime($qvalue['created_date'])); ?></td>
                                       <td><?php echo $qvalue['created_by']; ?></td>
                                     </tr>
                                 <?php }
                                  } ?>

                               </tbody>
                             </table>
                           </div>
                           <!-- /.card-body -->

                           <div class="card-footer">
                             <div class="row">
                               <div class="col-sm-6">
                                 <h3 class="card-title"></h3>
                               </div>


                             </div>
                           </div>
                           <!-- /.card -->
                         </div>
                       </div>
                     </div>
                   </div>
                 </div>
                 <!-- /.tab-pane -->
                 <!-- /.tab-pane -->
               </div>
               <!-- /.tab-content -->
             </div><!-- /.card-body -->
           </div>
           <!-- /.nav-tabs-custom -->
         </div>
         <!-- /.col -->
       </div>
       <!-- /.row -->
     </div><!-- /.container-fluid -->
   </section>
   <!-- /.content -->
 </div>
 <!-- /.content-wrapper -->
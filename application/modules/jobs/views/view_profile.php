 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <section class="content-header">
     <div class="container-fluid">
       <div class="row mb-2">
         <div class="col-sm-6">
           <h1>Job Preview</h1>
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
         <div class="col-md-6">

           <!-- Profile Image -->

           <!-- /.card -->

           <!-- About Me Box -->
           <div class="card card-primary">
             <div class="card-header">
               <h3 class="card-title">About Job</h3>
             </div>
             <!-- /.card-header -->
             <div class="card-body">
               <strong><i class="fas fa-envelope mr-1"></i>Job Title</strong>

               <p class="text-muted">
                 <?php echo $jobs['title']; ?>
               </p>

               <hr>
               <strong><i class="fas fa-envelope mr-1"></i>Employer Name</strong>

               <p class="text-muted">
                 <?php echo $jobs['employer_name']; ?>
               </p>

               <hr>

               <strong><i class="fas fa-city mr-1"></i>Division</strong>

               <p class="text-muted"><?php echo $division['name']; ?></p>

               <hr>

               <strong><i class="fas fa-flag mr-1"></i>Designation</strong>

               <p class="text-muted"><?php echo $designation['name']; ?></p>

               <hr>
               <strong><i class="fas fa-flag mr-1"></i>Experience</strong>

               <ul>Min Experience (in years) <p class="text-muted"><?php echo $jobs['min_experience']; ?></p>
               </ul>
               <ul>Max Experience (in years) <p class="text-muted"><?php echo $jobs['max_experience']; ?></p>
               </ul>

               <hr>

               <strong><i class="fas fa-city mr-1"></i>Nationality</strong>

               <p class="text-muted"><?php echo $nationality['name']; ?></p>
               <hr>
               <strong><i class="fas fa-city mr-1"></i>Job Description</strong>

               <p class="text-muted"><?php echo $jobs['description']; ?></p>

               <hr>
               <strong><i class="fas fa-city mr-1"></i>Requirement</strong>

               <p class="text-muted"><?php echo $jobs['requirements']; ?></p>

               <hr>
               <strong><i class="fas fa-city mr-1"></i>Job Location</strong>

               <p class="text-muted"><?php echo $jobs['location']; ?></p>

               <hr>

               <strong><i class="fas fa-city mr-1"></i>salary </strong>

               <p class="text-muted"><?php echo $jobs['salary']; ?>(<?php echo $currency_id['code']; ?>(<?php echo $currency_id['symbol']; ?>))</p>

               <hr>
               <strong><i class="fas fa-city mr-1"></i>Certification Requirement</strong>

               <p class="text-muted"><?php echo $jobs['certification']; ?></p>

               <hr>


             </div>
             <!-- /.card-body -->
           </div>
           <!-- /.card -->
         </div>
         <!-- /.col -->

       </div>
     </div>
 </div>
 </div>
 <!-- /.tab-pane -->

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
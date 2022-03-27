<?php $sessiondata = $this->session->userdata('admin_user');

$permission=array();
$permission=$sessiondata['permission'];
//exit;
?>
<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
   <!-- Brand Logo -->
   <a href="<?php echo base_url('adminx'); ?>" class="brand-link">
      <img src="<?php echo IMAGE_PATH_BACKEND; ?>logo.png" alt="admin panel" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Admin Panel</span>
   </a>
   <!-- Sidebar -->
   <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
         <div class="image">
            <img src="<?php echo MEDIA_PATH_FRONTEND; ?><?php echo $sessiondata['image']; ?>" class="img-circle elevation-2" alt="User Image">
         </div>
         <div class="info">
            <a href="#" class="d-block"><?php echo ucwords($sessiondata['name']); ?></a>
         </div>
      </div>
      <!-- Sidebar Menu -->
      <nav class="mt-2">
         <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
                        with font-awesome or any other icon font library -->
          <?php if(isset($permission) && (in_array('admin_candidate_view_list',$permission )|| in_array('admin_candidate_add',$permission ))) { ?>

            <li class="nav-item has-treeview">
               <a href="#" class="nav-link">
                  <i class="nav-icon fas fa-book"></i>
                  <p>
                     Candidate Management
                     <i class="right fas fa-angle-left"></i>
                  </p>
               </a>
               <ul class="nav nav-treeview">
                  <?php //echo '<pre>';
                  //print_r($permission);
                  //exit(); 
                  if(isset($permission) && in_array('admin_candidate_view_list',$permission )) {?>
                                                
                  <li class="nav-item">
                     <a href="<?php echo base_url(); ?>candidate/candidate_admin/entry_list?&search_by_package=1" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>View All</p>
                     </a>
                  </li><?php } ?>
                  <?php  if(isset($permission) && in_array('admin_candidate_add',$permission )) {?>
                  <li class="nav-item">
                     <a href="<?php echo base_url(); ?>candidate/candidate_admin/index" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Add New</p>
                     </a>
                  </li>
                  <?php } ?>
               </ul>
            </li>
                  <?php }?>
            <?php if(isset($permission) && (in_array('admin_admin_view_list',$permission )|| in_array('admin_job_add',$permission ))) { ?>

            <li class="nav-item has-treeview">
               <a href="#" class="nav-link">
                  <i class="nav-icon fa fa-box"></i>
                  <p>
                     Job Management
                     <i class="right fas fa-angle-left"></i>
                  </p>
               </a>
               <ul class="nav nav-treeview">
               <?php  if(isset($permission) && in_array('admin_job_view_list',$permission )) {?>
                  <li class="nav-item">
                     <a href="<?php echo base_url(); ?>jobs/jobs_admin/entry_list" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>View All</p>
                     </a>
                  </li>
               <?php } ?>
               <?php  if(isset($permission) && in_array('admin_job_add',$permission )) {?>
                  <li class="nav-item">
                     <a href="<?php echo base_url(); ?>jobs/jobs_admin/index" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Add New</p>
                     </a>
                  </li>
               <?php } ?>
               </ul>
            </li>
               <?php }?>
            <?php if(isset($permission) && (in_array('admin_employee_view_list',$permission )|| in_array('admin_employee_add',$permission ))) { ?>

            <li class="nav-item has-treeview">
               <a href="#" class="nav-link">
                  <i class="nav-icon fa fa-box"></i>
                  <p>
                     Employee Management
                     <i class="right fas fa-angle-left"></i>
                  </p>
               </a>
               <ul class="nav nav-treeview">
               <?php  if(isset($permission) && in_array('admin_employee_view_list',$permission )) {?>
                  <li class="nav-item">
                     <a href="<?php echo base_url(); ?>employee/employee_admin/entry_list" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>View All</p>
                     </a>
                  </li>
               <?php }?>
               <?php  if(isset($permission) && in_array('admin_employee_add',$permission )) {?>
                  <li class="nav-item">
                     <a href="<?php echo base_url(); ?>employee/employee_admin/entry" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Add New</p>
                     </a>
                  </li>
               <?php }?>
               </ul>
            </li>
               <?php }?>
            <?php if(isset($permission) && (in_array('admin_employer_view_list',$permission )|| in_array('admin_employer_add',$permission ))) { ?>

           
            <!--<li class="nav-item has-treeview">
               <a href="#" class="nav-link">
                  <i class="nav-icon fa fa-box"></i>
                  <p>
                     Employer Management
                     <i class="right fas fa-angle-left"></i>
                  </p>
               </a>
               <ul class="nav nav-treeview">
               <?php  if(isset($permission) && in_array('admin_employer_view_list',$permission )) {?>
                  <li class="nav-item">
                     <a href="<?php echo base_url(); ?>user/user_admin/entry_list?type=3" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>View All</p>
                     </a>
                  </li>
               <?php } ?>
               </ul>
            </li>-->
            <?php  }?>
            <li class="nav-item has-treeview">
               <a href="<?php echo base_url(); ?>login/admin_login/logout" class="nav-link">
                  <i class="nav-icon fa fa-box"></i>

                  Logout</a>
            </li>
         </ul>
      </nav>
      <!-- /.sidebar-menu -->
   </div>
   <!-- /.sidebar -->
</aside>
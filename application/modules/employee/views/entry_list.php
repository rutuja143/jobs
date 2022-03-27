<!-- Content Wrapper. Contains page content -->
<?php $get = $this->input->get();
$sessiondata = $this->session->userdata('admin_user');
$permission=array();
$permission=$sessiondata['permission'];
?>
 
          
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-4">
                    <h1>Employee Management</h1>
                </div>
                <?php  if(isset($permission) && in_array('admin_employee_add',$permission )) {?>
                  
                <div class="col-sm-1.5">
                 <a href="<?php echo site_url('employee/employee_admin/entry'); ?>"><button type="button" class="btn btn-block bg-gradient-primary btn-sm">Add New</button>
                    </a>

                </div>
                <?php }?>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <?php if ($this->session->flashdata('add_feedback')) { ?>
                        <div class="alert alert-info alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            <h4><i class="icon fa fa-check"></i><?php echo $this->session->flashdata('add_feedback'); ?></h4>
                        </div>
                    <?php }
                    if ($this->session->flashdata('update_feedback')) {
                        ?>
                        <div class="alert alert-success alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            <h4><i class="icon fa fa-check"></i><?php echo $this->session->flashdata('update_feedback'); ?></h4>
                        </div>
                    <?php }
                    if ($this->session->flashdata('delete_feedback')) { ?>
                        <div class="alert alert-danger alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            <h4><i class="icon fa fa-check"></i><?php echo $this->session->flashdata('delete_feedback'); ?></h4>
                        </div>
                    <?php } ?>
                </div>

            </div>
            <!-- /.row -->
            <?php /* <div class="row">
                <div class="col-12">
                    <div class="card card-warning">
                        <div class="card-header general">
                            <h3 class="card-title ">Filter</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body hidden">
                            <form method="post" action="<?php echo site_url('jobs/jobs_admin/search'); ?>">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <!-- text input -->
                                        <div class="form-group">
                                            <label>Job Date</label>
                                            <input type="text" class="form-control" name="daterange" value="01/01/2019 - 01/15/2019" />
                                        </div>
                                    </div>


                                    <div class="col-sm-2">
                                        <button type="submit" class="btn btn-block bg-gradient-primary " style="margin-top: 31px;">Filter</button>
                                    </div>
                                    <div class="col-sm-2">

                                        <a href="<?php echo site_url('jobs/jobs_admin/entry_list') ?>"> <button type="button" class="btn btn-block bg-gradient-primary " style="margin-top: 31px;">View All</button></a>
                                    </div>

                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div> */ ?>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="row">
                                <div class="col-sm-3">
                                    <h3 class="card-title">List</h3>
                                </div>
                                <div class="col-sm-3">
                                    <p style="margin-top: 12px;">Showing 1 to <?php echo count($list) ?> of <?php echo $total; ?> entries</p>
                                </div>
                                <div class="col-sm-6">
                                    <?php echo $this->pagination->create_links(); ?>
                                </div>
                            </div>



                        </div>
                        <!-- /.card-header -->
                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>name</th>
                                        <th>email</th>
                                        <th>role</th>
                                        <th>contactno</th>
                                        <th>created_date</th>
                                        <?php  if(isset($permission) && (in_array('admin_employee_view',$permission )||in_array('admin_employee_update',$permission )||in_array('admin_employee_delete',$permission ))) {?>
                   
                   <th>Action</th>
                   <?php }?>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    if (isset($list) && is_array($list) && count($list) > 0) {
                                        foreach ($list as $ckey => $cvalue) {
                                            ?>
                                            <tr>
                                                <td><?php echo $cvalue['id']; ?></td>
                                                <td><?php echo $cvalue['name']; ?></td>
                                                <td><?php echo $cvalue['email']; ?></td>
                                                <td><?php echo $cvalue['role']; ?></td>
                                                <td><?php echo $cvalue['contactno']; ?></td>
                                                <td><?php echo date('d-m-Y', strtotime($cvalue['created_date'])); ?></td>
                                                <td class="project-actions ">
                                        <?php  if(isset($permission) && in_array('admin_employee_update',$permission )) {?> <a class="btn btn-info btn-sm" href="<?php echo site_url('employee/employee_admin/edit');  ?>?id=<?php echo $cvalue['id']; ?> "><i class="fas fa-pencil-alt"></i>Edit </a> <?php }?>
                                                    <?php  if(isset($permission) && in_array('admin_employee_delete',$permission )) {?>  <a class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you wan to delete?')" href="<?php echo site_url('employee/employee_admin/delete') . '/' . $cvalue['user_id']; ?> "> <i class="fas fa-trash"></i> Delete</a><?php }?>

                                                </td>
                                            </tr>
                                    <?php
                                        }
                                    }
                                    ?>

                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                            <div class="row">
                                <div class="col-sm-3">
                                    <h3 class="card-title"></h3>
                                </div>
                                <div class="col-sm-3">
                                    <p style="margin-top: 12px;">Showing 1 to <?php echo count($list) ?> of <?php echo $total; ?> entries</p>
                                </div>
                                <div class="col-sm-6">
                                    <?php echo $this->pagination->create_links(); ?>
                                </div>
                            </div>
                        </div>
                        <!-- /.card -->
                    </div>
                </div>
                <!-- /.row -->

                <!-- /.row -->
            </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
<script>
    $(function() {
        $('input[name="daterange"]').daterangepicker({
            opens: 'left'
        }, function(start, end, label) {
            console.log("A new date selection was made: " + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD'));
        });
    });
</script>

<?php /*
$roles = $this->config->item('roles');
?>
<div class="container">
    <div class="form">
        <div class="row">
            <div class="col-md-12 col-sm-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h3>Search Employee</h3>
                    </div>
                    <div class="x_content search_content">
                        <form id="demo-form2" class="form-horizontal" action="<?php echo site_url('employee/entry_list'); ?>" method="GET">
                            <div class="form-group label_fields">
                                <label class="control-label col-md-2 col-sm-2 col-xs-12 hidden" for="name">Code<span class="required">*</span></label>
                                <label class="control-label col-md-2 col-sm-2 col-xs-12 hidden" for="role">Role<span class="required">*</span></label>
                                <label class="control-label col-md-2 col-sm-2 col-xs-12 hidden" for="contact">Contact No.<span class="required">*</span></label>
                                <label class="control-label col-md-2 col-sm-2 col-xs-12 hidden" for="email">Email<span class="required">*</span></label>
                            </div>
                            <div class="form-group select_fields">
                                <div class="col-md-2 col-sm-2">
                                    <input required="" type="text" value="<?php echo $this->input->get('name'); ?>" class="form-control" tabindex="1" name="name" placeholder="Name" id="name">
                                </div>
                                <div class="col-md-2 col-sm-2 hidden">
                                    <select class="chosen-select" tabindex="2" name="" id="role">
                                        <option>Select Role</option>
                                        <option>Manager</option>
                                        <option>Senior Manager</option>
                                        <option>Supervisor</option>
                                        <option>Staff</option>
                                    </select>
                                </div>
                                <div class="col-md-2 col-sm-2 hidden">
                                    <input type="text" class="form-control" value="" tabindex="3" id="contact">
                                </div>
                                <div class="col-md-2 col-sm-2 hidden">
                                    <input type="email" class="form-control" tabindex="4" id="email">
                                </div>
                                <input id="btn-search" tabindex="4" type="submit" class="btn btn-default submit-btn" value="Search">
                                <!--<input tabindex="4" type="reset" value="Clear" class="btn btn-default clear-btn">
                                <a tabindex="5" class="btn btn-default submit-btn" title="Search Employee" href=""><i class="fa fa-search" aria-hidden="true"></i>&nbsp;Search</a>-->
                                <a tabindex="6" class="btn btn-default view-btn" title="View All Employees" href="<?php echo site_url('employee/entry_list'); ?>"><i class="fa fa-newspaper-o" aria-hidden="true"></i>&nbsp;View All</a>
                                <a tabindex="7" class="btn btn-default add-btn"  title="Add Employee" href="<?php echo site_url('employee'); ?>"><i class="fa fa-plus-square" aria-hidden="true"></i>&nbsp;Add Employee</a>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="table_content">
                    <h3>Employee List</h3>
                    <div class="total">
                        <span>Total Display : <?php echo count($list); ?></span>
                        <span>Total Employee : <?php echo $total; ?></span>
                    </div>
                    <?php echo $this->session->flashdata('message'); ?>
                    <?php echo $this->pagination->create_links(); ?>
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr class="table_heading">
                                <th>Employee Name</th>
                                <th>Role</th>
                                <th>Email</th>
                                <th>Contact No.</th>
                                <th>Landline Number</th>
    <!--                            <th>Employee Code</th>-->
    <!--                            <th>Language</th>-->
                                <th>Address</th>
                                <th>Actions</th>
                            </tr>
                        </thead>

                        <?php
                        $estimates = $this->config->item('estimate');
                        foreach ($list as $key => $value) {
                            ?>
                            <tbody> 
                                <tr>
                                    <td><?php echo ucwords($value['name']); ?></td>
                                    <td><?php echo $rolesname[$value['role']]; ?></td>
                                    <td><?php echo $value['email']; ?></td>
                                    <td><?php echo $value['contactno']; ?></td>
                                    <td><?php echo $value['landline']; ?></td>
    <!--                                <td><?php echo $value['code']; ?></td>-->
    <!--                                <td><?php
                                    if (isset($langemplist[$value['id']]) && is_array($langemplist[$value['id']])) {
                                        foreach ($langemplist[$value['id']] as $k => $v) {
                                            echo ucwords($language[$v] . ',&nbsp;');
                                        }
                                    }
                                    ?></td>-->
                                    <td><?php echo $value['address']; ?></td>

                                    <td>
                                        <a title="Update Employee" href="<?php echo base_url('employee/edit?id=') . $value['id']; ?>"><i class="fa fa-pencil fa-lg" aria-hidden="true"></i>&nbsp;Edit&nbsp;</a>
    <!--                                    <a title="Delete Employee" href="javascript:void(0)" onclick="del('Delete', 'btn-red', 'Kindly Confirm', 'Are you sure you want to delete <?php echo ucwords($value['name']); ?>?', '<?php echo base_url('employee/delete?id=') . $value['id']; ?>');"><i class="fa fa-trash fa-lg" aria-hidden="true"></i>&nbsp;Delete&nbsp;</a>-->
                                        <a onclick="deleteemp(<?php echo $value['id']; ?>)" href="#"><i class="fa fa-trash fa-lg" aria-hidden="true"></i>Delete?</a>
                                    </td>
                                </tr>  <?php
                            }
                            ?>

                        </tbody>
                    </table> 
                    <?php echo $this->pagination->create_links(); ?>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    function deleteemp(id)
    {
        if (confirm('Are you sure you want to De-activate user?'))
        {
            $.ajax({
                type: 'POST',
                url: '<?php echo site_url('employee/delete') ?>',
                data: {'emp_id': id},
                success: function (data)
                {
                    alert("Deativated succesfully");
                    window.location.reload(true);
                },
                error: function ()
                {
                    //alert("Could not approved");
                }
            })
        }
    }
</script> */ ?>
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
                    <h1>Employer Management</h1>
                </div>
                <div class="col-sm-1.5">


                </div>
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
            <div class="row">
                <div class="col-12">
                    <div class="card card-warning">
                        <div class="card-header general">
                            <h3 class="card-title ">Filter</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <form method="post" action="<?php echo site_url('user/user_admin/search'); ?>">
                                <div class="row">
                                    <div class="col-sm-2">
                                        <!-- text input -->
                                        <div class="form-group">
                                            <label>Name</label>
                                            <input type="text" class="form-control" placeholder="Enter ..." name="search_name" value="<?php echo isset($get['search_name'])  ? $get['search_name'] : ''; ?>">
                                        </div>
                                    </div>
                                    <div class="col-sm-2">
                                        <div class="form-group">
                                            <label>Email</label>
                                            <input type="email" class="form-control" placeholder="Enter ..." name="search_email" value="<?php echo isset($get['search_email'])  ? $get['search_email'] : ''; ?>">
                                        </div>
                                    </div>
                                    <div class="col-sm-2">
                                        <button type="submit" class="btn btn-block bg-gradient-primary " style="margin-top: 31px;">Filter</button>
                                    </div>
                                    <div class="col-sm-2">

                                        <a href="<?php echo site_url('user/user_admin/entry_list') ?>"> <button type="button" class="btn btn-block bg-gradient-primary " style="margin-top: 31px;">View All</button></a>
                                    </div>


                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="row">
                                <div class="col-sm-6">
                                    <h3 class="card-title">List</h3>
                                </div>
                                <div class="col-sm-4">
                                    <p style="margin-top: 12px;">Showing 1 to <?php echo count($list) ?> of <?php echo $total['total'] ?> entries</p>
                                </div>
                                <?php echo $this->pagination->create_links(); ?>

                            </div>



                        </div>
                        <!-- /.card-header -->
                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>User ID</th>
                                        <th>Created Date</th>
                                        <th>Name</th>
                                        <th>Status</th>
                                        <th>Email</th>
                                        <th>Contact No</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    
                                    if (isset($list) && is_array($list) && count($list) > 0) {
                                        foreach ($list as $ckey => $cvalue) {
                                            ?>
                                            <tr>
                                                <td><?php echo $cvalue['id']; ?></td>
                                                <td><?php echo date('d M Y H:i a', strtotime($cvalue['created_date'])); ?></td>
                                                <td><?php echo $cvalue['name']; ?></td>
                                                <td><?php if ($cvalue['status'] == 1) {
                                                                echo 'Active';
                                                            }; ?></td>
                                                <td><?php echo $cvalue['email']; ?></td>
                                                <td><?php echo $cvalue['contactno']; ?></td>
                                                <td class="project-actions ">
                                                        <?php  if(isset($permission) && in_array('admin_employer_add_package',$permission )) {?> <a class="btn btn-primary btn-sm" href="" data-toggle="modal" data-target="#employer-package-modal"><i class="fas fa-folder"></i>Add Package</a> <?php  }?>
                                                    <?php  if(isset($permission) && in_array('admin_employer_view',$permission )) {?>   <a class="btn btn-primary btn-sm" href="<?php echo site_url('/user/user_admin/view') . '/' . $cvalue['id']; ?> "><i class="fas fa-folder"></i>View Detail</a><?php  }?>
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
                                <div class="col-sm-6">
                                    <h3 class="card-title"></h3>
                                </div>
                                <div class="col-sm-4">
                                    <p style="margin-top: 12px;">Showing 1 to <?php echo count($list) ?> of <?php echo $total['total'] ?> entries</p>
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

<div class="modal fade register" id="employer-package-modal" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button class="close" data-dismiss="modal" type="button">&times;</button>
                <h2 class="title">Select Package</h2>
            </div>
            <div class="modal-body">
                <form enctype="multipart/form-data" method="post" id="employer-package-form" class="form-horizontal login-sec col-md-12">
                    <input type="hidden" value="1" name="payment_method">
                    <?php
                    foreach ($employer_packages as $key => $value) {
                        ?>
                        <p class="">
                            <label for="reg_email"><?php echo $value['package_name']; ?> <span class="required">*</span></label>
                            <input type="radio" required class="" name="package_name" id="reg_email" value="<?php echo $value['id']; ?>">
                        </p>

                    <?php
                    }
                    ?>
                    <p class="">
                        <label for="reg_email">Bank Transfer information <span class="required">*</span></label>
                        <input type="text" required name="description" value="">
                    </p>
                    <p class="form-group form-row">
                        <input type="submit" class="btn btn-info btn-block" name="login" value="Confirm Package?">
                    </p>

                </form>

            </div>
        </div>
    </div>
</div>
<script src="<?php echo JS_PATH_BACKEND; ?>jquery.validate.js"></script>
<script type="text/javascript">
    jQuery(document).ready(function() {
        jQuery("#employer-package-form").validate({
            rules: {
                login_email: {
                    required: true,
                },
                login_password: {
                    required: true,
                }
            },
            messages: {
                login_email: {
                    required: "Email Required",
                },
                login_password: {
                    required: "Password Required",
                }
            },
            errorElement: 'p',
            errorPlacement: function(error, element) {
                error.insertAfter(element);
            },
            submitHandler: function(form) {
                jQuery.ajax({
                    type: "POST",
                    url: "<?php echo site_url(); ?>payment/insert",
                    data: jQuery(form).serialize(),
                    success: function(data) {
                        window.location = "<?php echo site_url('user/user_admin/preview'); ?>"+"?id=";
                    },
                    error: function(data) {
                        alert('Something went wrong');
                    }
                });
                return false;
            }

        });

    });
</script>
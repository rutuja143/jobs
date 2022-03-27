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
                    <h1>Job Management</h1>
                </div>
                <?php  if(isset($permission) && in_array('admin_job_add',$permission )) {?>
                <div class="col-sm-1.5">
                    <a href="<?php echo site_url('jobs/jobs_admin/entry'); ?>"><button type="button" class="btn btn-block bg-gradient-primary btn-sm">Add New</button>
                    </a>

                </div>
               <?php } ?>
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
                            <form method="post" action="<?php echo site_url('jobs/jobs_admin/search'); ?>">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <!-- text input -->
                                        <div class="form-group">
                                            <label>Job Date</label>
                                            <input type="text" autocomplete="off" class="form-control daterange" name="daterange" value=" " />
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <!-- text input -->
                                        <div class="form-group">
                                            <label>Job Title</label>
                                           
                                            <input type="text" class="form-control" placeholder="Enter ..." name="title" value="<?php echo isset($get['title'])  ? $get['title'] : ''; ?>">
                                        </div> </div>
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
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="row">
                                <div class="col-sm-3">
                                    <h3 class="card-title">List</h3>
                                </div>
                                <div class="col-sm-3">
                                    <p style="margin-top: 12px;">Showing 1 to <?php echo count($list) ?> of <?php echo $total['total'] ?> entries</p>
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
                                        <th>Job Title</th>
                                        <th>Industry</th>
                                        <th>Designation</th>
                                        <th>Posted date</th>
                                        <?php  if(isset($permission) && (in_array('admin_job_view',$permission )||in_array('admin_job_update',$permission )||in_array('admin_job_delete',$permission ))) {?>
                   
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
                                                <td><?php echo $cvalue['title']; ?></td>
                                                <td><?php echo $division[$cvalue['division']]; ?></td>
                                                <td><?php echo $designation[$cvalue['designation']]; ?></td>
                                                <td><?php echo date('d-m-Y', strtotime($cvalue['created_date'])); ?></td>
                                                <td class="project-actions ">
                                        <?php  if(isset($permission) && in_array('admin_job_view',$permission )) {?> <a class="btn btn-primary btn-sm" href="<?php echo site_url('jobs/jobs_admin/view') . '/' . $cvalue['id']; ?> "><i class="fas fa-folder"></i>View</a> <?php }?>
                                        <?php  if(isset($permission) && in_array('admin_job_update',$permission )) {?>  <a class="btn btn-info btn-sm" href="<?php echo site_url('jobs/jobs_admin/edit') . '/' . $cvalue['id']; ?> "><i class="fas fa-pencil-alt"></i>Edit </a><?php }?>
                                        <?php  if(isset($permission) && in_array('admin_job_delete',$permission )) {?> <a class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you wan to delete?')" href="<?php echo site_url('jobs/jobs_admin/delete') . '/' . $cvalue['id']; ?> "> <i class="fas fa-trash"></i> Delete</a> <?php }?>

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
                                    <p style="margin-top: 12px;">Showing 1 to <?php echo count($list) ?> of <?php echo $total['total'] ?> entries</p>
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
    $(function () {

var start = moment().subtract(29, 'days');
var end = moment();

function cb(start, end) {
    $('.daterange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
}

$('.daterange').daterangepicker({
    startDate: start,
    endDate: end,
    ranges: {
        'Today': [moment(), moment()],
        'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
        'Last 7 Days': [moment().subtract(6, 'days'), moment()],
        'Last 30 Days': [moment().subtract(29, 'days'), moment()],
        'This Month': [moment().startOf('month'), moment().endOf('month')],
        'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
    }
}, cb);

cb(start, end);
$('.daterange').val('');
<?php if (isset($_GET['cre_min_date']) && $_GET['cre_min_date'] != '' && isset($_GET['cre_max_date']) && $_GET['cre_max_date'] != '') {
?>

    var created_filter = '<?php echo date('m/d/Y', strtotime($_GET['cre_min_date'])) . ' - ' . date('m/d/Y', strtotime($_GET['cre_max_date'])) ?>';
    $('.daterange').val(created_filter);
<?php }
?>
});
</script>
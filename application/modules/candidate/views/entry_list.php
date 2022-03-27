<!-- Content Wrapper. Contains page content -->
<?php $get = $this->input->get();
$sessiondata = $this->session->userdata('admin_user');

$permission = array();
$permission = $sessiondata['permission'];
?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-4">
                    <h1>Candidate Management</h1>
                </div>
                <?php if (isset($permission) && in_array('admin_candidate_add', $permission)) { ?>
                    <div class="col-sm-1.5">
                        <a href="<?php echo site_url('candidate/candidate_admin/entry'); ?>"><button type="button" onClick="<?php echo site_url('candidate/candidate_admin/entry'); ?>"" class=" btn btn-block bg-gradient-primary btn-sm">Add New</button>
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
                            <form method="post" action="<?php echo site_url('candidate/candidate_admin/search'); ?>">
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
                                        <div class="form-group">
                                            <label>Phone number</label>
                                            <input type="text" class="form-control" placeholder="Enter ..." name="search_phone" value="<?php echo isset($get['search_phone'])  ? $get['search_phone'] : ''; ?>">
                                        </div>
                                    </div>
                                    <div class="col-sm-2">
                                        <div class="form-group">
                                            <label>Mobile Number</label>
                                            <input type="text" class="form-control" placeholder="Enter ..." name="search_mobile" value="<?php echo isset($get['search_mobile'])  ? $get['search_mobile'] : ''; ?>">
                                        </div>
                                    </div>
                                    <div class="col-sm-2">
                                        <div class="form-group">
                                            <label>Premium Candidate</label>
                                            <input type="checkbox" class="form-control" name="search_by_package" value=1 <?php echo isset($get['search_by_package']) && $get['search_by_package'] == 1 ? 'checked' : ''; ?>>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Division</label>
                                            <select class="form-control" name="search_div[]" multiple="multiple" id="my-select">

                                                <?php
                                                $search_dis = array();
                                                if (isset($get['search_div']) && $get['search_div'] != '') {
                                                    $search_dis = explode(",", $get['search_div']);
                                                }


                                                if (isset($designation) && is_array($designation) && count($designation) > 0) {
                                                    foreach ($designation as $ckey => $cvalue) {
                                                        ?>
                                                        <optgroup label="<?php echo $division[$ckey]; ?>">
                                                            <?php foreach ($cvalue as $dkey => $dvalue) {
                                                                        ?>
                                                                <option value="<?php echo $dkey; ?>" <?php if (isset($cvalue) && in_array($dkey, $search_dis)) {
                                                                                                                        echo 'selected';
                                                                                                                    } ?>><?php echo $dvalue; ?></option>
                                                            <?php } ?>
                                                        </optgroup>

                                                <?php
                                                    }
                                                }
                                                ?>
                                            </select>

                                        </div>
                                    </div>
                                    <div class="col-sm-2">
                                        <button type="submit" class="btn btn-block bg-gradient-primary " style="margin-top: 31px;">Filter</button>
                                    </div>
                                    <div class="col-sm-2">

                                        <a href="<?php echo site_url('candidate/candidate_admin/entry_list') ?>"> <button type="button" class="btn btn-block bg-gradient-primary " style="margin-top: 31px;">View All</button></a>
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
                                    <p style="margin-top: 12px;">Showing 1 to <?php echo  count($list) ?> of <?php echo isset($total['total']) ? $total['total'] : 0 ?> entries</p>
                                </div>
                                <?php echo $this->pagination->create_links(); ?>

                            </div>



                        </div>
                        <!-- /.card-header -->
                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Phone_number</th>
                                        <th>Mobile_Number</th>
                                        <?php if (isset($permission) && (in_array('admin_candidate_view', $permission) || in_array('admin_candidate_update', $permission) || in_array('admin_candidate_delete', $permission))) { ?>

                                            <th>Action</th>
                                        <?php } ?>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    if (isset($list) && is_array($list) && count($list) > 0) {
                                        foreach ($list as $ckey => $cvalue) {
                                            ?>
                                            <tr>
                                                <td><?php echo isset($cvalue['id']) ? $cvalue['id'] : 0; ?></td>
                                                <td><?php echo isset($cvalue['name']) ? $cvalue['name'] : " "; ?></td>
                                                <td><?php echo isset($cvalue['email_id']) ? $cvalue['email_id'] : " "; ?></td>
                                                <td><?php echo isset($cvalue['phone_number']) ? $cvalue['phone_number'] : 0; ?></td>
                                                <td><?php echo isset($cvalue['mobile_number']) ? $cvalue['mobile_number'] : 0; ?></td>
                                                <td class="project-actions ">
                                                    <?php if (isset($permission) && in_array('admin_candidate_view', $permission)) { ?>
                                                        <a class="btn btn-primary btn-sm" href="<?php echo site_url('candidate/candidate_admin/view') . '/' . $cvalue['id']; ?> "><i class="fas fa-folder"></i>View</a> <?php } ?>
                                                    <?php if (isset($permission) && in_array('admin_candidate_update', $permission)) { ?>
                                                        <a class="btn btn-info btn-sm" href="<?php echo site_url('candidate/candidate_admin/edit') . '/' . $cvalue['id']; ?> "><i class="fas fa-pencil-alt"></i>Edit </a><?php } ?>
                                                    <?php if (isset($permission) && in_array('admin_candidate_delete', $permission)) { ?>
                                                        <a class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you wan to delete?')" href="<?php echo site_url('candidate/candidate_admin/delete') . '/' . $cvalue['id']; ?> "> <i class="fas fa-trash"></i> Delete</a><?php } ?>
                                                    <a class="btn btn-primary btn-sm" href="<?php echo site_url('candidate/candidate_admin/show_resume/' . $cvalue['id']); ?>"><i class="fas fa-folder"></i>Download CV</a>
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
                                    <p style="margin-top: 12px;">Showing 1 to <?php echo count($list) ?> of <?php echo isset($total['total']) ? $total['total'] : 0 ?> entries</p>
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
<link rel="stylesheet" type="text/css" href="<?php echo CSS_PATH_BACKEND; ?>jquery.multiselect.css">
<script type="text/javascript" src="<?php echo JS_PATH_BACKEND; ?>jquery.multiselect.js"></script>
<script>
    $(document).ready(function() {
        $('#my-select').multiselect({
            'search':true
        });
    });
</script>

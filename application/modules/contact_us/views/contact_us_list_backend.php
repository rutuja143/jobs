
<section class="content">
    <div class="row feedback_msg" >
        <div class="col-sm-12 com-md-12">
            <?php if ($this->session->flashdata('add_feedback')) { ?>
                <div class="alert alert-info alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h4><i class="icon fa fa-check"></i><?php echo $this->session->flashdata('add_feedback'); ?></h4>
                </div>
            <?php } else if ($this->session->flashdata('update_feedback')) {
                ?>
                <div class="alert alert-success alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h4><i class="icon fa fa-check"></i><?php echo $this->session->flashdata('update_feedback'); ?></h4>
                </div>
            <?php } else if ($this->session->flashdata('delete_feedback')) { ?>
                <div class="alert alert-danger alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h4><i class="icon fa fa-check"></i><?php echo $this->session->flashdata('delete_feedback'); ?></h4>
                </div>
            <?php } ?>

        </div>
    </div>
    <div class="row">
        <div class="col-xs-12">

            <?php if (isset($result) && is_array($result) && count($result) > 0) { ?>
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">List of enquiry</h3>
                        <span>Total enquiry: <?php echo $total; ?></span>
                        <span>Total Display: <?php echo count($result); ?></span>
                    </div>
                    <div class="box-body">
                        <div id="example1_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
                            <!--<div class="row">
                                <div class="col-sm-12">

                                    <form method="get" action="<?php echo site_url('user/search'); ?>" id="search_form">
                                        <div class="form-group">
                                            <label>First Name:</label>
                                            <input type="text" class="form-control input-sm" placeholder="" aria-controls="example1" name= "fname" id= "fname" value="<?php echo $this->input->get('fname'); ?>">
                                        </div>
                                        <div class="form-group">
                                            <label>Last Name:</label>
                                            <input type="text" class="form-control input-sm" placeholder="" aria-controls="example1" name= "lname" id= "lname" value="<?php echo $this->input->get('lname'); ?>">
                                        </div>
                                        <div class="form-group">
                                            <label>Contact_no:</label>
                                            <input type="number" class="form-control input-sm" placeholder="" aria-controls="example1" name="contact_no" id= "contact_no" value="<?php echo $this->input->get('contact_no'); ?>">
                                        </div>
                                        <input type="submit">
                                    </form>

                                </div>
                            </div>-->
                            <div class="row">
                                <div class="col-sm-12">
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>Sr. No</th>
                                                <th>Created Date</th>
                                                <th>Name</th>
                                                <th>Message</th>
                                                <th>Contact no</th>
                                                <th>Email</th>
                                                <th>Attachment 1</th>
                                                <th>Attachment 2</th>
                                                <th>Attachment 3</th>

    <!--                                                <th>Subject</th>-->
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $cnt = $offset + 1;
                                            foreach ($result as $key => $value) {
                                                ?>
                                                <tr>
                                                    <td><?php echo $cnt; ?></td>
                                                    <td><?php echo (isset($value['created_date']) ? date('d-M-Y h:i:s a', strtotime($value['created_date'])) : ''); ?></td>
                                                    <td> <?php echo ((isset($value['txtname']) && (isset($value['txtname']))) ? ucwords($value['txtname']) : ''); ?></td>

                                                    <td><?php echo (isset($value['txtmessage']) ? $value['txtmessage'] : ''); ?></td>
                                                    <td><?php echo (isset($value['contact_no']) ? $value['contact_no'] : ''); ?></td>
                                                    <td><?php echo (isset($value['txtemail']) ? ($value['txtemail']) : ''); ?></td>
                                                    <td><a href="<?php echo (isset($value['attachment1']) && $value['attachment1'] != '') ? MEDIA_PATH_FRONTEND . $value['attachment1'] : ''; ?>" target="_blank">View</a></td>
                                                    <td><a href="<?php echo (isset($value['attachment2']) && $value['attachment2'] != '') ? MEDIA_PATH_FRONTEND . $value['attachment2'] : ''; ?>" target="_blank">View</a></td>
                                                    <td><a href="<?php echo (isset($value['attachment3']) && $value['attachment3'] != '') ? MEDIA_PATH_FRONTEND . $value['attachment3'] : ''; ?>" target="_blank">View</a></td>
        <!--                                                    <td><?php echo (isset($value['cmbsubject']) ? ($value['cmbsubject']) : ''); ?></td>-->
                                                </tr>
                                                <?php
                                                $cnt++;
                                            }
                                            ?>
                                        </tbody>

                                    </table>
                                </div>
                            </div>
                            <div class="row">

                                <div class="col-sm-7">
                                    <div class="dataTables_paginate paging_simple_numbers" id="example1_paginate">

                                        <?php echo $this->pagination->create_links(); ?>

                                    <?php } else { ?>
                                        <h3>No Record Found</h3>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>


<script src="<?php echo JS_PATH_FRONTEND; ?>jquery.validate.js"></script>
<script type="text/javascript">
    $(document).ready(function ($) {

        $(".delete").click(function () {
            if (confirm('Are you sure you want to delete?')) {
                window.document.location = $(this).data("href");
            } else
            {
                event.preventDefault();
            }

        });


        $.validator.addMethod("lettersonly", function (value, element) {
            return this.optional(element) || /^[a-zA-Z," "\s]+$/i.test(value);
        });
        $("#search_form").validate({
            rules:
                    {
                        fname: {
                            lettersonly: true,
                            rangelength: [3, 40]

                        },
                        lname: {
                            lettersonly: true,
                            rangelength: [3, 40]

                        },
                        contact_no: {
                            rangelength: [10, 10],
                            digits: true

                        }
                    },
            messages: {
                fname: {
                    rangelength: "Minimum 3 & Maximum 40 Character Required",
                    lettersonly: "Enter Only Letters"
                },
                lname: {
                    rangelength: "Minimum 3 & Maximum 40 Character Required",
                    lettersonly: "Enter Only Letters"
                },
                contact_no: {
                    rangelength: "10 Digits Required",
                    digits: "Enter Only Digits"
                }
            },
            errorElement: 'p',
            errorPlacement: function (error, element) {
                error.insertAfter(element);
            },
            submitHandler: function (form) {
                var fname = $('#fname').val();
                var lname = $('#lname').val();
                var contact_no = $('#contact_no').val();
                if (fname == "" && lname == "" && contact_no == "")
                {
                    alert('Enter At least one field For Search');
                    return false;
                } else
                {
                    return true;
                }

            }

        });



    });
</script>


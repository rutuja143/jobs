<?php $get = $this->input->get(); ?>
<section id="apus-breadscrumb" class="breadcrumb-page apus-breadscrumb has_img" style="background-image:url('')">
    <div class="container">
        <div class="wrapper-breads">
            <div class="wrapper-breads-inner">
                <h3 class="bread-title">Candidates in <?php echo $division[$_GET['div']] ?></h3>
                <div class="breadscrumb-inner">
                    <ol class="breadcrumb">
                        <li><a href="<?php echo site_url(); ?>">Home</a> </li>
                        <li><span class="active"><?php echo $division[$_GET['div']] ?></span></li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="main-listing-content container">


    <div class="" style="height:10px;"></div>

    <div class="row">
        <div class="col-sm-12 col-md-9 col-sm-12 col-xs-12 pull-right">
            <div class="resumes clearfix row">
                <div class="md-clear-2 col-md-6 col-sm-6 col-xs-12">
                    <?php echo $this->pagination->create_links(); ?>
                </div>
                <div class="md-clear-2 col-md-4 col-sm-4 col-xs-12">
                    Total Candidates :&nbsp;<?php echo isset($total['total']) ? $total['total'] : 0; ?>
                </div>
            </div>

            <div class="resumes clearfix row">
                <?php
                if (isset($list) && is_array($list) && count($list) > 0) {
                    foreach ($list as $key => $value) {
                        ?>
                        <div class="md-clear-2 col-md-6 col-sm-6 col-xs-12">
                            <div class="resume resume_featured post-698 type-resume status-publish hentry resume_category-developer resume_skill-design resume_skill-developer resume_skill-marketing">
                                <div class="resume-large clearfix table-visiable card-resume">
                                    <div class="img">
                                        <?php
                                                if ($value['profile_image'] != '' && file_exists($value['profile_image'])) {
                                                    $profile_image = base_url() . $value['profile_image'];
                                                } else {
                                                    $profile_image = IMAGE_PATH_FRONTEND . 'avatar-1577909_640.png';
                                                }
                                                ?>
                                        <img class="candidate_photo" src="<?php echo $profile_image; ?>" alt="Photo" style="height: 90px;">
                                    </div>
                                    <div class="candidate-column">
                                        <div class="media">
                                            <div class="media-left media-middle left-info">
                                                <h3 class="title-resume"><a href="<?php echo site_url('candidate/view/' . $value['id']); ?>"><?php echo ucwords($value['name']); ?></a></h3>
                                                <div class="resume-category">
                                                    <i class="fa fa-folder-open-o text-second" aria-hidden="true"></i>
                                                    <a class="btn-sm-list" href="<?php echo site_url('candidate/view/' . $value['id']); ?>">View Profile</a>
                                                    <p>Falcon Id: <?php echo $value['id']; ?></p>
                                                    <p>Position : <?php echo ucwords($value['resume_title']); ?></p>
                                                    <p>Designation : <?php echo isset($designation[$value['designation']]) ? ucwords($designation[$value['designation']]['name']) : ''; ?></p>
                                                    <p>Nationality : <?php echo isset($countries[$value['nationality']]) ? ucwords($countries[$value['nationality']]['name']) : ''; ?></p>
                                                    <p>Current Location : <?php echo isset($countries[$value['country']]) ? ucwords($countries[$value['country']]['name']) : ''; ?></p>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    <?php
                        }
                    } else {
                        ?>
                    <h3>No Candidate Found.</h3>
                <?php } ?>

            </div>
            <div class="resumes clearfix row">
                <div class="md-clear-2 col-md-6 col-sm-6 col-xs-12">
                    <?php echo $this->pagination->create_links(); ?>
                </div>
            </div>
        </div>
        <form id="candidate_search" enctype="multipart/form-data" method="post" action="<?php echo site_url('candidate/search'); ?>">
            <input type="hidden" name="div" value="<?php echo isset($get['div']) ? $get['div'] : ''; ?>" />

            <div class="col-md-3 col-sm-12 col-xs-12">
                <aside class="sidebar sidebar-left" itemscope="itemscope" itemtype="http://schema.org/WPSideBar">
                    <a class="view-more-list view-more" href="<?php echo site_url('candidate/resume') . "?div=" . $get['div']; ?>"><i class="fa fa-filter" aria-hidden="true"></i>Clear</a>
                    
                    <aside class="widget widget_apus_job_taxonomy_widget">
                        <h2 class="widget-title"><span>Candidates by Designation</span></h2>
                        <div class="widget-job-taxonomy">
                            <?php if (isset($designation) && is_array($designation) && count($designation) > 0) { ?>
                                <ul>
                                    <?php
                                        foreach ($designation as $dkey => $dvalue) {
                                            $search_desi = isset($get['desi']) && $get['desi'] != '' ? explode(",", $get['desi']) : array();
                                            ?>
                                        <li>
                                            <input value="<?php echo $dvalue['id']; ?>" type="checkbox" id="designation_<?php echo $dvalue['id']; ?>" name="designation[]" <?php echo isset($search_desi) && in_array($dvalue['id'], $search_desi) ? 'checked' : ''; ?> /> <label for="designation_<?php echo $dvalue['id']; ?>"><?php echo ucwords($dvalue['name']); ?></label>
                                        <?php }
                                            ?>
                                </ul>
                            <?php }
                            ?>

                        </div>
                    </aside>




                    <aside class="widget widget_apus_job_taxonomy_widget">
                        <h2 class="widget-title"><span>Candidates by Resume Title(Position)</span></h2>
                        <div class="widget-job-taxonomy">
                            <input type="text" class="input-text form-control resume_title" name="resume_title" value="<?php echo isset($get['title']) && $get['title'] != '' ? $get['title'] : ''; ?>" placeholder="Resume Title(Position)">
                        </div>
                    </aside>
                    <aside class="widget widget_apus_job_taxonomy_widget">
                        <h2 class="widget-title"><span>Candidates by Nationality</span></h2>
                        <div class="widget-job-taxonomy" style="height: 200px;">
                            <?php if (isset($countries) && is_array($countries) && count($countries) > 0) { ?>
                                <select name="nationality[]" class="form-control select_multiselect" multiple="multiple">
                                    <?php
                                        $nati = isset($get['nati']) && $get['nati'] != '' ? explode(",", $get['nati']) : array();
                                        foreach ($countries as $nkey => $nvalue) {
                                            ?>
                                        <option value="<?php echo $nvalue['id']; ?>" <?php echo isset($nati) && in_array($nvalue['id'], $nati) ? 'selected' : ''; ?>><?php echo ucwords($nvalue['name']); ?></option>
                                    <?php } ?>
                                </select>
                            <?php }
                            ?>
                        </div>
                    </aside>

                    <aside class="widget widget_apus_job_taxonomy_widget">
                        <h2 class="widget-title"><span>Candidates by Current Location(Country)</span></h2>
                        <div class="widget-job-taxonomy" style="height: 200px;">
                            <?php if (isset($countries) && is_array($countries) && count($countries) > 0) { ?>
                                <select name="country[]" class="form-control select_multiselect" multiple="multiple">
                                    <?php
                                        $country = isset($get['country']) && $get['country'] != '' ? explode(",", $get['country']) : array();
                                        foreach ($countries as $ckey => $cvalue) {
                                            ?>
                                        <option value="<?php echo $cvalue['id']; ?>" <?php echo isset($country) && in_array($cvalue['id'], $country) ? 'selected' : ''; ?>><?php echo ucwords($cvalue['name']); ?></option>
                                    <?php } ?>
                                </select>
                            <?php }
                            ?>
                        </div>
                    </aside>
                </aside>
            </div>
    </div>
    </form>
</section>
<style type='text/css'>
    body {
        background: #f9f9f9;
    }
</style>
<link rel="stylesheet" type="text/css" href="<?php echo CSS_PATH_BACKEND; ?>jquery.multiselect.css">
<script type="text/javascript" src="<?php echo JS_PATH_BACKEND; ?>jquery.multiselect.js"></script>
<script>
    jQuery(document).ready(function() {
        jQuery('.select_multiselect').multiselect({
            placeholder: 'Select Country',
            search: true,
            selectAll: false
        });
        jQuery("input[type=checkbox]").change(function() {
            jQuery('#candidate_search').submit();
        });

        jQuery(".resume_title").keypress(function(e) {
            if (e.which == 10 || e.which == 13) {
                jQuery('#candidate_search').submit();
            }
        });
    });
</script>
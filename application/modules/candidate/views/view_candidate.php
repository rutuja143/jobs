<div id="apus-main-content">
    <section id="main-container" class="main-content  container inner">
        <div class="row">
            <div id="main-content" class="col-sm-12 col-md-9 col-sm-12 col-xs-12 ">
                <main id="main" class="site-main layout-blog" role="main">
                    <div class="single-resume-content widget">
                        <div class="resume-aside">
                            <div class="avarta-cadidate">
                                <img class="candidate_photo" src="<?php
                                                                    if (file_exists($candidate['profile_image'])) {
                                                                        //exit;
                                                                        echo base_url() . $candidate['profile_image'];
                                                                    } else {
                                                                        echo IMAGE_PATH_FRONTEND . 'avatar-1577909_640.png';
                                                                    }
                                                                    ?>" alt="Photo"> </div>
                            <div class="right-content">
                                <ul class="resume-links">
                                    <li class="download-resume"><i class="fa fa-folder-open-o  font-icon"></i>
                                        <a href="<?php echo site_url('candidate/show_resume/' . $candidate['id']); ?>">Download Resume</a>
                                    </li>
                                </ul>
                                <div class="resume_contact">
                                    <input class="btn-showcontact btn btn-sm btn-theme" type="button" value="Contact Candidate">
                                    <div class="resume_contact_details" style="display: none;">&nbsp;
                                        <p>To contact this candidate email <a class="job_application_email" href="mailto:hr6@falconmsl.com?subject=I want to contact <?php echo   $candidate['name'];     ?>&body=I found your reference from website. I want to contact <?php echo   $candidate['name'];
                                                                                                                                                                                                                                                                            echo 'Candidate id:' . $candidate['id'];    ?>">hr6@falconmsl.com</a></p>

                                    </div>
                                </div>
                                <p class="job-title"><?php echo isset($candidate['name']) ? ucwords($candidate['name']) : " "; ?></p>
                                <p class="location-section"><i class="fa fa-map-marker font-icon"></i>&nbsp;<a class="google_map_link candidate-location" href="javascript:void(0);">Current Location: <?php echo isset($edu_country[$candidate['country']]) ? $edu_country[$candidate['country']] : 'Not Mention'; ?></a></p>
                                <ul class="meta">
                                    <li class="profile-date"><i class="fa fa-briefcase  font-icon"></i><?php echo isset($designation['name']) ? ucwords($designation['name']) : " "; ?></li>
                                    <li class="profile-date" itemprop="datePosted"><i class="fa fa-calendar  font-icon"></i>
                                        Profile Created Date:<?php
                                                                if ($candidate['created_date'] != '0000-00-00 00:00:00') {
                                                                    echo date('d M Y', strtotime($candidate['created_date']));
                                                                }else{
                                                                    echo ' Not Mention';
                                                                } ?>

                                    </li>
                                </ul>
                            </div>
                        </div>
                        <h3 class="widget-title no-padding">Description</h3>

                        <div class="resume_description">
                            <p><?php echo  $candidate['additional_info'];  ?></p>
                            <p>
                                <h3 class="sub-title">Nationality : <?php echo isset($nationality['name']) ? ucwords($nationality['name']) : " "; ?></h3>
                                <hr>
                            </p>
                            <h3 class="sub-title">Residential country :<p class="text-muted"><?php echo isset($countries['name']) ? $countries['name'] : " "; ?></p>
                            </h3>
                            <hr>
                            <p>
                                <h3 class="sub-title">Date of birth :<p class="text-muted"><?php echo isset($candidate['dob']) ? date('d-m-Y', strtotime($candidate['dob'])) : " "; ?></p>
                                </h3>
                            </p>
                            <h3 class="sub-title">Address :<p class="text-muted"><?php echo isset($candidate['address']) ? $candidate['address'] : " "; ?></p>
                            </h3>
                            <hr>
                            Primary Language:<?php echo isset($language[$candidate['primary_language']]) ? $language[$candidate['primary_language']] : " " ?>
                            <hr>
                            <p>
                                <h2 class="widget-title"><i class="fa fa-rocket text-second" aria-hidden="true"></i>language Known</h2>
                                <?php
                                if (isset($candidate_lang) && is_array($candidate_lang) && count($candidate_lang) > 0) {
                                    foreach ($candidate_lang as $qkey => $qvalue) {
                                        ?>
                                        <p class="text-muted"><?php echo isset($language[$candidate_lang[$qvalue]]) ? $language[$candidate_lang[$qvalue]] : " "; ?></p>
                                <?php }
                                } ?>
                            </p>
                        </div>
                        <h2 class="widget-title"><i class="fa fa-rocket text-second" aria-hidden="true"></i>Skills</h2>
                        <ul class="resume-manager-skills">
                            <?php echo isset($candidate['additional_skill']) ? $candidate['additional_skill'] : " "; ?>
                        </ul>
                        <h2 class="widget-title"><i class="fa fa-graduation-cap text-second" aria-hidden="true"></i>Education</h2>
                        <?php
                        if (isset($qualification) && is_array($qualification) && count($qualification) > 0) {
                            foreach ($qualification as $qkey => $qvalue) {
                                ?>
                                <dl class="resume-manager-education">
                                    <dt>
                                        <small class="date">
                                            <?php echo isset($qvalue['passing_year']) ? $qvalue['passing_year'] : 0; ?>
                                        </small>
                                        <h3 class="sub-title"><strong class="qualification"><?php echo isset($edu_course[$qvalue['qualification']]) ? $edu_course[$qvalue['qualification']] : " "; ?></strong> from <strong class="location"><?php echo isset($qvalue['university']) ? $qvalue['university'] : " "; ?> University</strong></h3>
                                    </dt>
                                    <dd>
                                        <p><?php echo isset($edu_country[$qvalue['country']]) ? ucwords($edu_country[$qvalue['country']]) : 0; ?></p>
                                    </dd>

                                </dl>

                        <?php }
                        } ?>

                        <h2 class="widget-title"><i class="fa fa-graduation-cap text-second" aria-hidden="true"></i>Career</h2>

                        <?php
                        if (isset($career) && is_array($career) && count($career) > 0) {
                            foreach ($career as $qkey => $qvalue) {
                                ?>
                                <dl class="resume-manager-education">
                                    <dt>
                                        <small class="date">
                                            <?php echo isset($qvalue['from_date']) ? $qvalue['from_date'] : " "; ?> - <?php echo $qvalue['to_date']; ?>
                                        </small>
                                        <h3 class="sub-title"><strong>Position: </strong><?php echo isset($qvalue['position']) ? $qvalue['position'] : " "; ?> </h3>
                                        <h3 class="sub-title"><strong>Employer: </strong><?php echo  isset($qvalue['till_date']) && $qvalue['till_date'] == 1 ? "In Reputed Company" : $qvalue['employer']; ?></h3>
                                        <h3 class="sub-title"><strong>Country: </strong><?php echo isset($edu_country[$qvalue['country']]) ? $edu_country[$qvalue['country']] : " "; ?></h3>
                                    </dt>

                                </dl>
                        <?php }
                        } ?>
                        <h2 class="widget-title"><i class="fa fa-graduation-cap text-second" aria-hidden="true"></i>certificate </h2>

                        <?php
                        if (isset($certificate) && is_array($certificate) && count($certificate) > 0) {
                            foreach ($certificate as $qkey => $qvalue) {
                                ?>
                                <dl class="resume-manager-education">
                                    <dt>
                                        <small class="date">
                                            <h5><?php echo isset($qvalue['course']) ? $qvalue['course'] : " "; ?></h5>
                                        </small>
                                        <h3 class="sub-title"><?php echo isset($qvalue['course_date']) ? date('d-m-y', strtotime($qvalue['course_date'])) : " "; ?> To <?php echo date('d-m-y', strtotime($qvalue['valid_date'])); ?></strong> </h3>
                                        <h3 class="sub-title"> <strong> <?php echo isset($qvalue['organization']) ? $qvalue['organization'] : " "; ?></strong> </h3>

                                    </dt>

                                </dl>
                        <?php }
                        } ?>

                    </div>
                </main>
            </div>

        </div>
</div>
</section>
</div>
<style type='text/css'>
    body {
        background: #f9f9f9;
    }
</style>
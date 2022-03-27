<?php

function candidate_data($candidateId)
{
    $CI = &get_instance();

    $data['candidate'] = $CI->gm->get_selected_record('candidate', '*', $where = array('id' => $candidateId), array());
    $data['user'] = $CI->gm->get_selected_record('user', '*', $where = array('id' => $candidateId), array());
    $data['qualification'] = $CI->gm->get_data_list('qualification', $where = array('status' => 1, 'candidate_id' => $candidateId), array(), '', "*");
    $data['career'] = $CI->gm->get_data_list('career', $where = array('status' => 1, 'candidate_id' => $candidateId), array(), '', "*");
    $data['countries'] = $CI->gm->get_selected_record('countries', '*', $where = array('id' => $data['candidate']['country']), array());
    $data['division'] = $CI->gm->get_selected_record('division', '*', $where = array('id' => $data['candidate']['division']), array());
    //$data['edu_years'] = $this->gm->get_selected_record('edu_years', '*', $where = array('id' => $data['candidate']['city']), array());
    $data['state'] = $CI->gm->get_selected_record('states', '*', $where = array('id' => $data['candidate']['state']), array());
    $data['cities'] = $CI->gm->get_selected_record('cities', '*', $where = array('id' => $data['candidate']['city']), array());
    $data['nationality'] = $CI->gm->get_selected_record('countries', '*', $where = array('id' => $data['candidate']['nationality']), array());
    $data['edu_country'] = get_countries();
    $data['edu_course'] = get_course();
    $data['certificate'] = $CI->gm->get_data_list('certificate', $where = array('status' => 1, 'candidate_id' => $candidateId), array(), '', "*");
    $data['designation'] = $CI->gm->get_selected_record('designation', '*', $where = array('id' => $data['candidate']['designation']), array());
    $langlist = $CI->gm->get_data_list('candidate_language', $where = array('status' => 1, 'candidate_id' => $candidateId), array(), '', "*");
    foreach ($langlist as $key => $value) {
        $data['candidate_lang'][$value['language_id']] = $value['language_id'];
    }
    $data['language'] = get_launguage();
    return $data;
}

function candidate_insert($data = array())
{
    //echo '<pre>';
    ///print_r($data);
    ////exit();
    $CI = &get_instance();
    if ($data['source'] == 1) {
        $user_data = array(
            'created_by' => $data['sessiondata']['user_id'],
            'created_date' =>  isset($data['candidate']['created_date']) ? $data['candidate']['created_date'] : date('Y-m-d H:i:s'),
            'name' => $data['candidate']['name'],
            'email' => $data['candidate']['email_id'],
            'password' => md5($data['user']['password']),
            'contactno' => $data['candidate']['mobile_number'],
            'is_admin' => 2,
        );
        $user_id = $CI->gm->insert('user', $user_data);
        $created_by = $data['sessiondata']['user_id'];
    } else {
        $user_id = $data['sessiondata']['id'];
        $created_by = $data['sessiondata']['id'];
    }

    /**
     * inser data into candidate table
     */
    $candidate_image = "";
    $year = date("Y");
    $month = date("m");
    $filename = 'media/' . $year;
    $filename2 = 'media/' . $year . '/' . $month;

    $relative_path = $year . '/' . $month . '/';

    if (file_exists($filename)) {
        if (file_exists($filename2) == false) {
            mkdir($filename2, 0777);
        }
    } else {
        mkdir($filename, 0777);
    }
    if (file_exists($filename)) {
        if (file_exists($filename2) == false) {
            mkdir($filename2, 0777);
        }
    } else {
        mkdir($filename, 0777);
    }

    $fileName = isset($_FILES["profile_image"]["name"]) ? $_FILES["profile_image"]["name"] : '';
    $filetmppath = isset($_FILES['profile_image']['tmp_name']) ? $_FILES['profile_image']['tmp_name'] : '';
    $config['upload_path'] = 'media/' . $relative_path;
    $config['allowed_types'] = 'jpg|jpeg|png';
    /*
     * rename filename with date
     */
    $config['file_name'] = date("Y-m-d-H-i-s") . $fileName;
    $CI->load->library('upload', $config);

    if (!$CI->upload->do_upload("profile_image")) {
        $error = array('error' => $CI->upload->display_errors());
        // redirect('employee');
    } else {
        $image_data = $CI->upload->data();

        $newpath = $image_data['file_name'];
        $candidate_image = 'media/' . $relative_path . $newpath;
    }
    $candidate_resume = "";
    $year = date("Y");
    $month = date("m");
    $filename = 'media/' . $year;
    $filename2 = 'media/' . $year . '/' . $month;

    $relative_path = $year . '/' . $month . '/';

    if (file_exists($filename)) {
        if (file_exists($filename2) == false) {
            mkdir($filename2, 0777);
        }
    } else {
        mkdir($filename, 0777);
    }
    if (file_exists($filename)) {
        if (file_exists($filename2) == false) {
            mkdir($filename2, 0777);
        }
    } else {
        mkdir($filename, 0777);
    }

    $fileName = isset($_FILES["resume"]["name"]) ? $_FILES["resume"]["name"] : '';
    $filetmppath = isset($_FILES['resume']['tmp_name']) ? $_FILES['resume']['tmp_name'] : '';
    $config['upload_path'] = 'media/' . $relative_path;
    $config['allowed_types'] = 'doc|pdf|docx';
    /*
     * rename filename with date
     */
    $config['file_name'] = date("Y-m-d-H-i-s") . $fileName;
    $CI->load->library('upload', $config);
    if (!$CI->upload->do_upload("resume")) {
        $error = array('error' => $CI->upload->display_errors());
        //print_r($error);
    } else {
        $resume_data = $CI->upload->data();
        $newpath = $resume_data['file_name'];
        $candidate_resume = 'media/' . $relative_path . $newpath;
    }



    if ($user_id != '' && is_numeric($user_id)) {
        $candidate_data = array(
            'created_by' => $created_by,
            'created_date' => isset($data['candidate']['created_date']) ? $data['candidate']['created_date'] : date('Y-m-d H:i:s'),
            'name' => clean_data($data['candidate']['name']),
            'profile_image' => $candidate_image,
            'email_id' => $data['candidate']['email_id'],
            'skype_id' => $data['candidate']['skype_id'],
            'dob' => date('Y-m-d',strtotime($data['candidate']['dob'])),
            'address' => clean_data( $data['candidate']['address']),
            'country' => $data['candidate']['contries'],
            'nationality' => $data['candidate']['nationality'],
            'state' => $data['candidate']['state'],
            'city' => $data['candidate']['city'],
            'pin_code' => $data['candidate']['pin_code'],
            'division' => $data['candidate']['division'],
            'designation' => $data['candidate']['designation'],
            'phone_number' => $data['candidate']['phone_number'],
            'mobile_number' => $data['candidate']['mobile_number'],
            'mobile_number_country_code' => $data['candidate']['phonecode'],
            'resume_title' => clean_data($data['candidate']['resume_title']),
            'primary_language' => $data['candidate']['primary'],
            'is_authorized' =>isset($data['candidate']['is_authorized']) && $data['candidate']['is_authorized'] == 1? 1:"",
            'resume' => $candidate_resume,
            'notice_period' => $data['candidate']['notice'],
            'additional_skill' => clean_data($data['candidate']['additional_skill']),
            'additional_info' => clean_data($data['candidate']['additional_info']),
            'current_salary' => clean($data['candidate']['current_salary']),
            'expected_salary' => clean($data['candidate']['expected_salary']),
            'user_id' => $user_id,
        );
        if ($data['candidate']['old_id'] != '') {
            $candidate_data['old_id'] = $data['candidate']['old_id'];
        }
        $candidate_id = $CI->gm->insert('candidate', $candidate_data);
        if ($candidate_id > 0) {
            if (isset($data['languages']) && is_array($data['languages']) && count($data['languages'])) {
                foreach ($data['languages'] as $akey => $avalue) {
                    $languages_insert = array(
                        'language_id' => $avalue,
                        'candidate_id' => $candidate_id,
                        'created_date' => isset($data['candidate']['created_date']) ? $data['candidate']['created_date'] : date('Y-m-d H:i:s'),
                        'created_by' => $created_by,
                    );
                    $CI->gm->insert('candidate_language', $languages_insert);
                }
            }

            /**
             * 
             * Insert Qualification in db
             */
            if (isset($data['edu_qualification']) && is_array($data['edu_qualification']) && count($data['edu_qualification']) > 0) {
                foreach ($data['edu_qualification'] as $akey => $avalue) {
                    $qualification_insert = array(
                        'qualification' => $avalue,
                        'university' => clean_data(isset($data['edu_university'][$akey]) ? $data['edu_university'][$akey] : ''),
                        'passing_year' => isset($data['edu_year'][$akey]) ? $data['edu_year'][$akey] : 0,
                        'country' => isset($data['edu_country'][$akey]) ? $data['edu_country'][$akey] : 0,
                        'candidate_id' => $candidate_id,
                        'created_date' => isset($data['candidate']['created_date']) ? $data['candidate']['created_date'] : date('Y-m-d H:i:s'),
                        'created_by' => $created_by,
                    );

                    $CI->gm->insert('qualification', $qualification_insert);
                }
            }
            /**
             * 
             * Insert career in db
             */
            if (isset($data['career_position']) && is_array($data['career_position']) && count($data['career_position']) > 0) {
                foreach ($data['career_position'] as $akey => $avalue) {
                    $career_insert = array(
                        'position' => clean_data($avalue),
                        'employer' => clean_data(isset($data['career_Employeer'][$akey]) ? $data['career_Employeer'][$akey] : ''),
                        'country' => isset($data['career_country'][$akey]) ? $data['career_country'][$akey] : 0,
                        'from_date' => isset($data['career_fromdate'][$akey]) ? $data['career_fromdate'][$akey] : 0,
                        'to_date' => isset($data['career_todate'][$akey]) ? $data['career_todate'][$akey] : 0,
                        'till_date' => isset( $data['till_date_id']) && $data['till_date_id'] != '' && $data['till_date_id'] == $akey ? 1 : 0,
                        'candidate_id' => $candidate_id,
                        'created_date' => isset($data['candidate']['created_date']) ? $data['candidate']['created_date'] : date('Y-m-d H:i:s'),
                        'created_by' => $created_by,
                    );
                    $CI->gm->insert('career', $career_insert);
                }
            }
            if (isset($data['course_name']) && is_array($data['course_name']) && count($data['course_name']) > 0) {
                foreach ($data['course_name'] as $akey => $avalue) {
                   if($avalue != ""){
                    $certificate_insert = array(
                        'course' => clean_data($avalue),
                        'course_date' => isset($data['course_date'][$akey]) ? date('y-m-d', strtotime($data['course_date'][$akey])) : '',
                        'valid_date' => isset($data['valid_date'][$akey]) ? date('y-m-d', strtotime($data['valid_date'][$akey])) : '',
                        'organization' => clean_data(isset($data['organization'][$akey]) ? $data['organization'][$akey] : ''),
                        'candidate_id' => $candidate_id,
                        'created_date' => isset($data['candidate']['created_date']) ? $data['candidate']['created_date'] : date('Y-m-d H:i:s'),
                        'created_by' => $created_by,
                    );
                    $CI->gm->insert('certificate', $certificate_insert);
                }
            }
            }
            /** 
             * send email
             */
            $data['candidate_id'] = $candidate_id;
            $contact_admin = $CI->load->view('emailnewsapprove', $data, TRUE);

            $CI->load->helper('email');
            //
            // echo "<pre>";
            // print_r($contact_admin);
            // exit;
            //send_email(CONTACT_ADMIN_MAIL, 'New Candidate Register : ' . date('d M Y H:i A'), $contact_admin, NOREPLY_EMAIL, $reply_email = CONTACT_ADMIN_MAIL, $cc_email = '', $attachment = array(), $entity_data = array());
            return $candidate_id;
        }
    }
}

function candidiate_list($condition = array())
{
    $CI = &get_instance();
    $limitQry = '';
    if (isset($condition['limit']) && $condition['limit'] != '0') {
        $limitQry = " LIMIT " . $condition['limit'] . " OFFSET " . $condition['offset'];
    }

    $get = isset($condition['search']) ? $condition['search'] : array();
    $appendquery = '';
    if (isset($get) && is_array($get) && count($get) > 0) {

        if (isset($get['search_name']) && $get['search_name'] != '') {
            $appendquery .= " AND q.name Like '%" . $get['search_name'] . "%'";
        }

        if (isset($get['search_email']) && $get['search_email'] != '') {
            $appendquery .= " AND q.email_id Like '%" . $get['search_email'] . "%'";
        }

        if (isset($get['search_phone']) && $get['search_phone'] != '') {
            $appendquery .= " AND q.phone_number Like '%" . $get['search_phone'] . "%'";
        }
        if (isset($get['search_mobile']) && $get['search_mobile'] != '') {
            $appendquery .= " AND q.mobile_number Like '%" . $get['search_mobile'] . "%'";
        }
        if (isset($get['desi']) && $get['desi'] != '') {
            $appendquery .= " AND q.designation IN(" . $get['desi'] . ")";
        }
        if (isset($get['div']) && $get['div'] != '') {
            $appendquery .= " AND q.division IN(" . $get['div'] . ")";
        }
        if (isset($get['nati']) && $get['nati'] != '') {
            $appendquery .= " AND q.nationality IN(" . $get['nati'] . ")";
        }
        if (isset($get['country']) && $get['country'] != '') {
            $appendquery .= " AND q.country IN(" . $get['country'] . ")";
        }
        if (isset($get['title']) && $get['title'] != '') {
            $appendquery .= " AND q.resume_title Like '%" . $get['title'] . "%'";
        }
    }

    if (isset($condition['sort']) && $condition['sort'] != '') {
        $order_by = " ORDER BY " . $condition['sort'];
    } else {
        $order_by = " ORDER BY `package_status` ASC  ";
    }
    $sql = "SELECT * FROM `candidate` q where status = 1 " . $appendquery . $order_by . $limitQry;

    $query_exec = $CI->db->query($sql);
    $data['list'] = $query_exec->result_array();

    $cquery = "SELECT COUNT(id) as total FROM `candidate` q where status = 1 " . $appendquery;
    $cquery_exec = $CI->db->query($cquery);
    $data['total'] = $cquery_exec->row_array();

    return $data;
}
function clean_data($string)
{ 
$pattern = "/[^@\s]*@[^@\s]*\.[^@\s]*/";
$replacement = "*";
$cleanstring="";
$cleanstring=preg_replace($pattern, $replacement, $string);
 $cleanstring=preg_replace('/\d+/u', '', $cleanstring);
 return $cleanstring;
}
function clean($string)
{
    $string = str_replace(' ', '-', $string); // Replaces all spaces with hyphens.

    return preg_replace('/[^0-9\-]/', '', $string); // Removes special chars.
}
function create_search_url($post = array())
{
    $url = '';
    if (isset($post) && is_array($post) && count($post) > 0) {

        if (isset($post['search_name']) && $post['search_name'] != "") {
            $url = $url . "&search_name=" . $post['search_name'];
        }
        if (isset($post['search_by_package']) && $post['search_by_package'] != "") {
            $url = $url . "&search_by_package=" . $post['search_by_package'];
        }

        if (isset($post['search_email']) && $post['search_email'] != "") {
            $url = $url . "&search_email=" . $post['search_email'];
        }

        if (isset($post['search_phone']) && $post['search_phone'] != "") {
            $url = $url . "&search_phone=" . $post['search_phone'];
        }
        if (isset($post['search_mobile']) && $post['search_mobile'] != "") {
            $url = $url . "&search_mobile=" . $post['search_mobile'];
        }

        if (isset($post['resume_title']) && $post['resume_title'] != "") {
            $url = $url . "&title=" . $post['resume_title'];
        }

        if (isset($post['designation']) && is_array($post['designation']) && count($post['designation']) > 0) {
            $url = $url . "&desi=" . implode(",", $post['designation']);
        }

        if (isset($post['nationality']) && is_array($post['nationality']) && count($post['nationality']) > 0) {
            $url = $url . "&nati=" . implode(",", $post['nationality']);
        }

        if (isset($post['country']) && is_array($post['country']) && count($post['country']) > 0) {
            $url = $url . "&country=" . implode(",", $post['country']);
        }
        if (isset($post['search_div']) && $post['search_div'] != '') {
            $url .= $url . "&search_div=" . implode(",", $post['search_div']);
        }

        if (isset($post['div']) && $post['div'] != "") {
            $url = $url . "&div=" . $post['div'];
        }
    }
    return $url;
}
function candidate_update($data)
{
    $candidate_id = $data['candidate_id'];
    $CI = &get_instance();
    if ($data['source'] == 1) {
        $modified_by  = $data['sessiondata']['user_id'];
    } else {

        $modified_by = $data['sessiondata']['id'];
    }
    /**
     * create user
     */
    $user_data = array(
        'modified_by' => $modified_by,
        'modified_date' => date('Y-m-d H:i:s'),
        'name' => $data['candidate']['name'],
        'email' => $data['candidate']['email_id'],
        'contactno' => $data['candidate']['mobile_number'],
        'is_admin' => 2,
    );
    //echo '<pre>';
    //print_r($data);
    //exit();

    if ($data['user']['password'] != "") {
        $user_data['password'] = md5($data['user']['password']);
    }
    $CI->gm->update('user', $user_data, '', array('id' => $data['user_id']));

    /**
     * inser data into candidate table
     */
    $candidate_image = "";
    $year = date("Y");
    $month = date("m");
    $filename = 'media/' . $year;
    $filename2 = 'media/' . $year . '/' . $month;

    $relative_path = 'media/' . $year . '/' . $month . '/';

    if (file_exists($filename)) {
        if (file_exists($filename2) == false) {
            mkdir($filename2, 0777);
        }
    } else {
        mkdir($filename, 0777);
    }
    if (file_exists($filename)) {
        if (file_exists($filename2) == false) {
            mkdir($filename2, 0777);
        }
    } else {
        mkdir($filename, 0777);
    }

    $fileName = $_FILES["profile_image"]["name"];
    $filetmppath = $_FILES['profile_image']['tmp_name'];
    $config['upload_path'] = $relative_path;
    $config['allowed_types'] = 'jpg|jpeg|png';
    /*
         * rename filename with date
         */
    $config['file_name'] = date("Y-m-d-H-i-s") . $fileName;
    $CI->load->library('upload', $config);

    if (!$CI->upload->do_upload("profile_image")) {
        $error = array('error' => $CI->upload->display_errors());
        // redirect('employee');
    } else {
        $image_data = $CI->upload->data();

        $newpath = $image_data['file_name'];
        $candidate_image = $relative_path . $newpath;
    }


    $candidate_data = array(
        'modified_by' => $modified_by,
        'modified_date' => date('Y-m-d H:i:s'),
        'name' => clean_data($data['candidate']['name']),
        'profile_image' => $candidate_image,
        'dob' => date('Y-m-d', strtotime($data['candidate']['dob'])),
        'email_id' => $data['candidate']['email_id'],
        'skype_id' => $data['candidate']['skype_id'],
        'address' => clean_data($data['candidate']['address']),
        'country' => $data['candidate']['contries'],
        'nationality' => $data['candidate']['nationality'],
        'state' => $data['candidate']['state'],
        'city' => $data['candidate']['city'],
        'current_salary' => clean($data['candidate']['current_salary']),
        'expected_salary' => clean($data['candidate']['expected_salary']),
        'pin_code' => $data['candidate']['pin_code'],
        'division' => $data['candidate']['division'],
        'designation' => $data['candidate']['designation'],
        'phone_number' => $data['candidate']['phone_number'],
        'mobile_number' => $data['candidate']['mobile_number'],
        'resume_title' => clean_data($data['candidate']['resume_title']),
        'primary_language' => $data['candidate']['primary'],
        'is_authorized' =>isset($data['candidate']['is_authorized']) && $data['candidate']['is_authorized'] == 1? 1:"",
        'mobile_number_country_code'=>$data['candidate']['phonecode'],
        'notice_period' => $data['candidate']['notice'],
        'additional_skill' => clean_data($data['candidate']['additional_skill']),
        'additional_info' => clean_data($data['candidate']['additional_info']),
    );
    $CI->gm->update('candidate', $candidate_data, '', array('id' => $data['candidate_id']));
    /**
     * 
     * Insert Qualification in db
     */
    $inac_Qaul = "UPDATE qualification SET status =2 WHERE candidate_id='" . $candidate_id . "'";
    $CI->db->query($inac_Qaul);
    if (isset($data['edu_qualification']) && is_array($data['edu_qualification']) && count($data['edu_qualification']) > 0) {
        foreach ($data['edu_qualification'] as $akey => $avalue) {
            if (isset($data['edu_id'][$akey]) && $data['edu_id'][$akey] > 0) {
                $qualification_insert = array(
                    'qualification' => $avalue,
                    'university' => clean_data(isset($data['edu_university'][$akey]) ? $data['edu_university'][$akey] : ''),
                    'passing_year' => isset($data['edu_year'][$akey]) ? $data['edu_year'][$akey] : 0,
                    'country' => isset($data['edu_country'][$akey]) ? $data['edu_country'][$akey] : 0,
                    'candidate_id' => $candidate_id,
                    'status' => 1,
                    'modified_date' => date('Y-m-d H:i:s'),
                    'modified_by' => $modified_by,
                );
                $CI->gm->update('qualification', $qualification_insert, '', array('id' => $data['edu_id'][$akey]));
            } else {
                $qualification_insert = array(
                    'qualification' => $avalue,
                    'university' => clean_data(isset($data['edu_university'][$akey]) ? $data['edu_university'][$akey] : ''),
                    'passing_year' => isset($data['edu_year'][$akey]) ? $data['edu_year'][$akey] : 0,
                    'country' => isset($data['edu_country'][$akey]) ? $data['edu_country'][$akey] : 0,
                    'candidate_id' => $candidate_id,
                    'created_date' => date('Y-m-d H:i:s'),
                    'created_by' => $modified_by,
                );
                $CI->gm->insert('qualification', $qualification_insert);
            }
        }
    }

    /**
     * 
     * Insert career in db
     */
    $inac_Career = "UPDATE career SET status =2 WHERE candidate_id='" . $candidate_id . "'";
    $CI->db->query($inac_Career);
    if (isset($data['career_position']) && is_array($data['career_position']) && count($data['career_position']) > 0) {
        foreach ($data['career_position'] as $akey => $avalue) {
            if (isset($data['career_id'][$akey]) && $data['career_id'][$akey] > 0) {
                $career_insert = array(
                    'position' => clean_data($avalue),
                    'employer' => clean_data(isset($data['career_Employeer'][$akey]) ? $data['career_Employeer'][$akey] : ''),
                    'country' => isset($data['career_country'][$akey]) ? $data['career_country'][$akey] : 0,
                    'from_date' => isset($data['career_fromdate'][$akey]) ? $data['career_fromdate'][$akey] : 0,
                    'to_date' => isset($data['career_todate'][$akey]) ? $data['career_todate'][$akey] : 0,
                    'till_date' => isset( $data['till_date_id']) && $data['till_date_id'] != '' && $data['till_date_id'] == $akey ? 1 : 0,
                    'candidate_id' => $candidate_id,
                    'status' => 1,
                    'modified_date' => date('Y-m-d H:i:s'),
                    'modified_by' => $modified_by,
                );
                $CI->gm->update('career', $career_insert, '', array('id' => $data['career_id'][$akey]));
            } else {
                $career_insert = array(
                    'position' => clean_data($avalue),
                    'employer' => clean_data(isset($data['career_Employeer'][$akey]) ? $data['career_Employeer'][$akey] : ''),
                    'country' => isset($data['career_country'][$akey]) ? $data['career_country'][$akey] : 0,
                    'from_date' => isset($data['career_fromdate'][$akey]) ? $data['career_fromdate'][$akey] : 0,
                    'to_date' => isset($data['career_todate'][$akey]) ? $data['career_todate'][$akey] : 0,
                    'till_date' => isset( $data['till_date_id']) && $data['till_date_id'] != '' && $data['till_date_id'] == $akey ? 1 : 0,
                    'candidate_id' => $candidate_id,
                    'created_date' => date('Y-m-d H:i:s'),
                    'created_by' => $modified_by,
                );
                $CI->gm->insert('career', $career_insert);
            }
        }
    }


    $inac_Career = "DELETE FROM candidate_language  WHERE candidate_id='" . $candidate_id . "'";
    $CI->db->query($inac_Career);
    foreach ($data['languages'] as $akey => $avalue) {
        $languages_insert = array(
            'language_id' => $avalue,
            'candidate_id' => $candidate_id,
            'created_date' => date('Y-m-d H:i:s'),
            'created_by' => $modified_by,
        );
        $CI->gm->insert('candidate_language', $languages_insert);
    }
    $inac_Career = "DELETE FROM certificate  WHERE candidate_id='" . $candidate_id . "'";
    $CI->db->query($inac_Career);
    if (isset($data['course_name']) && is_array($data['course_name']) && count($data['course_name']) > 0) {
        foreach ($data['course_name'] as $akey => $avalue) {
            $certificate_insert = array(
                'course' => clean_data($avalue),
                'course_date' => isset($data['course_date'][$akey]) ? date('y-m-d', strtotime($data['course_date'][$akey])) : '',
                'valid_date' => isset($data['valid_date'][$akey]) ? date('y-m-d', strtotime($data['valid_date'][$akey])) : '',
                'organization' => clean_data(isset($data['organization'][$akey]) ? $data['organization'][$akey] : ''),
                'candidate_id' => $candidate_id,
                'created_date' => date('Y-m-d H:i:s'),
                'created_by' => $modified_by,
            );

            $CI->gm->insert('certificate', $certificate_insert);
        }
    }
    return $candidate_id;
}

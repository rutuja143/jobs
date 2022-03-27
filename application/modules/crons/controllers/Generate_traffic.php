<?php

class Generate_traffic extends MX_Controller
{

    function convert_string_array($string)
    {
        /**
         (1) Hindi   (2) Gujarati
?luent in Hindi Urdu
arabic.
arabic/ frensh
hindi/marathi
• Arabic   English.
ENGLISH & HINDI
TAMIL.ENGLISHHINDIARABIC
English/Romanian
English Bengali Hindi Assamese
bengali/hindi
hindi / urdu
English/ hindi/portuguese
ENGLISH  HINDI &  GUJARATI
English Hindi Malayalam & Tamil
TAMIL & hINDI
Urdu / English
single character exclude
         */
        //$string = '• Arabic   English.';
        $clean1 = preg_replace('/[^A-Za-z\-]/', ' ', $string);
        $clean2 = strtolower(trim($clean1));
        $array = explode(' ', $clean2);
        $final_array = array();
        if (isset($array) && is_array($array) && count($array) > 0) {
            foreach ($array as $key => $value) {
                if ($value != '') {
                    $final_array[] = $value;
                }
            }
        }
        return $final_array;
        /*echo '<pre>';
        print_r($array);
        echo '********';
        print_r($final_array);
        echo '</pre>';
        exit;*/
    }

    /**
     * migrate candidate
     */
    function migrate_candidate()
    {
		$start = microtime(true);
        $this->load->helper('candidate');
        $otherdb = $this->load->database('falconjob_live_old_website', TRUE); // the TRUE paramater tells CI that you'd like to return the database object.
        $this->load->model('Global_model', 'gm');
        $last_data_query = $this->gm->get_selected_record('candidate', $select = "*", array(), $order_by = 'old_id desc');
        /*echo '<pre>';
        print_r($last_data_query);
        echo '</pre>'; 
        exit;*/
        define('LIMIT', 10);
        $query = 'SELECT * FROM fj_resumes where resume_id > ' . $last_data_query['old_id'] . ' order by resume_id asc limit ' . LIMIT;
        //$query = 'SELECT * FROM fj_resumes where resume_id > 0 order by resume_id asc limit ' . LIMIT;
        $old_data = $otherdb->query($query)->result_array();
        /*echo '<pre>';
        print_r($old_data);
        echo '</pre>'; 
        exit;*/
        $created_by = 1;
        //echo '<pre>';
        foreach ($old_data as $key => $value) {
            if ($value['city'] != '') {
                //echo '<pre>';
                //print_r($value);
                //echo '</pre>';
                //exit;
            }
            //exit;
            /**
             * get data from fj_resumes
             */
            $data['source'] = 1;
            $data['sessiondata']['user_id'] = 1;
            $data['candidate']['name'] = $value['name'];
            $data['candidate']['email_id'] = $value['username'];
            $data['candidate']['created_date'] = $value['created_on'];
            $data['user']['password'] = $value['password'];
            $data['candidate']['email_id'] = $value['username'];
            $data['candidate']['skype_id'] = $value['skype_id'];
            $data['candidate']['dob'] = $value['dob'];
            $data['candidate']['address'] = $value['address'];
            $data['candidate']['contries'] = $this->get_country_id($value['resi_country']);
            $data['candidate']['nationality'] = $this->get_country_id($value['nationality']);
            $data['candidate']['state'] = $this->get_state_id($value['state'], $data['candidate']['contries']);
            $data['candidate']['city'] = $this->get_city_id($value['city'], $data['candidate']['state']);
            $data['candidate']['pin_code'] = $value['pin_code'];
            $data['candidate']['division'] = $value['category_id'];
            $data['candidate']['designation'] = $value['subcat_id'];
            $data['candidate']['phone_number'] = $value['phone_no'];
            $data['candidate']['mobile_number'] = $value['mobile_no'];
            $data['candidate']['phonecode'] = $value['mobile_country_code'];
            $data['candidate']['resume_title'] = $value['resume_title'];

            $data['candidate']['is_authorized'] = $value['authorised'];
            $data['candidate']['notice'] = ($value['notice_period'] + 1);
            $data['candidate']['additional_skill'] = $value['additional_skills'];
            $data['candidate']['additional_info'] = $value['additional_information'];
            $data['candidate']['current_salary'] = (int) $value['curr_sal'];
            $data['candidate']['expected_salary'] = (int) $value['exp_sal'];
            $data['candidate']['old_id'] = $value['resume_id'];

            $temp_pl = $this->convert_string_array($value['language']);
            if (isset($temp_pl[0])) {
                $data['candidate']['primary'] = $this->get_language_id($temp_pl[0]);
            } else {
                $data['candidate']['primary'] = '';
            }
            //echo '<pre>';
            //print_r($data);
            //echo '</pre>';
            //exit;
            $candidate_id = candidate_insert($data);
            //echo $candidate_id;
            //echo '<br>';
            $oldurl = 'employers/resume_detail_direct_cv_search/' . $value['resume_id'] . '.html';
            $temp = array(
                'request_url' => $oldurl,
                'redirect_url' => 'candidate/view/' . $candidate_id,
                'type' => 2 //candidate
            );
            $this->gm->insert('redirects', $temp);

            if ($value['s_language'] != '') {

                $string = $value['s_language'];
                $clean2 = str_replace("&", ",", $string);
                $clean3 = str_replace("and", ",", $clean2);
                //echo '<pre>';
                //echo '*******************';
                //echo '<br>';
                //print_r($clean3);
                $clean4 = str_replace("'", "", strtolower(trim($clean3)));
                $langs = $this->convert_string_array($clean4);

                if (isset($langs) && is_array($langs) && count($langs) > 0) {
                    //echo '<pre>';
                    //echo '*********80**********';
                    //echo '<br>';
                    //print_r($langs);
                    //echo '</pre>';
                    foreach ($langs as $langkey => $langvalue) {

                        $temp = array(
                            'status' => 1,
                            'created_date' => $data['candidate']['created_date'],
                            'created_by' => $created_by,
                            'candidate_id' => $candidate_id,
                            'language_id' => $this->get_language_id($langvalue)
                        );
                        //print_r($temp);
                        $this->gm->insert('candidate_language', $temp);
                        //print_r($this->db->last_query());
                    }
                }
            }
            if ($value['s_language'] != '') {
                //print_r($data);
                //echo '</pre>';
                //echo $candidate_id;
                //exit;
                //echo '<br>';
            }
            //echo '<pre>';
            //print_r($langs);
            //echo '</pre>';
            //exit;
            /**
             * get data fj_resumes_add_cert certifications
             */
            $query = 'SELECT * FROM `fj_resumes_add_cert` WHERE `resume_id` = ' . $value['resume_id'];
            //$query = 'SELECT * FROM `fj_resumes_add_cert` WHERE `resume_id` = 2';
            $cer_data = $otherdb->query($query)->result_array();
            if (isset($cer_data) && is_array($cer_data) && count($cer_data) > 0) {
                foreach ($cer_data as $ckey => $cvalue) {
                    /*echo '<pre>';
                    print_r($cvalue);
                    echo '</pre>';
                    exit;*/
                    if ($cvalue['course_name'] != '' &&  $cvalue['course_name'] != 'Array') {
                        $certificate_insert = array(
                            'course' => $cvalue['course_name'],
                            'course_date' => date('y-m-d', strtotime($cvalue['from_date'])),
                            'valid_date' => date('y-m-d', strtotime($cvalue['to_date'])),
                            'organization' => $cvalue['organisation_name'],
                            'candidate_id' => $candidate_id,
                            'created_date' => $data['candidate']['created_date'],
                            'created_by' => $created_by,
                        );
                        //echo '<pre>';
                        //print_r($certificate_insert);
                        //echo '</pre>';
                        $this->gm->insert('certificate', $certificate_insert);
                    }
                }
            }
            /**
             * get data fj_resumes_edu_train education
             */
            $query = 'SELECT * FROM `fj_resumes_edu_train` WHERE `resume_id` = ' . $value['resume_id'];
            //$query = 'SELECT * FROM `fj_resumes_edu_train` WHERE `resume_id` = 2';
            $edu_data = $otherdb->query($query)->result_array();
            if (isset($edu_data) && is_array($edu_data) && count($edu_data) > 0) {
                foreach ($edu_data as $ckey => $cvalue) {
                    /*echo '<pre>';
                    print_r($cvalue);
                    echo '</pre>'*/
                    $qualification_insert = array(
                        'qualification' => $cvalue['qualification_id'],
                        'university' => $cvalue['institute_name'],
                        'passing_year' => $cvalue['to_year'],
                        'country' => $this->get_country_id($cvalue['country_code']),
                        'candidate_id' => $candidate_id,
                        'created_date' => $data['candidate']['created_date'],
                        'created_by' => $created_by,
                    );
                    /*echo '<pre>';
                    print_r($qualification_insert);
                    echo '</pre>';
                    exit;*/
                    $this->gm->insert('qualification', $qualification_insert);
                }
            }
            /**
             * get data fj_resumes_curr_position current position job experience
             */
            $query = 'SELECT * FROM `fj_resumes_exp_req_ind` WHERE `resume_id` = ' . $value['resume_id'];

            //$query = 'SELECT * FROM `fj_resumes_edu_train` WHERE `resume_id` = 2';
            $exp_data = $otherdb->query($query)->result_array();
            //echo '<pre>';
            //print_r($exp_data);
            //print_r($data);
            //echo '</pre>';
            //exit;
            if (isset($exp_data) && is_array($exp_data) && count($exp_data) > 0) {
                foreach ($exp_data as $ckey => $cvalue) {
                    //echo '<pre>';
                    //print_r($cvalue);
                    //echo '</pre>'; 
                    if ($cvalue['position'] != '' && $cvalue['employer'] != '') {
                        $career_insert = array(
                            'position' => $cvalue['position'],
                            'employer' => $cvalue['employer'],
                            'country' => $this->get_country_id($cvalue['country_code']),
                            'from_date' => $cvalue['from_month'] . '/' . $cvalue['from_year'],
                            'to_date' => $cvalue['to_month'] . '/' . $cvalue['to_year'],
                            'candidate_id' => $candidate_id,
                            'created_date' => $data['candidate']['created_date'],
                            'created_by' => $created_by,
                        );
                        //echo '<pre>';
                        //print_r($career_insert);
                        //echo '</pre>';
                        //exit;
                        $this->gm->insert('career', $career_insert);
                    }
                }
            }
            //echo '<pre>';
            //print_r($cer_data);
            //echo '</pre>';
            //exit;

            //exit;
        }



        /**
         * 
         */
		 $time_elapsed_secs = microtime(true) - $start;
		 echo $time_elapsed_secs;
    }

    /**
     * migrate countries
     */
    function migrate_countries()
    {
        /**
         * connect old db
         */

        $otherdb = $this->load->database('falconjob_live_old_website', TRUE); // the TRUE paramater tells CI that you'd like to return the database object.
        $old_data = $otherdb->query('SELECT * FROM fj_country')->result_array();

        $this->load->model('Global_model', 'gm');
        foreach ($old_data as $key => $value) {
            //echo '<pre>';
            //print_r($value);
            //echo '</pre>'; 
            //exit;
            $clean2 = str_replace("&", ",", $value['name']);
            $name = str_replace("'", "", strtolower(trim($clean2)));
            $data = array(
                'sortname' => $value['country_code'],
                'name' => $name,
                'c_ph_code' => $value['c_ph_code'],
            );
            //echo '<pre>';
            //print_r($data);
            //echo '</pre>'; 
            //exit;
            $this->gm->insert('countries', $data);
            //exit;
        }
        /**
         * insert into our table
         */
    }

    /**
     * migreate jobs
     */
    function migrate_jobs()
    {
        /**
         * get data from fj_jobs
         * 	id job_id
         * created_by
         * created_date posted_date
         * title
         * division category_id
         * designation subcat_id
         * min_experience min_exp
         * max_experience max_exp
         * requirements position_vacant
         * location
         * salary
         * currency_id
         * nationality
         * description job_desc
         * certification
         * status all active
         * sef
         * meta keywords keywords
         * meta description 
         */
        $otherdb = $this->load->database('falconjob_live_old_website', TRUE); // the TRUE paramater tells CI that you'd like to return the database object.
        $old_data = $otherdb->query('SELECT * FROM fj_employer_requirment ')->result_array();

        $this->load->model('Global_model', 'gm');
        $this->load->helper('job');
        $this->load->helper('sef');
        foreach ($old_data as $key => $value) {
            //echo '<pre>';
            //print_r($value);
            //echo '</pre>';
            //exit;
            /**
             * fj_employer_requirment
             */
            /**
             * get employer name
             */
            $query = 'SELECT * FROM fj_employers WHERE `emp_id` = ' . $value['emp_id'];
            $result = $otherdb->query($query)->row_array();
            /*echo '<pre>';
            print_r($result);
            echo '</pre>';*/
            /**
             * get nationalidy id from our database
             */
            $nationality = $this->gm->get_selected_record('countries', $select = "*", array('sortname =' => $value['nationality']), $order_by = '');
            $data = array(
                'created_by' => 1,
                'created_date' => $value['created_on']
            );
            $data['jobs'] = array(
                'title' => $value['heading'],
                'employer_name' => $result['company_name'],
                'industry' => $value['division'],
                'designation' => $value['designation'],
                'min_experience' => $value['min_exp'],
                'max_experience' => $value['max_exp'],
                'requirements' => $value['no_of_requirment'],
                'locations' => '',
                'salary' => $value['salary'],
                'currency' => $this->get_currency_id($value['salary_currency']),
                'nationality' => $nationality['id'],
                'description' => $value['job_description'],
                'certification' => $value['certification_required'],
                'status' => 1
            );
            //echo '<pre>';
            //print_r($data);
            //echo '</pre>';
            //exit;
            $jobs_id = insert_jobs($data);
            //echo $jobs_id;
            //echo '<br>';

            //exit;
            if (is_numeric($jobs_id)) {
                /**
                 * add hook entry
                 */
                /**
                 * get job sef url
                 */
                $temp = $this->gm->get_selected_record('jobs', $select = "*", array('id' => $jobs_id), $order_by = '');
                //echo '<pre>';
                //print_r($temp);
                //echo '</pre>';
                $oldurl = 'resumes/job_detail/' . $value['requirment_id'] . '.html';
                $temp = array(
                    'request_url' => $oldurl,
                    'redirect_url' => $temp['sef'],
                    'type' => 1 //jobs
                );
                $this->gm->insert('redirects', $temp);
                //exit;   
            } else {
                echo 'error';
                exit;
            }
        }
    }

    function get_language_id($string)
    {
        $this->load->model('Global_model', 'gm');
        if ($string != '') {
            $name = str_replace("'", "", strtolower(trim($string)));
            $check = $this->gm->get_selected_record('languages', $select = "*", array('name =' => $name), $order_by = '');
            if (isset($check) && is_array($check) && count($check) > 0) {
                return $check['id'];
            } else {
                $temp = array(
                    'name' => str_replace(",", "", trim($string)),
                    'status' => 1,
                    'created_by' => date('Y-m-d H:i:s')
                );
                if ($temp['name'] != '') {
                    return $this->gm->insert('languages', $temp);
                } else {
                    return '';
                }
            }
        } else {
            return '';
        }
    }

    function get_country_id($string)
    {
        $this->load->model('Global_model', 'gm');

        if ($string != '') {
            $clean2 = str_replace("&", ",", $string);
            $name = str_replace("'", "", strtolower(trim($clean2)));
            $check = $this->gm->get_selected_record('countries', $select = "*", array('sortname =' => trim($name)), $order_by = '');
            //print_r($this->db->last_query());
            if (isset($check) && is_array($check) && count($check) > 0) {
                return $check['id'];
            } else {
                //echo '<pre>';
                //print_r(GetCallingMethodName());
                //print_r(debug_backtrace());
                //echo debug_backtrace()[1]['function'];
                //$e = new Exception();
                //$e = new Exception;
                //var_dump($e->getTraceAsString());
                //$trace = $e->getTrace();
                //position 0 would be the line that called this function so we ignore it
                //$last_call = $trace[1];
                //print_r($last_call);
                //echo 'here:' . $name;
                //echo 'script ended due to error line 195';
                //exit;
                return '';
            }
        } else {
            return '';
        }
    }
    function get_currency_id($string)
    {
        //echo $string;
        $this->load->model('Global_model', 'gm');
        $check = $this->gm->get_selected_record('currency', $select = "*", array('code =' => trim($string)), $order_by = '');
        if (isset($check) && is_array($check) && count($check) > 0) {
            return $check['id'];
        } else {
            $temp = array(
                'code' => trim($string),
                'name' => trim($string)
            );
            return $this->gm->insert('currency', $temp);
        }
    }
    function get_state_id($string, $country_id)
    {
        $this->load->model('Global_model', 'gm');
        $check = $this->gm->get_selected_record('states', $select = "*", array('name =' => trim($string), 'country_id' => $country_id), $order_by = '');
        if (isset($check) && is_array($check) && count($check) > 0) {
            return $check['id'];
        } else {
            $temp = array(
                'name' => strtolower(trim($string)),
                'country_id' => trim($country_id)
            );
            if ($temp['name'] != '') {
                return $this->gm->insert('states', $temp);
            } else {
                return 0;
            }
        }
    }
    function get_city_id($string, $state_id)
    {
        //echo $string;exit;
        //echo '<br>';
        //echo $state_id;
        //exit;
        $this->load->model('Global_model', 'gm');
        $clean2 = str_replace("&", ",", $string);
        $name = str_replace("'", "", strtolower(trim($clean2)));
        $check = $this->gm->get_selected_record('cities', $select = "*", array('name =' => trim($name), 'state_id' => $state_id), $order_by = '');


        if (isset($check) && is_array($check) && count($check) > 0) {
            return $check['id'];
        } else {

            $temp = array(
                'name' => str_replace(",", "", strtolower(trim($name))),
                'state_id' => trim($state_id)
            );
            //echo 'sfdfsd';
            //print_r($temp);
            //exit;
            if ($temp['name'] != '' && $temp['name'] != NULL && !empty($temp['name'])) {
                return $this->gm->insert('cities', $temp);
                //print_r($this->db->last_query());
                //exit;
            } else {
                return 0;
            }
        }
    }

    /**
     * migreate jobs applied by candidate data
     */
    function migrate_job_applied_by_canididate()
    {
        /**
         * fj_job_appli
         */
    }

    /**
     * migreate employers
     */
    function migrate_employers()
    {
        /**
         * get data fj_employers
         */
        /**
         * 1 user
         * 2 employer
         * 
         * user fj_employers
         * name company_name
         * email username
         * password password
         * contactno phone_no
         * is_admin 3
         * created date reg_date
         * 
         * employer
         * 6 standardrd col
         * address
         * city
         * state
         * pin_code
         * phone_no
         * fax_no
         * mobile_country_code
         * mobile_no
         * contact_person
         * contact_desig
         * web_site
         * company_profile
         * created date reg_date
         * 
         */
        $otherdb = $this->load->database('falconjob_live_old_website', TRUE); // the TRUE paramater tells CI that you'd like to return the database object.
        $old_data = $otherdb->query('SELECT * FROM fj_employers limit 500 offset 2000')->result_array();

        $this->load->model('Global_model', 'gm');
        foreach ($old_data as $key => $value) {
            $user_data = array(
                'name' => $value['company_name'],
                'created_date' => $value['reg_date'],

                'email' => $value['email'],
                'password' => md5($value['password']),
                'contactno' => $value['phone_no'],
                'is_admin' => 3,
            );
            $user_id = $this->gm->insert('user', $user_data);

            $data = array(
                'id' => $value['emp_id'],
                'address' => $value['address'],
                'phone_no' => $value['phone_no'],
                'fax_no' => $value['fax_no'],
                'mobile_country_code' => $value['mobile_country_code'],
                'mobile_no' => $value['mobile_no'],
                'contact_person' => $value['contact_person'],
                'contact_desig' => $value['contact_desig'],
                'web_site' => $value['web_site'],
                'company_profile' => $value['company_profile'],
                'created_date' => $value['reg_date'],
                'user_id' => $user_id,

            );
            $this->gm->insert('employers', $data);
        }
    }

    function migrate_qualifications()
    {
        /**
         * get data from fj_qualification
         */
        $otherdb = $this->load->database('falconjob_live_old_website', TRUE); // the TRUE paramater tells CI that you'd like to return the database object.
        $old_data = $otherdb->query('SELECT * FROM fj_qualification')->result_array();

        $this->load->model('Global_model', 'gm');
        foreach ($old_data as $key => $value) {
            $data = array(
                'id' => $value['qualification_id'],
                'name' => $value['name'],
                'created_date' => date('Y-m-d H:i:s'),
                'status' => $value['is_active'],
            );
            $this->gm->insert('course', $data);
        }
    }

    function migrate_divisions()
    {
        /**
         * fj_categories divions
         * fj_sub_categories designation
         */
        $otherdb = $this->load->database('falconjob_live_old_website', TRUE); // the TRUE paramater tells CI that you'd like to return the database object.
        $old_data = $otherdb->query('SELECT * FROM fj_categories')->result_array();
        /*echo '<pre>';
        print_r($old_data);
        echo '</pre>';
        exit;*/
        $this->load->model('Global_model', 'gm');
        foreach ($old_data as $key => $value) {
            /*echo '<pre>';
            print_r($value);
            echo '</pre>';
            exit;*/
            $clean2 = str_replace("&", ",", $value['name']);
            $name = str_replace("'", "", strtolower(trim($clean2)));
            $data = array(
                'id' => $value['category_id'],
                'name' => $name,
                'created_date' => date('Y-m-d H:i:s'),
                'status' => 1,
            );
            /*echo '<pre>';
            print_r($data);
            echo '</pre>';
            exit;*/
            $this->gm->insert('division', $data);
        }
    }
    function migrate_disignation()
    {
        /**
         * fj_categories divions
         * fj_sub_categories designation
         */
        $otherdb = $this->load->database('falconjob_live_old_website', TRUE); // the TRUE paramater tells CI that you'd like to return the database object.
        $old_data = $otherdb->query('SELECT * FROM fj_sub_categories')->result_array();
        /*echo '<pre>';
        print_r($old_data);
        echo '</pre>'; 
        exit;*/
        $this->load->model('Global_model', 'gm');
        foreach ($old_data as $key => $value) {
            $clean2 = str_replace("&", ",", $value['name']);
            $name = str_replace("'", "", strtolower(trim($clean2)));
            $data = array(
                'id' => $value['subcat_id'],
                'name' => $name,
                'created_date' => date('Y-m-d H:i:s'),
                'division_id' => $value['category_id'],
            );
            $this->gm->insert('designation', $data);
        }
    }
}

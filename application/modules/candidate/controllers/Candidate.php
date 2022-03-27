<?php

class Candidate extends MX_Controller
{

    function __construct()
    {
        parent::__construct();
    }

    function index()
    {
        $this->job_list();
    }

    function resume()
    {
        $this->load->helper('candidate');
        $this->load->helper('frontend_common');
        $this->load->model('Global_model', 'gm');
        $search = $this->input->get();
        $append = '';
        $page = $this->uri->segment(3);
        $this->load->model('Global_model', 'gm');
        $limit = PER_PAGE_FRONTEND;
        if ($page == 0) {
            $offset = 0;
        } else {
            $offset = ($page - 1) * $limit;
        }
        if ($offset < 0) {
            $offset = 0;
        }

        $can_data = array(
            'limit' => $limit,
            'offset' => $offset,
            'search' => $search
        );
        $data = candidiate_list($can_data);

        if (isset($search['div']) && $search['div'] != '') {
            $append = "AND division_id IN(" . $search['div'] . ")";
        }

        $desq = "SELECT * FROM designation WHERE status=1 " . $append;
        $desq .= " order by name asc";
        $des_exe = $this->db->query($desq);
        $designation = $des_exe->result_array();
        if (isset($designation) && is_array($designation) && count($designation) > 0) {
            foreach ($designation as $dkey => $dvalue) {
                $data['designation'][$dvalue['id']] = $dvalue;
            }
        }

        $countries = $this->gm->get_data_list('countries', array(), array(), array('name' => 'asc'), "*");
        if (isset($countries) && is_array($countries) && count($countries) > 0) {
            foreach ($countries as $ckey => $cvalue) {
                $data['countries'][$cvalue['id']] = $cvalue;
            }
        }

        $this->load->library('pagination');
        $count_id = $data['total']['total'];
        $config['base_url'] = site_url('candidate/resume');
        $config['total_rows'] = $count_id;

        $config['per_page'] = $limit;
        if (count($_GET) > 0) {
            $config['suffix'] = '?' . http_build_query($_GET, '', "&");
        }
        $config['num_links'] = 1;
        $config['use_page_numbers'] = TRUE;
        $config['full_tag_open'] = '<ul class="pagination">';
        $config['full_tag_close'] = '</ul>';
        $config['first_link'] = 'FIRST';
        $config['first_tag_open'] = '<li title = "Go to first page">';
        $config['first_tag_close'] = '</li>';
        $config['last_link'] = 'LAST';
        $config['last_tag_open'] = '<li title = "Go to last page">';
        $config['last_tag_close'] = '</li>';
        $config['next_link'] = 'NEXT';
        $config['next_tag_open'] = '<li title = "Go to next page">';
        $config['next_tag_close'] = '</li>';
        $config['prev_link'] = 'PREVIOUS';
        $config['prev_tag_open'] = '<li title = "Go to previous page">';
        $config['prev_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class = "current-page" title = "Current page"><a>';
        $config['cur_tag_close'] = '</a></li>';
        $config['first_url'] = $config['base_url'] . '?' . http_build_query($_GET);
        $this->pagination->initialize($config);
        $data['division'] = get_division();
        /*echo '<pre>';
        print_r($data);
        echo '</pre>';
        exit;*/ 
        $view = 'candidiate_resume';
        $this->_display($view, $data);
    }

    function search()
    {
        $this->load->helper('candidate');
        $post = $this->input->post();
        $url = create_search_url($post);
        redirect('candidate/resume?' . $url);
    }

    function _display($view, $data)
    {
        $this->load->view('frontend_header', $data);
        $this->load->view($view, $data);
        $this->load->view('frontend_footer');
    }

    function view()
    {
        $this->load->helper('url');
        $this->load->model('Global_model', 'gm');
        $this->load->helper('frontend_common_helper');
        $this->load->helper('candidate_helper');
        $candidateId = $this->uri->segment(3);
        $data = candidate_data($candidateId);
        $view = 'view_candidate';
        /*echo '<pre>';
        print_r($data);
        echo '</pre>';
        exit;*/
        $this->_display($view, $data);
    }

    function view_resume($candidate_id = '')
    {
        $this->load->model('Global_model', 'gm');
        $this->load->helper('candidate');
        $this->load->helper('pdf');
        $data['candidate']['name'] = 'john';
        $pdfname = $data['candidate']['name'] . " id-" . $candidate_id . "_" . rand(0000, 9999) . ".pdf";
        $pdf_filename = save_pdf('candidate_resume_pdf_new', $data, $pdfname, $paper = 'portrait');
        redirect(base_url() . $pdf_filename);
        //echo $pdf_filename;
        /*header('Content-Type: application/pdf');
        header("Content-Disposition: attachment; filename=\"$pdf_filename\"");
        readfile($pdf_filename);*/
    }

    function show_resume($candidate_id = '')
    {
        $this->load->model('Global_model', 'gm');
        $this->load->helper('candidate');
        $this->load->helper('pdf');
        $data = candidate_data($candidate_id);
        //echo '<pre>';
        //print_r($data);
        //exit();

        $pdfname = $data['candidate']['name'] . " id-" . $candidate_id . "_" . rand(0000, 9999) . ".pdf";
        $pdf_filename = save_pdf('candidate_resume_pdf_new', $data, $pdfname, $paper = 'portrait');

        //echo $pdf_filename;
        header('Content-Type: application/pdf');
        header("Content-Disposition: attachment; filename=\"$pdf_filename\"");
        readfile($pdf_filename);
    }

    function register()
    {
        $this->load->helper('url');
        $this->load->module('login');

        $login = new Login();
        if (!$login->_is_logged_in()) {

            // $this->load->helper('url');
            redirect(site_url());
        }

        $this->load->helper('frontend_common_helper');
        $this->load->library('user_agent');
        $this->load->model('Global_model', 'gm');
        $data = array();
        $data['course'] = get_course();
        $data['session'] = $this->session->userdata('user');
        $data['user'] = $this->gm->get_selected_record('user', '*', $where = array('id' => $data['session']['id']), array());
        $data['countries'] = get_countries();
        $data['division'] = get_division();
        $data['edu_years'] = get_all_years();
        $data['languages'] = get_launguage();
        $data['phonecode']=get_phonecode();
        $data['mode'] = 'insert';
        $view = 'candidate_register';
        $this->_display($view, $data);
    }

    function get_state()
    {
        $this->load->helper('frontend_common_helper');
        $this->load->model('Global_model', 'gm');
        $state = $this->input->post('countries_id');
        echo json_encode(get_states($state));
    }

    function get_cities()
    {
        $this->load->helper('frontend_common_helper');
        $this->load->model('Global_model', 'gm');
        $city = $this->input->post('state_id');
        echo json_encode(get_cities($city));
    }

    function get_designation()
    {
        $this->load->helper('frontend_common_helper');
        $this->load->model('Global_model', 'gm');
        $designation = $this->input->post('division_id');
        echo json_encode(get_designation(array($designation)));
    }

    function set_candidate()
    {
        $this->load->helper('url');
        $this->load->model('Global_model', 'gm');
        $this->load->helper('upload_helper');
        $data = $this->input->post();
        $data['source'] = 2;
        $data['sessiondata'] = $this->session->userdata('user');
        $this->load->helper('candidate_helper');
        $response['candidate_id'] = candidate_insert($data);
        $response['status'] = 'success';
        $session = $this->session->userdata('user');
        $session['candidate_id'] = $response['candidate_id'];
        $this->session->set_userdata('user', $session);
        $session_data = $this->session->userdata('user');
        $this->session->set_flashdata('add_feedback', 'Candidate Added Successfully.');

        if (isset($response['status']) && $response['status'] == 'success') {
            redirect('candidate/view/' . $response['candidate_id']);
        } else {
            redirect('candidate/register/entry');
        }
    }
    /**
     * 
     * To insert candidate data in database
     * 
     */
    function insert($data)
    {
        $response = array('status' => 'failed');
        $this->load->model('Global_model', 'gm');
        return $response;
    }

    /***
     * 
     *To check insert or  update details of candidate
     *
     */
    function edit()
    {
        $this->load->helper('url');
        $this->load->model('Global_model', 'gm');
        $this->load->helper('frontend_common_helper');
        $data['session'] = $this->session->userdata('user');
        $data['candidate'] = $this->gm->get_selected_record('candidate', '*', $where = array('user_id' => $data['session']['id']), array());
        /**(
         * 
         *Check if candidate is register or not  if candidate is register then update else insert
         *
         *  ) */
        if ($data['candidate']['id'] > 0) {

            $data['mode'] = 'update';
            $data['user'] = $this->gm->get_selected_record('user', '*', $where = array('id' => $data['session']['id']), array());
            $data['qualification'] = $this->gm->get_data_list('qualification', $where = array('status' => 1, 'candidate_id' => $data['candidate']['id']), array(), '', "*");
            $data['career'] = $this->gm->get_data_list('career', $where = array('status' => 1, 'candidate_id' => $data['candidate']['id']), array(), '', "*");
            $data['countries'] = get_countries();
            $data['division'] = get_division();
            $data['edu_years'] = get_all_years();
            $data['languages'] = get_launguage();
            $data['phonecode']=get_phonecode();
            $data['certificate'] = $this->gm->get_data_list('certificate', $where = array('status' => 1, 'candidate_id' => $data['candidate']['id']), array(), '', "*");
            $data['course'] = get_course();
            $langlist = $this->gm->get_data_list('candidate_language', $where = array('status' => 1, 'candidate_id' => $data['candidate']['id']), array(), '', "*");
            foreach ($langlist as $key => $value) {
                $data['candidate_lang'][$value['language_id']] = $value['language_id'];
            }
            $data['state'] = get_states($data['candidate']['country']);
            $data['cities'] = get_cities($data['candidate']['state']);
            $data['mode'] = "update";
            /*echo '<pre>';
            print_r($data);
            echo '</pre>';*/
            $data['designation'] = get_designation(array($data['candidate']['division']));
        } else {
            $data['session'] = $this->session->userdata('user');
            $data['course'] = get_course();
            $data['user'] = $this->gm->get_selected_record('user', '*', $where = array('id' => $data['session']['id']), array());
            $data['countries'] = get_countries();
            $data['division'] = get_division();
            $data['edu_years'] = get_all_years();
            $data['phonecode']=get_phonecode();
            $data['languages'] = get_launguage();
            $data['mode'] = 'insert';
        }
        $view = 'candidate_register';
        $this->_display($view, $data);
    }

    function update()
    {
        $this->load->helper('url');
        $this->load->model('Global_model', 'gm');
        $this->load->helper('upload_helper');
        $this->load->helper('candidate');

        $data = $this->input->post();
        $data['sessiondata'] = $this->session->userdata('user');
        $data['source'] = 2;
        $candidate_id = candidate_update($data);
        $response['status'] = 'success';
        $response['candidate_id'] = $candidate_id;

        $this->session->set_flashdata('update_feedback', 'Candidate Update Successfully.');
        redirect('candidate/view/' . $candidate_id);
        return $response;
    }
    function check_email_register()
    {
        $this->load->model('Global_model', 'gm');
        $data = $this->gm->get_selected_record('user', $select = "*", $where = array('email' => $_POST['email_id'], 'status' => 1), $order_by = '');

        if ((isset($data['id']) > 0)) {
            return http_response_code(401);
        } else {
            return http_response_code(200);
        }
    }
}

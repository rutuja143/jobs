<?php

class Candidate_admin extends MX_Controller
{

    function __construct()
    {

        parent::__construct();

        $this->load->module('login/admin_login');

        $login = new Admin_login();
        if (!$login->_is_logged_in()) {

            $this->session->set_userdata('login_page', 'backend');
            $this->load->helper('url');
            redirect('login/admin_login');
        }
    }

    function index()
    {
        $this->entry();
    }

    function entry()
    {
        $this->load->helper('url');
        $this->load->helper('frontend_common_helper');
        $this->load->library('user_agent');
        $this->load->model('Global_model', 'gm');
        $data = array();
        $data['countries'] = get_countries();
        $data['phonecode'] = get_phonecode();
        $data['division'] = get_division();
        $data['edu_years'] = get_all_years();
        $data['languages'] = get_launguage();
        $data['course'] = get_course();
        $data['mode'] = 'insert';
        /* echo '<pre>';
          print_r($data);
          echo '</pre>';
          print_r($data['division'][1]);
          exit; */
        $this->_display('add_admin', $data);
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
        $data['source'] = 1;
        $data['sessiondata'] = $this->session->userdata('admin_user');
        $response = $this->insert($data);
        if (isset($response['status']) && $response['status'] == 'success') {
            redirect('candidate/candidate_admin/entry_list');
        } else {
            redirect('candidate/candidate_admin/entry');
        }
    }

    function insert($data)
    {
        $response = array('status' => 'failed');
        $this->load->model('Global_model', 'gm');


        $this->load->helper('candidate_helper');
        candidate_insert($data);
        $response['status'] = 'success';

        $this->session->set_flashdata('add_feedback', 'Candidate Added Successfully.');

        return $response;
    }

    function _generate_data($limit, $offset)
    {
        $limitQry = '';
        if (isset($limit) && $limit != '0') {
            $limitQry = " LIMIT " . $limit . " OFFSET " . $offset;
        }

        $get = $this->input->get();
        $appendquery = '';
        if (isset($get) && is_array($get) && count($get) > 0) {

            if (isset($get['search_name']) && $get['search_name'] != '') {
                $appendquery .= " AND q.name Like '%" . $get['search_name'] . "%'";
            }
            if (isset($get['search_by_package']) && $get['search_by_package'] != '') {
                $appendquery .= " AND q.package_id != 0 AND q.package_status = 1";
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
            if (isset($get['search_div']) && $get['search_div'] != '') {
                $appendquery .= " AND q.designation in (" . $get['search_div'] . ")";
            }
        }
        $sql = "SELECT * FROM `candidate` q where status = 1  " . $appendquery . " ORDER BY `package_status` ASC " . $limitQry;

        $query_exec = $this->db->query($sql);
        $data['list'] = $query_exec->result_array();

        $cquery = "SELECT COUNT(id) as total FROM `candidate` q where status = 1 " . $appendquery;
        $cquery_exec = $this->db->query($cquery);
        $data['total'] = $cquery_exec->row_array();

        return $data;
    }

    function entry_list()
    {

        $this->load->helper('url');
        $page = $this->uri->segment(4);
        $this->load->model('Global_model', 'gm');
        $limit = PER_PAGE_ADMIN;
        if ($page == 0) {
            $offset = 0;
        } else {
            $offset = ($page - 1) * PER_PAGE_ADMIN;
        }
        if ($offset < 0) {
            $offset = 0;
        }
        $clause = '';
        if (isset($_GET['name'])) {
            $clause = " AND name LIKE '%" . $_GET['name'] . "%'";
        }
        $data = $this->_generate_data($limit, $offset);

        $data['offset'] = $offset;


        $this->load->library('pagination');
        $count_id = $data['total']['total'];
        $config['base_url'] = site_url('candidate/candidate_admin/entry_list');
        $config['total_rows'] = $count_id;

        $config['per_page'] = PER_PAGE_ADMIN;
        if (count($_GET) > 0) {
            $config['suffix'] = '?' . http_build_query($_GET, '', "&");
        }
        $config['num_links'] = 3;
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
        $designation = $this->gm->get_data_list('designation', $where = array('status' => 1), array(), '', "*");
        foreach ($designation as $key => $value) {
            $data['designation'][$value['division_id']][$value['id']] = ucwords($value['name']);
        }
        $view = 'entry_list';
        //echo '<pre>';
        /// print_r($data);
        // exit; 

        $this->_display($view, $data);
    }

    function update()
    {
        $this->load->helper('url');
        $this->load->model('Global_model', 'gm');
        $this->load->helper('upload_helper');
        $this->load->helper('candidate');
        $data = $this->input->post();
        $data['sessiondata'] = $this->session->userdata('admin_user');
        $data['source'] = 1;
        //echo '<pre>';
        //print_r($data);
        //exit();
        $candidate_id = candidate_update($data);
        $response['status'] = 'success';
        $response['candidate_id'] = $candidate_id;

        $this->session->set_flashdata('update_feedback', 'Candidate Update Successfully.');
        redirect('candidate/candidate_admin/entry_list');
        return $response;
    }

    function _display($view, $data)
    {
        $this->load->view('admin_header');
        $this->load->view('sidebar');
        $this->load->view($view, $data);
        $this->load->view('admin_footer');
    }

    function edit()
    {
        $this->load->helper('url');
        $this->load->model('Global_model', 'gm');
        $this->load->helper('frontend_common_helper');
        $data['candidate'] = $this->gm->get_selected_record('candidate', '*', $where = array('id' => $this->uri->segment(4)), array());
        $data['user'] = $this->gm->get_selected_record('user', '*', $where = array('id' => $this->uri->segment(4)), array());
        $data['qualification'] = $this->gm->get_data_list('qualification', $where = array('status' => 1, 'candidate_id' => $this->uri->segment(4)), array(), '', "*");
        $data['career'] = $this->gm->get_data_list('career', $where = array('status' => 1, 'candidate_id' => $this->uri->segment(4)), array(), '', "*");
        $data['countries'] = get_countries();
        $data['division'] = get_division();
        $data['phonecode'] = get_phonecode();

        $data['edu_years'] = get_all_years();
        $data['languages'] = get_launguage();
        $data['certificate'] = $this->gm->get_data_list('certificate', $where = array('status' => 1, 'candidate_id' => $this->uri->segment(4)), array(), '', "*");
        $data['course'] = get_course();
        $langlist = $this->gm->get_data_list('candidate_language', $where = array('status' => 1, 'candidate_id' => $this->uri->segment(4)), array(), '', "*");
        foreach ($langlist as $key => $value) {
            $data['candidate_lang'][$value['language_id']] = $value['language_id'];
        }


        $data['state'] = get_states($data['candidate']['country']);
        $data['cities'] = get_cities($data['candidate']['state']);
        $data['mode'] = "update";
        $data['designation'] = get_designation(array($data['candidate']['division']));
        $view = 'add_admin';
        //echo '<pre>';
        //print_r($data);exit;
        $this->_display($view, $data);
    }
    function show_resume($candidate_id = '')
    {
        $this->load->model('Global_model', 'gm');
        $this->load->helper('candidate');
        $this->load->helper('pdf');
        $data = candidate_data($candidate_id);

        $data['session'] = $this->session->userdata('admin_user');
        // echo '<pre>';
        // print_r($data);
        // exit();

        $pdfname = $data['candidate']['name'] . " id-" . $candidate_id . "_" . rand(0000, 9999) . ".pdf";
        $pdf_filename = save_pdf('candidate_resume_pdf_new', $data, $pdfname, $paper = 'portrait');
        header('Content-Type: application/pdf');
        header("Content-Disposition: attachment; filename=\"$pdf_filename\"");
        readfile($pdf_filename);
    }

    function delete()
    {

        $this->load->helper('url');
        $this->load->model('Global_model', 'gm');
        $session_data = $this->session->userdata('admin_user');
        $candidate_data['status'] = 2;
        $candidate_data['modified_date'] = date('Y-m-d H:i:s');
        $candidate_data['modified_by'] = isset($session_data['user_id']) ? $session_data['user_id'] : 0;
        $this->gm->update('candidate', $candidate_data, 0, array('id' => $this->uri->segment(4)));
        $this->gm->update('user', $candidate_data, 0, array('id' => $this->uri->segment(4)));
        $this->session->set_flashdata('delete_feedback', 'Candidate Deleted Successfully.');
        redirect(site_url('candidate/candidate_admin/entry_list'));
    }

    function search()
    {
        $this->load->helper('candidate');
        $post = $this->input->post();
        //echo '<pre>';
        //print_r($post);
        //exit();
        $url = create_search_url($post);
        redirect('candidate/candidate_admin/entry_list?' . $url);
    }

    function view()
    {
        $this->load->helper('url');
        $this->load->model('Global_model', 'gm');
        $this->load->helper('frontend_common_helper');
        $this->load->helper('candidate');

        $candidateId = $this->uri->segment(4);
        $data = candidate_data($candidateId);
        $view = 'view_profile';
        //echo '<pre>';
        //print_r($data);
        //exit();
        $this->_display($view, $data);
    }
    function check_email_register()
    {
        $this->load->model('Global_model', 'gm');
        echo $_POST['id'];
        $data = $this->gm->get_selected_record('user', $select = "*", $where = array('email' => $_POST['email_id'], 'status' => 1, 'id !=' => $_POST['id']), $order_by = '');
        //echo '<pre>';
        print_r($data);
        //exit();
        if ((isset($data['id']) > 0)) {
            return http_response_code(401);
        } else {
            return http_response_code(200);
        }
    }
}

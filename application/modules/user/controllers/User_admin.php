<?php

class User_admin extends MX_Controller
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
        $appendquery = ' AND is_admin = 3 ';
        if (isset($get) && is_array($get) && count($get) > 0) {

            if (isset($get['search_name']) && $get['search_name'] != '') {
                $appendquery .= " AND u.name Like '%" . $get['search_name'] . "%'";
            }

            if (isset($get['search_email']) && $get['search_email'] != '') {
                $appendquery .= " AND u.email Like '%" . $get['search_email'] . "%'";
            }

            
        }
        $sql = "SELECT * FROM `user` u where status = 1 " . $appendquery . " ORDER BY `id` DESC " . $limitQry;
 
        $query_exec = $this->db->query($sql);
        $data['list'] = $query_exec->result_array();
       
        $cquery = "SELECT COUNT(id) as total FROM `user` u where status = 1 " . $appendquery;
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
        $config['base_url'] = site_url('user/user_admin/entry_list');
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

        $data['employer_packages'] = get_employer_packages();

        $view = 'entry_list';
        /*echo '<pre>';
        print_r($data);
        exit;*/

        $this->_display($view, $data);
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
        $data['edu_years'] = get_all_years();
        $data['languages'] = get_launguage();
        $langlist = $this->gm->get_data_list('candidate_language', $where = array('status' => 1, 'candidate_id' => $this->uri->segment(4)), array(), '', "*");
        foreach ($langlist as $key => $value) {
            $data['candidate_lang'][$value['language_id']] = $value['language_id'];
        }


        $data['state'] = get_states($data['candidate']['country']);
        $data['cities'] = get_cities($data['candidate']['state']);
        $data['mode'] = "update";
        $data['designation'] = get_designation($data['candidate']['division']);
        $view = 'add_admin';
        //echo '<pre>';
        //print_r($data);exit;
        $this->_display($view, $data);
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
        $this->load->helper('user');
        $post = $this->input->post();
        $url = create_search_url($post);
        redirect('user/user_admin/entry_list?' . $url);
    }

    function view()
    {
        $this->load->helper('url');
        $this->load->model('Global_model', 'gm');
        $this->load->helper('frontend_common_helper');
        $this->load->helper('payment');
        $this->load->helper('candidate');

        $employerid = $this->uri->segment(4);
        $data = array();
        $data['payment_transactions'] = get_payment_transactions($employerid);
        $data['employer_info'] = get_employer_info($employerid);
        $temp = get_employer_packages();
        foreach ($temp as $key => $value) {
            $data['employer_packages'][$value['id']] = $value;
        }
        $view = 'view_profile';
        /*echo '<pre>';
        print_r($data);
        exit();*/
        $this->_display($view, $data);
    }
}

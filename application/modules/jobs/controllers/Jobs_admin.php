<?php

class Jobs_admin extends MX_Controller
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
        $data['division'] = get_division();
        $data['currency'] = get_currency();
        $data['mode'] = 'insert';
        /*echo '<pre>';
        print_r($data);
        echo '</pre>';
        exit;*/
        $this->_display('add_jobs', $data);
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
    /**
     * 
     *insert job in database 
     *
     */
    function set_jobs()
    {
        $this->load->helper('url');
        $this->load->model('Global_model', 'gm');
        $this->load->helper('upload_helper');
        $data = $this->input->post();
        $this->load->helper('sef_helper');
        $this->load->helper('job');
        $data['sessiondata'] = $this->session->userdata('admin_user');
        $data['created_by'] = $data['sessiondata']['user_id'];
        /*echo '<pre>';
        print_r($data);
        echo '</pre>';
        exit;*/ 
        $jobs_id = insert_jobs($data);
        $response['jobs'] = $jobs_id;
        if ($response['jobs'] > 0) {
            $response['status'] = 'success';
            $this->session->set_flashdata('add_feedback', 'Job Added Successfully.');
        }
        //$response = $this->insert($data);
        if (isset($response['status']) && $response['status'] == 'success') {
            redirect('jobs/jobs_admin/entry_list');
        } else {
            redirect('jobs/jobs_admin/entry');
        }
    }
    /***
     * 
     * show all job list
     * 
     */
    function entry_list()
    {

        $this->load->helper('url');
        $this->load->helper('job_helper');
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
        $get = $this->input->get();
        $data = generate_data($limit, $offset, $get);

        $data['offset'] = $offset;
        $data['designation'] = get_designation();
        $data['division'] = get_division();

        $this->load->library('pagination');
        $count_id = $data['total']['total'];
        $config['base_url'] = site_url('jobs/jobs_admin/entry_list');
        $config['total_rows'] = $count_id;

        $config['per_page'] = PER_PAGE_ADMIN;
        if (count($_GET) > 0) {
            $config['suffix'] = '?' . http_build_query($_GET, '', "&");
        }
        $config['num_links'] = 3;
        $config['anchor_class'] = 'class="page-link" ';
        $config['attributes'] = array('class' => 'page-link');
        $config['use_page_numbers'] = TRUE;
        $config['full_tag_open'] = '<ul class="pagination pagination-sm m-0 float-right">';
        $config['full_tag_close'] = '</ul>';
        $config['first_link'] = 'FIRST';
        $config['first_tag_open'] = '<li class="page-item" title = "Go to first page">';
        $config['first_tag_close'] = '</li>';
        $config['last_link'] = 'LAST';
        $config['last_tag_open'] = '<li class="page-item"  title = "Go to last page">';
        $config['last_tag_close'] = '</li>';
        $config['next_link'] = 'NEXT';
        $config['next_tag_open'] = '<li class="page-item"  title = "Go to next page">';
        $config['next_tag_close'] = '</li>';
        $config['prev_link'] = 'PREVIOUS';
        $config['prev_tag_open'] = '<li class="page-item"  title = "Go to previous page">';
        $config['prev_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li  class="page-item"  title = "Current page"><a>';
        $config['cur_tag_close'] = '</a></li>';
        $config['first_url'] = $config['base_url'] . '?' . http_build_query($_GET);
        $this->pagination->initialize($config);

        $view = 'entry_list';

        $this->_display($view, $data);
    }
    /***
     * 
     * update job Detalis 
     * 
     */
    function update()
    {
        $this->load->helper('url');
        $this->load->model('Global_model', 'gm');
        $this->load->helper('upload_helper');
        $this->load->helper('job');
        $data = $this->input->post();
        $data['sessiondata'] = $this->session->userdata('admin_user');
        $data['modified_by'] = $data['sessiondata']['user_id'];
        /**
         * 
         * call update function from job helper
         */
        $jobs_id = update_job($data);

        $response['status'] = 'success';
        $response['jobsid'] = $jobs_id;

        $this->session->set_flashdata('update_feedback', 'Job Update Successfully.');
        redirect('jobs/jobs_admin/entry_list');
        return $response;
    }

    function _display($view, $data)
    {
        $this->load->view('admin_header');
        $this->load->view('sidebar');
        $this->load->view($view, $data);
        $this->load->view('admin_footer');
    }
    /**
     * 
     * To Edit Job details
     */
    function edit()
    {
        $this->load->helper('url');
        $this->load->model('Global_model', 'gm');
        $this->load->helper('frontend_common_helper');
        $data['jobs'] = $this->gm->get_selected_record('jobs', '*', $where = array('id' => $this->uri->segment(4)), array());
        $data['countries'] = get_countries();
        $data['division'] = get_division();
        $data['currency'] = get_currency();
        $data['mode'] = "update";
        $data['designation'] = get_designation(array($data['jobs']['division']));
        $view = 'add_jobs';
        $this->_display($view, $data);
    }
    /***
     * 
     * To Delete Jobs 
     * 
     */
    function delete()
    {

        $this->load->helper('url');
        $this->load->model('Global_model', 'gm');
        $session_data = $this->session->userdata('admin_user');
        $jobs_data['status'] = 2;
        $jobs_data['modified_date'] = date('Y-m-d H:i:s');
        $jobs_data['modified_by'] = isset($session_data['user_id']) ? $session_data['user_id'] : 0;
        $this->gm->update('jobs', $jobs_data, 0, array('id' => $this->uri->segment(4)));
        $this->session->set_flashdata('delete_feedback', 'Job Deleted Successfully.');
        redirect(site_url('jobs/jobs_admin/entry_list'));
    }

    function search()
    {
        $post = $this->input->post();
        $url = '';
        if (isset($post) && is_array($post) && count($post) > 0) {

            if (isset($post['daterange']) && $post['daterange'] != "") {
                $actrangearray = explode('-', $post['daterange']);
                $cre_min_date = date('Y-m-d', strtotime($actrangearray[0]));
                $cre_max_date = date('Y-m-d', strtotime($actrangearray[1]));
                $url = $url . "&cre_min_date=" . $cre_min_date . "&cre_max_date=" . $cre_max_date;
            }
            if (isset($post['title']) && $post['title'] != "") {
                $url = $url . "&title=" . $post['title'];
            }
        }
        redirect('jobs/jobs_admin/entry_list?' . $url);
    }
    /**
     * 
     * To view job detalis
     * 
     */
    function view()
    {
        $this->load->helper('url');
        $this->load->model('Global_model', 'gm');
        $this->load->helper('frontend_common_helper');
        $data['jobs'] = $this->gm->get_selected_record('jobs', '*', $where = array('id' => $this->uri->segment(4)), array());
        $data['nationality'] = $this->gm->get_selected_record('countries', '*', $where = array('id' => $data['jobs']['nationality']), array());
        $data['division'] = $this->gm->get_selected_record('division', '*', $where = array('id' => $data['jobs']['division']), array());
        $data['designation'] = $this->gm->get_selected_record('designation', '*', $where = array('id' => $data['jobs']['designation']), array());
        $data['currency_id'] = $this->gm->get_selected_record('currency', '*', $where = array('id' => $data['jobs']['currency_id']), array());
        $view = 'view_profile';
        $this->_display($view, $data);
    }
}

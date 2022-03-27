<?php

class Employee_admin extends MX_Controller
{

    function __construct()
    {
        parent::__construct();

        $this->load->module('login/admin_login');

        $login = new Admin_login();
        if (!$login->_is_logged_in()) {
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
        $data['employee'] = array();
        // $lang = $this->gm->get_data_list('language', array(), array(), array('name' => 'asc'), '*', 0, array());
        //foreach ($lang as $key => $value) {
        //    $data['language'][$value['id']] = $value['name'];
        //  }
        // $data['langemplist'] = array();
        $view = 'add_entry';
        $data['mode'] = 'insert';
        $this->_display($view, $data);
    }

    function insert()
    {
        $this->load->helper('url');
        $this->load->model('Global_model', 'gm');
        $this->load->helper('upload_helper');
        $data = $this->input->post();
        
        $data['sessiondata'] = $this->session->userdata('admin_user');
        
        $user_data = array(
            'created_by' => $data['sessiondata']['user_id'],
            'created_date' => date('Y-m-d H:i:s'),
            'name' => $data['employee']['name'],
            'email' => $data['employee']['email'],
            'password' => md5($data['employee']['password']),
            'contactno' => $data['employee']['contactno'],
            'is_admin' => 1,
        );
        $user_id = $this->gm->insert('user', $user_data);
        $employee_data = array(
            'created_by' => $data['sessiondata']['user_id'],
            'created_date' => date('Y-m-d H:i:s'),
            'name' => $data['employee']['name'],
            'email' => $data['employee']['email'],
            'contactno' => $data['employee']['contactno'],
            'role' => $data['employee']['role'],
            'address'=>$data['employee']['address'],
            'user_id'=>$user_id,
        );
        $user_id = $this->gm->insert('employee', $employee_data);
        $this->session->set_flashdata('add_feedback','Employee Added Successfully!!!!');

        redirect(site_url('employee/employee_admin/entry_list'));
    }

    function entry_list()
    {
        $this->load->helper('url');
        $page = $this->uri->segment(3);
        $this->load->model('Global_model', 'gm');

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

        $query = "SELECT * FROM `employee` WHERE status='1' " . $clause . " ORDER BY `id`  DESC limit " . PER_PAGE_ADMIN . " offset " . $offset . "";

        $query_exec = $this->db->query($query);

        if ($query_exec != NULL && is_object($query_exec)) {
            $result = $query_exec->result_array();
        }


        $cquery = "SELECT count(id) as id FROM `employee` WHERE status='1' " . $clause;
        $cquery_exec = $this->db->query($cquery);
        $count = $cquery_exec->row_array();


        $data['list'] = $result;
        $data['total'] = $count['id'];
        $data['offset'] = $offset;


        $this->load->library('pagination');

        $config['base_url'] = site_url('employee/employee_admin/entry_list');
        $config['total_rows'] = $count['id'];

        $config['per_page'] = PER_PAGE_ADMIN;
        if (count($_GET) > 0) {
            $config['suffix'] = '?' . http_build_query($_GET, '', "&");
        }
        $config['num_links'] = 3;
        $config['anchor_class'] = 'class="page-link" ';
        $config['attributes'] = array('class' => 'page-link');
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

        $roles = $this->config->item('roles');
        $data['rolesname'] = $roles;

        $view = 'entry_list';
        /*echo '<pre>';
        print_r($data);
        echo '</pre>'; 
        exit;*/
        $this->_display($view, $data);
    }

    function update()
    {

        /*echo '<pre>';
        print_r($_POST);
        echo '</pre>'; 
        exit;*/
        $this->load->helper('url');
        $this->load->helper('upload_helper'); 
        $this->load->model('Global_model', 'gm');

        $data = array();
        $data=$this->input->post();
        $data['session']=$this->session->userdata('admin_user');
        $user_data = array(
            'modified_by' => $data['session']['user_id'] ,
            'modified_date' => date('Y-m-d H:i:s'),
            'name' => $data['employee']['name'],
            'email' => $data['employee']['email'],
            'contactno' => $data['employee']['contactno'],
            
        );
        if($data['employee']['password'] != ""){
            $user_data ['password'] = md5($data['employee']['password']) ;
        }
        $this->gm->update('user', $user_data, '', array('id' => $data['user']['id']));
        $emp_data = array(
            'modified_by' => $data['session']['user_id'] ,
            'modified_date' => date('Y-m-d H:i:s'),
            'name' => $data['employee']['name'],
            'email' => $data['employee']['email'],
            'contactno' => $data['employee']['contactno'],
            'role' => $data['employee']['role'],
            'address'=>$data['employee']['address'],
        );
        $this->gm->update('employee', $emp_data, '', array('user_id' => $data['user']['id']));
        

        $this->session->set_flashdata('update_feedback','Employee updated Successfully!!!!');

        

        redirect("employee/employee_admin/entry_list");
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

        $data['employee'] = $this->gm->get_selected_record('employee', '*', $where = array('id' => $this->input->get('id')), array());


        $data['mode'] = "update";
        $view = 'add_entry';
       
        $this->_display($view, $data);
    }

    function delete()
    {
        $this->load->helper('url');
        $this->load->model('Global_model', 'gm');
        $id = $this->input->post('emp_id');
       $data['session']=$this->session->userdata('admin_user'); 
        $set = array(
            'modified_by' => $data['session']['user_id'],
            'modified_date' => date('Y-m-d H:i:s'),
            'status' => 2
        );
        $this->gm->update('user', $set, 0, array('id' => $this->uri->segment(4)));
        $this->gm->update('employee', $set, 0, array('user_id' => $this->uri->segment(4)));
      $this->session->set_flashdata('delete_feedback','Employee Deleted Successfully!!!!');

   redirect("employee/employee_admin/entry_list");
    }

    function get_city()
    {
        $this->load->helper('url');
        $this->load->model('Global_model', 'gm');
        $state_id = $this->input->post('state_id');
        $city_data = $this->gm->get_data_list('cities', array('state_id' => $state_id), array(), array('id' => 'desc'), 'id,name', 0, array());

        echo json_encode($city_data);
    }

    function get_employee()
    {
        $this->load->helper('url');
        $this->load->model('Global_model', 'gm');

        $query = "SELECT * FROM `employee` WHERE `code` LIKE '%" . $_GET['term'] . "%' OR `name` LIKE '%" . $_GET['term'] . "%' ORDER BY id desc";
        $query_exec = $this->db->query($query);
        $result = $query_exec->result_array();

        $writers = array();
        if (isset($result) && is_array($result) && count($result) > 0) {
            foreach ($result as $key => $value) {
                $writers[] = $value['code'];
            }
            echo json_encode($writers);
        } else {
            http_response_code(501);
        }
    }

    function check_url()
    {
        /*
         * check ajax request
         */
        if ($this->input->is_ajax_request()) {

            $url = $this->input->post('email');

            $id = $this->input->post('id');
            $where = "";
            if (isset($id) && $id != '') {
                $where .= " And id != " . $id;
            }


            $query = "select * from employee where status = 1 and email = '" . $url . "'" . $where;
            $query_exec = $this->db->query($query);
            $ans = $query_exec->row_array();

            //$this->load->model('Global_model', 'gm');
            //$ans = $this->gm->get_selected_record('news', $select = "*", $where = array('url' => $checkurl), $order_by = '');
            if (isset($ans) && is_array($ans) && count($ans) > 0) {
                http_response_code(500);
            } else {
                http_response_code(200);
            }
        } else {
            http_response_code(500);
        }
    }
    function check_email_register()
    {
        $this->load->model('Global_model', 'gm');
        $data = $this->gm->get_selected_record('user', $select = "*", $where = array('email' => $_POST['email_id'], 'id !='=>$_POST['id'],'status' => 1), $order_by = '');

        if ((isset($data['id']) > 0)) {
            return http_response_code(401);
        } else {
            return http_response_code(200);
        }
    }
}

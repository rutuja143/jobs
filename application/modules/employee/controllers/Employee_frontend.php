<?php

class Employee_frontend extends MX_Controller {

    function __construct() {
        parent::__construct();
    }

    function index() {
        $this->entry_list();
    }

    function entry_list() {
        $this->load->helper('url');
        $this->load->helper('frontend_common');
        $data['language'] = "marathi";
        $this->lang->load('date', 'marathi');
        $this->lang->load('calendar', 'marathi');
        $this->lang->load('general', 'marathi');
        
        
        $this->load->model('Global_model', 'gm');

        $clause = '';
        if (isset($_GET['code'])) {
            $clause = " AND code LIKE '%" . $_GET['code'] . "%'";
        }

        $query = "SELECT * FROM `employee` WHERE status='1' " . $clause . " ORDER BY FIELD(role,11,1,12,2,5,4,7,6,8,10,9,3,13)  ASC ";

        $query_exec = $this->db->query($query);

        if ($query_exec != NULL && is_object($query_exec)) {
            $result = $query_exec->result_array();
        }


        $cquery = "SELECT count(id) as id FROM `employee` WHERE status='1' " . $clause;
        $cquery_exec = $this->db->query($cquery);
        $count = $cquery_exec->row_array();


        $data['list'] = $result;
        $data['total'] = $count['id'];
        //$data['offset'] = $offset;

        $role = $this->config->item('roles');
        $data['roles']=$role;
        $view = 'employee_list_frontend';
        
        $this->_display($view, $data);
    }

    function _display($view, $data) {
        $this->load->view('frontend_header',$data);
        $this->load->view($view, $data);
        $this->load->view('frontend_footer');
    }

}

<?php

class Adminx extends MX_Controller {

    function __construct() {
        parent::__construct();
        $this->load->module('login/admin_login');

        $login = new Admin_login();
        $check_login = $login->_is_logged_in();
        if (!($check_login)) {
            $this->session->set_userdata('login_page', 'backend');
            $this->load->helper('url');
            redirect('login/admin_login');
        }
    }

    function index() {
        $this->load->helper('url');
        redirect('jobs/jobs_admin/entry_list');
    }

    function _display($view, $data) {
        $this->load->view('frontend_header');
        $this->load->view($view, $data);
        $this->load->view('frontend_footer');
    }

}

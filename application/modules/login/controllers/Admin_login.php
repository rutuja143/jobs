<?php

class Admin_login extends MX_Controller
{

    function __construct()
    {
        parent::__construct();
    }

    function index()
    {
        if ($this->agent->is_browser()) {
            $agent = $this->agent->browser();
        }
        //if ($agent == 'Chrome') {
        if (TRUE) {
            $this->show_form();
        } else {
            echo 'Kindly Open this website in chrome browser only';
            exit;
        }
    }

    function _display($view, $data)
    {
        $this->load->view('backend_header_login');
        $this->load->view($view, $data);
        $this->load->view('backend_footer_login');
    }

    function show_form()
    {
        $this->load->helper('url');
        if ($this->session->userdata('RememberURL')) {
            redirect($this->session->userdata('RememberURL'));
        } else {
            $data = array();
            $this->_display('admin_login_form', $data);
        }
    }

    function _is_logged_in()
    {
        $this->load->library('user_agent');
        if ($this->agent->is_browser()) {
            $agent = $this->agent->browser();
        }

        $user = $this->session->userdata('admin_user');
        if ($user['user_id'] > 0) {
            return TRUE;
        } else {
            $last_url = $this->session->userdata('LastUrl');
            $this->session->set_userdata('RememberURL', $last_url);
            return FALSE;
        }
    }

    function uvf_login()
    {

        $this->load->model('Global_model', 'gm');
        $this->load->helper('url');
        $email = $this->input->post('username');
        $password = $this->input->post('password');

        if (isset($email) && !empty($email) && isset($password) && !empty($password)) {
            if ($this->_check_login($email, $password)) {
                http_response_code(200);
            } else {
                http_response_code(401);
            }
        } else {
            redirect(site_url('adminx'));
        }
    }

    function _check_login($email, $password)
    {
        if (!empty($email) && !empty($password)) {


            $username = trim(strip_tags($email));
            $password = trim(strip_tags($password));

            $this->load->helper('security');
            $saltpass = md5(trim(strip_tags($password)));
            /*
             * get id,email,type from user table
             */

            $row = $this->gm->get_selected_record('user', 'id,email,name,image,is_admin', array('email' => addslashes($username), 'password' => $saltpass, 'status' => 1));

            if (isset($row['id']) && is_array($row) && count($row) > 0) {

                if ($row['is_admin'] == 1) {
                    $permissions = array();
                    /**
                     * get other information
                     */
                    $employee_data = $this->gm->get_selected_record('employee', '*', array('user_id' => $row['id']));


                    $query = 'select p.name ,m.permission_id from permission p join permission_map m on(p.id=m.permission_id) where m.role_id=' . $employee_data['role'];
                    $query_exc = $this->db->query($query);
                    $result = $query_exc->result_array();
                    if (isset($result) && is_array($result) && count($result)) {
                        foreach ($result as $key => $value) {
                            $permissions[$value['permission_id']] = $value['name'];
                        }
                    }

                    $user_data = array(
                        'admin_user' => array(
                            'user_id' => $row['id'],
                            'email' => $row['email'],
                            'name' => $row['name'],
                            'image' => $row['image'],
                            'role' => $employee_data['role'],
                            'logged_in' => TRUE,
                            'permission' => $permissions
                        )

                    );
                } else {
                    /**
                     * frontend user
                     */
                }

                $this->session->set_userdata($user_data);
                return TRUE;
            }
        } else {
            return FALSE;
        }
    }

    function logout()
    {
        $this->load->helper('url');
        $this->session->unset_userdata('admin_user');
        redirect(site_url('adminx'));
    }
}

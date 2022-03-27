<?php

class Login extends MX_Controller
{

    function __construct()
    {
        parent::__construct();

        $this->load->helper('url');
        $sessiondata = $this->session->userdata('user');
    }

    function _display($view, $data)
    {
        $this->load->view('frontend_header');
        $this->load->view($view, $data);
        $this->load->view('frontend_footer');
    }

    function index()
    {

        $this->load->helper('url');
        $this->load->library('user_agent');
        $this->show_form();
    }

    function show_form()
    {
        $this->load->helper('url');
        $data = array();

        $this->_display('loginform_backend', $data);
    }

    public function check()
    {
        $this->load->model('Global_model', 'gm');
        $contact = $this->input->post('phone');
        $where = array(
            'contact' => $contact
        );
        $ans = $this->gm->get_selected_record('user', "*", $where, '');

        if (isset($ans) && is_array($ans) && count($ans) > 0) {
            $sessiondata = $this->session->set_userdata('user', $ans);
            http_response_code(200);
        } else {
            http_response_code(401);
        }
    }

    function uvf_login()
    {

        $this->load->model('Global_model', 'gm');
        $username = $this->input->post('login_email');
        $password = $this->input->post('login_password');
        if (isset($username) && !empty($username) && isset($password) && !empty($password)) {
            if ($this->_check_login($username, $password)) {
                http_response_code(200);
            } else {
                http_response_code(401);
            }
        }
    }

    function _check_login($username, $password)
    {
        if (!empty($username) && !empty($password)) {
            $username = addslashes(trim(strip_tags($username)));
            $password = trim(strip_tags($password));
            $saltpass = md5(trim(strip_tags($password)));
            $query = "select * from `user` where `status` = 1 AND is_admin!=1 AND `password` ='" . $saltpass . "' AND (`email` = '" . $username . "')";
            $query_exec = $this->db->query($query);
            $row = $query_exec->row_array();

            if (isset($row) && is_array($row) && count($row) > 0) {
                $session_data = array(
                    'user' => array(
                        'id' => $row['id'],
                        'name' => ucwords($row['name']),
                        'email' => $row['email'],
                        'logged_in' => TRUE,
                        'type' => $row['is_admin'],
                    )
                );


                /**
                 * store candidate data in session
                 */
                if ($row['is_admin'] == 2) {
                    $data['candidate'] = $this->gm->get_selected_record('candidate', '*', $where = array('user_id' => $row['id']), array());
                    if (isset($data['candidate']) && $data['candidate'] > 0) {
                        $session_data['user']['candidate_id'] = $data['candidate']['id'];
                    }
                }
                /**
                 * store employer data in session
                 */
                $this->session->set_userdata($session_data);
                return TRUE;
            } else {
                return FALSE;
            }
        } else {

            return FALSE;
        }
    }

    function show_forgot_form()
    {
        $data = array();
        $this->load->helper('url');
        $this->load->helper('frontend_common_helper');
        $this->_display('register_user_show_forgot_form', $data);
    }

    function send_password()
    {

        $this->load->helper('url');
        $this->load->model('Global_model', 'gm');
        $row = $this->gm->get_selected_record('user', '*', array('status' => 1, 'email' => addslashes($this->input->post('email'))));

        if (isset($row) && is_array($row) && count($row) > 0) {
            $email = $row['email'];
            $data['email'] = $email;
            $otp = rand(100000, 999999);
            $body = "<a href=" . site_url('login/reset_password') . "?id=32154648139898789542313987979843213" . $row['id'] . "&t=" . strtotime(date('Y-m-d H:i:s')) . ">Click here to reset password</a>";
            $this->load->helper('email');
            $subject = 'Forgot password';
            send_email($email, $subject, $body, $from_email = "", $reply_email = "", $cc_email = "", $bcc_email = "", $attachment = array(), $entity_data = array());
            $message = 'check email in order to reset password you will receive email if email is registered with us';
            $this->session->set_flashdata('message', $message);
            redirect(site_url());
        } else {
            redirect(site_url());
        }
    }

    function check_email()
    {
        $this->load->model('Global_model', 'gm');
        $data = $this->gm->get_selected_record('user', $select = "*", $where = array('email' => $_POST['email_id'], 'status' => 1, 'is_admin !=' => '1'), $order_by = '');

        if ((isset($data['id']) > 0)) {
            return http_response_code(200);
        } else {
            return http_response_code(401);
        }
    }

    function reset_password()
    {
        $data = array();
        $this->load->helper('url');
        $this->load->helper('frontend_common_helper');
        $time = $this->input->get('t');
        $datetime1 = new DateTime();
        $datetime2 = new DateTime(date('Y-m-d H:i:s', $time));

        $interval = $datetime1->diff($datetime2);
        $h = $interval->format('%h');

        if ($h > 2) {
            $message = 'Link expired';
            $this->session->set_flashdata('message', $message);
            redirect();
        }
        $this->_display('login_reset_password_form', $data);
    }

    function update_new_password()
    {
        $data = array();
        $this->load->model('Global_model', 'gm');
        $this->load->helper('url');
        $this->load->helper('frontend_common_helper');
        $user = $this->input->post('user_information');
        $userid = substr($user['id'], 35, strlen($user['id']));
        if (isset($userid)) {
            $data = array(
                'password' => md5($user['password']),
                'modified_date' => date('Y-m-d H:i:s')
            );
            $this->gm->update('user', $data, $id = 0, $where = array('id' => $userid));
            http_response_code(200);
            //print_r($this->db->last_query());
        } else {
            http_response_code(401);
        }
    }

    function logout()
    {
        $this->session->unset_userdata('user');
        redirect(site_url());
    }
    function _is_logged_in()
    {


        $user = $this->session->userdata('user');
        if ($user['id'] > 0) {
            return TRUE;
        } else {
            $last_url = $this->session->userdata('LastUrl');
            $this->session->set_userdata('RememberURL', $last_url);
            return FALSE;
        }
    }
}

<?php

class Login extends MX_Controller {

    function __construct() {
        parent::__construct();

        $this->load->helper('url');
        $sessiondata = $this->session->userdata('user');
    }

    function index() {

        $this->load->helper('url');
        $this->load->library('user_agent');
        $this->show_form();
    }

    function uvf_login() {

        $this->load->model('Global_model', 'gm');
        $username = $this->input->post('admin_login');
        $password = $this->input->post('login_password');
        if (isset($username) && !empty($username) && isset($password) && !empty($password)) {
            if ($this->_check_login($username, $password)) {
                http_response_code(200);
            } else {
                http_response_code(401);
            }
        }
    }

    function _check_login($username, $password) {
        if (!empty($username) && !empty($password)) {
            $username = addslashes(trim(strip_tags($username)));
            $password = trim(strip_tags($password));
            $saltpass = md5(trim(strip_tags($password)));
            $query = "select * from `user` where `status` = 1 AND `password` ='" . $saltpass . "' AND (`email` = '" . $username . "')";
            //echo $query;

            $query_exec = $this->db->query($query);
            $row = $query_exec->row_array();

            if (isset($row) && is_array($row) && count($row) > 0) {
                $session_data = array(
                  'user' => array(
                    'id' => $row['id'],
                    'name' => ucwords($row['first_name'] . ' ' . $row['last_name']),
                    'email' => $row['email'],
                    'first_name' => $row['first_name'],
                    'lastname' => $row['last_name'],
                    'code' => $row['code'],
                    'department' => $row['department'],
                    'logged_in' => TRUE,
                    'type' => $row['type'],
                    'country' => $row['country'],
                    'state' => $row['state'],
                    'city' => $row['city'],
                    'gender' => $row['gender'],
                    'age' => $row['age'],
                    'talent' => $row['talent'],
                    'profession' => $row['profession']
                  )
                );
                //file_put_contents('test.txt', print_r($session_data, TRUE));
                $this->session->set_userdata($session_data);

                return TRUE;
            } else {
                return FALSE;
            }
        } else {

            return FALSE;
        }
    }

    function show_form() {
        $this->load->helper('url');
        $data = array();

        $this->_display('loginform_backend', $data);
    }

    /* function uvf_login() {
      $this->load->model('Global_model', 'gm');
      $username = $this->input->post('username');
      $password = $this->input->post('password');


      if (isset($username) && !empty($username) && isset($password) && !empty($password)) {

      if ($this->_check_login($username, $password)) {
      http_response_code(200);
      } else {
      // 401-unauhorized,403 -access forbidden
      http_response_code(401);
      }
      } else {
      redirect(site_url());
      }
      }
     */

    function _display($view, $data) {
        $this->load->view('frontend_header');
        $this->load->view($view, $data);
        $this->load->view('frontend_footer');
    }

    function logout() {
        $this->load->helper('url');
        $this->session->unset_userdata('user');

        redirect(base_url());
    }

    function forgot_password() {

        /*
         * load modal
         */
        $this->load->model('Global_model', 'gm');

        /*
         * get post data i.e. username and password
         */
        $post_email = $this->input->post('email');


        /*
         * remove space from post data
         */
        $email = addslashes(trim(strip_tags($post_email)));


        /*
         * get email id and password to be send for password recovery
         */
        $query = "select id,email,password from `user` where `email` ='" . $email . "'";
        $query_exec = $this->db->query($query);
        $row = $query_exec->row_array();

        if (isset($row['email']) && !empty($row['email'])) {

            $this->load->library('email');

            $config['protocol'] = "smtp";
            $config['mailtype'] = "html";
            $config['protocol'] = 'sendmail';
            $config['mailpath'] = '/usr/sbin/sendmail';
            $config['charset'] = "utf-8";
            $config['smtp_host'] = "www.gajanan-jewellers.com";
            $config['smtp_user'] = "noreply@gajanan-jewellers.com";
            $config['smtp_pass'] = "noreply123";
            $config['smtp_port'] = "587";

            $this->email->initialize($config);
            $this->email->from('noreply@itut.com', 'ITUT');
            $this->email->to($row['email'], 'ITUT');
            $this->email->subject('ITUT Login Details : ' . date('d M Y,h:i:s A'));
            $this->email->message('<b>Email ID:</b>  ' . $row['email'] . '<br>  <b>Password :</b> ' . $row['password']);
            $this->email->send();
            print_r($this->email->print_debugger());
        } else {
            echo 'Email not Exist!';
        }
    }

    function _is_logged_in() {

        $user = $this->session->userdata('user');
        if ($user['id'] > 0) {
            return TRUE;
        } else {
            $last_url = $this->session->userdata('LastUrl');
            $this->session->set_userdata('RememberURL', $last_url);
            return FALSE;
        }
    }

    function show_forgot_form() {
        $data = array();
        $this->load->helper('url');
        $this->load->helper('frontend_common_helper');
        $this->_display('register_user_show_forgot_form', $data);
    }

    function send_password() {

        $this->load->helper('url');
        $this->load->model('Global_model', 'gm');

        $row = $this->gm->get_selected_record('user', '*', array('email' => addslashes($this->input->post('email'))));

        if (isset($row) && is_array($row) && count($row) > 0) {
            $email = $row['email'];
            $data['email'] = $email;
            $otp = rand(100000, 999999);
            $body = "<a href=" . site_url('login/reset_password') . "?id=32154648139898789542313987979843213" . $row['id'] . "&t=" . strtotime(date('Y-m-d H:i:s')) . ">Click here to reset password</a>";

            $this->load->helper('email');

            $subject = 'Forgot password';

            send_email($email, $subject, $body, $from_email = "", $reply_email = "", $cc_email = "", $bcc_email = "", $attachment = array(), $entity_data = array());
            //echo 'fsd';
            //exit;

            /* $forgot_password = array(
              'user_id' => $row['id'],
              'status' => 1,
              'otp' => $otp,
              'created_date' => date('y-m-d H:i:s')
              );
              $data = $this->gm->insert('forgot_password', $forgot_password); */
            //print_r($this->db->last_query());
            $message = 'check email in order to reset password you will receive email if email is registered with us';
            $this->session->set_flashdata('message', $message);
            redirect(site_url());
        } else {
            redirect(site_url());
        }
    }

    function reset_password() {
        $data = array();
        $this->load->helper('url');
        $this->load->helper('frontend_common_helper');

        $time = $this->input->get('t');


        $datetime1 = new DateTime();
        $datetime2 = new DateTime(date('Y-m-d H:i:s', $time));

        $interval = $datetime1->diff($datetime2);
        $h = $interval->format('%h');
//        $s = $interval->format('%i');
//        $s = $interval->format('%s');
//        echo '<pre>';
//        print_r($datetime1);
//        print_r($datetime2);
//        //print_r($elapsed);
//        $elapsed = $interval->format('%y years %m months %a days %h hours %i minutes %s seconds');
//        echo $elapsed;
//        exit;
        if ($h > 2) {
            $message = 'Link expired';
            $this->session->set_flashdata('message', $message);
            redirect();
        }


        $this->_display('login_reset_password_form', $data);
    }

    function update_new_password() {
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
        //redirect(site_url());
        //echo '<pre>';
        //print_r($row);
        //exit;
    }

}

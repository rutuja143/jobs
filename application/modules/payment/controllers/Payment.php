<?php

class Payment extends MX_Controller
{

    function __construct()
    {

        parent::__construct();

        $this->load->module('login/admin_login');

        /*$login = new Admin_login();
        if (!$login->_is_logged_in()) {

            $this->session->set_userdata('login_page', 'backend');
            $this->load->helper('url');
            redirect('login/admin_login');
        }*/
    }

    function _display($view, $data)
    {
        //echo $view;exit;
        $this->load->view('frontend_header', $data);
        $this->load->view($view, $data);
        $this->load->view('frontend_footer', $data);
    }

    function insert()
    {
        $this->load->model('Global_model', 'gm');
        $this->load->helper('payment');
        $data = $this->input->post();
        $data['status'] = 1;
        $data['created_by'] = $_SESSION['admin_user']['id'];
        /*echo '<pre>';
        print_r($data);
        echo '</pre>';
        exit; */
        $payment_transaction_id = insert_payment_transactions($data);
        if (is_numeric($payment_transaction_id)) {
            http_response_code(200);
        } else {
            http_response_code(500);
        }
    }

    function transactions()
    {
        $this->load->model('Global_model', 'gm');
        $this->load->helper('url');

        $user = $this->session->get_userdata('user');
        $updatedata['modified_by'] = $user['user']['candidate_id'];
        $data['list'] =  $this->gm->get_data_list('payment_transactions', array('candidate_id' =>  $user['user']['candidate_id']), $like = array(), array('id' => 'desc'), $select = '*', $limit = 0, array());
        //echo '<pre>';
        //print_r($this->db->last_query());
        //echo '</pre>';
        //exit;
        $this->_display('transactions', $data);
    }


    function response()
    {
        $this->load->model('Global_model', 'gm');
        $this->load->helper('url');
        $data = $this->gm->get_selected_record('payment_transactions', $select = "*", array('session_id' => $this->uri->segment(3)), array());

        $user = $this->session->get_userdata('user');
        $updatedata['modified_by'] = $user['user']['candidate_id'];
        $updatedata['modified_date'] = date('Y-m-d H:i:s');
        $updatedata['resultIndicator'] = $this->input->get('resultIndicator');
        $updatedata['response_sessionVersion'] = $this->input->get('sessionVersion');

        $resultIndicator = $this->input->get('resultIndicator');
        if ($resultIndicator == $data['successIndicator']) {
            $updatedata['status'] = 3;
            /**
             * get candidate information
             */
            $data['candidate'] = $this->gm->get_selected_record('candidate', $select = "*", array('id' => $data['candidate_id']), $order_by = '');
            $data['packages'] = $this->gm->get_selected_record('candidate_packages', $select = "*", array('id' => $data['package_id']), $order_by = '');  
            /**
             * send payment email to admin user
             *              */
            $this->load->helper('email');
            $contact_admin = $this->load->view('candidate_purchase_package_admin', $data, TRUE);
            send_email(CONTACT_ADMIN_MAIL, 'Candidate Purchase Package', $contact_admin, NOREPLY_EMAIL, $reply_email = CONTACT_ADMIN_MAIL, $cc_email = '', $attachment = array(), $entity_data = array());
            /**
             * send payment email to candidate
             */
            $this->load->helper('email');
            $contact_admin = $this->load->view('candidate_purchase_package_candidate', $data, TRUE);
            send_email(CONTACT_ADMIN_MAIL, 'Falcon: Order Information', $contact_admin, NOREPLY_EMAIL, $reply_email = CONTACT_ADMIN_MAIL, $cc_email = '', $attachment = array(), $entity_data = array());
            
        } else {
            $updatedata['status'] = 4;
        }

        $this->gm->update('payment_transactions', $updatedata, $id = 0, array('session_id' => $this->uri->segment(3)));
        $temp_data = array(
            'package_status' => 1,
            'package_id' => $data['package_id']
        );
        $this->gm->update('candidate', $temp_data, $id = 0, array('id' => $data['candidate_id']));

        $this->_display('response', $data);
    }

    function update()
    {
        $this->load->model('Global_model', 'gm');
        $this->load->helper('payment');
        $data = array();
        $user = $this->session->get_userdata('user');
        $data['modified_by'] = $user['user']['candidate_id'];
        $data['modified_date'] = date('Y-m-d H:i:s');
        $data['status'] = $this->input->post('status');
        $id = $this->gm->update('payment_transactions', $data, $id = 0, array('id' => $this->input->post('id')));
        http_response_code(200);
    }

    function request_payment()
    {
        $this->load->model('Global_model', 'gm');
        $this->load->helper('payment');
        $user = $this->session->get_userdata('user');
        if ($user['user']['candidate_id'] > 0) {

            $data =  $this->gm->get_data_list('candidate_packages', array('status' => 1, 'id' => $this->uri->segment(3)), $like = array(), $order_by = array(), $select = '*', $limit = 0, $like_or = array());

            if (isset($data[0]['id']) && $data[0]['id'] != '' && is_numeric($data[0]['id'])) {
                $payment = array();
                foreach ($data as $key => $value) {
                    $payment[1] = $value;
                }
                /*echo '<pre>';
                print_r($payment);
                exit;*/
                $pay_data = array();
                $pay_data = array(
                    'package_id' => $payment[1]['id'],
                    'created_date' => date('Y-m-d H:i:s'),
                    'payment_method' => 2,
                    'status' => 1,
                    'created_by' => $user['user']['candidate_id'],
                    'description' => $payment[1]['package_name'],
                    'candidate_id' => $user['user']['candidate_id'],
                    'session_id' => md5(date('YmdHis'))
                );
                //echo '<pre>';
                //print_r($payment);
                //print_r($pay_data);
                //echo '</pre>';
                //exit;
                $payment_transaction_id = insert_payment_transactions($pay_data);

                $temp['payment'] = $payment;
                $temp['transaction_id'] = $payment_transaction_id;
                $temp['session_id'] = $pay_data['session_id'];

                /**
                 * Create Checkout Session
                 */
                $postdata = http_build_query(
                    array(
                        'apiOperation' => 'CREATE_CHECKOUT_SESSION',
                        'apiPassword' => '7ac8d176813ff4bf925ed054918e73c1',
                        'interaction.returnUrl' => site_url('payment/response') . '/' . $temp['session_id'],
                        'apiUsername' => 'merchant.E07944950',
                        'merchant' => 'E07944950',
                        'order.id' => $payment_transaction_id,
                        'order.amount' => 0.006,
                        'order.currency' => 'BHD',
                        'interaction.operation' => 'AUTHORIZE'
                    )
                );
                $opts = array(
                    'http' =>
                    array(
                        'method'  => 'POST',
                        'header'  => 'Content-type: application/x-www-form-urlencoded',
                        'content' => $postdata
                    )
                );
                $context  = stream_context_create($opts);
                $result = file_get_contents('https://credimax.gateway.mastercard.com/api/nvp/version/52', false, $context);
                //var_dump($result);
                //echo '<pre>';
                $result_array = explode('&', $result);
                $t1 = explode('=', $result_array[2]);
                $update_data['pg_session'] = $t1[1];
                $t2 = explode('=', $result_array[4]);
                $update_data['version'] = $t2[1];
                $t3 = explode('=', $result_array[5]);
                $update_data['successIndicator'] = $t3[1];
                // echo '<pre>';
                //print_r($update_data);
                //echo '</pre>';
                //exit;
                $id = $this->gm->update('payment_transactions', $update_data, $id = 0, array('id' => $payment_transaction_id));
                //echo '<pre>';
                //print_r($result);
                // echo '</pre>';
                //exit;
                $temp['pg_session'] =  $update_data['pg_session'];
                $this->load->view('request_payment', $temp);
            } else {
                redirect('candidate-package');
            }
        } else {
            redirect('candidate-package');
        }
    }
}

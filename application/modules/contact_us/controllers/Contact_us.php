<?php

class Contact_us extends MX_Controller
{

    function __construct()
    {
        parent::__construct();
    }

    function index()
    {

        $this->show_form();
    }

    function show_form()
    {
        $this->load->helper('url');
        $this->load->helper('frontend_common_helper');
        $this->load->library('user_agent');
        $data = array();
        $this->_display('contact_us', $data);
    }

    function event_insert()
    {
        //echo '<pre>';
        //print_r($_POST);
        //print_r($_FILES);
        //echo '</pre>';
        //exit;
        $this->load->helper('url');
        $this->load->model('Global_model', 'gm');
        $this->load->helper('email_helper');

        /**
         * create user
         */
        $contactus = array(
            'name' => $_POST['event_data']['name'],
            'mobile_no' => $_POST['event_data']['contact_no'],
            'created_date' => date('Y-m-d H:i:s'),
        );
        $user_id = $this->gm->insert('user', $contactus);

        /**
         * insert event data
         */
        $input_post = $this->input->post('event_data');
        foreach ($input_post as $key => $value) {
            $contactus = array(
                'user_id' => $user_id,
                'event_id' => $this->input->post('event_id'),
                'meta_key' => $key,
                'meta_value' => $value,
                'created_date' => date('Y-m-d H:i:s')
            );
            $this->gm->insert('event_data', $contactus);
        }


        $year = date("Y");
        $month = date("m");
        $filename = 'media/' . $year;
        $filename2 = 'media/' . $year . '/' . $month;

        $relative_path = $year . '/' . $month . '/';

        if (file_exists($filename)) {
            if (file_exists($filename2) == false) {
                mkdir($filename2, 0777);
            }
        } else {
            mkdir($filename, 0777);
        }
        if (file_exists($filename)) {
            if (file_exists($filename2) == false) {
                mkdir($filename2, 0777);
            }
        } else {
            mkdir($filename, 0777);
        }
        $this->load->library('upload');
        $config['upload_path'] = 'media/' . $relative_path;
        $config['allowed_types'] = 'jpg|jpeg|png|pdf|doc';

        foreach ($_FILES as $key => $value) {

            if ($value['name'] != '') {
                $fileName = $value["name"];

                /*
                 * rename filename with date
                 */
                $config['file_name'] = date("Y-m-d-H-i-s") . $value["name"];


                $this->upload->initialize($config);
                if (!$this->upload->do_upload($key)) {
                    $error = array('error' => $this->upload->display_errors());
                    echo "<pre>";
                    print_r($error);
                    // redirect('news/news_admin/add');
                } else {
                    $image_data = $this->upload->data();
                    //$imp_path[$key] = $relative_path . $image_data['file_name'];
                    /**
                     * insert attachment
                     */
                    $contactus = array(
                        'user_id' => $user_id,
                        'event_id' => $this->input->post('event_id'),
                        'meta_key' => $key,
                        'meta_value' => $relative_path . $image_data['file_name'],
                        'created_date' => date('Y-m-d H:i:s')
                    );
                    $this->gm->insert('event_data', $contactus);
                }
            }
        }

        /*
         * send email
         */
        //print_r($contactus);
        //$thank_you_email = $this->load->view('thank_you_email', $contactus, TRUE);
        //$contact_admin = $this->load->view('contact_admin', $contactus, TRUE);
        //        echo "<pre>";
        //        print_r($thank_you_email);
        //        print_r($contact_admin);
        //        exit;
        //$this->load->helper('email');

        //if (!filter_var($contactus['txtemail'], FILTER_VALIDATE_EMAIL) === false) {
        //send_email($contactus['txtemail'], 'Thank you for enquiry', $thank_you_email, NOREPLY_EMAIL, $reply_email = CONTACT_ADMIN_MAIL, $cc_email = "", $attachment = array(), $entity_data = array());
        //send_email(CONTACT_ADMIN_MAIL, 'Enquiry from website' . date('d M Y H:i A'), $contact_admin, NOREPLY_EMAIL, $reply_email = CONTACT_ADMIN_MAIL, $cc_email = CONTACT_ADMIN_MAIL, $attachment = array(), $entity_data = array());
        //}
        /**
         * send sms
         */
        $this->load->helper('sms');
        $message = 'Thank you for register with garja hindustan. Tell your friend to give rating.';
        $contact_no = $_POST['event_data']['contact_no'];
        send_sms_bhash($message, $contact_no);

        /**
         * get redirect url
         */
        $data['event_main'] = $this->gm->get_selected_record('event', $select = "*", $where = array('id' => $this->input->post('event_id')), $order_by = '');
        //print_r($data);
        $url = 'event/' . $data['event_main']['sef'];
        //echo $url;exit;
        redirect($url);
    }

    function insert()
    {
        $this->load->helper('url');
        $this->load->model('Global_model', 'gm');
        $this->load->helper('email_helper');

        $year = date("Y");
        $month = date("m");
        $filename = 'media/' . $year;
        $filename2 = 'media/' . $year . '/' . $month;

        $relative_path = $year . '/' . $month . '/';

        if (file_exists($filename)) {
            if (file_exists($filename2) == false) {
                mkdir($filename2, 0777);
            }
        } else {
            mkdir($filename, 0777);
        }
        if (file_exists($filename)) {
            if (file_exists($filename2) == false) {
                mkdir($filename2, 0777);
            }
        } else {
            mkdir($filename, 0777);
        }
        $this->load->library('upload');
        $config['upload_path'] = 'media/' . $relative_path;
        $config['allowed_types'] = 'jpg|jpeg|png|pdf|doc';

        // $imp_path=array();

        foreach ($_FILES as $key => $value) {

            if ($value['name'] != '') {
                $fileName = $value["name"];

                /*
                 * rename filename with date
                 */
                $config['file_name'] = date("Y-m-d-H-i-s") . $value["name"];


                $this->upload->initialize($config);
                if (!$this->upload->do_upload($key)) {
                    $error = array('error' => $this->upload->display_errors());
                    echo "<pre>";
                    print_r($error);
                    // redirect('news/news_admin/add');
                } else {
                    $image_data = $this->upload->data();
                    $imp_path[$key] = $relative_path . $image_data['file_name'];
                }
            }
        }


        $contactus = array(
            'txtname' => $this->input->post('txtname'),
            'contact_no' => $this->input->post('contact_no'),
            'txtemail' => $this->input->post('txtemail'),
            'cmbsubject' => $this->input->post('cmbsubject'),
            'txtmessage' => $this->input->post('txtmessage'),
            'created_date' => date('Y-m-d H:i:s'),
            'attachment1' => isset($imp_path['attachment1']) ? $imp_path['attachment1'] : '',
            'attachment2' => isset($imp_path['attachment2']) ? $imp_path['attachment2'] : '',
            'attachment3' => isset($imp_path['attachment3']) ? $imp_path['attachment3'] : ''
        );


        $id = $this->gm->insert('contact_us', $contactus);
        /*
         * send email
         */
        //print_r($contactus);
        $thank_you_email = $this->load->view('thank_you_email', $contactus, TRUE);
        $contact_admin = $this->load->view('contact_admin', $contactus, TRUE);
        //        echo "<pre>";
        //        print_r($thank_you_email);
        //        print_r($contact_admin);
        //        exit;
        $this->load->helper('email');

        if (!filter_var($contactus['txtemail'], FILTER_VALIDATE_EMAIL) === false) {
            send_email($contactus['txtemail'], 'Thank you for enquiry', $thank_you_email, NOREPLY_EMAIL, $reply_email = CONTACT_ADMIN_MAIL, $cc_email = "", $attachment = array(), $entity_data = array());
            send_email(CONTACT_ADMIN_MAIL, 'Enquiry from website' . date('d M Y H:i A'), $contact_admin, NOREPLY_EMAIL, $reply_email = CONTACT_ADMIN_MAIL, $cc_email = CONTACT_ADMIN_MAIL, $attachment = array(), $entity_data = array());
        }

        redirect('contact-us/thank-you');
    }

    function _display($view, $data)
    {
        $this->load->view('frontend_header', $data);
        $this->load->view($view, $data);
        $this->load->view('frontend_footer');
    }

    function thank_you()
    {
        $this->load->helper('url');
        $this->load->helper('frontend_common_helper');
        $this->load->library('user_agent');
        $data = array();
        $data['language'] = $this->uri->segment(1);
        if ($data['language'] != 'hindi' && $data['language'] != 'english') {
            $data['language'] = 'marathi';
        }
        $this->_display('thank_you', $data);
    }
}

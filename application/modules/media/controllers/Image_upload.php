<?php

class Image_upload extends MX_Controller {

    function __construct() {
        parent::__construct();
//keys($this->config->item('restrict_user_profiles')));
//    
        $this->load->module('login/admin_login');
        //unset($_SESSION['RememberURL']);
        $login = new Admin_login();
        if (!$login->_is_logged_in()) {
            //echo 'fsd';exit;
            $this->session->set_userdata('url_page', $url_page);
            $this->session->set_userdata('login_page', 'backend');
            $this->load->helper('url');
            redirect('login/admin_login');
        }
    }

    function index() {
        
    }

    function _display($view, $data) {
        $this->load->view('admin_header');
        $this->load->view('sidebar', $data);
        $this->load->view($view, $data);
        $this->load->view('admin_footer');
    }

    function sent_blog_images() {
        $data = array();
        $this->load->helper('url');
        $this->_display("browse", $data);
        //echo $this->load->view('browse', $data);
    }

    function get_blog_image() {
        $data = array();
        $this->load->helper('url');
        $this->load->view("displayimages", $data);
    }

    function do_upload_ck_editor() {

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
        } if (file_exists($filename)) {
            if (file_exists($filename2) == false) {
                mkdir($filename2, 0777);
            }
        } else {
            mkdir($filename, 0777);
        }

        $fileName = $_FILES["upload"]["name"];
        $filetmppath = $_FILES['upload']['tmp_name'];

        if ($fileName != '' && $filetmppath != '') {
            /*
             * rename filename with date
             */
            $newfilename = date("Y-m-d-H-i-s") . $_FILES["upload"]["name"];

            $this->load->helper('upload_helper');
            $sessiondata = $this->session->userdata('admin_user');
            $newpath = upload_file($filetmppath, $filename2, $newfilename);

            $media_data = array(
                'user_id' => $sessiondata['id'],
                'url' => $relative_path . $newpath,
                'org_name' => $fileName,
                'created_by' => $sessiondata['id'],
                'created_date' => date('Y-m-d h:i:s')
            );
            $res = $this->db->insert('media', $media_data);
            if ($res > 0) {
                //echo json_encode($newpath);
                echo $newpath;
            } else {
                http_response_code(400);
            }
        } else {
            http_response_code(400);
        }
    }

    function upload_docs() {

        /*
         * get original file name
         */
        $fileName = $_FILES["file"]["name"];

        $config['upload_path'] = './media/files_temp/';
        $config['allowed_types'] = 'gif|jpg|jpeg|png|txt|pdf|doc|docx|html|csv|xlsx|zip|mp3|mp4|ppt';
        /*
         * rename filename with date
         */
        $config['file_name'] = date("Y-m-d-H-i-s") . '_' . rand(10, 1000) . $_FILES["file"]["name"];
        $this->load->library('upload', $config);
        if (!$this->upload->do_upload("file")) {
            $error = array('error' => $this->upload->display_errors());
            echo json_encode($error);
        } else {

            $data = array('upload_data' => $this->upload->data());

            /*
             * create array with original filename and rename file name
             */
            $temp['file_name'] = $data['upload_data']['file_name'];
            $temp['orig_name'] = $fileName;
            $temp['size'] = $data['upload_data']['file_size'];
            $temp['path'] = $data['upload_data']['full_path'];
            unset($data);

            echo json_encode($temp);
        }
    }

    function remove_image() {
        if ($this->input->is_ajax_request()) {
            /*
             * get remove filename and unlink it
             */
            $file_name = $this->input->get('file');
            if (file_exists('media/temp_img/' . $file_name)) {
                unlink('media/temp_img/' . $file_name);
            }
        }
    }

}

?>

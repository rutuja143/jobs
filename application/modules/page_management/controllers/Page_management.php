<?php

class Page_management extends MX_Controller
{

    function __construct()
    {
        parent::__construct();
    }

    function _display($view, $data)
    {
        //echo $view;exit;
        $this->load->view('frontend_header', $data);
        $this->load->view($view, $data);
        $this->load->view('frontend_footer', $data);
    }

    function index()
    {
        $this->load->library('uri');
        $this->load->helper('frontend_common');
        $data = array();
        $data = $this->get_home_page();
        $view = 'homepage';
        $data['user'] = $this->session->userdata('user');
        /*echo '<pre>';
        print_r($data);
        echo '</pre>';
        exit;*/ 
        $this->_display($view, $data);
    }

    function check_email_register()
    {
        $this->load->model('Global_model', 'gm');
        $data = $this->gm->get_selected_record('user', $select = "*", $where = array('email' => $_POST['email_id'], 'status' => 1), $order_by = '');

        if ((isset($data['id']) > 0)) {
            return http_response_code(401);
        } else {
            return http_response_code(200);
        }
    }

    function register_candidiate()
    {
        $post_data = $this->input->post();
        $this->load->model('Global_model', 'gm');
        $user_data = array(
            'created_date' => date('Y-m-d H:i:s'),
            'name' => $post_data['fullname'],
            'email' => $post_data['email'],
            'contactno' => $post_data['mobile'],
            'password' => md5($post_data['password']),
            'is_admin' => 2,
        );
        $user_id = $this->gm->insert('user', $user_data);
      
        $candidate_data = array(
            'created_date' => date('Y-m-d H:i:s'),
            'name' => $post_data['fullname'],
            'email_id' => $post_data['email'],
            'mobile_number' => $post_data['mobile'],
            'user_id'=>$user_id,
        );
        $candidate_id = $this->gm->insert('candidate', $candidate_data);
        $session_data = array(
            'user' => array(
                'id' => $user_id,
                'name' => $post_data['fullname'],
                'email' => $post_data['email'],
                'logged_in' => TRUE,
                'type' => 2,
                'candidate_id'=>$candidate_id,
            )
        );

        $this->session->set_userdata($session_data);
        /**
         * if candidate register then redirect to update profile
         */
        if ($session_data['user']['type'] == 2) {
            redirect(site_url('candidate/edit'));
        } elseif ($session_data['user']['type'] == 3) {
            redirect(site_url());
        } else {
            redirect(site_url());
        }


        /**
         * if employer register then redirect to dashboard
         */
    }

    function get_home_page()
    {
        $this->load->helper('job_helper');
        $data = array();
        /**
         * get recent last 5 jobs
         */
        $data = generate_data(5, 0);
        $data['session'] = $this->session->userdata('user');
        // echo '<pre>';
        // print_r($data);
         //exit();

        if (isset($data['session']['candidate_id'])&& $data['session']['candidate_id']> 0) {
            $data['candidateappliedjobids'] =  get_candidateappliedjobids($data['session']['candidate_id']);

        }
        /**
         * get banner division name and job count
         */


        $division_ids = ('1,2,6,7,11');
        $data['banner_division'] = array(
            0 => 1,
            1 => 2,
            3 => 6,
            4 => 7,
            5 => 11
        );
        $query = 'SELECT count(id),division FROM `jobs`where division in(' . $division_ids . ') group by division';
        //echo $query;exit;
        $get_result = $this->db->query($query);
        $job = array();
        $job_count=array();
        $job['jobs_count'] = $get_result->result_array();
        if (isset($job['jobs_count']) && is_array($job['jobs_count']) && count($job['jobs_count'])) {
            foreach ($job['jobs_count'] as $key => $value) {
                $job_count[$value['division']] = $value['count(id)'];
            }
        }
        $data['job_count'] = $job_count;

        /**
         * get division and designation
         */
        $data['division'] = get_division();
        $data['designation'] = get_designation();
        //$data['division_ids']
        //echo '<pre>';
        //print_r($data);
        //exit();
        return $data;
    }


    /**
     * static_pages
     *
     * @return void
     */
    function static_pages()
    {
        $data = array();

        $page = $this->uri->segment(1);

        $list_pages = array(
            'terms-conditions' => 'terms_condition',
            'disclaimer-privacy-policy' => 'disclaimer-privacy-policy',
            'privacy-policy' => 'privacy_policy',
            'who-we-are' => 'who_we_are',
            'why-falcon' => 'why-falcon',
            'what-we-do' => 'what-we-do',
            'candidate-package' => 'candidate-package'
        );
        if ($page != '') {
            if (array_key_exists($page, $list_pages)) {
                //echo 'sfd';exit;
                $this->_display($list_pages[$page], $data);
            } else {
                $this->_display('error', $data);
            }
        }
    }

    function pagenotfound()
    {
        $view = 'error';
        $data['heading'] = "Eror 404";
        $data['message'] = "The following Url does not exist or not found. please go back to home page";
        $this->_display($view, $data);
    }
}

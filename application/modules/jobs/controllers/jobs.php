 <?php

    class Jobs extends MX_Controller
    {

        function __construct()
        {
            parent::__construct();
        }

        function index()
        {
            $this->entry_list();
        }

        function _display($view, $data)
        {
            $this->load->view('frontend_header', $data);
            $this->load->view($view, $data);
            $this->load->view('frontend_footer');
        }
        /**
         * 
         * Show Job Details
         * 
         */
        function preview()
        {

            $this->load->helper('url');
            $this->load->model('Global_model', 'gm');
            $this->load->helper('frontend_common_helper');
            $data['jobs'] = $this->gm->get_selected_record('jobs', '*', $where = array('id' => $this->uri->segment(3)), array());
            $data['currency_id'] = $this->gm->get_selected_record('currency', '*', $where = array('id' => $data['jobs']['currency_id']), array());
            $data['nationality'] = $this->gm->get_selected_record('countries', '*', $where = array('id' => $data['jobs']['nationality']), array());
            $data['industry'] = $this->gm->get_selected_record('division', '*', $where = array('id' => $data['jobs']['division']), array());
            $data['designation'] = $this->gm->get_selected_record('designation', '*', $where = array('id' => $data['jobs']['designation']), array());
            $data['session'] = $this->session->userdata('user');
            $data['candidate_session'] = $this->session->userdata('candidate');
            /**
             * To get joblist of candidate applied
             */
            if ($data['session']['id'] > 0) {
                $data['candidate_job_list'] =  get_candidateappliedjobids($data['session']['candidate_id']);
            }
            $view = 'job_details';
            $data['title'] = 'Falcon Jobs | ' . $data['jobs']['title'];
            $this->_display($view, $data);
        }
        /**
         * 
         * Show all job list
         * 
         */
        function job_list()
        {
            $this->load->helper('job');
            $this->load->helper('frontend_common');
            $this->load->model('Global_model', 'gm');

            $search = $this->input->get();
            $append = '';
            $page = $this->uri->segment(3);
            $this->load->model('Global_model', 'gm');
            $limit = PER_PAGE_FRONTEND;
            if ($page == 0) {
                $offset = 0;
            } else {
                $offset = ($page - 1) * $limit;
            }
            if ($offset < 0) {
                $offset = 0;
            }

            $data = generate_data($limit, $offset, $search);
            $data['session'] = $this->session->userdata('user');
            $data['candidate_session'] = $this->session->userdata('candidate');
            $data['currency_id'] = get_currency();
            $data['nationality'] = get_countries();
            $data['divisions'] = get_division();
            if ($data['session']['candidate_id'] > 0) {
                $data['candidate_job_list'] =   get_candidateappliedjobids($data['session']['candidate_id']);
            }
            if (isset($search['div']) && $search['div'] != '') {
                $append = "AND division_id IN(" . $search['div'] . ")";
            }
            $desq = "SELECT * FROM designation WHERE status=1 " . $append . ' order by name asc';
            //echo $desq;exit;
            $des_exe = $this->db->query($desq);
            $designation = $des_exe->result_array();
            //echo '<pre>';
            //print_r($designation);
            //echo '</pre>';
            //exit;
            if (isset($designation) && is_array($designation) && count($designation) > 0) {
                foreach ($designation as $dkey => $dvalue) {
                    $data['designation'][$dvalue['id']] = $dvalue;
                }
            }
            $this->load->library('pagination');
            $count_id = $data['total']['total'];
            $config['base_url'] = site_url('jobs/job_list');
            $config['total_rows'] = $count_id;

            $config['per_page'] = $limit;
            if (count($_GET) > 0) {
                $config['suffix'] = '?' . http_build_query($_GET, '', "&");
            }
            $config['num_links'] = 1;
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
            $view = 'job_list';
            //echo '<pre>';
            //print_r($data);
            //echo '</pre>';
            //exit;
            $this->_display($view, $data);
        }
        /**
         * 
         * Get Search url 
         * 
         */
        function search()
        {
            $post = $this->input->post();
            $url = '';
            if (isset($post) && is_array($post) && count($post) > 0) {
                if (isset($post['designation']) && is_array($post['designation']) && count($post['designation']) > 0) {
                    $url = $url . "&desi=" . implode(",", $post['designation']);
                }
                if (isset($post['div']) && $post['div'] != "") {
                    $url = $url . "&div=" . $post['div'];
                }
                if (isset($post['job_title']) && $post['job_title'] != "") {
                    $url = $url . "&title=" . $post['job_title'];
                }
            }
            redirect('jobs/job_list?' . $url);
        }
        /**
         * 
         * Job Apply function and send mail to admin 
         * 
         */
        function job_apply()
        {
            $this->load->model('Global_model', 'gm');
            $this->load->helper('job');
            $data['post'] = $this->input->post();
            $data['session'] = $this->session->userdata('user');
            echo json_encode($data);
            if ($data['session']['candidate_id'] > 0) {
                if (apply_job($data)) {
                    http_response_code(200);
                } else {
                    http_response_code(500);
                }
            } else {
                http_response_code(403);
            }
        }
    }

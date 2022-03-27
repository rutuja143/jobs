<?php

class Contact_us_admin extends MX_Controller {

    function __construct() {
        parent::__construct();
    }

    function index() {

        $this->load->helper('url');
        $this->load->model('Global_model', 'gm');
        $page = $this->uri->segment(3);

        if ($page == 0) {
            $offset = 0;
        } else {
            $offset = ($page - 1) * 20;
        }
        if ($offset < 0) {
            $offset = 0;
        }

        $sql = "SELECT * FROM `contact_us` ORDER BY `id` DESC LIMIT 20 offset " . $offset . "";
        $query_exec = $this->db->query($sql);
        $result = $query_exec->result_array();
       
//        foreach ($result as $key => $value) {
//            if ($value['entity_type'] == 1) {
//                $trainer[$key] = $value['entity_id'];
//            } else {
//                $gym[$key] = $value['entity_id'];
//            }
//        }
//        $data['trainer_list'] = array();
//        if (isset($trainer) && is_array($trainer) && count($trainer) > 0) {
//            $cquery = "SELECT * FROM `trainer` WHERE `id` IN (" . implode(',', $trainer) . ") ORDER BY `id` DESC";
//            $cquery_exec = $this->db->query($cquery);
//            $count = $cquery_exec->result_array();
//            foreach ($count as $key => $value) {
//                $data['trainer_list'][$value['id']] = $value;
//            }
//        }
//        $data['gym_list'] = array();
//        if (isset($gym) && is_array($gym) && count($gym) > 0) {
//
//            $cquery = "SELECT * FROM `gym` WHERE `id` IN (" . implode(',', $gym) . ") ORDER BY `id` DESC";
//            $cquery_exec = $this->db->query($cquery);
//            $count = $cquery_exec->result_array();
//
//            foreach ($count as $key => $value) {
//                $data['gym_list'][$value['id']] = $value;
//            }
//        }




        $cquery = "SELECT count(id) as id FROM `contact_us` ";
        $cquery_exec = $this->db->query($cquery);
        $count = $cquery_exec->row_array();

        $data['result'] = $result;
        $data['total'] = $count['id'];
        $data['offset'] = $offset;

        $this->load->library('pagination');

        $config['base_url'] = site_url('contact_us/contact_us_admin');
        $config['total_rows'] = $count['id'];

        $config['per_page'] = 20;
        if (count($_GET) > 0) {
            $config['suffix'] = '?' . http_build_query($_GET, '', "&");
        }
        $config['num_links'] = 3;
        $config['use_page_numbers'] = TRUE;
        $config['full_tag_open'] = '<div class="pagination-custom">';
        $config['full_tag_close'] = '</div>';
        $config['first_link'] = 'FIRST';
        $config['first_tag_open'] = '&nbsp;<span title="Go to first page">';
        $config['first_tag_close'] = '</span>';
        $config['last_link'] = 'LAST';
        $config['last_tag_open'] = '&nbsp;<span title="Go to last page">';
        $config['last_tag_close'] = '</span>';
        $config['next_link'] = 'NEXT';
        $config['next_tag_open'] = '&nbsp;<span title="Go to next page">';
        $config['next_tag_close'] = '</span>&nbsp;';
        $config['prev_link'] = 'PREVIOUS';
        $config['prev_tag_open'] = '&nbsp;<span title="Go to previous page">';
        $config['prev_tag_close'] = '</span>&nbsp;';
        $config['cur_tag_open'] = '&nbsp;<span class="current-page" title="Current page">';
        $config['cur_tag_close'] = '</span>&nbsp;';
        $config['first_url'] = $config['base_url'] . '?' . http_build_query($_GET);

        $this->pagination->initialize($config);
        //echo '<pre>';
        //print_r($data);
        //exit;
        $this->_display('contact_us_list_backend', $data);
    }

    function _display($view, $data) {
        $this->load->view('admin_header');
        $this->load->view('sidebar', $data);
        $this->load->view($view, $data);
        $this->load->view('admin_footer');
    }

}
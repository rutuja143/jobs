<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

use Dompdf\Dompdf;
use Dompdf\Options;

function create_invoice($id) {



    $CI = &get_instance();

    // helper used for eav_item_attribute
    $CI->load->helper('user_fields');
    /*
     * include doompdf files
     */

    $path = $_SERVER['DOCUMENT_ROOT'] . '/' . ROOT_PATH . 'dompdf-master/autoload.inc.php';
    require_once($path);

    $data = array();
    $data['product'] = array();
    $data['sales'] = array();



    /*
     * get company name and logo
     */
    $company_name = $CI->db->query('SELECT id,company_name,image2 FROM `company` WHERE `status` = 9');
    $data['company_name'] = $company_name->row_array();

    /*
     * get company address
     */

    $company_addr = $CI->db->query("SELECT id,street_address,city,state,post_code,country FROM address WHERE status = 1 AND entity_id = '" . $data['company_name']['id'] . "' AND entity_type = 1");
    $data['company_addr'] = $company_addr->row_array();

    /*
     * get company phone,email,domain name etc
     */

    $company_num = $CI->db->query("SELECT number FROM phone_number WHERE status = 1 AND entity_id = '" . $data['company_name']['id'] . "' AND entity_type = 1 AND number_type = 'phone'");
    $data['company_num'] = $company_num->row_array();

    $company_email = $CI->db->query("SELECT number FROM phone_number WHERE status = 1 AND entity_id = '" . $data['company_name']['id'] . "' AND entity_type = 1 AND number_type = 'email'");
    $data['company_email'] = $company_email->row_array();

    $company_site = $CI->db->query("SELECT number FROM phone_number WHERE status = 1 AND entity_id = '" . $data['company_name']['id'] . "' AND entity_type = 1 AND number_type = 'site'");
    $data['company_site'] = $company_site->row_array();


    /*
     * get invoice terms & conditions
     */
    $terms_conditions = $CI->db->query("SELECT config_value FROM crm_config WHERE status = 1 AND config_key = 'invoice_terms_condition'");
    $data['terms_conditions'] = $terms_conditions->row_array();

    $query = $CI->db->query('SELECT d.id,d.comment,d.tax_per,d.store_id,d.bill_no,d.renewal_date,d.discount,d.deal_complete_date,d.entity_id,d.entity_type,
                                          d.income,d.probability,c.firstname as contact_fname,ph.number,
                                          c.lastname as contact_lname,com.company_name,u.firstname as user_fname,u.lastname as user_lname,u.workphone,l.lead_name
                                          FROM ' . TBL_DEALS . ' d '
            . 'LEFT JOIN ' . TBL_CONTACT . ' c on (d.entity_id=c.id AND d.entity_type=2) '
            . 'LEFT JOIN ' . TBL_COMPANY . ' com on (d.entity_id=com.id AND d.entity_type=1) '
            . 'LEFT JOIN ' . TBL_USERS . ' u on (d.responsible_person=u.id) '
            . 'LEFT JOIN ' . TBL_LEAD . ' l on (d.entity_id=l.id AND d.entity_type=3) '
            . 'LEFT JOIN phone_number ph on (d.entity_id=ph.entity_id AND d.entity_type=ph.entity_type) '
            . 'WHERE  ' . 'd.id = ' . $id . ' AND d.probability = 100 AND d.deal_stage = 4 AND d.status = 1 AND (com.status=1 OR c.status=1 OR l.status=1)');

    $sales_data = $query->row_array();


    if (isset($sales_data) && is_array($sales_data) && count($sales_data) > 0) {
        $client_num = $CI->db->query("SELECT number FROM phone_number WHERE status = 1 AND entity_id = '" . $sales_data['entity_id'] . "' AND entity_type = " . $sales_data['entity_type'] . " AND number_type = 'phone'");
        $data['client_num'] = $client_num->row_array();

        $client_address = $CI->db->query("SELECT * FROM address WHERE status = 1 AND entity_id = '" . $sales_data['entity_id'] . "' AND entity_type = " . $sales_data['entity_type'] . " AND address_type = 3");
        $data['client_address'] = $client_address->row_array();
      
        $entity_config = $CI->config->item('entity_type');
        $entity_type_name = $entity_config[$sales_data['entity_type']];

        $cust_userfields = fetch_userfield_item_att($entity_type_name, $sales_data['entity_id']);
        if (isset($cust_userfields) && is_array($cust_userfields) && count($cust_userfields) > 0) {
            foreach ($cust_userfields as $custkey => $custvalue) {
                $data['cust_userfields'][$custvalue['label_name']] = $custvalue['value'];
            }
        }

        /*
         * get Store address
         */

        if (isset($sales_data['store_id']) && $sales_data['store_id'] != '') {
            $query = "select s.*,u.firstname,u.lastname,co.name as country,ci.name as city,st.name as state from store s"
                    . " LEFT OUTER JOIN user u"
                    . " on u.id = s.created_by"
                    . " LEFT OUTER JOIN countries co"
                    . " on co.id = s.country_id"
                    . " LEFT OUTER JOIN cities ci"
                    . " on ci.id = s.city_id"
                    . " LEFT OUTER JOIN states st"
                    . " on st.id = s.state_id"
                    . " where s.status = 1 AND  s.id = " . $sales_data['store_id'] . "";
            $query_exec = $CI->db->query($query);

            $store_data = $query_exec->row_array();
            $data['store'] = $store_data;
        }
        $data['sales'] = $sales_data;
        $customer['name'] = (($sales_data['company_name']) && $sales_data['company_name'] != "") ? ucwords($sales_data['company_name']) : ((isset($sales_data['lead_name']) && $v['lead_name'] != "") ? ucwords($sales_data['lead_name']) : ucwords($sales_data['contact_fname']) . ' ' . ucwords($sales_data['contact_lname']));
        $customer['contact_no'] = $sales_data['number'];
        $data['customer'] = $customer;
        $data['customer']['contact_person_no'] = $sales_data['number'];
        $data['invoice']['invoice_no'] = $sales_data['bill_no'];




        //echo '<pre>';
        //print_r($customer);exit;


        if (isset($sales_data) && is_array($sales_data) && count($sales_data) > 0) {

            $product_query = 'SELECT pm.product_price as unit_price,pm.product_quantity, pm.product_total, pdt.name, pdt.unit_of_measurement,pc.name as cat_name, pdt.prod_code, pdt.description, pdt.status as product_status,pc.status as pro_cat_status  '
                    . 'FROM ' . TBL_PRODUCT_MAP . ' AS pm '
                    . 'LEFT JOIN ' . TBL_PRODUCT . ' AS pdt ON pm.product_id=pdt.id '
                    . 'LEFT JOIN ' . TBL_PRODUCT_CATEGORY . ' AS pc ON pc.id=pdt.category_id '
                    . ' WHERE pm.entity_id="' . $id . '" AND pm.entity_type= 5 AND pm.status="1" ';

            $Product_exec = $CI->db->query($product_query);
            $product = $Product_exec->result_array();
            $data['product_invoice'] = $product;
        }



        $userfields = fetch_userfield_item_att('company', $data['company_name']['id']);
        if (isset($userfields) && is_array($userfields) && count($userfields) > 0) {
            foreach ($userfields as $userkey => $uservalue) {
                $data['company_userfileds'][$uservalue['label_name']] = $uservalue['value'];
            }
        }

        $pdfdata = $CI->load->view('invoice_show_pdf', $data, true);
        
        $dompdf = new Dompdf();
        $contxt = stream_context_create([
            'ssl' => [
                'verify_peer' => FALSE,
                'verify_peer_name' => FALSE,
                'allow_self_signed' => TRUE
            ]
        ]);
        $options = new Options();

        $dompdf->setHttpContext($contxt);
        $dompdf->set_option('enable_css_float', TRUE);
        $dompdf->set_option('isRemoteEnabled', TRUE);
        $dompdf->set_option('debugKeepTemp', TRUE);
        $dompdf->set_option('isHtml5ParserEnabled', TRUE);


        $dompdf->loadHtml($pdfdata);
        // (Optional) Setup the paper size and orientation
        $dompdf->setPaper('A4', 'portrait');

        // Render the HTML as PDF
        $dompdf->render();
        $output = $dompdf->output();

        $year = date("Y");
        $month = date("m");
        $day = date("d");
        $filename = "client_media/pdfs/invoice/" . $year;
        $filename2 = "client_media/pdfs/invoice/" . $year . "/" . $month;

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
        //exit;
        $invoicename = $year . '/' . $month . '/invoice_' . $year . $month . $day . rand(000, 999) . '_' . $id . '.pdf';
        $path = $_SERVER['DOCUMENT_ROOT'] . '/' . ROOT_PATH . 'client_media/pdfs/invoice/' . $invoicename;


        file_put_contents($path, $output);

        return 'client_media/pdfs/invoice/' . $invoicename;
    }
}

?>
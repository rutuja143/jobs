<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

function send_email($recipient_email, $subject, $body, $from_email, $reply_email = "", $cc_email = "", $attachment = array()) {

    $CI = &get_instance();
    $CI->load->library('email');
    $config['protocol'] = 'smtp';
    $config['smtp_host'] = SMTP_HOST;
    $config['smtp_port'] = SMTP_PORT;
    $config['mailtype'] = "html";
    $config['charset'] = "utf-8";
    $config['smtp_user'] = SMTP_USERNAME;
    $config['smtp_pass'] = SMTP_PASSWORD;
    $config['smtp_crypto'] = "tls";
    $config['wordwrap'] = TRUE;
    $config['newline'] = "\r\n";
    $CI->email->initialize($config);
    $CI->email->from(SMTP_USERNAME);
    $CI->email->to($recipient_email);
    $CI->email->subject($subject);
    $CI->email->message($body);

    if (isset($reply_email) && $reply_email != '') {
        $CI->email->reply_to($reply_email);
    }
    if (isset($cc_email) && $cc_email != '') {
        $CI->email->cc($cc_email);
    }

    if (isset($attachment) && is_array($attachment) && count($attachment) > 0) {

        $file_path = $attachment['file_path'];
        $file_path = $_SERVER['DOCUMENT_ROOT'] . '/' . ROOT_PATH . $file_path;

        $new_file_name = $attachment['file_name'];
        $CI->email->attach($file_path, 'attachment', $new_file_name);
    }


    /*
     * if email is send then log email data
     */
    if ($CI->email->send()) {

        $reason = '';
        $status = 2;
        $returnvalue = TRUE;
    } else {
        $reason = $CI->email->print_debugger();
        $status = 1;
        $returnvalue = FALSE;
    }

    $data = array(
        'from_address' => $from_email,
        'to_address' => $recipient_email,
        'cc_address' => $cc_email,
        'subject' => $subject,
        'message' => $body,
        'mail_date' => date("Y-m-d H:i:s"),
        'status' => $status,
        'attachment' => '',
        'reason' => $reason
    );
    $CI->db->insert('email_log', $data);
    $CI->email->clear(TRUE);
    return $returnvalue;
}

function send_db_email($recipient_email, $subject, $body, $from_email, $reply_email = "", $cc_email = "", $attachment = array()) {
    $CI = &get_instance();
    $CI->load->library('email');
    $config['protocol'] = 'smtp';
    $config['smtp_host'] = SMTP_HOST;
    $config['smtp_port'] = SMTP_PORT;
    $config['mailtype'] = "html";
    $config['charset'] = "utf-8";
    $config['smtp_user'] = SMTP_USERNAME;
    $config['smtp_pass'] = SMTP_PASSWORD;
    $config['smtp_crypto'] = "tls";
    $config['wordwrap'] = TRUE;
    $config['newline'] = "\r\n";
    $CI->email->initialize($config);
    $CI->email->from('yuvraj@orggen.com');
    $CI->email->to($recipient_email);
    $CI->email->subject($subject);
    $CI->email->message($body);

    if (isset($reply_email) && $reply_email != '') {
        $CI->email->reply_to($reply_email);
    }
    if (isset($cc_email) && $cc_email != '') {
        $CI->email->cc($cc_email);
    }

    if (isset($attachment) && is_array($attachment) && count($attachment) > 0) {

        $file_path = $attachment['file_path'];
        $file_path = $_SERVER['DOCUMENT_ROOT'] . '/' . ROOT_PATH . $file_path;

        $new_file_name = $attachment['file_name'];
        $CI->email->attach($file_path, 'attachment', $new_file_name);
    }


    /*
     * if email is send then log email data
     */
    if ($CI->email->send()) {

        $reason = '';
        $status = 2;
        $returnvalue = TRUE;
    } else {
        $reason = $CI->email->print_debugger();
        $status = 1;
        $returnvalue = FALSE;
    }
//    echo '<pre>';
//    print_r($CI->email->print_debugger());
//    print_r($reason);
//    exit;
    $data = array(
        'from_address' => $from_email,
        'to_address' => $recipient_email,
        'cc_address' => $cc_email,
        'subject' => $subject,
        'message' => $body,
        'mail_date' => date("Y-m-d H:i:s"),
        'status' => $status,
        'attachment' => '',
        'reason' => $reason
    );
    $CI->db->insert('email_log', $data);
    $CI->email->clear(TRUE);
    return $returnvalue;
}

<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

function send_sms($contactno, $message) {

    $CI = & get_instance();
    $username = "kesen@vsnl.com";
    $hash = "90829a77de0c123d202827f1a8807ed6e12981a4";

// Config variables. Consult http://api.textlocal.in/docs for more info.
    $test = "0";

// Data for text message. This is the text message data.
    $sender = "KESENL"; // This is who the message appears to be from.
    $numbers = "91" . $contactno; // A single number or a comma-seperated list of numbers
    //enter Your Message 
// 612 chars or less
// A single number or a comma-seperated list of numbers
    
//    exit;

    $message = urlencode($message);
    $data = "username=" . $username . "&hash=" . $hash . "&message=" . $message . "&sender=" . $sender . "&numbers=" . $numbers . "&test=" . $test;
//echo $data;exit;

    $ch = curl_init('http://api.textlocal.in/send/?');
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $sms_log = curl_exec($ch); // This is the result from the API
    $response = json_decode($sms_log);
   
    if ($response == NULL || $response->status == 'failure') {
        $array['content'] = urldecode($message);
        $array['status'] = $response->status;
        $array['created_date'] = date('Y-m-d H:i:s');
    } else {
        $array['balance'] = $response->balance;
        $array['batch_id'] = $response->batch_id;
        $array['cost'] = $response->cost;
        $array['num_messages'] = $response->num_messages;
        $array['num_parts'] = $response->message->num_parts;
        $array['sender'] = $response->message->sender;
        $array['content'] = $response->message->content;
        $array['receipt_url'] = $response->receipt_url;
        $array['custom'] = $response->custom;
        $array['messages_id'] = $response->messages['0']->id;
        $array['recipient'] = $response->messages['0']->recipient;
        $array['status'] = $response->status;
        $array['created_date'] = date('Y-m-d H:i:s');
    }

    $CI->db->insert('sms_log', $array);
    return $CI->db->insert_id();
}

function send_sms_bhash($message, $destmobino) {
    $smsUsername = 'garja';
    $smsHashKey  = 'garja@12345';
    $CI = & get_instance();
    // Data for text message. This is the text message data.
    $sender = 'GARJAH'; // This is who the message appears to be from.
    $numbers = substr($destmobino, -10); // A single number or a comma-seperated list of numbers
    //$message = urlencode($message);
    // 1:Promotional ;2:Transactional
    $data = "user=" . $smsUsername . "&pass=" . $smsHashKey . "&phone=" . $numbers . "&sender=" . $sender . "&text=" . $message . "&priority=ndnd&stype=normal";


  
        $ch = curl_init('http://bhashsms.com/api/sendmsg.php?');
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($ch); // This is the result from the API
        curl_close($ch);
    

    $ref_url = 'http://bhashsms.com/api/sendmsg.php?' . $data;

    if (strpos($response, 'S.') !== false) {
        $array['batch_id'] = isset($response) ? $response : '';
        $array['content'] = $message;
        $array['refrence_url'] = 'Bhash';
        $array['receipt_url'] = $ref_url;
        $array['messages_id'] = isset($response) ? $response : '';
        $array['recipient'] = isset($numbers) ? $numbers : '';
        $array['status'] = 'sent';        
        $array['sender'] = $sender;        
        $array['created_date'] = date('Y-m-d H:i:s');
    } else {
        $array['status'] = 'failed';
        $array['content'] = $message;
        $array['refrence_url'] = 'Bhash';
        $array['receipt_url'] = $ref_url;
        $array['created_date'] = date('Y-m-d H:i:s');
        $array['error_code'] = '000';
        $array['error_message'] = isset($response) ? $response : '';
        $array['recipient'] = $destmobino;
        $array['sender'] = $sender;       
        $array['created_date'] = date('Y-m-d H:i:s');
    }
    $CI->db->insert('textlocal_sms_log', $array);
    unset($message);

    if (strpos($response, 'S.') !== false) {
        $send_status = TRUE;
    } else {
        $send_status = FALSE;
    }

    return $send_status;
}



?>
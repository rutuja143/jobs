<?php

function insert_payment_transactions($data)
{
    $CI = &get_instance();
    $temp_data = array(
        'package_id' => $data['package_id'],
        'created_date' => date('Y-m-d H:i:s'),
        'payment_method' => $data['payment_method'],
        'status' => $data['status'],
        'created_by' => $data['created_by'],
        'description' => $data['description'],
        'candidate_id' => $data['candidate_id'],
        'session_id' => $data['session_id']
    );
    return $CI->gm->insert('payment_transactions', $temp_data);
}

function get_payment_transactions($employer_id)
{
    $CI = &get_instance();
    $sql = "SELECT * FROM `payment_transactions` WHERE `employer_id` = " . $employer_id;
    return $CI->db->query($sql)->result_array();
}

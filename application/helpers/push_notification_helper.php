<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

function push_notification($id) {

    $CI = &get_instance();
    $CI->load->helper('frontend_common_helper');
    $category = get_category();
    $query = "select nf.title,nf.description,n.category,n.sub_category,n.featured_image,n.url from news n left outer join news_info nf on(n.id = nf.news_id) where n.status =1 and nf.status =1 and n.id=" . $id . " and nf.news_id=" . $id;
    $news = $CI->db->query($query)->row_array();

    $name = $news['title'];
    $title = $news['title'];
    $url = site_url() . $category[$news['category']] . '/' . $news['url'];
    $icon = MEDIA_PATH_FRONTEND . $news['featured_image'];
    $message = substr(strip_tags($news['description']), 0, 400);

    $ch = curl_init();

    curl_setopt($ch, CURLOPT_URL, "https://api.foxpush.com/v1/campaigns/create/");
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('FOXPUSH_DOMAIN:garjahindustan.in', 'FOXPUSH_TOKEN:WqCfSaOdIygjZ2Rz6DAeUg'));
    curl_setopt($ch, CURLOPT_POSTFIELDS, "name=" . $name . "&title=" . $title . "&url=" . $url . "&icon=" . $icon . "&message=" . $message . "");

// In real life you should use something like:
// curl_setopt($ch, CURLOPT_POSTFIELDS, 
//          http_build_query(array('postvar1' => 'value1')));
// Receive server response ...
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    $server_output = curl_exec($ch);

    curl_close($ch);
//
//    echo "<pre>";
//    print_r($news);
//    exit;
}

?>
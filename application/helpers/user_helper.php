<?php 
function create_search_url($post = array()) {
    $url = '';
    if (isset($post) && is_array($post) && count($post) > 0) {

        if (isset($post['search_name']) && $post['search_name'] != "") {
            $url = $url . "&search_name=" . $post['search_name'];
        }

        if (isset($post['search_email']) && $post['search_email'] != "") {
            $url = $url . "&search_email=" . $post['search_email'];
        }
 
    }
    return $url;
}

?>
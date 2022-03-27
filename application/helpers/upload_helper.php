<?php

function upload_file($tmp_path, $new_path, $new_img_name) {
    include_once('lib/Image.php');
    include_once('lib/Image/Adapter.php');
    include_once('lib/Image/Adapter/Abstract.php');
    include_once('lib/Image/Adapter/Gd2.php');

    //echo $tmp_path . 'path=' . $new_path . 'file_name=' . $new_img_name;
    //exit;
    $CI = &get_instance();


    $filepath = $tmp_path;
    $imageObj = new Varien_Image($filepath);
    $imageObj->constrainOnly(FALSE);
    $imageObj->keepAspectRatio(FALSE);
    $imageObj->keepFrame(false);
    $imageObj->keepTransparency(True);
    $imageObj->setImageBackgroundColor(false);
    $imageObj->backgroundColor(false);
    $imageObj->quality(20);
    $data = getimagesize($filepath);
    $width = $data[0];
    $height = $data[1];
    $imageObj->resize($width, $height);
    $path = FCPATH . $new_path;
    //echo $path;exit;
    $path = $new_path;
    $imgName = $new_img_name;

    //$imgName = date("Y-m-d-H-i-s") . '-' . $fiename;
    $imageObj->save($path, $imgName);
    unset($imageObj);
    return $imgName;
}

function upload_files($attach_files, $upload_dir) {
    $CI = &get_instance();

    $old_files = array();
    $files = array();
    $return_data = array();

    $CI->load->library('upload');

    if (isset($attach_files) && is_array($attach_files) && count($attach_files) > 0) {

        foreach ($attach_files as $key => $value) {
            if (!$value['name'] == "") {

                if (!file_exists($upload_dir)) {
                    mkdir($upload_dir, 0777);
                }

                $year = date("Y");
                $month = date("m");
                $filename = $upload_dir . $year;
                $filename2 = $upload_dir . $year . "/" . $month;

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
                $ext = pathinfo($value["name"], PATHINFO_EXTENSION);
                /*
                 * rename filename with date
                 */
                $config['allowed_types'] = 'gif|jpg|png|jpeg|pdf|docx|doc|application/octet-streammov|application/pdf|zip|csv|xls|html';
                $config['file_name'] = date("Y_m_d_H_i_s") . '_' . rand(1, 1000) . '_' . str_replace(' ', '_', $value["name"]);
                $config['upload_path'] = './' . $filename2;


                $CI->upload->initialize($config);
                if (!$CI->upload->do_upload($key)) {
                    $error = array('error' => $CI->upload->display_errors());
                    array_push($files, $error['error']);
                } else {
                    $data = array('upload_data' => $CI->upload->data());
                    array_push($old_files, $value["name"]);
                    $new_file_path = $filename2 . '/' . $config['file_name'];
                    array_push($files, $new_file_path);
                }
            }
        }
    }

    $return_data['old_file'] = $old_files;
    $return_data['new_file'] = $files;

    return $return_data;
}

?>

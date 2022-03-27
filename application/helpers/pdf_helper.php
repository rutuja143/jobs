<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

use Dompdf\Dompdf;
use Dompdf\Options;

function save_pdf($view, $data, $pdfname, $paper = 'portrait')
{


    $CI = &get_instance();

    /*
     * include doompdf files
     */

    $path = FCPATH . 'dompdf-master/dompdf-master/autoload.inc.php';
    require_once($path);

    //
    //    echo '<pre>';
    //    print_r($data);
    //    exit;
    $pdfdata = $CI->load->view($view, $data, true);
    /*
     * show html
     */
    //print_r($data);
    // echo $pdfdata;
    // exit;
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

    $options->set("isPhpEnabled", true);

    $dompdf->loadHtml($pdfdata);
    // (Optional) Setup the paper size and orientation
    $dompdf->setPaper('A4', $paper);

    // Render the HTML as PDF
    $dompdf->render();
    $output = $dompdf->output();

    $year = date("Y");
    $month = date("m");
    $filename = "media/" . $year;
    $filename2 = "media/" . $year . "/" . $month;

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

    $report_name = $year . '/' . $month . '/' . str_replace(' ', '-', $pdfname);
    $path = FCPATH . 'media/' . $report_name;
    file_put_contents($path, $output);
    return 'media/' . $report_name;
}

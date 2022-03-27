<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
// ------------------------------------------------------------------------

/**
 * CodeIgniter PHPMAILER Plugin
 *
 * @package		CodeIgniter
 * @subpackage	Plugin
 * @category	Plugin
 */
// ------------------------------------------------------------------------

/**
 * Send SMTP Email
 *
 * @access	public
 * @param string - email
 * @param string - name
 * @param string
 * @param string
 * @param boolean
 * @param boolean 
 * @return	bool
 */
function send_smtp_email($recipient_email, $recipient_name, $subject, $message, $from_email = "", $from_name = "", $reply_email = "", $reply_name = "", $bcc_email = "") {

//	echo '<br/>recipient_email------------------------->'.$recipient_email;
//	echo '<br/>recipient_name-------------------------->'.$recipient_name;
//	echo '<br/>subject--------------------------------->'.$subject;
//	echo '<br/>message--------------------------------->'.$message;
//	echo '<br/>from name-------------------------------->'.$from_name;
//exit;
//	echo '<hr/>';
    require_once(APPPATH . "libraries/class.phpmailer.php");

    $mail = new PHPMailer();
    $body = $message;
    if (SMTP_AUTH == 1) {
        $mail_server_status = @fsockopen(SMTP_HOST, SMTP_PORT, $errno, $errstr, 30);
        if (!$mail_server_status) {
            return 2;
        }// "Failed to even make a connection"
    }//END OF if( SMTP_AUTH == 1 )
//if (SMTP_AUTH == 1) {
    $mail->IsSMTP();
//$mail->SMTPSecure = "tls";
//} else {
// $mail->IsMail();
// }

    $mail->CharSet = 'UTF-8';
    $mail->SMTPAuth = SMTP_AUTH;
    $mail->Username = SMTP_USERNAME;
    $mail->Password = SMTP_PASSWORD;
    $mail->Host = SMTP_HOST;
    $mail->Port = SMTP_PORT;
    if (!$from_name) {

        $from_name = FROM_NAME;  //DEFINED FROM CONSTANT FILE	
    }
    if (!$from_email) {

        $from_email = NOREPLY_EMAIL;
    }
    $mail->FromName = $from_name;
    $mail->From = $from_email;

    $mail->Subject = $subject;
    $mail->AltBody = strip_tags($message);
    $mail->MsgHTML($body);

    //$mail->SMTPDebug = true;

    if (!isset($reply_email)) {
        $reply_email = NOREPLY_EMAIL;  //DEFINED FROM CONSTANT FILE	
    }
    if (!isset($reply_name)) {
        $reply_name = FROM_NAME;
    }
// Add address to whom the email will be sent
    $mail->AddAddress($recipient_email, $recipient_name);

// Add reply to email address
// $mail->AddReplyTo($reply_email, $reply_name);

    if (!empty($bcc_email)) {
        $mail->AddBCC($bcc_email, '');
    }
//echo '<br/> from name--------------------->'.$mail->FromName;
//		echo '<br/> from email--------------------->'.$mail->From;
//	echo '<br/>reply_email-------------------------->'.$reply_email;
//	echo '<br/>reply_name--------------------------->'.$reply_name;
//	exit;	

    $CI = & get_instance();

    /* foreach ($_SERVER as $name => $value) {
      if (substr($name, 0, 5) == 'HTTP_') {
      $headers[str_replace(' ', '-', ucwords(strtolower(str_replace('_', ' ', substr($name, 5)))))] = $value;
      echo '<pre>';
      print_r($headers);
      echo '</pre>';

      }
      } */

    /* echo '<pre>';
      print_r($mail);
      echo '</pre>'; */

    try {
        if ($mail->Send()) {
            $reason = 'success';
            $status = '1';
        } else {
            $reason = $mail->ErrorInfo;
            $status = '0';
        }
    } catch (phpmailerException $e) {
        $reason = $e->errorMessage(); //Pretty error messages from PHPMailer

        /*echo '<pre>';
        print_r($mail->ErrorInfo);
        print_r($reason);
        echo '</pre>';
        exit;*/
    }

    $mail->ClearAddresses();
    $mail->ClearAttachments();
    $data = array(
        'from_address' => $from_email . "||" . $from_name,
        'to_address' => $recipient_email,
        'cc_address' => '',
        'bcc_address' => $bcc_email,
        'subject' => $subject,
        'message' => $body,
        'mail_date' => date("Y-m-d H:i:s"),
        'attachment' => '',
        'refrence_url' => $_SERVER['REQUEST_URI'],
        'reason' => $reason,
        'status' => $status
    );
    $CI->db->insert('email_log', $data);

    /* if (!$mail->Send()) {
      echo '1d';  exit;
      return 0;

      } else {
      echo '2d'; exit;
      return 1;
      } */
}

/*
  |	@ AUTHOR : VISHAL AGARWAL
  |
  | 	MODIFIED PHPMAILER Plugin
  |	MAil plugin with CC,BCC,ATTACHMENT FACILITY
  | 	THIS ALSO MAITAINS THE LOG OF MAIL ROUTED THROUGH THE SYSTEM
  | 	FUNCTION CALL  send_email($subject, $body, $recepients,$cc,$bcc,$file);
  | 	@subject access public
  | 	@recepients array eg ['UVF']=>'yuvraj@weqcorporation.com' FOORMAT ['NAME']=>'EMAIL'
  |   $exception is set only when any system generated mail is to be sent.
 */

function send_email($subject, $body, $recepients, $cc = array(), $bcc = array(), $attachment = '', $from_name = "", $from_address = "", $reply_email = "", $reply_name = "") {

    require_once(APPPATH . "libraries/class.phpmailer.php");

// CHECK SMTP connection
    if (SMTP_AUTH == 1) {
        $mail_server_status = @fsockopen(SMTP_HOST, SMTP_PORT, $errno, $errstr, 30);
        if (!$mail_server_status) {
            $error_cause = "Failed to even make a connection";
            $status = 0;
            error_mail_log($recepients, $cc, $bcc, $status, $error_cause, $from_name, $from_address, $subject, $body, $attachment);
            return 2; // "Failed to even make a connection"
        }//END OF if (!$mail_server_status)
    }//END OF if( SMTP_AUTH == 1 )



    $messagebody = $body;

    $mail = new PHPMailer();
    $mail->SMTPAuth = SMTP_AUTH;
    $mail->Username = SMTP_USERNAME;
    $mail->Password = SMTP_PASSWORD;
    $mail->Host = SMTP_HOST;
    $mail->Port = SMTP_PORT;
    if (SMTP_AUTH == 1)
        $mail->IsSMTP();
    else
        $mail->IsMail();

    $mail->Subject = $subject;


    if (!$from_name) {
        $from_name = ADMIN_NAME;  //DEFINED FROM CONSTANT FILE	
    }
    if (!$from_address) {
        $from_address = ADMIN_EMAIL;
    }

    $mail->FromName = $from_name;
    $mail->From = $from_address;

    if ($attachment != '') {
        foreach ($attachment as $file) {
            $mail->AddAttachment($file);
        }
    }

    $no_of_recepients = count($recepients);
    if ($no_of_recepients > 0) {
        foreach ($recepients as $name => $emailid) {
            (is_numeric($name)) ? $mail->AddAddress($emailid) : $mail->AddAddress($emailid, $name);
        }
    }


    if (is_array($cc) && (count($cc) > 0)) {
        foreach ($cc as $name => $emailid) {
            (is_numeric($name)) ? $mail->AddCC($emailid) : $mail->AddCC($emailid, $name);
        }
    }

    if (is_array($bcc) && (count($bcc) > 0)) {
        foreach ($bcc as $name => $emailid) {
            (is_numeric($name)) ? $mail->AddBCC($emailid) : $mail->AddBCC($emailid, $name);
        }
    }
    $mail->AddReplyTo($reply_email, $reply_name);

    $mail->Body = $messagebody;

    $mail->IsHtml(true);

    $mail_str = $mail->send();

////WE ARE CHECKING THIS CONDITION BECAUSE THE  CI INSTANCE IS NOT CREATED WHEN THERE ARE ANY SYSTEM GENERATED EMAILS	

    if (!$mail_str) {
        $error_cause = $mail->ErrorInfo;
        $status = 0;
        error_mail_log($recepients, $cc, $bcc, $status, $error_cause, $from_name, $from_address, $subject, $body, $attachment);
        return 0;     //MAIL WAS NOT SEND
    } else {
        $valid_cause = "success";
        $status = 1;
        error_mail_log($recepients, $cc, $bcc, $status, $valid_cause, $from_name, $from_address, $subject, $body, $attachment);
        return 1;        //MAIL SEND 
    }
}

/*
  | @AUTHOR:VISHAL AGARWAL
  | FUNCTION TO MAINTAIN THE LOG OF ALL MAILS
 */

function error_mail_log($recepients, $cc, $bcc, $status, $error_cause, $from_name, $from_address, $subject, $body, $attachment = '') {
    $CI = & get_instance();
    $setTo = '';
    $setCC = '';
    $setBCC = '';
    $setAttachment = '';


    if (is_array($recepients) && (count($recepients) > 0)) {
        foreach ($recepients as $name => $emailid) {
            $setTo .= $name . "|" . $emailid . "|";
        }
    }
    if (is_array($cc) && (count($cc) > 0)) {
        foreach ($cc as $name => $emailid) {
            $setCC .= $name . "|" . $emailid . "|";
        }
    }
    if (is_array($bcc) && (count($bcc) > 0)) {
        foreach ($recepients as $name => $emailid) {
            $setBCC .= $name . "|" . $emailid . "|";
        }
    }


    if ($attachment != '') {
        foreach ($attachment as $key) {
            $setAttachment.=$key . "|";
        }
    }

    $data = array(
        'from_address' => $from_address . "||" . $from_name,
        'to_address' => $setTo,
        'cc_address' => $setCC,
        'bcc_address' => $setBCC,
        'subject' => $subject,
        'message' => $body,
        'mail_date' => date("Y-m-d H:i:s"),
        'attachment' => $setAttachment,
        'refrence_url' => $_SERVER['REQUEST_URI'],
        'reason' => $error_cause,
        'status' => $status
    );
    $CI->db->insert('email_log', $data);
    /* 	$sql = "INSERT INTO 
      ".TBL_EMAIL_LOG."
      SET
      from_address  	= '".$from_address."||".$from_name."',
      to_address 		= '".$setTo."',
      cc_address 		= '".$setCC."',
      bcc_address 	= '".$setBCC."',
      subject  		= '".$subject."',
      message  		= '".htmlentities(addslashes($body))."',
      mail_date       =  NOW(),
      attachment      = '".$setAttachment."',
      refrence_url 	= '".$_SERVER['REQUEST_URI']."',
      reason  		= '".$error_cause."',
      status			=  ".$status.",
      created_by 		= '".$CI->session->userdata('user')."'
      "; */
}

?>
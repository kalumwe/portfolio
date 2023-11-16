<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';
require_once('../includes/functions.php');

define('ERROR_LOG','../logs/errors.log');


// set the error and thank you pages
//initialize variables    
    $formurl = "./index.php#contact" ;  
    $contacturl = "./contact.php#contact";
    // set to the email address of the recipient
    $mailto = "kalukav55@gmail.com" ;
    $currentPage = basename($_SERVER['SCRIPT_FILENAME']);
    $errors ='';
    $validName = '';
    $uemail = "";
    $subJct = "";
    $msg = '';

   //sanitize, validate and filter user input

    //Is the last name present? If it is, sanitize it
     $name = $_POST['name'];
     if (validateName($name)) {
        $validName = $name;
     } else {    
        $errors .= 'Name missing or not alphabetic, dash, quote or space. Max 30.<br>';
    }

    // Check for an email address:   
     $email = $_POST['email'];
     if (!validateEmail($email)) {       
        $errors .= 'You forgot to enter your email address<br>';
        $errors .= ' or the e-mail format is incorrect.<br>';
     } else {
        $uemail = $email;
     }

     $subject = $_POST['subject'];
     if (validateSubject($subject)) {
        $subJct = $subject;
     } else {
        $errors .= 'Subject missing or not alphabetic, dash, quote or space. Max 30.<br>';
        //$error = 'yes';
    }
        
     $message = $_POST['message'];  
    if ((!empty($message)) && (strlen($message) <= 480)) {
        $message = trim($_POST['message']);
        $message = filter_var( $message, FILTER_SANITIZE_STRING);
       // remove ability to create link in email
       $patterns = array("/http/", "/https/", "/\:/","/\/\//","/www./");
       $msg = preg_replace($patterns," ", $message);
       } else { // if message not valid display error page
         $errors .= 'you forgot to enter message in field<br> ';
         $errors.= 'Or exceeded max number of characters<br>';
      }

//redirect to error page if errors exists
if (isset($errors) && !empty($errors)) { // if errors display error page
   //header( "Location: $errorurl" );
   // exit ;
   echo $errors;
} else {

try {

$mail = new PHPMailer(true);

//Server settings
//$mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
$mail->isSMTP();                                            //Send using SMTP
$mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
$mail->SMTPAuth   = true;                                   //Enable SMTP authentication
$mail->Username   = 'kalukav55@gmail.com';                     //SMTP username
$mail->Password   = 'yqxkfutrrtisngcm';                               //SMTP password
//$mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
$mail->SMTPSecure = 'ssl';
$mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure 

//Attachments
//$mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
//$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name


    // everything OK send e-mail 
    $Sub = "Message from customer  " . $validName . " from KaluFolio site. \n";
    $messageproper =
    "------------------------------------------------------------<br>" .
    "Name of sender: " . $validName . "<br>" .
    "Email of sender: " .$uemail. "<br>" .
    "Subject: " .$subJct. "<br>" .
    "------------------------- MESSAGE -----------------------<br>" .
    $msg .
    "<br>------------------------------------------------------------<br>" ;

    $mail->setFrom($uemail, 'Sender Name');
    $mail->addAddress($mailto, 'Recipient Name');
    $mail->addReplyTo($uemail, 'Information');
    $mail->isHTML(true);
    $mail->Subject = $Sub;
    $mail->Body = $messageproper;

   if ($mail->send()) {
      echo "
      <script>
       var element = document.getElementById('sendmessage');
       if (element) {
        element.style.display = 'block';
       }
       function hideElement() {
           element.style.display = 'none';
       }
      setTimeout(hideElement, 3440);
       document.getElementById('errormessage').style.display = 'none';
       setTimeout(function () {
        location.reload();
       }, 2244);
    </script>";
    } else {
      echo 'Email could not be sent. Error: ' . $mail->ErrorInfo;
      $errormessage = 'Email could not be sent. Error: ' . $mail->ErrorInfo;
      $date = date('m.d.y h:i:s');                
      $eMessage = "| Error |  , " . $date . " | " . $errormessage . ". |\n";
      error_log($eMessage,3,ERROR_LOG);
       ?>
        <meta http-equiv="refresh" content="4;url=https://kalumwe.kesug.com/index.php" />
        <?php
   }
   
} catch (Exception $e) {
   $errormessage = $e->getMessage();
   $file = $e->getFile();
   $line = $e->getLine();
   //echo "Data can't be retrieved";
   // print "An Exception occurred. Message: " . $e->getMessage();
   //print "The system is busy please again try later";
   $date = date('m.d.y h:i:s');                
   $eMessage = "| Error |  , " . $date . " | " . $errormessage . " in \" " . $file . " \"  on line " . $line .". |\n";
   error_log($eMessage,3,ERROR_LOG);
   // e-mail support person to alert there is a problem
   // error_log("Date/Time: $date - Exception Error, Check error log for
   //details", 1, noone@helpme.com, "Subject: Exception Error \nFrom:
   // Error Log <errorlog@helpme.com>" . "\r\n");

} catch (Error $e) {
 $errormessage = $e->getMessage();
 $file = $e->getFile();
 $line = $e->getLine();
 //echo "Data cannot be retrieved";
 // print "An Error occurred. Message: " . $e->getMessage();
 // print "The system is busy please try later";
 $date = date('m.d.y h:i:s');        
 $eMessage = "| Error |  , " . $date . " | " . $errormessage . " in \" " . $file . " \"  on line " . $line .". |\n";
error_log($eMessage,3,ERROR_LOG);
// e-mail support person to alert there is a problem
// error_log("Date/Time: $date - Error, Check error log for
//details", 1, noone@helpme.com, "Subject: Error \nFrom: Error Log
// <errorlog@helpme.com>" . "\r\n");

}    
}    
    
?>
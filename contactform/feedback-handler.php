<?php

require_once('../includes/functions.php');

// Feedback form handler
// set the error and thank you pages
//initialize variables    
    $formurl = "./index.php#contact" ;
    $errorurl = "../error.php";
    $thankyouurl = "../thankyou.php" ;
    $emailerrurl = "../emailerr.php" ;
    $errormessageurl = "../messageerror.php" ;
    $contacturl = "http://localhost:8080/myfolio/contact.php#contact";
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
        
     $message = filter_var( $_POST['message'], FILTER_SANITIZE_STRING); //#5
    if ((!empty($message)) && (strlen($message) <= 480)) {
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
    // everything OK send e-mail #6
    //$subject = "Message from customer " . $first_name . " " . $last_name. " \n";
    $messageproper =
    "------------------------------------------------------------\n" .
    "Name of sender: $validName\n" .
    "Email of sender: $uemail\n" .
    //"Telephone: $phonetrim\n" .
    //"brochure?: $brochure\n" .
    //"Address: $address1trim\n" .
    //"Address: $address2trim\n" .
    //"City: $citytrim\n" .
    //"Postcode: $zcode_pcodetrim\n" .
    //"Newsletter?:$letter\n" .
    "Subject: $subJct\n" .
    "------------------------- MESSAGE -------------------------\n\n" .
    $msg .
    "\n\n------------------------------------------------------------\n" ;

    $mailSent = mail($mailto, $subJct, $messageproper, "From: \"$validName\" <$uemail>" );

    if ($mailSent) {
      echo "Your email has been sent!";
      // header( "Location: $thankyouurl" );
      // exit ;
       ?>
        <meta http-equiv="refresh" content="4;url=http://localhost:8080/myfolio/index.php#contact" />
        <?php
    } else {        
         echo "sorry email couldn't be sent, please try again later";
    
    }
   }
    
?>
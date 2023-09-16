<?php


include_once('../includes/functions.php');


    // Feedback form handler
    // set the error and thank you pages #1

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

    /* Is first name present? If it is, sanitize it #2
    $firstname = $_POST['firstname'];
    if ($user->validateFirstname($firstname, 'firstname')) {
        $first_name = $firstname;
    } else {  
        $errors = 'yes';
    } */
    

    //Is the last name present? If it is, sanitize it
     $name = $_POST['name'];
     if (validateLastname($name)) {
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
        

    /*$message =  $_POST['message']; //#5
    if ($user->validateMessage($message, 'message')) {
       $msg = $message;
    } else { // if message not valid display error page
        header( "Location: $errormessageurl" );
        exit;
    }*/

     $message = filter_var( $_POST['message'], FILTER_SANITIZE_STRING); //#5
    if ((!empty($message)) && (strlen($message) <= 480)) {
       // remove ability to create link in email
       $patterns = array("/http/", "/https/", "/\:/","/\/\//","/www./");
       $msg = preg_replace($patterns," ", $message);
       } else { // if message not valid display error page
         $errors .= 'you forgot to enter message in field<br> ';
         $errors.= 'Or exceeded max number of characters<br>';
        }


   //$mailSent = false;
//redirect to error page if errors exists
    if (!empty($errors)) { // if errors display error page
       //header( "Location: $errorurl" );
       // exit ;
        echo $errors;
    }



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
       header( "Location: $thankyouurl" );
    exit ;
    }

    //notify user if mail not sent redirect to homepage
    if (!$mailSent) {
       echo "<script type='text/javascript'>
              alert('email couldn't be sent.);
         </script>";
        //echo " <script type='text/javascript'>
       // window.location.href = '../admin.php';
       // </script>";
         
         echo "email couldn't be sent.";
    ?>
        <!--<meta http-equiv="refresh" content="2;url=http://localhost:8080/myfolio/index.php#contact" />-->
        <?php
    }
    
?>
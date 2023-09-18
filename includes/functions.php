<?php 

        //function to sanitize value or input 
         function safe($text) {
                $text = trim($text);               
                $bad_chars = array( "{", "}", "(", ")", ";", ":", "<", ">", "/", "$" );
                $text = str_ireplace($bad_chars, "", $text);        
                return htmlspecialchars($text, ENT_COMPAT|ENT_HTML5, 'UTF-8', false);
                }

       //validate and sanitize 'message' value
         function validateMessage($message) {
            if ((!empty($message)) && (strlen($message) <= 500)) {
               $message = trim(safe($message)); 
               // remove ability to create link in email
               $patterns = array("/http/", "/https/", "/\:/","/\/\//","/www./");
               $message = preg_replace($patterns," ", $message);
               $message = filter_var( $message, FILTER_SANITIZE_STRING);
               $message = (filter_var($message, FILTER_SANITIZE_STRIPPED));
            } else {
               return false;
            }
            return $message;
        }

  //validate and sanitize 'email' value
         function validateEmail($email) {
            if (empty($email))  return false;
            $email = trim($email);
            $email = safe($email);        
            $email = filter_var( $email, FILTER_SANITIZE_EMAIL);
            //}
            return $email;           
            
        }

        function validateName($name) {         
         if ((!empty($name)) && (preg_match('/[a-z\-\s\']/i',$name)) && (strlen($name) <= 75)) {  
            $name = trim(safe($name));                 
            //Sanitize the trimmed last name
           $name = filter_var( $name, FILTER_SANITIZE_STRING);
           $name = (filter_var($name, FILTER_SANITIZE_STRIPPED));  
           return $name;         
         } else {    
           return false;
           // return false;
         }        
      }

      function validateSubject($subject) {
         if (!empty($subject) && (strlen($subject) <= 100)) {
         $subject = trim(safe($subject));
         return $subject;
         } else {
            return false;
         }

      }
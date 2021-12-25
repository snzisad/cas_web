<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/*AAAATDpZ1Ss:APA91bF0EBGgucbPy9-CXnOfJ-xwAZwEDMTzJ61jdmtu-e_Y1lerAmLncmS6tRXUBhWRvQSiHJJkIi1MZJTpXyeaAsiaY2xt-jqLFpr2i78L_MyQe0dEu5xMTjc2vlD0RuwdfUnQK7lI*/


 function send_push_notification($token, $message_send) {
        

     //define("GOOGLE_API_KEY","AAAAZO61NJ0:APA91bGSr5pTPbxSz7io9f57H29U_Qn5N3My1IoLeYIuNIK8GZUgxu4iOVMjff2rcTCedgILE7Dg8Ahy7VIPp_tQIEPFrpNLwzblAG8JFu83CqPwT-97c1FT6UBSKGSEAS5oPYRvEBMe");
     define("GOOGLE_API_KEY","AAAATDpZ1Ss:APA91bF0EBGgucbPy9-CXnOfJ-xwAZwEDMTzJ61jdmtu-e_Y1lerAmLncmS6tRXUBhWRvQSiHJJkIi1MZJTpXyeaAsiaY2xt-jqLFpr2i78L_MyQe0dEu5xMTjc2vlD0RuwdfUnQK7lI");
     
     
     
      $registatoin_ids = array($token);
      
   
   
    $message= array("message" => $message_send);
     
     
        // Set POST variables
       $url = 'https://fcm.googleapis.com/fcm/send';

       $fields = array(
           'registration_ids' => $registatoin_ids,
           'data' => $message,
       );

       $headers = array(
           'Authorization: key=' . GOOGLE_API_KEY,
           'Content-Type: application/json'
       );
		//print_r($headers);
        // Open connection
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_IPRESOLVE, CURL_IPRESOLVE_V4);
        
        // Set the url, number of POST vars, POST data
        curl_setopt($ch, CURLOPT_URL, $url);
        
        curl_setopt($ch, CURLOPT_POST, true);
        
        curl_setopt($ch, CURLOPT_PROXYPORT, "80");
        
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        

        // Disabling SSL Certificate support temporarly
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));

        // Execute post
        $result = curl_exec($ch);
        if ($result === FALSE) {
            die('Curl failed: ' . curl_error($ch));
            return curl_error($ch);
        }

        // Close connection
        curl_close($ch);
      
       return $result;

    }






?>
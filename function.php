<?php
error_reporting(E_ALL ^ E_DEPRECATED);
require_once('loader.php');


 function updateUserFCMRegId($gcm_regid,$imei) {
     $conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD,DB_DATABASE);
    $sql = mysqli_query($conn,"UPDATE gcm_users SET gcm_regid='$gcm_regid' WHERE imei='$imei'");
        if($sql){
            return true;

        }
        else{
            return mysql_error();
           //return false;
        }
     
 }
   /**
     * Storing new user
     * returns user details
     */
   function storeUser($name, $email, $gcm_regid,$imei,$imageDB) {
        // insert user into database
       $conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD,DB_DATABASE);  
        $result = mysqli_query($conn, "INSERT INTO gcm_users(name, email, gcm_regid, imei ,image,created_at) VALUES('$name', '$email', '$gcm_regid','$imei', '$imageDB', NOW())");
        // check for successful store
        if ($result) {
            // get user details
            $id = mysqli_insert_id($conn); // last inserted id
            $result = mysqli_query($conn,"SELECT * FROM gcm_users WHERE id = $id") or die(mysqli_error($result));
            
              $row_cnt = mysqli_num_rows($result);
            // return user details
            if ($row_cnt > 0) {
                return mysqli_fetch_array($result);
            } else {
                return false;
            }
        } else {
            return false;
        }
    }


function storeUserOnline($imei,$online) {
    // insert user into database
     $conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD,DB_DATABASE);  
    $resultDlt=mysqli_query($conn,"DELETE From user_online where imei='$imei'");
    if ($resultDlt) {
        $result = mysqli_query($conn,"INSERT INTO user_online(imei, lastseen, online) VALUES('$imei', NOW(),'$online')");
        if($result){
            return true;

        }
        else{
            return false;
        }
    }

    // check for successful store

}
    /**
     * Get user by email
     */
   function getUserByEmail($email) {
        $result = mysql_query("SELECT * FROM gcm_users WHERE email = '$email' LIMIT 1");
        return $result;
    }

    /**
     * Getting all registered users
     */
   function getAllUsers() {
        $result = mysql_query("select * FROM gcm_users,user_status where gcm_users.imei=user_status.imei");
        return $result;
    }

     /**
     * Getting users detail by IMEI
     */
   function getIMEIUser($imei) {
        $result = mysql_query("select * FROM gcm_users where imei='$imei'");
        return $result;
    }

/***
 * @param $imei
 * @return Phone Number actually Email
 */
function getPhone($imei) {
    $image = "";
     $conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD,DB_DATABASE);  
    $result = mysqli_query($conn,"select email FROM gcm_users where imei='$imei'");
    if(mysqli_num_rows($result))
    {
        while($row = mysqli_fetch_assoc($result))
        {
            $image  = $row['email'];
        }
    }
    return $image;
}
	
	/**
     * Getting users detail by REGID
     */
   function getRegIDUser($regID) {
        $result = mysql_query("select * FROM gcm_users where gcm_regid='$regID'");
        return $result;
    }

function getAllByIMEI($imei) {
      $conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD,DB_DATABASE);  
    $result = mysqli_query($conn,"select * FROM gcm_users where imei='$imei'");
    return $result;
}
	
	/**
     * Getting users
     */
   function getIMEIUserName($imei) {
       $conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD,DB_DATABASE);  
	    $UserName = "";
        $result = mysqli_query($conn,"select name FROM gcm_users where imei='$imei'");
		if(mysqli_num_rows($result))
		{
		   while($row = mysqli_fetch_assoc($result))
		   {
			   $UserName  = $row['name'];
		   }
	    }
        return $UserName;
    }

function getImageByIMEI($imei) {
    $image = "";
     $conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD,DB_DATABASE);  
    $result = mysqli_query($conn,"select image FROM gcm_users where imei='$imei'");
    if(mysqli_num_rows($result))
    {
        while($row = mysqli_fetch_assoc($result))
        {
            $image  = $row['image'];
        }
    }
    return $image;
}




function checkUserOnline($imei) {
    $time = "";
    $conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD,DB_DATABASE);  
    $result = mysqli_query($conn,"select * FROM user_online where imei='$imei'");
    if(mysqli_num_rows($result))
    {
        while($row = mysqli_fetch_assoc($result))
        {
            $Online  = $row['online'];
            $lastseen=$row['lastseen'] . "";
            if($Online=="Y"){
                return "Online";
            }
            else{
                return $lastseen;
            }
        }
    }
    $date = date('Y-m-d H:i:s');
    return $date ;
}

    /**
     * Validate user
     */
  function isUserExisted($email,$gcmRegID) {
      $conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD,DB_DATABASE);  
      $result    = mysqli_query($conn,"SELECT email from gcm_users WHERE email = '$email' and gcm_regid = '$gcmRegID'");
      $row_cnt = mysqli_num_rows($result);
       
        
        if ($row_cnt>0) {
            // user existed
            return true;
        } else {
            // user not existed
            return false;
        }
    }


function isUserExists($imei) {
   $conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD,DB_DATABASE);
    $result    = mysqli_query($conn, "SELECT * from gcm_users WHERE imei ='$imei'");
   $row_cnt = mysqli_num_rows($result);
   
    if ($row_cnt>0) {
        // user existed
        return true;
    } else {
        // user not existed
        return false;
    }
}
	
	/**
     * Sending Push Notification
     */
   function send_push_notification($registatoin_ids, $message,$imei,$msg_id) {
        

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
        }

        // Close connection
        curl_close($ch);
       $onlinecheck=checkUserOnline($imei);
       echo  $onlinecheck."^" . $msg_id;
       return $result;

    }

    
    
       function send_push_notificationFuns($registatoin_ids, $message,$imei,$msg_id) {
        

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
        }

        // Close connection
        curl_close($ch);
      
     
       return $result;

    }

function send_push_notification1($registatoin_ids, $message,$imei,$msg_id) {


    // Set POST variables
    $url = 'https://android.googleapis.com/gcm/send';

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

    // Set the url, number of POST vars, POST data
    curl_setopt($ch, CURLOPT_URL, $url);

    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    // Disabling SSL Certificate support temporarly
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));

    // Execute post
    $result = curl_exec($ch);
    if ($result === FALSE) {
        die('Curl failed: ' . curl_error($ch));
    }

    // Close connection
    curl_close($ch);
    $onlinecheck=checkUserOnline($imei);
    echo  $onlinecheck."^" . $msg_id;

}


function sendGCM($message, $id) {


    $url = 'https://fcm.googleapis.com/fcm/send';

    $fields = array (
        'registration_ids' => array (
            $id
        ),
        'data' => array (
            "message" => $message
        )
    );
    $fields = json_encode ( $fields );

    $headers = array (
        'Authorization: key=' . GOOGLE_API_KEY,
        'Content-Type: application/json'
    );

    $ch = curl_init ();
    curl_setopt ( $ch, CURLOPT_URL, $url );
    curl_setopt ( $ch, CURLOPT_POST, true );
    curl_setopt ( $ch, CURLOPT_HTTPHEADER, $headers );
    curl_setopt ( $ch, CURLOPT_RETURNTRANSFER, true );
    curl_setopt ( $ch, CURLOPT_POSTFIELDS, $fields );

    $result = curl_exec ( $ch );
    echo $result;
    curl_close ( $ch );
}

	
	
	function stripUnwantedTags($str)
	{
		$tempStr = $str;
		
		$tempStr  = str_replace('script','scriptd',$tempStr);
	    $tempStr  = str_replace('iframe','iframed',$tempStr);
		$tempStr  = str_replace('base64','',$tempStr);
		$tempStr  = str_replace('eval(','',$tempStr);
		$tempStr  = str_replace('data:','',$tempStr);
		//$tempStr  = htmlentities($tempStr, ENT_QUOTES, "UTF-8");
		
		return $tempStr;
	}
    
	function escapeStr($str)
        {
				$tempStr  = htmlentities($str, ENT_QUOTES, "UTF-8");
				return str_replace("'","",$tempStr);
        }
	function escapeStrMysql($str){
		
		 return  mysql_real_escape_string($str);
	 }	
	 
   
  function stripHtmlTags($str){
		
		 return  strip_tags($str);
	 }
	 
  function stripUnwantedHtmlEscape($str)
  {
	  return escapeStrMysql(escapeStr(stripUnwantedTags(stripHtmlTags($str))));  
  }

/*
 * User Status Table Functions
 * */

function storeUserStatus($imeino,$status,$mood) {
    // insert user into database
$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD,DB_DATABASE);
    $resultDlt=mysqli_query($conn,"DELETE From user_status where imei='$imeino'");
    if ($resultDlt) {
        $result = mysqli_query($conn,"INSERT INTO user_status(imei, status, mood) VALUES('$imeino', '$status','$mood')");
        if($result){
            return true;

        }
        else{
            return mysql_error();
            //return false;
        }
    }

    // check for successful store

}



function updateUserProfilePic($imei,$image) {
    // insert user into database

$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD,DB_DATABASE);
    $sql = mysqli_query($conn,"UPDATE gcm_users SET image='$image' WHERE imei='$imei'");
        if($sql){
            return true;

        }
        else{
            return mysql_error();
           //return false;
        }


    // check for successful store

}


function getUserStatus($imei) {
    
    $conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD,DB_DATABASE);
    $status = "None";
    $result = mysqli_query($conn,"select status FROM user_status where imei='$imei'");
    if(mysqli_num_rows($result))
    {
        while($row = mysqli_fetch_assoc($result))
        {
            $status  = $row['status'];
        }
    }
    return $status;
}


function getUserprofilePic($imei) {
    $status = "None";
    $result = mysql_query("select image FROM gcm_users where imei='$imei'");
    if(mysql_num_rows($result))
    {
        while($row = mysql_fetch_assoc($result))
        {
            $status  = $row['image'];
        }
    }
    return $status;
}

function getUserMood($imei) {
    $mood = "None";
     $conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD,DB_DATABASE);
    $result = mysqli_query($conn,"select mood FROM user_status where imei='$imei'");
    if(mysqli_num_rows($result))
    {
        while($row = mysqli_fetch_assoc($result))
        {
            $mood  = $row['mood'];
        }
    }
    return $mood;
}

function insertFuns($imei) {
    $count = 2;
     $conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD,DB_DATABASE);
   $result = mysqli_query($conn,"INSERT INTO user_status(imei, status, mood) VALUES('12', '12','12'");
   if($result){
            return true;

        }
        else{
            return mysql_error();
            //return false;
        }
}


function counter(){
     $mood = "None";
     $conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD,DB_DATABASE);
    // $result1 = mysqli_query($conn,"delete from add_counter");
    $result = mysqli_query($conn,"insert into add_counter(showed) values('yes')");
    if($result)
        return 'Yes';
}
   
    






?>
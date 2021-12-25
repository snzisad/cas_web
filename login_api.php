
<?php

require_once('functions.php');

         $mysql_host = 'localhost';
        $mysql_user = 'aurchoco_cas_user';
        $mysql_pass = 'cas@db@user';

        $mysql_db = 'aurchoco_cas';
    
    
        
        
       
        

	
			
		//variables 
			$users 		=	$_REQUEST['username'];
			$password 	= 	$_REQUEST['userpassword'];
			//$user_type_id 	= 	$_REQUEST['user_type_id'];
			$user_type_id = 2;
                        $token 	= 	$_REQUEST['token'];
                        
                        $conn = mysqli_connect($mysql_host, $mysql_user, $mysql_pass,$mysql_db);

			$select = "SELECT * FROM users WHERE username='$users' AND password='$password' AND user_type_id='$user_type_id' ";

			$result = mysqli_query($conn,$select);
		if(mysqli_num_rows($result))
               {
                    $del= "DELETE FROM FCM_NOTIFICATION_TOKEN where name='$users'";
                         $del_res = mysqli_query($conn,$del);
                    $store = "INSERT INTO FCM_NOTIFICATION_TOKEN(name,token) value ('$users','$token')";
                    $resul = mysqli_query($conn,$store);
                    if($resul){
                        $message ='logged';
                        
                       $resss= send_push_notification($token, $message);
                      
                        echo 'yes';
                    }
                    else
                    {
                         echo 'No 1'; 
                    }
			
                }
                else{
                    echo 'No 2';
                    
                }
          
                
?>


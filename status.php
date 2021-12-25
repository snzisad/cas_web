<?php
	header('Content-Type: application/json');
	include 'core/dbe.inc.php';
    include 'core/core.inc.php';
    session_start(); 

	
	$array = array();

	$query = "SELECT * FROM `online_users`";
	$record = fetchData($query);
	// dump($record);
  	foreach ($record as $data) 
    {
    	$array[] = $data['userid'];
    }
    echo json_encode($array);
	// $res = mysql_query("SELECT * FROM `posts` WHERE status=1");
	// if(mysql_num_rows($res) > 0){
	//     while($row = mysql_fetch_assoc($res)){  
	//         $array[] = $row['user_id'];  // this adds each online user id to the array         
	//     }
	// }
	

?>
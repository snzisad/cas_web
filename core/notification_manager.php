<?php

	//get server key from firebase console
	define( 'SERVER_KEY', 'AAAA8YyBsFs:APA91bFrOnJqRQdgFu8w2vR6avjnd49-LwvFRbyeyDkuX-fUdght20bNUNEwinlITJvblQrLo_2kCzaXPU7mj8tQJ3eHgmUvRbESTC4XOrRUVD27TUcvT3EfcRlJNPvEmaUJXMt5SR7q');

	function send_mention_notification($pid, $post_title, $fcmID){
		$data = array(
			'title'   => "You are mentioned here",
			'id'  => $pid,
			'type' => 1, //message  
			'body' => $post_title
		);

		$fields = array(
			'to'   => $fcmID,
			'data' => $data,
			"priority" => "high",
			'sound' => "default"
		);


		$headers = array(
			'Authorization: key=' . SERVER_KEY,
			'Content-Type: application/json'
		);

		#Send Reponse To FireBase Server	
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send');
		curl_setopt($ch, CURLOPT_POST, true);
		curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));
		$result = curl_exec($ch);
		// echo json_encode($result);
		curl_close($ch);
	}

	function send_message_notification($pid, $post_title, $message, $fcmID){
          $data = array
          (
			'title' 	=> $post_title,
			'id'	=> $pid,
			'type' => 1, //message  
			'body' => $message
          );

		$fields = array
				(
    		        'to' 	=> $fcmID,
					'data' => $data,
					"priority" => "high",
    		    	'sound' => "default"
				);
		
		
		$headers = array
				(
					'Authorization: key=' . SERVER_KEY,
					'Content-Type: application/json'
                );
                
		#Send Reponse To FireBase Server	
		$ch = curl_init();
		curl_setopt( $ch,CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send');
		curl_setopt( $ch,CURLOPT_POST, true );
		curl_setopt( $ch,CURLOPT_HTTPHEADER, $headers );
		curl_setopt( $ch,CURLOPT_RETURNTRANSFER, true );
		curl_setopt( $ch,CURLOPT_SSL_VERIFYPEER, false );
		curl_setopt( $ch,CURLOPT_POSTFIELDS, json_encode( $fields ) );
		$result = curl_exec($ch );
		// echo json_encode($result);
		curl_close( $ch );
	}

	function send_post_notification_from_admin($pid, $title, $body, $fcmID){
          $data = array
          (
			'title' 	=> $title,
			'id'	=> $pid,
			'type' => 2, //post  
			'body' => $body
          );

		$fields = array
				(
    		        'to' 	=> $fcmID,
					'data' => $data,
					"priority" => "high",
    		    	'sound' => "default"
				);
		
		
		$headers = array
				(
					'Authorization: key=' . SERVER_KEY,
					'Content-Type: application/json'
                );
                
		#Send Reponse To FireBase Server	
		$ch = curl_init();
		curl_setopt( $ch,CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send');
		curl_setopt( $ch,CURLOPT_POST, true );
		curl_setopt( $ch,CURLOPT_HTTPHEADER, $headers );
		curl_setopt( $ch,CURLOPT_RETURNTRANSFER, true );
		curl_setopt( $ch,CURLOPT_SSL_VERIFYPEER, false );
		curl_setopt( $ch,CURLOPT_POSTFIELDS, json_encode( $fields ) );
		$result = curl_exec($ch );
		// echo json_encode($result);
		curl_close( $ch );
	}

	function send_notification($id, $title, $price, $location){
	    
		$data = array(
		'title' 	=> $title,
		'id'	=> $id,
		'type' => 2, //post 
		'body' => $price." Tk, ".$location
				);

		$fields = array
				(
								'to' 	=> '/topics/Posts',
					'data' => $data,  
					"priority" => "high",
							'sound' => "default"
				);
		
		
		$headers = array
				(
					'Authorization: key=' . SERVER_KEY,
					'Content-Type: application/json'
								);
								
		#Send Reponse To FireBase Server	
		$ch = curl_init();
		curl_setopt( $ch,CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send');
		curl_setopt( $ch,CURLOPT_POST, true );
		curl_setopt( $ch,CURLOPT_HTTPHEADER, $headers );
		curl_setopt( $ch,CURLOPT_RETURNTRANSFER, true );
		curl_setopt( $ch,CURLOPT_SSL_VERIFYPEER, false );
		curl_setopt( $ch,CURLOPT_POSTFIELDS, json_encode( $fields ) );
		$result = curl_exec($ch );
		// echo json_encode($result);
		curl_close( $ch );
	}

	function send_admin_notification($title, $body){

		$data = array
					(
			'title' 	=> $title,
			'id'	=> 0,
			'type' => 0, //post 
			'body' => $body
					);

		$fields = array
				(
								'to' 	=> '/topics/Posts',
					'data' => $data,  
					"priority" => "high",
							'sound' => "default"
				);
		
		
		$headers = array
				(
					'Authorization: key=' . SERVER_KEY,
					'Content-Type: application/json'
								);
								
		#Send Reponse To FireBase Server	
		$ch = curl_init();
		curl_setopt( $ch,CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send');
		curl_setopt( $ch,CURLOPT_POST, true );
		curl_setopt( $ch,CURLOPT_HTTPHEADER, $headers );
		curl_setopt( $ch,CURLOPT_RETURNTRANSFER, true );
		curl_setopt( $ch,CURLOPT_SSL_VERIFYPEER, false );
		curl_setopt( $ch,CURLOPT_POSTFIELDS, json_encode( $fields ) );
		$result = curl_exec($ch );
		// echo json_encode($result);
		curl_close( $ch );
	}

?>
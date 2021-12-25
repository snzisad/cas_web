<?php

	// Ignore Error Notice
	// error_reporting(0);
	
	ob_start();
	
	
	// Find Script Name
	$current_file = $_SERVER['SCRIPT_NAME'];

	
	//  Find URL
	if(isset($_SERVER['HTTP_REFERER']) && !empty($_SERVER['HTTP_REFERER'])){
		$http_referer = $_SERVER['HTTP_REFERER'];	
	}
	

	// Check User Logged In or Not
	function checkManager(){
		if(isset($_SESSION['userName']) && !empty($_SESSION['userName'])){
			return true;
		}
		else{
			//die("Sorry! Unauthorized access.");
		?>

			<script type="text/javascript">
		        alert("Sorry! Unauthorized access.");
		        window.location.href = 'index.php';
		    </script>
		<?php
		}
	}


	function dump($data, $die = FALSE) {
		
		echo '<pre>'; print_r($data); echo '</pre>';

		if ($die) {
			die('Dumped!');
		}
	}


	
?>
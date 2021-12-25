<?php
	
	include 'core/dbe.inc.php';
    include 'core/core.inc.php';

	session_start();

	$getID = $_SESSION['uid'];
	
	$query = "
                DELETE FROM `online_users` WHERE `userid` = '$getID'
            "; 
  	// dump($query, TRUE);
  	query($query);

	session_destroy();
	header('location: index.php');
?>
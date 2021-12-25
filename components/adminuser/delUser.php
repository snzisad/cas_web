<?php 

    $getID = $_GET['id'];
    
    $DelUserTypeQuery = "
                   		  DELETE FROM users WHERE id = '$getID'
                        ";

    $execQuery = query($DelUserTypeQuery);
    
    if ($execQuery) {
    	$redirectPage = 'dashboard.php?p=userList';
     	header('Location: '.$redirectPage);
    }
    
?>
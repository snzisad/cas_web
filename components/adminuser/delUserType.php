<?php 

    $getID = $_GET['id'];
    
    $DelUserTypeQuery = "
                   		  DELETE FROM user_type WHERE id = '$getID'
                        ";

    $execQuery = query($DelUserTypeQuery);
    
    if ($execQuery) {
    	$redirectPage = 'dashboard.php?p=addUserType';
     	header('Location: '.$redirectPage);
    }
    
?>
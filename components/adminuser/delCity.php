<?php 
	$getID = $_GET['id'];
	
	$DelCategoryQuery = "
                   		  DELETE FROM city WHERE id = '$getID'
                        ";

    $execQuery = query($DelCategoryQuery);
    
    if ($execQuery) {
    	$redirectPage = 'dashboard.php?p=cityList';
     	header('Location: '.$redirectPage);
    }
    
?>
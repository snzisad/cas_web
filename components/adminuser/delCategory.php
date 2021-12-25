<?php 
	$getID = $_GET['id'];
	
	$DelCategoryQuery = "
                   		  DELETE FROM category WHERE id = '$getID'
                        ";

    $execQuery = query($DelCategoryQuery);
    
    if ($execQuery) {
    	$redirectPage = 'dashboard.php?p=categoryList';
     	header('Location: '.$redirectPage);
    }
    
?>
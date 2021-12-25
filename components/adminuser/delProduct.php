<?php 

    $getID = $_GET['id'];
    
    $DelProductQuery = "
                       	DELETE FROM product WHERE productID = '$getID'
                       ";

    $execQuery = query($DelProductQuery);
    
    if ($execQuery) {
    	$redirectPage = 'dashboard.php?p=addProduct';
     	header('Location: '.$redirectPage);
    }
    
?>
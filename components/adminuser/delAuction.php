<?php 
	$getID = $_GET['id'];
	
	$DelAuctionQuery = "
                   		  DELETE FROM auction WHERE id = '$getID'
                        ";

    $execQuery = query($DelAuctionQuery);
    
    if ($execQuery) {
    	$redirectPage = 'dashboard.php?p=auctionList';
     	header('Location: '.$redirectPage);
    }
    
?>
<?php 
	$getID = $_GET['id'];

      $selectPostQuery = " 
                          SELECT post.*, 
                            post_image.image AS image
                          FROM post
                          LEFT JOIN post_image
                          ON post.id = post_image.post_id
                          WHERE post.id = '$getID'
                         "; 
      $record = fetchDataWithID($selectPostQuery);
      // $image = $record['image'];

      // dump($record['image']);
	
	$DelPostQuery = "
                   		  DELETE FROM post WHERE id = '$getID'
                        ";

    $execQuery = query($DelPostQuery);

    // dump($execQuery);
    
    if ($execQuery) {
        // unlink($record['image']);
    	$redirectPage = 'dashboard.php?p=postList';
     	header('Location: '.$redirectPage);
    }
    
?>
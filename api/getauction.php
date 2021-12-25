<?php
include '../core/dbe.inc.php';
include '../core/core.inc.php';
    // session_start(); 
    // checkManager(); 
?>

<?php
    $result = null;

    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $image = null;
        $bid = null;
        $status = -1;

        //get product details
        $query = "SELECT * , DATE_FORMAT(auction.ending_date, '%d-%m-%Y') as ending_date FROM `auction` WHERE auction.id = $id";

        $data = fetchData($query);

        if ($data) {
            $status = 1;

            //get auction images
            $query = "SELECT * FROM `auction_image` WHERE auction_id = $id";
            $image = fetchData($query);
            
            //get bid info
            $query = "SELECT * FROM `bid` LEFT OUTER JOIN users ON bid.users_id = users.id WHERE auction_id = $id ORDER BY bid_price DESC";
            $bid = fetchData($query);
        }

        $result = array([
            "status" => $status,
            "data" => $data,
            "image" => $image,
            "bid" => $bid,
        ]);

    } else {
        $result = array([
            "status" => 0,
            "data" => "No auction found"
        ]);
    }
    echo json_encode($result, JSON_UNESCAPED_UNICODE);
?>
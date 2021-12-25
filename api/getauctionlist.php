<?php
    include '../core/dbe.inc.php';
    include '../core/core.inc.php';
    // session_start(); 
    // checkManager(); 
?>

<?php
    $result = null;

    if (isset($_GET['city']) && isset($_GET['cat'])) {
        $city = ($_GET['city']);
        $cat = ($_GET['cat']);
        $query = "SELECT auction.auction_title, auction.id, DATE_FORMAT(auction.ending_date, '%d-%m-%Y') as ending_date, auction.starting_price, auction_image.image 
                    FROM `auction` LEFT OUTER JOIN `auction_image` ON auction.id = auction_image.auction_id 
                    WHERE (city_id = $city AND category_id = $cat) ORDER BY auction.id ASC";

    } else if (isset($_GET['city'])) {
        $city = ($_GET['city']);
        $query = "SELECT auction.auction_title, auction.id, DATE_FORMAT(auction.ending_date, '%d-%m-%Y') as ending_date, auction.starting_price, auction_image.image 
                    FROM `auction` LEFT OUTER JOIN `auction_image` ON auction.id = auction_image.auction_id
                    WHERE (city_id = $city) ORDER BY auction.id ASC";

    } else if (isset($_GET['cat'])) {
        $cat = ($_GET['cat']);
        $query = "SELECT auction.auction_title, auction.id, DATE_FORMAT(auction.ending_date, '%d-%m-%Y') as ending_date, auction.starting_price, auction_image.image 
                    FROM `auction` LEFT OUTER JOIN `auction_image` ON auction.id = auction_image.auction_id
                    WHERE (category_id = $cat) ORDER BY auction.id ASC";

    } else {
        $query = "SELECT auction.auction_title, auction.id, DATE_FORMAT(auction.ending_date, '%d-%m-%Y') as ending_date, auction.starting_price, auction_image.image 
                    FROM `auction` LEFT OUTER JOIN `auction_image` ON auction.id = auction_image.auction_id
                    ORDER BY auction.id ASC";
    }

    $data = fetchData($query);

    $result = array([
        "status" => 1,
        "data" => $data
    ]);

    echo json_encode($result, JSON_UNESCAPED_UNICODE);
?>
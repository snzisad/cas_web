<?php
    include '../core/dbe.inc.php';
    include '../core/core.inc.php';
    // session_start(); 
    // checkManager(); 
?>

<?php
    $result = null;

    // if (isset($_GET['city']) || isset($_GET['cat'])) {
        // $city = isset($_GET['city']);
        // $cat = isset($_GET['cat']);

        if(isset($_GET['city']) && isset($_GET['cat'])){
            $city = ($_GET['city']);
            $cat = ($_GET['cat']);
            $query = "SELECT post.post_title, post.id, post.location, post.price, post_image.image FROM `post` LEFT OUTER JOIN `post_image` ON post.id = post_image.post_id WHERE (city_id = $city AND category_id = $cat) ORDER BY post.id ASC";
        }
        else if(isset($_GET['city'])){
            $city = ($_GET['city']);
            $query = "SELECT post.post_title, post.id, post.location, post.price, post_image.image FROM `post` LEFT OUTER JOIN `post_image` ON post.id = post_image.post_id WHERE (city_id = $city) ORDER BY post.id ASC";
        }
        else if(isset($_GET['cat'])){
            $cat = ($_GET['cat']);
            $query = "SELECT post.post_title, post.id, post.location, post.price, post_image.image FROM `post` LEFT OUTER JOIN `post_image` ON post.id = post_image.post_id WHERE (category_id = $cat) ORDER BY post.id ASC";
        }
        else{
            $query = "SELECT post.post_title, post.id, post.location, post.price, post_image.image FROM `post` LEFT OUTER JOIN `post_image` ON post.id = post_image.post_id ORDER BY post.id ASC";
        }

        // if(isset($_GET['cat'])){
        //     $cat = $_GET['cat'];
        //     $query = "SELECT post.post_title, post.id, post.location, post.price, post_image.image FROM `post` LEFT OUTER JOIN `post_image` ON post.id = post_image.post_id WHERE (city_id = $city AND category_id = $cat) ORDER BY post.id ASC";
        // }
        // else{
        //     $query = "SELECT post.id, post.post_title, post.location, post.price, post_image.image FROM `post` LEFT OUTER JOIN `post_image` ON post.id = post_image.post_id WHERE post.city_id = $city ORDER BY post.id ASC";
        // }

        // // $query = "SELECT DISTINCT post.id FROM `post` JOIN `post_image` WHERE post.id = post_image.post_id ";
        
        $data = fetchData($query);
        
        $result = array([
            "status" => 1,
            "data" => $data
        ]);

    // } 
    // else {
    //     $result = array([
    //         "status" => 0,
    //         "data" => "No product found"
    //     ]);
    // }
    echo json_encode($result, JSON_UNESCAPED_UNICODE);
?>
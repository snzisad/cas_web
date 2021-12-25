<?php
    include '../core/dbe.inc.php';
    include '../core/core.inc.php';
    include '../core/notification_manager.php';
    // session_start(); 
    // checkManager(); 
?>

<?php
    $result = null;

    if (isset($_POST['city_id']) && isset($_POST['category_id'])) {
        $city_id = $_POST['city_id'];
        $location = $_POST['location'];
        $category_id = $_POST['category_id'];
        $auction_title = $_POST['auction_title'];
        $auction_desc = $_POST['auction_desc'];
        $condition = $_POST['condition'];
        $product_type = $_POST['product_type'];
        $starting_price = $_POST['starting_price'];
        $reserve_price = $_POST['reserve_price'];
        $keyword = $_POST['keyword'];
        $starting_date = $_POST['starting_date'];
        $ending_date = $_POST['ending_date'];
        $com_id = $_POST['com_id'];
        $images = $_POST['images'];

        $filesname = array();
        $fileErr = "";

        $pictures = explode('||', $images);

        $updir = '../public/uploads/auction/';

        for ($i = 0; $i < count($pictures) - 1; $i++) {
            $fname = rand(100000, 999999) . "" . date("his") . ".jpeg";
            $filepath = $updir . '/' . $fname;

            try {
                if (file_put_contents($filepath, base64_decode($pictures[$i]))) {
                    array_push($filesname, $fname);
                } else {
                    $fileErr = "Selected image(s) cannot be uploaded";
                }
            } catch (Exception $e) {
                echo "$e";
            }
        }


        if (count($filesname) > 0 && empty($fileErr)) {
            $query = "INSERT INTO `auction` (`city_id`, `location`, `category_id`, `keyword`, `auction_title`, `auction_desc`, `starting_date`, `ending_date`, `starting_price`, `reserve_price`, `condition`, `product_type`, `com_id`)
                VALUES ('$city_id', '$location', '$category_id', '$keyword', '$auction_title', '$auction_desc', '$starting_date', '$ending_date', '$starting_price', '$reserve_price', '$condition', '$product_type', '$com_id')";
            $data = query($query);
            $post_id = insertID();

            foreach ($filesname as $file) {
                $file = "public/uploads/auction/" . $file;
                $query = "INSERT INTO `auction_image` (`auction_id`, `image`) VALUES ('$post_id', '$file') ";
                $data = query($query);
            }

            if ($post_id != 0) {
                //send notification to android device
                $body = $starting_price . "Tk - " . $reserve_price . "Tk, " . $location;
                send_admin_notification($auction_title, $body);
            }

            $result = array([
                "status" => 1,
                "data" => $post_id
            ]);
        } 
        else {

            $result = array([
                "status" => -1,
                "data" => $fileErr
            ]);

        }

    } 
    else {
        $result = array([
            "status" => 0,
            "data" => "Something went wrong"
        ]);
    }
    echo json_encode($result);
?>
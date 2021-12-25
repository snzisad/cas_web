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
        $post_title = $_POST['post_title'];
        $post_desc = $_POST['post_desc'];
        $condition1 = $_POST['condition1'];
        $product_type = $_POST['product_type'];
        $price = $_POST['price'];
        $name = $_POST['name'];
        $mobile = $_POST['mobile'];
        $email = $_POST['email'];
        $userid = $_POST['userid'];
        $time = date('h:i:s');
        // $time = date('d-m-Y h:i:s');
        $images = $_POST['images'];

        $filesname = array();
        $fileErr = "";

        $pictures = explode('||', $images);

        $updir = '../public/uploads/posts/';

        for ($i = 0; $i < count($pictures) - 1; $i++) {
            $fname = rand(100000, 999999) . "" . date("his") . ".jpeg";
            $filepath = $updir . '/' . $fname;
            
            try{
                // file_put_contents($filepath, base64_decode($pictures[$i]));
                if(file_put_contents($filepath, base64_decode($pictures[$i]))){
                    array_push($filesname, $fname);
                }
                else{
                    $fileErr = "Selected image(s) cannot be uploaded";
                }
            }
            catch(Exception $e){
                echo "$e";
            }
        }

        if(count($filesname)>0 && empty($fileErr)){
            $query = "INSERT INTO `post`(`post_time`, `city_id`, `location`, `category_id`, `post_title`, `post_desc`, `condition1`, `product_type`, `price`, `name`, `mobile`, `email`, `userid`) 
            VALUES ('$time', '$city_id', '$location', '$category_id', '$post_title', '$post_desc', '$condition1', '$product_type', '$price', '$name', '$mobile', '$email', '$userid')";

            $data = query($query);
            $post_id = insertID();
            
            foreach ($filesname as $file) {
                $file = "public/uploads/posts/".$file;
                $query = "INSERT INTO `post_image` (`post_id`, `image`) VALUES ('$post_id', '$file')";
                $data = query($query);
            }

            if($post_id != 0){
                send_notification($post_id, $post_title, $price, $location);
            }

            $result = array([
                "status" => 1,
                "data" => $post_id
            ]);   
        }
        else{

            $result = array([
                "status" => -1,
                "data" => $fileErr
            ]);

        }

    } else {
        $result = array([
            "status" => 0,
            "data" => "Something went wrong"
        ]);
    }
    echo json_encode($result);
?>
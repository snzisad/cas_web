<?php
include '../core/dbe.inc.php';
include '../core/core.inc.php';
// session_start(); 
// checkManager(); 
?>

<?php
$result = null;

if (isset($_GET['id']) && isset($_GET['uid'])) {
    $id = $_GET['id'];
    $uid = $_GET['uid'];
    $time = date('Y-m-d h:i:s');
    $image = null;
    $status = -1;

    //get product details
    $query = "SELECT * FROM `post` WHERE id = $id";
    $data = fetchData($query);

    if ($data) {
        $status = 1;

        //get product images
        $query = "SELECT * FROM `post_image` WHERE post_id = $id";
        $image = fetchData($query);

        //add user into post tracking table
        if ($uid != 0) {
            $query = "INSERT INTO `post_tracking`(`post_id`, `userid`, `time`) VALUES ('$id', '$uid', '$time')";

            query($query);
        }
    }

    $result = array([
        "status" => $status,
        "data" => $data,
        "image" => $image,
    ]);
} else {
    $result = array([
        "status" => 0,
        "data" => "No product ID found"
    ]);
}
echo json_encode($result, JSON_UNESCAPED_UNICODE);
?> 
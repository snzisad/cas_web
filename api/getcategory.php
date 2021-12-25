<?php
    include '../core/dbe.inc.php';
    include '../core/core.inc.php';
    // session_start(); 
    // checkManager(); 
?>

<?php
    $result = null;

    if (isset($_GET['parent'])) {
        $parent = $_GET['parent'];
        $query = "SELECT * FROM category WHERE pid = $parent ORDER BY category_name ASC";

        $data = fetchData($query);

        $result = array([
            "status" => 1,
            "data" => $data
        ]);
    } else {
        $result = array([
            "status" => 0,
            "data" => "No category found"
        ]);
    }
    echo json_encode($result);
?>
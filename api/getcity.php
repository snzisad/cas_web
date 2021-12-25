<?php
    include '../core/dbe.inc.php';
    include '../core/core.inc.php';
    // session_start(); 
    // checkManager(); 
?>

<?php
    $selectCityQuery = "SELECT * FROM city ORDER BY city_name ASC";

    $data = fetchData($selectCityQuery);

    $result = array([
        "status"=> 1,
        "data" => $data
    ]);

    echo json_encode($result);
?>
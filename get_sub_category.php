<?php

    include 'core/dbe.inc.php';
    include 'core/core.inc.php';
    session_start(); 
    // checkManager(); 
    // Set default time zone 
	date_default_timezone_set('Asia/Dhaka');

	if(!empty($_POST["category"])) {

		$query ="SELECT * FROM `category` WHERE pid = '" . $_POST["category"] . "'";

		$results = query($query);

		// dump($results, TRUE);
?>
	<option value="" selected disabled>Select Sub Category</option>

<?php
	foreach($results as $subcategory) {
	// dump($subcategory, TRUE);
?>
		<option value="<?php echo $subcategory["id"]; ?>"><?php echo $subcategory["category_name"]; ?></option>
<?php
	}
}
?>
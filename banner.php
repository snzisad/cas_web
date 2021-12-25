<style>

	/*body {margin:0;font-family:Arial}*/
	.topnav {overflow: hidden;background-color: #333;position: relative;z-index: 2; top: -30px;}
	.topnav a {float: left;display: block;color: #f2f2f2;text-align: center;padding: 14px 16px;text-decoration: none;font-size: 17px;}
	/*.active {background-color: #4CAF50;color: white;}*/
	.topnav .icon {display: none;}
	.dropdown {float: left;overflow: hidden;}
	.dropdown .dropbtn {font-size: 17px;    border: none;outline: none;color: white;padding: 14px 16px;background-color: inherit;font-family: inherit;margin: 0;}
	.dropdown-content {display: none;position: relative;/*position: absolute;*/background-color: #f9f9f9;min-width: 160px;box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);z-index: 2;}
	.dropdown-content a {float: none;color: black;padding: 12px 16px;text-decoration: none;display: block;text-align: left;}
	.topnav a:hover, .dropdown:hover .dropbtn {background-color: #555;color: white;}
	.dropdown-content a:hover {background-color: #ddd;color: black;}
	.dropdown:hover .dropdown-content {display: block;}

	@media screen and (max-width: 600px) {

		.topnav a:not(:first-child), .dropdown .dropbtn {
			display: none;
		}

		.topnav a.icon {
			float: right;
			display: block;
		}
	}

	@media screen and (max-width: 600px) {

		.topnav.responsive {position: relative;}

		.topnav.responsive .icon {
			position: absolute;
			right: 0;
			top: 0;
		}

		.topnav.responsive a {
			float: none;
			display: block;
			text-align: left;
		}

		.topnav.responsive .dropdown {float: none;}

		.topnav.responsive .dropdown-content {position: relative;}

		.topnav.responsive .dropdown .dropbtn {
			display: block;
			width: 100%;
			text-align: left;
		}
	}

</style>
<div class="topnav" id="myTopnav" style="position: relative; z-index: 2;">          

  	<?php
        $selectCategoryQuery = "
        	SELECT * FROM `category` WHERE pid = 0
        ";

        $record = fetchData($selectCategoryQuery);

        foreach ($record as $data) 
        {
  	?>  

	    	<div class="dropdown" >

	      		<a class="dropbtn" href="all-classifieds.php?cid=<?php  echo $data['id']; ?>"><?php  echo $data['category_name']; ?></a>

	      		<div class="dropdown-content">

	      			<?php

	        		$parentId = $data['id'];

	                $selectSubCategoryQuery = "
	                	SELECT * FROM `category` WHERE pid = '$parentId'
	                ";

	                $record = fetchData($selectSubCategoryQuery);
	                foreach ($record as $data1) 
	                {
	      			?>

	          			<a href="all-classifieds.php?cid=<?php  echo $data1['id']; ?>"><?php  echo $data1['category_name']; ?></a>

	          		<?php 
	               	}
	            	?>
	      		</div>
	  		</div>

 	<?php 
       	}
    ?>

  	<a href="javascript:void(0);" style="font-size:15px;" class="icon" onclick="myFunction()">&#9776;</a>
</div>
<div class="banner text-center">
	<div class="container">    
		<h1>Sell or Advertise   <span class="segment-heading">    anything online </span> with CAS</h1>
		<p>All ads are manually reviewed by our team for your safety.</p>
		<?php
			if (isset($_SESSION['loggedIn'])) {
		?>
			<a href="post-ad.php">Post Free Ad</a>
		<?php
			}
		?>
	</div>
</div>
<script>

	function myFunction() {

	    var x = document.getElementById("myTopnav");

	    if (x.className === "topnav") {

	        x.className += " responsive";

	    } else {

	        x.className = "topnav";

	    }

	}
</script>
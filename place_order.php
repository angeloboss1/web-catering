<?php
// start session
session_start();
// connect to database
include 'config/database.php';

// include objects
include_once "objects/product.php";
include_once "objects/product_image.php";

// get database connection
$database = new Database();
$db = $database->getConnection();

// initialize objects
$product = new Product($db);
$product_image = new ProductImage($db);



// set page title
$page_title="Thank You!";

// include page header HTML
include_once 'layout_head.php';

echo "<div class='col-md-12'>";

	// tell the user order has been placed
	echo "<div class='alert alert-success'>";
		echo "<strong>Your order has been placed!</strong> Thank you very much!";
	echo "</div>";

echo "</div>";

session_destroy();
// include page footer HTML
include_once 'layout_foot.php';
?>

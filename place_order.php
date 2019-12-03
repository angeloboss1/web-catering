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

$ids = array();
foreach($_SESSION['cart'] as $id=>$value){
	array_push($ids, $id);
}

$stmt=$product->readByIds($ids);

$total=0;
$item_count=0;
$message=<<<EOD

while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
			extract($row);

	$quantity=$_SESSION['cart'][$id]['quantity'];
	$sub_total=$price*$quantity;

	//echo "<div class='product-id' style='display:none;'>{$id}</div>";
	//echo "<div class='product-name'>{$name}</div>";

	// =================
	echo "<div class='cart-row'>";
		echo "<div class='col-md-6'>";

			echo "<div class='product-name m-b-10px'><h4>{$name}</h4></div>";
							echo $quantity>1 ? "<div>{$quantity} items</div>" : "<div>{$quantity} item</div>";

		echo "</div>";

		echo "<div class='col-md-4'>";
			echo "<h4>&#36;" . number_format($price, 2, '.', ',') . "</h4>";
		echo "</div>";
	echo "</div>";
	// =================

	$item_count += $quantity;
	$total+=$sub_total;
}

// echo "<div class='col-md-8'></div>";
echo "<div class='col-md-12 text-align-center'>";
	echo "<div class='cart-row'>";
					if($item_count>1){
				echo "<h4 class='m-b-10px'>Total ({$item_count} items)</h4>";
					}else{
							echo "<h4 class='m-b-10px'>Total ({$item_count} item)</h4>";
					}
		echo "<h4>&#36;" . number_format($total, 2, '.', ',') . "</h4>";
EOD;
		$firstname = $_POST['name'];
		$lastname = $_POST['surname'];
		$email = $_POST['email'];

$subject = "Your Order from SDA Catering"


		if(mail($email,$subject,$message)) {
	  		echo "<div class='alert alert-success'>
	  <strong>Success!</strong> Email sent correctly!
	</div>";
		} else {

		}






session_destroy();
// include page footer HTML
include_once 'layout_foot.php';
?>

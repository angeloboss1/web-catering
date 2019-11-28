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
$page_title="Cart";

// include page header html
include 'layout_head.php';

$action = isset($_GET['action']) ? $_GET['action'] : "";

echo "<div class='col-xl-8 offset-xl-2 py-5'>";
	if($action=='removed'){
		echo "<div class='alert alert-info'>";
			echo "Product was removed from your cart!";
		echo "</div>";
	}

	else if($action=='quantity_updated'){
		echo "<div class='alert alert-info'>";
			echo "Product quantity was updated!";
		echo "</div>";
	}
echo "</div>";

if(count($_SESSION['cart'])>0){

	// get the product ids
	$ids = array();
	foreach($_SESSION['cart'] as $id=>$value){
		array_push($ids, $id);
	}

	$stmt=$product->readByIds($ids);

	$total=0;
	$item_count=0;

	while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        extract($row);

		$quantity=$_SESSION['cart'][$id]['quantity'];
		$sub_total=$price*$quantity;

		// =================
		echo "<div class='row'>";
			echo "<div class='col-md-6'>";

				echo "<div class='form-group'><h4>{$name}</h4></div>";

				// update quantity
				echo "<form class='form-group'>";
					echo "<div class='form-control' style='display:none;'>{$id}</div>";
					echo "<div class='form-control'>";
						echo "<input type='number' name='quantity' value='{$quantity}' class='form-control cart-quantity' min='1' />";
							echo "<span class='input-group-btn'>";
								echo "<button class='glyphicon glyphicon-shopping-cart' type='submit'>Update</button>";
							echo "</span>";
					echo "</div>";
				echo "</form>";

				// delete from cart
				echo "<a href='remove_from_cart.php?id={$id}' class='glyphicon glyphicon-shopping-cart'>";
					echo "Delete";
				echo "</a>";
			echo "</div>";

			echo "<div class='col-md-4'>";
				echo "<h4>&#36;" . number_format($price, 2, '.', ',') . "</h4>";
			echo "</div>";
		echo "</div>";
		// =================

		$item_count += $quantity;
		$total+=$sub_total;
	}

	echo "<div class='col-md-8'></div>";
	echo "<div class='col-md-4'>";
		echo "<div class='cart-row'>";
			echo "<h4 class='m-b-10px'>Total ({$item_count} items)</h4>";
			echo "<h4>&#36;" . number_format($total, 2, '.', ',') . "</h4>";
	        echo "<a href='checkout.php' class='btn btn-success m-b-10px'>";
	        	echo "<span class='glyphicon glyphicon-shopping-cart'></span> Proceed to Checkout";
	        echo "</a>";
		echo "</div>";
	echo "</div>";

}

// no products were added to cart
else{
	echo "<div class='col-md-12'>";
		echo "<div class='alert alert-danger'>";
			echo "No products found in your cart!";
		echo "</div>";
	echo "</div>";
}

// footer layout
include 'layout_foot.php';
?>

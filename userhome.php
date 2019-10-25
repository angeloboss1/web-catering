<?php
session_start();
 if (!isset($_SESSION["username"]))
   {
      header("location: index.html");
   }
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>SDA Catering</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>


</head>
<body>

<nav class="navbar navbar-expand-md navbar-dark bg-dark mb-3">
    <div class="container-fluid">
        <a href="#" class="navbar-brand mr-3">SDA Catering</a>
        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav">
                <a href="userhome.php" class="nav-item nav-link active">Home</a>
                <div class="nav-item dropdown">
		<a href="yourinventory.php" data-toggle="dropdown" class="nav-link dropdown-toggle" >Your Inventory</a>
		<div class="dropdown-menu bg-dark">
			<a class="dropdown-item" href="yourinventory.php" style="color:gray;">All Inventory</a>
			<a class="dropdown-item" href="outofstock.php" style="color:gray;">Out of Stock</a>
			<a class="dropdown-item" href="lowstock.php" style="color:gray;">Low Stock</a>

		</div>
		</div>



                <a href="AddItem.php" class="nav-item nav-link">Add Item</a>
                <a href="Search.php" class="nav-item nav-link">Search Item</a>
            </div>
           <div id="navbarCollapse" class="collapse navbar-collapse justify-content-start">

		<ul class="nav navbar navbar-expand-md navbar-dark bg-dark ml-auto">
			<li class="nav-item">
			<a class="nav-link" href="#" style="color: grey;"><i class="fa fa-user-o" ></i><?php session_start(); echo " ". $_SESSION["username"]?></a>
			</li>

			<li class="nav-item">
			<a href="logout.php" style="color: grey;">Logout</a>
			</li>
		</ul>
	</div>
        </div>
    </div>

</nav>



<div class="jumbotron" style="background-image: url('/image/Inventory-Control.png'); height: 200px;">
  <div class="container text-center">
    <h1> </h1>
    <p></p>
  </div>
</div>

<div class="container-fluid bg-3 text-center">
  <h1>Welcome to SDA Catering  </h1><br><br>
  <div class="row">
    <div class="col-sm-4" >
	<?php
	  $conn = new mysqli("localhost", "catering_admin", "Drew2019@", "catering_logins");
		$_SESSION["connection"] = $conn;
		$username = $_SESSION["username"] ;
		if ($conn->connect_error) {
			die("Connection failed: " . $conn->connect_error);
		}
		$outofstockQuery= "SELECT * FROM inventory WHERE username = '$username' AND Quantity = '0'";
		$result = $conn->query($outofstockQuery);
		echo "<h5>You have " . $result->num_rows . " items out of stock</h5>";
		?>
      <a href="outofstock.php"><img src="/image/OutOfStock.jpg" class="img-responsive" style="width:100%; height: 60%;" alt="Image"></a>
      <hr>
    </div>

    <div class="col-sm-4">
      	<?php
		$conn = new mysqli("localhost", "angelobo_a", "angeloboss12", "angelobo_logins");
		$_SESSION["connection"] = $conn;
		$username = $_SESSION["username"] ;
		if ($conn->connect_error) {
			die("Connection failed: " . $conn->connect_error);
		}
		$lowstockQuery= "SELECT * FROM inventory WHERE username = '$username' AND Quantity <= lowstockfrom AND Quantity > '0' ";
		$result = $conn->query($lowstockQuery);
		echo "<h5>You have " . $result->num_rows . " items low stock</h5>";
		?>
      <a href="lowstock.php"><img src="/image/LowStock.jpg" class="img-responsive" style="width:100%; max-height: 60%;" alt="Image"></a>
      <hr>
      <br><br>
    </div>


    <div class="col-sm-4">
      <?php
						$conn = new mysqli("localhost", "angelobo_a", "angeloboss12", "angelobo_logins");
	$_SESSION["connection"] = $conn;

	if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
	}
	$sql= "SELECT sku, Product_name, Product_desc, Quantity FROM inventory WHERE username = '$username'";
	$result = $conn->query($sql);
	echo "<h5>You have " . $result->num_rows . " items in your inventory</h5>";
	?>
      <a href="yourinventory.php"><img src="/image/inventory.png"  class="img-responsive" style="width:100%; height: 60%;" alt="Image"></a>
      <hr>
    </div>
  </div>
</div>

<footer class="page-footer font-small bg-dark pt-4" style="bottom: 0; width: 100%; text-align: center;">
  <!-- Copyright -->
  <div class="footer-copyright text-center py-3" style="color:white;">© 2019 Copyright: Angelo Bossini, Sandiya Venkatesh, Damaris Zola</div>
  <!-- Copyright -->

</footer>
<!-- Footer -->


</body>
</html>

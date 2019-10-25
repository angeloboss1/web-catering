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


<footer class="page-footer font-small bg-dark pt-4" style="bottom: 0; width: 100%; text-align: center;">
  <!-- Copyright -->
  <div class="footer-copyright text-center py-3" style="color:white;">© 2019 Copyright: Angelo Bossini, Sandiya Venkatesh, Damaris Zola</div>
  <!-- Copyright -->

</footer>
<!-- Footer -->


</body>
</html>

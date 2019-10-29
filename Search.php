<?php

session_start();
$username = $_SESSION["username"] ;
 if (!isset($_SESSION["username"]))
   {
      header("location: index.html");
   }

?>
<!DOCTYPE html>
<html>
<head>
<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>SDA Catering</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<script>
$(function () {
    $( '#table' ).searchable({
        striped: true,
        oddRow: { 'background-color': '#f5f5f5' },
        evenRow: { 'background-color': '#fff' },
        searchType: 'fuzzy'
    });

});
</script>
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
                <a href="userhome.php" class="nav-item nav-link">Home</a>
                <div class="nav-item dropdown">
		<a href="yourinventory.php" data-toggle="dropdown" class="nav-link dropdown-toggle" >Your Inventory</a>
		<div class="dropdown-menu bg-dark">
			<a class="dropdown-item" href="yourinventory.php" style="color:gray;">All Inventory</a>
			<a class="dropdown-item" href="outofstock.php" style="color:gray;">Out of Stock</a>
			<a class="dropdown-item" href="lowstock.php" style="color:gray;">Low Stock</a>

		</div>
		</div>
                <a href="AddItem.php" class="nav-item nav-link">Add Item</a>
                <a href="Search.php" class="nav-item nav-link active">Search Item</a>
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
<div class="container">
    <div class="row">

        <div class="col-lg-6">
            <h3>Search in your Inventory</h3>
            <input type="search" id="search" value="" class="form-control" placeholder="Search in your inventory">
            <br><br>
        </div>
   <br><br>

  <div class="col-lg-6">
  <div class="form-group form-inline">
<form action="Search.php" method="POST" >
  <h3>Delete SKU from Inventory </h3>
<input id = "sku" name="sku" type="text" class="form-control" placeholder="Delete SKU Item from your Inventory ">
<input type="submit" id="btn" class="btn btn-primary bg-dark form-control" value="Delete SKU" ><br>
 </div>
</form>


</div>
<br><br>
</div>

<?php
session_start();

	$sku = $_POST["sku"];
	$username = $_SESSION["username"] ;
$conn1 = new mysqli("localhost", "catering_admin", "Drew2019@", "catering_logins");
	if ($conn1->connect_error) {
	die("Connection failed: " . $conn1->connect_error);
	}
	$query= "DELETE FROM catalogue WHERE id_product = '$sku'";
	if($sku===NULL){

	}
	else{

	if($conn1->query($query) === TRUE){
    		echo "<div class='alert alert-success' role='alert'> You successfully delete the item.</div>";
	}
	else{
    	echo "ERROR: Could not able to execute $sql. "  . mysqli_error($conn1);
    	echo "<div class='alert alert-danger' role='alert'> You already entered an item with the same SKU.</div>";
	} }

?>


        <div class="col-lg-12">


            <?php
						$conn = new mysqli("localhost", "catering_admin", "Drew2019@", "catering_logins");
	$_SESSION["connection"] = $conn;

	if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
	}
	$sql= "SELECT id_product, Product_name, Product_desc, Quantity FROM catalogue";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
	?>
</div>


					<table id="table"  class="table table-sm table-striped" style="width:96%; text-align:center;" align="center">
  					<thead class="thead-dark">
					      <th>Product Id</th>
					      <th>Product Name</th>
					      <th>Product Description</th>
					      <th>Quantity</th>
					    </tr>
					  </thead>
					  <tbody>
<?php
    while($row = $result->fetch_assoc()) {

        echo "<tr> <td>" . $row["id_product"] . "</td><td>". $row["Product_name"]."</td>" . "<td>" . $row["Product_desc"] . "</td>" . "<td>" . $row["Quantity"] . "</td></tr>";
    }
} else {
    echo "0 results";
}

	mysqli_close($conn);
	?>
            <hr>



<script src="//rawgithub.com/stidges/jquery-searchable/master/dist/jquery.searchable-1.0.0.min.js"></script>

</body>

</html>

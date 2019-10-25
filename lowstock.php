<?php
session_start();
$username = $_SESSION["username"] ;
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
<title>Bossventory</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<style>
html,
body {
   margin:0;
   padding:0;
   height:100%;
}

.header {
   background:#ff0;
   padding:10px;
}
.body {
   padding:10px;
   padding-bottom:60px;   /* Height of the footer */
}
.footer {
   position:absolute;
   bottom:0;
   width:100%;
   height:60px;   /* Height of the footer */
   background:#6cf;
}
</style>
</head>
<body >

<nav class="navbar navbar-expand-md navbar-dark bg-dark mb-3">
    <div class="container-fluid">
        <a href="#" class="navbar-brand mr-3">Bossventory</a>
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

<div class="container">
	<div class="col-md-12">
		<div class="page-header">
			<h1>
				Your Inventory Low Stock
			</h1>
		
 
						 
			
					 <?php
						$conn = new mysqli("localhost", "angelobo_a", "angeloboss12", "angelobo_logins");
	$_SESSION["connection"] = $conn;
	
	if ($conn->connect_error) { 
	die("Connection failed: " . $conn->connect_error);
	}
	$lowstockQuery= "SELECT * FROM inventory WHERE username = '$username' AND Quantity <= lowstockfrom AND Quantity > '0' ";
	$result = $conn->query($lowstockQuery);
	if ($result->num_rows > 0) {
	echo "You have " . $result->num_rows . " items at low stock level<br><br>"; ?>
</div>
<div class="panel panel-success">
<div class="panel-body">
				<div class="row">
					<div class="col-md-12">
					<table id="dtBasicExample" class="table table-striped table-sm" cellspacing="0" style= "text-align:center;width:90%; ">
  					<thead class="thead-dark">
					    <tr>
					      <th class="th-sm">SKU</th>
					      <th class="th-sm">Product Name</th>
					      <th class="th-sm">Product Description</th>
					      <th class="th-sm">Qty</th>
					      <th class="th-sm">Low Stock Default</th>
					    </tr>
					  </thead>
					  <tbody>
<?php
    while($row = $result->fetch_assoc()) {
    	
        echo "<tr> <td>" . $row["sku"]. "</td>" . "<td>". $row["Product_name"]."</td>" . "<td>" . $row["Product_desc"] . "</td>" . "<td>" . $row["Quantity"] . "</td><td>" . $row["lowstockfrom"] . "</td></tr>";
    }
} else {
    echo "0 results";
}
	mysqli_close($conn);
	?>
</table>
		</div>
		
	</div>
	<br><br><center><img src="/image/LowStock.jpg" style="width: 60%;" ></center>
</div>				
</div>

</div>

</div>				
	



</body>
</html>
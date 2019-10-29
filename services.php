<?php
session_start();
$username = $_SESSION["username"] ;
 if (!isset($username))
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
<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">


</head>
<body >

<nav class="navbar navbar-expand-md navbar-dark bg-dark" >
    <div class="container-fluid">
        <a href="#" class="navbar-brand mr-3">Bossventory</a>
        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav">
                <a href="userhome.php" class="nav-item nav-link">Home</a>
                <div class="nav-item dropdown">
		<a href="yourinventory.php" data-toggle="dropdown" class="nav-link dropdown-toggle active" >Your Inventory</a>
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
    <div class="row">

        <div class="col-lg-12"><br>
            <h3>Your Inventory</h3>

        </div>
    </div>
    <br><br>
        <div class="col-lg-12">


            <?php
						$conn = new mysqli("localhost", "catering_admin", "Drew2019@", "catering_logins");
	$_SESSION["connection"] = $conn;

  if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
  }
  $sql= "SELECT * FROM catalogue";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
	?>
</div>


					<table id="table"  class="table table-sm table-striped" style="width:90%; text-align:center;" align="center">

					      <th>SKU</th>

					    </tr>
					  </thead>
					  <tbody>
<?php
    while($row = $result->fetch_assoc()) {

        echo "<tr> <td>" . $row['id_product'] . "</td></tr>";
        echo "<tr> <td> <img src='" . $row['Image_path'] . "'></td></tr>";
    }
} else {
    echo "0 results";
}

	mysqli_close($conn);
	?>
</table>

		</div>
	</div><br><br><center><img src="/image/inventory.png" style="width: 40%;" ></center>
</div>
</div>
</div>
</div>

</body>

</html>

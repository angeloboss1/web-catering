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
<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">


</head>
<body >

  <nav class="navbar navbar-expand-md navbar-dark bg-dark mb-3">
      <div class="container-fluid">
          <a href="#" class="navbar-brand mr-3">SDA Catering</a>
          <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
              <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarCollapse">
              <div class="navbar-nav">
                  <a href="index.html" class="nav-item nav-link">Home</a>
                  <a href="products.php" class="nav-item nav-link active">Products</a>
                  <a href="contact.php" class="nav-item nav-link">Contact</a>
              </div>
              <div id="navbarCollapse" class="collapse navbar-collapse justify-content-start">

  		<ul class="nav navbar navbar-expand-md navbar-dark bg-dark ml-auto">

  			<li class="nav-item dropdown">
  				<a data-toggle="dropdown" class="nav-link dropdown-toggle" href="#" style="color: grey;"><i class="fa fa-user-o" ></i> Login</a>
  				<ul class="dropdown-menu">
  					<li>
                          <form class="form-inline login-form" action="login.php" method="POST">
                              <div class="input-group">
                                  <input type="text" class="form-control" name="username" style="width: 90%; margin-left:5%; margin-right:5%;" placeholder="Username" required>
                              </div>
                              <div class="input-group" >
                                  <input type="password" class="form-control" name="psw" style="width: 90%; margin-left:5%; margin-top:5%; margin-right:5%;" placeholder="Password" required>
                              </div>
                              <button type="submit" class="btn bg-dark btn-primary" style="margin-left:10px; margin-top: 10px; margin-right: 10px;">Login</button>

                          </form>
  					</li>


  				</ul>

  			</li>
  			<li class="nav-item">
  			<a href="register.php" style="color: grey;"><i class="fa fa-user-o"></i> Register</a>
  			</li>
  		</ul>
  	</div>
          </div>
      </div>
  </nav>
<div class="container">
    <div class="row">

        <div class="col-lg-12"><br>
            <h3 align="center">Our Menu</h3>

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

<?php
    $counter = 0;
    echo '<div class="row">';
    while($row = $result->fetch_assoc()) {
      if($counter != 0 && $counter % 3 == 0){
            echo '</div><div class="row">';
          }
        echo "<div class='col-sm-4 img-portfolio'><h3 align='center'>" . $row['Product_Name'] . "</h3>";
        echo "<center><img src='" . $row['Image_path'] . "' width='300px' height='250px'></center>";
        echo "<p align='center'>" . $row['Product_Desc'] . "</p></div>";
        echo "<center><button type='button'>Add to cart</button></center>"
        ++$counter;
    }
    echo "</div>";
} else {
    echo "0 results";
}

	mysqli_close($conn);
	?>
</table>

		</div>
	</div>
</div>
</div>
</div>
</div>

</body>

</html>

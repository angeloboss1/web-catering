<?php
$conn = new mysqli("localhost", "catering_admin", "Drew2019@", "catering_logins");
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}
$sql= "SELECT * FROM catalogue";
$result = mysql_query($sql);
?>
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


</head>
<body>

<nav class="navbar navbar-expand-md navbar-dark bg-dark mb-3">
    <div class="container-fluid">
        <a href="#" class="navbar-brand mr-3">Bossventory</a>
        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav">
                <a href="index.html" class="nav-item nav-link ">Home</a>
                <a href="services.html" class="nav-item nav-link active">Services</a>
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

<div class="productinfo text-center">


  <?php while ($row = mysql_fetch_array($result))
     { ?>

       
       <h2><?php echo $row['id_product']; ?></h2>
       <p>Book 10</p>
</div>

<footer class="page-footer font-small bg-dark pt-4" style="bottom: 0; width: 100%; text-align: center;">
  <!-- Copyright -->
  <div class="footer-copyright text-center py-3" style="color:white;">© 2019 Copyright: Angelo Bossini</div>
  <!-- Copyright -->

</footer>
<!-- Footer -->


</body>
</html>
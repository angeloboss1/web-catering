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
                <a href="index.html" class="nav-item nav-link">Home</a>
                <a href="services.html" class="nav-item nav-link">Services</a>
                <a href="contact.php" class="nav-item nav-link">Contact</a>
            </div>
            <div id="navbarCollapse" class="collapse navbar-collapse justify-content-start">

		<ul class="nav navbar navbar-expand-md navbar-dark bg-dark ml-auto">

			<li class="nav-item dropdown">
				<a data-toggle="dropdown" class="nav-link dropdown-toggle" href="#" style="color: white;"><i class="fa fa-user-o" ></i> Login</a>
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
			<a href="register.php" style="color: grey;" ><i class="fa fa-user-o"></i> Register</a>
			</li>
		</ul>
	</div>
        </div>
    </div>
</nav>

<br>
<?php
	session_start();
	$username = $_POST['username'];
	$password = $_POST['psw'];
	$password = base64_encode($password);
	$_SESSION["username"] = $username;


	$username = stripcslashes($username);
	$password = stripcslashes($password);


	$conn = new mysqli("localhost", "catering_admin", "Drew2019@", "catering_logins");
	$_SESSION["connection"] = $conn;
	if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
	}
	$sql= "SELECT * FROM users WHERE username = '$username' and password = '$password'";
	$result = $conn->query($sql);
	$row = $result->fetch_assoc();
	if($result->num_rows > 0){
	if($row["username"]==$username && $row["password"] == $password){

        	echo 	$_SESSION["username"];

	}
	}
	else{
	echo "<div class='alert alert-danger' role='alert'>This is a danger alert—check it out!</div>";

		?>
<br>
<section id="cover">
    <div id="cover-caption">
        <div id="container" class="container">
            <div class="row">
                <div class="col-sm-6 offset-sm-3 text-center">
                    <h1 class="display-4">Login to SDA Catering</h1><br><br>
                    <div class="info-form">
                        <form action="login.php" class="form-inlin justify-content-center" method="POST">
                            <div class="form-group">
                                <label >Username</label>
                                <input type="text" name="username" class="form-control" placeholder="Username">
                            </div>
                            <div class="form-group">
                                <label >Password</label>
                                <input type="password" name="psw" class="form-control" placeholder="Password">
                            </div>
                            <button type="submit" class="btn bg-dark btn-success ">Login</button>
                        </form>
                    </div>
                    <br>


                </div>
            </div>
        </div>
    </div>
</section>
<?php
}


	mysqli_close($conn);
	?>
</body>
</html>

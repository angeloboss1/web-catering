<?php
session_start();
$username = $_POST['username'];
$password = $_POST['psw'];
$password = base64_encode($password);



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
$_SESSION["username"] = $username;
header("Location: userhome.php");
exit();
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
                    <h1 class="display-4">Login to Bossventory</h1><br><br>
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


</body>
</html>
?>

<?php
session_start();
$username = $_POST['username'];
$password = $_POST['psw'];
$password = base64_encode($password);



$username = stripcslashes($username);
$password = stripcslashes($password);


$conn = new mysqli("localhost", "catering_admin", "Drew2019@", "catering_logins");
$_SESSION["connection"] = $conn;
$_SESSION["username"] = $username;
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}
$sql= "SELECT * FROM users WHERE username = '$username' and password = '$password'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
if($result->num_rows > 0){
header("Location: userhome.php");
exit();
	}
	else{
	echo "<div class='alert alert-danger' role='alert'>Fail Login</div>";

}

?>

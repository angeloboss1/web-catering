<?php
$conn = new mysqli("localhost", "catering_admin", "Drew2019@", "catering_logins");
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}
$sql= "SELECT * FROM users WHERE username = '$username' and password = '$password'";
$result = $conn->query($sql);
while ($row = $result->fetch_assoc())
{
 echo $row['id_product'];
}
echo 'hello';
?>

<?php
session_start();
$_SESSION["connection"] = $conn;
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
                <a href="userhome.php" class="nav-item nav-link">Home</a>
                <a href="AddItem.php" class="nav-item nav-link active">Add Item</a>
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



<div id="cover-caption">
        <div id="container" class="container">
            <div class="row">
                <div class="col-sm-6 offset-sm-3 text-center">
                    <h1 class="display-4">Add a new Item in the Menu</h1><br><br>
                    <div class="form-group">
                        <form action="AddItem.php" method="POST" style=" text-align: center;"  enctype="multipart/form-data">
                            <div class="form-group">
                          	<label>Product Id</label><br>
    				<input type="text" id="sku" name="sku" class="form-control" placeholder="EX: 123" required><br>
    				<label>Product Name</label><br>
    				<input type="text" placeholder="Product Name" class="form-control" name="ProductName" required><br>
    				<label>Product Description</label><br>
      				<textarea type="text" placeholder="Product Description" class="form-control" name="ProductDesc" required></textarea><br>
      				<label>Price</label><br>
      				<input type="number" placeholder="Price"  class="form-control" name="Price" required><br>
      				<label>Product Image</label><br>
              <input type="file" name="fileToUpload" id="fileToUpload">
      				<br><br><br>
      				<button type="submit" id="btn" class="btn btn-primary bg-dark btn-raised" value="Add Item">Add Item</button><br>
                        </form>
                    </div>
                    <br>


                </div>
            </div>
        </div>
    </div>




<?php
	session_start();
	$sku = $_POST['sku'];
	$productname = $_POST['ProductName'];
	$productdesc = $_POST['ProductDesc'];
	$price = $_POST['Price'];
	$username = $_SESSION["username"] ;

	$sku = stripcslashes($sku);
	$productname = stripcslashes($productname);
	$productdesc = stripcslashes($productdesc);
	$price = stripcslashes($quantity);

	$conn = new mysqli("localhost", "catering_admin", "Drew2019@#", "catering_logins");
  $path = "Pictures/";
	if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
	}

	if($sku===''){
	}
	else{
    if (is_dir($path)){
      $target_dir = $path;
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}
// Check if file already exists
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}
// Check file size
if ($_FILES["fileToUpload"]["size"] > 5000000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
        $imagepath="Pictures/" . $username . "/" . $_FILES["fileToUpload"]["name"];
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}

  }


  else{
    mkdir($path);
    echo "NO" . $_FILES["file"]['tmp_name'];
  }
$sql= "INSERT INTO catalogue (id, name, description, price, Image_path,created) VALUES ('$sku','$productname','$productdesc','$price','$imagepath',NULL)";
	if ($conn->query($sql) === TRUE and $imagepath <> '') {
	echo "<div class='alert alert-success' role='alert'>You item is now added to the inventory.</div>";

	}
	else {
    		echo "<div class='alert alert-danger' role='alert'> You already entered an item with the same SKU.</div>";
    	}}
?>
</body>
</html>

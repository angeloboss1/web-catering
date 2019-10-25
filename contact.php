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
                <a href="https://www.angelobossini.com" class="nav-item nav-link">Home</a>
                <a href="services.html" class="nav-item nav-link">Services</a>
                <a href="contact.php" class="nav-item nav-link active">Contact</a>
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

                <div class="col-xl-8 offset-xl-2 py-5">

                    <h1>Contact our team! </h1>

                    <p class="lead"></p>

                    
                    <form id="contact-form" method="POST" action="contact.php" role="form">

    <div class="messages"></div>

    <div class="controls">

        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="form_name">Firstname *</label>
                    <input id="form_name" type="text" name="name" class="form-control" placeholder="Please enter your firstname *" required="required" data-error="Firstname is required.">
                    <div class="help-block with-errors"></div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="form_lastname">Lastname *</label>
                    <input id="form_lastname" type="text" name="surname" class="form-control" placeholder="Please enter your lastname *" required="required" data-error="Lastname is required.">
                    <div class="help-block with-errors"></div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="form_email">Email *</label>
                    <input id="form_email" type="email" name="email" class="form-control" placeholder="Please enter your email *" required="required" data-error="Valid email is required.">
                    <div class="help-block with-errors"></div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="form_need">Please specify your need *</label>
                    <select id="form_need" name="need" class="form-control" required="required" data-error="Please specify your need.">
                        <option value=""></option>
                        <option value="Request quotation">Request quotation</option>
                        <option value="Request order status">Request order status</option>
                        <option value="Request copy of an invoice">Request copy of an invoice</option>
                        <option value="Other">Other</option>
                    </select>
                    <div class="help-block with-errors"></div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label for="form_message">Message *</label>
                    <textarea id="form_message" name="message" class="form-control" placeholder="Message for me *" rows="4" required="required" data-error="Please, leave us a message."></textarea>
                    <div class="help-block with-errors"></div>
                </div>
            </div>
            <div class="col-md-12">
                <input type="submit" class="btn btn-primary btn-send bg-dark" value="Send message">
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <p class="text-muted">
                    <strong>*</strong> These fields are required</p>
            </div>
        </div>
    </div>

</form> 

                </div>
                

            </div>
<div id="amzn-assoc-ad-aee1ed11-5e24-4c2a-804b-add972e09093"></div><script async src="//z-na.amazon-adsystem.com/widgets/onejs?MarketPlace=US&adInstanceId=aee1ed11-5e24-4c2a-804b-add972e09093"></script>
        </div>


<?php


	session_start();
	$firstname = $_POST['name'];
	$lastname = $_POST['surname'];
	$email = $_POST['email'];
	$need = $_POST['form_need'];
	$message = $_POST['message'];
	
	
	$subject = 'Contact from angelobossini.com';

	
	if(mail($email,$subject,$message)) {
  		echo "<div class='alert alert-success'>
  <strong>Success!</strong> Email sent correctly!
</div>";
	} else {
  	
	}



	
	mysqli_close($conn);
?>
 </body>
</html>
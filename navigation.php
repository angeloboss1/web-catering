<!-- navbar -->

<nav class="navbar navbar-expand-md navbar-dark bg-dark mb-3">
<div class="container-fluid">
		<a href="#" class="navbar-brand mr-3">SDA Catering</a>
		<button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
				<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="navbarCollapse">
				<div class="navbar-nav">
						<a href="index.php" class="nav-item nav-link ">Home</a>
						<a href="products.php" class="nav-item nav-link">Products</a>
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
<!-- style="text-decoration:none;color: white; -->
	</li>
	<?php session_start();?>
	<li class="nav-item" >
		<a href="cart.php" class="nav-item nav-link">
			<?php
			// count products in cart
			$cart_count=count($_SESSION['cart']);
			?>
			Cart <span class="badge" id="comparison-count"><?php echo $cart_count; ?></span>
		</a>
	</li>


	 <!-- <li class="nav-item">
	<a href="register.php" style="color: grey;"><i class="fa fa-user-o"></i> Register</a>
</li> -->
</ul>
</div>
		</div>
</div>
</nav>
<!-- /navbar -->

<header id="header"><!--header-->
	<div class="header_top"><!--header_top-->
		<div class="container">
			<div class="row">
				<div class="col-sm-6">
					<div class="contactinfo">
						<ul class="nav nav-pills">
							<li><a href="#"><i class="fa"></i>Helpline</a></li>
							<li><a href="#"><i class="fa fa-phone"></i>+88 01677079251</a></li>
							<li><a href="#"><i class="fa fa-envelope"></i> rayhanuddin55@gmail.com</a></li>
						</ul>
					</div>
				</div>
				<div class="col-sm-6">
					<div class="social-icons pull-right">
						<ul class="nav navbar-nav">
							<li><a href="https://web.facebook.com/Rayhanuddin55" target="_blank"><i class="fa fa-facebook"></i></a></li>
							<li><a href="#"><i class="fa fa-twitter"></i></a></li>
							<li><a href="#"><i class="fa fa-linkedin"></i></a></li>
							<li><a href="#"><i class="fa fa-google-plus"></i></a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div><!--/header_top-->
	
	<div class="header-middle"><!--header-middle-->
		<div class="container">
			<div class="row">
				<div class="col-sm-4">
					<div class="logo pull-left">
						<a href="index.php"><img src="images/home/logo.png" alt="" /></a>
						
					</div>
				</div>
				<div class="col-sm-8">
					<div class="shop-menu pull-right">
					
						<ul class="nav navbar-nav">
						
							<li><a ><?php 
								@session_start(); 
								if(isset($_SESSION["UserName"])){
									if($_SESSION["Type"] == "user"){ 
										echo "Hello, ".'<b>'.$_SESSION["UserName"].'</b>';
										echo '<li><a href="userAccount.php"><i class="fa fa-user"></i> Account</a></li>';
										echo '<li><a href="checkout.php"><i class="fa fa-crosshairs"></i> Checkout</a></li>';
										echo '<li><a href="cart.php"><i class="fa fa-shopping-cart"></i> Cart</a></li>';
									}
									else{
										echo '<li><a href="productList.php"><i class="fa fa-user"></i>Admin Panel</a></li>';
										echo '<li><a href="index.php"><i class="fa fa-shopping-cart"></i> Home</a></li>';
									}
								}
							?></a></li>
							
							<?php 
								if(isset($_SESSION["UserName"])){ 
									echo '<li><a href="logout.php"><i class="fa fa-lock"></i> Logout</a></li>';
								}
								else{
									echo '<li><a href="login.php"><i class="fa fa-lock"></i> Login</a></li>';
								}
							?>
							
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div><!--/header-middle-->
	</br>
	
</header><!--/header-->
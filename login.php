<?php 
	
	if(@$_SERVER['REQUEST_METHOD'] == 'GET'){
		@session_start();
		@$_SESSION["previousPage"] = $_SERVER['HTTP_REFERER'];
	}
	
	
	if(isset($_POST['login']))
	{
			$email=$_POST['email'];
			$pass=$_POST['pass'];
			
			require_once "config.php";	
			
			$result = mysql_query("SELECT * FROM users WHERE Email='$email' AND Password='$pass'");
			
			if(mysql_num_rows($result)==1)
			{
				$row=mysql_fetch_array($result);
				
				@session_start();
				
				$_SESSION["UserName"] = $row["UserName"];
				$_SESSION["UserId"] = $row["UserId"];
				$_SESSION["Address"] = $row["Address"];
				$_SESSION["Phone"] = $row["Phone"];
				$_SESSION["Type"] = $row["Type"];
				
				if($_SESSION["Type"] == "admin"){
					header('Location: productList.php');
				}else{
				
					header('Location:'.$_SESSION["previousPage"]);
					
				}
				
			}
			else
			{
				echo "Invalid Username or Password !!";
			}
	}
	if(isset($_POST['signup']))
	{
			$name=$_POST['name'];
			$email=$_POST['email'];
			$pass=$_POST['pass'];
			$address=$_POST['address'];
			$phone=$_POST['phone'];
			
			require_once "config.php";	
			$query = "insert into users(UserName,Password,Email,Type,Address,Phone) Values('$name','$pass','$email','user','$address','$phone')";
			$sql= mysql_query($query);
			echo "sign up successfully";
	}		
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Login | E-Shopper</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/prettyPhoto.css" rel="stylesheet">
    <link href="css/price-range.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
	<link href="css/main.css" rel="stylesheet">
	<link href="css/responsive.css" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->       
    <link rel="shortcut icon" href="images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">
</head><!--/head-->

<body>
	
	<?php include('header.php');?> <!--Footer-->
	
	<section id=""><!--form-->
		<div class="container">
			<div class="row">
				<div class="col-sm-4 col-sm-offset-1">
					<div class="login-form animated bounceInLeft"><!--login form-->
						<h2>Login to your account</h2>
						<form action="#" method="POST">
							
							<input name="email" type="email" placeholder="Email Address" required/>
							<input name="pass" type="password" placeholder="Password" required/>
							<span>
								<input type="checkbox" class="checkbox"> 
								Keep me signed in
							</span>
							<button name="login" type="submit" class="btn btn-default">Login</button>
						</form>
					</div><!--/login form-->
				</div>
				<div class="col-sm-1 animated bounceInDown">
					<h2 class="or">OR</h2>
				</div>
				<div class="col-sm-4">
					<div class="signup-form animated bounceInRight"><!--sign up form-->
						<h2>New User Signup!</h2>
						<form action="#" method="POST">
							<input name="name" type="text" placeholder="Name" required/>
							<input name="email" type="email" placeholder="Email Address" required/>
							<input name="address" type="text" placeholder="Address" required/>
							<input name="phone" type="number" placeholder="Phone" required/>
							<input name="pass" type="password" placeholder="Password" required/>
							<button name="signup" type="submit" class="btn btn-default">Signup</button>
						</form>
					</div><!--/sign up form-->
				</div>
			</div>
		</div>
	</section><!--/form-->
	</br>
	<?php include('footer.php');?> <!--Footer-->
	
    <script src="js/jquery.js"></script>
	<script src="js/price-range.js"></script>
    <script src="js/jquery.scrollUp.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.prettyPhoto.js"></script>
    <script src="js/main.js"></script>
</body>
</html>
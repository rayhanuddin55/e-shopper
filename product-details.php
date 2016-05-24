<?php
	require_once "config.php";
	session_start();
	$id=$_GET["id"];
	$sql="SELECT * FROM products WHERE P_Id='$id'";
	$result = mysql_query($sql);
	$row=mysql_fetch_array($result);
	
	if(isset($_POST["addCart"])){
		if($_SESSION["Type"] == "user"){
			$id			=	$_GET["id"];
			$quantity 	=	$_POST["quantity"];
			$date		=	date('Y-m-d');
			$amount		=	$row["Price"]*$quantity;
			$userId		=	$_SESSION["UserId"];
			$P_Name		=	$row["P_Name"];
			$address	=	$_SESSION["Address"];
			$phone		=	$_SESSION["Phone"];
			$image		=	$row["Image"];
			$result1 	=	"insert into orders(User_Id,Product_Id,P_Name,Image,Address,Phone,Quantity,Amount,Date,Status,StatusAdmin) Values('$userId','$id','$P_Name','$image','$address','$phone','$quantity','$amount','$date','notChecked','notOk')";
			$sql		=	mysql_query($result1);
			
			header('location:cart.php');
			//echo "insert ok";
		}
		else{
			header('location:login.php');
		}
		
	}
	
?>
	
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Product Details | E-Shopper</title>
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
	<?php include('header.php');?> <!--header-->
	
	<section>
	
	
		<div class="container">
		
			<div class="row">
				
				<div class="col-sm-12 padding-right">
					<div class="product-details"><!--product-details-->
						<div class="col-sm-5">
							<div class="view-product">
								<img src="<?php echo $row["Image"];?>" alt="" />
							</div>
						</div>
						<form action="#" method="POST">
							<div class="col-sm-7">
								<div class="product-information"><!--/product-information-->
									<h2><?php echo $row["P_Name"];?></h2>
									<p>Product ID: <?php echo $id;?></p>
									<img src="images/product-details/rating.png" alt="" />
									<span>
										<span><?php echo $row["Price"];?></span>
										<label>Quantity:</label>
										<input type="number" min="1" value="1" name="quantity" />
										<button type="submit" name="addCart" class="btn btn-fefault cart">
											<i class="fa fa-shopping-cart"></i>
											Add to cart
										</button>
										
									</span>
									<p><b>Availability:</b> In Stock</p>
									<p><b>Brand:</b> E-SHOPPER</p>
									<a href=""><img src="images/product-details/share.png" class="share img-responsive"  alt="" /></a>
								</div><!--/product-information-->
							</div>
						</form>
					</div><!--/product-details-->
					
				</div>
			</div>
		</div>
	</section>
	
	<?php include('footer.php');?> <!--Footer-->
	

  
    <script src="js/jquery.js"></script>
	<script src="js/price-range.js"></script>
    <script src="js/jquery.scrollUp.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.prettyPhoto.js"></script>
    <script src="js/main.js"></script>
</body>
</html>
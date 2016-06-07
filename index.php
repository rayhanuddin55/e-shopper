<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Home | E-Shopper</title>
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
	<?php
		require_once "config.php";
						
		$sql11 ="SELECT * FROM products order by P_Id desc LIMIT 2";
		
		$result11 = mysql_query($sql11);
		
		
		
	?>
	<section id="slider"><!--slider-->
		<div class="container">
			<div class="row">
				<div class="col-sm-12">
					<div id="slider-carousel" class="carousel slide" data-ride="carousel">
						<ol class="carousel-indicators">
							<li data-target="#slider-carousel" data-slide-to="0" class="active"></li>
							<li data-target="#slider-carousel" data-slide-to="1"></li>
							<li data-target="#slider-carousel" data-slide-to="2"></li>
						</ol>
						
						<div class="carousel-inner">
							<div class="item active">
								<div class="col-sm-6">
									<h1><span>E</span>-SHOPPER</h1>
									<h2>Get Everything You Need</h2>
									<p>E-Shopper is a most populer online shopping site in Bangladesh. we care about product quality and on time delivery.</p>
									
									<a class="btn btn-default get" href="login.php">Create free account now</a>
								</div>
								<div class="col-sm-6">
									<img src="images/home/girl3.jpg" class="girl img-responsive" alt="" />									
								</div>
							</div>
							<?php
								while($row11=mysql_fetch_array($result11)){
									$url1="product-details.php?id=".$row11["P_Id"];
									echo '<div class="item ">
										<div class="col-sm-6">
											<h1><span>New Arrival</span></h1>
											<h2>'.$row11["P_Name"].'</h2>
											<p>New product avalible !! Get it now.</p>
											
											<a class="btn btn-default get" href="'.$url1.'">Get it now</a>
										</div>
										<div class="col-sm-6">
											<img src="'.$row11["Image"].'" class="" width="484" height="441" alt="" />
											
										</div>
									</div>';
								}
								
							?>
							
							
						</div>
						
						<a href="#slider-carousel" class="left control-carousel hidden-xs" data-slide="prev">
							<i class="fa fa-angle-left"></i>
						</a>
						<a href="#slider-carousel" class="right control-carousel hidden-xs" data-slide="next">
							<i class="fa fa-angle-right"></i>
						</a>
					</div>
					
				</div>
			</div>
		</div>
	</section><!--/slider-->
	
	<section>
		<div class="container">
			<div class="row">
				<div class="col-sm-3">
					<div class="left-sidebar">
						<h2>Category</h2>
						<div class="panel-group category-products" id="accordian"><!--category-productsr-->
							<?php
								require_once "config.php";
								$sql ="SELECT * FROM categories ORDER BY Name";
								$result = mysql_query($sql);
								while($row=mysql_fetch_array($result))
								{
									$url1="index.php?id=".$row["Name"];
									echo '<div class="panel panel-default">
											<div class="panel-heading">
												<h4 class="panel-title"><a href="'.$url1.'">'.$row["Name"].'</a></h4>
											</div>
										</div>';
								}
							?>
						</div><!--/category-products-->
					</div>
				</div>
				
				<div class="col-sm-9 padding-right">
				
					<div class="features_items"><!--features_items-->
						<h2 class="title text-center">Features Items</h2>
						<div class="col-md-12">
							<div class="search_box pull-right">
								<form action="#" method="POST">
									<input type="text" name="search_box" placeholder="Search"/>
									<input  type="hidden" class="btn btn-primary" name="search">
								</form>
							</div>
							</br></br>
						</div>
						<?php
							require_once "config.php";
							
							if(isset($_GET["id"])){
								$categoryName = $_GET["id"];
								$sql ="SELECT * FROM products WHERE Category='$categoryName' order by P_Id desc";
								$result = mysql_query($sql);
							}
							else{
								$sql ="SELECT * FROM products";
								
								if (isset($_POST['search'])){
									$search_term = $_POST['search_box'];
									$sql .= " WHERE P_Name LIKE '%{$search_term}%'";
									
								}
								
								$result = mysql_query($sql);
							}
							if(mysql_num_rows($result) == 0){
								echo '<div class="col-sm-4">
										<h2>No Item Found</h2>
									</div>';
							}else{
								while($row=mysql_fetch_array($result))
								{
									$url2="product-details.php?id=".$row["P_Id"];
									
									echo '<div class="col-sm-4">
											<div class="product-image-wrapper">
												<div class="single-products">
														<div class="productinfo text-center">
															<img src="'.$row["Image"].'" alt="" width="200" height="260" />
															<h2>'.$row["Price"].'</h2>
															<p>'.$row["P_Name"].'</p>
															<a href="'.$url2.'" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
														</div>
												</div>
												<div class="choose">
													<ul class="nav nav-pills nav-justified">
														<li><a href="#"><i class="fa fa-plus-square"></i>Add to wishlist</a></li>
														<li><a href="#"><i class="fa fa-plus-square"></i>Add to compare</a></li>
													</ul>
												</div>
											</div>
										</div>';
								}
							}
							
						?>
					</div><!--features_items-->
					
				</div>
			</div>
		</div>
	</section>
	
	<?php include('footer.php');?> <!--Footer-->
	
    <script src="js/jquery.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.scrollUp.min.js"></script>
	<script src="js/price-range.js"></script>
    <script src="js/jquery.prettyPhoto.js"></script>
    <script src="js/main.js"></script>
</body>
</html>
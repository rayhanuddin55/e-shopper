<?php
	session_start();
	if($_SESSION["Type"] == "admin"){
		
	}
	else{
		header('location:login.php');
	}
	
?>

<?php
	$id=$_GET['id'];
	require_once "config.php";
	
	$result = "Delete from users where Id='$id'";
	$query = mysql_query($result);
	
	header('Location: userList.php');
?>
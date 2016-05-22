<?php
	$id=$_GET['id'];
	require_once "config.php";
	
	$result = "Delete from orders where O_Id='$id'";
	$query = mysql_query($result);
	
	header('Location: ' . $_SERVER['HTTP_REFERER']);
?>
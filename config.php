<?php 
	$username = "root";
	$password = "";
	$hostname = "localhost"; 
	$db = mysql_connect($hostname, $username, $password)  or die("Unable to connect to MySQL, config file");
	$con = mysql_select_db("ecommerce",$db) or die("Could not select examples, config file");
?>
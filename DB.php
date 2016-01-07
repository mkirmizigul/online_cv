<?php

function connection(){

	$servername = "localhost";
	$username = "root";
	$password = "root";
	
	//$username = "ozgecmis";
	//$password = "ozgecmis";

	$conn = new PDO("mysql:host=$servername;dbname=ozgecmis;charset=utf8", $username, $password);
	// set the PDO error mode to exception
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	return $conn;
}
<?php
	session_start();

    //Connect to db
	include 'Connector.php';

	if ($_SERVER["REQUEST_METHOD"] == "POST"){
		$T_username=$_POST["username"];
		$T_password=$_POST["password"];
		$username= mysqli_real_escape_string($conn,$T_username);
		$password= mysqli_real_escape_string($conn,$T_password);

    $query = "SELECT * FROM users WHERE username ='$username' ";
    $result = mysqli_query($conn, $query);
	$num_rows=mysqli_num_rows($result);//number of rows returned to see if there is the user or not

	if ($num_rows === 1){
		$row = mysqli_fetch_assoc($result);//fetch a result row as an associative array
		
	}
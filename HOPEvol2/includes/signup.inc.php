<?php

session_start();

// function alertBox($message) {

//     echo "<script>alert('$message');</script>";
// }

include 'config.inc.php';


$temp_username = $_POST['username'];
$temp_email = $_POST['email'];
$temp_password = $_POST['password'];


$username = mysqli_real_escape_string($conn, $temp_username);// escape string before passing it to query.
$email = mysqli_real_escape_string($conn, $temp_email);//string in characters that can be read by sqli
$password = mysqli_real_escape_string($conn, $temp_password);

$sql="SELECT username,email FROM users WHERE username = '$username' or email = '$email'" ;
$result = mysqli_query($conn,$sql);
$userexists = mysqli_num_rows($result);

if($userexists != 0){
    echo 1;
    } 
    else {
    $hashpass= password_hash($password,PASSWORD_DEFAULT);
    $insert = "INSERT into users(username,email,password,role) VALUES ('$username','$email','$hashpass','0')";
    mysqli_query($conn,$insert);//gia na ginei to insert stin db
    echo 0;
}
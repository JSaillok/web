<?php
session_start();
include "config.inc.php";
//post ajax
if(isset($_SESSION['id'])){
  $username = $_POST['username'];
  $oldPassword = $_POST['oldPassword'];
  $newPassword = $_POST['newPassword'];
  $id = $_SESSION['id'];
  echo $id;

  //user credentials from db
  $sql = "SELECT id, username, password FROM users WHERE id = '$id'";

  $test = mysqli_query($conn,$sql); 
  //
  if(mysqli_num_rows($test) > 0){
    while($row = mysqli_fetch_assoc($test)){
      $user_pass = $row['password'];
      $user_name = $row['username'];
      $user_id = $row['id'];
      echo $user_pass;
      echo $user_name;
      echo $user_id;
    }
  }
  else echo 'shit';

  //check if username exists
  $exists = mysqli_query($conn,"SELECT username FROM users WHERE username ='$username'");

  if(mysqli_num_rows($exists)==0){//if username is new
    if(password_verify($oldPassword, $user_pass)){
      $pass = password_hash($newPassword, PASSWORD_DEFAULT);
      mysqli_query($conn,"UPDATE users SET username = '$username', password ='$pass' WHERE id = '$id'");
      echo "Old Password Match";
    }
    else{
      echo "Old Password Wrong";
    }
  } 
  elseif(mysqli_num_rows($exists)!==0 && $id == $user_id){//if username is old change only password
    $pass = password_hash($password,PASSWORD_DEFAULT);
    mysqli_query($conn,"UPDATE users SET password = '$pass' WHERE id = '$id'");
    echo "Only Password changed";
  }

}
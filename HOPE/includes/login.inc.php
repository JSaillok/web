<?php 
require_once "config.inc.php";
require_once "functions.inc.php";

if(isset($_POST["submit"])){
   $usernameOrEmail = mysqli_real_escape_string($conn, $_POST["usernameOremail"]);
   $password = mysqli_real_escape_string($conn, $_POST["password"]);

   

   //ERROR HANDLERS
   //anything else than FALSE
   if(emptyInputLogin($usernameOrEmail, $password) !== FALSE){
      //sending back the user to the login page with information inside the url 
      //if error = empty input then the user did not type sth in the form
      //error goes back to the location URL 
      header("location: ../login.php?error=emptyinput");
      exit();
   }

   loginUser($conn, $usernameOrEmail, $password);
}
else{
   header("location: ../login.php");
   exit();
}

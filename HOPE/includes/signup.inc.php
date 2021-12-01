<?php
//if submit button is clicked form html
//PHP $_POST is a PHP super global variable which is used to collect form data after submitting an HTML form with method="post".
if (isset($_POST['submit'])){
   // echo"Good!";
   $username = $_POST['username'];
   $email = $_POST['email'];
   $password = $_POST['password'];
   $cpassword = $_POST['cpassword'];

   //ERROR HANDLING
   require_once "config.inc.php";
   require_once "functions.inc.php";

   //anything else than FALSE
   if(emptyInputSignup($username, $email, $password, $cpassword) !== FALSE){
      //sending back the user to the signup page with information inside the url 
      //if error = empty input then the user did not type sth in the form
      //error goes back to the location URL 
      header("location: ../signup.php?error=emptyinput");
      exit();
   }

   if(invalidUsername($username) !== FALSE){
      //check if username consists of valid characters a-z A-Z 0-9
         header("location: ../signup.php?error=invalidUsername");
         exit();
   }
   if(invalidEmail($email) !== FALSE){
      //check if email is in the right formation
      header("location: ../signup.php?error=invalidEmail");
      exit();
   }
   if(invalidPwd($password) !== FALSE){
      header("location: ../signup.php?error=invalidPassword");
      exit();
   }
   if(passwordMatch($password, $cpassword) !== FALSE){
      //confirm matching passwords
      header("location: ../signup.php?error=passwordsUnmached");
      exit();
   }
   if(userExists($conn, $username, $email) !== FALSE){
      //checking if username or email already exists
      header("location: ../signup.php?error=usernameTaken");
      exit();
   }
   
   //IF EVERYTHING IS CORRECT
   createUser($conn, $username, $email, $password);
}
else{
   //go to location
   header("location: ../signup.php");
   exit();
}
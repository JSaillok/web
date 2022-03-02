<?php
include "config.inc.php";
include "functions.inc.php";

// session_start();

$response = array(
    'status'=> 1,
    'message'=>'Form sumbission Failed'
);

if(isset($_POST['username']) && ($_SERVER["REQUEST_METHOD"] == "POST")){

    $usernameOrEmail = $_POST['username'];
    $password = $_POST['password'];
	
		//anything else than FALSE
   if(emptyInputLogin($usernameOrEmail, $password) !== FALSE){
		 $response['message'] = " Fill in all the fields!"; 
	 }
	 else{
		 $login = loginUser($conn, $usernameOrEmail, $password);
		 if($login == FALSE){
			 	$response['message'] = "Wrong username/email or password!";
		 }
		 else{ 
			 session_start();
        $_SESSION["id"] = $login["id"];
        $_SESSION["username"] = $login["username"];
        $_SESSION["role"] = $login["role"];
			 	
        $response['status'] = 0;

				if ($_SESSION["role"] ==  0)
					$response['message'] ="User!";
         else 
					 $response['message'] ="Admin!";
		 	}
	 	}
}
// echo $_SESSION['id'];
echo json_encode($response);
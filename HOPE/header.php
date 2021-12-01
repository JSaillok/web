<?php 
   session_start()
?>
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link href="css/style.css" rel="stylesheet" type="text/css">
   <link href="css/reset.css" rel="stylesheet" type="text/css">
   <title>Document</title>
</head>
<body>
   <nav>
      <div class="wrapper">
         <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="1.php"></a>About1</li>
            <li><a href="2.php"></a>About2</li>
            <?php 
            if (isset($_SESSION["id"])){
               echo "<li><a href='profile.php'>Profile Page</a></li>";
               echo "<li><a href='includes/logout.inc.php'>Log Out</a></li>";
            }
            else{
               echo "<li><a href='signup.php''>Sign Up</a></li>";
               echo "<li><a href='login.php'>Log In</a></li>";
            }
            ?>
         </ul>
      </div>
   </nav>
   
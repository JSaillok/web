<?php 
   session_start()
?>
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
   <link href="css/index.css" rel="stylesheet" type="text/css">
   <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css"
   integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A=="crossorigin=""/>
   <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"
   integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA=="crossorigin=""></script>
   <title>Index</title>
</head>
<body>
   <nav>
      <label class="logo">Covid Maps</label>
      <ul class="nav-links">
         <li><a  href="index.php">Home</a></li>
         <li><a  href="maps.php">Maps</a></li>
         <li><a  href="graphs.php">Graphs</a></li>
         <?php 
         if (isset($_SESSION["id"])){
         echo "<li><a href='profile.php'>Profile</a></li>";
         echo "<li><a href='includes/logout.inc.php'>Log Out</a></li>";
         }
         else{
            echo "<li><a href='signup.php''>Sign Up</a></li>";
            echo "<li><a href='login.php'>Log In</a></li>";
         }
         ?>
      </ul> 
      <label id="icon">
         <i class="fas fa-bars"></i>
      </label>  
   </nav>
   <script src="scripts/navtoggle.js"></script>
</body>

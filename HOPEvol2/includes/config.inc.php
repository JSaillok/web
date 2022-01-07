<?php
$SERVER = "localhost";
$DB_USERNAME = "root";
$DB_PASSWORD = "";
$DB_NAME = "covid_19";

$conn = mysqli_connect($SERVER,$DB_USERNAME, $DB_PASSWORD, $DB_NAME) or die("Connection failed");

if(!$conn){
   echo ("Connection failed: " . PHP_EOL );
   echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
   echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
   exit;
}
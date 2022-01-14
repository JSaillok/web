<?php
include "config.inc.php";
session_start();

$user_id = $_SESSION['id'];
$date = date("Y-m-d H:i:s", strtotime($_POST["date"]));
echo $user_id;
echo $date;


<?php 
include "config.inc.php";
if (isset($_POST["q"])){
$EST = $_POST["q"];
$EST = mysqli_real_escape_string($conn, $EST);

$result_array = array();
if ($conn->connect_error) {
      die("Connection to database failed: " . $conn->connect_error);
}
/* SQL query to get results from database */
$sql = "SELECT id, name, address, lat, lng, rating, n_rating, types
FROM pois WHERE types LIKE '%".$Oti."%';";
// $sql = "SELECT * FROM users;";
$result = $conn->query($sql);
/* If there are results from database push to result array */
if ($result->num_rows > 0) {
      while($row = $result->fetch_assoc()) {
      array_push($result_array, $row);
      }
}

/* send a JSON encded array to client */
// header('Content-type: application/json');
echo json_encode($result_array);}


// echo (gettype($result_array));
// echo (gettype($data));
// echo $data;
// echo (gettype($data));
$conn->close();
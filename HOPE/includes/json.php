<?php
include "config.inc.php";

$filename = "starting_pois.json";
$data = file_get_contents($filename);
// echo $data;
$json = json_decode($data, true);
$array = [];
// $i = 0;

foreach($json as $x ) {
   //146 times
   echo $x["id"]."<br/>";
   echo $x["name"]."<br/>";
   echo $x["address"]."<br/>";
   array_push($array,$x["types"]);
   echo implode(" ",$x["types"]);
   echo "<br/>";
   foreach($x["types"] as $type => $value){
      //146xtypes times
      // echo count($x["types"]);
      echo $value.", ";
      if (!in_array($value,$array)){
         
      }
   } 
   echo "<br/>";
   echo $x["coordinates"]["lat"]."<br/>";
   echo $x["coordinates"]["lng"]."<br/>";
   echo $x["rating"]."<br/>";
   echo $x["rating_n"]."<br/>";
   foreach($x["populartimes"] as $elem)  {
      //146x2
   echo( $elem['name']. " : " );
      if($elem['name'] == "Monday"){
         // echo count($elem['data']);
         $sql = "INSERT INTO monday VALUES ('".$x["id"]."'";
         foreach($elem['data'] as $p => $value ) {
            echo($value. ",");
            $sql = $sql . ",'".$value."'";
         }
         $sql = $sql . ");";
         echo $sql;
         mysqli_query($conn, $sql);
      }
      if($elem['name'] == "Tuesday"){
         // echo count($elem['data']);
         
         $sql = "INSERT INTO tuesday VALUES ('".$x["id"]."'";
         foreach($elem['data'] as $p => $value ) {
            echo($value. ",");
            $sql = $sql . ",'".$value."'";
         }
         $sql = $sql . ");";
         echo "<br/>";
         echo $sql;
         mysqli_query($conn, $sql);
      }
      if($elem['name'] == "Wednesday"){
         // echo count($elem['data']);
         $sql = "INSERT INTO wednesday VALUES ('".$x["id"]."'";
         foreach($elem['data'] as $p => $value ) {
            echo($value. ",");
            $sql = $sql . ",'".$value."'";
         }
         $sql = $sql . ");";
         echo $sql;
         mysqli_query($conn, $sql);
      }
      if($elem['name'] == "Thursday"){
         // echo count($elem['data']);
         $sql = "INSERT INTO thursday VALUES ('".$x["id"]."'";
         foreach($elem['data'] as $p => $value ) {
            echo($value. ",");
            $sql = $sql . ",'".$value."'";
         }
         $sql = $sql . ");";
         echo $sql;
         mysqli_query($conn, $sql);
      }
      if($elem['name'] == "Friday"){
         // echo count($elem['data']);
         $sql = "INSERT INTO friday VALUES ('".$x["id"]."'";
         foreach($elem['data'] as $p => $value ) {
            echo($value. ",");
            $sql = $sql . ",'".$value."'";
         }
         $sql = $sql . ");";
         echo $sql;
         mysqli_query($conn, $sql);
      }
      if($elem['name'] == "Saturday"){
         // echo count($elem['data']);
         $sql = "INSERT INTO saturday VALUES ('".$x["id"]."'";
         foreach($elem['data'] as $p => $value ) {
            echo($value. ",");
            $sql = $sql . ",'".$value."'";
         }
         $sql = $sql . ");";
         echo $sql;
         mysqli_query($conn, $sql);
      }
      if($elem['name'] == "Sunday"){
         // echo count($elem['data']);
         $sql = "INSERT INTO sunday VALUES ('".$x["id"]."'";
         foreach($elem['data'] as $p => $value ) {
            echo($value. ",");
            $sql = $sql . ",'".$value."'";
         }
         $sql = $sql . ");";
         echo $sql;
         mysqli_query($conn, $sql);
      }
   echo "<br/>";
}
// echo $i++;
echo "<br/>";
}

foreach ($json as $array) {
$sql = "INSERT INTO pois(id, name, address, lat, lng, rating, n_rating, types) VALUES ('".$array["id"]."','".$array["name"]."','".$array["address"]."','".$array["coordinates"]["lat"]."','".$array["coordinates"]["lng"]."','".$array["rating"]."','".$array["rating_n"]."','".implode(" ",$array["types"])."')";
mysqli_query($conn, $sql);
}

print_r($array);
// echo "data inserted!"
?>
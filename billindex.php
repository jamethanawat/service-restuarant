<?php
header("Access-Control-Allow-Origin: *");
// include database connection

$bill=$_GET["bill"];

include 'connect.php';

// delete message prompt will be here

// select all data

  //$query = "SELECT Name FROM member where UserID = $id";
  $query = "SELECT * FROM `bill` WHERE Bill =$bill";
$stmt = $con->prepare($query);
$stmt->execute();
$results = $stmt->fetchAll(PDO::FETCH_ASSOC);
$json = json_encode($results);
echo $json;
?>

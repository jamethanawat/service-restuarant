<?php
header("Access-Control-Allow-Origin: *");
// include database connection


include 'connect2.php';

// delete message prompt will be here

// select all data

  //$query = "SELECT Name FROM member where UserID = $id";
  $query = "SELECT * FROM product";
$stmt = $con->prepare($query);
$stmt->execute();
$results = $stmt->fetchAll(PDO::FETCH_ASSOC);
$json = json_encode($results);
echo $json;
?>

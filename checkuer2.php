<?php
header("Access-Control-Allow-Origin: *");
// include database connection



include 'connect.php';

// delete message prompt will be here

// select all data
$username='aa';
$password='1';
  //$query = "SELECT Name FROM member where UserID = $id";
  $query = "SELECT Name FROM usert WHERE username = '$username' and password = '$password' ";
$stmt = $con->prepare($query);
$stmt->execute();
$results = $stmt->fetchAll(PDO::FETCH_ASSOC);
$json = json_encode($results);
echo $json;
?>

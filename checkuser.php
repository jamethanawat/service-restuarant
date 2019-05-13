<?php
header("Access-Control-Allow-Origin: *");
// include database connection



include 'connect.php';

// delete message prompt will be here

// select all data
$username=$_GET["name"];
$password=$_GET["pass"];
  //$query = "SELECT Name FROM member where UserID = $id";
  $query = "SELECT Name,username FROM user WHERE username = '$username' and password = '$password' ";
$stmt = $con->prepare($query);
$stmt->execute();
$results = $stmt->fetchAll(PDO::FETCH_ASSOC);
$json = json_encode($results);
echo $json;
?>

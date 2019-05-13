<?php
header("Access-Control-Allow-Origin: *");
// include database connection

$user=$_GET["user"];

include 'connect.php';

    $query = "SELECT * FROM `user` where username ='$user'";
    $stmt = $con->prepare($query);
    $stmt->execute();
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $json = json_encode($results);
    echo $json;
  

?>

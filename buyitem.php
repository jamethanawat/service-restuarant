<?php
header('Access-Control-Allow-Origin: *');

// include database connection
$bill=$_GET["bill"];
$id=$_GET["id"];
$name=$_GET["name"];
$unit=1;
$price=$_GET["price"];

$user=$_GET["user"];
date_default_timezone_set("Asia/Bangkok");
date_default_timezone_get();

$date=date('Y-m-d H:i:s');

//$tag=$_SERVER['REQUEST_URL'];

//echo "hello";
include 'connect.php';

if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
} 
$sql = "INSERT INTO bill (Bill,Id_product,Name_product ,Unit,Price,Date,User)
VALUES ($bill,$id, '$name', $unit,$price,'$date','$user')";
// $sql = "INSERT INTO bill (Id_product,Name_product ,Unit,Price,Status,Date,User)
// VALUES (1, 'ss', 1,123,'s','123','123')";
if ($con->query($sql) == TRUE) {
    echo "Buy product successfully";
} else {
    echo "Error: " . $sql . "<br>" . $con->error;
}

?>

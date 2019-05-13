<?php
header('Access-Control-Allow-Origin: *');

// include database connection

$name=$_GET["name"];
$lastname=$_GET["lastname"];
$email=$_GET["email"];
$phone=$_GET["phone"];
$user=$_GET["user"];
$pass=$_GET["pass"];

//echo "hello";
include 'connect.php';
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
} 
$items = strval($id);
$sql = "INSERT INTO user (Name,lastname,email,Telephone,username,password)
VALUES ('$name', '$lastname', '$email','$phone','$user','$pass')";

if ($con->query($sql) == TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

?>

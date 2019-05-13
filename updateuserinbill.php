<?php
header('Access-Control-Allow-Origin: *');

// include database connection



include 'connect.php';
//echo "id->",$id;

$id=$_GET["id"];
 $name=$_GET["name"];

if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
} 

$sql = "UPDATE `bill` SET User='$name' WHERE User='$id'" ;


if ($con->query($sql) == TRUE) {
    echo "Update User In Bill Successfully";
} else {
    echo "Error: " . $sql . "<br>" . $con->error;
}

?>

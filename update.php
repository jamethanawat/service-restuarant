<?php
header('Access-Control-Allow-Origin: *');

// include database connection
$id=$_GET["id"];
$name=$_GET["name"];
$sp=$_GET["sp"];
$tys=$_GET["tys"];
$price=$_GET["price"];
$ty=$_GET["ty"];
$im=$_GET["im"];


include 'connect.php';
//echo "id->",$id;


if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
} 

$sql = "UPDATE product SET Name='$name', Spreed=$sp,Type_s='$tys',Price=$price,Type='$ty',Images='$im' WHERE Product_id=$id" ;


if ($con->query($sql) == TRUE) {
    echo "Update menu successfully";
} else {
    echo "Error: " . $sql . "<br>" . $con->error;
}

?>

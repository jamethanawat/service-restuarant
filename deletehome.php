<?php
header('Access-Control-Allow-Origin: *');

// include database connection

$id=$_GET["id"];


//$tag=$_SERVER['REQUEST_URL'];

//echo "hello";
include 'connect.php';
//echo "id->",$id;


$sql = "DELETE FROM home WHERE Id=$id";

if ($con->query($sql) == TRUE) {
    echo "Record deleted successfully";
} else {
    echo "Error deleting record: " . $con->error;
}

?>

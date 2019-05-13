<?php
header('Access-Control-Allow-Origin: *');

// include database connection
$id=$_GET["id"];



include 'connect.php';
//echo "id->",$id;


if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
} 

$sql = "UPDATE bill SET Status='Yes' WHERE Bill=$id" ;


if ($con->query($sql) == TRUE) {
    echo "Update Bill Status Successfully";
} else {
    echo "Error: " . $sql . "<br>" . $con->error;
}

?>

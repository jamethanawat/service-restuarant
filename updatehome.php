<?php
header('Access-Control-Allow-Origin: *');

// include database connection
$id=$_GET["id"];
$ima=$_GET["ima"];
$header=$_GET["header"];
$index=$_GET["index"];
$text=$_GET["text"];



include 'connect.php';
//echo "id->",$id;


if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
} 

$sql = "UPDATE home SET Images='$ima', Header='$header',Text='$text',Numorder=$index WHERE Id=$id" ;


if ($con->query($sql) == TRUE) {
    echo "Update Home successfully";
} else {
    echo "Error: " . $sql . "<br>" . $con->error;
}

?>

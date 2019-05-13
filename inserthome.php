<?php
header('Access-Control-Allow-Origin: *');

// include database connection

$ima=$_GET["ima"];
$header=$_GET["header"];
$index=$_GET["index"];
$text=$_GET["text"];



include 'connect.php';
//echo "id->",$id;


if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
} 

$sql = "INSERT INTO  home (Numorder,Images,Header,Text) values($index,'$ima','$header','$text')";


if ($con->query($sql) == TRUE) {
    echo "Insert Home Successfully";
} else {
    echo "Error: " . $sql . "<br>" . $con->error;
}

?>

<?php
header('Access-Control-Allow-Origin: *');

// include database connection

$name=$_GET["name"];
$sp=$_GET["sp"];
$tys=$_GET["tys"];
$price=$_GET["price"];
$ty=$_GET["ty"];
$im=$_GET["im"];

//$tag=$_SERVER['REQUEST_URL'];
echo $id;
//echo "hello";
include 'connect.php';
//echo "id->",$id;


//$method = $_SERVER['REQUEST_METHOD'];
//$request = explode('/', trim($_SERVER['PATH_INFO'],'/'));
//$input = file_get_contents('php://input');
//$value=json_decode($input);
//print_r($value);
//print_r("name==",$input['name']);
//print_r("name==",$input->name);

// Check connection
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
} 
$items = strval($id);
$sql = "INSERT INTO product (Name, Spreed,Type_s,Price,Type,Images)
VALUES ('$name', $sp, '$tys',$price,'$ty','$im')";

if ($con->query($sql) == TRUE) {
    echo "Insert to menu successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

?>

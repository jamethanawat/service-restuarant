<?php
header('Access-Control-Allow-Origin: *');

// include database connection
$id=$_GET["id"];
$name=$_GET["name"];
$lastname=$_GET["lastname"];
$email=$_GET["email"];
$phone=$_GET["phone"];
$user=$_GET["user"];
$pass=$_GET["pass"];




include 'connect.php';
//echo "id->",$id;


if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
} 

$sql = "UPDATE user SET  Name='$name', lastname='$lastname', email='$email',Telephone='$phone',username='$user',password='$pass' WHERE username='$id'" ;


if ($con->query($sql) == TRUE) {
    echo "Update User Successfully";
} else {
    echo "Error: " . $sql . "<br>" . $con->error;
}

?>

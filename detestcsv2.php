<?php
header('Access-Control-Allow-Origin: *');

// include database connection

$id=$_GET["id"];
$connect = mysqli_connect("localhost","id9411788_test2","12345678","id9411788_test2");


$sql = "DELETE FROM test3 WHERE b=$id";

// if ($con->query($sql) == TRUE) {
//     echo "Record deleted successfully";
// } else {
//     echo "Error deleting record: " . $con->error;
// }
if(mysqli_query($connect,  $sql ))
        {
           
            swal("Deleted!", "Your imaginary file has been deleted.", "success");
                echo "Record deleted successfully";
            } else {
               echo "Error deleting record: " . $connect->error;
              
                swal("error :)", "error");
            }
?>

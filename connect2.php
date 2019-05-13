<?php
header("Access-Control-Allow-Origin: *");
header("Content-type: application/json", true);	
$type = $_GET['type'];
$conn=mysqli_connect("localhost","id9411788_test2","12345678","id9411788_test2");
if(!$conn){
    echo "not connect";

}
else{
    // echo "connect success";
  
    mysqli_query("SET NAMES utf8");
    
    
$sql = "SELECT * FROM test where type like upper('%$type%') or type like lower('%$type%')";
$result = $conn->query($sql);
$json_return = array();
if ($result->num_rows > 0) {
    // output data of each row

    while($row = $result->fetch_assoc()) {
       array_push($json_return, 
       array(
           "Date" => $row["date"],
           "Name" => $row["name"],
           "Type" => $row["type"],
           "Province" => $row["province"],
    
       
       )
   );
       
    }
    echo json_encode($json_return);
} else {
    echo "dont have value";
}
}

?>

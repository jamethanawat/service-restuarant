<?php
// header("Access-Control-Allow-Origin: *");
// // include database connection
// $user=$_GET['user'];
// //   $query = "SELECT Id_Bill FROM bill where Status='No' order by Id_Bill DESC LIMIT 1" ;
// // $stmt = $con->prepare($query);
// // $stmt->execute();
// // $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
// // $json = json_encode($results);
// // echo $json;

// if (!$link = mysql_connect('localhost', 'root', '12345678')) {
//     echo 'Could not connect to mysql';
//     exit;
// }

// if (!mysql_select_db('restaurantabc', $link)) {
//     echo 'Could not select database';
//     exit;
// }


// $sql =  "SELECT Bill FROM bill where Status like'No'and User like $user order by Id_Bill DESC LIMIT 1" ;
// $result = mysql_query($sql, $link);

// if (!$result) {
//     echo "DB Error, could not query the database\n";
//     echo 'MySQL Error: ' . mysql_error();
//     exit;
// }

// while ($row = mysql_fetch_assoc($result)) {
//     echo $row['Bill'];
// }

// mysql_free_result($result);

header("Access-Control-Allow-Origin: *");
// include database connection



include 'connect.php';

// delete message prompt will be here

// select all data

$user=$_GET['user'];
 
  //$query = "SELECT Name FROM member where UserID = $id";
  $query = "SELECT Bill FROM bill where Status like'No'and User like '$user' order by Id_Bill DESC LIMIT 1" ;
$stmt = $con->prepare($query);
$stmt->execute();



  $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
$json = json_encode($results);
echo $json;

// if(empty($results )){

 
//   $myObj= new \stdClass();
//    $myObj->Bill = "New York";
//    //$results = $myObj->fetchAll(PDO::FETCH_ASSOC);
//   $json1 = json_encode( $myObj);
//   echo $json1;
// }
//   else{
//     echo $json;
//   }

 


?>

<?php
header("Access-Control-Allow-Origin: *");
// include database connection

$user=$_GET["user"];
$bill=$_GET["bill"];
include 'connect.php';

// delete message prompt will be here

// select all data

  //$query = "SELECT Name FROM member where UserID = $id";
  if($user=="admin"){
    $query = "SELECT Bill,sum(price)As Total,CASE 
    WHEN User !='user' THEN (sum(price)*0.10)
    ELSE 0
 END AS Discount 
,substring(Date,1,10) as Date,Status,User FROM `bill` GROUP by Bill ORDER by Id_Bill Desc";
    $stmt = $con->prepare($query);
    $stmt->execute();
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $json = json_encode($results);
    echo $json;
  }
//   else{
//      $query = "SELECT Bill,sum(price)As Total ,substring(Date,1,10) as Date,Status,User FROM `bill` WHERE Bill =$bill GROUP by Bill ORDER by Id_Bill Desc";
// $stmt = $con->prepare($query);
// $stmt->execute();
// $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
// $json = json_encode($results);
// echo $json;
//   }
else{
  $query = "SELECT Bill,sum(price)As Total,CASE 
         WHEN User !='user' THEN (sum(price)*0.10)
         ELSE 0
      END AS Discount
      
  ,substring(Date,1,10) as Date,Status,User FROM `bill` WHERE Bill =$bill GROUP by Bill ORDER by Id_Bill Desc";
$stmt = $con->prepare($query);
$stmt->execute();
$results = $stmt->fetchAll(PDO::FETCH_ASSOC);
$json = json_encode($results);
echo $json;
}
?>

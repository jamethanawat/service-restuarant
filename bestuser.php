<?php
header("Access-Control-Allow-Origin: *");
// include database connection

// $user=$_GET["user"];
// $bill=$_GET["bill"];
include 'connect.php';
date_default_timezone_set("Asia/Bangkok");
date_default_timezone_get();

$date=date('Y-m-d H:i:s');
$m=substr($date,0,7);

//echo $m;
    $query = "SELECT sum(Price) AS sum,user FROM `bill` where Date like '$m%' and user!='user'GROUP by user order by sum Desc limit 5";
    $stmt = $con->prepare($query);
    $stmt->execute();

    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    // print_r ($results); 
    $json = json_encode($results);
    echo $json;
 
?>

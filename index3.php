<?php 
// use Dialogflow\WebhookClient;

header('Content-type: application/json');
$method = $_SERVER['REQUEST_METHOD'];

// Process only when method is POST
if($method == 'POST'){
	// $requestBody = file_get_contents('php://input');
    // $json = json_decode($requestBody,true);
    $json = json_decode(file_get_contents('php://input'), true); 
    $text = $json['queryResult']['parameters']['text'];
    
	$conn=mysqli_connect("localhost","id9411788_test2","12345678","id9411788_test2");
	// mysqli_query("SET NAMES utf8");
	// $sql = "SELECT * FROM test where type like upper('%$text%') or type like lower('%$text%')";
	$sql = "SELECT * FROM test where type like '%$text%'";
	$result2 = $conn->query($sql);
    function sendMessage($parameters) {
        header('Content-Type: application/json');
        $data = str_replace('\/','/',json_encode($parameters));
        echo $data;
    }
    
if ($result2->num_rows > 0) {
    // output data of each row
   $i=0;
    while($row = $result2->fetch_assoc()) {
		
			$speech='งาน'.$row["name"].' วันที่'.$row["date"].' จังหวัด'.$row["province"];
		
            // sendMessage(array(
            //     "fulfillmentText" =>(string)$speech,
                
            // ));
          

             $data = str_replace('\/','/',json_encode(array("fulfillmentText" =>$speech)));
             echo $data;
            
    }
} else {
    echo "dont results";
}
    
    
}
else
{
	echo "Method not allowed";
}

?>
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
    
   
	switch ($text) {
		// case 'hi':
		// 	$speech = "Hi, Nice to meet you";
		// 	break;

        //     case '123':
		// 	$speech = "Hi, Nice to meet you";
		// 	break;
		// case 'bye':
		// 	$speech = "Bye, good night";
		// 	break;

		// case 'anything':
		// 	$speech = "Yes, you can type anything here.";
		// 	break;
		
		// default:
		// 	$speech = "Sorry, I didnt get that. Please ask me something else.";
        // 	break;
      

       
	}
	$conn=mysqli_connect("localhost","id9411788_test2","12345678","id9411788_test2");
	// mysqli_query("SET NAMES utf8");
	// $sql = "SELECT * FROM test where type like upper('%$text%') or type like lower('%$text%')";
	$sql = "SELECT * FROM test where type like '%$text%'";
	$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
   $i=0;
    while($row = $result->fetch_assoc()) {
		if($i==0){
			$speech='งาน'.$row["name"].' วันที่'.$row["date"].' จังหวัด'.$row["province"];
		}
		else{
			
		// 	$str=" \n\n".'งาน'.$row["name"].' วันที่'.$row["date"].' จังหวัด'.$row["province"];
		// 	$new_str = str_replace("&nbsp;", '', $str);
			
		// $speech=$speech.trim($str, "\xC2\xA0");
		
			
			
		$speech=$speech." \n\n".'งาน'.$row["name"].' วันที่'.$row["date"].' จังหวัด'.$row["province"];
		}
		$i++;
        
     
    }
} else {
    echo "dont results";
}
    
    //  $speech = "Hi2, Nice to meet you"+"\n\n"+"Hi3, Nice to meet you";

    // sendMessage(array(
    //     "source" => $update["result"]["source"],
    //     "speech" => "Hello from webhook",
    //     "displayText" => "Hello from webhook",
    //     "contextOut" => array()
    // ));

    
// function sendMessage($parameters) {
//     echo json_encode($parameters);
// }
function sendMessage($parameters) {
    header('Content-Type: application/json');
    $data = str_replace('\/','/',json_encode($parameters));
    echo $data;
}
sendMessage(array(
    // "speech" => "I am not able to understand. what do you want ?",
    "fulfillmentText" =>(string)$speech,
    

));


// $json->reply('Hi, how can I help?');
// echo json_encode($json->render());
	// $response = new \stdClass();
	// $response->speech = $speech;
	// $response->displayText = $speech;
	// $response->source = "webhook";
	// echo json_encode($response);
}
else
{
	echo "Method not allowed";
}

?>
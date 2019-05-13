<?php require_once('phpmailer/PHPMailerAutoload.php');?>
<?php
header('Content-Type: text/html; charset=utf-8');

$mail = new PHPMailer;
$mail->CharSet = "utf-8";
$mail->isSMTP();
$mail->Host = 'smtp.gmail.com';
$mail->Port = 587;
$mail->SMTPSecure = 'tls';
$mail->SMTPAuth = true;


$gmail_username = "jamee.tthanawat@gmail.com"; // gmail ที่ใช้ส่ง
$gmail_password = "jaMe4786985"; // รหัสผ่าน gmail
// ตั้งค่าอนุญาตการใช้งานได้ที่นี่ https://myaccount.google.com/lesssecureapps?pli=1
$servername = "localhost";
$username = "root";
$password = "12345678";
$dbname = "restaurantabc";
$bill="4553872";
$txttd="";
$price=0;
$discount=0;
$total=0;
$name="";
$tel="";
$textmail="";
$datebill="4553872";
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
$sql = "SELECT * FROM Bill where Bill='$bill'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    $i=1;
    while($row = $result->fetch_assoc()) {
        $txttd.="<tr><td align='center'>".$i."</td><td align='center'>".$row["Name_product"]."</td><td align='center'>1</td><td align='center'>" .$row["Price"]."</td></tr>";
        
        $i++;
    }
} else {
    echo "0 results";
}

$sql2 = "SELECT sum(price)As Total,CASE 
    WHEN User !='user' THEN (sum(price)*0.10)
    ELSE 0
 END AS Discount 
FROM `bill` where Bill='$bill'GROUP by Bill";
$result2 = $conn->query($sql2);

if ($result2->num_rows > 0) {
    // output data of each row
  
    while($row = $result2->fetch_assoc()) {
        $price=$row["Total"];
        $discount=$row["Discount"];
        $total=$price-$discount;
      
    }
} else {
    echo "0 results";
}
$sender = "ABC-Restaurant"; // ชื่อผู้ส่ง
$email_sender = "noreply@ibsone.com"; // เมล์ผู้ส่ง 
$email_receiver = "thanawat17810@gmail.com"; // เมล์ผู้รับ ***

$subject = "Bill From ABC-Restaurant"; // หัวข้อเมล์


$mail->Username = $gmail_username;
$mail->Password = $gmail_password;
$mail->setFrom($email_sender, $sender);
$mail->addAddress($email_receiver);
$mail->Subject = $subject;

$email_content = "
<!DOCTYPE html>
<html>
<style>
    table,
    th,
    td {
        border: 1px solid black;
        border-collapse: collapse;

    }

    div.tab {
        position:relative;
        left: 1000px;
    }
</style>

<head>
    <meta charset=utf-8 />
    <title>ทดสอบการส่ง Email$</title>
</head>

<body>
    <h1
        style='background: #3b434c;padding: 10px 0 20px 10px;margin-bottom:10px;font-size:30px;color:rgba(247, 245, 245, 0.911);'>
        <img src='https://cdn1.iconfinder.com/data/icons/food-vol-2/48/052-512.png' style='width: 80px;'>
        ABC-Restaurant
    </h1>

    <div style='padding:50px;'>
	<P>Name : {$name}/P>
	<P>Tel : {$tel}</P>
	<P>E-Mail :{$textmail} </P>
	<hr>
	<P>DateBill : {$datebill}</P>
	<P>Bill : {$bill}</P>
    </div>
    <div style='padding:20px;'>
		<table align='center' width='800'>
            <tr>
                <th align='center'>Order</th>
                <th align='center'>NameProduct</th>
                <th align='center'>Unit</th>
                <th align='center'>Price/Baht</th>
            </tr>
            {$txttd}
            <tr>
            <td align='center'></td>
            <td align='center'></td>
            <td align='center'></td>
			<td align='center'> <B> = {$price}<B></td>
            </tr>
        </table>
    </div>
    
	<div style='padding:50px;'>
    <B> <P>Discount 10 % : {$discount} Baht</P><B> 
    <B> <P>Total : {$total} Baht</P><B> 
    </div>


    <div style='background: #3b434c;color: #a2abb7;padding:30px;'>
        <div style='text-align:center'>
            2019 © <a href='http://localhost:4200/Home' style='color:#a2abb7'>ABC-Restaurant</a>
        </div>
    </div>
</body>

</html>
";
$conn->close();
//  ถ้ามี email ผู้รับ
if($email_receiver){
	$mail->msgHTML($email_content);


	if (!$mail->send()) {  // สั่งให้ส่ง email

		// กรณีส่ง email ไม่สำเร็จ
		echo "<h3 class='text-center'>ระบบมีปัญหา กรุณาลองใหม่อีกครั้ง</h3>";
		echo $mail->ErrorInfo; // ข้อความ รายละเอียดการ error
	}else{
		// กรณีส่ง email สำเร็จ
		echo "ระบบได้ส่งข้อความไปเรียบร้อย";
	}	
}



?>

<?php
$servername = "localhost";
$username = "root";
$password = "12345678";
$dbname = "restaurantabc";

$bill="4553872";
$txttd="";
// Create connection
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
        // echo "id: " . $row["id"]. " - Name: " . $row["Name_product"]. " price" . $row["Price"]. "<br>";
        $txttd.= "<tr><td align='center'>" .$i."</td><td align='center'>" .$row["Name_product"]."</td><td align='center'>1</td><td align='center'>" .$row["Price"]."</td></tr>";
      
        $i++;
    }
} else {
    echo "0 results";
}

$conn->close();

        
        ?>
        <!DOCTYPE html>
<html>
<body>
<div style='padding:20px;'>
		<table align='center' width='400'>
            <tr>
                <th align='center'>Order</th>
                <th align='center'>NameProduct</th>
                <th align='center'>Unit</th>
                <th align='center'>Price/Baht</th>
            </tr>
            
           <?php echo$txttd?>
           
        </table>
    </div>
    

</body>
</html>
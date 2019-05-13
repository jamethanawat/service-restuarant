<?

// used to connect to the database
$host = "localhost";
$db_name = "restaurantabc";
$username = "root";
$password = "12345678";

try {
$con = new PDO("mysql:host={$host};dbname={$db_name}", $username, $password);
}

// show error
catch(PDOException $exception){
echo "Connection error: " . $exception->getMessage();
}
?>

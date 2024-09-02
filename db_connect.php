CREATE TABLE users (  
    id INT AUTO_INCREMENT PRIMARY KEY,  
    name VARCHAR(100),  
    email VARCHAR(100)  
);
<?php  
$servername = "localhost";  
$username = "root"; // default username for XAMPP/WAMP  
$password = ""; // default password for XAMPP/WAMP  
$dbname = "my_database";  

// Create connection  
$conn = new mysqli($servername, $username, $password, $dbname);  

// Check connection  
if ($conn->connect_error) {  
    die("Connection failed: " . $conn->connect_error);  
}  
?>
<?php  
include 'db_connect.php';  

$sql = "SELECT * FROM users";  
$result = $conn->query($sql);  

if ($result->num_rows > 0) {  
    // Output data of each row  
    while($row = $result->fetch_assoc()) {  
        echo "id: " . $row["id"]. " - Name: " . $row["name"]. " - Email: " . $row["email"]. "<br>";  
    }  
} else {  
    echo "0 results";  
}  
$conn->close();  
?>
<!DOCTYPE html>  
<html lang="en">  
<head>  
    <meta charset="UTF-8">  
    <meta name="viewport" content="width=device-width, initial-scale=1.0">  
    <title>User Data</title>  
</head>  
<body>  
    <h1>User Data</h1>  
    <div id="user-data">  
        <?php include 'fetch_data.php'; ?>  
    </div>  
</body>  
</html>

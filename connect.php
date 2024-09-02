<?php

	$firstName = $_POST['firstName'];
	$lastName = $_POST['lastName'];
	$email = $_POST['email'];
	$password = $_POST['password'];

	// Database connection
	$conn = new mysqli('localhost','root','','test');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		$stmt = $conn->prepare("insert into registration(firstName, lastName, email, password) values(?, ?, ?, ?, ?)");
		$stmt->bind_param("sssssi", $firstName, $lastName, $email, $password);
		$execval = $stmt->execute();
		echo $execval;
		echo "Registration successfully...";
		$stmt->close();
		$conn->close();
	}
?>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // collect value of input field
    $data = $_REQUEST['val1'];

    if (empty($data)) {
        echo "data is empty";
    } else {
        echo $data;
    }
}
// Closing the connection.
$conn->close();

?>

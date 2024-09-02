<?php
$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$email = $_POST['email'];
$password = $_POST['password'];
$dob = $_POST['dob'];

if (!empty($firstname) || !empty($lastname) || !empty($email) || !empty($password) || !empty($dob)){
  $host = "localhost";
  $dbUsername = "root";
  $dbPassword = "";
  $dbname = "youtube";

  $conn = new mysqli ($host,$dbUsername,$dbPassword,%dnname);

  if(mysqli_connect_error()){
    die('Connect Error('.mysqli_connect_errorno().')'.mysqli_connect_error());
  } else{
    $SELECT = "SELECT email from register Where email = ? Limit 1";
    $INSERT = "INSERT Into register (firstname,lastname,email,password,dob) values(?,?,?,?,?)";

    $stmt = $conn->prepare($SELECT);
    $stmt->bind_param("s",$email);
    $stmt->execute();
    $stmt->bind_result($email);
    $stmt->store_result();
    $rnum = $stmt->num_rows;

    if ($rnum == 0) {
      $stmt->close();

      $stmt-> $conn->prepare($INSERT);
      $stmt->bind_param("ssssii",$firstname,$lastname,$email,$password,$dob);
      $stmt->execute();
      echo "SUCCESS";
    }else { 
      echo "Already Used";
    }
    $stmt->close();
    $conn->close();
      
    
    
    
  }else{
  echo "All fields are required";
  die();
}
?>
  
  

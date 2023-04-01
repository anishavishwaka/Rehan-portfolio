<?php
$servername = "localhost";
$username =  "root";
$password = "";
$dbname = "contactme";


$conn= new mysqli($servername,$username,$password,$dbname);

if($conn->connect_error){
    die('Connection Failed : ' .$conn ->connect_error);
}
  $name = $_POST['name'];
  $email = $_POST['email'];
  $phone = $_POST['phone'];
  $message = $_POST['message'];

  $sql = "INSERT INTO `member` (`Sr`, `Name`, `email`, `phone`, `message`) VALUES (NULL, '$name', '$email', '$phone', '$message ')";

if($conn->query($sql)==true){
     echo "msg sent";
}
else{
    echo "error";
}
$conn->close();

?>

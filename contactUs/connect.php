<?php

$firstName = $_POST['firstName'];
$lastName = $_POST['lastName'];
$email = $_POST['email'];
$number = $_POST['number'];
$message = $_POST['message'];

// DATABASE CONNECTION

$conn = new mysqli('localhost','root','','login');
if($conn->connect_error){
    die('Connection Failed : '.$conn->connect_error);
}
else{
    $stmt = $conn->prepare("insert into details(firstName, lastName, email, number, message)
    values(?, ?, ?, ?, ?)");

    $stmt->bind_param("sssis", $firstName, $lastName, $email, $number, $message);

    $stmt->execute();
    echo "Thank You For Cotacting Us";
    $stmt->close();
    $conn->close();
}

?>
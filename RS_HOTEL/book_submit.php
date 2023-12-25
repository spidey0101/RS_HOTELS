<?php

$servername = "localhost"; 
$username = "root"; 
$password = "root@123"; 
$dbname = "rshotel"; 

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve form data and sanitize it
$fullname = mysqli_real_escape_string($conn, $_POST['fullname']);
$email = mysqli_real_escape_string($conn, $_POST['email']);
$phone = mysqli_real_escape_string($conn, $_POST['phone']);
$roomtype = mysqli_real_escape_string($conn, $_POST['roomtype']);
$checkin = mysqli_real_escape_string($conn, $_POST['checkin']);
$checkout = mysqli_real_escape_string($conn, $_POST['checkout']);

$sql = "INSERT INTO Bookings (FULLNAME, EMAIL, PHONE, ROOM_TYPE, CHECK_IN, CHECK_OUT) VALUES ('$fullname', '$email', '$phone', '$roomtype', '$checkin', '$checkout')";

if ($conn->query($sql) === TRUE) {
    echo "New booking created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>

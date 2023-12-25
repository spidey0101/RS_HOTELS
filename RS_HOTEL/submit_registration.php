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

$phone = mysqli_real_escape_string($conn, $_POST['phone']);
$username = mysqli_real_escape_string($conn, $_POST['username']);
$email = mysqli_real_escape_string($conn, $_POST['email']);
$country = mysqli_real_escape_string($conn, $_POST['country']);
$aadhar = mysqli_real_escape_string($conn, $_POST['aadhar']);
$upi = mysqli_real_escape_string($conn, $_POST['upi']);
$age = intval($_POST['age']);
$gender = mysqli_real_escape_string($conn, $_POST['gender']);
$firstname = mysqli_real_escape_string($conn, $_POST['firstname']);
$lastname = mysqli_real_escape_string($conn, $_POST['lastname']);


$sql = "INSERT INTO CUSTOMER (PHONE, USERNAME, EMAIL, COUNTRY_CODE,AADHAR,UPI, AGE,GENDER,FIRST NAME,LAST NAME) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
$stmt = $conn->prepare($sql);

$stmt->bind_param("ssiissss", $phone, $username, $email, $country, $aadhar, $upi, $age, $gender, $firstname, $lastname);

if ($stmt->execute()) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$stmt->close();
$conn->close();
?>

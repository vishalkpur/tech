<?php
$conn =mysqli_connect('localhost', 'root', '', 'vishal');


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$firstName = $_POST['firstName'];
$lastName = $_POST['lastName'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$dob = $_POST['dob'];
$gender = $_POST['gender'];
$languages = implode(',', $_POST['languages']);

$que = "SELECT * FROM user WHERE email='$email' ";

$res= mysqli_query($conn,$que);

if(mysqli_num_rows($res)>0){
	echo "email is already register" ;
}else{

$que1 = "INSERT INTO user (firstname, lastname, email, phone, dob, gender, languages)
        VALUES ('$firstName', '$lastName', '$email', '$phone', '$dob', '$gender', '$languages')";

$res1= mysqli_query($conn,$que1);

if ($res1) {
    echo "Account created successfully. You can now login.";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
}

$conn->close();
?>

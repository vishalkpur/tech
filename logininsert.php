<?php
session_start();

$conn =mysqli_connect('localhost', 'root', '' ,'vishal' );

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$email = $_POST['email'];
$dob = $_POST['dob'];

$que = "SELECT * FROM user WHERE email='$email' AND dob='$dob'";
$res= mysqli_query($conn,$que);
if (mysqli_num_rows($res)>0) {
    $_SESSION['email'] = $email;
   // echo "Login successful. Redirecting to dashboard...";
	header ('location:view.php');
} else {
    echo "Invalid email or password.";
}

$conn->close();
?>

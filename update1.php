<?php
session_start();
if (!isset($_SESSION['email'])) {
    header('Location: login.html');
    exit();
}

if (isset($_POST['id'])) {
    $id = $_POST['id'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $dob = $_POST['dob'];
    $gender = $_POST['gender'];
    $languages = implode(',',$_POST['languages']); 

    $conn = mysqli_connect('localhost', 'root', '', 'vishal');
    $query = "UPDATE user SET firstname='$firstname', lastname='$lastname', email='$email', phone='$phone', dob='$dob', gender='$gender',languages='$languages'  WHERE id='$id'";

    if (mysqli_query($conn, $query)) {
       // echo "Record updated successfully";
	   header ('location:view.php');
    } else {
        echo "Error updating record: " . mysqli_error($conn);
    }
} else {
    echo "Invalid request";
}
?>

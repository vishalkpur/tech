<?php
session_start();

if(isset($_REQUEST['id'])){
	$id=$_REQUEST['id'];
	
	$conn=mysqli_connect('localhost','root','','vishal');
	$que=" delete from user where id='$id' ";
	
	$res=mysqli_query($conn,$que);
	
	if($res){
		header ('location:login.php');
	}
	else{
		echo "error on deleteing ";
	}
}

?>
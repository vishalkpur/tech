<?php
session_start();
if (!isset($_SESSION['email'])) {
    header('Location: login.html');
    exit();
}?>

<html>
<head>
    <title>User Dashboard</title>
</head>
<body>
    <center>
    <h2>Welcome to Dashboard</h2>
	  <a href="logout.php">Logout</a>
    </center>
	<form>

</form>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $(document).ready(function () {
        // Delete functionality
        $('.delete').click(function () {
            var id = $(this).data('id');
            var confirmation = confirm("Are you sure you want to delete this record?");
            if (confirmation) {
                $.ajax({
                    url: 'delete.php',
                    type: 'post',
                    data: {id: id},
                    success: function (response) {
                        alert(response);
                        location.reload();
                    }
                });
            }
        });

        // Update functionality
        $('.update').click(function () {
            var id = $(this).data('id');
            // Redirect to the update page with the user's ID
            window.location.href = 'update.php?id=' + id;
        });
    });
</script>
	</body>
</html>


<?php

    $email = $_SESSION['email'];

	$conn =mysqli_connect('localhost' ,'root','','vishal');
	$query= "select * from user where email='$email'";
	$res =mysqli_query($conn ,$query);
    echo "<center><table border=1px >
			<tr style=text-align:center>
				<td> First Name </td>
				<td> Last Name </td>
				<td> Email </td>
				<td> Phone </td>
				<td> DOB </td>
				<td> Gender </td>
				<td> Languages </td>
				<td>Action</td>
			</tr></center>";
	if(mysqli_num_rows($res) > 0){
     while($row =mysqli_fetch_assoc ($res)){

		echo "<tr style=text-align:center>
				<td>".$row['firstname']."</td>
				<td> ".$row['lastname']."</td>
				<td> ".$row['email']."</td>
				<td> ".$row['phone']." </td>
				<td> ".$row['dob']."</td>
				<td> ".$row['gender']."</td>
				<td> ".$row['languages']."</td>
				<td>
                    <button class='delete' data-id='" . $row['id'] . "'>Delete</button>
                    <button class='update' data-id='" . $row['id'] . "'>Update</button>
				</td>
			</tr>";
         
	   
		}
	}
	
	else{
			echo "<h4>No Record Found</h4>";
	}
	?>
	
	

 
  






<html>
<head>
	<title>sign</title>
	<link rel="stylesheet" type="text/css" href="Teststyle.css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<style>
 body{
     border:1px solid black;
     height:500px;
	 width:500px;
	 margin:2px 232px 2px 2px ;
 }
	</style>
</head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script>
$(document).ready(function() {
    $('#registrationForm').submit(function(e) {
        e.preventDefault();

        var firstname = $('#firstname').val();
        var lastname = $('#lastname').val();
        var dob = new Date($('#dob').val());  
        var today = new Date();
        var age = today.getFullYear() - dob.getFullYear();
        var address = $('#address').val();
        var phone = $('#phone').val();   
        var email = $('#email').val();
        var password = $('#password').val();

        if (age < 18) {
            alert("You must be 18 or older to register.");
            return;
        }

       
        this.submit();
    });
});
</script>

<body>

<?php
if(isset($_REQUEST['error']))
{

	echo $_REQUEST['error'];
}


?>
	<form id="registrationForm"  method="post" action="validationinsert.php" >
		<label for="firstName">First Name:</label>
		<input type="text" id="firstname" name="firstname" required><br>
		
		<label for="lastName">Last Name:</label>
		<input type="text" id="lastname" name="lastname" required><br>
		
		<label for="dob">Date of Birth:</label>
		<input type="date" id="dob" name="dob" required><br>
		
		<label for="address">Address:</label>
		<input type="text" id="address" name="address" required><br>
		
		<label for="phone">Phone:</label>
		<select>
		<option value="91">India (+91)</option>
		<option value="7">Russia (+7)</option>
		<option value="250">Rwanda (+250)</option>
		<option value="966">Saudi Arabia (+966)</option>
		<option value="92">Pakistan (+92) </option>
		
	</select>
		<input type="tel" id="phone" name="phone" required><br>
		
		<label for="email">Email:</label>
		<input type="email" id="email" name="email" required><br>
		
		<label for="password">Password:</label>
		<input type="password" id="password" name="password" required><br>
		
		<input type="submit" value="Submit">
		<p><a href="validationlogin.php"><h5>Login</a></p>
		
	</form>

</body>
</html>
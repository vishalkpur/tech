<html>
<head>
    <title>User Login</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body>
    <h2>User Login</h2>
    <form id="loginForm" method="post" action="loginsert.php">
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required><br><br>
        
        <label for="dob">DOB:</label>
        <input type="date" id="dob" name="dob" required><br><br>
        
        <button type="submit">Login</button>
    </form>

    <div id="message"></div>

    <script>
        $(document).ready(function(){
            $('#loginForm').submit(function(e){
                e.preventDefault();
                $.ajax({
                    url: 'logininsert.php',
                    type: 'post',
                    data: $(this).serialize(),
                    success: function(response){
                        $('#message').html(response);
                    }
                });
            });
        });
    </script>
</body>
</html>

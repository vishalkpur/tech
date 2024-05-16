<html>
<head>
    <title>User Registration</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body>
    <h2>User Registration</h2>
    <form id="registrationForm" method="post">
        <label for="firstName">First Name:</label>
        <input type="text" id="firstName" name="firstName" required minlength="3"><br><br>
        
        <label for="lastName">Last Name:</label>
        <input type="text" id="lastName" name="lastName" required minlength="3"><br><br>
        
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required><br><br>
        
        <label for="phone">Phone No.:</label>
        <input type="tel" id="phone" name="phone" pattern="[0-9]{10}" title="Please enter a 10-digit phone number" required minlength="10" maxlength="10"><br><br>
        
        <label for="dob">Date of Birth:</label>
        <input type="date" id="dob" name="dob" required><br><br>
        
        <label for="gender">Gender:</label>
        <select id="gender" name="gender" required>
            <option value="">Select</option>
            <option value="male">Male</option>
            <option value="female">Female</option>
            <option value="other">Other</option>
        </select><br><br>
        
        <label for="languages">Languages:</label><br>
        <input type="checkbox" id="english" name="languages[]" value="english" >
        <label for="english">English</label><br>
        <input type="checkbox" id="hindi" name="languages[]" value="hindi" >
        <label for="hindi">Hindi</label><br>
        <input type="checkbox" id="punjabi" name="languages[]" value="punjabi" >
        <label for="punjabi">punjabi</label><br><br>
        
        <button type="submit">Register</button>
    </form>

    <div id="message"></div>

    <script>
        $(document).ready(function(){
            $('#registrationForm').submit(function(e){
                e.preventDefault();
                if(validateForm()) {
                    $.ajax({
                        url: 'insert.php',
                        type: 'post',
                        data: $(this).serialize(),
                        success: function(response){
                            $('#message').html(response);
                          $('#registrationForm')[0].reset(); 
                        }
                    });
                }
            });

            function validateForm() {
                var firstName = $('#firstName').val();
                var lastName = $('#lastName').val();
                var email = $('#email').val();
                var phone = $('#phone').val();
                var dob = $('#dob').val();
                var gender = $('#gender').val();
                var languages = $('input[name="languages[]"]:checked').length;

                if (firstName.length < 3) {
                    alert("First name must be at least 3 characters long.");
                    return false;
                }
                if (lastName.length < 3) {
                    alert("Last name must be at least 3 characters long.");
                    return false;
                }
                if (!isValidEmail(email)) {
                    alert("Invalid email address.");
                    return false;
                }
                if (phone.length != 10) {
                    alert("Phone number must be 10 digits long.");
                    return false;
                }
                if (calculateAge(dob) < 18) {
                    alert("You must be at least 18 years old.");
                    return false;
                }
                if (gender === "") {
                    alert("Please select your gender.");
                    return false;
                }
                if (languages < 2) {
                    alert("Please select at least 2 languages.");
                    return false;
                }

                return true;
            }

            function isValidEmail(email) {
                var pattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                return pattern.test(email);
            }

            function calculateAge(dob) {
                var today = new Date();
                var birthDate = new Date(dob);
                var age = today.getFullYear() - birthDate.getFullYear();
                var m = today.getMonth() - birthDate.getMonth();
                if (m < 0 || (m === 0 && today.getDate() < birthDate.getDate())) {
                    age--;
                }
                return age;
            }
        });
    </script>
</body>
</html>

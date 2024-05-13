<?php
session_start();

if(isset($_REQUEST['id'])){
	$id=$_REQUEST['id'];
	
	$conn=mysqli_connect('localhost','root','','vishal');
	
	$que=" select * from user where id='$id' ";
	
	$res=mysqli_query($conn,$que);
	
	if(mysqli_num_rows($res)>0){
		
		echo "<form method=post action=update1.php>";
	
	while($row=mysqli_fetch_assoc($res)){
		?>
		
		id:-<input type="hidden" name="id" value="<?php echo $row['id']; ?>" /><br>
        Firstname:-<input type="text" name="firstname" value="<?php echo $row['firstname']; ?>" /><br>
		lastname:- <input type='text' name='lastname' value="<?php echo $row['lastname']; ?>" /><br>
		Email:-    <input type='email' name='email' value="<?php echo $row['email']; ?>" /><br>
		phone no.:-<input type='tel' name='phone' pattern="[0-9]{10}" title="Please enter a 10-digit phone number" value="<?php echo $row['phone']; ?>" /><br>
		DOB: <input type='date' name='dob' value=" . $row['dob'] . "><br>
		Gender: 
            <select name='gender'>
                <option value='male' " . ($row['gender'] == 'male' ? 'selected' : '') . ">Male</option>
                <option value='female' " . ($row['gender'] == 'female' ? 'selected' : '') . ">Female</option>
                <option value='other' " . ($row['gender'] == 'other' ? 'selected' : '') . ">Other</option>
            </select><br>
		
        Languages: <br><?php 
            
            // List of available languages
            $languages = ['english', 'hindi', 'punjabi'];
            
            foreach ($languages as $language) {
                echo "<input type='checkbox' id='$language' name='languages[]' value='$language'";
                if (in_array($language, explode(',', $row['languages']))) {
                    echo " checked";
                }
                echo "><label for='$language'>$language</label><br>";
            }  
		 ?>
			<input type='submit' value='Update'>
			</form>
		
		
	<?php
    } 	
	}
}
else {
	echo "data not found";
}

?>
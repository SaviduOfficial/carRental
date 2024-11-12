<?php
	include '../config.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>

	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Customer Registration</title>
	<link rel="stylesheet" href="style.css">
	
</head>
<body>

	<div class="container">
	
		<div class="registration-form">
			
			<h1 class="top_text">Welcome!</h1>
			
			<p class="top_text">Already have an account? <a href="../Customer Login/customer_login.php">Log In</a></p>
			
			<form method="post">
			
				<label for="first_name" class="label_block">First Name:</label>
				<input type="text" placeholder="First Name" id="first_name" class="input_styling" name="firstName" required>
				
				<label for="last_name" class="label_block">Last Name:</label>
				<input type="text" placeholder="Last Name" id="last_name" class="input_styling" name="lastName" required>
				
				<label for="address" class="label_block">Address:</label>
				<input type="text" placeholder="Address" id="address" class="input_styling" name="address" required>
				
				<label for="username" class="label_block">Username:</label>
				<input type="text" placeholder="Username" id="username" class="input_styling" name="username" required>
			
				<label for="mobile_number" class="label_block">Mobile Number:</label>
				<input type="number" placeholder="Enter mobile number" id="mobile_number" class="input_styling" name="mobile" required>
				
				<label for="email" class="label_block">Email Address:</label>
				<input type="email" placeholder="Enter email address" id="email" class="input_styling" name="email" required>
			
				<label for="driving_license_No" class="label_block">Driving License Number:</label>
				<input type="text" placeholder="Enter driving license number" id="driving_license_No" class="input_styling" name="driv_licns_no" required>
			
				<label for="password" class="label_block">Password:</label>
				<input type="password" placeholder="Enter a password" id="password" class="input_styling" name="password" required>
				
				<label for="confirm_password" class="label_block">Confirm Password:</label>
				<input type="password" placeholder="Re-enter password" id="confirm_password" class="input_styling" name="confirm_password" required>
				
				<div>
					<input type="checkbox" id="terms" required>
					<label for="terms">I have read and agree to the <a href="#">Terms of Service</a></label>
				</div>
				
				
				<input type="submit" value="Sign Up" id="submit_btn">				
		
			</form>
		
		</div>
		
		<div class="info-section">
		
			<img src="../VRSLOGO.png" alt="Company Logo" id="logo">
			
			<h1>Looking for a Rental Vehicle?</h1>
			<p>Your journey starts here! Simply sign up to create your account and you'll be 
			able to access and manage your bookings in no time.</p>
			
		</div>
		
	</div>

</body>
</html>

<?php

	if($_SERVER['REQUEST_METHOD'] == 'POST'){
		
		$firstName = $_POST['firstName'];
		$lastName = $_POST['lastName'];
		$address = $_POST['address'];
		$username = $_POST['username'];
		$mobile = $_POST['mobile'];
		$email = $_POST['email'];
		$drivingLicenseNo = $_POST['driv_licns_no'];
		$password = $_POST['password'];
		$confirmPassword = $_POST['confirm_password'];
		
		if($password == $confirmPassword){
			
			$res = mysqli_query($conn, "SELECT * FROM customers WHERE username='$username'");
			
			if(mysqli_num_rows($res) == 0){				
				
				//Inserting form data into database table
				mysqli_query($conn, "INSERT INTO customers (First_Name, Last_Name, Address, email, Customer_password, Contact_number, Driving_license_No, username) 
				VALUES ('$firstName', '$lastName', '$address', '$email', '$password', '$mobile', '$drivingLicenseNo', '$username') ");
				
				?><script>alert("Your data has been saved");</script><?php
				
			}
			else{
				
				?><script>alert("Username already exists. Please enter a different username");</script><?php
				
			}
			
		}
		else{
			
			?><script>alert("Password mismatch. Please re-check password");</script><?php	
		}
		
	}

?>

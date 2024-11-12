<?php
	include '../config.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>

	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Customer Login</title>
	<link rel="stylesheet" href="style.css">

</head>
<body>

	<div class="container">
	
		<div class="registration-form">
			
			<h1>Admin Login Portal</h1>
			
			<p>Not an Admin? <a href="../Customer Login/customer_login.php">Log In As a Customer</a></p>		
			
			<form method="post">	
				
				<label for="username" class="label_block">Username:</label>
				<input type="text" placeholder="Username" id="username" class="input_styling" name="username" required>			
				<label for="password" class="label_block">Password:</label>
				<input type="password" placeholder="Enter a password" id="password" class="input_styling" name="password" required>
				
				<input type="submit" value="Login" id="login_btn">				
		
			</form>
			
			
		
		</div>
		
		<div class="info-section">
		
			<img src="../VRSLOGO.png" alt="Company Logo" id="logo">
			
			<!-- <h1>Looking for a Rental Vehicle?</h1>
			<p>Your journey starts here! Simply sign up to create your account and you'll be 
			able to access and manage your bookings in no time.</p> -->
			
		</div>
		
	</div>	

</body>
</html>

<?php

	if($_SERVER['REQUEST_METHOD'] == 'POST'){
		
		$username = $_POST['username'];
		$password = $_POST['password'];
		
		$res = mysqli_query($conn, "SELECT * FROM customers WHERE username='$username' AND Customer_password='$password'");
			
			if(mysqli_num_rows($res) == 1){				
				
				?><script>alert("success");</script><?php
				
			}
			else{
				
				?><script>alert("Incorrect Credentials!");</script><?php
				
			}	
	
	}

?>

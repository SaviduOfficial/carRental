<?php

include "../config.php";

session_start();

//check whether vehicle id is assigned

if (!isset($_SESSION['VehicleID'])) {
  echo "No vehicle ID found: ";
}

/*$customerID = $_SESSION['CustomerID'];*/
$vehicleID = $_SESSION['VehicleID'];
$CID = $_SESSION['CID'];



$_SESSION['VehicleID'] = $vehicleID;



// Query to get customer details
$query = "SELECT CID, First_Name, Last_Name, email, Contact_number FROM customers WHERE CID = ?";
$stmt = mysqli_prepare($conn, $query);
mysqli_stmt_bind_param($stmt, "s", $CID);
mysqli_stmt_execute($stmt);

// Fetch the result
$result = mysqli_stmt_get_result($stmt);

// Check if any row is returned
if ($row = mysqli_fetch_assoc($result)) {
    // Assign array elements to variables
    $CID = $row['CID'];
    $fname = $row['First_Name'];
    $lname = $row['Last_Name'];
    $email = $row['email'];
    $phone = $row['Contact_number'];
    
    // Display or use the variables as needed
   
    
    
   
    
} else {
    echo "No customer found with ID: " . $customerID;
}

// Close the database connection
// mysqli_close($conn);


?>



<!DOCTYPE html>
<html>
  <head>
    <title>Car Booking Form</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    <link rel="stylesheet" href="bookingStyle.css">
  </head>
  <body>

  <div class="banner_1">
        <div class="navbar_1">

             <a href="../Homepage/index.php"> <img src= 'vrslogo.png' class="logo_1" alt="VRS logo"></a> <!-- need to go to homepage when click the logo-->
            
            <div class="hamburger">
                <div>
                </div>

            </div>

            <div class="navbar_list_1">
                <ul>
                    <li><br></li>
                    <li><a href="#"></a></li>
                    <li><a href="#">Home</a></li>
                    <li><a href="#">Vehicles</a></li>
                    <li><a href="#">About</a></li>
                    <li><a href="#">Contact Us</a></li>
                </ul>
            </div>
           
        </div>


    <div class="testbox">
      <form action="validateBooking.php" method="POST">
        <div class="banner">
          
        </div>
        <div class="item">
          <p>Name</p>
          <div class="name-item">
            <input type="text" name="fname" placeholder="First" value="<?php echo $fname; ?>"  readonly/>
            <input type="text" name="lname" placeholder="Last"  value="<?php echo $lname; ?>" readonly/>
          </div>
        </div>
        <div class="item">
          <p>Email</p>
          <input type="text" name="email" value="<?php echo $email; ?>" readonly/>
        </div>
        <div class="item">
          <p>Phone</p>
          <input type="text" name="contactNumber" value="<?php echo $phone; ?>"/>
        </div>
       
        <div class="item">
          <p>Pick Up Date (mm /dd / yyyy)</p>
          <input type="date" name="pickupdate" value="<?php echo date('Y-m-d');?>"/>
          <i class="fas fa-calendar-alt"></i>
        </div>

        <div class="item">
          <p>Return Date  (mm /dd / yyyy)</p>
          <input type="date" name="returndate" />
          <i class="fas fa-calendar-alt"></i>
        </div>

        <div class="item">
          <p>Pickup Address</p>
          <input type="text" name="pickupAddress" placeholder="Where do you want to pick the vehicle"/>
        </div>

       
        <div class="btn-block">
          <button type="submit" name="confirm" >CONFIRM</button>
        </div>
      </form>
    </div>
  </body>
</html>
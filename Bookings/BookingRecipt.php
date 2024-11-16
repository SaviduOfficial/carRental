
<?php
// Start the session
session_start();

// Clear all session data
 /*session_unset();*/

// Destroy the session
 /*session_destroy();*/

include "../config.php";
include "../functions/func.php";

$BID = $Booking_Date = $Return_Date = $Pickup_address = $VehicleID = $Vehicle_type = $Vehicle_make = $Vehicle_model = $Regi_no_p1 = 
$Regi_no_p2 = $Fuel_type = $colour = $CustomerID = $First_Name = $Last_Name = $contact_Number = $email =$paid_unpaid = 
$Rental_charge = $image_1 = $initialMileage = $finalMileage ="";


$BID = $_SESSION['BID'];
$CID= $_SESSION['CID'];
$VehicleID= $_SESSION['VehicleID'];
$Vehicle_type= $_SESSION['Vehicle_type'];
$Vehicle_make = $_SESSION['Vehicle_make'];
$Vehicle_model = $_SESSION['Vehicle_model'];
$initialMileage = $_SESSION['initialMileage'];
$Regi_no_p1 = $_SESSION['Regi_no_p1'];
$Regi_no_p2 = $_SESSION['Regi_no_p2'];
$Fuel_type = $_SESSION['Fuel_type'];



 $comapact = getBookingDetails($conn, $BID);


 $Booking_Date = $comapact['Booking_Date'];
 $Return_Date = $comapact['Return_Date'];
 $Pickup_address = $comapact['Pickup_address'];
 $colour = $comapact['colour'];
 $First_Name = $comapact['First_Name'];
 $Last_Name = $comapact['Last_Name'];
 $contact_Number = $comapact['contact_Number'];
 $email = $comapact['email'];
 $paid_unpaid = $comapact['paid_unpaid'];
 $Rental_charge = $comapact['Rental_charge'];
 $image_1 = $comapact['image_1'];
 $initialMileage = $comapact['initialMileage'];
 $finalMileage = $comapact['finalMileage'];
 echo $Rental_charge;






?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RECEIPT</title>
</head>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<link rel="stylesheet" href="ReciptStyle.css">

<body>



<div id="invoice-POS" class="container">
    
    <div id="top" class="container">
		<div class="logo" class="container">
			<img src="vrslogo.PNG" alt="VRS Logo" />
			<div class="info"> 
				<h1>Vehicle Renting System </h1>
				<br>
				<!-- <div class="btnrightUpper">

				
					<div>
						<button class="styled-button">Download</button>
					</div>
					<div>
						<form action="backaction.php" method="post">
							<button class="styled-button" type="submit">Back</button>
						</form>
					</div>

					


				</div> -->
			</div>
			
				
		</div><!--End Info-->
    </div><!--End InvoiceTop-->
    
    <div id="mid" class="container">
      <div class="info_2 " class="container">
			<h3>Booking Info</h3>

			<div class="paradiv" class="container">   

				<p> 
					BOOKING ID :<?php echo " " . $_SESSION['BID'] ?> </br><br>
					Please Make Sure to Note-down the Booking ID before continue</br>
					contact   : VRS@gmail.com</br>
				</p>


			</div>
        
      </div>
    </div><!--End Invoice Mid-->
    
    <div id="bot" class="container">

					<div class="table">
						<table>
							<tr class="tabletitle">
								<td class="item"><h3>Booking Information</h3></td>
								<td class="Hours"><h2></h2></td>
								<td class="Rate"><h2></h2></td>
							</tr>

							<tr class="service">
								<td class="tableitem"><p class="itemtext">CustomerID</p></td>
								<td class="tableitem"><p class="itemtext"><?php echo $CID ?></p></td>
								<td class="tableitem"><p class="itemtext"></p></td>
							</tr>

							<tr class="service">
								<td class="tableitem"><p class="itemtext">Customer Name</p></td>
								<td class="tableitem"><p class="itemtext"><?php echo $First_Name . " " . $Last_Name ?></p></td>
								<td class="tableitem"><p class="itemtext"></p></td>
							</tr>

							<tr class="service">
								<td class="tableitem"><p class="itemtext">Contact Number</p></td>
								<td class="tableitem"><p class="itemtext"><?php echo $contact_Number ?></p></td>
								<td class="tableitem"><p class="itemtext"></p></td>
							</tr>

							<tr class="service">
								<td class="tableitem"><p class="itemtext">Email</p></td>
								<td class="tableitem"><p class="itemtext"><?php echo $email ?></p></td>
								<td class="tableitem"><p class="itemtext"></p></td>
							</tr>

							<tr class="service">
								<td class="tableitem"><p class="itemtext">Vehicle ID</p></td>
								<td class="tableitem"><p class="itemtext"><?php echo $VehicleID ?></p></td>
								<td class="tableitem"><p class="itemtext"></p></td>
							</tr>

                            <tr class="service">
								<td class="tableitem"><p class="itemtext">Vehicle Type</p></td>
								<td class="tableitem"><p class="itemtext"><?php echo $Vehicle_type ?></p></td>
								<td class="tableitem"><p class="itemtext"></p></td>
							</tr>

                            <tr class="service">
								<td class="tableitem"><p class="itemtext">Vehicle Make</p></td>
								<td class="tableitem"><p class="itemtext"><?php echo $Vehicle_make ?></p></td>
								<td class="tableitem"><p class="itemtext"></p></td>
							</tr>

                            <tr class="service">
								<td class="tableitem"><p class="itemtext">Vehicle Model</p></td>
								<td class="tableitem"><p class="itemtext"><?php echo $Vehicle_model ?></p></td>
								<td class="tableitem"><p class="itemtext"></p></td>
							</tr>

                            <tr class="service">
								<td class="tableitem"><p class="itemtext">Vehicle Plate Number</p></td>
								<td class="tableitem"><p class="itemtext"><?php echo $Regi_no_p1 . " - " . $Regi_no_p2 ?></p></td>
								<td class="tableitem"><p class="itemtext"></p></td>
							</tr>

                            <tr class="service">
								<td class="tableitem"><p class="itemtext">Fuel Type</p></td>
								<td class="tableitem"><p class="itemtext"><?php echo $Fuel_type?></p></td>
								<td class="tableitem"><p class="itemtext"></p></td>
							</tr>

                            <tr class="service">
								<td class="tableitem"><p class="itemtext">Colour</p></td>
								<td class="tableitem"><p class="itemtext"><?php echo $colour ?></p></td>
								<td class="tableitem"><p class="itemtext"></p></td>
							</tr>

                            <tr class="service">
								<td class="tableitem"><p class="itemtext">Vehicle Start Mileage</p></td>
								<td class="tableitem"><p class="itemtext"><?php echo $initialMileage ?></p></td>
								<td class="tableitem"><p class="itemtext"></p></td>
							</tr>

                            <tr class="service">
								<td class="tableitem"><p class="itemtext">Vehicle End Mileage</p></td>
								<td class="tableitem"><p class="itemtext"><?php echo $finalMileage ?></p></td>
								<td class="tableitem"><p class="itemtext"></p></td>
							</tr>

                            <tr class="service">
								<td class="tableitem"><p class="itemtext">Rental amount</p></td>
								<td class="tableitem"><p class="itemtext"><?php echo $Rental_charge ?></p></td>
								<td class="tableitem"><p class="itemtext"></p></td>
							</tr>

                            <tr class="service">
								<td class="tableitem"><p class="itemtext">Paid/Unpaid</p></td>
								<td class="tableitem"><p class="itemtext"><?php echo $paid_unpaid ?></p></td>
								<td class="tableitem"><p class="itemtext"></p></td>
							</tr>

                            <tr class="service">
								<td class="tableitem"><p class="itemtext">pick up date</p></td>
								<td class="tableitem"><p class="itemtext"><?php echo  $Booking_Date ?></p></td>
								<td class="tableitem"><p class="itemtext"></p></td>
							</tr>

                            <tr class="service">
								<td class="tableitem"><p class="itemtext">Return date</p></td>
								<td class="tableitem"><p class="itemtext"><?php echo $Return_Date ?></p></td>
								<td class="tableitem"><p class="itemtext"></p></td>
							</tr>

                            <tr class="service">
								<td class="tableitem"><p class="itemtext">Pick up Address</p></td>
								<td class="tableitem"><p class="itemtext"><?php echo $Pickup_address ?></p></td>
								<td class="tableitem"><p class="itemtext"></p></td>
							</tr>


							<tr class="tabletitle">
								<td></td>
								<td class="Rate"><h5>Current Rates</h5></td>
								<td class="payment"><h2></h2></td>
							</tr>

							<tr class="tabletitle">
								<td></td>
								<td class="Rate"><h5>Rental Amount</h5></td>
								<td class="payment"><h2></h2></td>
							</tr>

						</table>
					</div><!--End Table-->

					<div id="legalcopy" class="container">
						<p class="legal"><strong>Thank you for Choosing VRS for your journey!</strong>  <br><br>
						 If you intend to cancel any bookings, please make sure to do so</br> at least 2 days before the scheduled pickup date.
						</p>
					</div>

	</div><!--End InvoiceBot-->
  
</div>

    <br>
	<br>
	<br>
</body>
</html>


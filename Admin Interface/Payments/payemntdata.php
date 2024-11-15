<?php

session_start();

include "../../config.php";
include "../../functions/func.php";

$paid_unpaid = "unpaid";

$stmt = $conn->prepare('SELECT*  FROM  bookings WHERE paid_unpaid = ?;');

$stmt->bind_param('s', $paid_unpaid);

$stmt->execute();
//getting result
$result = $stmt->get_result();




?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Payments</title>

  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="paymentstyle.css">


</head>

<body>


  <div class="table-title">
    <h3>UNPAID CUSTOMERS</h3>
  </div>
  <table class="table-fill">
    <thead>
      <tr>
        <th class="text-left">BOOKING ID</th>
        <th class="text-left">CUSTOMER ID</th>
        <th class="text-left">VEHICLE ID</th>
        <th class="text-left">CUSTOMER NAME</th>
        <th class="text-left">CONTACT NUMBER</th>
        <th class="text-left">EMAIL</th>
        <th class="text-left">PAID / UNPAID</th>
        <th class="text-left">RENTAL AMOUNT</th>
        
      </tr>
    </thead>
    <tbody class="table-hover">
      <?php
      while ($row = $result->fetch_assoc()) {
      ?>
        <tr>
          <td class="text-left"><?php echo $row['BID']; ?></td>
          <?php $bid = $row['BID']; ?>
          <td class="text-left"><?php echo $row['CustomerID']; ?></td>
          <?php $cid = $row['CustomerID']; ?>
          <td class="text-left"><?php echo $row['VehicleID']; ?></td>
          <td class="text-left"><?php echo $row['First_Name']; ?></td>
          <td class="text-left"><?php echo $row['contact_Number']; ?></td>
          <td class="text-left"><?php echo $row['email']; ?></td>
          <td class="text-left"><?php echo $row['paid_unpaid']; ?></td>
          <?php $status = $row['paid_unpaid']; ?>
          <td class="text-left"><?php echo $row['Rental_chage']; ?></td>
          <?php $amount = $row['Rental_chage']; ?>
        </tr>
      <?php
      }
      ?>

    </tbody>
  </table>

  <?php

  $stmt->close();
  ?>

<div class="changes"><h3> Change payment status </h3></div>
  
<form action="validatepayments.php" method="POST">
    <div class="table-container">
        <!-- Table Header -->
        <div class="header">
            <div class="cell">BOOKING ID</div>
            <div class="cell">CUSTOMER ID</div>
            <div class="cell">AMOUNT</div>
            <div class="cell">PAYMENT STATUS</div>
        </div>
        
        <!-- Table Row with editable fields -->
        <div class="row">
            <!-- Booking ID -->
            <div class="cell">
                <input type="number" name="bid" placeholder="Booking ID">
            </div>

             <!-- customerID -->
             <div class="cell">
                <input type="text" name="cid" placeholder="CustomerID">
            </div>

              <!-- Amount -->
            <div class="cell">
                <input type="text" name="amount" placeholder="Amount">
            </div>
            
            <!-- paid unpaid Dropdown -->
            <div class="cell">
                <select  name="paid_unpaid">
                    <option value="unpaid">unpaid</option>
                    <option value="paid">paid</option>
                </select>
            </div>
          
                
        </div>
            <!-- Submit Button -->
        <div class="submit-btn"> <button name="submit">SUBMIT</button></div>
    </div>
    

    
   
</form>


</body>


</html>


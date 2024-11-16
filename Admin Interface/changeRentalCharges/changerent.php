<?php

session_start();

include "../../config.php";
include "../../functions/func.php";



$stmt = $conn->prepare('SELECT*  FROM rentalcharge;');

$stmt->execute();
//getting result
$result = $stmt->get_result();




?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Usage Amount</title>

  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  <link rel="stylesheet" href="changerentstyle.css">


</head>

<body>
<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#">
        <img src="../../VRSLOGO.png" alt="VRS Logo" width="40" class="mr-2"> <!-- Placeholder for logo -->
        VRS
    </a>
    <div class="navbar-nav ml-auto">
        <a class="nav-link" href="#">Home</a>
        <a class="nav-link" href="../vehicleRegister/RegisterVehicles.php">Register</a>
        <a class="nav-link" href="../Admin Interface/admin_registration.php">Create Admin</a>
        <span class="nav-link"><?php echo htmlspecialchars($_SESSION['adusername']); ?> | <a href="logout.php" class="text-danger">Log Out</a></span>
    </div>
</nav>



  <div class="table-title">
    <h3 class="text-white">CURRENT RATES</h3>
  </div><br>
  <table class="table-fill">
    <thead>
      <tr>
        <th class="text-left">Item No</th>
        <th class="text-left">EngineCapacity</th>
        <th class="text-left">Rate Per Km</th>
        <th class="text-left">Additional Charge</th>
        
      </tr>
    </thead>
    <tbody class="table-hover">
      <?php
      while ($row = $result->fetch_assoc()) {
      ?>
        <tr>
          <td class="text-left"><?php echo $row['ID'] ?></td>
          <td class="text-left"><?php echo $row['EngineCapacity'] ?></td>
          <td class="text-left"><?php echo $row['ratePerKm'] ?></td>
          <td class="text-left"><?php echo $row['additional_charge'] ?></td>
        </tr>
      <?php
      }
      ?>

    </tbody>
  </table>
  <?php

  $stmt->close();
  ?>

<div class="changes"><h3  class="text-white"> CHANGE RENTAL CHARGES </h3></div>
  <br>
<form action="changedata.php" method="POST">
    <div class="table-container">
        <!-- Table Header -->
        <div class="header">
            <div class="cell">Item No</div>
            <div class="cell">Engine Capacity</div>
            <div class="cell">Rate Per Km</div>
            <div class="cell">Additional Charge</div>
        </div>
        
        <!-- Table Row with editable fields -->
        <div class="row">
            <!-- Item No Dropdown -->
            <div class="cell">
                <select id="itemNo" name="ID">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                    <option value="7">7</option>
                    <option value="8">8</option>
                    <option value="9">9</option>
                    <option value="10">10</option>
                    <option value="11">11</option>
                </select>
            </div>
            
            <!-- Engine Capacity Dropdown -->
            <div class="cell">
                <select id="engineCapacity" name="EngineCapacity">
                    <option value="less than 100cc">less than 100cc</option>
                    <option value="100cc - 150cc">100cc - 150cc</option>
                    <option value="151cc - 250cc">151cc - 250cc</option>
                    <option value="251cc - 610cc">251cc - 610cc</option>
                    <option value="611cc - 800cc">611cc - 800cc</option>
                    <option value="801cc - 1000cc">801cc - 1000cc</option>
                    <option value="1001cc - 1300cc">1001cc - 1300cc</option>
                    <option value="1301cc - 1500cc">1301cc - 1500cc</option>
                    <option value="1501cc - 2000cc">1501cc - 2000cc</option>
                    <option value="2001cc - 2500cc">2001cc - 2500cc</option>
                    <option value="2501cc - 3000cc">2501cc - 3000cc</option>
                    <option value="more than 3000cc">more than 3000cc</option>
                    <option value="Electric">Electric</option>
                </select>
            </div>
            
            <!-- Rate Per Km Input -->
            <div class="cell">
                <input type="number" id="ratePerKm" value="20.00" name="ratePerKm" step="0.01" required>
            </div>
            
            <!-- Additional Charge Input -->
            <div class="cell">
                <input type="number" id="additionalCharge" value="500.00" name="additional_charge" step="0.01" required>           
            </div>       
        </div>
            <!-- Submit Button -->
        <div class="submit-btn"> <button name="submit">SUBMIT</button></div>
    </div>
    

    
   
</form>


</body>


</html>


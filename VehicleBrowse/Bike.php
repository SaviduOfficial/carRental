<?php
// Connect to the database
include "../config.php";

session_start();

// Query to fetch vehicle details
$query = "SELECT * FROM registered_vehicles WHERE Vehicle_type = 'Bike'";
$result = $conn->query($query);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VRS - Browse vehicles</title>
    <link rel="stylesheet" href="Designs_styles.css">
    <script  src="Designs_script.js"></script>
</head>
<body>
    <div class="banner">
        <div class="navbar">

             <a href="../Homepage/index.php"> <img src= 'vrslogo.png' class="logo" alt="VRS logo"></a> <!-- need to go to homepage when click the logo-->
            
            <div class="hamburger">
                <div>
                </div>

            </div>

            <div class="navbar_list">
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




        
        <section class="items">
                    <h2 id= "header"> Bikes Available at the Moment</h2>
                    
            <div class="gallery">
            <?php
                // Loop through each vehicle in the result set and create a tile for each one
                while ($row = $result->fetch_assoc()) {
                    $vehicleID = $row['VehicleID'];
                    $vehicleImage = $row['image_1'];  
                    $vehicleMake = $row['Vehicle_make'];   
                    $vehicleModel = $row['Vehicle_model'];  
                    $vehicleRentPrice = $row['Renatal_charge'];  
                ?>


                 <div class="content">
                 <a href="../Bookings/VehicleSelected.php?vehicleID=<?php echo $vehicleID; ?>" class="tile-link">
                    <img src="../Admin Interface/vehicleRegister/<?php echo $vehicleImage; ?>" alt="Vehicle Image" >  <!-- need the vehicle image link-->
                        <div class="textstyle">
                            <h3><?php echo $vehicleMake; ?></h3>
                            <p><?php echo $vehicleModel; ?></p>
                            <h4> <?php echo $vehicleRentPrice; ?></h4>
                        </div>
                </div>


                <?php
                }
                ?>
            

            </div>

        </div>

        </section>
            

    </div>
    
   
</body>
</html>
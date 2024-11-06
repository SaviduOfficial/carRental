
<!DOCTYPE html>
<!---Ref--->



<html lang="en">
  <head>
  <link href='styles.css' rel='stylesheet' type='text/css'>
  <link href='https://netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css' rel='stylesheet' type='text/css'>
  <link href='//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.2.0/css/datepicker.min.css' rel='stylesheet' type='text/css'>
  <link href='//cdnjs.cloudflare.com/ajax/libs/bootstrap-switch/1.8/css/bootstrap-switch.css' rel='stylesheet' type='text/css'>
  

  <script src="script.js" type='text/javascript'></script>
  <script src='//cdnjs.cloudflare.com/ajax/libs/jquery/2.0.3/jquery.min.js' type='text/javascript'></script>
  <script src='//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.0.0/js/bootstrap.min.js' type='text/javascript'></script>
  <script src='//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.2.0/js/bootstrap-datepicker.min.js' type='text/javascript'></script>
  <script src='//cdnjs.cloudflare.com/ajax/libs/bootstrap-switch/1.8/js/bootstrap-switch.min.js' type='text/javascript'></script>
 
  </head>
  <body>
  <div class='container'>
    <div class='panel panel-primary dialog-panel'>
      <div class='panel-heading'>
        <h5>Vehicle Rental System [VRS] - Registration of new Vehicles</h5>
      </div>
      <div class='panel-body'>

        <!---Form Start--->
        <form class='form-horizontal' role='form' action="validate.php" method="POST">

            <!---1st Selection--->
          <div class='form-group'>
            <label class='control-label col-md-2 col-md-offset-2' >Vehicle Type</label>
            <div class='col-md-2'>
              <select class='form-control'  name="vehicletype" required>
                <option>Car</option>
                <option>Van</option>
                <option>Tuk-Tuk</option>
                <option>Bike</option>
              </select>
            </div>
          </div>

          <!---2nd Selection--->
          <div class='form-group'>
            <label class='control-label col-md-2 col-md-offset-2' >Owner's Name</label>
             <div class='col-md-8'>
              <div class='col-md-0'>           
              </div>
              <div class='col-md-3 indent-small'>
                <div class='form-group internal'>
                  <input class='form-control'  placeholder='First Name' type='text' name="firstName" required>
                </div>
              </div>
              <div class='col-md-3 indent-small'>
                <div class='form-group internal'>
                  <input class='form-control'  placeholder='Last Name' type='text' name="lastName" required>
                  
                </div>
              </div>
            </div>
          </div>

        <!--3rd selection-->
        <div class='form-group'>
            <label class='control-label col-md-2 col-md-offset-2' for='id_email'>Contact</label>
            <div class='col-md-6'>
              <div class='form-group'>
                <div class='col-md-11'>
                  <input class='form-control' id='id_email' placeholder='E-mail' type='text' name="email" required>
                </div>
              </div>
              <div class='form-group internal'>
                <div class='col-md-11'>
                  <input class='form-control' minlength="10" id='id_phone' placeholder='Phone: xxx xxx xxxx' type='text' name="phoneNumber" required>
                </div>
              </div>
            </div>
          </div>

        <!---4rd Selection--->
        <?php
        // Read the JSON file to get all th car brands
        $jsonData = file_get_contents('car-models.json');

        // Decode the JSON data into an associative array
        $brands = json_decode($jsonData, true);
        ?>
          <div class='form-group'>
            <label class='control-label col-md-2 col-md-offset-2' for='vehicleBrand'>Vehicle Make</label>
            <div class='col-md-2'>
              <select class='form-control' id='vehicleBrand' name="vehicleMake" onchange="loadModels()" required>
              <option value="">Select Make</option>
              <?php
                // Loop through the array of objects and create an <option> for each "name" field
                
                foreach ($brands as $brand) {
                    echo "<option value='" . $brand['brand'] . "'>" . $brand['brand'] . "</option>";
                }
                ?>         
              </select>
            </div>

            <!-- Populate Vehicle models-->
             <div><label class='control-label col-md-1 col-md-offset-0'>Model</label></div>
            <div class='col-md-2'>
              <select class='form-control' id="vehicleModel" name="vehicleModel" required>
                 <option value=''> Select Model </option>
                 <script>var brandData = <?php echo json_encode($brands); ?>;
                </script> 
              </select>
            </div>

        

          </div>
            <!---5th Selection--->
            <div class='form-group'>
            <label class='control-label col-md-2 col-md-offset-2'> Model Year</label>
            <div class='col-md-2'>
              <select class='form-control'  id="vehicleYear" name="year" required>
            <!-- Dynamically populated-->
              </select>
            </div>
          </div>

          
            <!---6th Selection--->
            <div class='form-group'>
            <label class='control-label col-md-2 col-md-offset-2' > Engine Capacity</label>
            <div class='col-md-2'>
              <select class='form-control'   name="eCapacity" required>
                <option>less than 100cc</option>
                <option>100cc - 150 cc</option>
                <option>151cc - 250cc</option>
                <option>251cc - 610cc</option>
                <option>611cc - 800cc</option>
                <option>801cc - 1000cc</option>
                <option>1001cc - 1300cc</option>
                <option>1301cc - 1500cc</option>
                <option>1501cc - 2000cc</option>
                <option>2001cc - 2500cc</option>
                <option>2501cc - 3000cc</option>
                <option>more than 3000cc</option>
                <option>Electric</option>
                

              </select>
            </div>

            <div><label class='control-label col-md-1 col-md-offset-0'>Milage</label></div>
            <div class='col-md-2'>
              <input class='form-control' type="number" name="milage" placeholder="milage" required>
        
            </div>

          </div>


            <!--7th selection-->
          <div class='form-group'>
            <label class='control-label col-md-3 col-md-offset-1' >Vehicle Registration Number</label>
            <div class='col-md-8'>
              <div class='col-md-2'>
                <div class='form-group internal'>
                  <input class='form-control col-md-8' placeholder='ABS' type='text' name="regNoPrt1" required>
                </div>
              </div>
              <div class='col-md-3 indent-small'>
                <div class='form-group internal'>
                  <input class='form-control' placeholder='8886' type='text' name="regNoPrt2" required>
                </div>
              </div>
            </div>
          </div>

        <!--8th selection -->
          <div class='form-group'>
            <label class='control-label col-md-2 col-md-offset-2' >Fuel Type</label>
            <div class='col-md-2'>
            <select class='form-control'  id="vehicleYear" name="fuelType" required>
                <option>Petrol 92 Octane</option>
                <option>Petrol 95 Octane</option>
                <option>Auto Diesel</option>
                <option>Super Diesel</option>
                <option>Electric</option>
                <option>Other</option>
              </select>
             </div>
          </div>


           <!--9th selection -->
          <div class='form-group'>
            <label class='control-label col-md-2 col-md-offset-2' >Vehicle Colour</label>
            <div class='col-md-8'>
              <div class='col-md-3'>
                <div class='form-group internal'>
                  <select class='form-control' name="colour" required>
                    <option>Black</option>
                    <option>Blue</option>
                    <option>Brown</option>
                    <option>Cyan</option>
                    <option>Gold</option>
                    <option>Gray</option>
                    <option>Grean</option>
                    <option>Magenta</option>
                    <option>Orange</option>
                    <option>Pink</option>
                    <option>Purple</option>
                    <option>Red</option>
                    <option>Silver</option>
                    <option>White</option> 
                    <option>Yellow</option>   
                    <option>Other</option>      
                  </select>
                </div>
              </div>
              <div class='col-md-9'>
                
              </div>
            </div>
          </div>
         
          <!--10th selection -->
          <div class='form-group'>
            <label class='control-label col-md-2 col-md-offset-2'>Images of the Vehicle</label>
            <div class='col-md-6'>
            <!--The Image selection   class='form-control'-->
            <div class="grid">
                    <div class="form-element">
                    <input type="file" id="file-1" accept="image/*" name="image1">
                    <label for="file-1" id="file-1-preview">
                        <img src="https://bit.ly/3ubuq5o" alt="">
                        <div>
                        <span>+</span>
                        </div>
                    </label>
                    </div>

                    <div class="form-element">
                    <input type="file" id="file-2" accept="image/*" name="image2">
                    <label for="file-2" id="file-2-preview">
                        <img src="https://bit.ly/3ubuq5o" alt="">
                        <div>
                        <span>+</span>
                        </div>
                    </label>
                    </div>


                    <div class="form-element">
                    <input type="file" id="file-3" accept="image/*" name="image3">
                    <label for="file-3" id="file-3-preview">
                        <img src="https://bit.ly/3ubuq5o" alt="">
                        <div>
                        <span>+</span>
                        </div>
                    </label>
                    </div>


                    
                    <div class="form-element">
                    <input type="file" id="file-4" accept="image/*" name="image4">
                    <label for="file-4" id="file-4-preview">
                        <img src="https://bit.ly/3ubuq5o" alt="">
                        <div>
                        <span>+</span>
                        </div>
                    </label>
                    </div>


                    <div class="form-element">
                    <input type="file" id="file-5" accept="image/*" name="image5">
                    <label for="file-5" id="file-5-preview">
                        <img src="https://bit.ly/3ubuq5o" alt="">
                        <div>
                        <span>+</span>
                        </div>
                    </label>
                    </div>


                    <div class="form-element">
                    <input type="file" id="file-6" accept="image/*" name="image6">
                    <label for="file-6" id="file-6-preview">
                        <img src="https://bit.ly/3ubuq5o" alt="">
                        <div>
                        <span>+</span>
                        </div>
                    </label>
                    </div>
                </div>         
            
            </div>
          </div>

            <!--Submission -->
          <div class='form-group'>
            <div class='col-md-offset-4 col-md-3'>
              <button class='btn-lg btn-primary' style="width: 205px;" type='submit' name="register">Register Vehicle</button>
            </div>
            <div class='col-md-2'>
              <button class='btn-lg btn-danger' style='float:right' type='submit' id="clearButton">Clear All</button>
            </div>
          </div>

          <script>previewBeforeUpload("file-1");</script>
          <script>previewBeforeUpload("file-2");</script>
          <script>previewBeforeUpload("file-3");</script>
          <script>previewBeforeUpload("file-4");</script>
          <script>previewBeforeUpload("file-5");</script>
          <script>previewBeforeUpload("file-6");</script>
          

          

        </form>
        <!--Form End -->

      </div>
    </div>
  </div>
  </body>
</html>
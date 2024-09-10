(document).ready



// Accessing models 

function loadModels() {

    console.log(brandData);
    var brandSelect = document.getElementById('vehicleBrand');
    var modelSelect = document.getElementById('vehicleModel');
    
    // Clear previous options
    modelSelect.innerHTML = "<option value=''> Select Model </option>";

    var selectedBrand = brandSelect.value;

    if (selectedBrand) {
        // Find the selected brand in the brandData array
        var selectedBrandData = brandData.find(function(brand) {
            return brand.brand === selectedBrand;
        });

        // If the brand is found, populate the models dropdown
        if (selectedBrandData) {
            selectedBrandData.models.forEach(function(model) {
                var option = document.createElement('option');
                option.value = model;
                option.text = model;
                modelSelect.appendChild(option);
            });
        }
    }
}


// years of vehicles

window.onload = function() {
    // Get the current year
    const currentYear = new Date().getFullYear();
    
    // Get the dropdown element
    const yearSelect = document.getElementById('vehicleYear');
    
    // Generate options from 1980 to current year
    for (let year = 1980; year <= currentYear; year++) {
        // Create a new option element
        let option = document.createElement('option');
        option.value = year;  // Set the value to the year
        option.text = year;   // Set the display text to the year
        // Add the option to the select element
        yearSelect.appendChild(option);
    }
};


//image uploading preview
function previewBeforeUpload(id){
    document.querySelector("#"+id).addEventListener("change",function(e){
      if(e.target.files.length == 0){
        return;
      }
      let file = e.target.files[0];
      let url = URL.createObjectURL(file);
      document.querySelector("#"+id+"-preview div").innerText = file.name;
      document.querySelector("#"+id+"-preview img").src = url;
    });
  }
  
 
  previewBeforeUpload("file-2");
  previewBeforeUpload("file-3");
  previewBeforeUpload("file-4");
  previewBeforeUpload("file-5");
  previewBeforeUpload("file-6");









// Get the "Clear All" button and form element
const clearButton = document.getElementById('clearButton');
const form = document.getElementById('vehicleForm');

// Add event listener to clear the form when the button is clicked
clearButton.addEventListener('click', function() {
  form.reset();  // Reset all the form fields
});

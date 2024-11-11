function searchVehicle() {
    const vehicleID = document.getElementById("vehicleID").value;
    const selection = document.getElementById("selection").value;

    if (vehicleID) {
        // Send AJAX request to fetchVehicle.php
        fetch(`fetchVehicle.php?vehicleID=${vehicleID}&selection=${selection}`)
            .then(response => response.text())
            .then(data => {
                // Display the result in the searchResults div
                document.getElementById("searchResults").innerHTML = data;
            })
            .catch(error => console.error("Error:", error));
    } else {
        alert("Please enter a Vehicle ID.");
    }
}

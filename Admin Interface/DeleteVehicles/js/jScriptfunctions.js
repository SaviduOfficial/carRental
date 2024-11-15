function searchVehicle() {
    const vehicleID = document.getElementById("vehicleID").value.trim();

    if (vehicleID) {
        fetch(`fetchVehicle.php?vehicleID=${vehicleID}&_=${new Date().getTime()}`)
            .then(response => {
                if (!response.ok) {
                    throw new Error(`HTTP error! status: ${response.status}`);
                }
                return response.text();
            })
            .then(data => {
                document.getElementById("searchResults").innerHTML = data;
            })
            .catch(error => console.error("Fetch error:", error));
    } else {
        alert("Please enter a Vehicle ID.");
    }
}
<?php


?>

<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="author" content="colorlib.com">
    <link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet" />
    <link href="searchstyle.css" rel="stylesheet" />
</head>
<body>

<div class="s003">
    <div class="formheader">
        <h3>Search Vehicle By ID</h3>
    </div>

    <!-- Remove action and use an ID for JavaScript handling -->
    <form id="searchForm" method="GET">
        <div class="inner-form">
            <div class="input-field first-wrap">
                <div class="input-select">
                    <select id="selection" name="selection">
                        <option value="mileage">Mileage Only</option>
                        <option value="all">All details</option>
                    </select>
                </div>
            </div>
            <div class="input-field second-wrap">
                <input id="vehicleID" name="vehicleID" type="text" placeholder="Enter VehicleID" />
            </div>
            <div class="input-field third-wrap">
                <!-- Change button type to button for JavaScript handling -->
                <button class="btn-search" type="button" onclick="searchVehicle()">
                    <svg class="svg-inline--fa fa-search fa-w-16" aria-hidden="true" data-prefix="fas" data-icon="search" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                        <path fill="currentColor" d="M505 442.7L405.3 343c-4.5-4.5-10.6-7-17-7H372c27.6-35.3 44-79.7 44-128C416 93.1 322.9 0 208 0S0 93.1 0 208s93.1 208 208 208c48.3 0 92.7-16.4 128-44v16.3c0 6.4 2.5 12.5 7 17l99.7 99.7c9.4 9.4 24.6 9.4 33.9 0l28.3-28.3c9.4-9.4 9.4-24.6.1-34zM208 336c-70.7 0-128-57.2-128-128 0-70.7 57.2-128 128-128 70.7 0 128 57.2 128 128 0 70.7-57.2 128-128 128z"></path>
                    </svg>
                </button>
            </div>
        </div>
    </form>

    <!-- Div for displaying search results -->
    <div id="searchResults" class="vehicle-details-form"></div>
</div>

<script src="js/jsfunctions.js"></script>

</body>
</html>



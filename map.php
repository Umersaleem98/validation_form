<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Google Maps Index Page</title>

    <!-- Include Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

    <!-- Style for the map container -->
    <style>
    #map {
        height: 400px;
        border: 1px solid #ccc;
    }
    </style>
</head>

<body>

    <!-- Bootstrap container for the map -->
    <div class="container mt-5">
        <div id="map"></div>
    </div>

    <!-- Include Bootstrap JS and Popper.js -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

    <!-- Include Google Maps API with your API key -->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCAG1-wS_gbdhzr7eBblkT3IMeH3o9-4hM&callback=loadMap"
        async defer></script>

    <!-- JavaScript to initialize the map -->
    <script>
    function loadMap() {
        // Specify initial location (replace with your desired coordinates)
        var pindi = {
            lat: 33.5651,
            lng: 73.0169
        };

        // Create a map object and specify the DOM element for display.
        var map = new google.maps.Map(document.getElementById('map'), {
            zoom: 4,
            center: myLatLng,
        });

        // Create a marker and set its position.
        var marker = new google.maps.Marker({
            map: map,
            position: myLatLng,
            title: 'Hello World!'
        });
    }
    </script>
</body>

</html>
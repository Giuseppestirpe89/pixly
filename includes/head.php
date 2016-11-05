    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link href="js/thumbnail-slider.css" rel="stylesheet" type="text/css" />
    <script src="js/thumbnail-slider.js" type="text/javascript"></script>
    <script src="js/val.js" type="text/javascript"></script>
    <title> Pixly &copy; </title>
    <!-- Bootstrap Core CSS -->
    <script type="text/javascript" src="js/jquery.placeholder.js"></script>
    <script type="text/javascript" src="../js/prof.js"></script>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/social.css" rel="stylesheet">
    <link href="../css/prof.css" rel="stylesheet">
    <link href="../css/members.css" rel="stylesheet">
    
    <!-- Custom CSS -->
    <link href="css/scrolling-nav.css" rel="stylesheet">
    <style>
        .carousel-inner>.item>img,
        .carousel-inner>.item>a>img {
            width: 25%;
            margin: auto
        }
    </style>
    <title> Pixly &copy; </title>
    <!-- Bootstrap Core CSS -->

        <!--google apis for the map -->
    <script src="https://maps.googleapis.com/maps/api/js?callback=myMap"></script>
    <!--javascript to get map id and dispaly on contact section -->
    <script type="text/javascript">
            // When the window has finished loading create our google map below
        google.maps.event.addDomListener(window, 'load', init);

        function init() {
            // Basic options for a simple Google Map
            // For more options see: https://developers.google.com/maps/documentation/javascript/reference#MapOptions
            var mapOptions = {
                // How zoomed in you want the map to start at (always required)
                zoom: 14,

                // The latitude and longitude to center the map (always required)
                center: new google.maps.LatLng(53.3470497, -6.2444561), // Dublin
                scrollwheel: false,
            };
            // Get the HTML DOM element that will contain your map 
            // We are using a div with id="map" seen below in the <body>
            var mapElement = document.getElementById('map');
            // Create the Google Map using our element and options defined above
            var map = new google.maps.Map(mapElement, mapOptions);
            // Let's also add a marker 
            var marker = new google.maps.Marker({
                position: new google.maps.LatLng(53.3486893, -6.2453144),
                map: map,
                title: 'NCI'
            });
        }
    </script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
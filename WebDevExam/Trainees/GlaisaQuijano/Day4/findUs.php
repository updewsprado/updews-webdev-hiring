<html>
    <head>
        <title>Find Us</title>
        <link rel="stylesheet" type="text/css" href="css4.css">
    </head>
     
    <body> 
        
        <header><h1>Find Us<h1></header>
                    
        <div class="left-sidebar">
            <?php include ('navBar.php') ?>
        </div> 
        
        <div class="web-content">
            <div id="googleMap"></div>
        </div>
            
  
                    
<!-- js function -->                    
    <script
        src="http://maps.googleapis.com/maps/api/js?key=AIzaSyCbDIH7ijtua10HSdaBX0kBm7zVuJGFQwY" type="text/javascript">
    </script>

    <script>
    var myCenter = new google.maps.LatLng(50.9365642,-1.3950319); // set the center which is EEE bldg

    function initialize() { //set the properties of the map
    var mapProp = {
    center:myCenter,
    zoom:15,
    mapTypeId:google.maps.MapTypeId.ROADMAP
    };

    var map = new google.maps.Map(document.getElementById("googleMap"),mapProp);

    var marker = new google.maps.Marker({
    position:myCenter,
    });

    marker.setMap(map);
    }

    google.maps.event.addDomListener(window, 'load', initialize);
    </script>

    </body>
</html>
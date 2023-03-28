<?php include 'includes/session.php'; ?>
<?php include 'includes/header.php'; ?>
<nav class="navbar navbar-static-top">
    <div class="navbar-header">
        <a href="index.php" class="navbar-brand"><b>E-Commerce </b>Site</a>
    </div>
</nav>
<body>
<div class="wrapper">
    <div class="content-wrapper">
	    <div class="container">
            <script>
              function loadMap() { 
                // Location object. The exact key names of lat and lng are important.
                let location1 = {lat: <?php echo $_SESSION['delivery_address'][0]['latitude'] ?>, lng: <?php echo $_SESSION['delivery_address'][0]['longitude'] ?>};
                
                // Second location object.
                let location2 = {lat: <?php echo $_SESSION['branch_lat'] ?>, lng: <?php echo $_SESSION['branch_lng'] ?>};
                
                // The map will render to fit the element provided, which is the div with the id map.
                let myMap = new google.maps.Map(document.getElementById("map"), {zoom: 10, center: location1});
                
                // Marker to show the location we specify on the map.
                let myMarker = new google.maps.Marker({position: location1, map: myMap});

                // First Info Window
                let iw = new google.maps.InfoWindow({content: "<h5> Delivery Location </h5>", });
                myMarker.addListener("click", function () {
                  iw.open(myMap, myMarker)
                });

                // Second marker
                let myMarker2 = new google.maps.Marker({position: location2, map: myMap});

                // Second Info Window
                let iw2 = new google.maps.InfoWindow({content: "<h5> Warehouse Branch Location </h5>", });
                myMarker2.addListener("click", function () {
                  iw2.open(myMap, myMarker2)
                });

                const directionsService = new google.maps.DirectionsService();
                const directionsRenderer = new google.maps.DirectionsRenderer();

                directionsRenderer.setMap(myMap);
                directionsService
                .route({
                  origin: location1,
                  destination: location2,
                  travelMode: google.maps.TravelMode.DRIVING,
                })
                .then((response) => {
                  directionsRenderer.setDirections(response);
                })
                .catch((e) => window.alert("Directions request failed due to " + status));
              }
            </script>
        <h1 class="page-header">Your Delivery Route</h1>
        <div id="map" style="width: 800px; height: 600px"></div>
        <h1 class="page-header">Your Invoice</h1>
        <table class="table table-bordered">
                                <tbody id="tbody">
                                </tbody>
<?php include 'includes/footer.php'; ?>
</div>
</body>
<?php include 'includes/scripts.php'; ?>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDW0131G40rPrQ4xRh80sT9FwMm8vLgZ6w&callback=loadMap"></script>
<script>
var total = 0;
$(function(){

	getDetails();
	getTotal();

});

function getDetails(){
	$.ajax({
		type: 'POST',
		url: 'invoice_details.php',
		dataType: 'json',
		success: function(response){
			$('#tbody').html(response);
			getCart();
		}
	});
}

function getTotal(){
	$.ajax({
		type: 'POST',
		url: 'cart_total.php',
		dataType: 'json',
		success:function(response){
			total = response;
		}
	});
}
</script>
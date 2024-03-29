<?php include 'includes/session.php'; ?>
<?php include 'includes/header.php'; ?>
<?php include 'includes/navbar.php'; ?>
<?php
	if(isset($_SESSION['place_order'])){
		$name = $_SESSION['name'];
    $card_no = $_SESSION['card_no'];
		$exp_year = $_SESSION['exp_year'];
		$cvc = $_SESSION['cvc'];

		$conn = $pdo->open();
    
		try{
      // generates pseudo-random string for salting
      function generateRandomSalt(){
        return base64_encode(random_bytes(12));
      }
      $salt = generateRandomSalt();
        $stmt = $conn->prepare("INSERT INTO payment (name, card_no, salt, exp_year, cvc) VALUES (:name, :card_no, :salt, :exp_year, :cvc)");
        $stmt->execute(['name'=>$name, 'card_no'=>md5($card_no.$salt), 'salt'=>$salt, 'exp_year'=>$exp_year, 'cvc'=>$cvc]);
        $payid = $conn->lastInsertId();
    } 
    catch (Exception $e) {
        $_SESSION['error'] = 'An error occurred when processing your purchase.';
        echo $e->getMessage();
        header('location: checkout.php');
    }
    
    $pdo->close();
  }
?>
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
                  origin: location2,
                  destination: location1,
                  travelMode: google.maps.TravelMode.DRIVING,
                })
                .then((response) => {
                  directionsRenderer.setDirections(response);
                })
                .catch((e) => window.alert("Directions request failed due to " + status));
              }
            </script>
            <div class="alert alert-success">
            <strong>Success!</strong> Your purchase was processed.
        </div>
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
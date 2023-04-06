<?php include 'includes/session.php'; ?>
<?php include 'includes/header.php'; ?>
<?php include 'includes/navbar.php'; ?>
<style>
#checkout_info {
    border-color: #F0F0F0; 
    border-style: solid; 
    border-radius: 15px; 
    padding: 25px
}
.column {
    float: left;
  width: 50%;
  padding: 15px;
}
.button {
  transition-duration: 0.4s;
  background-color: #EDB40F;
  border-radius: 12px;
  padding: 14px 40px;
  font-size: 16px;
}

.button:hover {
    background-color: #F9B901;
  color: white;
}
.action_items{
    padding-top: 20px;
}
.card {
    max-width: 500px;
    padding-right: 10px;
}
</style>
<body>
<div class="wrapper">

    <div class="content-wrapper">

	    <div class="container">

        <div class="row">
        
            <div class="column">
                <h1 class="page-header">Checkout</h1>
                <section>
                    <h3>1. Select a branch location:</h3>
                    <div id="checkout_info">
                    <select name="branch_selected" id="branch_selected" onchange="setBranchCoordinates()">
                    <option selected disabled>Select a branch:</option>
                    <?php 
                    $conn = $pdo->open();
                    try{
                        $stmt = $conn->query("SELECT DISTINCT name, address FROM branch");
                        while ($row = $stmt->fetch()) {
                            echo "<option value='" . $row['address'] . "'>" . $row['name'] . "</option>";
                        }
                    }
                    catch(PDOException $e){
                        echo "A connection cannot be established: " . $e->getMessage();
                    }
                    ?>
                    </select>
                    </div>
                    <br>
                </section>
                <section>
                    <h3>2. Select time and date for delivery:</h3>
                    <div id="checkout_info">
                        <div class="row">
                            <div class="column">
                                <h5>Select day of the week</h5>
                                <select name="day_selected">
                                    <option value="sunday">Sunday</option>
                                    <option value="monday">Monday</option>
                                    <option value="tuesday">Tuesday</option>
                                    <option value="wednesday">Wednesday</option>
                                    <option value="thursday">Thursday</option>
                                    <option value="friday">Friday</option>
                                    <option value="saturday">Saturday</option>
                                </select>
                            </div>
                            <div class="column">
                                <h5>Select time for pickup</h5>
                                <select name="day_selected">
                                    <option value="time_1">9:30 AM</option>
                                    <option value="time_2">11:00 AM</option>
                                    <option value="time_3">12:30 PM</option>
                                    <option value="time_4">2:00 PM</option>
                                    <option value="time_5">3:30 PM</option>
                                    <option value="time_6">5:00 PM</option>
                                    <option value="time_7">6:30 PM</option>
                                    <option value="time_8">8:00 PM</option>
                                    <option value="time_9">9:30 PM</option>
                                </select>
                            </div>
                </section>
                <section>
                <h3>3. Delivery address</h3>
                <div id="checkout_info">
                    <div class="form-group has-feedback">
                    <input type="text" class="form-control" id="address" name="address" placeholder="Address" value="<?php echo (isset($_SESSION['address'])) ? $_SESSION['address'] : '' ?>" required>
                    <span class="glyphicon glyphicon-home form-control-feedback"></span>
                    </div>
                </div>
                </section>
            </div>

            <div class="column">
            <h1 class="page-header">Payment Details</h1>
                <div class="container">
                    <div class="card">
                            <form action="invoice.php" method="POST">
                            <div class="row gx-3">
                                <div class="col-12">
                                    <div class="d-flex flex-column">
                                        <p class="text mb-1">Cardholder Name</p>
                                        <input class="form-control mb-3" type="text" name="name" placeholder="John Doe">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="d-flex flex-column">
                                        <p class="text mb-1">Card Number</p>
                                        <input class="form-control mb-3" type="text" name="card_no" placeholder="1234 5678 435678">
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="d-flex flex-column">
                                        <p class="text mb-1">Expiry Year</p>
                                        <input class="form-control mb-3" type="text" name="exp_year" placeholder="MM/YYYY">
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="d-flex flex-column">
                                        <p class="text mb-1">CVV/CVC</p>
                                        <input class="form-control mb-3 pt-2" type="text" name="cvc" placeholder="1234">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>

        </div>

        <div class="action_items">
            <div class="column">
                <a href="cart_view.php">Back</a>
            </div>
            <div class="column">
                <button type="submit" class="btn btn-warning btn-lg" name="place_order" style="float:right;"><i class="fa fa-shopping-cart"></i> Place Order</button>
                    <input type="hidden" name="latitude" id="latitude">
                    <input type="hidden" name="longitude" id="longitude">
                    <input type="hidden" name="branch_lat" id="branch_lat">
                    <input type="hidden" name="branch_lng" id="branch_lng">
                </form>
            </div>
        </div>
       </div>
    </div>    
        <?php include 'includes/footer.php'; ?>
</div>
 
</body>
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDW0131G40rPrQ4xRh80sT9FwMm8vLgZ6w&libraries=places"></script>
<script>

    google.maps.event.addDomListener(window, 'load', initialize);
  
    function initialize() {
      var input = document.getElementById("address")
      var autocomplete = new google.maps.places.Autocomplete(input)
  
      autocomplete.addListener('place_changed', function () {
        var place = autocomplete.getPlace();
        let latitude = place.geometry['location'].lat()
        let longitude = place.geometry['location'].lng()
        document.querySelector("#latitude").setAttribute("value", latitude)
        document.querySelector("#longitude").setAttribute("value", longitude)
      })
    }
    
    function setBranchCoordinates() {
      const callback = function (predictions, status) {
        if (status != google.maps.places.PlacesServiceStatus.OK || !predictions) {
         alert(status);
          return;
        }
        
        let place_id = predictions[0].place_id
        
        const geocoder = new google.maps.Geocoder();
        geocoder.geocode({placeId: place_id}).then(({results}) => {
          let lat = results[0].geometry.location.lat();
          let lng = results[0].geometry.location.lng();

          document.querySelector("#branch_lat").setAttribute("value", lat)
          document.querySelector("#branch_lng").setAttribute("value", lng)
        })
      }

      branchSelect = document.querySelector("#branch_selected");
      branchAddress = branchSelect[branchSelect.selectedIndex].value;
      
      const service = new google.maps.places.AutocompleteService();
      service.getQueryPredictions({ input: branchAddress + ", Canada" }, callback);
    }
    
  </script>
<?php include 'includes/scripts.php'; ?>
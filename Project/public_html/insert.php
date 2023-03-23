<?php include 'includes/session.php'; ?>
<?php include 'includes/header.php'; ?>
<body class="hold-transition">
<div class="wrapper">

	<?php include 'includes/navbar.php'; ?>
    <div class="content-wrapper">
	    <div class="container">
        <script>
            function selectedTable(that) {
                if (that.value == "category") {
                    document.getElementById("insert_info").innerHTML = "<form><input type='id' id='number' placeholder='Enter Category ID' name='id'><input type='text' id='name' placeholder='Enter category name' name='name'><input type='text' id='genre' placeholder='Enter genre' name='genre'></form> ";
                    document.getElementById("insert_info").style.display = "block";
                }
                else if (that.value == "items") {
                    document.getElementById("insert_info").innerHTML = "<form><input type='number' id='id_num' placeholder='Enter Item ID' name='id'><input type='number' id='category_id' placeholder='Enter category ID' name='category_id'><input type='text' id='item_name' placeholder='Enter item name' name='item_name'><input type='text' id='keyword' placeholder='Enter keyword' name='keyword'><input type='text' id='dept_code' placeholder='Enter department code' name='dept_code'><input type='text' id='made_in' placeholder='Enter country of origin' name='made_in'><input type='number' id='price' placeholder='Enter price' name='price'><input type='text' id='desc' placeholder='Enter item description' name='desc'><input type='text' id='code' placeholder='Enter item code' name='code'><input type='text' id='photo' placeholder='Enter item image URL' name='photo'><input type='number' id='counter' placeholder='Enter item quantity' name='counter'></form> ";
                    document.getElementById("insert_info").style.display = "block";
                }
                else if (that.value == "cart") {
                    document.getElementById("insert_info").innerHTML = "<form><input type='id' id='number' placeholder='Enter Cart ID' name='id'><input type='text' id='username' placeholder='Enter username' name='username'><input type='text' id='password' placeholder='Enter password' name='password'><input type='text' id='name' placeholder='Enter full name' name='name'><input type='phone' id='telephone' placeholder='Enter telephone number' name='telephone'><input type='email' id='email' placeholder='Enter email' name='email'><input type='text' id='address' placeholder='Enter address' name='address'><input type='text' id='citycode' placeholder='Enter city code' name='citycode'></form> ";
                    document.getElementById("insert_info").style.display = "block";
                }
                else if (that.value == "user") {
                    document.getElementById("insert_info").innerHTML = "<form><input type='id' id='number' placeholder='Enter User ID' name='id'><input type='number' id='user_id' placeholder='Enter User ID' name='user_id'><input type='number' id='item_id' placeholder='Enter item ID' name='item_id'><input type='number' id='qty' placeholder='Enter quantity' name='qty'><input type='number' id='total' placeholder='Enter cart total' name='total'><input type='text' id='store_code' placeholder='Enter store code' name='store_code'></form> ";
                    document.getElementById("insert_info").style.display = "block";
                }
                else if (that.value == "order") {
                    document.getElementById("insert_info").innerHTML = "<form><input type='id' id='number' placeholder='Enter Order ID' name='id'><input type='date' id='date_issued' placeholder='Enter date issued' name='date_issued'><input type='date' id='date_received' placeholder='Enter date received' name='date_received'><input type='number' id='price' placeholder='Enter total price' name='price'><input type='text' id='pay_code' placeholder='Enter payment code' name='pay_code'><input type='number' id='user_id' placeholder='Enter User ID' name='user_ID'><input type='number' id='trip_id' placeholder='Enter Trip ID' name='trip_id'><input type='number' id='cart_id' placeholder='Enter Cart ID' name='cart_id'></form> ";
                    document.getElementById("insert_info").style.display = "block";
                }
                else if (that.value == "trip") {
                    document.getElementById("insert_info").innerHTML = "<form><input type='id' id='number' placeholder='Enter Trip ID' name='id'><input type='number' id='truck_id' placeholder='Enter Truck ID' name='truck_id'><input type='text' id='source_code' placeholder='Enter source code' name='source_code'><input type='number' id='dest_code' placeholder='Enter destination code' name='dest_code'><input type='number' id='dist_km' placeholder='Enter distance in KM' name='dist_km'><input type='number' id='price' placeholder='Enter price' name='price'></form> ";
                    document.getElementById("insert_info").style.display = "block";
                }
                else if (that.value == "truck") {
                    document.getElementById("insert_info").innerHTML = "<form><input type='id' id='number' placeholder='Enter Truck ID' name='id'><input type='number' id='truck_code' placeholder='Enter truck code' name='truck_code'><input type='number' id='avail_code' placeholder='Enter availability code' name='avail_code'></form> ";
                    document.getElementById("insert_info").style.display = "block";
                } else {
                    document.getElementById("insert_info").style.display = "none";
                }
            }
        </script>
	    <!-- Main content -->
	    <section class="content">
	        <div class="row">
	        	<div class="col-sm-9">
                <h1 class="page-header">Insert</h1>
                <p> Select which table to insert into: </p>
                <select onchange="selectedTable(this);">
                    <option value="category">Category</option>
                    <option value="items">Items</option>
                    <option value="cart">Shopping Cart</option>
                    <option value="user">User</option>
                    <option value="truck">Truck</option>
                    <option value="trip">Trip</option>
                    <option value="order">Order</option>
                </select>

                <div id="insert_info" style="display: none;">
                            
                </div>
                </div>
	        </div>
        </section>
	     
	    </div>
	</div>

<?php include 'includes/footer.php'; ?>
</div>

<?php include 'includes/scripts.php'; ?>
</body>
</html>
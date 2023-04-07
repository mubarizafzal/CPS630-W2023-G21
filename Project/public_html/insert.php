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
                    content = 1;
                    document.getElementById('select_info').innerHTML = document.getElementById('content' + content).innerHTML
                    document.getElementById("select_info").style.display = "block";
                    document.getElementById('maincontent').style.display = "none";
                }
                else if (that.value == "items") {
                    content = 2;
                    document.getElementById('select_info').innerHTML = document.getElementById('content' + content).innerHTML
                    document.getElementById("select_info").style.display = "block";
                }
                else if (that.value == "review") {
                    content = 3;
                    document.getElementById('select_info').innerHTML = document.getElementById('content' + content).innerHTML
                    document.getElementById("select_info").style.display = "block";
                    document.getElementById('maincontent').style.display = "none";
                }
                else if (that.value == "user") {
                    content = 4;
                    document.getElementById('select_info').innerHTML = document.getElementById('content' + content).innerHTML
                    document.getElementById("select_info").style.display = "block";
                    document.getElementById('maincontent').style.display = "none";
                }
                else if (that.value == "truck") {
                    content = 5;
                    document.getElementById('select_info').innerHTML = document.getElementById('content' + content).innerHTML
                    document.getElementById("select_info").style.display = "block";
                    document.getElementById('maincontent').style.display = "none";
                } 
                else if (that.value == "trip") {
                    content = 6;
                    document.getElementById('select_info').innerHTML = document.getElementById('content' + content).innerHTML
                    document.getElementById("select_info").style.display = "block";
                    document.getElementById('maincontent').style.display = "none";
                }
                else if (that.value == "order_placed") {
                    content = 7;
                    document.getElementById('select_info').innerHTML = document.getElementById('content' + content).innerHTML
                    document.getElementById("select_info").style.display = "block";
                    document.getElementById('maincontent').style.display = "none";
                } 
                else if (that.value == "branch") {
                    content = 8;
                    document.getElementById('select_info').innerHTML = document.getElementById('content' + content).innerHTML
                    document.getElementById("select_info").style.display = "block";
                    document.getElementById('maincontent').style.display = "none";
                } else {
                    document.getElementById("select_info").style.display = "none";
                }
            }
            
            </script>
	    <!-- Main content -->
	    <section class="content">
	        <div class="row">
	        	<div class="col-sm-9">
                <h1 class="page-header">Insert</h1>
                <p> Choose which table to insert into: </p>
                <select onchange="selectedTable(this);">
                    <option selected value="">Select a table</option>
                    <option value="items">Items</option>
                    <option value="user">User</option>
                    <option value="category">Category</option>
                    <option value="review">Review</option>
                    <option value="truck">Truck</option>
                    <option value="trip">Trip</option>
                    <option value="order_placed">Order</option>
                    <option value="branch">Branch</option>
                </select>
                <div id="select_info" style="display: none;">
                
                </div>
            <div id="main_content" style="display: none;">
                <div id="content1">
                    <?php include 'insert_category.php'; ?>
                </div>
                <div id="content2">
                    <?php include 'insert_items.php'; ?>
                </div>
                <div id="content3">
                    <?php include 'insert_review.php'; ?>
                </div>
                <div id="content4">
                    <?php include 'insert_user.php'; ?>
                </div>
                <div id="content5">
                    <?php include 'insert_truck.php'; ?>
                </div>
                <div id="content6">
                    <?php include 'insert_trip.php'; ?>
                </div>
                <div id="content7">
                    <?php include 'insert_order.php'; ?>
                </div>
                <div id="content8">
                    <?php include 'insert_branch.php'; ?>
                </div>
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
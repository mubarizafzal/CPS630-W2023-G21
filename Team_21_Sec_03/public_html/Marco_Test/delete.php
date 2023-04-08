<?php include 'includes/session.php'; ?>
<?php include 'includes/header.php'; ?>
<body class="hold-transition">
<div class="wrapper">

	<?php include 'includes/navbar.php'; ?>
    <div class="content-wrapper">
	    <div class="container">
            <style>
                th, td {
                padding: 15px;
                }
            </style>
        <script>
            function selectedTable(that) {
                if (that.value == "category") {
                    document.getElementById("delete_info").innerHTML = "<br><p> Select which column(s) to delete: </p><table> <tr> <th><b>#</b></th> <th><b>Name</b></th> <th><b>Type</b></th> <th><b>Null</b></th> <th><b>Action</b></th> </tr> <tr> <td>1</td> <td><b>id (PK)</b></td> <td>int(11)</td> <td>No</td> <td><button type='button' class='btn btn-danger btn-flat cart_delete'><i class='fa fa-remove'></i></button></td> <tr> <tr> <td>2</td> <td><b>nae</b></td> <td>varchar(100)</td> <td>No</td> <td><button type='button' class='btn btn-danger btn-flat cart_delete'><i class='fa fa-remove'></i></button></td> <tr> <tr> <td>3</td> <td><b>genre</b></td> <td>varchar(100)</td> <td>No</td> <td><button type='button' class='btn btn-danger btn-flat cart_delete'><i class='fa fa-remove'></i></button></td> <tr> </table> ";
                    document.getElementById("delete_info").style.display = "block";
                }
                else if (that.value == "items") {
                    document.getElementById("delete_info").innerHTML = "<br><p> Select which column(s) to delete: </p><table> <tr> <th><b>#</b></th> <th><b>Name</b></th> <th><b>Type</b></th> <th><b>Null</b></th> <th><b>Action</b></th> </tr> <tr> <td>1</td> <td><b>id (PK)</b></td> <td>int(11)</td> <td>No</td> <td><button type='button' class='btn btn-danger btn-flat cart_delete'><i class='fa fa-remove'></i></button></td> <tr> <tr> <td>2</td> <td><b>category_id</b></td> <td>int(11)</td> <td>No</td> <td><button type='button' class='btn btn-danger btn-flat cart_delete'><i class='fa fa-remove'></i></button></td> <tr> <tr> <td>3</td> <td><b>item_name</b></td> <td>text</td> <td>No</td> <td><button type='button' class='btn btn-danger btn-flat cart_delete'><i class='fa fa-remove'></i></button></td> <tr> <tr> <td>4</td> <td><b>keyword</b></td> <td>varchar(200)</td> <td>No</td> <td><button type='button' class='btn btn-danger btn-flat cart_delete'><i class='fa fa-remove'></i></button></td> <tr> <tr> <td>5</td> <td><b>dept_code</b></td> <td>int(11)</td> <td>No</td> <td><button type='button' class='btn btn-danger btn-flat cart_delete'><i class='fa fa-remove'></i></button></td> <tr> <tr> <td>6</td> <td><b>made_in</b></td> <td>varchar(100)</td> <td>No</td> <td><button type='button' class='btn btn-danger btn-flat cart_delete'><i class='fa fa-remove'></i></button></td> <tr> <tr> <td>7</td> <td><b>price</b></td> <td>double</td> <td>No</td> <td><button type='button' class='btn btn-danger btn-flat cart_delete'><i class='fa fa-remove'></i></button></td> <tr> <tr> <td>8</td> <td><b>description</b></td> <td>text</td> <td>No</td> <td><button type='button' class='btn btn-danger btn-flat cart_delete'><i class='fa fa-remove'></i></button></td> <tr> <tr> <td>9</td> <td><b>code</b></td> <td>varchar(100)</td> <td>No</td> <td><button type='button' class='btn btn-danger btn-flat cart_delete'><i class='fa fa-remove'></i></button></td> <tr> <tr> <td>10</td> <td><b>photo</b></td> <td>varchar(200)</td> <td>No</td> <td><button type='button' class='btn btn-danger btn-flat cart_delete'><i class='fa fa-remove'></i></button></td> <tr> <tr> <td>11</td> <td><b>counter</b></td> <td>int(11)</td> <td>No</td> <td><button type='button' class='btn btn-danger btn-flat cart_delete'><i class='fa fa-remove'></i></button></td> <tr> </table> ";
                    document.getElementById("delete_info").style.display = "block";
                }
                else if (that.value == "cart") {
                    document.getElementById("delete_info").innerHTML = "<br><p> Select which column(s) to delete: </p><table> <tr> <th><b>#</b></th> <th><b>Name</b></th> <th><b>Type</b></th> <th><b>Null</b></th> <th><b>Action</b></th> </tr> <tr> <td>1</td> <td><b>id (PK)</b></td> <td>int(11)</td> <td>No</td> <td><button type='button' class='btn btn-danger btn-flat cart_delete'><i class='fa fa-remove'></i></button></td> <tr> <tr> <td>2</td> <td><b>user_id</b></td> <td>int(11)</td> <td>No</td> <td><button type='button' class='btn btn-danger btn-flat cart_delete'><i class='fa fa-remove'></i></button></td> <tr> <tr> <td>3</td> <td><b>item_id</b></td> <td>int(11)</td> <td>No</td> <td><button type='button' class='btn btn-danger btn-flat cart_delete'><i class='fa fa-remove'></i></button></td> <tr> <tr> <td>4</td> <td><b>quantity</b></td> <td>int(11)</td> <td>No</td> <td><button type='button' class='btn btn-danger btn-flat cart_delete'><i class='fa fa-remove'></i></button></td> <tr> <tr> <td>5</td> <td><b>total</b></td> <td>int(11)</td> <td>No</td> <td><button type='button' class='btn btn-danger btn-flat cart_delete'><i class='fa fa-remove'></i></button></td> <tr> <tr> <td>6</td> <td><b>store_code</b></td> <td>varchar(11)</td> <td>No</td> <td><button type='button' class='btn btn-danger btn-flat cart_delete'><i class='fa fa-remove'></i></button></td> <tr> </table>";
                    document.getElementById("delete_info").style.display = "block";
                }
                else if (that.value == "user") {
                    document.getElementById("delete_info").innerHTML = "<br><p> Select which column(s) to delete: </p><table> <tr> <th><b>#</b></th> <th><b>Name</b></th> <th><b>Type</b></th> <th><b>Null</b></th> <th><b>Action</b></th> </tr> <tr> <td>1</td> <td><b>id (PK)</b></td> <td>int(11)</td> <td>No</td> <td><button type='button' class='btn btn-danger btn-flat cart_delete'><i class='fa fa-remove'></i></button></td> <tr> <tr> <td>2</td> <td><b>username</b></td> <td>text</td> <td>No</td> <td><button type='button' class='btn btn-danger btn-flat cart_delete'><i class='fa fa-remove'></i></button></td> <tr> <tr> <td>3</td> <td><b>password</b></td> <td>text</td> <td>No</td> <td><button type='button' class='btn btn-danger btn-flat cart_delete'><i class='fa fa-remove'></i></button></td> <tr> <tr> <td>4</td> <td><b>name</b></td> <td>text</td> <td>No</td> <td><button type='button' class='btn btn-danger btn-flat cart_delete'><i class='fa fa-remove'></i></button></td> <tr> <tr> <td>5</td> <td><b>telephone</b></td> <td>text</td> <td>No</td> <td><button type='button' class='btn btn-danger btn-flat cart_delete'><i class='fa fa-remove'></i></button></td> <tr> <tr> <td>6</td> <td><b>email</b></td> <td>text</td> <td>No</td> <td><button type='button' class='btn btn-danger btn-flat cart_delete'><i class='fa fa-remove'></i></button></td> <tr> <tr> <td>7</td> <td><b>address</b></td> <td>text</td> <td>No</td> <td><button type='button' class='btn btn-danger btn-flat cart_delete'><i class='fa fa-remove'></i></button></td> <tr> <tr> <td>8</td> <td><b>citycode</b></td> <td>text</td> <td>No</td> <td><button type='button' class='btn btn-danger btn-flat cart_delete'><i class='fa fa-remove'></i></button></td> <tr> <tr> <td>9</td> <td><b>balance</b></td> <td>float</td> <td>No</td> <td><button type='button' class='btn btn-danger btn-flat cart_delete'><i class='fa fa-remove'></i></button></td> <tr> </table>";
                    document.getElementById("delete_info").style.display = "block";
                }
                else if (that.value == "order") {
                    document.getElementById("delete_info").innerHTML = "<br><p> Select which column(s) to delete: </p><table> <tr> <th><b>#</b></th> <th><b>Name</b></th> <th><b>Type</b></th> <th><b>Null</b></th> <th><b>Action</b></th> </tr> <tr> <td>1</td> <td><b>id (PK)</b></td> <td>int(11)</td> <td>No</td> <td><button type='button' class='btn btn-danger btn-flat cart_delete'><i class='fa fa-remove'></i></button></td> <tr> <tr> <td>2</td> <td><b>user_id</b></td> <td>int(11)</td> <td>No</td> <td><button type='button' class='btn btn-danger btn-flat cart_delete'><i class='fa fa-remove'></i></button></td> <tr> <tr> <td>3</td> <td><b>shopping_cart_id</b></td> <td>int(11)</td> <td>No</td> <td><button type='button' class='btn btn-danger btn-flat cart_delete'><i class='fa fa-remove'></i></button></td> <tr> <tr> <td>4</td> <td><b>item_id</b></td> <td>int(11)</td> <td>No</td> <td><button type='button' class='btn btn-danger btn-flat cart_delete'><i class='fa fa-remove'></i></button></td> <tr> <tr> <td>5</td> <td><b>trip_id</b></td> <td>int(11)</td> <td>No</td> <td><button type='button' class='btn btn-danger btn-flat cart_delete'><i class='fa fa-remove'></i></button></td> <tr> <tr> <td>6</td> <td><b>date_issued</b></td> <td>date</td> <td>No</td> <td><button type='button' class='btn btn-danger btn-flat cart_delete'><i class='fa fa-remove'></i></button></td> <tr> <tr> <td>7</td> <td><b>date_received</b></td> <td>date</td> <td>No</td> <td><button type='button' class='btn btn-danger btn-flat cart_delete'><i class='fa fa-remove'></i></button></td> <tr> <tr> <td>8</td> <td><b>total</b></td> <td>int(11)</td> <td>No</td> <td><button type='button' class='btn btn-danger btn-flat cart_delete'><i class='fa fa-remove'></i></button></td> <tr> <tr> <td>9</td> <td><b>pay_code</b></td> <td>varchar(11)</td> <td>No</td> <td><button type='button' class='btn btn-danger btn-flat cart_delete'><i class='fa fa-remove'></i></button></td> <tr> </table> ";
                    document.getElementById("delete_info").style.display = "block";
                }
                else if (that.value == "trip") {
                    document.getElementById("delete_info").innerHTML = "<br><p> Select which column(s) to delete: </p><table> <tr> <th><b>#</b></th> <th><b>Name</b></th> <th><b>Type</b></th> <th><b>Null</b></th> <th><b>Action</b></th> </tr> <tr> <td>1</td> <td><b>id (PK)</b></td> <td>int(11)</td> <td>No</td> <td><button type='button' class='btn btn-danger btn-flat cart_delete'><i class='fa fa-remove'></i></button></td> <tr> <tr> <td>2</td> <td><b>source_code</b></td> <td>int(11)</td> <td>No</td> <td><button type='button' class='btn btn-danger btn-flat cart_delete'><i class='fa fa-remove'></i></button></td> <tr> <tr> <td>3</td> <td><b>dest_code</b></td> <td>int(11)</td> <td>No</td> <td><button type='button' class='btn btn-danger btn-flat cart_delete'><i class='fa fa-remove'></i></button></td> <tr> <tr> <td>4</td> <td><b>dist_km</b></td> <td>int(11)</td> <td>No</td> <td><button type='button' class='btn btn-danger btn-flat cart_delete'><i class='fa fa-remove'></i></button></td> <tr> <tr> <td>5</td> <td><b>truck_id</b></td> <td>int(11)</td> <td>No</td> <td><button type='button' class='btn btn-danger btn-flat cart_delete'><i class='fa fa-remove'></i></button></td> <tr> <tr> <td>6</td> <td><b>price</b></td> <td>double</td> <td>No</td> <td><button type='button' class='btn btn-danger btn-flat cart_delete'><i class='fa fa-remove'></i></button></td> <tr> </table>";
                    document.getElementById("delete_info").style.display = "block";
                }
                else if (that.value == "truck") {
                    document.getElementById("delete_info").innerHTML = "<br><p> Select which column(s) to delete: </p><table> <tr> <th><b>#</b></th> <th><b>Name</b></th> <th><b>Type</b></th> <th><b>Null</b></th> <th><b>Action</b></th> </tr> <tr> <td>1</td> <td><b>id (PK)</b></td> <td>int(11)</td> <td>No</td> <td><button type='button' class='btn btn-danger btn-flat cart_delete'><i class='fa fa-remove'></i></button></td> <tr> <tr> <td>2</td> <td><b>truck_code</b></td> <td>int(11)</td> <td>No</td> <td><button type='button' class='btn btn-danger btn-flat cart_delete'><i class='fa fa-remove'></i></button></td> <tr> <tr> <td>3</td> <td><b>avail_code</b></td> <td>int(11)</td> <td>No</td> <td><button type='button' class='btn btn-danger btn-flat cart_delete'><i class='fa fa-remove'></i></button></td> <tr> </table>";
                    document.getElementById("delete_info").style.display = "block";
                } else {
                    document.getElementById("delete_info").style.display = "none";
                }
            }
        </script>
	    <!-- Main content -->
	    <section class="content">
	        <div class="row">
	        	<div class="col-sm-9">
                <h1 class="page-header">Delete</h1>
                <p> Select which tables to delete from: </p>
                <select onchange="selectedTable(this);">
                    <option value="category">Category</option>
                    <option value="items">Items</option>
                    <option value="cart">Shopping Cart</option>
                    <option value="user">User</option>
                    <option value="truck">Truck</option>
                    <option value="trip">Trip</option>
                    <option value="order">Order</option>
                </select>
                <div id="delete_info" style="display: none;">
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
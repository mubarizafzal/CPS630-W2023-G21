<?php include 'includes/session.php'; ?>

<?php include 'includes/header.php'; ?>
<body>
<div class="wrapper">

	<?php include 'includes/navbar.php'; ?>
    <div class="content-wrapper">
	    <div class="container">

	      <!-- Main content -->
	      <section class="content">
	        <div class="row">
	        	<div class="col-sm-9">
	        		<h1 class="page-header">Your Cart</h1>
	        		<div class="box box-solid">
	        			<div class="box-body">
		        		<table class="table table-bordered">
                            <thead>
                                    <th></th>
                                    <th>Photo</th>
                                    <th>Name</th>
                                    <th>Price</th>
                                    <th width="20%">Quantity</th>
                                    <th>Subtotal</th>
                                </thead>
                                <tbody id="tbody">
                                </tbody>
                            </table>
                            </div>
                        </div>

						<h1>Top Recommendations Based on You</h1>

						<?php
						$conn = $pdo->open();

						try{
							$inc = 3;	
							
							$stmt = $conn->prepare("SELECT * FROM items WHERE id BETWEEN 1 AND 18 ORDER BY RAND() LIMIT 3;");
							$stmt->execute();
							foreach ($stmt as $row) {
								$image = (!empty($row['photo'])) ? 'images/'.$row['photo'] : 'images/noimage.jpg';
								$inc = ($inc == 3) ? 1 : $inc + 1;
								if($inc == 1) echo "<div class='row'>";
								echo "
									<div class='col-sm-4'>
										<div class='box box-solid' id='".$row['item_name'].'_'.$row['id'].'_'.$row['price']."'>
											<div draggable='true' class='box-body prod-body'>
												<img src='".$image."' width='100%' height='230px' class='thumbnail'>
												<h5><a href='product.php?item=".$row['code']."'>".$row['item_name']."</a></h5>
											</div>
											<div class='box-footer'>
												<b>&#36; ".number_format($row['price'], 2)."</b>
											</div>
										</div>
									</div>
								";
								if($inc == 3) echo "</div>";
							}
							if($inc == 1) echo "<div class='col-sm-4'></div><div class='col-sm-4'></div></div>"; 
							if($inc == 2) echo "<div class='col-sm-4'></div></div>";
						}
						catch(PDOException $e){
							echo "A connection cannot be established: " . $e->getMessage();
						}
						$pdo->close();
						?> 



                        <?php
	        			if(isset($_SESSION['user'])){
	        				echo "
	        					<div id='pay-button'></div>
	        				";
	        			}
	        			else{
	        				echo "
	        					<h4>You need to <a href='signin.php'>Login</a> to checkout.</h4>
	        				";
	        			}
	        		?>
                <form method="POST" action="checkout.php">
				<input type="submit" value="Continue to checkout" style="background-color: #E9C36B;" class="btn">
				</form>
			</div>
            </div>
        </section>
        </div>
	  </div>
  	<?php $pdo->close(); ?>
  	<?php include 'includes/footer.php'; ?>
</div>

<?php include 'includes/scripts.php'; ?>
<script>
var total = 0;
$(function(){
	$(document).on('click', '.cart_delete', function(e){
		e.preventDefault();
		var id = $(this).data('id');
		$.ajax({
			type: 'POST',
			url: 'cart_delete.php',
			data: {id:id},
			dataType: 'json',
			success: function(response){
				if(!response.error){
					getDetails();
					getCart();
					getTotal();
				}
			}
		});
	});

	$(document).on('click', '.minus', function(e){
		e.preventDefault();
		var id = $(this).data('id');
		var qty = $('#qty_'+id).val();
		if(qty>1){
			qty--;
		}
		$('#qty_'+id).val(qty);
		$.ajax({
			type: 'POST',
			url: 'cart_update.php',
			data: {
				id: id,
				qty: qty,
			},
			dataType: 'json',
			success: function(response){
				if(!response.error){
					getDetails();
					getCart();
					getTotal();
				}
			}
		});
	});

	$(document).on('click', '.add', function(e){
		e.preventDefault();
		var id = $(this).data('id');
		var qty = $('#qty_'+id).val();
		qty++;
		$('#qty_'+id).val(qty);
		$.ajax({
			type: 'POST',
			url: 'cart_update.php',
			data: {
				id: id,
				qty: qty,
			},
			dataType: 'json',
			success: function(response){
				if(!response.error){
					getDetails();
					getCart();
					getTotal();
				}
			}
		});
	});

	getDetails();
	getTotal();

});

function getDetails(){
	$.ajax({
		type: 'POST',
		url: 'cart_details.php',
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
<?php include 'includes/session.php'; ?>
<?php include 'includes/header.php'; ?>
<body>
<div class="wrapper">
<?php include 'includes/navbar.php'; ?>
<body>
<div class="wrapper">
    <div class="content-wrapper">
	    <div class="container">
            <script>

            </script>
        <h1 class="page-header">Your Invoice</h1>
        <div class="alert alert-success">
            <strong>Success!</strong> Your purchase was processed.
        </div>
        <table class="table table-bordered">
                                <tbody id="tbody">
                                </tbody>
<?php include 'includes/footer.php'; ?>
</div>
</body>
<?php include 'includes/scripts.php'; ?>
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
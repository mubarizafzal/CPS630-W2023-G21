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

            </script>
        <h1 class="page-header">Your Invoice</h1>
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
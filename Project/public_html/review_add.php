<?php
  include 'includes/session.php';

	$output = array('error'=>false);

  $conn = $pdo->open();

  $name = $_POST['name'];
  $reviewed_product = $_POST['reviewed_product'];
  $product_rating = $_POST['product_rating'];
  $services_rating = $_POST['services_rating'];
  $review = $_POST['review_text'];

  try {
    $stmt = $conn->prepare("INSERT INTO review (product_rating, overall_rating, product_rated, review, customer_name) VALUES (:product_rating, :overall_rating, :product_rated, :review, :customer_name)");
    $stmt->execute(['product_rating'=>$product_rating, 'overall_rating'=>$services_rating, 'product_rated'=>$reviewed_product, 'review'=>$review, 'customer_name'=>$name]);
    $output['message'] = 'Review was added.';
    
  }
  catch(PDOException $e){
    $output['error'] = true;
    $output['message'] = $e->getMessage();
  }

	$pdo->close();
	echo json_encode($output);

?>
<?php
  ob_start();

  include 'includes/session.php';

	$output = array('error'=>false);

  $conn = $pdo->open();

  $data['latitude'] = $_POST['latitude'];
  $data['longitude'] = $_POST['longitude'];

  // Set session cookie for branch coordinates
  $_SESSION["branch_lat"] = $_POST['branch_lat'];
  $_SESSION["branch_lng"] = $_POST['branch_lng'];

  // Need to reset the address now
  $_SESSION['delivery_address'] = array();

  // Set session cookies for card information
  $_SESSION["place_order"] = "1";//$_POST['place_order'];
  $_SESSION["name"] = $_POST['name'];
  $_SESSION["card_no"] = $_POST['card_no'];
  $_SESSION["exp_year"] = $_POST['exp_year'];
  $_SESSION["cvc"] = $_POST['cvc'];


  if(array_push($_SESSION['delivery_address'], $data)){
    $output['message'] = 'Delivery address coordinates saved.';
  }
  else{
    $output['error'] = true;
    $output['message'] = 'Unable to save address.';
  }

	$pdo->close();
	echo json_encode($output);
?>
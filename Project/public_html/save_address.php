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
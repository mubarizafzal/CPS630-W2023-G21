<?php
	include 'includes/session.php';
	$conn = $pdo->open();
 
  if(isset($_SESSION['user'])){
    unset($_SESSION['user']);
  }

  header('location: index.php');
 ?>
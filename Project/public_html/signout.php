<?php
	include 'includes/session.php';
	$conn = $pdo->open();
 
  if(isset($_SESSION['user'])){
    unset($_SESSION['user']);
  }
  if(isset($_SESSION['admin'])){
    unset($_SESSION['admin']);
  }

  header('location: index.php');
 ?>
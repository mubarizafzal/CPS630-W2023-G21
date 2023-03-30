<?php
  include 'includes/session.php';

  $conn = $pdo->open();

  $branch = $_POST['branch'];

  $_SESSION['branch'] = $branch;

  $pdo->close();
  echo json_encode(array("message" => "The branch was updated successfully."));
?>
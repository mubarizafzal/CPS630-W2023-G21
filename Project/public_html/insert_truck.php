<?php
  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    include 'includes/session.php';
    $conn = $pdo->open();

    $trip_id = $_POST['trip_id'];
    $item_name = $_POST['item_name'];
    $avail_code = $_POST['avail_code'];
    $review = $_POST['review'];
    $made_in = $_POST['made_in'];
    $customer_name = $_POST['prcustomer_nameice'];
    $description = $_POST['description'];
    $code = $_POST['code'];
    $photo = $_POST['photo'];
    $counter = $_POST['counter'];

    try {
        $sql = "INSERT INTO truck (trip_id, item_name, avail_code)
            VALUES ('$trip_id', '$overall_rating', '$avail_code')";

        $conn->exec($sql);
        $pdo->close();
        header('location: insert.php');
        exit();
    } catch(PDOException $e) {
      echo "Error: " . $e->getMessage();
    }
  }
?>

<form method="POST" action="insert_truck.php">
    <label for="trip_id">Trip ID:</label><br>
    <input type="number" name="trip_id" id="trip_id"><br><br>
    <label for="item_name">Item Name:</label><br>
    <input type="number" name="item_name" id="item_name"><br><br>
    <label for="avail_code">Availability Code:</label><br>
    <input type="number" name="avail_code" id="avail_code"><br><br>
    <input type="submit" value="Add Item"><br>
  </form>
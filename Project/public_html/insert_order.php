<?php
  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    include 'includes/session.php';
    $conn = $pdo->open();

    $user_id = $_POST['user_id'];
    $shopping_cart_id = $_POST['shopping_cart_id'];
    $item_id = $_POST['item_id'];
    $trip_id = $_POST['trip_id'];
    $date_issued = $_POST['date_issued'];
    $date_received = $_POST['date_received'];
    $total = $_POST['total'];
    $pay_code = $_POST['pay_code'];

    try {
        $sql = "INSERT INTO order_placed (user_id, shopping_cart_id, item_id, trip_id, date_issued, date_received, total, pay_code)
            VALUES ('$user_id', '$shopping_cart_id', '$item_id', '$trip_id', '$date_issued', '$date_received', '$total', '$pay_code')";

        $conn->exec($sql);
        $pdo->close();
        header('location: insert.php');
        exit();
    } catch(PDOException $e) {
      echo "Error: " . $e->getMessage();
    }
  }
?>

<form method="POST" action="insert_order.php">
    <label for="user_id">User ID:</label><br>
    <input type="number" name="user_id" id="user_id"><br><br>
    <label for="shopping_cart_id">Shopping Cart ID:</label><br>
    <input type="number" name="shopping_cart_id" id="shopping_cart_id"><br><br>
    <label for="item_id">Item ID:</label><br>
    <input type="number" name="item_id" id="item_id"><br><br>
    <label for="trip_id">Trip ID:</label><br>
    <input type="number" name="trip_id" id="trip_id"><br><br>
    <label for="date_issued">Date Issued:</label><br>
    <input type="date" name="date_issued" id="date_issued"><br><br>
    <label for="date_received">Date Received:</label><br>
    <input type="date" name="date_received" id="date_received"><br><br>
    <label for="total">Total:</label><br>
    <input type="number" name="total" id="total"><br><br>
    <label for="pay_code">Pay Code:</label><br>
    <input type="text" name="pay_code" id="pay_code"><br><br>
    <input type="submit" value="Add Item"><br>
  </form>
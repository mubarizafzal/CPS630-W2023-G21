<?php
  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    include 'includes/session.php';
    $conn = $pdo->open();

    $branch_name = $_POST['branch_name'];
    $address = $_POST['address'];
    $day_of_week = $_POST['day_of_week'];
    $open_time = $_POST['open_time'];
    $close_time = $_POST['close_time'];

    try {
        $sql = "INSERT INTO branch (name, address, day_of_week, open_time, close_time)
            VALUES ('$branch_name', '$address', '$day_of_week', '$open_time', '$close_time')";

        $conn->exec($sql);
        $pdo->close();
        header('location: insert.php');
        exit();
    } catch(PDOException $e) {
      echo "Error: " . $e->getMessage();
    }
  }
?>

<form method="POST" action="insert_branch.php">
    <label for="branch_name">Name:</label><br>
    <input type="text" name="branch_name" id="branch_name"><br><br>
    <label for="item_name">Address:</label><br>
    <input type="text" name="address" id="address"><br><br>
    <label for="day_of_week">Day Of Week:</label><br>
    <input type="number" name="day_of_week" id="day_of_week"><br><br>
    <label for="open_time">Open Time:</label><br>
    <input type="time" name="open_time" id="open_time"><br><br>
    <label for="close_time">Close Time:</label><br>
    <input type="time" name="close_time" id="close_time"><br><br>
    <input type="submit" value="Add Item"><br>
  </form>
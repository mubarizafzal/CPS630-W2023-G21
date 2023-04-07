<?php
  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    include 'includes/session.php';
    $conn = $pdo->open();

    $name = $_POST['name'];
    $genre = $_POST['genre'];

    try {
        $sql = "INSERT INTO items (category_id, item_name, keyword, dept_code, made_in, price, description, code, photo, counter)
            VALUES ('$category_id', '$item_name', '$keyword', '$dept_code', '$made_in', '$price', '$description', '$code', '$photo', '$counter')";

        $conn->exec($sql);
        $pdo->close();
        header('location: insert.php');
        exit();
    } catch(PDOException $e) {
      echo "Error: " . $e->getMessage();
    }
  }
?>

<form method="POST" action="insert_category.php">
    <label for="name">Name:</label><br>
    <input type="number" name="category_id" id="category_id"><br><br>
    <label for="genre">Genre:</label><br>
    <input type="text" name="genre" id="genre"><br><br>
    <input type="submit" value="Add Item"><br>
  </form>
<?php
  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    include 'includes/session.php';
    $conn = $pdo->open();

    $category_name = $_POST['name'];
    $genre = $_POST['genre'];

    try {
        $sql = "INSERT INTO category (name, genre)
            VALUES ('$name', '$genre')";

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
    <label for="category_name">Category Name:</label><br>
    <input type="text" name="name" id="category_name"><br><br>
    <label for="genre">Genre:</label><br>
    <input type="text" name="genre" id="genre"><br><br>
    <input type="submit" value="Add Item"><br>
  </form>
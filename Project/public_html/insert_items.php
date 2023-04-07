<?php
  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    include 'includes/session.php';
    $conn = $pdo->open();

    $category_id = $_POST['category_id'];
    $item_name = $_POST['item_name'];
    $keyword = $_POST['keyword'];
    $dept_code = $_POST['dept_code'];
    $made_in = $_POST['made_in'];
    $price = $_POST['price'];
    $description = $_POST['description'];
    $code = $_POST['code'];
    $photo = $_POST['photo'];
    $counter = $_POST['counter'];

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

<form method="POST" action="insert_items.php">
    <label for="category_id">Category ID:</label><br>
    <input type="number" name="category_id" id="category_id"><br><br>
    <label for="item_name">Item Name:</label><br>
    <input type="text" name="item_name" id="item_name"><br><br>
    <label for="keyword">Keyword:</label><br>
    <input type="text" name="keyword" id="keyword"><br><br>
    <label for="dept_code">Dept Code:</label><br>
    <input type="number" name="dept_code" id="dept_code"><br><br>
    <label for="made_in">Made In:</label><br>
    <input type="text" name="made_in" id="made_in"><br><br>
    <label for="price">Price:</label><br>
    <input type="number" name="price" id="price"><br><br>
    <label for="description">Description:</label><br>
    <textarea name="description" id="description"></textarea><br><br>
    <label for="code">Code:</label><br>
    <input type="text" name="code" id="code"><br><br>
    <label for="photo">Photo:</label><br>
    <input type="text" name="photo" id="photo"><br><br>
    <label for="counter">Counter:</label><br>
    <input type="number" name="counter" id="counter"><br><br>
    <input type="submit" value="Add Item"><br>
  </form>
<?php
  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    include 'includes/session.php';
    $conn = $pdo->open();

    $product_rating = $_POST['product_rating'];
    $overall_rating = $_POST['overall_rating'];
    $product_rated = $_POST['product_rated'];
    $review = $_POST['review'];
    $made_in = $_POST['made_in'];
    $customer_name = $_POST['prcustomer_nameice'];
    $description = $_POST['description'];
    $code = $_POST['code'];
    $photo = $_POST['photo'];
    $counter = $_POST['counter'];

    try {
        $sql = "INSERT INTO review (product_rating, overall_rating, product_rated, review, customer_name)
            VALUES ('$product_rating', '$overall_rating', '$product_rated', '$review', '$customer_name')";

        $conn->exec($sql);
        $pdo->close();
        header('location: insert.php');
        exit();
    } catch(PDOException $e) {
      echo "Error: " . $e->getMessage();
    }
  }
?>

<form method="POST" action="insert_review.php">
    <label for="product_rating">Product Rating:</label><br>
    <input type="number" name="product_rating" id="product_rating"><br><br>
    <label for="overall_rating">Overall Rating:</label><br>
    <input type="number" name="overall_rating" id="overall_rating"><br><br>
    <label for="product_rated">Product Name:</label><br>
    <input type="text" name="product_rated" id="product_rated"><br><br>
    <label for="review">Review:</label><br>
    <input type="text" name="review" id="review"><br><br>
    <label for="customer_name">Customer Name:</label><br>
    <input type="text" name="customer_name" id="customer_name"><br><br>
    <input type="submit" value="Add Item"><br>
  </form>
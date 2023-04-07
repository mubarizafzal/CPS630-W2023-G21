<?php
  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    include 'includes/session.php';
    $conn = $pdo->open();

    $username = $_POST['username'];
    $password = $_POST['password'];
    $salt = $_POST['salt'];
    $name = $_POST['name'];
    $telephone = $_POST['telephone'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $citycode = $_POST['citycode'];
    $balance = $_POST['balance'];

    try {
      $stmt = $conn->prepare("INSERT INTO user (username, password, salt, name, telephone, email, address, citycode, balance) 
                              VALUES (:username, :password, :salt, :name, :telephone, :email, :address, :citycode, :balance)");
      $stmt->execute(['username' => $username, 'password' => $password, 'salt' => $salt, 'name' => $name, 'telephone' => $telephone, 
                      'email' => $email, 'address' => $address, 'citycode' => $citycode, 'balance' => $balance]);
      $pdo->close();
      header('location: insert.php');
      exit();
    } catch(PDOException $e) {
      echo "Error: " . $e->getMessage();
    }
  }
?>

<form method="post" action="insert_user.php">
    <label>Username:</label><br>
    <input type="text" name="username"><br><br>
    <label>Password:</label><br>
    <input type="password" name="password"><br><br>
    <label>Salt:</label><br>
    <input type="text" name="salt"><br><br>
    <label>Name:</label><br>
    <input type="text" name="name"><br><br>
    <label>Telephone:</label><br>
    <input type="text" name="telephone"><br><br>
    <label>Email:</label><br>
    <input type="email" name="email"><br><br>
    <label>Address:</label><br>
    <input type="text" name="address"><br><br>
    <label>City Code:</label><br>
    <input type="text" name="citycode"><br><br>
    <label>Balance:</label><br>
    <input type="number" name="balance"><br><br>
    <input type="submit" value="Submit">
</form>

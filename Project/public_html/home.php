<?php
session_start();
if (!isset($_SESSION['username'])) {
    header('Location: login.html');
    exit;
}

$username = $_SESSION['username'];
$name = $_SESSION['name'];
$balance = $_SESSION['balance'];
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Homepage</title>
</head>
<body>
    <h1>Welcome, <?php echo $username; ?>!</h1>
    <p>Name: <?php echo $name; ?></p>
    <p>Balance: $<?php echo number_format($balance, 2); ?></p>
    
    <form action="logout.php" method="post">
      <button type="submit" name="logout">Logout</button>
    </form>
</body>
</html>
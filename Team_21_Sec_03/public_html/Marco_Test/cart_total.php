<?php
	include 'includes/session.php';

	if(isset($_SESSION['user'])){
		$conn = $pdo->open();

		$stmt = $conn->prepare("SELECT * FROM shopping_cart LEFT JOIN items on items.id=shopping_cart.item_id WHERE user_id=:user_id");
		$stmt->execute(['user_id'=>$user['id']]);

		$total = 0;
		foreach($stmt as $row){
			$subtotal = $row['price'] * $row['quantity'];
			$total += $subtotal;
		}

		$pdo->close();

		echo json_encode($total);
	}
?>
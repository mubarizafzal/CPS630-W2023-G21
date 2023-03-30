<?php
	$conn = $pdo->open();

	try{
		$stmt = $conn->query("SELECT * FROM shopping_cart");
        echo "<b>id&emsp;user_id&emsp;item_id&emsp;quantity&emsp;total&emsp;store_code</b><br />\n";
        while ($row = $stmt->fetch()) {
        echo $row['id']."&emsp;".$row['user_id']."&emsp;".$row['item_id']."&emsp;".$row['quantity']."&emsp;".$row['total']."&emsp;".$row['store_code']."<br />\n";
    }
	}
	catch(PDOException $e){
		echo "A connection cannot be established: " . $e->getMessage();
	}

?>
<?php
	$conn = $pdo->open();

	try{
		$stmt = $conn->query("SELECT * FROM order_placed");
        echo "id&emsp;user_id&emsp;shopping_cart_id&emsp;item_id&emsp;trip_id&emsp;date_issued&emsp;date_received&emsp;total&emsp;pay_code<br />\n";
        while ($row = $stmt->fetch()) {
        echo $row['id']."&emsp;".$row['user_id']."&emsp;".$row['shopping_cart_id']."&emsp;".$row['item_id']."&emsp;".$row['trip_id']."&emsp;".$row['date_issued']."&emsp;".$row['date_received']."&emsp;".$row['total']."&emsp;".$row['pay_code']."<br />\n";
    }
	}
	catch(PDOException $e){
		echo "A connection cannot be established: " . $e->getMessage();
	}

?>
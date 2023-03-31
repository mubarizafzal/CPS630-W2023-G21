<?php
	$conn = $pdo->open();

	try{
		$stmt = $conn->query("SELECT * FROM items");
        while ($row = $stmt->fetch()) {

        echo $row['id']." ".$row['category_id']." ".$row['item_name']." ".$row['keyword']." ".$row['dept_code']." ".$row['made_in']." ".$row['price']." ".$row['description']." ".$row['code']." ".$row['photo']." ".$row['counter']."<br />\n";
    }
	}
	catch(PDOException $e){
		echo "A connection cannot be established: " . $e->getMessage();
	}

?>
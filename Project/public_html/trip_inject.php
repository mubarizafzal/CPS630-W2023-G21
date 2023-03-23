<?php
	$conn = $pdo->open();

	try{
		$stmt = $conn->query("SELECT * FROM trip");
        echo "id&emsp;truck_id&emsp;source_code&emsp;dest_code&emsp;dist_km&emsp;price<br />\n";
        while ($row = $stmt->fetch()) {
        echo $row['id']." ".$row['truck_id']." ".$row['source_code']." ".$row['dest_code']." ".$row['dist_km']." ".$row['price']."<br />\n";
    }
	}
	catch(PDOException $e){
		echo "A connection cannot be established: " . $e->getMessage();
	}

?>
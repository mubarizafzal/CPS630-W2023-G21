<?php
	$conn = $pdo->open();

	try{
		$stmt = $conn->query("SELECT * FROM truck");
        echo "<b>id&emsp;truck_code&emsp;avail_code</b><br />\n";
        while ($row = $stmt->fetch()) {
        echo $row['id']." ".$row['truck_code']." ".$row['avail_code']."<br />\n";
    }
	}
	catch(PDOException $e){
		echo "A connection cannot be established: " . $e->getMessage();
	}

?>
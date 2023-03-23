<?php
	$conn = $pdo->open();

	try{
		$stmt = $conn->query("SELECT * FROM category");
        echo "<b>id&emsp;name&emsp;genre</b><br />\n";
        while ($row = $stmt->fetch()) {
        echo $row['id']." ".$row['name']." ".$row['genre']."<br />\n";
    }
	}
	catch(PDOException $e){
		echo "A connection cannot be established: " . $e->getMessage();
	}

?>
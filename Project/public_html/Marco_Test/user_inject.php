<?php
	$conn = $pdo->open();

	try{
		$stmt = $conn->query("SELECT * FROM user");
        while ($row = $stmt->fetch()) {
        echo $row['id']." ".$row['username']." ".$row['password']." ".$row['name']." ".$row['telephone']." ".$row['email']." ".$row['address']." ".$row['citycode']." ".$row['balance']."<br />\n";
    }
	}
	catch(PDOException $e){
		echo "A connection cannot be established: " . $e->getMessage();
	}

?>
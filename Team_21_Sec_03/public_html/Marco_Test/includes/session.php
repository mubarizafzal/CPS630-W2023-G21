<?php
	include 'includes/conn.php';
	session_start();

	if(isset($_SESSION['user'])){
		$conn = $pdo->open();

		try{
			$stmt = $conn->prepare("SELECT * FROM user WHERE id=:id");
			$stmt->execute(['id'=>$_SESSION['user']]);
			$user = $stmt->fetch();
		}
		catch(PDOException $e){
			echo "A connection cannot be established: " . $e->getMessage();
		}

		$pdo->close();
	}
?>
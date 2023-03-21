<?php
	include 'includes/session.php';

	$conn = $pdo->open();

	$output = array('error'=>false);
	$id = $_POST['id'];

	if(isset($_SESSION['user'])){
		try{
			$stmt = $conn->prepare("DELETE FROM shopping_cart WHERE id=:id");
			$stmt->execute(['id'=>$id]);
			$output['message'] = 'Deleted';
			
		}
		catch(PDOException $e){
			$output['message'] = $e->getMessage();
		}
	}
	else{
		foreach($_SESSION['shopping_cart'] as $key => $row){
			if($row['item_id'] == $id){
				unset($_SESSION['shopping_cart'][$key]);
				$output['message'] = 'Deleted';
			}
		}
	}

	$pdo->close();
	echo json_encode($output);

?>
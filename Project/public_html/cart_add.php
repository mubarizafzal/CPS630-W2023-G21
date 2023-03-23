<?php
    include 'includes/session.php';

    $conn = $pdo->open();

	$output = array('error'=>false);

	$id = $_POST['id'];
	$quantity = $_POST['quantity'];

	if(isset($_SESSION['user'])){
		$stmt = $conn->prepare("SELECT *, COUNT(*) AS numrows FROM shopping_cart WHERE user_id=:user_id AND item_id=:item_id");
		$stmt->execute(['user_id'=>$user['id'], 'item_id'=>$id]);
		$row = $stmt->fetch();
		if($row['numrows'] < 1){
			try{
				$stmt = $conn->prepare("INSERT INTO shopping_cart (user_id, item_id, quantity) VALUES (:user_id, :item_id, :quantity)");
				$stmt->execute(['user_id'=>$user['id'], 'item_id'=>$id, 'quantity'=>$quantity]);
				$output['message'] = 'Item added to cart';
				
			}
			catch(PDOException $e){
				$output['error'] = true;
				$output['message'] = $e->getMessage();
			}
		}
		else{
			$output['error'] = true;
			$output['message'] = 'Product already in shopping cart';
		}
	}
	else{
		if(!isset($_SESSION['shopping_cart'])){
			$_SESSION['shopping_cart'] = array();
		}

		$exist = array();

		foreach($_SESSION['shopping_cart'] as $row){
			array_push($exist, $row['item_id']);
		}

		if(in_array($id, $exist)){
			$output['error'] = true;
			$output['message'] = 'Product already in shopping cart';
		}
		else{
			$data['item_id'] = $id;
			$data['quantity'] = $quantity;

			if(array_push($_SESSION['shopping_cart'], $data)){
				$output['message'] = 'Item added to shopping cart';
			}
			else{
				$output['error'] = true;
				$output['message'] = 'Cannot add item to shopping cart';
			}
		}

	}

	$pdo->close();
	echo json_encode($output);
?>
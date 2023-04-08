<?php
	include 'includes/session.php';
	$conn = $pdo->open();

	$output = '';

	if(isset($_SESSION['user'])){
    // The intention with this code seems to be that if a user has logged in and there was already stuff in the
    // shopping cart, then we want to continue that shopping session as the logged in user by moving the stuff
    // in the cart from the session to the database
		if(isset($_SESSION['shopping_cart'])){
			foreach($_SESSION['shopping_cart'] as $row){
        $stmt = $conn->prepare("SELECT *, COUNT(*) AS numrows FROM shopping_cart WHERE user_id=:user_id AND item_id=:item_id GROUP BY id");
				$stmt->execute(['user_id'=>$user['id'], 'item_id'=>$row['item_id']]);
				$crow = $stmt->fetch();
        // It seems $crow will be false if nothing is found
				if(!$crow){
          // If the item in the session shopping cart was not in the database, add it
					$stmt = $conn->prepare("INSERT INTO shopping_cart (user_id, item_id, quantity, total) VALUES (:user_id, :item_id, :quantity, :total)");
					$stmt->execute(['user_id'=>$user['id'], 'item_id'=>$row['item_id'], 'quantity'=>$row['quantity'], 'total'=>$row['total']]);
				}
				else{
					$stmt = $conn->prepare("UPDATE shopping_cart SET quantity=:quantity, total=:total WHERE user_id=:user_id AND item_id=:item_id");
					$stmt->execute(['quantity'=>$row['quantity'], 'total'=>$row['total'], 'user_id'=>$user['id'], 'item_id'=>$row['item_id']]);
				}
			}
			unset($_SESSION['shopping_cart']);
		}

		try{
			$total = 0;
			$stmt = $conn->prepare("SELECT *, shopping_cart.id AS shopping_cart_id FROM shopping_cart LEFT JOIN items ON items.id=shopping_cart.item_id WHERE user_id=:user");
      $stmt->execute(['user'=>$user['id']]);
      foreach($stmt as $row){
				$image = (!empty($row['photo'])) ? 'images/'.$row['photo'] : 'images/noimage.jpg';
				$subtotal = $row['price']*$row['quantity'];
				$total += $subtotal;
				$output .= "
					<tr>
						<td><button type='button' data-id='".$row['shopping_cart_id']."' class='btn btn-danger btn-flat cart_delete'><i class='fa fa-remove'></i></button></td>
						<td><img src='".$image."' width='30px' height='30px'></td>
						<td>".$row['item_name']."</td>
						<td>&#36; ".number_format($row['price'], 2)."</td>
						<td class='input-group'>
							<span class='input-group-btn'>
            					<button type='button' id='minus' class='btn btn-default btn-flat minus' data-id='".$row['shopping_cart_id']."'><i class='fa fa-minus'></i></button>
            				</span>
            				<input type='text' class='form-control' value='".$row['quantity']."' id='qty_".$row['shopping_cart_id']."'>
				            <span class='input-group-btn'>
				                <button type='button' id='add' class='btn btn-default btn-flat add' data-id='".$row['shopping_cart_id']."'><i class='fa fa-plus'></i>
				                </button>
				            </span>
						</td>
						<td>&#36; ".number_format($subtotal, 2)."</td>
					</tr>
				";
			}
			$output .= "
				<tr>
					<td colspan='5' align='right'><b>Total</b></td>
					<td><b>&#36; ".number_format($total, 2)."</b></td>
				<tr>
			";

		}
		catch(PDOException $e){
			$output .= $e->getMessage();
		}

	}
	else{
		if(count($_SESSION['shopping_cart']) != 0){
			$total = 0;
			foreach($_SESSION['shopping_cart'] as $row){
				$stmt = $conn->prepare("SELECT *, items.item_name AS itemname, category.name AS catname FROM items LEFT JOIN category ON category.id=items.category_id WHERE items.id=:id");
				$stmt->execute(['id'=>$row['item_id']]);
				$item = $stmt->fetch();
				$image = (!empty($item['photo'])) ? 'images/'.$item['photo'] : 'images/noimage.jpg';
				$subtotal = $item['price']*$row['quantity'];
				$total += $subtotal;
				$output .= "
					<tr>
						<td><button type='button' data-id='".$row['item_id']."' class='btn btn-danger btn-flat cart_delete'><i class='fa fa-remove'></i></button></td>
						<td><img src='".$image."' width='30px' height='30px'></td>
						<td>".$item['item_name']."</td>
						<td>&#36; ".number_format($item['price'], 2)."</td>
						<td class='input-group'>
							<span class='input-group-btn'>
            					<button type='button' id='minus' class='btn btn-default btn-flat minus' data-id='".$row['item_id']."'><i class='fa fa-minus'></i></button>
            				</span>
            				<input type='text' class='form-control' value='".$row['quantity']."' id='qty_".$row['item_id']."'>
				            <span class='input-group-btn'>
				                <button type='button' id='add' class='btn btn-default btn-flat add' data-id='".$row['item_id']."'><i class='fa fa-plus'></i>
				                </button>
				            </span>
						</td>
						<td>&#36; ".number_format($subtotal, 2)."</td>
					</tr>
				";
				
			}

			$output .= "
				<tr>
					<td colspan='5' align='right'><b>Total</b></td>
					<td><b>&#36; ".number_format($total, 2)."</b></td>
				<tr>
			";
		}

		else{
			$output .= "
				<tr>
					<td colspan='6' align='center'>Shopping cart empty</td>
				<tr>
			";
		}
		
	}

	$pdo->close();
	echo json_encode($output);

?>


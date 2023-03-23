<?php
	include 'includes/session.php';
	$conn = $pdo->open();

	$output = array('list'=>'','count'=>0);

	if(isset($_SESSION['user'])){
		try{
			$stmt = $conn->prepare("SELECT *, items.item_name AS itemname, category.name AS catname FROM shopping_cart LEFT JOIN items ON items.id=shopping_cart.item_id LEFT JOIN category ON category.id=items.category_id WHERE user_id=:user_id");
			$stmt->execute(['user_id'=>$user['id']]);
			foreach($stmt as $row){
				$output['count']++;
				$image = (!empty($row['photo'])) ? 'images/'.$row['photo'] : 'images/noimage.jpg';
				$itemname = (strlen($row['itemname']) > 30) ? substr_replace($row['itemname'], '...', 27) : $row['itemname'];
				$output['list'] .= "
					<li>
						<a href='product.php?item=".$row['code']."'>
							<div class='pull-left'>
								<img src='".$image."' style='height: 50px; width: 5-px;' class='thumbnail' alt='User Image'>
							</div>
							<h4>
		                        <b>".$row['catname']."</b>
		                        <small>&times; ".$row['quantity']."</small>
		                    </h4>
		                    <p>".$itemname."</p>
						</a>
					</li>
				";
			}
		}
		catch(PDOException $e){
			$output['message'] = $e->getMessage();
		}
	}
	else{
		if(!isset($_SESSION['shopping_cart'])){
			$_SESSION['shopping_cart'] = array();
		}

		if(empty($_SESSION['shopping_cart'])){
			$output['count'] = 0;
		}
		else{
			foreach($_SESSION['shopping_cart'] as $row){
				$output['count']++;
				$stmt = $conn->prepare("SELECT *, items.item_name AS itemname, category.name AS catname FROM items LEFT JOIN category ON category.id=items.category_id WHERE items.id=:id");
				$stmt->execute(['id'=>$row['item_id']]);
				$item = $stmt->fetch();
				$image = (!empty($item['photo'])) ? 'images/'.$item['photo'] : 'images/noimage.jpg';
				$output['list'] .= "
					<li>
						<a href='product.php?item=".$item['code']."'>
							<div class='pull-left'>
								<img src='".$image."' style='height: 50%; width: 50%;' alt='User Image'>
							</div>
							<h4>
		                        <b>".$item['catname']."</b>
		                        <small>&times; ".$row['quantity']."</small>
		                    </h4>
		                    <p>".$item['itemname']."</p>
						</a>
					</li>
				";
				
			}
		}
	}

	$pdo->close();
	echo json_encode($output);

?>


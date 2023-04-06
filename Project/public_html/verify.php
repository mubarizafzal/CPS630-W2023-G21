<?php
	include 'includes/session.php';
	$conn = $pdo->open();

	if(isset($_POST['login'])){
		
		$email = $_POST['email'];
		$password = $_POST['password'];

		try{
      
      $stmt = $conn->prepare("SELECT *, COUNT(*) AS numrows FROM user WHERE email = :email GROUP BY id");
			$stmt->execute(['email'=>$email]);
			$row = $stmt->fetch();
			if($row['numrows'] > 0){
				if(True || $row['status']){ // what is status? temp fix to make login work
					// check if password is correct by hashing inputted password with stored salt
					if($row['password'] == md5($password.$row['salt'])){
						$_SESSION['user'] = $row['id'];
					}
					else{
						$_SESSION['error'] = 'Incorrect Password';
					}
					
					if($row['admin'] == true) $_SESSION['admin'] = true;
				}
				else{
					$_SESSION['error'] = 'Account not activated.';
				}
			}
			else{
				$_SESSION['error'] = 'Email not found';
			}
		}
		catch(PDOException $e){
			echo "A connection cannot be established " . $e->getMessage();
		}

	}
	else{
		$_SESSION['error'] = 'Input your login credentials first';
	}

	$pdo->close();

	header('location: signin.php');

?>
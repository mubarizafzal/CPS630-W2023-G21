<?php

	include 'includes/session.php';

	if(isset($_POST['signup'])){
		$name = $_POST['name'];
    $telephone = $_POST['telephone'];
		$email = $_POST['email'];
		$username = $_POST['username'];
		$password = $_POST['password'];
		$repassword = $_POST['repassword'];
    $address = $_POST['address'];
    $citycode = $_POST['citycode'];

		$_SESSION['name'] = $name;
		$_SESSION['username'] = $username;
		$_SESSION['email'] = $email;

		if($password != $repassword){
			$_SESSION['error'] = 'Passwords did not match';
			header('location: signup.php');
		}
		else{
			$conn = $pdo->open();

			$stmt = $conn->prepare("SELECT COUNT(*) AS numrows FROM user WHERE email=:email");
			$stmt->execute(['email'=>$email]);
			$row = $stmt->fetch();
			if($row['numrows'] > 0){
				$_SESSION['error'] = 'Email already taken';
				header('location: signup.php');
			}
			else{
				$now = date('Y-m-d');
				//$password = password_hash($password, PASSWORD_DEFAULT); // I removed this because it didn't make sense with verify.php

        //$stmt = $conn->prepare("SELECT COUNT(*) AS numrows FROM user");
        // If we want to implement the registration funcitonality, we also need to provide an id to the
        // INSERT command

				try{
                    // generates pseudo-random string for salting
					function generateRandomSalt(){
  						return base64_encode(mcrypt_create_iv(12, MCRYPT_DEV_URANDOM));
					}
					$salt = generateRandomSalt();
					$stmt = $conn->prepare("INSERT INTO user (username, password, salt, name, telephone, email, address, citycode) VALUES (:username, :password, :salt, :name, :telephone, :email, :address, :citycode)");
          $stmt->execute(['username'=>$username, 'password'=>md5($password.$salt), 'salt'=>$salt, 'name'=>$name, 'telephone'=>$telephone, 'email'=>$email, 'address'=>$address, 'citycode'=>$citycode]);
                    $userid = $conn->lastInsertId();

					$message = "
						<h2>Thank you for Registering.</h2>
						<p>Your Account:</p>
						<p>Email: ".$email."</p>
					";


          unset($_SESSION['firstname']);
          unset($_SESSION['lastname']);
          unset($_SESSION['email']);

          $_SESSION['success'] = 'Account created. Check your email to activate.';
          header('location: signin.php');

        } 
        catch (Exception $e) {
            $_SESSION['error'] = 'An error occurred when trying to create your account.';
            header('location: signup.php');
        }


      }
      $pdo->close();

    }

  }
	else {
		$_SESSION['error'] = 'Fill up signup form first';
		header('location: signup.php');
	}

?>
<?php
session_start();

$DATABASE_HOST = 'localhost';
$DATABASE_USER = 'id20410332_user';
$DATABASE_PASS = '[2cR6r{[~5qF2m6l';
$DATABASE_NAME = 'id20410332_login';

//Connect to database
$con = new mysqli($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);

//Check for connection error
if ($con->connect_error) {
  die("Connection failed: " . $con->connect_error);
}

//Check login form
if (isset($_POST['username'], $_POST['password'])) {
	
	//Sanitize user input to prevent SQL injection attacks
	$username = $con->real_escape_string($_POST['username']);
	$password = $con->real_escape_string($_POST['password']);
	
	//Prepare sql statement
	$stmt = $con->prepare('SELECT user_id, password, name, balance FROM user WHERE username = ?');
	if ($stmt) {
		$stmt->bind_param('s', $username);
		$stmt->execute();
		//Store the result
		$stmt->store_result();

		if ($stmt->num_rows > 0) {
			$stmt->bind_result($userid, $hashed_password, $name, $balance);
			$stmt->fetch();
			
			//Check password with hashed password from db 
			if (password_verify($password, $hashed_password)) {
			    
			    //Logged in successfully
			    //Set session
				session_regenerate_id();
				$_SESSION['loggedin'] = true;
				$_SESSION['username'] = $username;
				$_SESSION['user-id'] = $userid;
				$_SESSION['name'] = $name;
				$_SESSION['balance'] = $balance;
				header('Location: home.php');
				exit();
			} else {
				//Incorrect password
				$error = 'Incorrect username/password';
			}
		} else {
			//Incorrect username
			$error = 'Incorrect username/password';
		}
		$stmt->close();
	} else {
		// Something went wrong with the SQL statement, check to see if there is a syntax error in the statement.
		$error = 'Could not prepare statement!';
	}

	$con->close();

} else {
	// Incorrect username
	$error = 'Incorrect username and/or password!';
}

echo $error;
?>
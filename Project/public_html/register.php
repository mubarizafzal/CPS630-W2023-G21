<?php
session_start();

$DATABASE_HOST = 'localhost';
$DATABASE_USER = 'id20410332_user';
$DATABASE_PASS = '[2cR6r{[~5qF2m6l';
$DATABASE_NAME = 'id20410332_login';

//Create a new mysqli object and connect to the database
$con = new mysqli($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);

//Check for connection error
if ($con->connect_error) {
  die("Connection failed: " . $con->connect_error);
}

//Initialize with empty values
$username = $password = $confirm_password = $name = $telephone = $email = $address = $citycode = $balance = "";
$username_err = $password_err = $confirm_password_err = $name_err = $telephone_err = $email_err = $address_err = $citycode_err = $balance_err = "";

//Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){

    //Check username
    if(empty(trim($_POST["username"]))){
        $username_err = "Please enter a username.";
    } else{
        $sql = "SELECT user_id FROM user WHERE username = ?";

        if($stmt = $con->prepare($sql)){
            //Bind variables to the prepared statement as parameters
            $stmt->bind_param("s", $param_username);

            //Set parameters
            $param_username = trim($_POST["username"]);

            if($stmt->execute()){
                //Store result
                $stmt->store_result();

                if($stmt->num_rows == 1){
                    $username_err = "This username is already taken.";
                } else{
                    $username = trim($_POST["username"]);
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }

            $stmt->close();
        }
    }

    //Check password
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter a password.";     
    } else{
        $password = trim($_POST["password"]);
    }

    //Check confirm password
    if(empty(trim($_POST["confirm_password"]))){
        $confirm_password_err = "Please confirm password.";     
    } else{
        $confirm_password = trim($_POST["confirm_password"]);
        if(empty($password_err) && ($password != $confirm_password)){
            $confirm_password_err = "Password did not match.";
        }
    }

    //Check name
    if(empty(trim($_POST["name"]))){
        $name_err = "Please enter your name.";
    } else{
        $name = trim($_POST["name"]);
    }

    //Check telephone
    if(empty(trim($_POST["telephone"]))){
        $telephone_err = "Please enter your telephone number.";
    } else{
        $telephone = trim($_POST["telephone"]);
    }

    //Check email
    if(empty(trim($_POST["email"]))){
        $email_err = "Please enter your email.";
    } else{
        $email = trim($_POST["email"]);
    }

    //Check address
    if(empty(trim($_POST["address"]))){
        $address_err = "Please enter your address.";
    } else{
        $address = trim($_POST["address"]);
    }


    //Check input errors before inserting in database
    if(empty($username_err) && empty($password_err) && empty($name_err) && empty($telephone_err) && empty($email_err) && empty($address_err) && empty($citycode_err)){
        
        //Prepare an insert statement
        $sql = "INSERT INTO user (username, password, name, telephone, email, address, citycode, balance) VALUES (?, ?, ?, ?, ?, ?, ?, 0)";
         
        if($stmt = $con->prepare($sql)){
            //Bind variables to the prepared statement as parameters
            $stmt->bind_param("ssssssi", $param_username, $param_password, $param_name, $param_telephone, $param_email, $param_address, $param_citycode);
            
            //Set parameters
            $param_username = $username;
            $param_password = password_hash($password, PASSWORD_DEFAULT); // Creates a password hash
            $param_name = $name;
            $param_telephone = $telephone;
            $param_email = $email;
            $param_address = $address;
            $param_citycode = $citycode;
            $param_balance = 0;
            
            //Attempt to execute the prepared statement
            if($stmt->execute()){
                //Redirect to login page
                header("location: login.html");
            } else{
                echo "Something went wrong. Please try again later.";
            }

            $stmt->close();
        }
    }

    //Close connection
    $con->close();
    }
?>





<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Register</title>
    <style>
        .wrapper {
            width: 500px;
            padding: 50px;
            margin: 0 auto;
        }
        .form-group {
            margin-bottom: 20px;
        }
        .form-group label {
            display: inline-block;
            width: 150px;
            font-weight: bold;
        }
        .form-group input {
            width: 300px;
            padding: 5px;
            border-radius: 5px;
            border: 1px solid #ccc;
        }
        .form-group .help-block {
            color: #a94442;
        }
        .form-group.error input {
            border-color: #a94442;
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <h2>Register</h2>
        <p>Please fill this form to create an account.</p>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group <?php echo (!empty($username_err)) ? 'error' : ''; ?>">
                <label>Username*</label>
                <input type="text" name="username" value="<?php echo $username; ?>">
                <span class="help-block"><?php echo $username_err; ?></span>
            </div>
            <div class="form-group <?php echo (!empty($password_err)) ? 'error' : ''; ?>">
                <label>Password*</label>
                <input type="password" name="password" value="<?php echo $password; ?>">
                <span class="help-block"><?php echo $password_err; ?></span>
            </div>
            <div class="form-group <?php echo (!empty($confirm_password_err)) ? 'error' : ''; ?>">
                <label>Confirm Password*</label>
                <input type="password" name="confirm_password" value="<?php echo $confirm_password; ?>">
                <span class="help-block"><?php echo $confirm_password_err; ?></span>
            </div>
            <div class="form-group <?php echo (!empty($name_err)) ? 'error' : ''; ?>">
                <label>Name*</label>
                <input type="text" name="name" value="<?php echo $name; ?>">
                <span class="help-block"><?php echo $name_err; ?></span>
            </div>
            <div class="form-group <?php echo (!empty($telephone_err)) ? 'error' : ''; ?>">
                <label>Telephone*</label>
                <input type="text" name="telephone" value="<?php echo $telephone; ?>">
                <span class="help-block"><?php echo $telephone_err; ?></span>
            </div>
            <div class="form-group <?php echo (!empty($email_err)) ? 'error' : ''; ?>">
                <label>Email*</label>
                <input type="text" name="email" value="<?php echo $email; ?>">
                <span class="help-block"><?php echo $email_err; ?></span>
            </div>
            <div class="form-group <?php echo (!empty($address_err)) ? 'error' : ''; ?>">
                <label>Address*</label>
                <input type="text" name="address" value="<?php echo $address; ?>">
                <span class="help-block"><?php echo $address_err; ?></span>
            </div>
            <div class="form-group <?php echo (!empty($citycode_err)) ? 'error' : ''; ?>">
                <label>City Code*</label>
                <input type="text" name="citycode" class="form-control" value="<?php echo $citycode; ?>">
                <span class="help-block"><?php echo $citycode_err; ?></span>
            </div>
            
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Submit">
                <input type="reset" class="btn btn-default" value="Reset">
            </div>
            <p>Already have an account? <a href="login.html">Login here</a>.</p>
        </form>
    </div>
</body>
</html>
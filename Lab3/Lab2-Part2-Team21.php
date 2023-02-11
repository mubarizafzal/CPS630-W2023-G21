 <?php
$servername = "localhost";
$username = "username";
$password = "password";
$dbname = "testnew";

// Connect to the database
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// check if table "StRect" exists
$sql = "SHOW TABLES LIKE 'StRec'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) == 0)
{
    // create table into database
    $sql = "CREATE TABLE IF NOT EXISTS StRec (
        id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        firstname VARCHAR(30) NOT NULL,
        lastname VARCHAR(30) NOT NULL,
        email VARCHAR(50),
        reg_date TIMESTAMP,
        birthdate DATE
        )";
    try {
        $result = $conn->query($sql);
        echo nl2br("Table StRec created successfully \n");
    } 
    catch (Exception $e) {
        echo "Error creating table: " . $e->getMessage();
    }
}


if(isset($_POST['submit'])) {
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $birthdate = $_POST['birthdate'];

    $sql = "INSERT INTO StRec (firstname, lastname, email, birthdate)
    VALUES ('$firstname', '$lastname', '$email', '$birthdate')";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
if(isset($_POST['delete']))
{
    $id = $_POST['id'];

    try {
        $sql = "DELETE FROM StRec WHERE id=$id";
        if ($conn->query($sql) === TRUE) {
            echo "Record deleted successfully";
        } else {
            throw new Exception("Error: " . $conn->error);
        }
    } catch (Exception $e) {
        echo $e->getMessage();
    }
}

?>

<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Student Record</title>
        <link rel="stylesheet" href="Lab2-Part2-Team21.css"/>
    </head>
    <body>
        <div id='tableDiv'>
                <h2>Student Record</h2>
                    <table>


<?php

$sql = "SELECT id, firstname, lastname, email, reg_date, birthdate FROM StRec";
$result = $conn->query($sql);

// Output the records on an HTML web-page
echo "<tr>
            <th><p><b>ID</b></p></th>
            <th><p><b>First Name</b></p></th>
            <th><p><b>Last Name</b></p></th>
            <th><p><b>Email</b></p></th>
            <th><p><b>Date of Registration</b></p></th>
            <th><p><b>Date of Birth</b></p></th>
        </tr>";
while ($row = $result->fetch_assoc()) {
    echo "<tr>
            <td><p><b>" . $row["id"] . "</b></p></td>
            <td><p><b>" . $row["firstname"] . "</b></p></td>
            <td><p><b>" . $row["lastname"] . "</b></p></td>
            <td><p><b>" . $row["email"] . "</b></p></td>
            <td><p><b>" . date("Y-m-d H:i:s", strtotime($row["reg_date"])) . "</b></p></td>
            <td><p><b>" . $row["birthdate"] . "</b></p></td>
            </tr>";
}

?>
            </table>
        </div>
    <br>
    <div class="row">
        <div class="column">
            <form action="" method="post">
                <label for="firstname">First name:</label><br>
                <input type="text" id="fname" name="firstname"><br><br>

                <label for="lastname">Last name:</label><br>
                <input type="text" id="lname" name="lastname"><br><br>

                <label for="email">Email:</label><br>
                <input type="text" id="email" name="email"><br><br>

                <label for="birthdate">Date of Birth:</label><br>
                <input type="date" id="birthdate" name="birthdate"><br><br>

                <input type="submit" name="submit" value="Insert Info">
            </form>
        </div>
        <div class="column">
            <form action="" method="post">
                <label for="id">ID to delete:</label><br>
                <input type="number" id="id" name="id"><br><br>

                <input type="submit" name="delete" value="Clear ID record">
            </form>
        </div>
    </div>
    </body>
</html>


<?php
// Close the connection
mysqli_close($conn);

// Try-Catch block to catch potential errors
try {
    // Execute the code inside the try block
    // ...
} catch (Exception $e) {
    // Handle the exception and output an error message
    echo "Error: " . $e->getMessage();
}
?>

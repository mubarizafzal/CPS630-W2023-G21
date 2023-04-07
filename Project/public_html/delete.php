<?php include 'includes/session.php'; ?>
<?php include 'includes/header.php'; ?>
<body class="hold-transition">
<div class="wrapper">

	<?php include 'includes/navbar.php'; ?>
    <div class="content-wrapper">
	    <div class="container">
            <style>
                th, td {
                padding: 15px;
                }
                table {
  width: 50%;
}
            </style>
	    <!-- Main content -->
	    <section class="content">
	        <div class="row">
	        	<div class="col-sm-9">
                <h1 class="page-header">Delete</h1>
                <p> Select which tables to delete from: </p>
                <form action="" method="post">
                    <select name="chosenTable">
                        <option value="category">Category</option>
                        <option value="items">Items</option>
                        <option value="shopping_cart">Shopping Cart</option>
                        <option value="user">User</option>
                        <option value="truck">Truck</option>
                        <option value="trip">Trip</option>
                        <option value="order_placed">Order</option>
                    </select>
                    <input type="submit" name="SubmitTable"/>
                    
                </form>
                <?php
        $message = "";
        if(isset($_POST['SubmitTable'])){ 
        $input = $_POST['chosenTable']; // get selected table
        $message = "You entered: ". $input;
        
        try {
            $conn = $pdo->open();
            $column_names = $conn->prepare("DESCRIBE $input;");
            $stmt = $conn->prepare("SELECT * FROM $input;");
            $column_names->execute();
            $stmt->execute();
            echo '<table style="width: 50%;">';
            // prints out column names
            foreach($column_names->fetchAll(PDO::FETCH_COLUMN) as $name) {
                echo '<th>' . $name  . '</th>';
            }
            // prints out rows of SQL table
            foreach($stmt->fetchAll(PDO::FETCH_ASSOC) as $row) {
                echo '</tr>';
                foreach($row as $key  => $value) { $id = $value;
                    
                    echo '<td>' . $value  . '</td>';

            }
                echo '<td><a href="deleteMember.php?id='.$row['id'].'&table='.$input.'">DELETE</a></tr>';
            }
            echo '</table>';
            $id='';
            }
            catch(PDOException $e){
                echo "A connection cannot be established: " . $e->getMessage();
            }
        } 

    ?>
                <?php echo $message; ?>
                </div>
                
	        </div>
        </section>
	     
	    </div>
	</div>

<?php include 'includes/footer.php'; ?>
</div>

<?php include 'includes/scripts.php'; ?>


</body>
</html>
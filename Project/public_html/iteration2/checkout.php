<?php include 'includes/session.php'; ?>
<?php include 'includes/header.php'; ?>
<nav class="navbar navbar-static-top">
    <div class="navbar-header">
        <a href="index.php" class="navbar-brand"><b>E-Commerce </b>Site</a>
    </div>
</nav>
<style>
#checkout_info {
    border-color: #F0F0F0; 
    border-style: solid; 
    border-radius: 15px; 
    padding: 25px
}
.column {
  float: left;
  width: 50%;
}
.button {
  transition-duration: 0.4s;
  background-color: #EDB40F;
  border-radius: 12px;
  padding: 14px 40px;
  font-size: 16px;
}

.button:hover {
    background-color: #F9B901;
  color: white;
}
.action_items{
    padding-top: 20px;
}
</style>
<body>
<div class="wrapper">
    <div class="content-wrapper">
	    <div class="container">
            <script>

            </script>
        <h1 class="page-header">Checkout</h1>
        <section>
            <h3>1. Select a branch location:</h3>
            <div id="checkout_info">
            <select name="branch_selected">
            <?php 
            $conn = $pdo->open();
            try{
                $stmt = $conn->query("SELECT DISTINCT name FROM branch");
                while ($row = $stmt->fetch()) {
                    echo "<option value=\"branch1\">" . $row['name'] . "</option>";
                }
            }
            catch(PDOException $e){
                echo "A connection cannot be established: " . $e->getMessage();
            }
            ?>
            </select>
            </div>
            <br>
        </section>
        <section>
            <h3>2. Select time and date for delivery:</h3>
            <div id="checkout_info">
                <div class="row">
                    <div class="column">
                        <h5>Select day of the week</h5>
                        <select name="day_selected">
                            <option value="sunday">Sunday</option>
                            <option value="monday">Monday</option>
                            <option value="tuesdya">Tuesday</option>
                            <option value="wednesday">Wednesday</option>
                            <option value="thursday">Thursday</option>
                            <option value="friday">Friday</option>
                            <option value="saturday">Saturday</option>
                        </select>
                    </div>
                    <div class="column">
                        <h5>Select time for pickup</h5>
                        <select name="day_selected">
                            <option value="time_1">9:30 AM</option>
                            <option value="time_2">11:00 AM</option>
                            <option value="time_3">12:30 PM</option>
                            <option value="time_4">2:00 PM</option>
                            <option value="time_5">3:30 PM</option>
                            <option value="time_6">5:00 PM</option>
                            <option value="time_7">6:30 PM</option>
                            <option value="time_8">8:00 PM</option>
                            <option value="time_9">9:30 PM</option>
                        </select>
                    </div>
        </section>
        <div class="action_items">
        <div class="column">
        <a href="cart_view.php">Back</a>
        </div>
        <div class="column">
        <form method="POST" action="invoice.php" style="float:right;">
			<input type="submit" value="Place order" class="button">
		</form>
        </div>
        </div>
        

        <?php include 'includes/footer.php'; ?>
</div>
</body>
<?php include 'includes/scripts.php'; ?>
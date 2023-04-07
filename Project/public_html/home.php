<?php include 'includes/session.php'; ?>
<?php include 'includes/header.php'; ?>
<body class="hold-transition">
<div class="wrapper">

	<?php include './includes/navbar.php'; ?>
	 
	  <div class="content-wrapper">
	    <div class="container">
		<style>
						img {
			max-height: 445px;
			}
</style>
	      <!-- Main content -->
	      <section class="content">
	        <div class="row">
            <div>
              <?php
                  $conn = $pdo->open();

                  try{
                    $daysOfWeek = array('Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday');
                    $today = date('w');
                    $inc = 1;	
                    $stmt = $conn->prepare("SELECT * FROM items WHERE id = ($today+1);");
                    $stmt->execute();
                    foreach ($stmt as $row) {
                      $image = (!empty($row['photo'])) ? 'images/'.$row['photo'] : 'images/noimage.jpg';
                      $inc = ($inc == 3) ? 1 : $inc + 1;
                      if($inc == 1) echo "<div class='row'>";
                      echo "
                      <div style='position: absolute; right: 0; left: 20%; up: 50%; margin-left: 50%; margin-top 20%; text-align: center;	'>
                        <div class='col-sm-4' style=' text-align: center'>
                        <p style='padding-left: 90px;'><b>TODAYS DAILY SPECIAL</b></p>
                          <div class='box box-solid' id='".$row['item_name'].'_'.$row['id'].'_'.$row['price']."' style='left:30px'>
                            <div draggable='true' class='box-body prod-body style=text-align: center'>
                              <img src='".$image."' width='200%' height='200%' class='thumbnail'>
                              <h5 style='padding-left: 30px;'><a href='product.php?item=".$row['code']."'>".$row['item_name']."</a></h5>
                            </div>
                            <div class='box-footer'>
                              <b style='padding-left: 35px;'>&#36; ".number_format($row['price'], 2)."</b>
                            </div>
                          </div>
                        </div>
                        </div>
                      ";
                      if($inc == 3) echo "</div>";
                    }
                    if($inc == 1) echo "<div class='col-sm-4'></div><div class='col-sm-4'></div></div>"; 
                    if($inc == 2) echo "<div class='col-sm-4'></div></div>";
                  }
                  catch(PDOException $e){
                    echo "A connection cannot be established: " . $e->getMessage();
                  }
                  $pdo->close();
              ?>
            </div>


	        	<div class="col-sm-9">
	        		<?php
	        			if(isset($_SESSION['error'])){
	        				echo "
	        					<div class='alert alert-danger'>
	        						".$_SESSION['error']."
	        					</div>
	        				";
	        				unset($_SESSION['error']);
	        			}
	        		?>
	        		<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
		                <ol class="carousel-indicators">
		                  <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
		                  <li data-target="#carousel-example-generic" data-slide-to="1" class=""></li>
		                  <li data-target="#carousel-example-generic" data-slide-to="2" class=""></li>
		                </ol>
		                <div class="carousel-inner">
		                  <div class="item active">
		                    <img src="images/banner1.png" alt="First slide">
		                  </div>
		                  <div class="item">
		                    <img src="images/banner4.png" alt="Second slide">
		                  </div>
		                  <div class="item">
		                    <img src="images/banner3.png" alt="Third slide">
		                  </div>
		                </div>
		                <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
		                  <span class="fa fa-angle-left"></span>
		                </a>
		                <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
		                  <span class="fa fa-angle-right"></span>
		                </a>
		            </div>
		       		
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
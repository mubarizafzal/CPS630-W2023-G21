<?php include 'includes/session.php'; ?>
<?php include 'includes/header.php'; ?>
<body class="hold-transition">
<div class="wrapper">

<style>

#reviewForm {
  max-width: 60%;
  width: 100%;
  margin: 10px auto;
  padding: 20px;
  border: solid 1px #f1f1f1;
  background: #fbfbfb;
  box-shadow: #e6e6e6 0 0 4px ;
  border-radius: 0.25rem;
}

@media (max-width: 720px) {
  #reviewForm{
    max-width: 90%;
  }
}

@media (max-width: 500px) {
  #reviewForm{
    padding: 10px;
  }
}

#fh2{
 padding: 2px 15px;
 text-align: center;
 
 
}

@media (max-width: 400px) {
  #fh2{
    font-size: 20px;
  }
}


#fh6 {
 padding: 2px 15px;
 color: black;
 text-align: center;
 font-weight: normal;
}

@media (max-width: 400px) {
  #fh6{
    font-size: 12px;
  }
}

.pinfo {
  padding: 10px;
}

#reviewForm button {
  margin: 12px;
}


</style>

	<?php include 'includes/navbar.php'; ?>
    <div class="content-wrapper">
	    <div class="container">

	    <!-- Main content -->
	    <section class="content">
	        <div class="row">
	        	<div class="col-sm-9">
                <h1 class="page-header">Customer Reviews</h1>
                <ul>
                  <?php 
                  $conn = $pdo->open();
                  try {
                      $stmt = $conn->prepare("SELECT * FROM review");
                      $stmt->execute();
                      foreach ($stmt as $row) {
                        $num_stars = intval($row['product_rating']);
                        echo "<p><b>Item Rated:</b> " . $row['product_rated'] . 
                             "<br><b>Rating:</b> " . str_repeat('⭐', $num_stars) . 
                             "<br><b>Review:</b><br>" . $row['review'] .
                             "<br><b>Reviewer:</b> " . $row['customer_name'] . "<br><br>";
                      }
                  } catch (PDOException $e) {
                      echo "A connection cannot be established: " .
                          $e->getMessage();
                  }

                  $pdo->close();                    
                  ?>
                </ul> 
                </div>
	        </div>
        </section>
	     
	    </div>
	</div>
<h2 id="fh2">We appreciate your reviews!</h2>
<h6 id="fh6">Your review will help us to improve our products and customer services.</h6>

<form id="reviewForm" action="">
  <div class="pinfo">Your name:</div>
  
<div class="form-group">
  <div class="col-md-8 inputGroupContainer">
  <div class="input-group">
  <span class="input-group-addon"><i class="fa fa-user"></i></span>
  <input name="name" placeholder="John Doe" class="form-control" type="text" required>
    </div>
  </div>
</div>
<br><br>
 <div class="pinfo">What product did you purchase?</div>
  
<div class="form-group">
  <div class="col-md-8 inputGroupContainer">
  <div class="input-group">
  <span class="input-group-addon"><i class="fa fa-shopping-cart"></i></span>
   <select class="form-control" name="reviewed_product" id="reviewed_product" required>
      <?php 
        $conn = $pdo->open();
        try {
            $stmt = $conn->prepare("SELECT * FROM items");
            $stmt->execute();
            foreach ($stmt as $row) {
              $item = $row['item_name'] . " " . $row['keyword'];
              echo "<option value='" . $item . "'>" . $item . "</option>";
            }
        } catch (PDOException $e) {
            echo "A connection cannot be established: " .
                $e->getMessage();
        }

        $pdo->close();
      ?>
    </select>
    </div>
  </div>
</div>
<br>
<div class="pinfo">Product rating:</div>
  
<div class="form-group">
  <div class="col-md-8 inputGroupContainer">
  <div class="input-group">
  <span class="input-group-addon"><i class="fa fa-heart"></i></span>
   <select class="form-control" name="product_rating" id="product_rating" required>
      <option value="1">1</option>
      <option value="2">2</option>
      <option value="3">3</option>
      <option value="4">4</option>
      <option value="5">5</option>
    </select>
    </div>
  </div>
</div>
<br>
 <div class="pinfo">Rate our overall services:</div>
  

<div class="form-group">
  <div class="col-md-8 inputGroupContainer">
  <div class="input-group">
  <span class="input-group-addon"><i class="fa fa-heart"></i></span>
   <select class="form-control" name="services_rating" id="services_rating" required>
      <option value="1">1</option>
      <option value="2">2</option>
      <option value="3">3</option>
      <option value="4">4</option>
      <option value="5">5</option>
    </select>
    </div>
  </div>
</div>
<br>
 <div class="pinfo">Write your review:</div>


<div class="form-group">
  <div class="col-md-8 inputGroupContainer">
  <div class="input-group">
  <span class="input-group-addon"><i class="fa fa-pencil"></i></span>
  <textarea class="form-control" name="review_text" id="review_text" rows="3" required></textarea>
    </div>
  </div>
</div>

<br><br><br>
<big><big>
 <button type="submit" class="btn btn-primary">Submit</button>
</big></big>

</form>



<?php include 'includes/footer.php'; ?>
</div>

<?php include 'includes/scripts.php'; ?>
</body>
</html>
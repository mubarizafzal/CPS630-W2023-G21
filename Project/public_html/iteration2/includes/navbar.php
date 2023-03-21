<header class="main-header">
  <nav class="navbar navbar-static-top">
    <div class="navbar-header">
        <a href="index.php" class="navbar-brand"><b>E-Commerce </b>Site</a>
      </div>
    <!-- Navigation options -->
    <div class="collapse navbar-collapse pull-left" id="navbar-collapse">
        <ul class="nav navbar-nav">
            <li><a href="index.php">Home</a></li>
            <li><a href="#">System Logo</a></li>
            <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Category <span class="caret"></span></a>
            <ul class="dropdown-menu" role="menu">
              <?php
             
                $conn = $pdo->open();
                try{
                  $stmt = $conn->prepare("SELECT * FROM category");
                  $stmt->execute();
                  foreach($stmt as $row){
                    echo "
                      <li><a href='category.php?category=".$row['genre']."'>".$row['name']."</a></li>
                    ";                  
                  }
                }
                catch(PDOException $e){
                  echo "A connection cannot be established: " . $e->getMessage();
                }

                $pdo->close();

              ?>
            </ul>
          </li>
            <li><a href="about.php">About Us</a></li>
            <li><a href="contact.php">Contact Us</a></li>
            <li><a href="#">Types of Services</a></li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">DB Maintain <span class="caret"></span></a>
            <ul class="dropdown-menu" role="menu">
              <li><a href="insert.php">Insert</a></li>
              <li><a href="delete.php">Delete</a></li>
              <li><a href="select.php">Select</a></li>
              <li><a href="update.php">Update</a></li>
            </ul>
          </li>

        </ul>
        <form method="POST" class="navbar-form navbar-left" action="search.php">
            <div class="input-group">
                <input type="text" class="form-control" id="navbar-search-input" name="keyword" placeholder="Search..." required>
                <span class="input-group-btn" id="searchBtn" style="display:none;">
                    <button type="submit" class="btn btn-default btn-flat"><i class="fa fa-search"></i> </button>
                </span>
            </div>
        </form>
    </div>

    <!-- Right menu -->
    <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <li class="dropdown messages-menu">
            <!-- Menu toggle button -->
            <a href="#" class="dropdown-toggle" id="shopping_cart" data-toggle="dropdown">
              <i class="fa fa-shopping-cart"></i>
              <span class="label label-success cart_count"></span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">You have <span class="cart_count"></span> item(s) in cart</li>
              <li>
                <ul class="menu" id="cart_menu">
                </ul>
              </li>
              <li class="footer"><a href="cart_view.php">Go to Cart</a></li>
            </ul>
          </li>
          <?php
            if(isset($_SESSION['user'])){
              $image = (!empty($user['photo'])) ? 'images/'.$user['photo'] : 'images/profile.jpg';
              echo '
                <li class="dropdown user user-menu">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    <img src="'.$image.'" class="user-image" alt="User Image">
                    <span class="hidden-xs">'.$user['firstname'].' '.$user['lastname'].'</span>
                  </a>
                  <ul class="dropdown-menu">
                    <!-- User image -->
                    <li class="user-header">
                      <img src="'.$image.'" class="img-circle" alt="User Image">

                      <p>
                        '.$user['firstname'].' '.$user['lastname'].'
                        <small>Member since '.date('M. Y', strtotime($user['created_on'])).'</small>
                      </p>
                    </li>
                    <li class="user-footer">
                      <div class="pull-left">
                        <a href="profile.php" class="btn btn-default btn-flat">Profile</a>
                      </div>
                      <div class="pull-right">
                        <a href="logout.php" class="btn btn-default btn-flat">Sign out</a>
                      </div>
                    </li>
                  </ul>
                </li>
              ';
            }
            else{
              echo "
                <li><a href='signin.php'>Sign In</a></li>
                <li><a href='signup.php'>Sign Up</a></li>
              ";
            }
          ?>
        </ul>
    </nav>
</header>
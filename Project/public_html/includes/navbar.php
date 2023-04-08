<header class="main-header">
  <nav class="navbar navbar-default navbar-static-top">
      <div class="container-fluid">
    <div class="navbar-header">
      <a href="/" class="navbar-brand" style="color: #58a36c">
        <img src="../images/logo.png" style="width: 40px; height: auto; display: inline;"/>
        <b>Green Delivery</b> E-Commerce
      </a>
<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbarNav">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span> 
      </button>
    </div>
    <!-- Navigation options -->
    <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="nav navbar-nav">
                <li><a href="home.php">Home</a></li>
                <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Departments <span class="caret"></span></a>
                <ul class="dropdown-menu" role="menu">
                  <li>
                    <a href="#" class="dropdown-item" style="display: flex; justify-content: space-between"><span>Furniture</span><span>⯈</span></a>
                    <ul class="dropdown-menu dropdown-submenu">
                      <?php
                      error_reporting(0);
                      $conn = $pdo->open();
                      try {
                          $stmt = $conn->prepare("SELECT * FROM category");
                          $stmt->execute();
                          foreach ($stmt as $row) {
                              echo "
                              <li><a href='category.php?category=" .
                                  $row["genre"] .
                                  "'>" .
                                  $row["name"] .
                                  "</a></li>
                            ";
                          }
                      } catch (PDOException $e) {
                          echo "A connection cannot be established: " .
                              $e->getMessage();
                      }

                      $pdo->close();
                      ?>
                    </ul>
                  </li>
                </ul>
              </li>
                <li><a href="about.php">About Us</a></li>
                <li><a href="contact.php">Contact Us</a></li>
                <li><a href="reviews.php">Reviews</a></li>
                <?php if (isset($_SESSION["admin"])) {
                    echo '<li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Admin Mode <span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="insert.php">Insert</a></li>
                        <li><a href="delete.php">Delete</a></li>
                        <li><a href="select.php">Select</a></li>
                        <li><a href="update.php">Update</a></li>
                    </ul>
                </li>';
                } ?>
    
            </ul>
            <form method="POST" class="navbar-form navbar-left" action="search.php">
                <div class="input-group">
                    <input type="text" class="form-control" id="navbar-search-input" name="keyword" placeholder="Search..." required>
                    <span class="input-group-btn" id="searchBtn" style="display:none;">
                        <button type="submit" class="btn btn-default btn-flat"><i class="fa fa-search"></i> </button>
                    </span>
                </div>
            </form>

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
                  <li class="footer"><a href="cart_view.php"><b>Go to Cart</b></a></li>
                </ul>
              </li>
              <li class="dropdown messages-menu">
                <!-- Menu toggle button -->
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <i class="fa fa-truck"></i>
                  <?php if (isset($_SESSION["branch"])) {
                      echo "<span id='selected-branch'>" .
                          $_SESSION["branch"] .
                          "</span>";
                  } else {
                      echo "<span id='selected-branch'>Select a branch..</span>";
                  } ?>
                </a>
                <ul class="dropdown-menu">
                  <?php
                  $conn = $pdo->open();

                  try {
                      $stmt = $conn->prepare(
                          "SELECT DISTINCT name FROM branch"
                      );
                      $stmt->execute();

                      foreach ($stmt as $row) {
                          echo "
                          <li><a href='#' class='dropdown-item branch'>" .
                              $row["name"] .
                              "</a></li>
                        ";
                      }
                  } catch (PDOException $e) {
                      echo "A connection cannot be established: " .
                          $e->getMessage();
                  }

                  $pdo->close();
                  ?>
                </ul>
              </li>
              <?php if (($_SESSION["user"]) == true) {
                  $image = !empty($user["photo"])
                      ? "images/" . $user["photo"]
                      : "images/profile.png";
                  echo '
                    <li class="dropdown user user-menu">
                      <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <img src="' .
                      $image .
                      '" class="user-image" alt="User Image" width="20px">
                        <span class="hidden-xs">' .
                      $user["firstname"] .
                      " " .
                      $user["lastname"] .
                      '</span>
                      </a>
                      <ul class="dropdown-menu">
                        <!-- User image -->
                        <li class="user-header">
                          <img src="' .
                      $image .
                      '" class="img-circle" alt="User Image" style="width: 35px; margin-left: auto; margin-right: auto; display: block">
    
                          <p>
                            ' .
                      $user["firstname"] .
                      " " .
                      $user["lastname"] .
                      '
                            <small>Member since ' .
                      date("M. Y", strtotime($user["created_on"])) .
                      '</small>
                          </p>
                        </li>
                        <li class="user-footer">
                          <div class="pull-left">
                            <a href="profile.php" class="btn btn-default btn-flat">Profile</a>
                          </div>
                          <div class="pull-right">
                            <a href="signout.php" class="btn btn-default btn-flat">Sign out</a>
                          </div>
                        </li>
                      </ul>
                    </li>
                  ';
              } else {
                  echo "
                    <li><a href='signin.php'>Sign In</a></li>
                    <li><a href='signup.php'>Sign Up</a></li>
                  ";
              } ?>
            </ul>
        </div>
    </div>
    </nav>
</header>

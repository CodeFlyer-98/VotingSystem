<header class="main-header" style="background-color: #03c04a;">
  <nav class="navbar navbar-static-top" style="background-color: #03c04a;">
    <div class="container" style="background-color: #03c04a;">
      <div class="navbar-header" style="background-color: #03c04a;">
        <!-- Replace the text with the logo image -->
        <a href="home.php" class="navbar-brand" style="background-color: #03c04a; padding-left: 0;">
          <img src="images/logo.png" alt="Logo" style="max-height: 40px; display: inline-block; margin-right: 10px;">
        </a>
        <button type="button" class="navbar-toggle collapsed" style="background-color: #03c04a;" data-toggle="collapse" data-target="#navbar-collapse">
          <i class="fa fa-bars"></i>
        </button>
      </div>

      <!-- Collect the nav links, forms, and other content for toggling -->
      <div class="collapse navbar-collapse pull-left" id="navbar-collapse">
        <ul class="nav navbar-nav">
          <!-- About Us Section -->
          <li><a href="about_us.php" style="color: black; font-size: 16px; font-weight: bold; font-family: 'Times', sans-serif;">ABOUT US</a></li>
          <!-- Instructions Section -->
          <li><a href="instructions.php" style="color: black; font-size: 16px; font-weight: bold; font-family: 'Times', sans-serif;">INSTRUCTIONS</a></li>

          <?php
            if(isset($_SESSION['student'])){
              echo "
                <li><a href='index.php'>HOME</a></li>
                <li><a href='transaction.php'>TRANSACTION</a></li>
              ";
            } 
          ?>
        </ul>
      </div>
      <!-- /.navbar-collapse -->
      <!-- Navbar Right Menu -->
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <li class="user user-menu">
            <a href="">
              <img src="<?php echo (!empty($voter['photo'])) ? 'images/'.$voter['photo'] : 'images/profile.jpg' ?>" class="user-image" alt="User Image">
              <span class="hidden-xs" style="color: black; font-size: 22px; font-family: 'Times', sans-serif;"><?php echo $voter['firstname'].' '.$voter['lastname']; ?></span>
            </a>
          </li>
          <li><a href="logout.php"><b style="color: black; font-size: 22px;"><i class="fa fa-sign-out"></i></b><b style="color: black; font-size: 22px; font-family: 'Times', sans-serif;"> </b></a></li>  
        </ul>
      </div>
      <!-- /.navbar-custom-menu -->
    </div>
    <!-- /.container-fluid -->
  </nav>
</header>

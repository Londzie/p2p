<?php
require_once('../global_functions.php');
require_once('../config/config.php');
connect_to_db();
// If form submitted, insert values into the database.
if (isset($_REQUEST['username'])){
  if(isset($_SESSION['ref'])) {
    /********Save data to references table*******/
      // add backslashes
 		$username = addslashes($_REQUEST['username']);
     //escapes special characters in a string
    $username = mysqli_real_escape_string($db_connection,$username); 
    $email = addslashes($_REQUEST['email']);
    $email = mysqli_real_escape_string($db_connection,$email);
    $password = addslashes($_REQUEST['password']);
    $password = mysqli_real_escape_string($db_connection,$password);
    $name = addslashes($_REQUEST['name']);
    $name = mysqli_real_escape_string($db_connection,$name);
    $surname = addslashes($_REQUEST['surname']);
    $surname = mysqli_real_escape_string($db_connection,$surname);
    $date = addslashes($_REQUEST['dob']);
    $date = mysqli_real_escape_string($db_connection,$date);
    $cellno = addslashes($_REQUEST['cellphone']);
    $cellno = mysqli_real_escape_string($db_connection,$cellno);
    $bank_name = addslashes($_REQUEST['bank']);
    $bank_name = mysqli_real_escape_string($db_connection,$bank_name);
    $account_no = addslashes($_REQUEST['account_no']);
    $account_no = mysqli_real_escape_string($db_connection,$account_no);
    $cellno2 = addslashes($_REQUEST['cellphone2']);
    $cellno2 = mysqli_real_escape_string($db_connection,$cellno2);
    $trn_date = date("Y-m-d H:i:s");
    $query = "INSERT into refs (username, email, password, name, surname, date_of_birth, contact_cell, bank_name, account_no, linked_cell,referer_id) 
              VALUES ('$username', '$email', '".md5($password)."', '$name', '$surname', '$date','$cellno', '$bank_name', '$account_no', '$cellno2','".$_SESSION['ref']."')";
  }else{
    // removes backslashes
    $username = stripslashes($_REQUEST['username']);
    //escapes special characters in a string
    $username = mysqli_real_escape_string($db_connection,$username); 
    $email = stripslashes($_REQUEST['email']);
    $email = mysqli_real_escape_string($db_connection,$email);
    $password = stripslashes($_REQUEST['password']);
    $password = mysqli_real_escape_string($db_connection,$password);
    $name = stripslashes($_REQUEST['name']);
    $name = mysqli_real_escape_string($db_connection,$name);
    $surname = stripslashes($_REQUEST['surname']);
    $surname = mysqli_real_escape_string($db_connection,$surname);
    $date = stripslashes($_REQUEST['dob']);
    $date = mysqli_real_escape_string($db_connection,$date);
    $cellno = stripslashes($_REQUEST['cellphone']);
    $cellno = mysqli_real_escape_string($db_connection,$cellno);
    $bank_name = stripslashes($_REQUEST['bank']);
    $bank_name = mysqli_real_escape_string($db_connection,$bank_name);
    $account_no = stripslashes($_REQUEST['account_no']);
    $account_no = mysqli_real_escape_string($db_connection,$account_no);
    $cellno2 = stripslashes($_REQUEST['cellphone2']);
    $cellno2 = mysqli_real_escape_string($db_connection,$cellno2);
    $trn_date = date("Y-m-d H:i:s");
            $query = "INSERT into `users` (username, email, password, name, surname, date_of_birth, contact_cell, bank_name, account_no, linked_cell)
    VALUES ('$username', '$email', '".md5($password)."', '$name', '$surname', '$date','$cellno', '$bank_name', '$account_no', '$cellno2')";
  }

  $result = mysqli_query($db_connection,$query);
  if($result){
    echo "<div class='form'>
    <h3>You are registered successfully.</h3>
    <br/>Click here to <a href='$base_url/login/login.php'>Login</a></div>";
  }

}else{
  // if no username is set 
?>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Home Page</title>

  <!-- Custom fonts for this theme -->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css">

  <!-- Theme CSS -->
  <link href="../assets/css/freelancer.min.css" rel="stylesheet">

</head>

<body id="page-top">

  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg bg-secondary text-uppercase fixed-top" id="mainNav">
    <div class="container">
      <a class="navbar-brand js-scroll-trigger" href="<?php echo $base_url; ?>">CASH BANKERS</a>
      <button class="navbar-toggler navbar-toggler-right text-uppercase font-weight-bold bg-primary text-white rounded" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        Menu
        <i class="fas fa-bars"></i>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item mx-0 mx-lg-1">
            <a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="#about">About</a>
          </li>
          <li class="nav-item mx-0 mx-lg-1">
            <a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="#contact">Contact</a>
          </li>
	  <li class="nav-item mx-0 mx-lg-1">
            <a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="<?php echo $base_url; ?>/login/login.php">Login</a>
          </li>
	  <li class="nav-item mx-0 mx-lg-1">
            <a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="<?php echo $base_url; ?>/login/registration.php">Register</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Masthead -->
  <header class="masthead bg-primary text-white text-center">
    <div class="container d-flex align-items-center flex-column">

      <!-- Masthead Avatar Image -->
     

      <!-- Masthead Heading -->
	  <a href="#register"> <img class="masthead-avatar mb-5" src="img/avataaars.svg" alt=""></a>
      <h1 class="masthead-heading text-uppercase mb-0">Register</h1>

      <!-- Icon Divider -->
      <div class="divider-custom divider-light">
        <div class="divider-custom-line"></div>
        <div class="divider-custom-icon">
          <i class="fas fa-star"></i>
        </div>
        <div class="divider-custom-line"></div>
      </div>

    </div>
  </header>

  <!-- About Section -->
  <section class="page-section bg-primary text-white mb-0" id="about">
    <div class="container">

      <!-- About Section Heading -->
      <!-- <h2 class="page-section-heading text-center text-uppercase text-white">About</h2> -->

      <!-- Icon Divider -->
      <!-- <div class="divider-custom divider-light">
        <div class="divider-custom-line"></div>
        <div class="divider-custom-icon">
          <i class="fas fa-star"></i>
        </div>
        <div class="divider-custom-line"></div>
      </div> -->

      <!-- About Section Content -->
      <!-- <div class="row">
        <div class="col-lg-4 ml-auto">
          <p class="lead">Freelancer is a free bootstrap theme created by Start Bootstrap. The download includes the complete source files including HTML, CSS, and JavaScript as well as optional SASS stylesheets for easy customization.</p>
        </div>
        <div class="col-lg-4 mr-auto">
          <p class="lead">You can create your own custom avatar for the masthead, change the icon in the dividers, and add your email address to the contact form to make it fully functional!</p>
        </div>
      </div> -->

      <!-- About Section Button -->
      <!-- <div class="text-center mt-4">
        <a class="btn btn-xl btn-outline-light" href="https://startbootstrap.com/themes/freelancer/">
          <i class="fas fa-download mr-2"></i>
          Free Download!
        </a>
      </div> -->

    </div>
  </section>

  <!-- Contact Section -->
  <section class="page-section" id="register">
    <div class="container">

      <!-- Registration Section Heading -->
      <!-- <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">Register</h2> -->

      <!-- Icon Divider -->
      <!-- <div class="divider-custom">
        <div class="divider-custom-line"></div>
        <div class="divider-custom-icon">
          <i class="fas fa-star"></i>
        </div>
        <div class="divider-custom-line"></div>
      </div> -->

      <!-- Registration Section Form -->
      <div class="row">
        <div class="col-lg-8 mx-auto">
			<!-- To configure the contact form email address, go to mail/contact_me.php and update the email address in the PHP file on line 19. -->
			<h1>Personal Details</h1>
			<form name="sentMessage" id="contactForm" novalidate="novalidate">
				<div class="control-group">
				<div class="form-group floating-label-form-group controls mb-0 pb-2">
					<label>Username</label>
					<input class="form-control" id="name" name="username" type="text" placeholder="Username" required="required" data-validation-required-message="Please enter your name.">
					<p class="help-block text-danger"></p>
				</div>
				</div>
				<div class="control-group">
				<div class="form-group floating-label-form-group controls mb-0 pb-2">
					<label>Email Address</label>
					<input class="form-control" id="email" name="email"type="email" placeholder="Email Address" required="required" data-validation-required-message="Please enter your email address.">
					<p class="help-block text-danger"></p>
				</div>
				</div>
				<div class="control-group">
				<div class="form-group floating-label-form-group controls mb-0 pb-2">
					<label>Password</label>
					<input class="form-control" id="password" name= "password"type="password" placeholder="Password" required="required" data-validation-required-message="Please enter your name.">
					<p class="help-block text-danger"></p>
				</div>
				</div>
				<div class="control-group">
				<div class="form-group floating-label-form-group controls mb-0 pb-2">
					<label>Phone Number</label>
					<input class="form-control" id="phone" type="tel" placeholder="Phone Number" required="required" data-validation-required-message="Please enter your phone number.">
					<p class="help-block text-danger"></p>
				</div>
				</div>
				<div class="control-group">
				<div class="form-group floating-label-form-group controls mb-0 pb-2">
					<label>Name</label>
					<input class="form-control" id="name" name ="name" type="text" placeholder="Name" required="required" data-validation-required-message="Please enter your name.">
					<p class="help-block text-danger"></p>
				</div>
				</div>
				<div class="control-group">
				<div class="form-group floating-label-form-group controls mb-0 pb-2">
					<label>Surname</label>
					<input class="form-control" id="name" name="surname" type="text" placeholder="Surname" required="required" data-validation-required-message="Please enter your name.">
					<p class="help-block text-danger"></p>
				</div>
				</div>
				<div class="control-group">
				<div class="form-group floating-label-form-group controls mb-0 pb-2">
					<label>Date of Birth</label>
					<input class="form-control" id="name" name = "dob" type="text" placeholder="Date of Birth" required="required" data-validation-required-message="Please enter your name.">
					<p class="help-block text-danger"></p>
				</div>
				</div>
				<div class="control-group">
				<div class="form-group floating-label-form-group controls mb-0 pb-2">
					<label>Phone Number</label>
					<input class="form-control" id="name" name = "cellphone" type="text" placeholder="Cellphone Number" required="required" data-validation-required-message="Please enter your name.">
					<p class="help-block text-danger"></p>
				</div>
				</div>
				
				<h1>Banking details</h1>
				<select name= "bank">
					<option value="capitec">Capitec Bank</option>
					<option value="standard">Standard Bank</option>
					<option value="fnb">First National Bank</option>
					<option value="absa">ABSA</option>
					<option value="ithala">Ithala Bank</option>
				</select>
				<div class="control-group">
					<div class="form-group floating-label-form-group controls mb-0 pb-2">
						<label>Account Number</label>
						<input class="form-control" id="name" type="text" name="account_no" placeholder="Account number" required="required" data-validation-required-message="Please enter your name.">
						<p class="help-block text-danger"></p>
					</div>
					</div>
					<div class="control-group">
					<div class="form-group floating-label-form-group controls mb-0 pb-2">
						<label>Linked Cellphone Number</label>
						<input class="form-control" id="name"  type="text" name="cellphone2" placeholder="Linked Cellphone Number" required="required" data-validation-required-message="Please enter your name.">
						<p class="help-block text-danger"></p>
					</div>
					</div>
					<br>
					<div id="success"></div>
					<div class="form-group">
					<button type="submit" class="btn btn-primary btn-xl" id="sendMessageButton">Register</button>
					<?php
								if(isset($_GET['ref'])) {
									$_SESSION['ref'] = $_GET['ref'];
									// Let's check if the reference exists
									$result = mysqli_query($db_connection,"SELECT username from users where id=".$_GET['ref']);
									if($result)
										echo "<input type='text' class='btn' placeholder='Referrer: ".mysqli_fetch_row($result)[0]."' disabled />";
								}?>
          </div>
			</form>
			</div>
      </div>

    </div>
  </section>

  <!-- Footer -->
  <footer class="footer text-center">
    <div class="container">
      <div class="row">

        <!-- Footer Location -->
        <div class="col-lg-4 mb-5 mb-lg-0">
          <h4 class="text-uppercase mb-4">Location</h4>
          <p class="lead mb-0">2215 John Daniel Drive
            <br>Clark, MO 65243</p>
        </div>

        <!-- Footer About Text -->
        <div class="col-lg-4">
          <h4 class="text-uppercase mb-4">About Freelancer</h4>
          <p class="lead mb-0">Freelance is a free to use, MIT licensed Bootstrap theme created by
            <a href="http://startbootstrap.com">Start Bootstrap</a>.</p>
        </div>

      </div>
    </div>
  </footer>

  <!-- Copyright Section -->
  <section class="copyright py-4 text-center text-white">
    <div class="container">
      <small>Copyright &copy; Your Website 2019</small>
    </div>
  </section>

  <!-- Scroll to Top Button (Only visible on small and extra-small screen sizes) -->
  <div class="scroll-to-top d-lg-none position-fixed ">
    <a class="js-scroll-trigger d-block text-center text-white rounded" href="#page-top">
      <i class="fa fa-chevron-up"></i>
    </a>
  </div>

  <!-- Portfolio Modals -->

  <!-- Portfolio Modal 1 -->
  <div class="portfolio-modal modal fade" id="portfolioModal1" tabindex="-1" role="dialog" aria-labelledby="portfolioModal1Label" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
      <div class="modal-content">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">
            <i class="fas fa-times"></i>
          </span>
        </button>
        <div class="modal-body text-center">
          <div class="container">
            <div class="row justify-content-center">
              <div class="col-lg-8">
                <!-- Portfolio Modal - Title -->
                <h2 class="portfolio-modal-title text-secondary text-uppercase mb-0">Log Cabin</h2>
                <!-- Icon Divider -->
                <div class="divider-custom">
                  <div class="divider-custom-line"></div>
                  <div class="divider-custom-icon">
                    <i class="fas fa-star"></i>
                  </div>
                  <div class="divider-custom-line"></div>
                </div>
                <!-- Portfolio Modal - Image -->
                <img class="img-fluid rounded mb-5" src="img/portfolio/cabin.png" alt="">
                <!-- Portfolio Modal - Text -->
                <p class="mb-5">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Mollitia neque assumenda ipsam nihil, molestias magnam, recusandae quos quis inventore quisquam velit asperiores, vitae? Reprehenderit soluta, eos quod consequuntur itaque. Nam.</p>
                <button class="btn btn-primary" href="#" data-dismiss="modal">
                  <i class="fas fa-times fa-fw"></i>
                  Close Window
                </button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Portfolio Modal 2 -->
  <div class="portfolio-modal modal fade" id="portfolioModal2" tabindex="-1" role="dialog" aria-labelledby="portfolioModal2Label" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
      <div class="modal-content">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">
            <i class="fas fa-times"></i>
          </span>
        </button>
        <div class="modal-body text-center">
          <div class="container">
            <div class="row justify-content-center">
              <div class="col-lg-8">
                <!-- Portfolio Modal - Title -->
                <h2 class="portfolio-modal-title text-secondary text-uppercase mb-0">Tasty Cake</h2>
                <!-- Icon Divider -->
                <div class="divider-custom">
                  <div class="divider-custom-line"></div>
                  <div class="divider-custom-icon">
                    <i class="fas fa-star"></i>
                  </div>
                  <div class="divider-custom-line"></div>
                </div>
                <!-- Portfolio Modal - Image -->
                <img class="img-fluid rounded mb-5" src="img/portfolio/cake.png" alt="">
                <!-- Portfolio Modal - Text -->
                <p class="mb-5">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Mollitia neque assumenda ipsam nihil, molestias magnam, recusandae quos quis inventore quisquam velit asperiores, vitae? Reprehenderit soluta, eos quod consequuntur itaque. Nam.</p>
                <button class="btn btn-primary" href="#" data-dismiss="modal">
                  <i class="fas fa-times fa-fw"></i>
                  Close Window
                </button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Portfolio Modal 3 -->
  <div class="portfolio-modal modal fade" id="portfolioModal3" tabindex="-1" role="dialog" aria-labelledby="portfolioModal3Label" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
      <div class="modal-content">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">
            <i class="fas fa-times"></i>
          </span>
        </button>
        <div class="modal-body text-center">
          <div class="container">
            <div class="row justify-content-center">
              <div class="col-lg-8">
                <!-- Portfolio Modal - Title -->
                <h2 class="portfolio-modal-title text-secondary text-uppercase mb-0">Circus Tent</h2>
                <!-- Icon Divider -->
                <div class="divider-custom">
                  <div class="divider-custom-line"></div>
                  <div class="divider-custom-icon">
                    <i class="fas fa-star"></i>
                  </div>
                  <div class="divider-custom-line"></div>
                </div>
                <!-- Portfolio Modal - Image -->
                <img class="img-fluid rounded mb-5" src="img/portfolio/circus.png" alt="">
                <!-- Portfolio Modal - Text -->
                <p class="mb-5">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Mollitia neque assumenda ipsam nihil, molestias magnam, recusandae quos quis inventore quisquam velit asperiores, vitae? Reprehenderit soluta, eos quod consequuntur itaque. Nam.</p>
                <button class="btn btn-primary" href="#" data-dismiss="modal">
                  <i class="fas fa-times fa-fw"></i>
                  Close Window
                </button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Portfolio Modal 4 -->
  <div class="portfolio-modal modal fade" id="portfolioModal4" tabindex="-1" role="dialog" aria-labelledby="portfolioModal4Label" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
      <div class="modal-content">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">
            <i class="fas fa-times"></i>
          </span>
        </button>
        <div class="modal-body text-center">
          <div class="container">
            <div class="row justify-content-center">
              <div class="col-lg-8">
                <!-- Portfolio Modal - Title -->
                <h2 class="portfolio-modal-title text-secondary text-uppercase mb-0">Controller</h2>
                <!-- Icon Divider -->
                <div class="divider-custom">
                  <div class="divider-custom-line"></div>
                  <div class="divider-custom-icon">
                    <i class="fas fa-star"></i>
                  </div>
                  <div class="divider-custom-line"></div>
                </div>
                <!-- Portfolio Modal - Image -->
                <img class="img-fluid rounded mb-5" src="img/portfolio/game.png" alt="">
                <!-- Portfolio Modal - Text -->
                <p class="mb-5">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Mollitia neque assumenda ipsam nihil, molestias magnam, recusandae quos quis inventore quisquam velit asperiores, vitae? Reprehenderit soluta, eos quod consequuntur itaque. Nam.</p>
                <button class="btn btn-primary" href="#" data-dismiss="modal">
                  <i class="fas fa-times fa-fw"></i>
                  Close Window
                </button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Portfolio Modal 5 -->
  <div class="portfolio-modal modal fade" id="portfolioModal5" tabindex="-1" role="dialog" aria-labelledby="portfolioModal5Label" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
      <div class="modal-content">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">
            <i class="fas fa-times"></i>
          </span>
        </button>
        <div class="modal-body text-center">
          <div class="container">
            <div class="row justify-content-center">
              <div class="col-lg-8">
                <!-- Portfolio Modal - Title -->
                <h2 class="portfolio-modal-title text-secondary text-uppercase mb-0">Locked Safe</h2>
                <!-- Icon Divider -->
                <div class="divider-custom">
                  <div class="divider-custom-line"></div>
                  <div class="divider-custom-icon">
                    <i class="fas fa-star"></i>
                  </div>
                  <div class="divider-custom-line"></div>
                </div>
                <!-- Portfolio Modal - Image -->
                <img class="img-fluid rounded mb-5" src="img/portfolio/safe.png" alt="">
                <!-- Portfolio Modal - Text -->
                <p class="mb-5">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Mollitia neque assumenda ipsam nihil, molestias magnam, recusandae quos quis inventore quisquam velit asperiores, vitae? Reprehenderit soluta, eos quod consequuntur itaque. Nam.</p>
                <button class="btn btn-primary" href="#" data-dismiss="modal">
                  <i class="fas fa-times fa-fw"></i>
                  Close Window
                </button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Portfolio Modal 6 -->
  <div class="portfolio-modal modal fade" id="portfolioModal6" tabindex="-1" role="dialog" aria-labelledby="portfolioModal6Label" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
      <div class="modal-content">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">
            <i class="fas fa-times"></i>
          </span>
        </button>
        <div class="modal-body text-center">
          <div class="container">
            <div class="row justify-content-center">
              <div class="col-lg-8">
                <!-- Portfolio Modal - Title -->
                <h2 class="portfolio-modal-title text-secondary text-uppercase mb-0">Submarine</h2>
                <!-- Icon Divider -->
                <div class="divider-custom">
                  <div class="divider-custom-line"></div>
                  <div class="divider-custom-icon">
                    <i class="fas fa-star"></i>
                  </div>
                  <div class="divider-custom-line"></div>
                </div>
                <!-- Portfolio Modal - Image -->
                <img class="img-fluid rounded mb-5" src="img/portfolio/submarine.png" alt="">
                <!-- Portfolio Modal - Text -->
                <p class="mb-5">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Mollitia neque assumenda ipsam nihil, molestias magnam, recusandae quos quis inventore quisquam velit asperiores, vitae? Reprehenderit soluta, eos quod consequuntur itaque. Nam.</p>
                <button class="btn btn-primary" href="#" data-dismiss="modal">
                  <i class="fas fa-times fa-fw"></i>
                  Close Window
                </button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Plugin JavaScript -->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Contact Form JavaScript -->
  <script src="js/jqBootstrapValidation.js"></script>
  <script src="js/contact_me.js"></script>

  <!-- Custom scripts for this template -->
  <script src="js/freelancer.min.js"></script>
<?php } ?>
</body>

</html>

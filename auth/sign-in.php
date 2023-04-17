<?php
include 'conn.php';
date_default_timezone_set("Asia/Jakarta");
$timenow = date("j-F-Y-h:i:s A");

	if(isset($_POST['login']))
	{
	$email = mysqli_real_escape_string($con,$_POST['akun']);
	$username = mysqli_real_escape_string($con,$_POST['akun']);
	$pass = mysqli_real_escape_string($con,$_POST['pass']);
	$queryuser = mysqli_query($con,"SELECT * FROM login WHERE email='$email' OR username='$username'");
	$cariuser = mysqli_fetch_assoc($queryuser);
	if( password_verify($pass, $cariuser['password']) ) {
		setcookie("login","1",time()+86400);
      		setcookie("id_user",$cariuser['id_user'],time()+86400);
		setcookie("user",$cariuser['nama_lengkap'],time()+86400);
      		setcookie("role",$cariuser['role'],time()+86400);
		echo "<meta content='0; url=/' http-equiv='refresh'>";
		//header('location:/', true, 301);
      		//if($_COOKIE['role']=="Member"){
        	//	header('location:/');
	      	//} else {
        	//	header('location:/admin/');
	      	//}
		exit();
	} else {
		echo 'Username atau password salah';
	      	setcookie("login","0",time()+86400);
	      	setcookie("id_user","",time()+86400);
	      	setcookie("user","",time()+86400);
	      	setcookie("role","",time()+86400);
		header("location:/login");
	}


	}

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" http-equiv="refresh">

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <title>Widan Store | Masuk</title>
    <link rel="icon" type="png" href="./assets/images/favicon-mz.png">

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="assets/css/fontawesome.css?<?php echo time(); ?>">
    <link rel="stylesheet" href="assets/css/templatemo-cyborg-gaming.css?<?php echo time(); ?>">
    <link rel="stylesheet" href="assets/css/owl.css?<?php echo time(); ?>">
    <link rel="stylesheet" href="assets/css/animate.css?<?php echo time(); ?>">
    <link rel="stylesheet"href="https://unpkg.com/swiper@7/swiper-bundle.min.css?<?php echo time(); ?>">

    <!-- REMIX ICONS -->
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">

    <!-- Boxicons CSS -->
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
  </head>

<body>

  <!-- ***** Preloader Start ***** -->
  <div id="js-preloader" class="js-preloader">
    <div class="preloader-inner">
      <span class="dot"></span>
      <div class="dots">
        <span></span>
        <span></span>
        <span></span>
      </div>
    </div>
  </div>
  <!-- ***** Preloader End ***** -->

  <!-- ***** Header Area Start ***** -->
  <header class="header-area header-sticky">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <nav class="main-nav">
                    <!-- ***** Logo Start ***** -->
                    <a href="./" class="logo">
                        <div class="heading-section">
                            <h4>WidanStore.</h4>
                        </div>
                    </a>
                    <!-- ***** Logo End ***** -->
                    <!-- ***** Search End ***** -->
                    <div class="search-input">
                      <form id="search" action="#">
                        <input type="text" placeholder="Cari Sesuatu" id='searchText' name="searchKeyword" onkeypress="handle" />
                        <i class="fa fa-search"></i>
                      </form>
                    </div>
                    <!-- ***** Search End ***** -->
                    <!-- ***** Menu Start ***** -->
                    <ul class="nav">
                        <li><a href="./">Home</a></li>
                        <?php
                        if(!isset($_SESSION['log'])){
                          echo '
                        	<li><a href="./account" class="active">Akun <img src="assets/images/profile-header.jpg" alt="">
                          ';
                        } else {
							echo '
							<li><a href="./history">Riwayat</a></li>
                        	<li><a href="./account" class="active">Akun <img src="assets/images/profile-header.jpg" alt="">
                          ';
                          
                          if($_SESSION['role']=='Member'){
                          } else {
							header('location:./admin/');
                          };
                          
                        }
                        ?>
					</ul>    
                    <a class='menu-trigger'>
                        <span>Menu</span>
                    </a>
                    <!-- ***** Menu End ***** -->
                </nav>
            </div>
        </div>
    </div>
  </header>
  <!-- ***** Header Area End ***** -->

  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <div class="page-content">
            
            <div class="register">
              <div class="row justify-content-center">
                <div class="col-sm-6 text-center">
                    <div class="heading-section">
                        <h4>Login</h4>
                    </div>
                    <div class="form">
                      <form method="post">
                          <div class="form-group mb-2"><input class="form-control" type="text" name="akun" placeholder="Username/Email" required></div>
                          <div class="form-group mb-2"><input class="form-control" type="password" name="pass" placeholder="Password" required></div>
                          <div class="form-group mb-4"><input class="btn btn-success d-block w-100" type="submit" name="login" value="Login"></div>
                      </form>
                      <div class="text-white">
                          <span>Belum punya akun? <a href="./register" class="link login-link">Daftar</a></span><br>
                          <a class="mt-2 btn btn-danger" href="./">Batal</a>
                      </div>
                    </div>
                </div>
              </div>
            </div>

        </div>
      </div>
    </div>
  </div>
  
  <footer>
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <p>Copyright ©2023 <a href="#">Widan Store</a>. All rights reserved. 
        </div>
      </div>
    </div>
  </footer>


  <!-- Scripts -->
  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.min.js"></script>

  <script src="assets/js/isotope.min.js"></script>
  <script src="assets/js/owl-carousel.js"></script>
  <script src="assets/js/tabs.js"></script>
  <script src="assets/js/popup.js"></script>
  <script src="assets/js/custom.js"></script>

</body>

</html>

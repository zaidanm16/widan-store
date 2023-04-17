<?php
include 'conn.php';

if(!isset($_COOKIE['login'])){
        header('location:/login');
} else {
//        header('location:/');
}
//if($_COOKIE['login']=="0"){
//	header('location:/login');
//} else {
	//header('location:/');
//}

//if($_COOKIE['role']=="Admin"){
//	header('location:/admin/');
//} else {
	//header('location:/');
//}
?>
<!DOCTYPE html>
<html lang="en">
  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" http-equiv="refresh">

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <title>Widan Store | Top Up Game Terpercaya</title>
    <link rel="icon" type="png" href="./assets/images/favicon-mz.png">

    <!-- Bootstrap core CSS -->
    <link href="/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="assets/css/fontawesome.css?<?php echo time(); ?>">
    <link rel="stylesheet" href="assets/css/templatemo-cyborg-gaming.css?<?php echo time(); ?>">
    <link rel="stylesheet" href="assets/css/owl.css?<?php echo time(); ?>">
    <link rel="stylesheet" href="assets/css/animate.css?<?php echo time(); ?>">
    <link rel="stylesheet"href="https://unpkg.com/swiper@7/swiper-bundle.min.css?<?php echo time(); ?>">

    <!-- REMIX ICONS -->
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
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
                        <li><a href="./" class="active">Home</a></li>
                        <?php
                        if(isset($_COOKIE['login'])==""){
                          echo '
                        	<li><a href="./account">Akun <img src="assets/images/profile-header.jpg" alt="">
                          ';
                        } else {
                          echo '
                          <li><a href="./history">Riwayat</a></li>
                        	<li><a href="./account">Akun <img src="assets/images/profile-header.jpg" alt="">
                          ';
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

          <!-- ***** Banner Start ***** -->
          <div class="main-banner">
            <div class="row">
              <div class="col-lg-7">
                <div class="header-text">
                  <h6><b>Selamat datang di Widan Store.
                  <?php
                  if(isset($_COOKIE['user'])==""){
                    
                  } else {
                    echo $_COOKIE['user'];
                  }
                  ?></b>
                  </h6>
                  <h4><em>Top Up</em> Games Favoritmu dengan Cepat dan Tanpa Ribet</h4>
                </div>
              </div>
            </div>
          </div>
          <!-- ***** Banner End ***** -->

          <!-- ***** Most Popular Start ***** -->
          <div class="most-popular">
            <div class="row">
              <div class="col-lg-12">
                <div class="heading-section">
                  <h4><em>Paling Populer</em> Sekarang Ini</h4><br>
                </div>
                <div class="row">
                <?php
                $brgs=mysqli_query($con,"SELECT * from game order by id_game ASC");
                while($p=mysqli_fetch_array($brgs)){
                ?>
                  <div class="col-lg-3 col-sm-6">
                    <div class="item text-center">
                      <a href="./<?php echo $p['url']?>">
                      <img src="<?php echo $p['gambar']?>" alt="">
                      <h4><?php echo $p['nama_game']?><br><span><?php echo $p['nama_vendor']?></span></h4>
                      </a>
                    </div>
                  </div>
                <?php
                  }
                ?>
                </div>
              </div>
            </div>
            
          </div>
          <!-- ***** Most Popular End ***** -->

          <!-- ***** About Start ***** -->
          <div class="start-stream">
            <div class="col-lg-12">
              <?php include 'footer.php';?>
              <div class="row">
                <div class="col-lg-4">
                  <div class="item service">
                    <div class="icon">
                      <img src="assets/images/service-01.jpg" alt="" style="max-width: 60px; border-radius: 50%;">
                    </div>
                    <h4>Bayar dalam hitungan detik</h4>
                    <p>Hanya dibutuhkan beberapa detik saja untuk menyelesaikan pembayaran di Widan Store karena situs kami berfungsi dengan baik dan mudah untuk digunakan.</p>
                  </div>
                </div>
                <div class="col-lg-4">
                  <div class="item service">
                    <div class="icon">
                      <img src="assets/images/service-02.jpg" alt="" style="max-width: 60px; border-radius: 50%;">
                    </div>
                    <h4>Metode pembayaran terbaik</h4>
                    <p>Kami menawarkan begitu banyak pilihan pembayaran mulai dari potong pulsa, e-wallet, bank transfer, dan pembayaran di mini market terdekat.</p>
                  </div>
                </div>
                <div class="col-lg-4">
                  <div class="item service">
                    <div class="icon">
                      <img src="assets/images/service-03.jpg" alt="" style="max-width: 60px; border-radius: 50%;">
                    </div>
                    <h4>Promosi-promosi menarik</h4>
                    <p>Penggemar game dapat bergantung pada Widan Store karena kami memberikan penawaran menarik, diskon dan kode item dari promosi game yang disukai kamu.</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- ***** About End ***** -->

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
  <script src="/vendor/jquery/jquery.min.js"></script>
  <script src="/vendor/bootstrap/js/bootstrap.min.js"></script>

  <script src="assets/js/isotope.min.js"></script>
  <script src="assets/js/owl-carousel.js"></script>
  <script src="assets/js/tabs.js"></script>
  <script src="assets/js/popup.js"></script>
  <script src="assets/js/custom.js"></script>


  </body>

</html>

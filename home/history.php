<?php
include 'conn.php';

if($_COOKIE['login']==""){
	header('location:/login');
}

if($_COOKIE['role']=="Admin"){
  header('location:/admin/');
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" http-equiv="refresh">

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <title>Widan Store | History</title>
    <link rel="icon" type="png" href="/assets/images/favicon-mz.png">

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- DATATABLE CSS -->
    <link href='./assets/css/dataTables.bootstrap5.min.css?<?php echo time(); ?>' rel='stylesheet'>
    
    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="/assets/css/fontawesome.css?<?php echo time(); ?>">
    <link rel="stylesheet" href="/assets/css/templatemo-cyborg-gaming.css?<?php echo time(); ?>">
    <link rel="stylesheet" href="/assets/css/owl.css?<?php echo time(); ?>">
    <link rel="stylesheet" href="/assets/css/animate.css?<?php echo time(); ?>">
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
                        if(isset($_COOKIE['login'])==""){
                          echo '
                        	<li><a href="./account">Akun <img src="assets/images/profile-header.jpg" alt="">
                          ';
                        } else {
                          echo '
                          <li><a href="./history" class="active">Riwayat</a></li>
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
            <div class="row">
                <div class="col-lg-12">
                      <div class="heading-section">
                        <h4 class="text-white">Riwayat Transaksi</h4>
                      </div>
                      <hr class="text-white">  
                      <div class="row text-white mb-4">
                          <h5 class="mb-2 text-primary">Mobile Legends</h5>
                          <table class="table table-dark table-responsive table-striped table-bordered w-100">
                            <thead>
                              <tr>
                                <th>No.</th>
                                <th>Order ID</th>
                                <th>User ID</th>
                                <th>Item</th>
                                <th>Pembayaran</th>
                                <th>Status</th>
                                <th>Tanggal</th>
                              </tr>
                            </thead>
                            <tbody>
                              <?php 
                                $id_user = $_COOKIE['id_user'];
                                $riwayat=mysqli_query($con,"SELECT * from order_ml WHERE id_user='$id_user' order by order_id ASC");
                                $no=1;
                                while($p=mysqli_fetch_array($riwayat)){
                                $id = $p['order_id'];
                              ?>
                              <tr>
                                <td><?php echo $no++ ?></td>
                                <td class="text-white"><?php echo $p['order_id']; ?></td>
                                <td class="text-white"><?php echo $p['id_ml']; ?></td>
                                <td class="text-white"><?php echo $p['item'] ; ?> <i class="ri-vip-diamond-fill"></i></td>
                                <td class="text-white"><?php echo $p['metode'] ; ?></td>
                                <td class="text-white"><?php echo $p['Status'] ; ?></td>
                                <td class="text-white"><?php echo $p['tgl_order'] ; ?></td>
                              </tr>
                              <?php
                                }
                              ?>
                            </tbody>
                          </table>
                      </div>
                      <hr class="text-white">
                      <div class="row text-white mb-4">
                          <h5 class="mb-2 text-success">PUBG Mobile</h5>
                          <table class="table table-dark table-responsive table-striped table-bordered w-100">
                            <thead>
                              <tr>
                                <th>No.</th>
                                <th>Order ID</th>
                                <th>User ID</th>
                                <th>Item</th>
                                <th>Pembayaran</th>
                                <th>Status</th>
                                <th>Tanggal</th>
                              </tr>
                            </thead>
                            <tbody>
                              <?php 
                                $id_user = $_COOKIE['id_user'];
                                $riwayat=mysqli_query($con,"SELECT * from order_pubg WHERE id_user='$id_user' order by order_id ASC");
                                $no=1;
                                while($p=mysqli_fetch_array($riwayat)){
                                $id = $p['order_id'];
                              ?>
                              <tr>
                                <td><?php echo $no++ ?></td>
                                <td class="text-white"><?php echo $p['order_id']; ?></td>
                                <td class="text-white"><?php echo $p['id_pubg']; ?></td>
                                <td class="text-white"><?php echo $p['item'] ; ?> <i class="ri-money-dollar-box-line"></i></td>
                                <td class="text-white"><?php echo $p['metode'] ; ?></td>
                                <td class="text-white"><?php echo $p['Status'] ; ?></td>
                                <td class="text-white"><?php echo $p['tgl_order'] ; ?></td>
                              </tr>
                              <?php
                                }
                              ?>
                            </tbody>
                          </table>
                      </div>
                      <hr class="text-white">
                      <div class="row text-white mb-4">
                          <h5 class="mb-2 text-danger">Free Fire</h5>
                          <table class="table table-dark table-responsive table-striped table-bordered w-100">
                            <thead>
                              <tr>
                                <th>No.</th>
                                <th>Order ID</th>
                                <th>User ID</th>
                                <th>Item</th>
                                <th>Pembayaran</th>
                                <th>Status</th>
                                <th>Tanggal</th>
                              </tr>
                            </thead>
                            <tbody>
                              <?php 
                                $id_user = $_COOKIE['id_user'];
                                $riwayat=mysqli_query($con,"SELECT * from order_ff WHERE id_user='$id_user' order by order_id ASC");
                                $no=1;
                                while($p=mysqli_fetch_array($riwayat)){
                                $id = $p['order_id'];
                              ?>
                              <tr>
                                <td><?php echo $no++ ?></td>
                                <td class="text-white"><?php echo $p['order_id']; ?></td>
                                <td class="text-white"><?php echo $p['id_ff']; ?></td>
                                <td class="text-white"><?php echo $p['item'] ; ?> <i class="ri-vip-diamond-line"></i></td>
                                <td class="text-white"><?php echo $p['metode'] ; ?></td>
                                <td class="text-white"><?php echo $p['Status'] ; ?></td>
                                <td class="text-white"><?php echo $p['tgl_order'] ; ?></td>
                              </tr>
                              <?php
                                }
                              ?>
                            </tbody>
                          </table>
                      </div>
                      <hr class="text-white">
                      <div class="row text-white mb-4">
                          <h5 class="mb-2 text-info">Genshin Impact</h5>
                          <table class="table table-dark table-responsive table-striped table-bordered w-100">
                            <thead>
                              <tr>
                                <th>No.</th>
                                <th>Order ID</th>
                                <th>User ID</th>
                                <th>Item</th>
                                <th>Pembayaran</th>
                                <th>Status</th>
                                <th>Tanggal</th>
                              </tr>
                            </thead>
                            <tbody>
                              <?php 
                                $id_user = $_COOKIE['id_user'];
                                $riwayat=mysqli_query($con,"SELECT * from order_genshin WHERE id_user='$id_user' order by order_id ASC");
                                $no=1;
                                while($p=mysqli_fetch_array($riwayat)){
                                $id = $p['order_id'];
                              ?>
                              <tr>
                                <td><?php echo $no++ ?></td>
                                <td class="text-white"><?php echo $p['order_id']; ?></td>
                                <td class="text-white"><?php echo $p['id_genshin']; ?></td>
                                <td class="text-white"><?php echo $p['item'] ; ?> <i class="ri-vip-diamond-fill"></i></td>
                                <td class="text-white"><?php echo $p['metode'] ; ?></td>
                                <td class="text-white"><?php echo $p['Status'] ; ?></td>
                                <td class="text-white"><?php echo $p['tgl_order'] ; ?></td>
                              </tr>
                              <?php
                                }
                              ?>
                            </tbody>
                          </table>
                      </div>
                </div>
            </div>
        </div>
        <!-- ***** Banner End ***** -->

        </div>
      </div>
    </div>
  </div>
  
  <footer>
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <p>Copyright ©2023 <a href="./">Widan Store</a>. All rights reserved. 
        </div>
      </div>
    </div>
  </footer>


  <!-- Scripts -->
 
  <script src="/vendor/jquery/jquery.js"></script>
  <script src="/vendor/jquery/jquery.dataTables.min.js"></script>
  <script src="/vendor/jquery/dataTables.bootstrap5.min.js"></script>
  <script src="/vendor/bootstrap/js/bootstrap.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.isotope/3.0.6/isotope.pkgd.min.js"></script>
  <script src="/assets/js/owl-carousel.js"></script>
  <script src="/assets/js/tabs.js"></script>
  <script src="/assets/js/popup.js"></script>
  <script src="/assets/js/custom.js"></script>
  <!-- <script src="assets/js/datatables.js"></script> -->
  <script>
    $('.table').dataTable( {
      paging: false,
      info: false,
    } );
  </script>

</body> 
</html>

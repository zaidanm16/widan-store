<?php
include 'conn.php';

if(isset($_POST['pesan']))
  {
    function OrderId($type)
    {
      $limit = 2;
      $rand_num=rand(pow(3, $limit-1), pow(3, $limit)-1);
      $add_time=time().rand(99,10);
      $final_unique_id=$type.$rand_num.$add_time;
      return $final_unique_id;
    }
    $orderid= OrderId('PUBG');
    $id = $_POST['uid'];
    $item = $_POST['item'];
    $pembayaran = $_POST['pembayaran'];
    if(isset($_COOKIE['id_user'])){
      $user = $_COOKIE['id_user'];
      $nama_user = $_COOKIE['user'];
    } else {
      $user = 0;
      $nama_user = "Anonym";
    }

    $pesan = mysqli_query($con,"insert into order_pubg (order_id, id_user, nama_user, id_pubg, item, metode) 
		values('$orderid','$user','$nama_user','$id','$item','$pembayaran')");
    if ($pesan){
      if ($pembayaran=='gopay'){
        header('location:/payment/gopay');
      }
      elseif ($pembayaran=='Dana'){
        header('location:/payment/dana');
      }
      elseif ($pembayaran=='Ovo'){
        header('location:/payment/ovo');
      }
      elseif ($pembayaran=='LinkAja'){
        header('location:/payment/linkaja');
      }
      elseif ($pembayaran=='ShopeePay'){
        header('location:/payment/spay');
      }
    }
  }
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" http-equiv="refresh">

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <?php
    $p = mysqli_fetch_array(mysqli_query($con,"Select * from game where id_game='2'"));
    ?>
    <title>Widan Store | <?php echo $p['nama_game']?></title>
    <link rel="icon" type="png" href="./assets/images/favicon-mz.png">

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="assets/css/fontawesome.css">
    <link rel="stylesheet" href="assets/css/templatemo-cyborg-gaming.css?<?php echo time(); ?>">
    <link rel="stylesheet" href="assets/css/owl.css">
    <link rel="stylesheet" href="assets/css/animate.css">
    <link rel="stylesheet"href="https://unpkg.com/swiper@7/swiper-bundle.min.css">

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
                        <li><a href="./" class="active"><?php echo $p['nama_game']?></a></li>
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
          <div class="pubg-banner mb-3">
            <div class="row">
              <div class="col-lg-7">
                <div class="header-text">
                  <h4><em class="text-danger">Top Up</em> PUBG Mobile</h4>
                  <p class="mb-2">
                    Top up PUBG Mobile menggunakan voucher kode redeem (redeem code) hanya dalam hitungan detik! Cukup pilih jumlah voucher UC yang Anda inginkan, selesaikan pembayaran, dan kode voucher PUBG Mobile langsung terkirim dalam hitungan detik.
                  </p> 
                  <p class="mb-2">
                    Harga sudah termasuk PPN. Informasi tambahan, untuk transaksi menggunakan Telkomsel akan dikenakan biaya tambahan pajak.
                  </p>
                  <p>Download dan mainkan PUBG Mobile sekarang!</p>
                </div>
              </div>
            </div>
          </div>
          <!-- ***** Banner End ***** -->

          <!-- ***** About Start ***** -->
          <div class="start-stream">
            <div class="col-lg-12">
              <div class="row">
                <div class="col-lg-5">
                  <div class="item service">
                    <h4>Bagaimana cara beli UC PUBG Mobile?</h4>
                    <p>1. Masukkan Player ID PUBG-mu. <br>
                      2. Masukkan jumlah UC yang Kamu inginkan. <br>
                      3. Pilih cara pembayaran yang Kamu kehendaki. <br>
                      4. Klik tombol "Beli Sekarang" untuk menyelesaikan transaksi pembayaran.</p>
                  </div>
                </div>
                <div class="col-lg-7">
                  <div class="item service">
                    <h4>Bagaimana cara dapetin Royale Pass PUBG Mobile?</h4>
                    <p>
                      Upgrade Royale Pass PUBG Mobile jadi mudah, aman, dan praktis di Widan Store.
                    </p>
                    <p>
                    1. Pilih jumlah voucher 660 UC jika kamu ingin membeli Elite Pass atau 1800 UC untuk Elite Pass Plus. <br>
                    2. Pilih cara pembayaran paling mudah yang kamu suka.<br>
                    3. Klik pada tombol "Beli Sekarang" untuk menyelesaikan transaksi-mu.<br>
                    4. Masuk ke aplikasi PUBG Mobile dan ketuk tombol "Upgrade Pass" pada halaman Royale Pass.<br>
                    </p>
                  </div>
                </div>
              </div>
              <div class="register">
                <div class="row justify-content-center">
                  <div class="col-lg-12 text-center">
                      <div class="form">
                        <form method="post">
                            <div class="form-group mb-4">
                              <p class="mt-2 text-lg-start fw-bold text-white fs-40"><i class="ri-number-1"></i>- MASUKKAN PLAYER ID</p>
                              <input class="form-control" id="id_pubg" type="text" name="uid" placeholder="Masukkan ID" required>
                              <p class="mt-2 text-start">Untuk mengetahui User ID Anda, silakan klik menu profile dibagian kiri atas pada menu utama game. User ID akan terlihat dibagian bawah Nama Karakter Game Anda. Silakan masukkan User ID Anda untuk menyelesaikan transaksi. Contoh : 12345678(1234).</p>
                            </div>
                            
                            
                            <div class="form-group mb-5">
                              <p class="text-lg-start fw-bold text-white fs-40"><i class="ri-number-2"></i>- PILIH VOUCHER</p>
                              <div class="btn-group-lg text-lg-start mb-2">
                                <?php
                                $pubg=mysqli_query($con,"SELECT * from harga_pubg order by id_voucher ASC");
                                while($bml=mysqli_fetch_array($pubg)){
                                ?>
                                <input type="radio" class="btn-check" name="item" value="<?php echo $bml['item']?>" id="<?php echo $bml['id_voucher']?>" autocomplete="off" required />
                                <label class="btn btn-danger me-1 mb-1" for="<?php echo $bml['id_voucher']?>"><b> <?php echo $bml['item']?> <?php echo $bml['gambar']?></b><br> Rp<?php echo $bml['harga']?></label>
                                <?php } ?>
                              </div>
                            </div>

                          <div class="form-group mb-5">
                            <p class="text-lg-start fw-bold text-white fs-40"><i class="ri-number-3"></i>- PILIH PEMBAYARAN</p>
                            <div class="btn-group-lg">
                              <?php
                              $bayar=mysqli_query($con,"SELECT * from pembayaran order by id_bayar ASC");
                              while($b=mysqli_fetch_array($bayar)){
                              ?>
                              <input id="<?php echo $b['metode']?>" name="pembayaran" value="<?php echo $b['metode']?>" type="radio" class="btn-check" required/>
                              <label class="btn btn-outline-info btn-lg form-control mt-1 mb-1" for="<?php echo $b['metode']?>">
                                <img src="<?php echo $b['logo']?>" alt="<?php echo $b['metode']?>" style="max-width: <?php echo $b['ukuran']?>px;">
                              </label>
                              <?php } ?>
                            </div>
                          </div>

                          <div class="form-group mb-5">
                            <p class="text-lg-start fw-bold text-white fs-40"><i class="ri-number-4"></i>- BELI</p>
                            <p class="mt-2 text-start">Bukti pembayaran dan riwayat pembelian hanya bisa dilihat dengan login menggunakan akun Widan Store mu.</p>
                            
                          </div>
                          <div class="form-group mb-4 text-center justify-content-center"><input class="btn btn-lg btn-secondary hover-effect w-75" type="submit" name="pesan" value="Beli Sekarang"></div>
                        </form>
                      </div>
                  </div>
                </div>
              </div>

              <?php include 'footer.php';?>
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
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.min.js"></script>

  <script src="assets/js/isotope.min.js"></script>
  <script src="assets/js/owl-carousel.js"></script>
  <script src="assets/js/tabs.js"></script>
  <script src="assets/js/popup.js"></script>
  <script src="assets/js/custom.js"></script>

</body>

</html>

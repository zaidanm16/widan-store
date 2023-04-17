<?php
include 'conn.php';

if(isset($_POST['pesan']))
  {
    function OrderId($type)
    {
      $limit = 3;
      $rand_num=rand(pow(4, $limit-1), pow(2, $limit)-1);
      $add_time=time().rand(99,10);
      $final_unique_id=$type.$rand_num.$add_time;
      return $final_unique_id;
    }
    $orderid= OrderId('GI');
    $id = $_POST['uid'];
    $server = $_POST['server'];
    $item = $_POST['item'];
    $pembayaran = $_POST['pembayaran'];
    if(isset($_COOKIE['id_user'])){
      $user = $_COOKIE['id_user'];
      $nama_user = $_COOKIE['user'];
    } else {
      $user = 0;
      $nama_user = "Anonym";
    }

    $pesan = mysqli_query($con,"insert into order_genshin (order_id, id_user, nama_user, id_genshin, server, item, metode) 
		values('$orderid','$user','$nama_user','$id','$server','$item','$pembayaran')");
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
    $p = mysqli_fetch_array(mysqli_query($con,"Select * from game where id_game='4'"));
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
          <div class="genshin-banner mb-3">
            <div class="row">
              <div class="col-lg-7">
                <div class="header-text">
                  <h4><em class="text-info">Top Up</em> Genshin Impact</h4>
                  <p class="mb-2">
                    Top up Genesis Crystal Genshin Impact hanya dalam hitungan detik! Cukup masukan UID Genshin Impact Anda, pilih jumlah Genesis Crystals yang Anda inginkan, selesaikan pembayaran, dan Genesis Crystal akan secara langsung ditambahkan ke akun Genshin Impact Anda.
                  </p> 
                  <p class="mb-2">
                    Harga sudah termasuk PPN. Informasi tambahan, untuk transaksi menggunakan Telkomsel akan dikenakan biaya tambahan pajak.
                  </p>
                  <p>Unduh & Mainkan Genshin Impact sekarang!</p>
                </div>
              </div>
            </div>
          </div>
          <!-- ***** Banner End ***** -->

          <!-- ***** About Start ***** -->
          <div class="start-stream">
            <div class="col-lg-12">
              <div class="row mb-3">
                <div class="col-lg-6">
                  <div class="item service">
                    <h4>Bagaimana Cara Top up Genesis Crystal Genshin Impact?</h4>
                    <p>1. Masukan UID Genshin Impact mu, kemudian pilih server. <br>
                        2. Pilih jumlah Genesis Crystals yang kamu inginkan. <br>
                        3. Pilih cara pembayaran favoritmu. <br>
                        4. Selesaikan pembayaran.
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="item service">
                    <h4>Top Up Blessing of the Welkin Moon</h4>
                    <p>
                      1. Masukkan UID Genshin Impact Kamu, dan pilih server. <br>
                      2. Pilih "Blessing of the Welkin Moon". <br>
                      3. Pilih metode pembayaran yang Kamu inginkan. <br>
                      4. Selesaikan pembayaran.
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
                              <p class="mt-2 text-lg-start fw-bold text-white fs-40"><i class="ri-number-1"></i>- MASUKKAN UID DAN PILIH SERVER</p>
                              <div class="row">
                                <div class="col-8">
                                  <input class="form-control col-8" id="id_genshin" type="text" name="uid" placeholder="Masukkan UID" required>
                                </div>
                                <div class="col-4">
                                  <select name='server' class="form-select">
                                    <option disabled selected>Pilih Server</option>
                                    <option value="America">America</option>
                                    <option value="Europe">Europe</option>
                                    <option value="Asia">Asia</option>
                                    <option value="TW, HK, MO">TW, HK, MO</option>
                                  </select>
                                </div>
                              </div>
                              <p class="mt-2 text-start">Untuk mengetahui User ID Anda, silakan klik menu profile dibagian kiri atas pada menu utama game. User ID akan terlihat dibagian bawah Nama Karakter Game Anda. Silakan masukkan User ID Anda untuk menyelesaikan transaksi. Contoh : 12345678(1234).</p>
                            </div>
                            
                            
                            <div class="form-group mb-5">
                              <p class="text-lg-start fw-bold text-white fs-40"><i class="ri-number-2"></i>- PILIH NOMINAL TOP UP</p>
                              <div class="btn-group-lg text-lg-start mb-2">
                                <?php
                                $genshin=mysqli_query($con,"SELECT * from harga_genshin order by id_voucher ASC");
                                while($bml=mysqli_fetch_array($genshin)){
                                ?>
                                <input type="radio" class="btn-check" name="item" value="<?php echo $bml['item']?>" id="<?php echo $bml['id_voucher']?>" autocomplete="off" required />
                                <label class="btn btn-info me-1 mb-1" for="<?php echo $bml['id_voucher']?>"><b> <?php echo $bml['item']?> <?php echo $bml['gambar']?></b><br> Rp<?php echo $bml['harga']?></label>
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
                            <p class="mt-2 text-start">Bukti pembayaran bisa dilihat dengan login menggunakan akun Widan Store mu!</p>
                            
                          </div>
                          <div class="form-group mb-4 text-center justify-content-center"><input class="btn btn-lg  btn-secondary hover-effect w-75" type="submit" name="pesan" value="Beli Sekarang"></div>
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

<?php
include 'conn.php';

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" http-equiv="refresh">
    
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
        <title>Widan Store | Pembayaran</title>
        <link rel="icon" type="png" href="/assets/images/favicon-mz.png">
    
        <!-- Bootstrap core CSS -->
        <link href="/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    
        <!-- Additional CSS Files -->
        <link rel="stylesheet" href="/assets/css/fontawesome.css">
        <link rel="stylesheet" href="/assets/css/templatemo-cyborg-gaming.css?<?php echo time(); ?>">
        <link rel="stylesheet" href="/assets/css/owl.css">
        <link rel="stylesheet" href="/assets/css/animate.css">
        <link rel="stylesheet"href="https://unpkg.com/swiper@7/swiper-bundle.min.css">
    
        <!-- REMIX ICONS -->
        <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
    
        <!-- Boxicons CSS -->
        <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
      </head>
<body>
    
    <div class="container" data-bs-theme="blue">
        <div class="row">
            <div class="col-lg-12">
                <div class="page-gopay text-center justify-content-center bg-light">
                    <?php
                    $bayar=mysqli_query($con,"SELECT * from pembayaran where metode='ShopeePay'");
                    $b=mysqli_fetch_array($bayar);
                    ?>
                    <img src="<?php echo $b['logo'];?>" alt="spay_logo" style="max-width: 200px;" class="mb-2"><hr>
                    <p>
                       <b>Scan kode QR di bawah dengan aplikasi Shopee Anda untuk melanjutkan.</b> 
                    </p>
                    <img src="/assets/images/qr-dana.png" alt="" style="max-width: 200px;">
                    <p class="mb-3 mt-4"><b>Setelah melakukan pembayaran, klik lanjut untuk menyelesaikan transaksi. <br>
                    Dengan mengklik "Lanjut", maka anda telah setuju dengan Syarat dan Ketentuan.</b></p>
                    <div class="text-center justify-content-center">
                        <a class="btn btn-lg btn-success hover-effect w-50" type="submit" href='./checkout'>Lanjut</a>
                    </div>
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
      <!-- Bootstrap core JavaScript -->
      <script src="/vendor/jquery/jquery.min.js"></script>
      <script src="/vendor/bootstrap/js/bootstrap.min.js"></script>
    
      <script src="/assets/js/isotope.min.js"></script>
      <script src="/assets/js/owl-carousel.js"></script>
      <script src="/assets/js/tabs.js"></script>
      <script src="/assets/js/popup.js"></script>
      <script src="/assets/js/custom.js"></script>
</body>

</html>

<?php 
	// include 'conn.php';
	$con = mysqli_connect("db","root","widan16","widan_db");

    if($_COOKIE['login']==""){
        header('location:/login');
    } else {

    }
    
    if($_COOKIE['role']=="Member"){
      header('location:/');
    } else {

    }
		
	$itungcust = mysqli_query($con,"select count(id_user) as jumlahcust from login where role='Member'");
	$itungcust2 = mysqli_fetch_assoc($itungcust);
	$itungcust3 = $itungcust2['jumlahcust'];
	
	$itungml = mysqli_query($con,"select count(order_id) as jumlahorder from order_ml");
	$itungml2 = mysqli_fetch_assoc($itungml);
	$itungml3 = $itungml2['jumlahorder'];

	$itungpubg = mysqli_query($con,"select count(order_id) as jumlahorder from order_pubg");
	$itungpubg2 = mysqli_fetch_assoc($itungpubg);
	$itungpubg3 = $itungpubg2['jumlahorder'];

	$itunggenshin = mysqli_query($con,"select count(order_id) as jumlahorder from order_genshin");
	$itunggenshin2 = mysqli_fetch_assoc($itunggenshin);
	$itunggenshin3 = $itunggenshin2['jumlahorder'];
	
	$itungff = mysqli_query($con,"select count(order_id) as jumlahorder from order_ff");
	$itungff2 = mysqli_fetch_assoc($itungff);
	$itungff3 = $itungff2['jumlahorder'];

    $total_pesanan = $itungml3 + $itungpubg3 + $itungff3 + $itunggenshin3
	
	?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Admin - WidanStore.</title>
    <link rel="icon" type="png" href="/assets/images/favicon-mz.png">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="/assets/admin/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="/assets/admin/assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="/assets/admin/assets/css/themify-icons.css">
    <link rel="stylesheet" href="/assets/admin/assets/css/metisMenu.css">
    <link rel="stylesheet" href="/assets/admin/assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="/assets/admin/assets/css/slicknav.min.css">
	
    <!-- amchart css -->
    <link rel="stylesheet" href="https://www.amcharts.com/lib/3/plugins/export/export.css" type="text/css" media="all" />
    <!-- others css -->
    <link rel="stylesheet" href="/assets/admin/assets/css/typography.css">
    <link rel="stylesheet" href="/assets/admin/assets/css/default-css.css">
    <link rel="stylesheet" href="/assets/admin/assets/css/styles.css">
    <link rel="stylesheet" href="/assets/admin/assets/css/responsive.css">
    <!-- modernizr css -->
    <script src="/assets/admin/assets/js/vendor/modernizr-2.8.3.min.js"></script>
</head>

<body>
    <!-- preloader area start -->
    <div id="preloader">
        <div class="loader"></div>
    </div>
    <!-- preloader area end -->
    <!-- page container area start -->
    <div class="page-container">
        <!-- sidebar menu area start -->
        <div class="sidebar-menu">
            <div class="main-menu">
                <div class="menu-inner">
                    <nav>
                        <ul class="metismenu" id="menu">
                            <h3 style="color: #ec6090;" class="mb-3 ps-2 ms-4 text-center"><b>WidanStore.</b></h3>
							<li class="active"><a href="./"><span>Home</span></a></li>
							<li>
                                <a href="javascript:void(0)" aria-expanded="true"><i class="ti-dashboard"></i><span>Kelola Pesanan</span></a>
                                <ul class="collapse">
                                    <li><a href="./pesanan-pubg">PUBG Mobile</a></li>
                                    <li><a href="./pesanan-ff">Free Fire</a></li>
									<li><a href="./pesanan-genshin">Genshin Impact</a></li>
									<li><a href="./pesanan-ml">Mobile Legends</a></li>
                                </ul>
                            </li>
							<li>
                                <a href="javascript:void(0)" aria-expanded="true"><i class="ti-layout"></i><span>Kelola Produk</span></a>
                                <ul class="collapse">
                                    <li><a href="./item-pubg">PUBG Mobile</a></li>
                                    <li><a href="./item-ff">Free Fire</a></li>
									<li><a href="./item-genshin">Genshin Impact</a></li>
									<li><a href="./item-ml">Mobile Legends</a></li>
									<li><a href="./pembayaran">Metode Pembayaran</a></li>
                                </ul>
                            </li>
							<li><a href="customer"><span>Kelola Pelanggan</span></a></li>
							<li><a href="user"><span>Kelola Staff</span></a></li>
                            <li>
                                <a href="/logout"><span>Logout</span></a>
                                
                            </li>
                            
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
        <!-- sidebar menu area end -->
        <!-- main content area start -->
        <div class="main-content">
            <!-- header area start -->
            <div class="header-area">
                <div class="row align-items-center">
                    <!-- nav and search button -->
                    <div class="col-md-6 col-sm-8 clearfix">
                        <div class="nav-btn pull-left">
                            <span></span>
                            <span></span>
                            <span></span>
                        </div>
                    </div>
                    <!-- profile info & task notification -->
                    <div class="col-md-6 col-sm-4 clearfix">
                        <ul class="notification-area pull-right">
                            <li><h3><div class="date">
								<script type='text/javascript'>
						
						var months = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
						var myDays = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];
						var date = new Date();
						var day = date.getDate();
						var month = date.getMonth();
						var thisDay = date.getDay(),
							thisDay = myDays[thisDay];
						var yy = date.getYear();
						var year = (yy < 1000) ? yy + 1900 : yy;
						document.write(thisDay + ', ' + day + ' ' + months[month] + ' ' + year);		
						
						</script></b></div></h3>

						</li>
                        </ul>
                    </div>
                </div>
            </div>
			
			
			<!-- header area end -->
            
            <!-- page title area end -->
            <div class="main-content-inner">
			
                
                <div class="sales-report-area mt-5 mb-5">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="single-report mb-xs-30">
                                <div class="s-report-inner pr--20 pt--30 mb-3">
                                    <div class="icon"><i class="fa fa-user"></i></div>
                                    <div class="s-report-title d-flex justify-content-between">
                                        <h4 class="header-title mb-0">Pelanggan</h4>
                                    </div>
                                    <div class="d-flex justify-content-between pb-2">
                                        <h1><?php echo $itungcust3 ?></h1>
                                    </div>
									</div>
                            </div>
                        </div>
                        
                        <div class="col-md-4">
                            <div class="single-report">
                                <div class="s-report-inner pr--20 pt--30 mb-3">
                                    <div class="icon"><i class="fa fa-gamepad"></i></div>
                                    <div class="s-report-title d-flex justify-content-between">
                                        <h4 class="header-title mb-0">Pesanan Mobile Legend</h4>
                                    </div>
                                    <div class="d-flex justify-content-between pb-2">
                                        <h1><?php echo $itungml3 ?></h1>
                                    </div>
                                </div>
                            </div>
                        </div>
						<div class="col-md-4">
                            <div class="single-report mb-xs-30">
                                <div class="s-report-inner pr--20 pt--30 mb-3">
                                    <div class="icon"><i class="fa fa-gamepad"></i></div>
                                    <div class="s-report-title d-flex justify-content-between">
                                        <h4 class="header-title mb-0">Pesanan PUBG Mobile</h4>
                                    </div>
                                    <div class="d-flex justify-content-between pb-2">
                                        <h1><?php echo $itungpubg3 ?></h1>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="single-report mb-xs-30">
                                <div class="s-report-inner pr--20 pt--30 mb-3">
                                    <div class="icon"><i class="fa fa-gamepad"></i></div>
                                    <div class="s-report-title d-flex justify-content-between">
                                        <h4 class="header-title mb-0">Pesanan Free Fire</h4>
                                    </div>
                                    <div class="d-flex justify-content-between pb-2">
                                        <h1><?php echo $itungff3 ?></h1>
                                    </div>
									</div>
                            </div>
                        </div>
                        
                        <div class="col-md-4">
                            <div class="single-report">
                                <div class="s-report-inner pr--20 pt--30 mb-3">
                                    <div class="icon"><i class="fa fa-gamepad"></i></div>
                                    <div class="s-report-title d-flex justify-content-between">
                                        <h4 class="header-title mb-0">Pesanan Genshin Impact</h4>
                                    </div>
                                    <div class="d-flex justify-content-between pb-2">
                                        <h1><?php echo $itunggenshin3 ?></h1>
                                    </div>
                                </div>
                            </div>
                        </div>
						<div class="col-md-4">
                            <div class="single-report mb-xs-30">
                                <div class="s-report-inner pr--20 pt--30 mb-3">
                                    <div class="icon"><i class="fa fa-book"></i></div>
                                    <div class="s-report-title d-flex justify-content-between">
                                        <h4 class="header-title mb-0">Total Pesanan</h4>
                                    </div>
                                    <div class="d-flex justify-content-between pb-2">
                                        <h1><?php echo $total_pesanan ?></h1>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                
                <!-- overview area end -->
                <!-- market value area start -->
                <div class="row mt-5 mb-5">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-sm-flex justify-content-between align-items-center">
									<h2>Selamat Datang, <strong><?php echo $_COOKIE['user'] ?></strong></h2>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
              
                
                <!-- row area start-->
            </div>
        </div>
        <!-- main content area end -->
		
		
		
        <!-- footer area start-->
        <footer>
            <div class="footer-area">
                <p>Copyright ©2023 <a href="../">Widan Stored</a>. All rights reserved. 
            </div>
        </footer>
        <!-- footer area end-->
    </div>
    <!-- page container area end -->

    <!-- jquery latest version -->
    <script src="/assets/admin/assets/js/vendor/jquery-2.2.4.min.js"></script>
    <!-- bootstrap 4 js -->
    <script src="/assets/admin/assets/js/popper.min.js"></script>
    <script src="/assets/admin/assets/js/bootstrap.min.js"></script>
    <script src="/assets/admin/assets/js/owl.carousel.min.js"></script>
    <script src="/assets/admin/assets/js/metisMenu.min.js"></script>
    <script src="/assets/admin/assets/js/jquery.slimscroll.min.js"></script>
    <script src="/assets/admin/assets/js/jquery.slicknav.min.js"></script>

    <!-- start chart js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.min.js"></script>
    <!-- start highcharts js -->
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <!-- start zingchart js -->
    <script src="https://cdn.zingchart.com/zingchart.min.js"></script>
    <script>
    zingchart.MODULESDIR = "https://cdn.zingchart.com/modules/";
    ZC.LICENSE = ["569d52cefae586f634c54f86dc99e6a9", "ee6b7db5b51705a13dc2339db3edaf6d"];
    </script>
    <!-- all line chart activation -->
    <script src="/assets/admin/assets/js/line-chart.js"></script>
    <!-- all pie chart -->
    <script src="/assets/admin/assets/js/pie-chart.js"></script>
    <!-- others plugins -->
    <script src="/assets/admin/assets/js/plugins.js"></script>
    <script src="/assets/admin/assets/js/scripts.js"></script>
</body>

</html>

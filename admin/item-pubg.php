<?php 
	include 'conn.php';
	if($_COOKIE['login']==""){
        header('location:/login');
    } else {

    }
    
    if($_COOKIE['role']=="Member"){
      header('location:/');
    } else {

    }
	if(isset($_POST["additem"])) {
		$namaitem=$_POST['item'];
		$harga=$_POST['harga'];
        
		$tambah = mysqli_query($con, "insert into harga_pubg(item, harga) values('$namaitem','$harga')");
		
        if($tambah){
		    header('location:./item-pubg');
        } else{
			echo "Sorry, there's a problem while submitting.";
			header('location:./item-pubg');
		}
	};
	?>

<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Kelola Produk - WidanStore</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="png" href="/assets/images/favicon-mz.png">
    <link rel="stylesheet" href="/assets/admin/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="/assets/admin/assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="/assets/admin/assets/css/themify-icons.css">
    <link rel="stylesheet" href="/assets/admin/assets/css/metisMenu.css">
    <link rel="stylesheet" href="/assets/admin/assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="/assets/admin/assets/css/slicknav.min.css">
	
    <!-- amchart css -->
    <link rel="stylesheet" href="https://www.amcharts.com/lib/3/plugins/export/export.css" type="text/css" media="all" />
	<!-- Start datatable css -->
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.jqueryui.min.css">
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.5.2/css/buttons.dataTables.min.css">
	
    <!-- others css -->
    <link rel="stylesheet" href="/assets/admin/assets/css/typography.css">
    <link rel="stylesheet" href="/assets/admin/assets/css/default-css.css">
    <link rel="stylesheet" href="/assets/admin/assets/css/styles.css">
    <link rel="stylesheet" href="/assets/admin/assets/css/responsive.css">
    <!-- REMIX ICONS -->
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
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
							<li><a href="./"><span>Home</span></a></li>
							<li>
                                <a href="javascript:void(0)" aria-expanded="true"><i class="ti-dashboard"></i><span>Kelola Pesanan</span></a>
                                <ul class="collapse">
                                    <li><a href="./pesanan-pubg">PUBG Mobile</a></li>
                                    <li><a href="./pesanan-ff">Free Fire</a></li>
									<li><a href="./pesanan-genshin">Genshin Impact</a></li>
									<li><a href="./pesanan-ml">Mobile Legends</a></li>
                                </ul>
                            </li>
							<li class="active">
                                <a href="javascript:void(0)" aria-expanded="true"><i class="ti-layout"></i><span>Kelola Produk</span></a>
                                <ul class="collapse">
                                    <li class="active"><a href="./item-pubg">PUBG Mobile</a></li>
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
            
            
            <!-- page title area end -->
            <div class="main-content-inner">
               
                <!-- market value area start -->
                <div class="row mt-5 mb-5">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-sm-flex mb-3 justify-content-between align-items-center">
									<h2>Daftar Item <b class="text-primary">PUBG Mobile</b> </h2>
									<button style="margin-bottom:20px" data-toggle="modal" data-target="#myModal" class="btn btn-info col-md-2">Tambah Item</button>
                                </div>
                                    <div class="data-tables datatable-dark">
										<table id="dataTable3" class="display" style="width:100%">
											<thead class="thead-dark">
												<tr>
													<th>No</th>
													<th>Nama Item</th>
													<th>Harga</th>
												</tr>
											</thead>
											<tbody>
												<?php
                                                    $item=mysqli_query($con,"SELECT * from harga_pubg order by id_voucher ASC");
                                                    $no=1;
                                                    while($p=mysqli_fetch_array($item)){
                                                    $id = $p['id_voucher'];
                                                ?>
												<tr>
													<td><?php echo $no++ ?></td>
													<td><?php echo $p['item'] ?> <?php echo $p['gambar'] ?></td>
													<td>Rp <?php echo $p['harga'] ?></td>
													
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
                    </div>
                </div>
              
                
                <!-- row area start-->
            </div>
        </div>
        <!-- main content area end -->
        <!-- footer area start-->
        <footer>
            <div class="footer-area">
                <p>Copyright ©2023 <a href="../">Widan Store</a>. All rights reserved. 
            </div>
        </footer>
        <!-- footer area end-->
    </div>
    <!-- page container area end -->
	
	<!-- modal input -->
			<div id="myModal" class="modal fade">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<h4 class="modal-title">Tambah Item</h4>
						</div>
						
						<div class="modal-body">
							<form action="./item-pubg.php" method="post" enctype="multipart/form-data" >
								<div class="form-group">
									<label>Nama Item</label>
									<input name="item" type="text" class="form-control" required autofocus>
								</div>
								<div class="form-group">
									<label>Harga</label>
									<input name="harga" type="text" class="form-control" required>
								</div>
						</div>
						<div class="modal-footer">
								<button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
								<input name="additem" type="submit" class="btn btn-primary" value="Tambah">
						</div>
						</form>
					</div>
				</div>
			</div>
	
	<script>
	$(document).ready(function() {
    $('#dataTable3').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'print'
        ]
    } );
	} );
	</script>
	
	<!-- jquery latest version -->
    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <!-- bootstrap 4 js -->
    <script src="/assets/admin/assets/js/popper.min.js"></script>
    <script src="/assets/admin/assets/js/bootstrap.min.js"></script>
    <script src="/assets/admin/assets/js/owl.carousel.min.js"></script>
    <script src="/assets/admin/assets/js/metisMenu.min.js"></script>
    <script src="/assets/admin/assets/js/jquery.slimscroll.min.js"></script>
    <script src="/assets/admin/assets/js/jquery.slicknav.min.js"></script>
		<!-- Start datatable js -->
	 <script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.print.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.3/js/responsive.bootstrap.min.js"></script>
	<script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.html5.min.js"></script>
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

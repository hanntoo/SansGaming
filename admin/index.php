<?php
session_start();
//koneksi ke database
require '../functions.php';

if (!isset($_SESSION["admin"])) {
	header('location:../login.php');
}


?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<title>Halaman Admin</title>
	<!-- BOOTSTRAP STYLES-->
	<link href="assets/css/bootstrap.css" rel="stylesheet" />
	<!-- Font Awesome -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
	<!-- MORRIS CHART STYLES-->
	<link href="assets/js/morris/morris-0.4.3.min.css" rel="stylesheet" />
	<!-- CUSTOM STYLES-->
	<link href="assets/css/custom.css" rel="stylesheet" />
	<!-- GOOGLE FONTS-->
	<link href='https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap' rel='stylesheet' type='text/css' />
	<!-- JQUERY SCRIPTS -->
	<script src="assets/js/jquery-1.10.2.js"></script>
</head>

<body>

	<div id="wrapper">
		<nav class="navbar navbar-default navbar-cls-top " role="navigation" style="margin-bottom: 0">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="index.php">Admin</a>
			</div>
			<div style="color: white;
		padding: 15px 50px 5px 50px;
		float: right;
		font-size: 16px;"><?php echo date('d F Y'); ?> <a href="index.php?halaman=logout" class="btn btn-danger square-btn-adjust">Logout</a>
			</div>
		</nav>

		<!-- /. NAV TOP  -->
		<nav class="navbar-default navbar-side" role="navigation">
			<div class="sidebar-collapse">
				<ul class="nav" id="main-menu">
					<li class="text-center">
						<img src="../assets/img/<?php echo $_SESSION['admin']['foto_user']; ?>" class="user-image img-responsive" />
					</li>


					<li>
						<a href="index.php"><i class="fa fa-home"></i> Home</a>
						<a href="index.php?halaman=kategori"><i class="fa fa-bars"></i> Kategori</a>
						<a href="index.php?halaman=produk"><i class="fa fa-tag"></i> Produk</a>
						<a href="index.php?halaman=pembelian"><i class="fa fa-shopping-cart"></i> Pembelian</a>
						<a href="index.php?halaman=laporan_pembelian"><i class="fa fa-book"></i> Laporan</a>
						<a href="index.php?halaman=pelanggan"><i class="fa fa-user"></i> Pelanggan</a>
						<a href="index.php?halaman=logout"><i class="fa fa-sign-out-alt"></i> Logout</a>


					</li>

				</ul>

			</div>

		</nav>
		<!-- /. NAV SIDE  -->
		<div id="page-wrapper">
			<div id="page-inner">
				<?php
				if (isset($_GET['halaman'])) {
					if ($_GET['halaman'] == "produk") {
						include 'produk.php';
					} elseif ($_GET['halaman'] == "pembelian") {
						include 'pembelian.php';
					} elseif ($_GET['halaman'] == "pelanggan") {
						include 'pelanggan.php';
					} elseif ($_GET['halaman'] == "detail") {
						include 'detail.php';
					} elseif ($_GET['halaman'] == "tambahproduk") {
						include 'tambahproduk.php';
					} elseif ($_GET['halaman'] == "hapusproduk") {
						include 'hapusproduk.php';
					} elseif ($_GET['halaman'] == "ubahproduk") {
						include 'ubahproduk.php';
					} elseif ($_GET['halaman'] == "tambahpelanggan") {
						include 'tambahpelanggan.php';
					} elseif ($_GET['halaman'] == "hapuspelanggan") {
						include 'hapuspelanggan.php';
					} elseif ($_GET['halaman'] == "logout") {
						include 'logout.php';
					} elseif ($_GET['halaman'] == "pembayaran") {
						include 'pembayaran.php';
					} elseif ($_GET['halaman'] == "laporan_pembelian") {
						include 'laporan_pembelian.php';
					} elseif ($_GET['halaman'] == "kategori") {
						include 'kategori.php';
					} elseif ($_GET['halaman'] == "ubahpelanggan") {
						include 'ubahpelanggan.php';
					} elseif ($_GET['halaman'] == "detailproduk") {
						include 'detailproduk.php';
					} elseif ($_GET['halaman'] == "hapusfotoproduk") {
						include 'hapusfotoproduk.php';
					} elseif ($_GET['halaman'] == "download_laporan") {
						include 'download_laporan.php';
					}
				} else {
					include 'home.php';
				}
				?>
			</div>
			<!-- /. PAGE INNER  -->
		</div>
		<!-- akhir konten -->

	</div>
	<!-- /. WRAPPER  -->

	<!-- JQuery -->
	<script src="assets/js/jquery-3.6.0.min.js"></script>
	<!-- Swiper Javascript-->
	<script src="https://unpkg.com/swiper@8/swiper-bundle.min.js"></script>
	<!-- Bootsrap Javascript-->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
	<!-- CUSTOM SCRIPTS -->
	<script src="assets/js/custom.js"></script>

</body>

</html>
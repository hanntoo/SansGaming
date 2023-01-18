<?php
session_start();
//koneksi ke database
require 'functions.php';



//jika tidak ada session user(belum login)

if (!isset($_SESSION["user"])) {
	echo "<script>alert('Silahkan Login');
	location='login.php';</script>";

	exit();
}


?>

<!DOCTYPE html>
<html>

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- Bootstrap CSS -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

	<!-- Font Awesome -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

	<!-- Swiper -->
	<link rel="stylesheet" href="https://unpkg.com/swiper@8/swiper-bundle.min.css" />

	<!-- Custom CSS -->
	<link rel="stylesheet" href="assets/css/style.css">
	<link rel="icon" href="assets/img/logo.png">

	<title>Sans Gaming</title>
</head>


<body>

	<?php include 'menu.php'; ?>

	<section class="riwayat py-5 bg-white">
		<div class="container">
			<h3>Riwayat Belanja <strong class="text-capitalize"><?php echo $_SESSION["user"]["nama_user"] ?></strong></h3>
			<table class="table table-bordered">
				<thead class="text-center">
					<tr>
						<th>No</th>
						<th>Tanggal</th>
						<th>Total</th>
						<th>Opsi</th>
					</tr>
				</thead>
				<tbody class="text-center">
					<?php
					$nomor = 1;
					// mendapatkan id_user yg login dari session
					$id_user = $_SESSION["user"]['id_user'];

					$ambil = $conn->query("SELECT * FROM pembelian WHERE id_user='$id_user'");
					while ($pecah = $ambil->fetch_assoc()) {

					?>
						<tr>
							<td><?php echo $nomor; ?></td>
							<td><?php echo date("d F Y", strtotime($pecah["tanggal_pembelian"])) ?></td>
							<td>Rp. <?php echo number_format($pecah["total_pembelian"]) ?>,-</td>
							<td>
								<a href="nota.php?id=<?php echo $pecah["id_pembelian"] ?>" class="btn btn-info">Nota</a>
							</td>
						</tr>
						<?php $nomor++; ?>
					<?php } ?>
				</tbody>
			</table>
		</div>
	</section>
	<!-- footer -->
	<?php include 'footer.php'; ?>
	<!-- end of footer -->

</body>

</html>
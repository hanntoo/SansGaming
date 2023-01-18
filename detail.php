<?php
session_start();

// conn ke database
include 'functions.php';

// Mendapatkan id_produk dari url
$id_produk = $_GET['id'];

// Query ambil data
$ambil = $conn->query("SELECT * FROM produk WHERE id_produk='$id_produk'");
$detail = $ambil->fetch_assoc();

// echo "<pre>";
// print_r($detail);
// echo "</pre>";

// Jika tombol beli di klik
if (isset($_POST['beli'])) {
    // Mendapatkan jumlah yang diinputkan
    $jumlah = $_POST['jumlah'];

    // Masukkan ke keranjang belanja
    $_SESSION['keranjang'][$id_produk] = $jumlah;

    echo "<div class='alert alert-success'>Produk telah masuk ke keranjang</div>";
    echo "<meta http-equiv='refresh' content='1;url=keranjang.php'>";
}

?>

<!DOCTYPE html>
<html lang="en">

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

    <!-- navbar -->
    <?php include 'menu.php'; ?>

    <section class="content py-5 bg-white">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <img src="assets/img/<?= $detail['foto_produk']; ?>" class="img-responsive">
                </div>
                <div class="col-md-6">
                    <h2><?= $detail['nama_produk']; ?></h2>
                    <h4>Rp. <?= number_format($detail['harga_produk']); ?>,-</h4>
                    <h5>Stok : <?= $detail['stok_produk']; ?></h5>
                    <h5>Berat : <?= $detail["berat_produk"]; ?> gram</h5>
                    <form action="" method="post">
                        <div class="form-group">
                            <div class="input-group">
                                <input type="number" min="1" max="<?= $detail['stok_produk']; ?>" class="form-control" name="jumlah">
                                <div class="input-group-btn">
                                    <button class="btn btn-primary" name="beli">beli</button>
                                </div>
                            </div>
                        </div>
                    </form>

                    <p class="pt-3"><?= $detail['deskripsi_produk']; ?></p>
                </div>
            </div>
        </div>
    </section>

    <!-- footer -->
    <?php include 'footer.php'; ?>
    <!-- end of footer -->





    <!-- JQuery -->
    <script src="assets/js/jquery-3.6.0.min.js"></script>
    <!-- Swiper Javascript-->
    <script src="https://unpkg.com/swiper@8/swiper-bundle.min.js"></script>
    <!-- Bootsrap Javascript-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Custom Javascript -->
    <script src="assets/js/app.js"></script>
</body>

</html>
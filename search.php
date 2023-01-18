<?php
include 'functions.php';

$keyword = $_GET['keyword'];

$semuadata = array();
$ambil = $conn->query("SELECT * FROM produk WHERE nama_produk LIKE '%$keyword%'");
while ($pecah = $ambil->fetch_assoc()) {
    $semuadata[] = $pecah;
}

// echo "<pre>";
// print_r($semuadata);
// echo "</pre>";

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

    <?php include 'menu.php'; ?>

    <section class="content py-5">
        <div class="container">
            <h3>Hasil Pencarian: <?= $keyword; ?></h3>

            <?php if (empty($semuadata)) : ?>
                <div class="alert alert-danger">Produk <strong><?= $keyword; ?></strong> tidak ditemukan</div>
            <?php endif; ?>

            <div class="row">
                <?php foreach ($semuadata as $key => $value) : ?>
                    <div class="col-12 col-xl-4 col-md-6 col-sm-9 py-2">
                        <div class="card-produk shadow bg-white" style="width: 20rem;">
                            <img class="card-img-top img-fluid rounded" src="assets/img/<?= $value['foto_produk']; ?>">
                            <div class="card-body text-center body-produk">
                                <a href="#" class="fas fa-heart"></a>
                                <a href="detail.php?id=<?= $value['id_produk']; ?>" class="fas fa-eye"></a>
                                <ul class="list-inline m-0 stars small">
                                    <li class="list-inline-item"><i class="fas fa-star"></i></li>
                                    <li class="list-inline-item"><i class="fas fa-star"></i></li>
                                    <li class="list-inline-item"><i class="fas fa-star"></i></li>
                                    <li class="list-inline-item"><i class="fas fa-star"></i></li>
                                    <li class="list-inline-item"><i class="far fa-star"></i></li>
                                </ul>
                                <h4 class="card-title text-capitalize"><?= $value['nama_produk']; ?></h4>
                                <p class="card-text">Rp. <?= number_format($value['harga_produk']); ?>,-</p>
                                <p class="card-text">Stok : <?= $value['stok_produk'] ?></p>
                                <a name="keranjang" class="btn btn-cart" href="beli.php?id=<?= $value['id_produk']; ?>">+ Keranjang</a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

</body>

</html>
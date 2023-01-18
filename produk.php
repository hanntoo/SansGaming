<?php require 'functions.php'; ?>

<!doctype html>
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

    <?php include 'kategori.php'; ?>

    <!-- produk section starts -->
    <section class="produk py-5">
        <div class="container">
            <div class="title text-center py-3">
                <h2 class="position-relative d-inline-block text-capitalize">Produk Kami</h2>
            </div>
            <div class="row">
                <?php
                $ambil = $conn->query("SELECT * FROM produk");
                while ($perproduk = $ambil->fetch_assoc()) :
                ?>
                    <div class="col-12  col-xl-4 col-md-6 col-sm-9 py-2">
                        <div class="card-produk shadow bg-white" style="width: 20rem;">
                            <img class="card-img-top img-fluid rounded" src="assets/img/<?= $perproduk['foto_produk']; ?>">
                            <div class="card-body text-center body-produk">
                                <a href="#" class="fas fa-heart"></a>
                                <a href="detail.php?id=<?= $perproduk['id_produk']; ?>" class="fas fa-eye"></a>
                                <ul class="list-inline m-0 stars small">
                                    <li class="list-inline-item"><i class="fas fa-star"></i></li>
                                    <li class="list-inline-item"><i class="fas fa-star"></i></li>
                                    <li class="list-inline-item"><i class="fas fa-star"></i></li>
                                    <li class="list-inline-item"><i class="fas fa-star"></i></li>
                                    <li class="list-inline-item"><i class="far fa-star"></i></li>
                                </ul>
                                <h4 class="card-title text-capitalize"><?= $perproduk['nama_produk']; ?></h4>
                                <p class="card-text">Rp. <?= number_format($perproduk['harga_produk']); ?>,-</p>
                                <p class="card-text">Stok : <?= $perproduk['stok_produk'] ?></p>
                                <a name="keranjang" class="btn btn-cart" href="beli.php?id=<?= $perproduk['id_produk']; ?>">+ Keranjang</a>
                            </div>
                        </div>
                    </div>
                <?php endwhile; ?>

            </div>
        </div>
    </section>
    <!-- produk section ends -->


    <?php include 'footer.php'; ?>


    <!-- JQuery -->
    <script src="assets/js/jquery-3.6.0.min.js"></script>
    <!-- Swiper Javascript-->
    <script src="https://unpkg.com/swiper@8/swiper-bundle.min.js"></script>
    <!-- Bootsrap Javascript-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Custom Javascript -->
    <script src="assets/js/app.js"></script>

    <script>

    </script>
</body>

</html>
<?php
session_start();

//koneksi ke database
require 'functions.php';

// jk tidak ada session user (blm login), dialihkan ke login.php
if (!isset($_SESSION["user"])) {
    echo "<script>alert('Silahkan Login Terlebih Dahulu');
    location='login.php';</script>";
}


if (empty($_SESSION["keranjang"]) or !isset($_SESSION["keranjang"])) {
    echo "<script>alert('Keranjang kosong, silahkan pilih produk!');</script>";
    echo "<script>location='index.php';</script>";
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

    <?php include 'menu.php'; ?>

    <section class="content py-5 bg-white">
        <div class="container">
            <h1>Keranjang Belanja</h1>
            <table class="table table-bordered">
                <thead class="text-center">
                    <tr>
                        <th>No</th>
                        <th>Produk</th>
                        <th>Harga</th>
                        <th>Berat</th>
                        <th>Jumlah</th>
                        <th>Subberat</th>
                        <th>Subharga</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody class="text-center">
                    <?php $no = 1; ?>
                    <?php foreach ($_SESSION['keranjang'] as $id_produk => $jumlah) : ?>
                        <!-- Menampilkan produk yang sedang duperulangkan berdasarkan id_produk -->
                        <?php
                        $ambil = $conn->query("SELECT * FROM produk WHERE id_produk='$id_produk'");
                        $pecah = $ambil->fetch_assoc();

                        $subharga = $pecah['harga_produk'] * $jumlah;
                        $subberat = $pecah['berat_produk'] * $jumlah;

                        ?>
                        <tr>
                            <td class="pt-4"><?= $no++; ?></td>
                            <td><img src="assets/img/<?= $pecah['foto_produk'] ?>" alt="" width="50" height="50">
                                <?= $pecah['nama_produk']; ?></td>
                            <td class="pt-4">Rp. <?= number_format($pecah['harga_produk']); ?>,-</td>
                            <td class="pt-4"><?= $pecah['berat_produk']; ?> gram</td>
                            <td class="pt-4"><?= $jumlah; ?></td>
                            <td class="pt-4"><?= $subberat; ?> gram</td>
                            <td class="pt-4">Rp. <?= number_format($subharga); ?>,-</td>
                            <td class="pt-3">
                                <a href="hapuskeranjang.php?id=<?= $id_produk; ?>" class="btn btn-danger btn-xs">Hapus</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>

            <a href="index.php" class="btn btn-cart">Lanjutkan Belanja</a>
            <a href="checkout.php" class="btn btn-cart">Checkout</a>

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
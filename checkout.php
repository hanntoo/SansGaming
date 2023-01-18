<?php
session_start();
//koneksi ke database
include 'functions.php';

// Jika tidak ada session pelanggan (belum login)
if (!isset($_SESSION["user"])) {
    // Diarahkan ke ke login.php
    echo "<script>alert('Silahkan login!')</script>";
    echo "<script>location='login.php';</script>";
}

if (!isset($_SESSION["keranjang"])) {
    // Diarahkan ke ke index.php
    echo "<script>alert('Keranjang kosong!')</script>";
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

<body style="min-height: 1000px;">

    <?php include 'menu.php'; ?>

    <section class="content py-5 bg-white">
        <div class="container">
            <h1>Halaman Checkout</h1>
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
                    </tr>
                </thead>
                <tbody class="text-center">
                    <?php $no = 1; ?>
                    <?php $totalberat = 0; ?>
                    <?php $total_pembelian = 0; ?>
                    <?php foreach ($_SESSION['keranjang'] as $id_produk => $jumlah) : ?>
                        <!-- Menampilkan produk yang sedang duperulangkan berdasarkan id_produk -->
                        <?php
                        $ambil = $conn->query("SELECT * FROM produk WHERE id_produk='$id_produk'");
                        $pecah = $ambil->fetch_assoc();
                        $subharga = $pecah['harga_produk'] * $jumlah;
                        // Subberat diperoleh dari berat produk x jumlah
                        $subberat = $pecah['berat_produk'] * $jumlah;
                        $totalberat += $subberat;

                        ?>
                        <tr>
                            <td class="pt-2"><?= $no++; ?></td>
                            <td class="pt-2"><?= $pecah['nama_produk']; ?></td>
                            <td class="pt-2">Rp. <?= number_format($pecah['harga_produk']); ?>,-</td>
                            <td class="pt-2"><?= $pecah['berat_produk']; ?> gram</td>
                            <td class="pt-2"><?= $jumlah; ?></td>
                            <td class="pt-2"><?= $subberat; ?> gram</td>
                            <td class="pt-2">Rp. <?= number_format($subharga); ?>,-</td>
                        </tr>
                        <?php $total_pembelian += $subharga; ?>
                    <?php endforeach; ?>
                </tbody>
                <tfoot>
                    <tr>
                        <th colspan="6">Total Belanja</th>
                        <th>Rp. <?= number_format($total_pembelian); ?>,-</th>
                    </tr>
                </tfoot>
            </table>

            <form action="" method="post" enctype="multipart/form-data">
                <div class="row py-3">
                    <div class="col-md-4">
                        <div class="form-group">
                            <input type="text" readonly value="<?= $_SESSION['user']['nama_user']; ?>" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <input type="text" readonly value="<?= $_SESSION['user']['telepon_user']; ?>" class="form-control">
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="">Alamat Lengkap Pengiriman</label>
                    <textarea name="alamat_pengiriman" cols="30" rows="3" class="form-control" placeholder="Masukkan alamat lengkap pengiriman (termasuk kode pos)"></textarea>
                </div>

                <div class="form-group" style="margin-top: 10px;">
                    <a href="index.php" class="btn btn-cart">Kembali Ke Home</a>
                    <button type="submit" class="btn btn-cart" name="checkout">Checkout</button>
                </div>
            </form>

            <?php
            if (isset($_POST["checkout"])) {
                $id_user = $_SESSION["user"]["id_user"];
                $tanggal_pembelian = date('Y-m-d');
                $alamat_pengiriman = $_POST['alamat_pengiriman'];

                $totalberat = $_POST['total_berat'];

                // Menyimpan data ke tabel pembelian
                $conn->query("INSERT INTO pembelian(id_user, tanggal_pembelian, total_pembelian, alamat_pengiriman) VALUES('$id_user', '$tanggal_pembelian', '$total_pembelian', '$alamat_pengiriman')");

                // Mendapatkan id_pembelian yang baru terjadi
                $id_pemebelian_barusan = $conn->insert_id;

                foreach ($_SESSION["keranjang"] as $id_produk => $jumlah) {

                    // Mendapatkan data produk berdasarkan id_produk
                    $ambil = $conn->query("SELECT * FROM produk WHERE id_produk='$id_produk'");
                    $perproduk = $ambil->fetch_assoc();

                    $nama = $perproduk['nama_produk'];
                    $harga = $perproduk['harga_produk'];
                    $berat = $perproduk['berat_produk'];
                    $subberat = $perproduk['berat_produk'] * $jumlah;
                    $subharga = $perproduk['harga_produk'] * $jumlah;

                    $conn->query("INSERT INTO pembelian_produk(id_pembelian, id_produk, nama, harga, berat, subberat, subharga, jumlah) VALUES('$id_pemebelian_barusan', '$id_produk', '$nama', '$harga', '$berat', '$subberat', '$subharga', '$jumlah')");

                    // Update stok
                    $conn->query("UPDATE produk SET stok_produk=stok_produk - $jumlah WHERE id_produk='$id_produk'");
                }

                // Mengosongkan keranjang belanja
                unset($_SESSION["keranjang"]);

                // Tampilan dialihkan ke halaman nota dari pembelian barusan
                echo "<script>alert('Pembelian sukses');</script>";
                echo "<script>location='nota.php?id=$id_pemebelian_barusan';</script>";
            }

            ?>

        </div>
    </section>

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
<?php
session_start();

$id = $_GET['id'];
// conn ke database
include 'functions.php';

$ambil = $conn->query("SELECT * FROM pembelian JOIN user ON pembelian.id_user = user.id_user WHERE pembelian.id_pembelian = '$id'");
$detail = $ambil->fetch_assoc();

// jika user yang beli tidak sama dengan user yang login, maka diarahkan ke riwayat (karena tidak berhak melihat nota orang lain)
// user yang beli harus user yang login
// Mendapatkan id_user yang beli
$iduseryangbeli = $detail['id_user'];

// Mendapatkan id_user yang login
$iduseryanglogin = $_SESSION['user']['id_user'];

if ($iduseryangbeli != $iduseryanglogin) {
    echo "<script>alert('Akses ditolak!');</script>";
    echo "<script>location='riwayat.php';</script>";
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
            <h2>Nota Pembelian</h2>

            <!-- <h3>Data orang yang beli $session</h3> -->
            <!-- <pre><?php //print_r($detail); 
                        ?></pre> -->

            <!-- <h3>Data orang yang login di session</h3> -->
            <!-- <pre><?php //print_r($_SESSION); 
                        ?></pre> -->

            <div class="row" style="margin-bottom: 10px;">
                <div class="col-md-4">
                    <h3>Pembelian</h3>
                    <strong>No. Pembelian: <?= $detail['id_pembelian']; ?></strong><br>
                    Tanggal: <?= date("d M Y", strtotime($detail['tanggal_pembelian'])); ?><br>
                    Total: Rp. <?= number_format($detail['total_pembelian']); ?>,-
                </div>
                <div class="col-md-4">
                    <h3>user</h3>
                    <strong><?= $detail["nama_user"]; ?></strong><br>
                    <p>
                        <?= $detail["telepon_user"]; ?><br>
                        <?= $detail["email_user"]; ?>
                    </p>
                </div>
                <div class="col-md-4">
                    <h3>Pengiriman</h3>
                    Alamat: <?= $detail['alamat_pengiriman']; ?>
                </div>
            </div>

            <table class="table table-bordered">
                <thead class="text-center">
                    <tr>
                        <th>No</th>
                        <th>Nama Produk</th>
                        <th>Harga</th>
                        <th>Berat</th>
                        <th>Jumlah</th>
                        <th>Subberat</th>
                        <th>Subtotal</th>
                    </tr>
                </thead>
                <tbody class="text-center">
                    <?php $no = 1; ?>
                    <!-- Menampilkan data pembelian_produk -->
                    <?php $ambil = $conn->query("SELECT * FROM pembelian_produk WHERE id_pembelian = '$id'"); ?>
                    <?php while ($pecah = $ambil->fetch_assoc()) : ?>
                        <tr>
                            <td class="pt-2"><?= $no; ?>.</td>
                            <td class="pt-2"><?= $pecah["nama"]; ?></td>
                            <td class="pt-2">Rp. <?= number_format($pecah["harga"]); ?>,-</td>
                            <td class="pt-2"><?= $pecah["berat"]; ?> gram</td>
                            <td class="pt-2"><?= $pecah["jumlah"]; ?></td>
                            <td class="pt-2"><?= $pecah["subberat"]; ?> gram</td>
                            <td class="pt-2">Rp. <?= number_format($pecah["subharga"]); ?>,-</td>
                        </tr>
                        <pre>
                            <?php $pecah ?>
                        </pre>
                        <?php $no++; ?>
                    <?php endwhile; ?>
                </tbody>
            </table>
            <div class="form-group" style="margin-top: 10px;">
                <a href="index.php" class="btn btn-cart"><i class="fas fa-home"></i> Home</a>
                <a href="cetaknota.php?id=<?php echo $id; ?>" target="_blank" class="btn btn-cart"><i class="fas fa-print"></i> Cetak</a>
            </div>
            <div class="row">
                <div class="col-md-7 py-3">
                    <div class="alert alert-info py-3">
                        <p>
                            Silahkan lakukan pembayaran dengan cara datang langsung ke toko kami atau dapat mentransfer Rp. <?= number_format($detail['total_pembelian']); ?>,- ke <br>
                            <strong>BANK NEGARA INDONESIA 109-209-309 AN Reihan Ramadhan</strong>
                        </p>
                    </div>
                    <div class="alert alert-warning">
                        <p>
                            <strong>NOTE: Cetak Nota Ini Untuk Mendapatkan Barang Anda</strong>
                        </p>
                    </div>
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
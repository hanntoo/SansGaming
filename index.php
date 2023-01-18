<?php
session_start();

require 'functions.php';

?>

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
    <!-- home section starts -->
    <!-- Slider main container -->
    <section class="home" id="home">
        <div class="swiper home-slider bg-white">
            <!-- Additional required wrapper -->
            <div class="swiper-wrapper">
                <!-- Slides -->
                <div class="swiper-slide slide">
                    <div class="content text-capitalize">
                        <span>special untukmu</span>
                        <h3>Kursi Gaming Logitech</h3>
                        <a href="index.php" class="btn btn-home">lihat detail</a>
                    </div>
                    <div class="image">
                        <img src="assets/img/kursi-logitech.png">
                    </div>
                </div>

                <div class="swiper-slide slide">
                    <div class="content text-capitalize">
                        <span>special untukmu</span>
                        <h3>Kursi Gaming Secret Lab</h3>
                        <a href="index.php" class="btn btn-home">lihat detail</a>
                    </div>
                    <div class="image">
                        <img src="assets/img/kursi-secret-lab.png" alt="">
                    </div>
                </div>

                <div class="swiper-slide slide">
                    <div class="content text-capitalize">
                        <span>special untukmu</span>
                        <h3>Kursi Gaming Fantech</h3>
                        <a href="index.php" class="btn btn-home">lihat detail</a>
                    </div>
                    <div class="image">
                        <img src="assets/img/kursi-fantech.png" alt="">
                    </div>
                </div>
            </div>
            <!-- If we need pagination -->
            <div class="swiper-pagination"></div>
        </div>
    </section>
    <!-- home section ends -->

    <!-- kategori section starts -->
    <?php include 'kategori.php'; ?>
    <!-- kategori section ends -->

    <!-- produk section starts -->
    <section class="produk py-5">
        <div class="container">
            <div class="title text-center py-3">
                <h2 class="position-relative d-inline-block text-capitalize">Produk Kami</h2>
            </div>
            <div class="row">
                <?php
                $ambil = $conn->query("SELECT * FROM produk LIMIT 6");
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
        <div class="d-flex justify-content-center text-capitalize">
            <a href="produk.php" class="btn btn-cart">lihat lebih banyak</a>
        </div>
    </section>
    <!-- produk section ends -->

    <!-- blog section starts -->
    <section id="blogs" class="py-3">
        <div class="container">
            <div class="title text-center py-3">
                <h2 class="position-relative d-inline-block text-capitalize">Blog Kami</h2>
            </div>

            <div class="row g-3">
                <div class="card border-0 col-md-6 col-lg-4 bg-transparent my-3">
                    <img src="assets/img/banner-1.png" alt="">
                    <div class="card-body px-0">
                        <h4 class="card-title">Rekomendasi 10 Mechanical Keyboard di Bawah 500 Ribu!</h4>
                        <p class="card-text mt-3 text-muted">
                            Mau beli mechanical keyboard buat setup gaming kesayangan, tapi budget cuma 500 ribu? Tenang cari tahu rekomendasi mechanical keyboard di bawah 500 ribu di sini.</p>
                        <p class="card-text">
                            <small class="text-muted">
                                <span class="fw-bold">Author: </span>Tiza Putri
                            </small>
                        </p>
                        <a href="https://duniagames.co.id/discover/article/mechanical-keyboard-di-bawah-500-ribu" class="btn btn-blog">Read More</a>
                    </div>
                </div>

                <div class="card border-0 col-md-6 col-lg-4 bg-transparent my-3">
                    <img src="assets/img/banner-2.png" alt="">
                    <div class="card-body px-0">
                        <h4 class="card-title">Corsair Umumkan Keyboard Mechanical Wireless K70 Pro Mini</h4>
                        <p class="card-text mt-3 text-muted">Corsair Wireless K70 Pro Mini merupakan keyboard mechanical terbaru yang baru saja dirilis. Seperti apa bentuknya? Kepoin di sini yuk.</p>
                        <p class="card-text">
                            <small class="text-muted">
                                <span class="fw-bold">Author: </span>Rizky Nurcahyanto
                            </small>
                        </p>
                        <a href="https://duniagames.co.id/discover/article/corsair-umumkan-keyboard-mechanical-wireless-k70-pro-mini" class="btn btn-blog">Read More</a>
                    </div>
                </div>

                <div class="card border-0 col-md-6 col-lg-4 bg-transparent my-3">
                    <img src="assets/img/banner-3.png" alt="">
                    <div class="card-body px-0">
                        <h4 class="card-title">Razer Hadirkan Kolaborasi dengan Ikon Streetwear BAPE</h4>
                        <p class="card-text mt-3 text-muted">
                            Razer resmi berkolaborasi dengan BAPE untuk menghadirkan lini eksklusif pakaian dan periferal gaming dengan desain dan warna yang lebih banyak.</p>
                        <p class="card-text">
                            <small class="text-muted">
                                <span class="fw-bold">Author: </span>Rizky Nurcahyanto
                            </small>
                        </p>
                        <a href="https://duniagames.co.id/discover/article/razer-hadirkan-kolaborasi-dengan-ikon-streetwear-bape" class="btn btn-blog">Read More</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- blog section ends -->

    <!-- review section starts  -->
    <section class="review bg-white py-3">
        <div class="title text-center py-3">
            <h5 class="position-relative d-inline-block text-capitalize  review-title">pendapat pelanggan</h5>
            <br>
            <h2 class="position-relative d-inline-block text-capitalize">apa yang mereka katakan</h2>
        </div>
        <div class="swiper review-slider">
            <div class="swiper-wrapper py-3">
                <div class="swiper-slide">
                    <div class="card border-review">
                        <div class="d-flex p-3 justify-content-start align-items-center">
                            <img src="assets/img/pic-1.png" class="mr-4 image-review">

                            <div class="name-job-review">
                                <p class="fw-bold mb-0 text-capitalize">Steven Panggali</p>

                                <ul class="list-inline text-center m-0 stars small">
                                    <li class="list-inline-item"><i class="fas fa-star"></i></li>
                                    <li class="list-inline-item"><i class="fas fa-star"></i></li>
                                    <li class="list-inline-item"><i class="fas fa-star"></i></li>
                                    <li class="list-inline-item"><i class="fas fa-star"></i></li>
                                    <li class="list-inline-item"><i class="far fa-star"></i></li>
                                </ul>
                            </div>
                        </div>

                        <div class="card-body">
                            <blockquote class="blockquote">
                                <p><i class="fas fa-quote-left text-review text-capitalize"></i>Penjual Jujur, Prosesnya Cepat, dan Barang-Barangnya Berkualitas tinggi.</p>
                            </blockquote>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="card border-review">
                        <div class="d-flex p-3 justify-content-start align-items-center">
                            <img src="assets/img/pic-2.png" class="mr-4 image-review">

                            <div class="name-job-review">
                                <p class="fw-bold mb-0 text-capitalize">Marry William</p>

                                <ul class="list-inline text-center m-0 stars small">
                                    <li class="list-inline-item"><i class="fas fa-star"></i></li>
                                    <li class="list-inline-item"><i class="fas fa-star"></i></li>
                                    <li class="list-inline-item"><i class="fas fa-star"></i></li>
                                    <li class="list-inline-item"><i class="fas fa-star"></i></li>
                                    <li class="list-inline-item"><i class="far fa-star"></i></li>
                                </ul>
                            </div>
                        </div>

                        <div class="card-body">
                            <blockquote class="blockquote">
                                <p><i class="fas fa-quote-left text-review text-capitalize"></i>toko ini toko terbaik yang pernah saya temui.</p>
                            </blockquote>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="card border-review">
                        <div class="d-flex p-3 justify-content-start align-items-center">
                            <img src="assets/img/pic-3.png" class="mr-4 image-review">

                            <div class="name-job-review">
                                <p class="fw-bold mb-0">Robert Junior</p>

                                <ul class="list-inline text-center m-0 stars small">
                                    <li class="list-inline-item"><i class="fas fa-star"></i></li>
                                    <li class="list-inline-item"><i class="fas fa-star"></i></li>
                                    <li class="list-inline-item"><i class="fas fa-star"></i></li>
                                    <li class="list-inline-item"><i class="fas fa-star"></i></li>
                                    <li class="list-inline-item"><i class="far fa-star"></i></li>
                                </ul>
                            </div>
                        </div>

                        <div class="card-body">
                            <blockquote class="blockquote">
                                <p><i class="fas fa-quote-left text-review text-capitalize"></i>toko ini sangat rekomendasi tetapi masih belum ada pengiriman dengan kurir</p>
                            </blockquote>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="card border-review">
                        <div class="d-flex p-3 justify-content-start align-items-center">
                            <img src="assets/img/pic-4.png" class="mr-4 image-review">

                            <div class="name-job-review">
                                <p class="fw-bold mb-0">Ariana Callista</p>

                                <ul class="list-inline text-center m-0 stars small">
                                    <li class="list-inline-item"> <i class="fas fa-star"></i></li>
                                    <li class="list-inline-item"> <i class="fas fa-star"></i></li>
                                    <li class="list-inline-item"> <i class="fas fa-star"></i></li>
                                    <li class="list-inline-item"> <i class="fas fa-star"></i></li>
                                    <li class="list-inline-item"> <i class="far fa-star"></i></li>
                                </ul>
                            </div>
                        </div>

                        <div class="card-body">
                            <blockquote class="blockquote">
                                <p><i class="fas fa-quote-left text-review"></i>Saya sangat suka toko ini harganya murah banget.</p>
                            </blockquote>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="card border-review">
                        <div class="d-flex p-3 justify-content-start align-items-center">
                            <img src="assets/img/pic-5.png" class="mr-4 image-review">

                            <div class="name-job-review">
                                <p class="fw-bold mb-0">Samuel Alexander</p>

                                <ul class="list-inline text-center m-0 stars small">
                                    <li class="list-inline-item"><i class="fas fa-star"></i></li>
                                    <li class="list-inline-item"><i class="fas fa-star"></i></li>
                                    <li class="list-inline-item"><i class="fas fa-star"></i></li>
                                    <li class="list-inline-item"><i class="fas fa-star"></i></li>
                                    <li class="list-inline-item"><i class="far fa-star"></i></li>
                                </ul>
                            </div>
                        </div>

                        <div class="card-body">
                            <blockquote class="blockquote">
                                <p><i class="fas fa-quote-left text-review"></i>Mantap bang, semangat jualannya jangan lupa kasih diskon.</p>
                            </blockquote>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="card border-review">
                        <div class="d-flex p-3 justify-content-start align-items-center">
                            <img src="assets/img/pic-6.png" class="mr-4 image-review">

                            <div class="name-job-review">
                                <p class="fw-bold mb-0">Alice Nathania</p>

                                <ul class="list-inline text-center m-0 stars small">
                                    <li class="list-inline-item"><i class="fas fa-star"></i></li>
                                    <li class="list-inline-item"><i class="fas fa-star"></i></li>
                                    <li class="list-inline-item"><i class="fas fa-star"></i></li>
                                    <li class="list-inline-item"><i class="fas fa-star"></i></li>
                                    <li class="list-inline-item"><i class="far fa-star"></i></li>
                                </ul>
                            </div>
                        </div>

                        <div class="card-body">
                            <blockquote class="blockquote">
                                <p><i class="fas fa-quote-left text-review"></i>Aku sangat suka toko ini penjualnya ramah, harganya juga murah-murah tetapi kualitasnya bukan murahan.</p>
                            </blockquote>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- review section ends -->

    <!-- brand section starts  -->
    <section class="brand text-center bg-white py-3" id="brand">
        <div class="title text-center py-5">
            <h2 class="position-relative d-inline-block text-capitalize">Partner Kami</h2>
        </div>
        <div class="swiper brand-slider">
            <div class="swiper-wrapper py-3">
                <div class="swiper-slide shadow"><img src="assets/img/brand-1.png" class="img-fluid"></div>
                <div class="swiper-slide shadow"><img src="assets/img/brand-2.png" class="img-fluid"></div>
                <div class="swiper-slide shadow"><img src="assets/img/brand-3.png" class="img-fluid"></div>
                <div class="swiper-slide shadow"><img src="assets/img/brand-4.png" class="img-fluid"></div>
                <div class="swiper-slide shadow"><img src="assets/img/brand-5.png" class="img-fluid"></div>
                <div class="swiper-slide shadow"><img src="assets/img/brand-6.png" class="img-fluid"></div>
            </div>
        </div>
        </div>

    </section>
    <!-- brand section ends -->


    <!-- newsletter -->
    <section id="newsletter" class="py-3">
        <div class="container">
            <div class="d-flex flex-column align-items-center justify-content-center">
                <div class="title text-center pt-3 pb-5 text-capitalize">
                    <h2 class="position-relative d-inline-block ms-4">Newsletter Subscription</h2>
                </div>

                <p class="text-center text-muted">Isikan email anda untuk mendapatkan update tentang kami</p>
                <div class="input-group mb-3 mt-3">
                    <input type="text" class="form-control" placeholder="Enter Your Email ...">
                    <a href="index.php" class="btn btn-primary">Subscribe</a>
                </div>
            </div>
        </div>
    </section>
    <!-- end of newsletter -->

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
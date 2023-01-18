<?php
session_start();
require 'functions.php';

if (isset($_SESSION["login"])) {
    header("Location: index.php");
    exit;
}

if (isset($_POST["daftar"])) {

    if (daftar($_POST) > 0) {
        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Success!!</strong> User Berhasil Didaftarkan..!!
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
        echo "<meta http-equiv='refresh' content='2;url=login.php'>";
    } else {
        echo mysqli_error($conn);
    }
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
    <section class="wrapper">
        <div class="container">
            <div class="col-sm-8 offset-sm-2 col-lg-6 offset-lg-3 col-xl-6 offset-xl-3 text-center">
                <div class="logo">
                    <img src="assets/img/logo.png" class="img-fluid" alt="logo">
                </div>
                <form class="rounded bg-white shadow p-5" method="POST" enctype="multipart/form-data">
                    <h3 class="text-dark fw-bolder fs-4 mb-2">Create an Account</h3>

                    <div class="fw-normal text-muted mb-2">
                        Already have an account? <a href="login.php" class="text-primary fw-bold text-decoration-none">Sign in here</a>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="floatingFullName" placeholder="Bekasi" autocomplete="off" name="nama" required>
                        <label for="floatingFullName">Full Name</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="number" class="form-control" id="floatingTelepon" placeholder="Bekasi" autocomplete="off" name="telepon" required>
                        <label for="floatingTelepon">Telepon</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="email" class="form-control" id="floatingInput" placeholder="Bekasi" autocomplete="off" name="email" required>
                        <label for="floatingInput">Email address</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="password" class="form-control" id="floatingPassword" placeholder="Bekasi" autocomplete="off" name="password" required>
                        <label for="floatingPassword">Password</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="password" class="form-control" id="floatingPassword" placeholder="Bekasi" autocomplete="off" name="password2" required>
                        <label for="floatingPassword">Confirm Password</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input class="form-control" type="file" id="formFile" name="gambar" id="gambar">
                        <label for="formFile gambar" class="form-label text-uppercase">foto profil</label>
                    </div>
                    <div class="form-floating mb-3">
                        <textarea class="form-control" id="floatingTextarea" placeholder="Bekasi" autocomplete="off" name="alamat" required></textarea>
                        <label for="floatingTextarea">Address</label>
                    </div>
                    <button type="submit" name="daftar" id="daftar" class="btn btn-primary submit_btn w-100 my-4">Daftar</button>
                </form>
            </div>
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
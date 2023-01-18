<?php
session_start();
require 'functions.php';

//mengecek cookie
if (isset($_COOKIE['id_user']) && isset($_COOKIE['key'])) {
    $id = $_COOKIE['id_user'];
    $key = $_COOKIE['key'];

    //mengambil email_user berdasarkan id
    $result = mysqli_query($conn, "SELECT email_user FROM user
            WHERE id_user = $id");
    $row = mysqli_fetch_assoc($result);

    //mengecek cookie dan email_user
    if ($key === hash('sha256', $row['email_user'])) {
        $_SESSION['login'] = true;
    }
}

if (isset($_SESSION["login"])) {
    header("Location: index.php");
    exit;
}


if (isset($_POST["login"])) {
    $email_user = $_POST["floatingEmail"];
    $password = $_POST["floatingPassword"];
    $result = mysqli_query($conn, "SELECT * FROM user WHERE email_user = '$email_user'");
    if (!$email_user) {
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Error!</strong> Email Belum Diisi..!!
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
    } elseif (!$password) {
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Error!</strong> Password Belum Diisi..!!
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
    }
    //mengecek email_user
    if (mysqli_num_rows($result) === 1) {

        //mengecek password
        $row = mysqli_fetch_assoc($result);
        if (password_verify($password, $row["password_user"])) {

            //mengecek fole user
            $_SESSION["role"] = $row["role"];
            if ($_SESSION["role"] == 'admin') {
                $_SESSION["admin"] = $row;
                header("Location: admin/index.php");
            } else {
                $_SESSION["login"] = true;
                $_SESSION["user"] = $row;

                //mengecek remember me
                if (isset($_POST['gridCheck'])) {

                    //membuat cookie

                    setcookie('id_user', $row['id_user'], time() + 60);
                    setcookie('key', hash('sha256', $row['email_user']), time() + 60);
                }

                header("Location: index.php");
            }
            exit;
        }
    }
    $error = true;
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
                    <img src="assets/img/logo.png" class="img-fluid" alt="Logo">
                </div>
                <form action="" class="rounded bg-white shadow py-5 px-4" method="POST">
                    <h3 class="text-dark fw-bolder fs-4 mb-2">Login <br>Sans Gaming</h3>
                    <div class="fw-normal text-muted mb-4"> New Here?
                        <a href="daftar.php" class="text-primary fw-bold text-decoration-none">Create an Account</a>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="floatingEmail" placeholder="name@example.com" name="floatingEmail">
                        <label for="floatingEmail">Email address</label>
                    </div>
                    <div class="form-floating">
                        <input type="password" class="form-control" id="floatingPassword" placeholder="Password" name="floatingPassword">
                        <label for="floatingPassword">Password</label>
                    </div>
                    <div class="form-check d-flex align-items-center mt-2">
                        <input class="form-check-input" type="checkbox" id="gridCheck" name="gridCheck">
                        <label class="form-check-label ms-2 mt-1" for="gridCheck">Remember Me</label>
                    </div>
                    <div class="mt-2 text-start">
                        <a href="#" class="text-primary fw-bold text-decoration-none">Forget Password?</a>
                    </div>
                    <button type="submit" class="btn btn-primary submit_btn w-100 my-4" name="login">Login</button>
                    <div class="text-center text-muted text-uppercase mb-3">or</div>
                    <a href="index.php" class="btn btn-light login_with w-100 mb-3">
                        <img alt="Logo" src="assets/img/home.png" class="img-fluid me-3">Continue to Home
                    </a>
            </div>
        </div>
    </section>

</body>

</html>
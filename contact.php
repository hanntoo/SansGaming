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

    <section class="py-5">
        <div class="container">
            <div class="title text-center py-3">
                <h2 class="position-relative d-inline-block text-capitalize">Hubungi Kami</h2>
            </div>
            <br />
            <div class="row">
                <div class="col-md-6">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.301655286415!2d106.83162611435058!3d-6.22389826268783!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f3f112bedccb%3A0xb92e266d45d182c6!2sGama%20Tower!5e0!3m2!1sid!2sid!4v1658530325460!5m2!1sid!2sid" width="570" height="480" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
                <br />
                <div class="col-md-6">
                    <form class="rounded bg-white shadow p-5">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="floatingFullName" placeholder="Bekasi" autocomplete="off" name="nama" required>
                            <label for="floatingFullName">Full Name</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="email" class="form-control" id="floatingInput" placeholder="Bekasi" autocomplete="off" name="email" required>
                            <label for="floatingInput">Email address</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="number" class="form-control" id="floatingTelepon" placeholder="Bekasi" autocomplete="off" name="telepon" required>
                            <label for="floatingTelepon">Telepon</label>
                        </div>
                        <div class="form-floating mb-3">
                            <textarea class="form-control" id="floatingTextarea" placeholder="Bekasi" autocomplete="off" name="alamat" required></textarea>
                            <label for="floatingTextarea">Message</label>
                        </div>
                        <button type="submit" name="contact" class="btn btn-primary submit_btn w-100 my-4">Contact</button>
                    </form>
                </div>
            </div>
        </div>
    </section>



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
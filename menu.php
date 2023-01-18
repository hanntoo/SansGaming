<nav class="navbar navbar-expand-lg navbar-light bg-white shadow py-2 sticky-top">
    <div class="container">
        <a href="index.php" class="navbar-brand d-flex justify-content-between align-items-center order-lg-0">
            <img src="assets/img/logo.png" width="60">
            <span class="text-capitalize fw-bold ms-2 older-sm-9">sans gaming</span></a>

        <div class="order-lg-2">
            <form action="search.php" method="get" class="d-flex">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="keyword">
                <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
            <a href="keranjang.php" class="btn position-relative">
                <i class="fas fa-shopping-cart"></i>
                <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger"></span>
            </a>
            <a href="riwayat.php" class="btn position-relative">
                <i class="fa fa-book"></i>
                <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger"></span>
            </a>
            <?php if (!isset($_SESSION["user"])) : ?>
                <a href="login.php" class="btn position-relative">
                    <i class="fas fa-user"></i>
                    <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger"></span>
                </a>
            <?php else : ?>
                <a href="logout.php" onclick="return confirm('Apakah Anda Yakin?');" class="btn position-relative">
                    <i class="fas fa-sign-out-alt"></i>
                    <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger"></span>
                </a>
            <?php endif; ?>
        </div>
        <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse order-lg-1" id="navbarSupportedContent">
            <ul class="navbar-nav mx-auto text-center">
                <li class="nav-item text-uppercase text-dark">
                    <a class="nav-link px-2 py-2" href="index.php">home</a>
                </li>
                <li class="nav-item text-uppercase text-dark">
                    <a class="nav-link px-2 py-2" href="produk.php">produk</a>
                </li>
                <li class="nav-item text-uppercase text-dark">
                    <a class="nav-link px-2 py-2" href="review.php">review</a>
                </li>
                <li class="nav-item text-uppercase text-dark">
                    <a class="nav-link px-2 py-2" href="brand.php">partner</a>
                </li>
                <li class="nav-item text-uppercase text-dark">
                    <a class="nav-link px-2 py-2" href="contact.php">Contact Us</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
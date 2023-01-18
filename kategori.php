    <!-- kategori section starts -->
    <section class="kategori bg-white py-3">
        <div class="container">
            <div class="title text-center py-5">
                <h2 class="position-relative d-inline-block text-capitalize">kategori produk</h2>
            </div>
            <div class="row text-center box-container py-3">
                <?php
                $ambil = $conn->query("SELECT * FROM kategori");
                while ($perkategori = $ambil->fetch_assoc()) :
                ?>
                    <div class="col-lg-3 col-md-6 col-sm-9 p-2 text-center box shadow">
                        <a href="produk.php?kategori=<?= $perkategori['nama_kategori']; ?>">
                            <img src="assets/img/<?= $perkategori['foto_kategori']; ?>">
                            <h3 class="text-black text-capitalize"><?= $perkategori['nama_kategori']; ?></h3>
                        </a>
                    </div>
                <?php endwhile; ?>
            </div>
        </div>
    </section>
    <!-- kategori section ends -->
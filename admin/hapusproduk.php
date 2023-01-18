<?php

$ambil = $conn->query("SELECT * FROM produk WHERE id_produk = '$_GET[id]'");
$pecah = $ambil->fetch_assoc();
$fotoproduk = $pecah['foto_produk'];

if (file_exists("../assets/img/$fotoproduk")) {
  unlink("../assets/img/$fotoproduk");
}

$conn->query("DELETE FROM produk WHERE id_produk = '$_GET[id]'");

echo "<script>alert('Produk terhapus');</script>";
echo "<script>location='index.php?halaman=produk';</script>";

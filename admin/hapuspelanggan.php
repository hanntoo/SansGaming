<?php 

$ambil = $conn->query("SELECT * FROM user WHERE id_user='$_GET[id]'");
$pecah = $ambil->fetch_assoc();

$conn->query("DELETE FROM user WHERE id_user='$_GET[id]'");

echo "<script>alert('Berhasil Dihapus');</script>";
echo "<script>location='index.php?halaman=pelanggan';</script>";

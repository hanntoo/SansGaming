<?php
//koneksi ke database
$conn = mysqli_connect("localhost", "root", "", "sansgaming");


function query($query)
{
    global $conn;

    $result = mysqli_query($conn, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}

function upload()
{
    $namaFile = $_FILES['gambar']['name'];
    $ukuranFile = $_FILES['gambar']['size'];
    $error = $_FILES['gambar']['error'];
    $tempName = $_FILES['gambar']['tmp_name'];

    //cek apakah gambar sudah diupload atau belum
    if ($error === 4) {
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Error!</strong> Pilih Gambar Terlebih Dahulu..!!
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
        return false;
    }

    //cek apakah yang diupload adalah gambar
    $ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
    $ekstensiGambar = explode('.', $namaFile);
    $ekstensiGambar = strtolower(end($ekstensiGambar));
    if (!in_array($ekstensiGambar, $ekstensiGambarValid)) {
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Error!</strong> Yang Anda Upload adalah Bukan Gambar..!!
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
        return false;
    }

    //cek jika ukuran gambar terlalu besar
    if ($ukuranFile > 10000000) {
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Error!</strong> Maaf Ukuran Gambar Terlalu Besar..!!
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
        return false;
    }

    //jika gambar lolos pengecekan maka upload gambar

    $namaFileBaru = uniqid();
    $namaFileBaru .= ".";
    $namaFileBaru .= $ekstensiGambar;

    move_uploaded_file($tempName, 'assets/img/foto_user/' . $namaFileBaru);

    return $namaFileBaru;
}


function daftar($data)
{
    global $conn;
    $nama = htmlspecialchars($data["nama"]);
    $email = strtolower(stripslashes($data["email"]));
    $telepon = htmlspecialchars($data["telepon"]);
    $password = mysqli_real_escape_string($conn, $data["password"]);
    $password2 = mysqli_real_escape_string($conn, $data["password2"]);
    $alamat = htmlspecialchars($data["alamat"]);

    //cek email sudah ada atau belum
    $result = mysqli_query($conn, "SELECT email_user FROM user WHERE
        email_user = '$email'");

    if (mysqli_fetch_assoc($result)) {
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Error!</strong> Email Sudah Terdaftar..!!
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
        return false;
    }

    //cek konfirmasi password
    if ($password != $password2) {
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Error!</strong> Password Tidak Sesuai..!!
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
        return false;
    }

    //mengenkripsi password
    $password = password_hash($password, PASSWORD_DEFAULT);

    $gambar = upload();
    if (!$gambar) {
        return false;
    }

    $role = 'pelanggan';
    //menambahkan user baru ke database
    mysqli_query($conn, "INSERT INTO user VALUES('', '$nama', '$gambar', '$email', '$password', '$telepon', '$alamat', '$role')");

    return mysqli_affected_rows($conn);
}

<?php
    $nama_pelanggan = $_POST["nama_pelanggan"];
    $alamat = $_POST['alamat'];
    $telp = $_POST ['telp'];
    $username = $_POST['username'];
    $password = $_POST['password'];

    include "koneksi.php";
    $input = mysqli_query($koneksi, "INSERT INTO pelanggan
    (nama_pelanggan, alamat, telp, username, password) VALUES 
    ('".$nama_pelanggan."','".$alamat."','".$telp."', '".$username."','".md5($password)."')");

    if ($input) {
        echo "<script>alert('Berhasil Registrasi');location.href='index.php';</script>";
    }
    else {
        echo "<script>alert('Gagal Registrasi');location.href='register.php';</script>";
    }
?> 
<?php
    $nama_admin = $_POST["nama_admin"];
    $username = $_POST['username'];
    $password = $_POST['password'];

    include "koneksi.php";
    $input = mysqli_query($koneksi, "INSERT INTO petugas
    (nama_admin, username, password) VALUES 
    ('".$nama_admin."', '".$username."','".md5($password)."')");

    if ($input) {
        echo "<script>alert('Berhasil Registrasi');location.href='index.php';</script>";
    }
    else {
        echo "<script>alert('Gagal Registrasi');location.href='register.php';</script>";
    }
?> 
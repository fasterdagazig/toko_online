<?php
    if ($_POST) {
        $username = $_POST['username'];
        $password = $_POST['password'];

        include "koneksi.php";
        $query_login=mysqli_query($koneksi,"SELECT * FROM pelanggan WHERE username = '".$username."' and password = '".md5($password)."'");

        if (mysqli_num_rows($query_login)>0) {
            $data_login = mysqli_fetch_array($query_login);
            session_start();
            $_SESSION['id_pelanggan']=$data_login['id_pelanggan'];
            $_SESSION['nama_pelanggan']=$data_login['nama_pelanggan'];
            $_SESSION['status_login']=true;
            echo "<script>location.href='home.php';</script>";
        }
        else{
            echo "<script>alert('Login Gagal');location.href='index.php';</script>";
        }
    }
?> 
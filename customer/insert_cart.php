<?php
    session_start();
    if ($_POST) {
        include "koneksi.php";

        $query_get_produk=mysqli_query($koneksi, "SELECT * FROM produk WHERE id_produk = '".$_POST['id_produk']."'");
        $data_produk = mysqli_fetch_array($query_get_produk);

        $_SESSION['cart'][]=array(
            'id_produk' => $data_produk['id_produk'],
            'nama_produk' => $data_produk['nama_produk'],
            'qty' => $_POST['jumlah_beli']
        );
    }
    header('location: cart.php');
?> 
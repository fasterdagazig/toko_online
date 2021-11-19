<?php
    session_start();
    include "koneksi.php";

    $cart=@$_SESSION['cart'];
    if(count($cart)>0){
        $tgl_pembelian;
        mysqli_query($koneksi,"INSERT INTO transaksi(id_pelanggan,id_petugas,tgl_transaksi)value('".$_SESSION['id_pelanggan']."','".$_SESSION['id_petugas']."','".date('Y-m-d')."','".$tgl_transaksi."')");
        $id=mysqli_insert_id($koneksi);
        foreach ($cart as $key_produk => $val_produk) {
        mysqli_query($koneksi,"INSERT INTO detail_transaksi(id_transaksi,id_produk,qty)value('".$id."','".$val_produk['id_produk']."','".$val_produk['qty']."')");
    }
    unset($_SESSION['cart']);
    echo '<script>alert("Anda berhasil membeli produk");location.href="histori.php"</script>';
    }
?> 
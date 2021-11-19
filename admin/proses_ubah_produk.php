<?php
    $id_produk = $_POST['id_produk'];
    $nama_produk = $_POST['nama_produk'];
    $deskripsi = $_POST['deskripsi'];
    $harga = $_POST['harga'];

    $temp = $_FILES['foto']['tmp_name'];
    $type = $_FILES['foto']['type'];
    $size = $_FILES['foto']['size'];
    $name = rand(0,9999).$_FILES['foto']['name'];
    $folder = "foto/";

    // echo $temp;
    // echo $type;
    // echo $size;
    // echo $name;

    include "koneksi.php";

    // mendapatkan data buku yang diubah
    $sql = "SELECT * FROM produk WHERE id_produk='$id_produk'";
    # eksekusi perintah SQL
    $query = mysqli_query($koneksi, $sql);
    # konversi ke array
    $produk = mysqli_fetch_array($query);

    # proses hapus file yg lama
    $path = $folder.$produk["foto"];

    # cek eksistensi file yg akan dihapus
    if (file_exists($path)) {
        # jika file yg lama ada, maka kita hapus
        unlink($path);
    }

    # upload file yg baru
    move_uploaded_file($temp, $folder . $name);

    # proses update data yg ada di database
    $sql = "UPDATE produk SET nama_produk='$nama_produk', 
    deskripsi='$deskripsi', harga='$harga',
    foto='$name' WHERE id_produk='$id_produk'";

    # eksekusi perintah update
    $result = mysqli_query($koneksi,$sql);

    if ($result) {
        echo "<script>alert('Berhasil');location.href='tampil_produk.php';</script>";
    }
    else {
        echo "<script>alert('Gagal');</script>";
        echo mysqli_error($koneksi);
    }




?> 
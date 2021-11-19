<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Produk</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">

</head>
<body>
    <?php
        include "navbar.php";
    ?>
    <br></br>
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h1>DATA PRODUK</h1>
                <form method="POST" action="tampil_buku.php" class="d-flex">
                    <input class="form-control me-2" type="search" name="cari" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
            </div>
            <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                    <th scope="col">ID BARANG</th>
                    <th scope="col">NAMA BARANG</th>
                    <th scope="col">DESKRIPSI</th>
                    <th scope="col">HARGA</th>
                    <th scope="col">FOTO</th>
                    <th scope="col">AKSI</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                    include "koneksi.php";
                    if (isset($_POST['cari'])) {
                        $cari = $_POST['cari'];
                        $query_produk = mysqli_query($koneksi, "SELECT * FROM produk WHERE id_produk = '$cari' or nama_produk like '%$cari%' or deskripsi like '%$cari%' or harga like '%$cari%'");
                    }
                    else{
                        $query_produk = mysqli_query($koneksi, "SELECT * FROM produk");
                    }
                    while($data_produk = mysqli_fetch_array($query_produk)){
                ?>
                    <tr>
                        <td><?=$data_produk['id_produk']?></td>
                        <td><?=$data_produk['nama_produk']?></td>
                        <td><?=$data_produk['deskripsi']?></td>
                        <td><?=$data_produk['harga']?></td>
                        <td><img src="foto/<?=$data_produk['foto']?>" width=100></td>
                        <td>
                            <a href="ubah_produk.php?id_produk=<?=$data_produk['id_produk']?>" class="btn btn-success">Edit</a>
                            <a href="hapus_produk.php?id_produk=<?=$data_produk['id_produk']?>" class="btn btn-danger"
                            onclick="return confirm('Apakah anda yakin menghapus data ini?')">Hapus</a>
                        </td>
                    </tr>
                <?php
                    }
                ?>
                </tbody>
            </table>
            <a href="tambah_produk.php" type="button" class="btn btn-primary">Tambah Produk</a>
            </div>
        </div>
    </div>
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>


</body>
</html> 
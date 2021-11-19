<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ubah Produk</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
</head>
<body>
    <?php
        include "navbar.php";
        include "koneksi.php";
        $query_produk = mysqli_query($koneksi, "SELECT * FROM produk WHERE id_produk='".$_GET['id_produk']."'");
        $data_produk = mysqli_fetch_array($query_produk);
    ?>
    <br></br>
    <div class="container">
        <div class="card">
            <h1 class="card-header">Ubah Produk</h1>
            <div class="card-body">
                <form method="POST" action="proses_ubah_produk.php" enctype="multipart/form-data">
                    <input type="hidden" name="id_produk" value="<?=$data_produk['id_produk']?>">
                    <div class="mb-3">
                        <label for="nama_produk" class="form-label">Nama Produk</label>
                        <input type="text" class="form-control" name="nama_produk" value="<?=$data_produk['nama_produk']?>" placeholder="Masukkan Nama Produk" required>
                    </div>
                    <div class="mb-3">
                        <label for="deskripsi" class="form-label">Deskripsi</label>
                        <textarea class="form-control" name="deskripsi" row="3" placeholder="Masukkan Deskripsi Produk" required><?=$data_produk['deskripsi']?></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="harga" class="form-label">Harga</label>
                        <input type="number" class="form-control" name="harga" value="<?=$data_produk['harga']?>" placeholder="Masukkan Harga" required>
                    </div>
                    <div class="mb-3">
                        <label for="foto" class="form-label">Foto</label>
                        <img src="foto/<?=$data_produk['foto']?>" width=100>
                        <input type="file" class="form-control" name="foto" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>

    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
</body>
</html> 
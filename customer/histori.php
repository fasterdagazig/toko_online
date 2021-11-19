<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>History</title>
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
                <h1>History Pembelian</h1>
            </div>
            <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                    <th scope="col">No</th>
                    <th scope="col">TANGGAL PEMBELIAN</th>
                    <th scope="col">NAMA PRODUK</th>
                    <th scope="col">STATUS</th>
                    <th scope="col">AKSI</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    include "koneksi.php";
                    $query_pembelian = mysqli_query($koneksi, "SELECT * FROM transaksi 
                    where id_pelanggan = '".$_SESSION['id_pelanggan']."' ORDER BY id_transaksi DESC");
                    $no=0;
                    while($data_pembelian=mysqli_fetch_array($query_pembelian)){
                        $no++;
                    ?>
                    <tr>
                        <td><?=$no?></td>
                        <td><?=$data_pembelian['tgl_transaksi']?></td>
                        <td>
                            <ol>
                            <?php
                            $query_detail = mysqli_query($koneksi, "SELECT * FROM detail_transaksi d JOIN produk b ON b.id_produk = d.id_produk 
                                            WHERE id_detail_transaksi = '".$data_peminjaman['id_detail_transaksi']."'");
                            while($data_detail = mysqli_fetch_array($query_detail)){
                                echo "<li>".$data_detail['nama_produk']."</li>";
                            }
                            ?>
                            </ol>
                        </td>
                        <?php
                        $query_cek_kembali = mysqli_query($koneksi, "SELECT * FROM pengembalian_buku
                        WHERE id_peminjaman_buku = '".$data_peminjaman['id_peminjaman_buku']."'");
                        if (mysqli_num_rows($query_cek_kembali) > 0) {
                            $data_kembali = mysqli_fetch_array($query_cek_kembali);
                            echo "<td>";
                            echo "<label class='alert alert-success'>
                                Sudah Kembali<br>
                                denda Rp.".$data_kembali['denda']."</label>";
                            echo "</td>";
                            echo "<td></td>";
                        }
                        else{
                            echo "<td><label class='alert alert-danger'>Belum Kembali<br></label></td>";
                            echo "<td><a href='kembali.php?id=".$data_peminjaman['id_peminjaman_buku']."' class='btn btn-warning'
                            onclick='return confirm('Apakah anda yakin mengembalikan buku ini?')'>Kembalikan</a></td>";
                        }
                        ?>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
            </div>
        </div>
    </div>
    <?php
        include "footer.php";
    ?>


</body>
</html> 
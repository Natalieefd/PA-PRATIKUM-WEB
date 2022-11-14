<?php
   session_start();
   include 'koneksi.php';

   $kategori = mysqli_query($db, "SELECT * FROM kategori ORDER BY id_kategori DESC");

   if (isset($_GET['search'])){
    $kategori = mysqli_query($db, "SELECT * FROM kategori WHERE nama_kategori LIKE '%".
        $_GET['search']."%'");
   }


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="style_kategori.css" />
    <link rel="icon" href="logo.ico" type="image/x-icon">
    <title>Feel My Bag</title>
</head>
<body>
    <div class="wrapper">
        <div class="header">
            <h1 id="FMBW">Feel My Bag</h1>
        </div>
        <div class="menu">
            <li><a href="halaman_admin.php">Home</a></li>
            <li><a href="product_admin.php">Produk</a></li>
            <li><a href="hasil.php">Data Product</a></li>
            <li><a href="tampil_struct.php">Struk</a></li>
        </div>
    </div>
    <div class="main-container">
        <div class="container">
            <div class="section">
                <h3>Kategori</h3>
                <div class="box">
                    <p><a href="tambah_kategori.php" style="padding:0.4% 0.8%; background-color:#009900;color:#fff;border-radius:2px;text-decoration:none;">Tambah Data</a></p>
                    <form class="search" action="" method="get">
                        <label for="search"></label>
                        <input type="text" name="search" placeholder="search here....">
                    </form>
                    <table border="1" cellspacing="0" class="table">
                        <thead>
                            
                        <tr style="text-align:center;font-weight:bold;background-color:#f2d6f2">
                                <th width="60px";>No</th>
                                <th>Kategori</th>
                                <th width="100px">Opsi</th>
                                <th width="100px">Opsi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $id_kategori = 1;
                                if(mysqli_num_rows($kategori)> 0){
                                while($row = mysqli_fetch_array($kategori)){
                            ?>
                            <tr>
                                <td><center><?=$id_kategori; ?></center></td>
                                <td><center><?=$row['nama_kategori']?></center></td>
                                <td><center><a class = "" a href="edit_kategori.php?id_kategori=<?=$row['id_kategori']?>">Edit</i></a></center></td>
                                <td><center><a class = "" a href="delete_kategori.php?id_kategori=<?=$row['id_kategori']?>" onclick="return confirm('Yakin ingin hapus?')">Hapus</a></center></td>
                            </tr>
                            <?php $id_kategori++;}}else{ ?>
                                <tr>
                                    <td colspan="4"><center>Tidak Ada Data</center></td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="footer">
        <ul class="footer-sosmed">
            <ul class="footer-brand">
                <div class="brand">Feel My Bag</div>
            </ul>
            <ul class="footer-about1">
                <li><a href="https://www.facebook.com/"><i class="fa fa-facebook"></i> Facebook</a></li>
                <li><a href="https://twitter.com/"><i class="fa fa-twitter"></i> Twitter</a></li>
                <li><a href="#https://www.instagram.com/"><i class="fa fa-instagram"></i> Instagram</a></li>
            </ul>
        </ul>
    <div class="footer-c">
        Copyright &copy; 2022 Designed by Feel My Bag Team
    </div>
    </div>
</body>
</html>

<?php 

    require 'koneksi.php';
                        $result = mysqli_query($db, "SELECT * FROM fmb LEFT JOIN kategori USING (id_kategori)");
                     
                     
                        if (isset($_GET['search'])){
                         $result = mysqli_query($db, "SELECT * FROM fmb WHERE merk_tas LIKE '%".
                             $_GET['search']."%'");
                        }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Feel My Bag</title>
    <link rel="icon" href="logo.ico" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel = "stylesheet" href = "style_hasil.css">
</head>
<body>
    <div class="wrapper">
        <div class="header">
            <h1 id="FMBW">Feel My Bag</h1>
        </div>
        <div class="menu">
            <li><a href="halaman_admin.php">Home</a></li>
            <li><a href="product_admin.php">Product</a></li>
            <li><a href="kategori.php">Data Kategori</li>
        </div>
    </div>
    <div class="container">
        <div class="main-content">
            <h2>Pendataan Produk Feel My Bag</h2><br>
            <div class="header_main">
                <div class="header_main_content">
                    <a href="form.php" style="padding:0.4% 0.8%; background-color:#009900;color:#fff;border-radius:2px;text-decoration:none;">Tambah Data</a><br><br>
                    <form class="search" action="" method="get">
                            <label for="search"></label>
                            <input type="text" name="search" placeholder="search here....">
                    </form>
                    <div class="hasil">
                        <div class="table-box">
                        <form action="hasil.php" method="POST">
                            <table border="1" cellspacing="0" width="100%">
                                <tr style="text-align:center;font-weight:bold;background-color:#f2d6f2">
                                    <td>ID Tas</td>
                                    <td>Kategori</td>
                                    <td>Merk Tas</td>
                                    <td>Deskripsi Tas</td>
                                    <td>Warna</td>
                                    <td>Jumlah Stok</td>
                                    <td>Tanggal Stok</td>
                                    <td>Harga</td>
                                    <td>Gambar</td>               
                                    <td>Opsi</td>
                                    <td>Opsi</td>
                                </tr>
                                <?php 
                                    $id_tas = 1;
                                    if(mysqli_num_rows($result) > 0)
                                    while($row = mysqli_fetch_array($result)){
                                ?>
                                <tr>
                                    <td><center><?=$id_tas; ?></center></td>
                                    <td><center><?=$row['nama_kategori']?></center></td>
                                    <td><center><?=$row['merk_tas']?></center></td>
                                    <td><center><?=$row['deskripsi_tas']?></center></td>
                                    <td><center><?=$row['warna']?></center></td>
                                    <td><center><?=$row['jumlah_tas']?></center></td>
                                    <td><center><?=$row['tanggal_stok']?></center></td>
                                    <td><center><?=$row['harga']?></center></td>
                                    <td><center><img src="Gambar/<?=$row['gambar']?>" alt="" width = "100px"></center></td>
                                
                                    <td><center><a class = "" a href="edit_form.php?id_tas=<?=$row['id_tas']?>">Edit</i></a></center></td>
                                    <td><center><a class = "" a href="delete_form.php?id_tas=<?=$row['id_tas']?>" onclick="return confirm('Yakin ingin hapus?')">Hapus</a></center></td>
                                </tr> 
                                <?php 
                                $id_tas++;
                                    }else{
                                    ?>
                                    <tr>
                                        <td colspan="11" align="center">Data Kosong</td>
                                    </tr>
                                    <?php } ?>
                            </table>
                        </div>
                    </div>
                    </form>
                </div>
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

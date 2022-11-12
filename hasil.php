<?php 
    require 'koneksi.php';

    $result = mysqli_query($db, "SELECT * FROM fmb");

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
    <link rel = "stylesheet" href = "style_hasil.css">
</head>
<body>
<<<<<<< HEAD
=======
    <div class="wrapper">
            <div class="header">
                <h1 id="FMBW">Feel My Bag</h1>
            </div>
            <div class="menu">
                <li><a href="index.html">Home</a></li>
                <li><a href="product.html">Kategori</li>
                <li><a href="aboutus.html">Struk</a></li>
                <li><a href="logout.php">LOGOUT</a></li>
            </div>
    </div>
>>>>>>> d0a6d11ff37d77f1bb54a08ef58c54d606aaf002
    <h2>Pendataan Produk Feel My Bag</h2><br>
        <a href="form.php" style="padding:0.4% 0.8%; background-color:#009900;color:#fff;border-radius:2px;text-decoration:none;">Tambah Data</a><br><br>
        <form class="search" action="" method="get">
                <label for="search"></label>
                <input type="text" name="search">
        </form>
        <div class="hasil">
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
                    }
                    ?>
            </table>
        </div>
        </form>
</body>
</html>
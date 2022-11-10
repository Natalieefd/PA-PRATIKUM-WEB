<?php
    session_start();


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="icon" href="logo.ico" type="image/x-icon">
    <link rel="stylesheet" href="keranjang.css">
    <title>Keranjang | Feel My Bag</title>
</head>
<body>
    <div class="container">
        <div class="wrapper">
            <div class="header">
                <h1 id="FMBW">Feel My Bag</h1>
            </div>
            <div class="menu">
                <li><a href="index.html">home</a></li>
                <li><a href="product.html">product</a></li>
                <li><a href="aboutus.html">keranjang</a></li>
                <li><a href="aboutus.html">about us</a></li>
                <li><a href="logout.php">LOGOUT</a></li>
            </div>
        </div>
    </div>
    <div class="content">
        <div class="title">
            <div><i class="fa fa-shopping-cart"></i> keranjang</div>
        </div>
        <div>
            <table class="main-content">
                <th>
                    <tr> No </tr>
                    <tr> Gambar </tr>
                    <tr> Nama </tr>
                    <tr> Jumlah </tr>
                    <tr> Warna </tr>
                    <tr> Merk </tr>
                    <tr> Harga </tr>

                    <?php
                        require 'koneksi.php';

                        if(!empty($_SESSION["cart"])){

                        }

                        $result = $db->query("SELECT * FROM produk WHERE id_tas ='$id_tas'");
                        $query = $db->query($result);
                        $i = 1;
                        while($row = mysqli_fetch_array($result)){
                    ?>
                                                                                       
                    <td><?=$i?></td>
                    <td><img src="gambar/<?=$row['gambar']?>" width="100px"></td>
                    <td><?=$row['nama_barang']?></td>
                    <td><?=$row['jumlah_barang']?></td>
                    <td><?=$row['warna_barang']?></td>
                    <td><?=$row['merk_barang']?></td>
                    <td><?=$row['harga_barang']?></td>
                    <?php
                        $i++;}
                    ?>
                </th>
            </table>
        </div>
    </div>
    <div class="footer">
        Copyright &copy; 2022 Designed by Feel My Bag Team
    </div>
</body>
</html>
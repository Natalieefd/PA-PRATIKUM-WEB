<?php
    require 'koneksi.php';



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="tampil_struk.css">
    <link rel="icon" href="logo.ico" type="image/x-icon">
    <title>Struk | Feel My Bag</title>
</head>
<body>
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
    <div class="container">
        <div class="content">
            <div class="struk">
                <?php
                    require 'koneksi.php';
                    $result = $db->query("SELECT * FROM struk");
                    $i = 1;
                    while($row = mysqli_fetch_array($result)){
                ?>
                <tr>
                    <!-- <th> Gambar </th> -->
                    <h2>struk pembelian</h4>
                    <div></div>
                    <th class="text"><b>Tanggal Order</b></th><br>
                    <div></div>
                    <th class="text"><b>Nama Pembeli</b></th><br>
                    <td><?=$row['nama_pembeli']?></td>
                    <div></div>
                    <th class="text"><b>Nama Barang</b></th><br>
                    <td><?=$row['nama_barang']?></td>
                    <div></div>
                    <th class="text"><b>Jumlah Barang</b></th><br>
                    <td><?=$row['jumlah_barang']?></td>
                    <div></div>
                    <!-- <th>Warna </th><br><br>
                    <div></div> -->
                    <!-- <th>Merk Tas </th><br><br>
                    <div></div> -->
                    <!-- <th>Harga Satuan </th><br><br>
                    <div></div>
                    <th>Total Harga </th><br><br>
                    <div></div> -->
                </tr>
            </div>
            <?php
                $i++;}
            ?>
        </div>
    </div>
    <div class="footer">
        Copyright &copy; 2022 Designed by Feel My Bag Team
    </div>
</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="tampil_struk.css">
    <link rel="icon" href="logo.ico" type="image/x-icon">
    <title>Feel My Bag</title>
</head>
<body>
    <div class="wrapper">
        <div class="header">
            <h1 id="FMBW">Feel My Bag</h1>
        </div>
        <div class="menu">
            <li><a href="index.php">home</a></li>
            <li><a href="product.php">product</a></li>
            <li><a href="keranjang.php">keranjang</a></li>
            <li><a href="aboutus.html">about us</a></li>
        </div>
    </div>
    
    <div class="container">
        <div class="content">
            <div class="struk">
                <?php
                    require 'koneksi.php';
                    session_start();

                    $username = $_SESSION['username'];
                    if(isset($_GET['buy'])){
                        $id_tas = $_GET['buy'];

                        $data = mysqli_query($db, "SELECT * FROM FMB WHERE id_tas = '$id_tas'");                            
                        while ($row = mysqli_fetch_assoc($data)){
                            $item = $row;
                        }

                        $tanggal_order = date("Y-m-d H:i:s a");
                        $merk_tas = $item['merk_tas'];
                        $warna = $item['warna'];
                        $jumlah_tas = $item['jumlah_tas'];
                        $harga = $item['harga'];
                        mysqli_query($db, "INSERT INTO struk VALUES('$id_tas', default, '$tanggal_order', '$merk_tas', '$warna', '$jumlah_tas', '$harga')");
                    
                        $result = mysqli_query($db, "SELECT * FROM struk LEFT JOIN pengguna USING (username)");
                        }
                        while($row = mysqli_fetch_array($result)){
                    ?>
                    <tr>
                        <h2>struk pembelian</h2>
                        <div></div>
                        <th class="text"><b>Tanggal Order</b></th><br>
                        <td><?=$row['tanggal_order']?></td>
                        <div></div>
                        <th class="text"><b>Merk Tas</b></th><br>
                        <td><?=$row['merk_tas']?></td>
                        <div></div>
                        <th class="text"><b>Warna Tas</b></th><br>
                        <td><?=$row['warna']?></td>
                        <div></div>
                        <th class="text"><b>Jumlah Tas</b></th><br>
                        <td><?=$row['jumlah_tas']?></td>
                        <div></div>
                        <th class="text"><b>Harga</b></th><br><br>
                        <td><?=$row['harga']?></td>
                        <div></div>
                    </tr>
                </div>
            <?php
                }
            ?>
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

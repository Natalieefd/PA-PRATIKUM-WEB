<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="icon" href="logo.ico" type="image/x-icon">
    <link rel="stylesheet" href="keranjang.css">
    <title>Feel My Bag</title>
</head>
<body>
    <div class="container">
        <div class="wrapper">
            <div class="header">
                <h1 id="FMBW">Feel My Bag</h1>
            </div>
            <div class="menu">
                <li><a href="halaman_user.php">home</a></li>
                <li><a href="product.php">product</a></li>
                <li><a href="tampil_struk.php">struk</a></li>
                <li><a href="about_us.php">about us</a></li>
            </div>
        </div>
    </div>
    <div class="container2">
        <div class="main-content">
                    <table border="1" cellspacing="0" class="table">
                    <thead>
                        <tr style="text-align:center;font-weight:bold;background-color:#d1d1d1">
                            <th width="60px";>No</th>
                            <th>Gambar</th>
                            <th width="100px">Merk Tas</th>
                            <th width="100px">Warna Tas</th>
                            <th width="100px">Jumlah Tas</th>
                            <th width="100px">Harga Tas</th>
                        </tr>
                    </thead>
                    <tbody>
            <div class="content">
                <div class="content-box">
                    <?php
                        require 'koneksi.php';
                        session_start();

                        $username = $_SESSION['username'];
                        if (isset($_GET['cart'])){
                            $id_tas = $_GET['cart'];

                            $data = mysqli_query($db, "SELECT * FROM FMB WHERE id_tas = '$id_tas'");                            
                            while ($row = mysqli_fetch_assoc($data)){
                                $item = $row;
                            }
                            $i = 1;
                            $merk  = $item['merk_tas'];
                            $warna = $item['warna'];
                            $gambar = $item['gambar'];
                            $jumlah_tas = $item['jumlah_tas'];
                            $harga = $item['harga'];
                            
                            mysqli_query($db, "INSERT INTO produk VALUES(default, '$id_tas', '$username', '$merk', '$warna', '$jumlah_tas', '$harga', '$gambar')");
                    
                            $result = mysqli_query($db, "SELECT * FROM produk LEFT JOIN pengguna USING (username)");
                        
                        }
                        while($row = mysqli_fetch_array($result)){
                    ?>
                    <tr>
                        <td align="center"><?=$i;?></td>
                        <td align="center"><img src="Gambar/<?=$row['gambar']?>" width="100px"></td>
                        <td align="center"><?=$row['merk_tas']?></td>
                        <td align="center"><?=$row['warna']?></td>
                        <td align="center"><?=$row['jumlah_tas']?></td>
                        <td align="center"><?=$row['harga']?></td>
                    </tr>
                    <?php
                        $i++;}
                    ?>
                        </tbody>
                    </table>
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

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
                <li><a href="index.php">home</a></li>
                <li><a href="product.php">product</a></li>
                <li><a href="struk.php">struk</a></li>
                <li><a href="aboutus.html">about us</a></li>
            </div>
        </div>
    </div>
    <div class="title">
        <div class="title-text">
            <div><i class="fa fa-shopping-cart"></i> keranjang</div>
        </div>
    </div>
    <div class="main-content">
        <div class="content">
            <div class="content-box">
                <table>
                    <?php
                        require 'koneksi.php';

                        if (isset($_GET['cart'])){
                            $cart = $_GET['cart'];
                            $query = "SELECT * FROM pengguna LEFT JOIN produk ON pengguna.id_pengguna = produk.id_keranjang";
                            $result = mysqli_query($db, $query);
                        }
                        while($row = mysqli_fetch_array($result)){
                    ?>
                    
                    <!-- <td>?=$i?></td> -->
                    <div class="cart-box">
                        <p><img src="Gambar/<?=$row['gambar']?>" width="100px"></p>
                        <p><?=$row['jumlah_tas']?></p>
                        <p><?=$row['warna']?></p>
                        <p><?=$row['merk_tas']?></p>
                        <p><?=$row['harga']?></p>
                    </div>
                    <?php
                        // $i++;
                        }
                    ?>
                </table>
            </div>
        </div>
    </div>
    <div class="footer">
        Copyright &copy; 2022 Designed by Feel My Bag Team
    </div>
</body>
</html>
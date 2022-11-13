<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="style_product.css" />
    <title>Feel My Bag</title>
</head>
<body>
    <div class="wrapper">
        <div class="header">
            <h1 onclick="return warna_nama()" id="FMBW">Feel My Bag</h1>
        </div>
        <div class="menu">
            <li><a href="halaman_user.php">home</a></li>
            <li><a href="keranjang.php">keranjang</a></li>
            <li><a href="struk.php">struk</a></li>
            <li><a href="aboutus.html">about us</a></li>
        </div>
    </div>
    <div class="search-box">
        <div class="search">
            <input type="text" name="search" placehoder="search here...." title="search" class="serach-inpt" value="<?php if(isset($_GET['search'])){ echo $_GET['search'];}?>">
        </div>
    </div>
 
    <div class="container">
        <div class="content">
        <div class="kategori">
            <div class="kat-text"><h3>Kategori</h3></div>
                <div class="kategori-box">
                    <?php
                        include 'koneksi.php';
                        $kategori = mysqli_query($db, "SELECT * FROM kategori ORDER BY nama_kategori");
                        if($kategori->num_rows > 0){
                            while($l = mysqli_fetch_array($kategori)){
                    ?>
                    <img src="icon_category.png" alt="" width="50px">
                    <p class="kat"><?php echo $l['nama_kategori'] ?></p>
                    <?php }} ?>
                </div>
            </div>
        </div>

        <div class="section">
            <div class="content">
                <div class="box">
                    <?php
                        $product = mysqli_query($db, "SELECT * FROM fmb WHERE jumlah_tas > 0");
                        if(mysqli_num_rows($product) > 0){
                            while($p= mysqli_fetch_array($product)){
                    ?>
                        <a href="product.php?id_tas=<?php echo $p['id_tas']?>">
                            <div class="catalog-box">
                                <img src="Gambar/<?php echo $p['gambar'] ?>" width="40%">
                                <div class="desc">
                                    <p class="nama"><?php echo $p['merk_tas'] ?></p>
                                    <p class="deskripsi"><?php echo $p['deskripsi_tas'] ?></p>
                                    <p class="harga"><?php echo $p['harga'] ?></p>
                                </div>
                                <div class="button">
                                    <div class="add"><a href="keranjang.php?cart=<?=$p['id_tas']?>" name="cart"><i class="fa fa-shopping-cart">keranjang</i></a></div>
                                    <input type="hidden" name="tanggal_order" value= <?=date("Y-m-d H:i:s a")?> >
                                    <div class="buy"><a href="beli.php?buy=<?=$p['id_tas']?>"><i class="fa-solid fa-bag-shopping">beli sekarang</i></a></div>
                                </div>
                            </div>
                        </a>
                    <?php 
                        }}else{ ?>
                        <br><p>Produk tidak ada</p><br>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
    <div class="footer">
        Copyright &copy; 2022 Designed by Feel My Bag Team
    </div>
</body>
</html>
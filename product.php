<?php
   session_start();

   include"koneksi.php";
   if(!isset($_SESSION['login'])){
       echo "<script>
               alert('Akses ditolak, silahkan login dulu');
               document.location.href = 'login.php';
           </script>";
   }else{
       $username = $_SESSION['login'];
   }

?>


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
    <div class="container">
        <div class="wrapper">
            <div class="nav">
                <h1 onclick="return warna_nama()" id="FMBW">Feel My Bag</h1>
                <ul>
                    <li><a href="index.php">Home</a></li>
                    <li><a href="kategori.php">Kategori</a></li>
                    <!-- <li><a href="#" onclick="return tidak_ada()">Sign up/log in</a></li> -->
                    <li><a href="form.php">Pendataan Produk</a></li>
                    <li><a href="logout.php">Logout</a></li>
                </ul>
            </div>
        <div>

        <div class="search-box">
            <div class="search">
                    <input type="text" name="search" placehoder="search here...." title="search" class="serach-inpt" value="<?php if(isset($_GET['search'])){ echo $_GET['search'];}?>">
                    <!-- <input type="submit" name="cari" value="Cari Produk"> -->
                <?php
                    include 'koneksi.php';

                    if(isset($_GET['search'])) {
                        $kata_cari = $_GET['search'];

                        $query = "SELECT * FROM fmb WHERE id_tas like '%".$kata_cari."%' OR id_kategori like '%".$kata_cari."%' OR merk_tas like '%".$kata_cari."%' OR deskripsi_tas like '%".$kata_cari."%' OR warna like '%".$kata_cari."%' OR jumlah_tas like '%".$kata_cari."%' OR harga like '%".$kata_cari."%' ORDER BY kode_katalog ASC";
                    } else {
                        $query = "SELECT * FROM fmb ORDER BY id_tas ASC";
                    }
                    
                    $result = $db->query($query);

                    if(!$result) {
                        die("Error");
                    }
                    
                    while ($row = mysqli_fetch_assoc($result)){
                ?>
            </div>
        </div>

        <!-- <div class="kolom">
            <div class="container">
                <h3>Kategori</h3>
                <div class="box">
                    ?php
                        $kategori = mysqli_query($db, "SELECT * FROM kategori ORDER BY id_kategori DESC");
                        if(mysqli_num_row($kategori) > 0){
                            while($l = mysqli_fetch_array($kategori)){
                    ?>
                    <div class="kategori-box">
                        <img src="icon_category.png" alt=""  width="70px">
                        <p>?php echo $l['nama_kategori']  ?></p>
                    </div>
                    ?php }} ?>
                </div>
            </div>
        </div> -->

        <div class="section">
            <div class="content">
                <div class="box">
                    <?php
                        $product = mysqli_query($db, "SELECT * FROM fmb ORDER BY id_tas DESC");
                        if(mysqli_num_rows($product) > 0){
                            while($p= mysqli_fetch_array($product)){
                    ?>
                        <a href="product.php?id_tas=<?php echo $p['id_tas']?>">
                            <div class="col_4">
                                <img src="Gambar/<?php echo $p['gambar'] ?>" width="10%">
                                <p class="nama"><?php echo $p['merk_tas'] ?></p>
                                <p class="harga"><?php echo $p['harga'] ?></p>
                            </div>
                        </a>
                    <?php }}else{ ?>
                        <p>Produk tidak ada</p>
                    <?php } ?>
                </div>
            </div>
        </div>
        <?php } ?>
    </div>
    <footer>
        Copyright &copy; 2022
        Designed by Agustina Dwi Maharani
    </footer>
</body>

</html>
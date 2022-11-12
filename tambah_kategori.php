<?php
   session_start();
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
<html lang = "en" dir = "ltr">
    <head>
        <meta charset = "utf-8">
        <meta name = "viewport" content = "width=device-width, initial-scale=1.0">
        <title>Feel My Bag</title>
        <link rel = "stylesheet" href = "style_kategori.css">
    </head>

    <body>
    <div class="wrapper">
        <div class="header">
            <h1 id="FMBW">Feel My Bag</h1>
        </div>
    <div class="menu">
            <li><a href="halaman_admin.php">home</a></li>
            <li><a href="product.php">product</a></li>
            <li><a href="kategori.php">Data Kategori</a></li>
            <li><a href="hasil.html">Data Product</a></li>
    </div>
    </div>
    <div class="section">
        <div class="container">
        <a href="kategori.php" style="padding:0.4% 0.8%; background-color:#009900;color:#fff;border-radius:2px;text-decoration:none;">Tambah Data Kategori Feel My Bag</a><br>
            <h2>Tambah Data Kategori</h2>
            <div class="box">
                <form action="" method="POST" enctype = "multipart/form-data">
                    <table>
                        <tr>   
                            <td>Nama Kategori</td>
                            <td><input type="text" name="nama_kategori" placeholder="Nama Kategori" class="input_control" required></td>
                        </tr>
                        <tr>   
                        <br>
                            <td><button type="submit" name="submit" value="submit">Submit </button></td>
                </table>
            </div>
        </div>
    </div>
    </form>
    </body>
</html>

<?php

    date_default_timezone_set("Asia/Singapore");
    
    require 'koneksi.php';

    if(isset($_POST['submit']))
    {
        $nama = $_POST['nama_kategori'];

        $insert = mysqli_query($db, "INSERT INTO kategori VALUES (null, '".$nama."')");

        if($insert){
            echo "
                <script>
                    alert('Data Berhasil Ditambahkan');
                    document.location.href = 'kategori.php';
                </script>";  
        }else {
            echo "
                <script>
                    alert('Data Gagal Ditambahkan');
                </script>";
        }
    }
?>
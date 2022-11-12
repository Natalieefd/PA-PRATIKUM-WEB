<!DOCTYPE html>
<html lang="en">
<head>
    <title>Formulir</title>
    <link rel ="stylesheet"  href = "data.css">
</head>
<body>
    <div class="container">
        <div class="content-box">
            <div class="title">
                <h1 id = "tambah">Tambah Pendataan</h1>
                
                <script>
                    document.getElementById("tambah").addEventListener("mouseenter", mouseEnter);
                    document.getElementById("tambah").addEventListener("mouseleave", mouseLeave);

                    function mouseEnter(){
                        document.getElementById("tambah").style.color="green";
                    }

                    function mouseLeave(){
                        document.getElementById("tambah").style.color = "black";
                    }
                </script>
            </div>
        <div class="menuu">
            <li><a href="halaman_user.php">home</a></li>
            <li><a href="product.html">product</a></li>
            <li><a href="aboutus.html">keranjang</a></li>
            <li><a href="aboutus.html">about us</a></li>
        </div>
            <div class = "content-box1">
            <div class="box">
                <form action="" method="post" enctype = "multipart/form-data">
                    <label for="">Masukkan warna tas: </label><br>
                    <input type="text" name="warna" placeholder = "Black" ><br><br>
                    <label for="">Masukkan harga tas: </label><br>
                    <input type="number" name="harga" placeholder = "23000"><br><br>
                    <label for="">Masukkan jumlah tas: </label><br>
                    <input type="text" name="jumlah" placeholder ="1"><br><br>
                    <input type="submit" name="Send">
                </form>
            </div>
        </div>
        </div>
    </div>
    <div class = "outer-footer">
        Copyright &copy; 2022 Desgin by Feel My Bag
    </div>

<?php
    date_default_timezone_set("Asia/Singapore");

    require 'koneksi.php';

    if(isset($_POST['Send'])){
        $warna = $_POST['warna'];
        $harga= $_POST['harga'];
        $jumlah = $_POST['jumlah'];

        $result = mysqli_query($db, 
        "INSERT INTO tas_order (warna, harga, jumlah) 
        VALUES ('$warna','$harga','$jumlah')");

        if($result){
            echo "
                <script>
                    alert('Data Berhasil Dikirim');
                    document.location.href='tampil.php'
                </script>
            ";
        }else {
            echo "
                <script>
                    alert('Data Gagal Dikirim');
                </script>
            ";
        }
    }
?>
</body>
</html>
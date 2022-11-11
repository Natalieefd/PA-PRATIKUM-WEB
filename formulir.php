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
                <h1>Tambah Pendataan</h1>
            </div>
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
    <div class = "outer-footer">
        Copyright &copy; 2022 Desgin by SherinaLaraswati
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
                    document.location.href='index.php'
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
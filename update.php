<?php

    require 'koneksi.php';

    if(isset($_GET['id_order'])){
        $id_order = $_GET['id_order'];
    }

    $result = mysqli_query($db, 
        "SELECT * FROM tas_order WHERE id_order='$id_order'");
    $row = mysqli_fetch_array($result);

    if(isset($_POST['Send'])){

        $warna = $_POST['warna'];
        $harga= $_POST['harga'];
        $jumlah = $_POST['jumlah'];
        
        $result = mysqli_query($db, 
        "UPDATE tas_order SET 
            warna='$warna',
            harga=$harga,
            jumlah=$jumlah
        WHERE id_order =$id_order;");

        if($result){
            echo "
                <script>
                    alert('Data Berhasil di Update');
                    document.location.href = 'tampil.php';
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
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel ="stylesheet"  href = "data.css">
    <title>Update Data</title>
</head>
<body>
    <div class="container">
        <div class="content-box">
            <div class="title">
                <h3>Edit Data Tas</h3>
            </div>
            <div class="box">
                <form action="" method="post">
                    <label for="">Masukkan warna tas: </label><br>
                    <input type="text" name="warna" value=<?=$row['warna']?>><br><br>
                    <label for="">Masukkan harga tas: </label><br>
                    <input type="number" name="harga" value=<?=$row['harga']?>><br><br>
                    <label for="">Masukkan jumlah tas: </label><br>
                    <input type="text" name="jumlah" value=<?=$row['jumlah']?>><br><br>
                    <input type="submit" name="Send">
                </form>
            </div>
        </div>
    </div>
    <div class = "outer-footer">
        Copyright &copy; 2022 Desgin by Feel My Bag Team
    </div>
</body>
</html>
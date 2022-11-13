<?php
    require 'koneksi.php';

    if(isset($_GET['buy'])){
        $buy = $_GET['$buy'];
        $id_tas = $_GET['id_tas'];

        $product = mysqli_query($db, "SELECT * FROM fmb WHERE jumlah_tas > 0");
        if(mysqli_num_rows($product) > 0){
            while($p= mysqli_fetch_array($product)){
                $merk_tas = $p['merk_tas'];
                $warna = $p['warna'];
                $harga = $p['harga'];
                $jumlah = $p['jumlah_tas'];

                $query = mysqli_query($db, "SELECT * FROM tas_order(id_tas, merk_tas, warna, harga, jumlah)
                                        VALUES('$id_tas', '$merk_tas', '$warna', '$harga', '$jumlah')");
            }
            echo "<script>
               document.location.href = 'struk.php');
            </script>";
        }
    }
?>
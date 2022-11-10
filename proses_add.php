<!-- buat add cart -->
<?php
    require 'koneksi.php';
    $id_tas = $_GET["id_tas"];

    $query = $db->query("SELECT * FROM produk WHERE id_tas ='$id_tas'");
    $sql = mysqli_fetch_object($query);

    $_SESSION[$id_tas] = ["merk" => $sql->merk_tas];

    header("location:keranjang.php");
?>
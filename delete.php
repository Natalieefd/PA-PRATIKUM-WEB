<?php 

require 'koneksi.php';

if(isset($_GET['id_order'])){
    $id_order = $_GET['id_order'];

    $result = mysqli_query($db, 
        "DELETE FROM tas_order WHERE id_order='$id_order'");

    if($result){
        header("Location:tampil.php");
    }
}
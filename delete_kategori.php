<?php 

require 'koneksi.php';

if(isset($_GET['id_kategori'])){
    $id_kategori = $_GET['id_kategori'];

    $delete = mysqli_query($db,
                  "SELECT * FROM kategori WHERE id_kategori = '$id_kategori'");
    $row = mysqli_fetch_array($delete);

    $result = mysqli_query($db, 
        "DELETE FROM kategori WHERE id_kategori='$id_kategori'");

    if($result){
        echo "
            <script>
                alert('Data Berhasil Dihapus');
                document.location.href = 'kategori.php';
            </script>
        ";
    }else {
        echo "
            <script>
                alert('Data Gagal Dihapus');
            </script>
        ";
    }
}
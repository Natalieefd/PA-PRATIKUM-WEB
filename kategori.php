<?php
   session_start();
   include 'koneksi.php';
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
    <link rel="stylesheet" href="style_kategori.css" />
    <title>Feel My Bag</title>
</head>

<body>
<div class="container">
    <div class="section">
        <h3>Kategori</h3>
        <div class="box">
            <p><a href="tambah_kategori.php" style="padding:0.4% 0.8%; background-color:#009900;color:#fff;border-radius:2px;text-decoration:none;">Tambah Data</a></p>
            <form class="search" action="" method="get">
                <label for="search"></label>
                <input type="text" name="search">
            </form>
            <table border="1" cellspacing="0" class="table">
                <thead>
                    
                    <tr>
                        <th width="60px";>No</th>
                        <th>Kategori</th>
                        <th width="100px">Opsi</th>
                        <th width="100px">Opsi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $id_kategori = 1;
                        $kategori = mysqli_query($db, "SELECT * FROM kategori ORDER BY id_kategori DESC");
                        while($row = mysqli_fetch_array($kategori)){
                    ?>
                    <tr>
                        <td><center><?=$id_kategori; ?></center></td>
                        <td><center><?=$row['nama_kategori']?></center></td>
                        <td><center><a class = "" a href="edit_kategori.php?id_kategori=<?=$row['id_kategori']?>">Edit</i></a></center></td>
                        <td><center><a class = "" a href="delete_kategori.php?id_kategori=<?=$row['id_kategori']?>" onclick="return confirm('Yakin ingin hapus?')">Hapus</a></center></td>
                    </tr>
                    <?php $id_kategori++;} ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
    <footer>
        Copyright &copy; 2022
        Designed by Agustina Dwi Maharani
    </footer>
    </div>
    </header>
</body>

</html>
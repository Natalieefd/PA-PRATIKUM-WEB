<?php
 
    require 'koneksi.php';

    $result = mysqli_query($db, "SELECT * FROM tas_order");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Hasil Pendataan</title>
    <link rel="icon" href="logo.ico" type="image/x-icon">
    <link rel ="stylesheet"  href = "data.css">
</head>
<body>
    <div class="wrapper">
        <div class="header">
            <h1 id="FMBW">Feel My Bag</h1>
        </div>
        <div class="menu">
            <li><a href="index.html">home</a></li>
            <li><a href="product.html">product</a></li>
            <li><a href="aboutus.html">keranjang</a></li>
            <li><a href="aboutus.html">about us</a></li>
            <li><a href="logout.php">Logout</a></li>
        </div>
    </div>
    <div class="container">
        <div class="content">
            <div class="box">
                <div class="add"><a href="formulir.php">Tambah Data</a><br></div>
                <table border='1'>
                    <tr><br>
                        <th>No</th>
                        <th>id order</th>
                        <th>Warna tas</th>
                        <th>Harga tas</th>
                        <th>Jumlah tas</th>

                        <th colspan='2'>action</th>
                    </tr>
                    <?php 
                        $i = 1;
                        while($row = mysqli_fetch_array($result)){
                    ?>
                    <tr>
                        <td><?=$i; ?></td>
                        <td><?=$row['id_order']?></td>
                        <td><?=$row['warna']?></td>
                        <td><?=$row['harga']?></td>
                        <td><?=$row['jumlah']?></td>

                        <td class="edit"><a href="update.php?id_order=<?=$row['id_order']?>"> Update </a></td>
                        <td class="del"><a href="delete.php?id_order=<?=$row['id_order']?>">Delete</a></td>
                    </tr>
                        <?php 
                        $i++;
                            }
                        ?>
                </table>
            </div>
        </div>
    </div>
                
    <div class = "outer-footer">
        Copyright &copy; 2022 Desgin by SherinaLaraswati
    </div>
</body>
</html>
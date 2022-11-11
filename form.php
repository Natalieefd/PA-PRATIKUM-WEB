<?php

    date_default_timezone_set("Asia/Singapore");
    
    require 'koneksi.php';

    if(isset($_POST['submit']))
    {
        $id_kategori = $_POST['kategori'];
        $nama = $_POST['merk_tas'];
        $deskripsi_tas = $_POST['deskripsi_tas'];
        $warna = $_POST['warna'];
        $stok = $_POST['jumlah_tas'];
        $tanggal_stok = date("d-m-y H:i:s a");
        $harga = $_POST['harga'];

        $gambar = $_FILES['gambar']['name'];
        $x = explode('.', $gambar);
        
        $ekstensi = strtolower(end($x));
        $gambar_baru = "$nama.$ekstensi";

        $tmp = $_FILES['gambar']['tmp_name'];
        
        if(move_uploaded_file($tmp, "Gambar/".$gambar_baru))
        {
            $query =  "INSERT INTO fmb (gambar, id_kategori, merk_tas, deskripsi_tas, warna, jumlah_tas, tanggal_stok, harga) 
                       VALUES ('$gambar_baru', '$id_kategori', '$nama', '$deskripsi_tas', '$warna', '$stok', '$tanggal_stok','$harga')";
            $result = $db->query($query);

            if($result){
                echo "
                    <script>
                        alert('Data Berhasil Ditambahkan');
                        document.location.href = 'hasil.php';
                    </script>";
            }else {
                echo "
                    <script>
                        alert('Data Gagal Ditambahkan');
                    </script>";
            }
        }
    }
?>

<!DOCTYPE html>
<html lang = "en" dir = "ltr">
<head>
    <meta charset = "utf-8">
    <meta name = "viewport" content = "width=device-width, initial-scale=1.0">
    <title>Feel My Bag</title>
    <link rel = "stylesheet" href = "style_form.css">
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
            <li><a href="logout.php">LOGOUT</a></li>
        </div>
    </div>
        <div class="container">
            <h2>Tambah Data Produk Feel My Bag</h2>
            <div class="form_fmb">
            <a href="hasil.php" style="padding:0.4% 0.8%; background-color:#009900;color:#fff;border-radius:2px;text-decoration:none;">Data Feel My Bag</a><br>
            <form action="" method="POST" enctype = "multipart/form-data">
                <table style="text-align:center;widht:100%;background-color:#f2d6f2">
                    <!-- <tr>   
                        <td>id</td>
                        <td><input type="text" name="id_tas" placeholder="id" required></td>
                    </tr> -->
                    <tr>
                        <td>Kategori</td>
                        <td>
                            <select name="kategori" required>
                                <option value="">--Pilih--</option>
                                <?php
                                    $kategori = mysqli_query($db, "SELECT * FROM kategori ORDER BY id_kategori DESC");
                                    while($r = mysqli_fetch_array($kategori)){
                                ?>
                                <option value="<?php echo $r['id_kategori']?>"> <?php echo $r['nama_kategori']?></option>
                                <?php } ?>
                            </select>
                        </td>
                    </tr>
                    <!-- <tr>   
                        <td>ID Kategori</td>
                        <td><input type="text" name="id_kategori" placeholder="Id Kategori" required></td>
                    </tr> -->
                    <tr>   
                        <td>Merk Tas</td>
                        <td><input type="text" name="merk_tas" placeholder="Merk Tas" required></td>
                    </tr>
                    <tr>
                    <td>Deskripsi Tas</td>
                        <td><input type="text" name="deskripsi_tas" placeholder="Deskripsi Tas" required></td>   
                    </tr>
                    <tr>   
                        <td>Warna</td>
                        <td><input type="text" name="warna" placeholder="Warna" required></td>
                    </tr>
                    <tr>
                        <td>Jumlah Stok</td>
                        <td><input type="number" name="jumlah_tas" placeholder="Jumlah Stok" required></td>
                    </tr>
                    <tr>
                        <td>Tanggal Produksi</td>
                        <td><input type="date" name="tanggal_stok" required ></td>
                    </tr>
                    <tr>
                        <td>Harga</td>
                        <td><input type="number" name="harga" placeholder="Harga" required></td>
                    </tr>
                    <tr>
                        <td>Gambar</td>
                        <td><input type="file" name="gambar" required ></td>
                    </tr>
                    <br>
                        <td><button type="submit" name="submit" value="submit">Submit </button></td>
                </table>
            </form>
        </div>
</body>
</html>
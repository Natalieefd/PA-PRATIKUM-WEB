<?php

    date_default_timezone_set("Asia/Singapore");

    require  'koneksi.php';

    // Menangkap id dari url yang dikirimkan
    if(isset($_GET['id_tas'])){
        $id_tas = $_GET['id_tas'];
    }

    // Tampilkan value inputan dari id
    $result = mysqli_query($db, 
        "SELECT * FROM fmb WHERE id_tas ='$id_tas'" );
    $row = mysqli_fetch_array($result);

    if(isset($_POST['submit']))
    {
        $id_kategori = $_POST['id_kategori'];
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
            $query =    "UPDATE fmb SET 
                            gambar='$gambar_baru',
                            id_kategori='$id_kategori',
                            merk_tas='$nama',
                            deskripsi_tas='$deskripsi_tas',
                            warna='$warna', 
                            jumlah_tas='$stok',
                            tanggal_stok='$tanggal_stok',
                            harga='$harga'
                        WHERE id_tas='$id_tas'";
            $result = $db->query($query);
    
            if($result)
            {
                echo "
                    <script>
                        alert('Data Berhasil Diperbarui');
                        document.location.href = 'hasil.php';
                    </script>
                ";
            }else
            {
                echo "
                    <script>
                        alert('Data Gagal Diinput');
                    </script>
                ";
            }
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="style.2.css" />
    <title>Form Edit data</title>
</head>
<body>
    <h2>Edit Produk Feel My Bag</h2><br>
    <div class="box_login">
    <a href="hasil.php" style="padding:0.4% 0.8%; background-color:#009900;color:#fff;border-radius:2px;text-decoration:none;">Data Feel My Bag</a><br>
    <form action="" method="POST" enctype = "multipart/form-data">
        <table style="text-align:center;widht:100%;background-color:#f2d6f2">
            <tr>
                <td>
                    <select name="kategori" required>
                         <option value="">--Pilih--</option>
                         <?php
                            $kategori = mysqli_query($db, "SELECT * FROM kategori ORDER BY id_kategori DESC");
                            while($r = mysqli_fetch_array($kategori)){
                         ?>
                         <option value="<?php echo $r['id_kategori']?>"><?php echo $r['nama_kategori']?></option>
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
    </div>
    </form>
    </body>
</html>
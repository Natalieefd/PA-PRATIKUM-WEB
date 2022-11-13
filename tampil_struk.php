<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="tampil_struk.css">
    <link rel="icon" href="logo.ico" type="image/x-icon">
    <title>Feel My Bag</title>
</head>
<body>
    <div class="wrapper">
        <div class="header">
            <h1 id="FMBW">Feel My Bag</h1>
        </div>
        <div class="menu">
            <li><a href="index.php">home</a></li>
            <li><a href="product.php">product</a></li>
            <li><a href="keranjang.php">keranjang</a></li>
            <li><a href="aboutus.html">about us</a></li>
        </div>
    </div>
    
    <div class="container">
        <div class="content">
            <div class="struk">
                <?php
                    require 'koneksi.php';
                    // if(isset($_POST['buy'])){
                    //     $tanggal_order = date("Y-m-d H:i:s a");
                    //     $nama_pembeli = $_POST['nama_pembeli'];
                    //     $no_telp = $_POST['no_telp'];
                    //     $alamat = $_POST['alamat'];
                    //     $merk_tas = $_POST['merk_tas'];
                    //     $warna = $_POST['warna'];
                    //     $jumlah_tas = $_POST['jumlah_tas'];
                    //     $harga = $_POST['harga'];
                    //     $harga_total = $_POST['harga_total'];


                    //     $sql = $db->query("INSERT INTO struk(tanggal_order, nama_pembeli, no_telp, alamat, merk_tas, warna, jumlah_tas, harga, harga_total)
                    //             VALUES($tanggal_order, $nama_pembeli, $alamat, $merk_tas, $warna, $jumlah_tas, $harga, $harga_total)");
                        // if($sql){
                    
                    $query = $db->query("SELECT merk_tas, warna, jumlah, harga, nama_customer, alamat_customer, no_telp FROM tas_order
                                        INNER JOIN data_cust ON tas_order.id_pengguna = data_cust.id_pengguna
                                        INNER JOIN fmb ON tas_order.id_tas = fmb.id_tas");
                    $i = 1;
                    while($row = mysqli_fetch_array($query)){
                ?>
                <tr>
                    <h2>struk pembelian</h2>
                    <div></div>
                    <th class="text"><b>Tanggal Order</b></th><br>
                    <td><?=$row['tanggal_order']?></td>
                    <div></div>
                    <th class="text"><b>Nama Pembeli</b></th><br>
                    <td><?=$row['nama_customer']?></td>
                    <div></div>
                    <th class="text"><b>Nomor Telephon</b></th><br>
                    <td><?=$row['no_telp']?></td>
                    <div></div>
                    <th class="text"><b>Alamat</b></th><br>
                    <td><?=$row['alamat_customer']?></td>
                    <div></div>
                    <th class="text"><b>Merk Tas</b></th><br>
                    <td><?=$row['merk_tas']?></td>
                    <div></div>
                    <th class="text"><b>Warna</b></th><br><br>
                    <td><?=$row['warna']?></td>
                    <div></div>
                    <th class="text"><b>Jumlah Barang</b></th><br>
                    <td><?=$row['jumlah_tas']?></td>
                    <div></div>
                    <th class="text"><b>Harga Satuan</b></th><br><br>
                    <td><?=$row['harga']?></td>
                    <div></div>
                    <th class="text"><b>Total Harga</b></th><br><br>
                    <!-- ?php
                        foreach($_SESSION['buy'] as $buy => $jum){
                            $subtotal = $jum['harga'] * $jum['jumlah_tas'];
                            $sql = $db->query("INSERT INTO struk(total_harga) VALUES($subtotal)");
                    ?> -->
                    <td><?=$row['total_harga']?></td>
                    <div></div>
                </tr>
            </div>
            <?php
                $i++;}
            ?>
        </div>
    </div>
    <div class="footer">
        Copyright &copy; 2022 Designed by Feel My Bag Team
    </div>
</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel ="stylesheet"  href = "Pendataan.css">
</head>
<body>
    <b>Registrasi akun</b>
    <form action="" method="post">

        <label for="email">Email</label><br>
        <input type="text" name="email" id = "email" placeholder ="sey@gmail.com" required><br><br>

        <label for="nama">Nama</label><br>
        <input type="text" name="nama" id = "nama" placeholder ="Seyina Humaira" required ><br><br>

        <label for="username">username</label><br>
        <input type="text" name="username" id = "username" placeholder ="Seysey"required ><br><br>

        <label for="password">password</label><br>
        <input type="password" name="password" id = "password" placeholder ="***" required><br><br>

        <label for="konfirmasi">konfirmasi password</label><br>
        <input type="password" name="konfirmasi" id = "password" placeholder ="***"required><br><br>

        <input type="submit" name="register" id = "register">

    </form> 
</body>
</html>

<?php
require 'koneksi.php';

if(isset($_POST['register'])){
    $id_pengguna = $_POST['id_pengguna'];
    $email = $_POST['email'];
    $nama = $_POST['nama'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $konfirmasi = $_POST['konfirmasi'];

    // cek konfirmasi psw
    if($password === $konfirmasi){
        $password = password_hash($password, PASSWORD_DEFAULT);
        $result= mysqli_query($db, "SELECT username from pengguna WHERE username = '$username'");
        if(mysqli_fetch_assoc($result)){
            echo "<script>
                alert('Konfirmasi password anda salah');
                documen.location.href = 'customer.php';
                </script>";
        }else{
            $query = "INSERT INTO pengguna (email, nama, username, psw ) VALUES ('$email', '$nama', '$username', '$password')";
            $result = $db -> query($query);
            if(mysqli_affected_rows($db) > 0){
                echo "<script>
                    alert('Registrasi telah berhasil');
                    document.location.href = 'index.php'
                    </script>";
            }else{
                echo "<script>
                alert('Registrasi gagal);
                document.location.href = 'signup.php'
                </script>";
            }     
        }
    }else{
        echo "<script>
            alert('Registrasi telah berhasil');
            document.location.href = 'customer.php'
            </script>";
    }
}
?>
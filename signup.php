<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="icon" href="logo.ico" type="image/x-icon">
    <title>Document</title>
    <link rel ="stylesheet"  href="style_signup.css">
</head>
<body>
    <div class="container">
        <div class="title">
            <h1>sign up feel my bag</h1>
        </div>
        <div class="content-box">
            <div class="box-login">
                <form method="POST" action="">
                    <div class="nm">
                        <label for="nama">Masukkan Nama</label><br><br>
                        <input type="text" name="nama" id="nama" placeholder="nama lengkap"required><br><br>
                    </div>
                    <div class="eml"><br>
                        <label for="email">Masukkan Email</label><br><br>
                        <input type="text" name="email" id="email" placeholder="username@gmail.com"required><br><br>
                    </div>
                    <div class="usern"><br>
                        <label for="username">Masukkan Username</label><br><br>
                        <input type="text" name="username" id="username" placeholder="username"required><br><br>
                    </div>
                    <div class="pass"><br>
                        <label>Masukkan Password</label><br><br>
                        <input name="password" type="password" placeholder="password"required><br><br>
                    </div>
                    <div class="kpsw"><br>
                        <label for="konfirmasi">Konfirmasi Password</label><br><br>
                        <input type="password" name="konfirmasi" id="password" placeholder="konfirmasi password"required><br><br>
                    </div>
                    <div><br>
                        <p>sudah mempunyai akun? <a href="index.php">Log In</a></p>
                    </div>
                    <div class="smb"><br>
                        <input type="submit" name="register" id = "register">
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class = "outer-footer">
        Copyright &copy; 2022 Desgin by Feel My Bag Team
    </div>
    </div>
    
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
        $result = mysqli_query($db, "SELECT username from pengguna WHERE username = '$username'");
        if(mysqli_fetch_assoc($result)){
            echo "<script>
                alert('Konfirmasi password anda salah');
                documen.location.href = 'index.php';
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

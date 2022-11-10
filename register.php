<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style4.css" />
    <title>Registrasi</title>
</head>
<body>
<body id="bg_login">
    <div class="box_login">
    <h1>Regsitrasi Akun</h1>
    <form action="" method="post">

        <label for="">Email</label><br>
        <input type="text" name="email"  class="form_login" required><br>
    
        <label for="">Username</label><br>
        <input type="text" name="username"  class="form_login" required><br>

        <label for="">Password</label><br>
        <input type="password" name="password"  class="form_login" required><br>

        <label for="">Konfirmasi Password</label><br>
        <input type="password" name="konfirmasi"  class="form_login" required><br>

        <input type="submit" name="regis" class="tombol_login" value="Registrasi">
    </form>

    <p>Sudah punya akun?
        <a href="login_pengguna.php">Login</a>
    </p>
    </div>
</body>
</html>

<?php 
    require 'koneksi.php';
    if(isset($_POST['regis'])){
        $email = $_POST['email'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        $konfirmasi = $_POST['konfirmasi'];

        // cek username telah digunakan atau belum
        $user = $db->query("SELECT * FROM pengguna WHERE username='$username'");

        if(mysqli_num_rows($user) > 0){
            echo "<script>
                    alert('Username telah digunakan, silahkan gunakan username lain');
                </script>";
        }else{

            // konfirmasi password udah bener atau belum?
            if($password == $konfirmasi){

                $password = password_hash($password, PASSWORD_DEFAULT);

                $query = "INSERT INTO pengguna (email,username,psw)
                            VALUES ('$email','$username','$password')";
                $result = $db->query($query);

                if($result){
                    echo "<script>
                            alert('Registrasi Berhasil');
                        </script>";
                }else{
                    echo "<script>
                            alert('Registrasi Gagal');
                        </script>";
                }
            }else{
                echo "<script>
                            alert('Konfirmasi password salah!');
                        </script>";
            }
        }
    }

?>
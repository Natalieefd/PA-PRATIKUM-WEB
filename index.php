<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel ="stylesheet"  href = "pendataan.css">
    <title>Feel My Bag</title>
</head>
<body>
    <div class="container">
        <div class="title">
            <h1>login feel my bag</h1>
        </div>
        <div class="content-box">
            <div class="box-login">
                <form method="POST" action="">
                    <div class="usn">
                        <label>Masukkan username</label><br><br>
                        <input name="username" type="text" placeholder="username">
                    </div>
                    <div class="psw"><br>
                        <label>Masukkan password</label><br><br>
                        <input name="password" type="password" placeholder="password">
                    </div class="link"><br>
                    <p>belum mempunyai akun? <a href="signup.php">Regis</a></p>

                    <div class="smb"><br>
                        <input type="submit" name="registrasi" value="Submit">
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class = "outer-footer">
        Copyright &copy; 2022 Desgin by Feel My Bag Team
    </div>
</body>
</html>

<?php
    require 'koneksi.php';

    if(isset($_POST['registrasi'])){
        $username = $_POST['username'];
        $password = $_POST['password'];
        $result = mysqli_query($db, "SELECT * from pengguna WHERE username = '$username'");
        if(mysqli_num_rows($result) === 1){
            $row = mysqli_fetch_assoc($result);
            if(password_verify($password, $row['psw'])){
                $_SESSION['registrasi'] = true;
                echo "<script>
                        alert('Login Berhasil')
                        document.location.href ='halaman_user.php'
                    </script>";
            }else{
                echo "<script>
                    alert(' PASSWORD SALAH ... !! ');
                </script> ";
            }

        }else{
            echo "<script>
                    alert(' USERNAME TIDAK TERDAFTAR..!! ');
                </script>";
        }
    }
?>
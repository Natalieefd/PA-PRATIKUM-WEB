<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel ="stylesheet"  href = "Pendataan.css">
    <title>Login Admin</title>
</head>
<body>
    <div class="container">
        <div class="content-box">
            <div class="title">
                <h1 id = "title" ><b>login customer feel my bag</b></h2>
                <script>
                    document.getElementById("title").addEventListener("mouseenter", mouseEnter);
                    document.getElementById("title").addEventListener("mouseleave", mouseLeave);

                    function mouseEnter(){
                        document.getElementById("title").style.color="blue";
                    }

                    function mouseLeave(){
                        document.getElementById("title").style.color = "black";
                    }
                </script>
            </div>
            <div class="box">
                <form method="POST" action="">
                    <div>
                        <label>Masukkan username anda: </label><br>
                        <input name = "username" type = "text" placeholder ="username">
                    </div>
                    <div><br>
                        <label>Masukkan password: </label><br>
                        <input name ="password" type = "password" placeholder ="password">
                    </div>
                    <p><a href="signup.php">Regis</a> jika belum mempunyai akun</p>

                    <div><br>
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

    session_start();
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
                echo "
                <script>
                    alert(' PASSWORD SALAH ... !! ');
                </script> ";
            }

        }else{
            echo "
                <script>
                    alert(' USERNAME TIDAK TERDAFTAR..!! ');
                </script>
            ";
        }
    }
    

 ?>
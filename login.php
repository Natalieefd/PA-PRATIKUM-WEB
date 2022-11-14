<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style4.css">
    <title>Login Admin</title>
</head>
<body>
<body id="bg_login">
    <div class="box_login">
    <h1>Login</h1>
    <form action="" method="post">
        <input type="text" name="username" class="form_login" placeholder="Username" required="" >
        <input type="password" name="password" class="form_login" placeholder="Password" required="">
        <input type="submit" name="login"  class="tombol_login" value="LOGIN">
    </form>
    </div>
</body>
</html>

<?php   
    session_start();
    require 'koneksi.php';

    if(isset($_POST['login'])){
        $user = $_POST['username'];
        $password = $_POST['password'];

        $query = "SELECT * FROM akun
                WHERE username='$user'";
        $result = $db->query($query);
        $row = mysqli_fetch_array($result);
        if($row){
            $username = $row['username'];
            
            if(password_verify($password, $row['psw'])){
            
                $_SESSION['login'] = $username;

                echo "<script>
                        alert('Selamat Datang $username');
                        document.location.href = 'halaman_admin.php';
                    </script>";
                }
        }

        echo "<script>
                alert('Username dan password salah');
                </script>";
    }
?>

<?php
   session_start();
   if(!isset($_SESSION['login'])){
       echo "<script>
               alert('Akses ditolak, silahkan login dulu');
               document.location.href = 'login.php';
           </script>";
   }else{
       $username = $_SESSION['login'];
   }

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="style1.css">
    <link rel="icon" href="logo.ico" type="image/x-icon">
    <title>Feel My Bag</title>
</head>

<body>
    <div class="wrapper">
        <div class="header">
            <h1 id="FMBW">Feel My Bag</h1>
        </div>
        <div class="menu">
            <li><a href="product_admin.php">Product</a></li>
            <li><a href="hasil.php">Data Produk</a></li>
            <li><a href="kategori.php">Data kategori</a></li>
            <li><a href="about_us_admin.php">About Us</a></li>
            <li><a href="logout.php">LOGOUT</a></li>
        </div>
    </div>
    <div class="container">
    <img src="moon.png" id="icon">
        <div class="main-content">
            <div class="header_main">
                <div class="header_main_content">
                    <h1>Guess</h1>
                    <p>
                        Malia Convertible Crossbody Flap Bag
                    <ul>
                        <li>-Quilted convertible flap bag with monogram brand print</li>
                        <li>-Polyurethane</li>
                        <li>-Magnetic closure</li>
                        <li>-Lined interior</li>
                        <li>-1 exterior back zip pocket</li>
                        <li><b>Rp. 1.350.000</b></li>
                    </ul>
                    </p>
                    <button class="cta" onclick="return tidak_ada()">Buy Now </button>
                </div>
            </div>
            <img class="image" src="image4.png" alt="" width="100%">
        </div>
        <ul class="thumb">
            <li><img src="image4.1.png" onclick="imgSlinder('image4.1.png')"></li>
            <li><img src="image4.2.png" onclick="imgSlinder('image4.2.png')"></li>
            <li><img src="image4.png" onclick="imgSlinder('image4.png')"></li>
        </ul>
    </div>
    
    <div class="footer">
        <ul class="footer-sosmed">
            <ul class="footer-brand">
                <div class="brand">Feel My Bag</div>
            </ul>
            <ul class="footer-about1">
                <li><a href="https://www.facebook.com/"><i class="fa fa-facebook"></i> Facebook</a></li>
                <li><a href="https://twitter.com/"><i class="fa fa-twitter"></i> Twitter</a></li>
                <li><a href="#https://www.instagram.com/"><i class="fa fa-instagram"></i> Instagram</a></li>
            </ul>
        </ul>
    <div class="footer-c">
        Copyright &copy; 2022 Designed by Feel My Bag Team
    </div>
    </div>

    <script type="text/javascript">
        function imgSlinder(anything){
            document.querySelector('.image').src =anything;
        }
        var icon = document.getElementById("icon");
        icon.onclick = function () {
            document.body.classList.toggle("dark-theme");

            var x = document.getElementById("icon").src;
            var y = x.replace(/^.*[\\\/]/, ''); 

            if(y == "moon.png"){
                icon.src = "sun.png";
                document.getElementById("FMBW").style.color = "white";
            } else{
                icon.src = "moon.png";
                document.getElementById("FMBW").style.color = "black";
            };

        }

        function tidak_ada(){ 
            alert("Maaf Produk Belum launching");
        }

        function warna_nama(){
            document.getElementById("FMBW").style.color = "rgb(162, 127, 127)";
        }
    </script>
</body>
</html>

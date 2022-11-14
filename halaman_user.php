<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="style3.css" />
    <title>Feel My Bag</title>
</head>

<body>
    <section>
    
    <h1 id  = "nama">Feel My Bag</h1>
    <script>
        document.getElementById("nama").addEventListener("mouseenter", mouseEnter);
        document.getElementById("nama").addEventListener("mouseleave", mouseLeave);

        function mouseEnter(){
            document.getElementById("nama").style.color="pink";
        }

        function mouseLeave(){
            document.getElementById("nama").style.color = "black";
        }
    </script>
        <header class="container">
            <nav>
                <ul>
                    <li><a href="product.php">Product</a></li>
                    <li><a href="aboutus.html">About us</a></li>
                    <li><a href="index.php">Logout</a></li>
                </ul>
                <img src="moon.png" id="icon">
            </nav>
            <div class="header_main">
                <div class="header_main_content">
                    <h1 class="header_main_content">Guess</h1>
                    <p class="header_main_content">
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
                    <button class="cta">Buy Now</button>
                    <img src="image4.png" alt="" width="100%" class="header_main_content_img">
                </div>
                <ul class="thumb">
                    <li><img src="image4.1.png" onclick="imgSlinder('image4.1.png')"></li>
                    <li><img src="image4.2.png" onclick="imgSlinder('image4.2.png')"></li>
                    <li><img src="image4.png" onclick="imgSlinder('image4.png')"></li>
                </ul>
                <div class="sci">
                <ul>
                    <li><a href="#"><img src="facebook.png" alt=""></a></li>
                    <li><a href="#"><img src="twitter.png" alt=""></a></li>
                    <li><a href="#"><img src="instagram.png" alt=""></a></li>
                </ul>
            </div>
    </section>
    <script type="text/javascript">
        function imgSlinder(anything){
            document.querySelector('.header_main_content_img').src =anything;
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
        function warna_nama(){
            document.getElementById("FMBW").style.color = "rgb(162, 127, 127)";
        }
        </script>
    <footer>
        Copyright &copy; 2022
        Designed by Feel My Bag Team
    </footer>
    </div>
    </header>
</body>
</html>
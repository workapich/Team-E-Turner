<?php
session_start();
require_once 'config.php';
require_once 'functions_def.php';
// if (!isset($_SESSION['username']) OR !isset($_SESSION['id_user']) OR !is_int($_SESSION['id_user'])) {
//     redirection('index.php?l=0');
// }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
            crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <script src="js/script.js"></script>
    <link rel="stylesheet" href="./css/style.css">
    <title>Document</title>
    
</head> 
<body>
    <header>
    <a href="index.php"><img src="VladVorkPNG.png" alt="logo" class="logo" width="100px">
    </a>

        <nav>
            <ul class="nav__links">


                    <li><a href="index.php">Glavna</a></li>
                    <li><a href="products.php">Products</a></li>
                   
                    <?php
            if (isset($_SESSION['username']) OR isset($_SESSION['id_user'])) 
            {
                ?>
                <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"><?php echo $_SESSION['username']  ?></a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="acount.php">Change profile</a>
                    <a class="dropdown-item" href="previousOrder.php">Past Orders</a>
                    <a class="dropdown-item" href="favouriteWeb.php">Favourite</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="logout.php">Log out</a>
                </div>
            </li>
            <li><a href="cart.php">Cart</a></li>
<?php
 
            
            }
            else
            {
                ?>
                <li class="nav-item">
                <a class="nav-link" href="login.php">Login/register</a>
            </li>
            <?php
            }
?>
            
            
        </ul>
            
            <img src="menu.png" alt="meni"class="menu-btn">
        </nav> 
        

        <!-- <a href="#" class="cta"><button>Contact</button></a> -->
        <div></div>
    </header>
    
    <script>

        const menuBtn=document.querySelector('.menu-btn')
        const navlinks=document.querySelector('header')

        menuBtn.addEventListener('click',()=>{
            navlinks.classList.toggle('mobile-menu')
        })
    </script>
<div class="ispod_hedera">

    <div class="ispod_hedera-content">

        <h2 class="dva">THE BEST</h2>
        <div class="line"></div>
        <h1 class="dva">RESTAURANT</h1>
        <div class="line"></div>
        <h2 class="desna">IN SERBIA</h2>
    </div>
   
</div>

<section class ="events aq">
<div class="title">
    <h1>Search for your next meal</h1>
</div>


    <div class="col">

        <a href="products.php" class="cta"><button>Search</button></a>
    </div>

</section>


<section class ="events">
<div class="title">
    <h1>Our Selection</h1>
</div>

<div class="row">
    <div class="col">
        <img src="eggs1.jpg" alt="SLsIKA1" width="600px">
        <h4>PO DVA JAJETA</h4>
        <p>Kao jedno jaje samo dodaš još jedno</p>
        <a href="products.php" class="cta"><button>Buy</button></a>
    </div>

    <div class="col">
        <img src="meal1.jpg" alt="SLIKA1"width="600px">
        <h4>BIFTEK</h4>
        <p>Premium biftek rezan samo za vas</p>
        <a href="products.php" class="cta"><button>Buy</button></a>
    </div>
</div>
</section>


<footer>
<div class="row">
    <div class="col one">
        <p>This website will never give you up , never let you down , never run around and desert you... </p>
     <p><small>&copy; Copyright 2022, Vladimir Vorkapic</p>
    </div>
    <div class="col two">
     <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2013.754709576433!2d19.661837256978682!3d46.09485471767162!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x474366d1b03dbbc5%3A0xfbb187d5a85acad0!2sVisoka%20tehni%C4%8Dka%20%C5%A1kola%20strukovnih%20studija%20-%20Subotica!5e0!3m2!1sen!2srs!4v1674325061863!5m2!1sen!2srs" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>
</div>

    
</footer>


 

</body>
</html>
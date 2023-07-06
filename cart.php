<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script src="js/script7.js" async></script>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="style8.1.css"/>
    <title>Document</title>
    
</head> 
<?php 
session_start();
require_once 'db_config1.php';
require_once 'functions.php';


$cartDva = array();
$connect = new mysqli(HOST,USER,PASS,DATABASE);
if($connect -> connect_errno) {
    echo $connect -> connect__error;
}


$sql_str = "";


if (isset($sql_str)) {

   

    $sql = "SELECT firstname , lastname , phoneNum, adress from users where id_user = {$_SESSION['id_user']}";
    if ($result = $connect -> query($sql)) {
        while ($row = $result -> fetch_assoc()) {
            $_SESSION['firstname']=$row['firstname'];
            $_SESSION['lastname']=$row['lastname'];
            $_SESSION['phoneNum']=$row['phoneNum'];
            $_SESSION['adress']=$row['adress'];
           //sad uraditi da bude lokacija a ne dirstname
        }
        
    }
   
   
}

if (isset($sql_str)) {

    //SELECT * FROM `vozila` WHERE `id_vozila` = 1
    //

    $sql = "SELECT id_nadrudzbine , vozila.slika ,vozila.cena , vozila.model from narudzbine INNER JOIN vozila ON narudzbine.narudzbina = vozila.id_vozila where id_user = {$_SESSION['id_user']}";
    if ($result = $connect -> query($sql)) {
        while ($row = $result -> fetch_assoc()) {
            $products[] = $row;
        }
        
    }


    $sql = "SELECT firstname from users where id_user = {$_SESSION['id_user']}";
    if ($result = $connect -> query($sql)) {
        while ($row = $result -> fetch_assoc()) {
            $_SESSION['firstname'] = $row['firstname'];//sad uraditi da bude lokacija a ne dirstname
        }
        
    }
   
}
?>


<body>
<header><a href="index.php"><img src="VladVorkPNG.png" alt="logo" class="logo" width="100px">
    </a>
        <nav>
            <ul class="nav__links">
                <li><a href="index.php">Glavna</a></li>
                <li><a href="products.php">Products</a></li>
                <?php
            if (isset($_SESSION['username']) OR isset($_SESSION['id_user'])) 
            {
                ?>
                <li>
<div class="dropdown">
  <a onclick="myFunctionDropDown()" class="dropbtn"><?php echo $_SESSION['username']  ?></a>
  <div id="myDropdown" class="dropdown-content">
    <a href="acount.php">Change Profile</a>
    <a href="previousOrder.php">Past Orders</a>
    <a href="favouriteWeb.php">Favourite</a>
    <a href="logout.php">Log out</a>
  </div>
</div></li>
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
    
   




<section class ="events">


<div class="title">
    <?php
    if(empty($products))
    {

    ?>
    <h1>Prazna korpa</h1>
    <h1>Kupi Nešto :)</h1>
    <a href="products.php" class="cta"><button>Buy</button></a>
    <?php
    }
    else{
    ?>
    <h1>Vaša korpa</h1>
    <?php
    }
    ?>
</div>

           

            <?php
            $addNew=true;
            $ka=1;
            if(isset($products))
            {
               

                
      
        
    ?>   
  
            <div class="row">
                
            <?php
        
        
      
        if (!empty($products)) {  
            foreach ($products as $key => $value) {
                 $id=$value['id_nadrudzbine'];
                echo '<div class="col">
                    <img src="'.$value['slika'].'">
                    <div class="cart-quantity below">';
                    $quantity = 1;
                

                    echo "<button onclick=\"changeQuantity($id, -1);updateCart()\">-</button>";

                    // Display the quantity
                    echo "<span id=\"quantity-$id\"  class=\"cart-quantity1\">$quantity</span>";
                
                    // Button to increment quantity
                    echo "<button onclick=\"changeQuantity($id, 1) ;updateCart();\">+</button>";
                
                    echo "<br>";


                    echo '</div>
                    <div class="cart-price below">'.$value['cena'].' $</div>
                    <div class="model below">'.$value['model'].' </div>
                    
                  
                <button class="delete-button" data-product-id="'.$id.'">X</button>
                </div>';  
               
            }
        }
        else {
            echo '<div class="col">';
        }
    ?>
</div>
 
<?php
            
}

    ?>
               

               <script>



              
              
              </script>

</section>
<p id="one">Korpa:</p>
<p id="output"></p>

<p id="Two">Ukupno:</p>
<p class="total-number">
</p>

<script>
        var targetElement = document.querySelector('.col');

        if (targetElement !== null) {
        
           
            var button = document.createElement("button");

            button.innerText = "Poruči";
            button.id="insertButton"

        
            document.body.appendChild(button);
        }
        else

        {
           
            var elementThree = document.getElementById("one");
            elementThree.remove();
            var elementFour = document.getElementById("Two");
            elementFour.remove();
        }
    </script>

<script>
        $(document).ready(function() {
            $("#insertButton").click(function() {


                var defaultName = '<?php echo $_SESSION["adress"]; ?>';
var userInput = prompt('Potvrdi svoju adresu:',defaultName);
if (userInput !== null) {


      
    var inputElement = document.getElementById("output");
            var value = inputElement.innerHTML;
            console.log(value);
            var total = document.getElementsByClassName("total-number")[0];
            var totalValue = total.innerHTML;
            console.log(totalValue);
            console.log(userInput);
             
                // var data = {
                //     totalValue: totalValue,
                //     userInput:userInput,
                //     output:output
                // };

                $.ajax({
                    url: "insert.php",
                    type: "POST",
                    data: { value: value , userInput:userInput, totalValue:totalValue },
                    success: function(response) {
                        console.log(response);
                        // Handle success response
                    },
                    error: function(xhr, status, error) {
                        console.log(xhr.responseText);
                        // Handle error response
                    }
                });

                $.ajax({
            url: 'refresh.php',
            method: 'GET',
            success: function() {
              // Reload the page
              location.reload();
            }
          });
}
                // Get the values from the input fields
            
            });
        });
    </script>

<footer>
<div class="rosw">
    <div class="cola one">
        <p>This website will never give you up , never let you down , never run around and desert you... </p>
     <p><small>&copy; Copyright 2022, Vladimir Vorkapic</p>
    </div>
    <div class="cola two">
     <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2013.754709576433!2d19.661837256978682!3d46.09485471767162!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x474366d1b03dbbc5%3A0xfbb187d5a85acad0!2sVisoka%20tehni%C4%8Dka%20%C5%A1kola%20strukovnih%20studija%20-%20Subotica!5e0!3m2!1sen!2srs!4v1674325061863!5m2!1sen!2srs" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>
</div>

    
</footer>

<script>

        const menuBtn=document.querySelector('.menu-btn')
        const navlinks=document.querySelector('header')

        menuBtn.addEventListener('click',()=>{
            navlinks.classList.toggle('mobile-menu')
        })
    </script>


<script>
/* When the user clicks on the button, 
toggle between hiding and showing the dropdown content */
function myFunctionDropDown() {
  document.getElementById("myDropdown").classList.toggle("show");
}

// Close the dropdown if the user clicks outside of it
window.onclick = function(event) {
  if (!event.target.matches('.dropbtn')) {
    var dropdowns = document.getElementsByClassName("dropdown-content");
    var i;
    for (i = 0; i < dropdowns.length; i++) {
      var openDropdown = dropdowns[i];
      if (openDropdown.classList.contains('show')) {
        openDropdown.classList.remove('show');
      }
    }
  }
}
</script>
</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
   
   

    <link rel="stylesheet" href="style4.2.css"/>
  
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <title>Document</title>
    
</head> 

<?php 
session_start();
require_once 'db_config1.php';
require_once 'functions.php';
$vlada = getPosition();

$today = date("y.m.d");
$connect = new mysqli(HOST,USER,PASS,DATABASE);
if($connect -> connect_errno) {
    echo $connect -> connect__error;
}


$sql_str = "";
$whereDva="";
/*--SEARCH--*/



if (isset($_GET['search']) && !empty($_GET['search'])) {
    $search = $connect->real_escape_string($_GET['search']);
    $search_arr = explode(' ', $search);
    foreach ($search_arr as $key => $value) {
        if(mb_strlen($value) <= 2) {
            unset($search_arr[$key]); 
        }
    }
    if (isset($search_arr) && !empty($search_arr)) {
        $where = array();
        foreach ($search_arr as $key => $value) {
            $integer = intval($value);
            $where[] = "where datetime LIKE '$value'";
        }
       
        $sql_str .= implode(' OR ', $where);
    }
}


if($_SESSION['id_user']==9)

{
    
    if (isset($sql_str)) {
        
        $sql = "SELECT bought.id_bought, bought.id_user, users.firstname, bought.naziv_hrane, bought.ukupnaCena
        FROM bought
        INNER JOIN users ON bought.id_user = users.id_user ". $sql_str;
       
        // $sql = "SELECT id_nadrudzbine , vozila.slika ,vozila.cena , vozila.model from narudzbine INNER JOIN vozila ON narudzbine.narudzbina = vozila.id_vozila where id_user = {$_SESSION['id_user']}";
       
        if ($result = $connect -> query($sql)) {
            while ($row = $result -> fetch_assoc()) {
                $products[] = $row;
            }
            
        }
    }

}

else


{
    if (isset($sql_str)) {
        $sql = "SELECT id_bought,id_user ,naziv_hrane, ukupnaCena from bought where id_user = {$_SESSION['id_user']}";
       
        // $sql = "SELECT id_nadrudzbine , vozila.slika ,vozila.cena , vozila.model from narudzbine INNER JOIN vozila ON narudzbine.narudzbina = vozila.id_vozila where id_user = {$_SESSION['id_user']}";
       
        if ($result = $connect -> query($sql)) {
            while ($row = $result -> fetch_assoc()) {
                $products[] = $row;
            }
            
        }
    }

}




?>


<body>




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
    <h1>Your Past Meals</h1>
</div><?php

if($_SESSION['id_user']==9)
{
?>
<form class="product-search" method="get">
        <input type="date" id="start" name="search">
                <!-- //<input placeholder="Search" name="search" type="text">   -->
                <button type="submit">Go</button>
            </form> 
<?php
}
?>
           
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<!-- Use an element to toggle between a like/dislike icon -->


<script>
    function myFunction(x) {
  x.classList.toggle("fas");
}
</script>
        
<div class="row">
                <?php
        
        
      
                    if (!empty($products)) {  
                        foreach ($products as $key => $value) {
                            $id=$value['id_bought'];
                            echo ' <div class="col">';
                            
                             if (isset($value['firstname'])) 
                            { echo ' <p>'.$value['firstname'].'<p>';
                            }
                               echo '  <p>'.$value['naziv_hrane'].'<p>
                                <p>  '.$value['ukupnaCena'].'  $</p>
                               
                                ';
                                
                            echo ' </div>';
                          
                            
                        }
                    }
                    else {
                        // echo '<div class="col">';
                    }
                ?>
</div>
 
<?php
    

    
    ?>
               
</section>




 
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
    
   document.addEventListener("DOMContentLoaded", function() {
   // Get all the favorite buttons
   var favoriteButtons = document.querySelectorAll(".far.fa-heart.bottom-left");

   // Attach event listener to each favorite button
   favoriteButtons.forEach(function(button) {
      button.addEventListener("click", function() {
       console.log("sasa");
         var itemId = this.parentElement.getAttribute("data-item-id");

         // Send an AJAX request to the PHP script to handle the favorite action
         var xhr = new XMLHttpRequest();
         xhr.open("POST", "favorite.php", true);
         xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
         xhr.onreadystatechange = function() {
            if (xhr.readyState === 4 && xhr.status === 200) {
               // Handle the response from the PHP script if needed
               console.log(xhr.responseText);
            }
         };
         xhr.send("item_id=" + itemId);
      });
   });
});
    </script>
<script>
 
        const menuBtn=document.querySelector('.menu-btn')
        const navlinks=document.querySelector('header')

        menuBtn.addEventListener('click',()=>{
            navlinks.classList.toggle('mobile-menu')
        })


        


    </script>

    

</body>
</html>
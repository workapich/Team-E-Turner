<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   

    <link rel="stylesheet" href="contact1.1.css">
    <title>Document</title>
    
</head> 
<body>
<header>
    
<?php
session_start();
// include("config.php");
include("db_config1.php");
include("functions.php");


$vlada = getPosition();


if(isset($_GET['broj'])){
    $id=$_GET['broj'];
}


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

?>
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
    


   
    
    <script>

        const menuBtn=document.querySelector('.menu-btn')
        const navlinks=document.querySelector('header')

        menuBtn.addEventListener('click',()=>{
            navlinks.classList.toggle('mobile-menu')
        })
    </script>

<script>

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




<form name="form" method="post">
  <label for="fname">Vaše ime:</label><br>
  <input type="text" id="fname" name="fname" value="<?php  echo $_SESSION['firstname']?>"><br>
  
  <label for="lname">Vaše prezime:</label><br>
  <input type="text" id="lname" name="lname" value="<?php  echo $_SESSION['lastname']?>"><br>
  
  <label for="email">Broj telefona</label><br>
  <input type="text" id="email" name="email"  value="<?php  echo $_SESSION['phoneNum']?>"><br>
  
  <label for="adress">Adresa:</label><br>
  <input type="text" id="position" name="position"  value="<?php  echo $_SESSION['adress']?>"><br>
  


  <button type="submit" name="submitBtn">Submit</button>
  <button type="reset">Reset</button>
  
</form>


<?php
    
    $connect = new mysqli(HOST,USER,PASS,DATABASE);
    $vlada=getPosition();
        if(isset($_POST['submitBtn']) )
        {
        
                $fname=$_POST['fname'];
                $lname=$_POST['lname'];
                $email=$_POST['email'];
                $position=$_POST['position'];
              
               
            if(!empty($fname) && !empty($lname) && !empty($email) && !empty($position))
            {
                
                
               $query= "UPDATE users SET firstname = '$fname', lastname= '$lname',phoneNum = '$email',adress = '$position' WHERE id_user = {$_SESSION['id_user']}";
                
                $resultnova = $connect->query($query);
                     
                      if($resultnova){
                        $last_id = $connect->insert_id;
                        // echo "Svaka , čast znaš da uneseš sve podatka , kako treba (unešeni su podaci u sql)";
                        header("Location:acount.php");
                    }  
                  
                     
        
            }
            else
            {
                
    header("Location:index.php");
    die;
                
            }
          
    }



  
    ?>



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
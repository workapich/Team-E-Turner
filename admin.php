<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   

    <link rel="stylesheet" href="styleadmin3.css">
    <title>Document</title>
    
</head> 




<?php 
session_start();
require_once 'db_config1.php';
if($_SESSION['id_user']!==9)  
{

    header("Location:index.php");
}

$connect = new mysqli(HOST,USER,PASS,DATABASE);
if($connect -> connect_errno) {
    echo $connect -> connect__error;
}



$sql_str = "";

if (isset($sql_str)) {
    $sql = "SELECT id_vozila, proizvodjac, model, cena, slika FROM vozila ". $sql_str;
    if ($result = $connect -> query($sql)) {
        while ($row = $result -> fetch_assoc()) {
            $products[] = $row;
        }
    }
}


if(isset($_GET['deleteid'])){
    $id=$_GET['deleteid'];
    $result=mysqli_query($connect,"DELETE FROM `vozila` WHERE `id_vozila`=$id");
  if($result)
  {
      header('location:admin.php');
  }
}

if(isset($_POST['submitBtn']) )
    {
    
            $proizvodjac=$_POST['proizvodjac'];
            $model=$_POST['model'];
            $cena=$_POST['cena'];
            $slika=$_POST['slika'];
           
        if(!empty($proizvodjac) && !empty($model) && !empty($cena) && !empty($slika))
        {
            
            
           $query= "INSERT INTO `vozila`(`id_vozila`, `proizvodjac`, `model`, `cena`, `slika`) VALUES ('','$proizvodjac', '$model', '$cena','$slika')";
            
            $resultnova = $connect->query($query);
                 
                  if($resultnova){
                    $last_id = $connect->insert_id;
                    header("Location:admin.php");
                  }  
              
                  

    
        }
        else
        {
            echo "lolxd";

        }
      
}    


//update
if(isset($_GET['updateid'])){
   
$id1=$_GET['updateid'];
$sql1= "SELECT * FROM `vozila` WHERE `id_vozila`='$id1'";
$result=mysqli_query($connect,$sql1);
$row=mysqli_fetch_assoc($result);
$proizvodjac=$row['proizvodjac'];
$model=$row['model'];
$cena=$row['cena'];
$slika=$row['slika'];

if(isset($_POST['izmeniBtn']) )
    {
    
            $proizvodjac=$_POST['proizvodjac'];
            $model=$_POST['model'];
            $cena=$_POST['cena'];
            $slika=$_POST['slika'];
           
        if(!empty($proizvodjac) && !empty($model) && !empty($cena) && !empty($slika))
        {
            
            
           $query= "UPDATE `vozila` SET `id_vozila`='$id1',`proizvodjac`= '$proizvodjac',`model`='$model',`cena`= '$cena',`slika`='$slika' WHERE `id_vozila`='$id1'";

            $resultnova = $connect->query($query);
                 
                  if($resultnova){
                    $last_id = $connect->insert_id;
                    echo "Svaka , čast znaš da uneseš sve podatka , kako treba (unešeni su podaci u sql)";
                    header("Location:admin.php");
                  }  
              
                  

    
        }
        else
        {
            echo "lolxd";

        }
      
}  
}  
?>


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
    <h1>Our Selection</h1>
</div>

<div class="row">
    <?php
    
                    if (!empty($products)) {  
                        foreach ($products as $key => $value) {
                            $id=$value['id_vozila'];
                            echo '<div class="col">
                                <img src="'.$value['slika'].'">
                                <h4>'.$value['proizvodjac'].'</h4>
                                <p>'.$value['model'].'<p>
                                <p>'.$value['cena'].' $</p>
                                <a href="admin.php?deleteid='.$id.'" class="cta"><button>Delete</button></a>
                                <a href="admin.php?updateid='.$id.'" class="cta"><button>Change</button></a>
                            </div>';  
                        }
                    }
                    else {
                        echo '<div class="col">';
                    }
                ?>
</div>
               
</section>



<form name="form" method="post" id="forma1">
  <label for="proizvodjac">Proizvodjac</label><br>
  <input type="text" id="proizvodjac" name="proizvodjac" value=
  
  <?php 
  
  if(isset($proizvodjac))
  echo $proizvodjac;  
  
  ?> ><br>
  
  <label for="model">Model:</label><br>
  <input type="text" id="model" name="model" value=
  
  <?php 
  
  if(isset($model))
  echo $model;  
  
  ?> ><br>
  
  <label for="cena">Cena:</label><br>
  <input type="text" id="cena" name="cena" value=
  
  <?php 
  
  if(isset($cena))
  echo $cena;  
  
  ?> ><br>
  
  <label for="slika">Slika:</label><br>
  <input type="text" id="slika" name="slika" value=
  
  <?php 
  
  if(isset($slika))
  echo $slika;  
  
  ?> ><br>
   <br>
  <button type="submit" name="submitBtn">Submit</button>
  <button type="submit" name="izmeniBtn">Change </button>
  <button type="reset">Reset</button>
  
</form>



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
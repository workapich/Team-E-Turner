<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
<?php

function getPosition()
{
    $connect = new mysqli(HOST,USER,PASS,DATABASE);
if($connect -> connect_errno) {
    echo $connect -> connect__error;
}
    
    $q1 = "SELECT id_vozila,proizvodjac from vozila";
    
    $result1 = mysqli_query($connect, $q1) or die(mysqli_error($connect));
    
    
    if (mysqli_num_rows($result1)>0) 
    {
    
    
    $vlada=array();
        while ($record1 = mysqli_fetch_array($result1)) 
        {
            if (!in_array("$record1[proizvodjac]", $vlada)) {
          $vlada["$record1[id_vozila]"]="$record1[proizvodjac]";
            }
          
        }
    
        mysqli_free_result($result1); 
    }
    else
    {
        echo "There is no data in the database!";
    }
    return $vlada;

}


?>


</body>
</html>
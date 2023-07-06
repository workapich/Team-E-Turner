<?php


require_once 'db_config1.php';
// Retrieve the product ID from the AJAX request
$productId = $_POST['productId'];
;


$connect = new mysqli(HOST,USER,PASS,DATABASE);
if($connect -> connect_errno) {
    echo $connect -> connect__error;
}


$sql_str = "";



if (isset($sql_str)) {

    //SELECT * FROM `vozila` WHERE `id_vozila` = 1
    //

    
// Delete the item from the database
$stmt = $connect->prepare('DELETE FROM narudzbine WHERE id_nadrudzbine = ?');
$stmt->bind_param('i', $productId);

if ($stmt->execute()) {
    // Check if the deletion was successful
    if ($stmt->affected_rows > 0) {
        // Return a success message
       
      
    } else {
        // Return an error message
        echo 'Error deleting item!';
    }
} else {
    // Return an error message
    echo 'Error executing query: ' . $stmt->error;
}

   
};


// Close the connection
$stmt->close();
$connect->close();
?>

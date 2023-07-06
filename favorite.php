<?php
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  
    $favItem = $_POST["item_id"];
    require_once 'db_config1.php';
    require_once 'functions.php';

    $conn = new mysqli(HOST,USER,PASS,DATABASE);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

   
    $sql = "SELECT * from omiljeno WHERE id_vozila = '" . $favItem . "'";

    if ($result = mysqli_query($conn, $sql)) {
    
        // Return the number of rows in result set
        $rowcount = mysqli_num_rows( $result );
        
        if ($rowcount>=1) {
           
            $sqlD = "DELETE FROM omiljeno WHERE id_vozila = '" . $favItem . "'";
    
            if ($conn->query($sqlD) === true) {
                echo "Data deleted successfully.";
            } else {
                echo "Error: " . $sqlD . "<br>" . $conn->error;
            }
           
           
    
        }
        else
        {

            $sql = "INSERT INTO `omiljeno`(`id_user`, `id_vozila`) VALUES  ('{$_SESSION['id_user']}', '$favItem')";
    
            if ($conn->query($sql) === true) {
                echo "Data inserted successfully.";
            } else {
                echo "Error: " . $sql  ."<br>" . $conn->error;
            }

            
        }
       
     }


    


    // Prepare and execute the SQL INSERT statement
    

    // Close the database connection
    $conn->close();
}
?>
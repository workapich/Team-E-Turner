<?php
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  
    $total = $_POST["totalValue"];
    $userInputEnd = $_POST["userInput"];
    $output = $_POST["value"]; 
    $today = date("y.m.d");
    require_once 'db_config1.php';
    require_once 'functions.php';

    $conn = new mysqli(HOST,USER,PASS,DATABASE);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Prepare and execute the SQL INSERT statement
    $sql = "INSERT INTO `bought`(`id_user`, `naziv_hrane`,`ukupnaCena`,`adresa`, `datetime`) VALUES  ('{$_SESSION['id_user']}', '$output', '$total','$userInputEnd','$today')";

    if ($conn->query($sql) === true) {
        echo "Data inserted successfully.";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $sqla = "DELETE FROM narudzbine WHERE id_user='{$_SESSION['id_user']}'";

    if ($conn->query($sqla) === true) {
       
    } else {
        echo "Error: " . $sqla . "<br>" . $conn->error;
    }

    // Close the database connection
    $conn->close();
    // Close the database connection
    $conn->close();
}
?>
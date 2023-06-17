<?php

// Define database connection variables
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "interiors";

// Create database connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check for database connection errors
// if ($conn->connect_error) {
//     die("Connection failed: " . $conn->connect_error);
// }
/*if($conn){
    ?>
    <script>
        alert("connection")
    </script>
    <?php
 
  }*/
?>
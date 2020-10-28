<?php
$server = "localhost";
$user = "root";
$password = "";
$database = "patient_treatment";
// Create connection
$conn = new mysqli($server, $user, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
    echo"ta";
} 
?>
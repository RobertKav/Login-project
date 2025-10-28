<?php
// This file connects to the MySQL database
$conn = mysqli_connect("db", "my_username", "1rish8olf_Kav201", "lamp_db");

// Check if connection failed
if (!$conn) {
    echo "Connection failed. Error details:<br>";
    echo "Error: " . mysqli_connect_error() . "<br>";
    echo "Error number: " . mysqli_connect_error() . "<br>";
    die();
}
echo "Database connected successfully!";
?>
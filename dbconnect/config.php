<?php
$servername = "localhost";
$username = "root"; // your database username
$password = "ganesh"; // your database password
$dbname = "mindspace";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
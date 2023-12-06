<?php
$servername = "localhost"; // Change this if your database is on a different server
$username = "root"; // Change this to your MySQL username
$password = ""; // Change this to your MySQL password
$database = "proyek"; // Change this to your database name

// Create connection
$koneksi = new mysqli($servername, $username, $password, $database);

// Check connection
if ($koneksi->connect_error) {
    die("Connection failed: " . $koneksi->connect_error);
}

echo "Connected successfully"; // Remove or comment this line once you've confirmed the connection works
?>

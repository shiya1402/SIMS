<?php
// Database credentials
$servername = "localhost";
$user = "root";
$pass = "";
$dbname = "sims";

// Create connection
$conn = mysqli_connect($servername, $user, $pass, $dbname);

// Check connection
if ($conn===false) {
    die("Connection failed...");
}
?>
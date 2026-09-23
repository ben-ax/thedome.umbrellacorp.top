<?php
//echo phpinfo();

// ----------------- DISPLAY ALL ERRORS ------------------------
ini_set ('display_errors', 1);
ini_set ('display_startup_errors', 1);
error_reporting (E_ALL);


// ----------------- DATABASE CONNECTION -----------------------
$dbhost = "localhost";
$dbname = "thedome_umbrellacorp_top"; 
$dbuser = "mysqluser";
$dbpassword = "umbrella";

// Create connection
$conn = mysqli_connect($dbhost, $dbuser, $dbpassword, $dbname);

// Check connection
if (!$conn) 
{
  die("Connection failed: " . mysqli_connect_error());
}
?>
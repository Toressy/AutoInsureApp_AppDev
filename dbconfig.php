<?php


$DB_host = "localhost";
$DB_user = "root";
$DB_pass = "";
$DB_name = "CarInsurance";
$mysqli = new mysqli($DB_host, $DB_user, $DB_pass, $DB_name);

if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: " . $mysqli->connect_error;
    exit();
}

// Optional: Set character set
$mysqli->set_charset("utf8mb4"); // Adjust if necessary



include_once 'class.crud.php';
$crud = new crud($mysqli);
?>

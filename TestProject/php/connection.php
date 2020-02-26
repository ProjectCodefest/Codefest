<?php

session_start();

// Vul hier je database gegevens in.
$host = "localhost";
$dbusername = "root";
$password = "";
$database = "nielsburgers.nl";

try {
    // Maakt connectie met database.
    $conn = new PDO("mysql:host={$host};dbname={$database}",$dbusername, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $e)
{  
    // Error als database geen verbinding kan maken.
     echo $e->getMessage();
}
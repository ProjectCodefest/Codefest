<?php
$servername = "localhost";
$username = "phpDB";
$password = "qEc9Bu1wl3IWIkHu";

try {
    $conn = new PDO("mysql:host=$servername;dbname=bookonshelf", $username, $password);
}catch(PDOException $e){
    echo "Connection failed: " . $e->getMessage();
    die();
}
?>
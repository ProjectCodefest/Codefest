<?php
session_start();
include '../private/db.php';

if(isset($_SESSION['id'])){

    $sql = "DELETE FROM users WHERE UserId = :id";
    $sth = $conn->prepare($sql);
    $sth->bindParam(':id', $_SESSION['id']);
    $sth->execute();

    $_SESSION = array();
    $_SESSION['succes'] = '<p class="">Uw profiel is succesvol verwijderd!</p>';
    header('location: ../index.php?page=home');
    exit();
}else{
    $_SESSION['error'] = '<p class="">U kan niet iemand anders zijn profiel verwijderen!</p>';
    header('location: ../index.php?page=home');
    exit();
}
?>
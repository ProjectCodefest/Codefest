<?php
session_start();
include '../private/db.php';

if(isset($_SESSION['id']) && isset($_POST['update'])){
    
    if(!empty($_POST['firstname'])){
        $sql = "UPDATE users SET Username = :username WHERE UserId = :id";
        $sth = $conn->prepare($sql);
        $sth->bindParam(':username', $_POST['username']);
        $sth->bindParam(':id', $_SESSION['id']);
        $sth->execute();
        unset($_SESSION['username']);
        $_SESSION['username'] = $_POST['username'];
    }
    
    if(!empty($_POST['email'])){
        $sql = "UPDATE users SET Email = :email WHERE UserId = :id";
        $sth = $conn->prepare($sql);
        $sth->bindParam(':email', $_POST['email']);
        $sth->bindParam(':id', $_SESSION['id']);
        $sth->execute();
        unset($_SESSION['email']);
        $_SESSION['email'] = $_POST['email'];
    }
    
    if(!empty($_POST['password'])){
        $hashpassword = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $sql = "UPDATE users SET Password = :password WHERE UserId = :id";
        $sth = $conn->prepare($sql);
        $sth->bindParam(':password', $hashpassword);
        $sth->bindParam(':id', $_SESSION['id']);
        $sth->execute();
    }
    
    $_SESSION['succes'] = '<p class="">Uw informatie is aangepast.</p>';
    header('location: ../index.php?page=profile');
    exit();
}
?>
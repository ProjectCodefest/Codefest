<?php

require 'connection.php';

if (isset($_POST['aanmelden'])){

    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $password = password_hash($password, PASSWORD_DEFAULT);
    $role = 'user';
    try {
        $stmt = $conn->prepare('INSERT INTO users (username, email, password, role) VALUES (:username, :email, :password, :role)');
        $stmt->execute(array(
            ':username' => $username,
            ':email' => $email,
            ':password' => $password,
            ':role' => $role
            ));
        header('Location: ../index.php');
        exit;
    }
    catch(PDOException $e) {
        echo $e->getMessage();
    }
}
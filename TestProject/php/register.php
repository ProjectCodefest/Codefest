<?php
    session_start();
    include '../private/db.php';
    
    /* USER REGISTRATION INPUT */
    $firstname = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $hashpassword = password_hash($password, PASSWORD_DEFAULT);

    if(isset($_POST['register'])){
        /* MAKE USER IN DATABASE */
        $sql = "INSERT INTO users (Username, Email, Password) VALUES (:username, :email, :password)";
        $sth = $conn->prepare($sql);
        $sth->bindParam(':username', $username);
        $sth->bindParam(':email', $email);
        $sth->bindParam(':password', $hashpassword);
        
        if($sth->execute() === true){
            $_SESSION['succes'] = '<p class="">U bent succesvol geregistreerd en kan nu inloggen.<p>';
            header("location: ../index.php?page=login");
            exit();
        }else{
            $_SESSION['error'] = '<p class="">Dit e-mail adres is al in gebruik!</p>';
            header("location: ../index.php?page=register");
            exit();
        }
    }
?>
<?php
session_start();

include '../private/db.php';

$sql = 'SELECT * FROM users INNER JOIN role ON users.FKRoleId = role.RoleId WHERE Email = :email';
$sth = $conn->prepare($sql);
$sth->bindParam(':email', $_POST['email']);
$sth->execute();

if(isset($_POST['login'])){
    if($rsUser = $sth->fetch(PDO::FETCH_ASSOC)){
        $hashpassword = $rsUser['Password'];
        if(password_verify($_POST['password'], $hashpassword)){
            $_SESSION['id'] = $rsUser['UserId'];
            $_SESSION['username'] = $rsUser['Username'];
            $_SESSION['email'] = $rsUser['Email'];
            $_SESSION['role'] = $rsUser['RoleName'];
            $_SESSION['succes'] = "<p class=''>U bent succesvol ingelogd!</p>";
            header('location: ../index.php?page=home');
        }else{
            $_SESSION['error'] = "<p class=''>De combinatie van uw e-mail en wachtwoord is fout!</p>";
            header('location: ../index.php?page=login');
        }
    }else{
        $_SESSION['error'] = "<p class=''>De combinatie van uw e-mail en wachtwoord is fout!</p>";
            header('location: ../index.php?page=login');
    }
}

?>
<?php
session_start();

include '../private/db.php';

$sql = 'SELECT * FROM users INNER JOIN cities ON users.FKCityId = cities.CityId WHERE Email = :email';
$sth = $conn->prepare($sql);
$sth->bindParam(':email', $_POST['email']);
$sth->execute();

if(isset($_POST['login'])){
    if($rsUser = $sth->fetch(PDO::FETCH_ASSOC)){
        $hashpassword = $rsUser['Password'];
        if(password_verify($_POST['password'], $hashpassword)){
            $_SESSION['id'] = $rsUser['UserId'];
            $_SESSION['firstname'] = $rsUser['Firstname'];
            $_SESSION['lastname'] = $rsUser['Lastname'];
            $_SESSION['city'] = $rsUser['CityName'];
            $_SESSION['street'] = $rsUser['Street'];
            $_SESSION['housenumber'] = $rsUser['HouseNumber'];
            $_SESSION['postalcode'] = $rsUser['PostalCode'];
            $_SESSION['image'] = $rsUser['Image'];
            $_SESSION['email'] = $rsUser['Email'];
            $_SESSION['succes'] = "<p class='alert alert-success text-center'>U bent succesvol ingelogd!</p>";
            header('location: ../index.php?page=home');
        }else{
            $_SESSION['error'] = "<p class='alert alert-danger text-center'>De combinatie van uw e-mail en wachtwoord is fout!</p>";
            header('location: ../index.php?page=login');
        }
    }else{
        $_SESSION['error'] = "<p class='alert alert-danger text-center'>De combinatie van uw e-mail en wachtwoord is fout!</p>";
            header('location: ../index.php?page=login');
    }
}

?>
<?php
    session_start();
    include '../private/db.php';
    
    /* USER REGISTRATION INPUT */
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $city = $_POST['city'];
    $street = $_POST['street'];
    $housenumber = $_POST['housenumber'];
    $postalcode = strtoupper($_POST['postalcode']);
    $email = $_POST['email'];
    $password = $_POST['password'];
    $hashpassword = password_hash($password, PASSWORD_DEFAULT);

    if(isset($_POST['register'])){
        /* MAKE USER IN DATABASE */
        $sql = "INSERT INTO users (Firstname, Lastname, FKCityId, Street, HouseNumber, PostalCode, Email, Password) VALUES (:firstname, :lastname, :city, :street, :housenumber, :postalcode, :email, :password)";
        $sth = $conn->prepare($sql);
        $sth->bindParam(':firstname', $firstname);
        $sth->bindParam(':lastname', $lastname);
        $sth->bindParam(':city', $city);
        $sth->bindParam(':street', $street);
        $sth->bindParam(':housenumber', $housenumber);
        $sth->bindParam(':postalcode', $postalcode);
        $sth->bindParam(':email', $email);
        $sth->bindParam(':password', $hashpassword);
        
        if($sth->execute() === true){
            $_SESSION['succes'] = '<p class="alert alert-success text-center">U bent succesvol geregistreerd en kan nu inloggen.<p>';
            header("location: ../index.php?page=login");
            exit();
        }else{
            $_SESSION['error'] = '<p class="alert alert-danger text-center">Dit e-mail adres is al in gebruik!</p>';
            header("location: ../index.php?page=register");
            exit();
        }
    }
?>
<?php
session_start();
include '../private/db.php';

if(isset($_SESSION['id']) && isset($_POST['update'])){
    
    if(!empty($_POST['image'])){
        $file = $_FILES['image'];
        
        $fileName = $_FILES['image']['name'];
        $fileTmpName = $_FILES['image']['tmp_name'];
        $fileSize = $_FILES['image']['size'];
        $fileError = $_FILES['image']['error'];
        $fileType = $_FILES['image']['type'];
        
        $fileExt = explode('.', $fileName);
        $fileActualExt = strtolower(end($fileExt));
        
        $allowed = array('jpg', 'jpeg', 'png');
        
        if(in_array($fileActualExt, $allowed)){
            if($fileError === 0){
                if($fileSize < 1000000){
                    $fileNameNew = $_SESSION['id'].".".$fileActualExt;
                    $fileDestination = './uploads/'.$fileNameNew;
                    move_uploaded_file($fileTmpName, $fileDestination);
                    $sql = "UPDATE users SET Image = :image WHERE UserId = :id";
                    $sth = $conn->prepare($sql);
                    $sth->bindParam(':image', $fileDestination);
                    $sth->bindParam(':id', $_SESSION['id']);
                    $sth->execute();
                }else{
                    $_SESSION['error'] = '<p class="alert alert-danger text-center">De grootte van de afbeelding is te groot!</p>';
                }
            }else{
                $_SESSION['error'] = '<p class="alert alert-danger text-center">Er gaat iets fout met het uploaden van de afbeelding!</p>';
            }
        }else{
            $_SESSION['error'] = '<p class="alert alert-danger text-center">De afbeelding is niet van het type: jpg, jpeg, png!</p>';
        }
    }
    
    if(!empty($_POST['firstname'])){
        $sql = "UPDATE users SET Firstname = :firstname WHERE UserId = :id";
        $sth = $conn->prepare($sql);
        $sth->bindParam(':firstname', $_POST['firstname']);
        $sth->bindParam(':id', $_SESSION['id']);
        $sth->execute();
        unset($_SESSION['firstname']);
        $_SESSION['firstname'] = $_POST['firstname'];
    }
    
    if(!empty($_POST['lastname'])){
        $sql = "UPDATE users SET Lastname = :lastname WHERE UserId = :id";
        $sth = $conn->prepare($sql);
        $sth->bindParam(':lastname', $_POST['lastname']);
        $sth->bindParam(':id', $_SESSION['id']);
        $sth->execute();
        unset($_SESSION['lastname']);
        $_SESSION['lastname'] = $_POST['lastname'];
    }
    
    if(!empty($_POST['city'])){
        $sql = "UPDATE users SET FKCityId = :city WHERE UserId = :id";
        $sth = $conn->prepare($sql);
        $sth->bindParam(':city', $_POST['city']);
        $sth->bindParam(':id', $_SESSION['id']);
        $sth->execute();
        unset($_SESSION['city']);
        $sql = 'SELECT * FROM users INNER JOIN cities ON users.FKCityId = cities.CityId WHERE UserId = :id';
        $sth = $conn->prepare($sql);
        $sth->bindParam(':id', $_SESSION['id']);
        $sth->execute();
        $user = $sth->fetch(PDO::FETCH_ASSOC);
        $_SESSION['city'] = $user['CityName'];
    }
    
    if(!empty($_POST['street'])){
        $sql = "UPDATE users SET Street = :street WHERE UserId = :id";
        $sth = $conn->prepare($sql);
        $sth->bindParam(':street', $_POST['street']);
        $sth->bindParam(':id', $_SESSION['id']);
        $sth->execute();
        unset($_SESSION['street']);
        $_SESSION['street'] = $_POST['street'];
    }
    
    if(!empty($_POST['housenumber'])){
        $sql = "UPDATE users SET HouseNumber = :housenumber WHERE UserId = :id";
        $sth = $conn->prepare($sql);
        $sth->bindParam(':housenumber', $_POST['housenumber']);
        $sth->bindParam(':id', $_SESSION['id']);
        $sth->execute();
        unset($_SESSION['housenumber']);
        $_SESSION['housenumber'] = $_POST['housenumber'];
    }
    
    if(!empty($_POST['postalcode'])){
        $sql = "UPDATE users SET PostalCode = :postalcode WHERE UserId = :id";
        $sth = $conn->prepare($sql);
        $sth->bindParam(':postalcode', $_POST['postalcode']);
        $sth->bindParam(':id', $_SESSION['id']);
        $sth->execute();
        unset($_SESSION['postalcode']);
        $_SESSION['postalcode'] = $_POST['postalcode'];
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
    
    $_SESSION['succes'] = '<p class="alert alert-success text-center">Uw informatie is aangepast.</p>';
    header('location: ../index.php?page=profile');
    exit();
}
?>
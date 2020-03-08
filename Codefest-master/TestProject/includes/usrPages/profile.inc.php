<?php
if(isset($_SESSION['succes'])){
    echo $_SESSION['succes'];
    unset($_SESSION['succes']);
}

if(isset($_SESSION['error'])){
    echo $_SESSION['error'];
    unset($_SESSION['error']);
}
?>

                        <p><?php echo $_SESSION['email'] ?></p>
                        <p><?php echo $_SESSION['username'] ?></p>
                        <a class="" href="./index.php?page=edit">Pas je profiel aan</a>
                        <a class="" href="./php/delete.php?id=<?php echo $_SESSION['id'] ?>">Verwijder je profiel</a>
<?php
if(isset($_SESSION['error'])){
    echo $_SESSION['error'];
    unset($_SESSION['error']);
}
if(isset($_SESSION['succes'])){
    echo $_SESSION['succes'];
    unset($_SESSION['succes']);
}
?>

<h1>Home page</h1>
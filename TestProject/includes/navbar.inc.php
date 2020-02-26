<?php

$sql = 'SELECT Link, Label FROM navbar WHERE UsrPage = 0 OR UsrPage = 1';
$sth = $conn->prepare($sql);
$sth->execute();
$menuItems = $sth->fetchAll();

$sql = 'SELECT Link, Label FROM navbar WHERE UsrPage = 0 OR UsrPage = 2';
$sth = $conn->prepare($sql);
$sth->execute();
$menuItemsU = $sth->fetchAll();

echo '<nav class="navbar navbar-expand-md navbar-dark">
    <button class="navbar-toggler" data-toggle="collapse" data-target="#collapse_target"><span class="navbar-toggler-icon"></span></button>
    <div class="collapse navbar-collapse" id="collapse_target">
    <ul class="navbar-nav">';
if(!isset($_SESSION['id'])){
    foreach($menuItems as $menuItem){
        echo '<li class="nav-item"><a class="nav-link" href="index.php?page='.$menuItem[0].'">'.$menuItem[1].'</a></li>';
    }
}else{
    foreach($menuItemsU as $menuItemU){
        echo '<li class="nav-item"><a class="nav-link" href="index.php?page='.$menuItemU[0].'">'.$menuItemU[1].'</a></li>';
    }
    echo '<li class="nav-item"><a class="nav-link" href="php/logout.php">Logout</a></li>';
}


echo '</ul></div></nav>';
?>
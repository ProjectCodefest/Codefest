<?php

$sql = 'SELECT Link, Label FROM navbar WHERE UsrPage = 0 OR UsrPage = 1';
$sth = $conn->prepare($sql);
$sth->execute();
$menuItems = $sth->fetchAll();

$sql = 'SELECT Link, Label FROM navbar WHERE UsrPage = 0 OR UsrPage = 2';
$sth = $conn->prepare($sql);
$sth->execute();
$menuItemsU = $sth->fetchAll();


if(!isset($_SESSION['id'])){
    foreach($menuItems as $menuItem){
        echo '<li class=""><a class="" href="index.php?page='.$menuItem[0].'">'.$menuItem[1].'</a></li>';
    }
}else{
    foreach($menuItemsU as $menuItemU){
        echo '<li class=""><a class="" href="index.php?page='.$menuItemU[0].'">'.$menuItemU[1].'</a></li>';
    }
    echo '<li class=""><a class="" href="php/logout.php">Logout</a></li>';
    echo $_SESSION['role'];
}
?>
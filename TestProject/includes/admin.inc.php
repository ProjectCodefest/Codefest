<?php 

session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <title>Titel Website</title>
</head>
<body>
    <ul>
        <li><a id="title"> NielsBurgers.nl </a></li>
        <li><a href="../index.php">Home</a></li>
        </ul>
    </br>
    <?php if (!isset($_SESSION['role'])): ?> 
        <h1> Forbidden </h1>
    <?php elseif($_SESSION['role'] == 'admin'): ?>
        <h1> Admin Page </h1>
    <?php else: ?>
        <h1> Forbidden </h1>
    <?php endif; ?>


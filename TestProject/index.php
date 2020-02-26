<?php

require 'php/connection.php';

if( isset($_SESSION['user_id']) ){

	$records = $conn->prepare('SELECT id,email,password,role FROM users WHERE id = :id');
    $records->bindParam(':id', $_SESSION['user_id']);
	$records->execute();
	$results = $records->fetch(PDO::FETCH_ASSOC);

	$user = NULL;
	if(count($results) > 0){
		$user = $results;
	}
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <title>Titel Website</title>
</head>
    <body>
    <ul>
            <li><a id="title"> NielsBurgers.nl </a></li>
            <li><a href="index.php">Home</a></li>
        </ul>
        <?php if( !empty($user) ): ?>
        
        <p style="margin-left: 40px;"> Welkom <?= $user['email']; ?>  </p>
        <button style="margin-left: 40px;" class="navbtn" onclick="window.location.href='php/logout.php'">Logout</button>

        <?php else: ?>  
            <p style="margin-left: 40px;">Geen gebruiker ingelogd</p>
            <button style="margin-left: 40px;" class="navbtn" onclick="window.location.href='includes/login.inc.php'">Login</button>
        <?php endif; ?>
    </br>
    <?php include 'includes/home.inc.php' ?>
    </body>
</html>
<?php

// Heeft connection.php nodig.
require 'connection.php';

// Kijkt of alles ingevuld is binnen de login.inc.php
if(!empty($_POST['email']) && !empty($_POST['password'])):
	
	$records = $conn->prepare('SELECT id,email,password,role FROM users WHERE email = :email');
	$records->bindParam(':email', $_POST['email']);
	$records->execute();
	$results = $records->fetch(PDO::FETCH_ASSOC);

	// Kijkt of ingevulde gegevens gelijk zijn als die in de database.
	if(count($results) > 0 && password_verify($_POST['password'], $results['password']) ){

		$_SESSION['user_id'] = $results['id'];
		$_SESSION['role'] = $results['role'];
		header("Location: ../index.php");

	} else {
		// Maakt sessie voor de error message als gegevens incorrect zijn.
		$_SESSION['error'] = array("Ingevoerde gegevens zijn incorrect.");
		header("Location: ../includes/login.inc.php");
	}
else:
	// Maakt sessie voor de error message als gebruiker niet alles in vult.
	$_SESSION['error'] = array("Vul al uw gegevens in aub.");
	header("Location: ../includes/login.inc.php");
endif;

?>

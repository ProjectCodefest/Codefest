<?php
session_start();
session_destroy();
$_SESSION['succes'] = "<p class='text-center text-success'>U bent succesvol uitgelogd!</p>";
header('location: ../index.php?page=home');
exit();
?>
<?php
session_start();
session_destroy();
$_SESSION['succes'] = "<p class=''>U bent succesvol uitgelogd!</p>";
header('location: ../index.php?page=home');
exit();
?>
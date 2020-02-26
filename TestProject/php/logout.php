<?php
// Zorgt dat de sessie niet meer bestaat.
session_start();
session_unset();
session_destroy();
// Als geberuiker uitlogd gaat hij naar de index.php
header('location: ../index.php');
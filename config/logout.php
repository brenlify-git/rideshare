<?php

session_unset();
$_SESSION['messageLogin'] = 'Succesfully Logged Out!';
header("Location: ../logins/index.php");


?>
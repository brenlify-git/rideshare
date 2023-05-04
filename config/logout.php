<?php

session_start();
$_SESSION['messageLogin'] = 'Succesfully Logged Out!';  
if(session_destroy()){
    header("Location:../index.php");
    exit;
}

?>
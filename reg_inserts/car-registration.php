<?php

session_start();
include '../config/connection.php';

$userID = $_SESSION['userID'];
$idType = $_POST['idType'];

if($idType != "Driver's License"){
    $_SESSION['CarRegistrationStatus'] = "Kindly update your ID, you need to have a License Number";
    header("Location:../create_membership/membership.php");

}
else{
  
    $_SESSION['CarRegistrationStatus'] = "Registration Succesful!";
    header("Location:../create_membership/membership.php");
 
}

?>
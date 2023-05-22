<?php

session_start();
include '../config/connection.php';

$userIDLogged = $_POST['userID'];

if(isset($_POST['accept'])){
    $userIDLogged = $_POST['userID'];
    $upd4 = "UPDATE user SET verifyLicenseNumber='accepted', userType='Driver' WHERE userID = '$userIDLogged'";
    $result4 =mysqli_query($conn, $upd4);

    $_SESSION['idApprovalStatus'] = "ID Changed Request Succesful!";
    header("Location:../create_membership/id-approval.php");

        
    
    
}
else if(isset($_POST['decline'])){
    $userIDLogged = $_POST['userID'];
    $upd4 = "UPDATE user SET verifyLicenseNumber='declined' WHERE userID = '$userIDLogged'";
    $result4 =mysqli_query($conn, $upd4);


    $_SESSION['idApprovalStatus'] = "ID Changed Request Declined!";
    header("Location:../create_membership/id-approval.php");
}
?>
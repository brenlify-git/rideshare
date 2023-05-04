<?php

session_start();
include '../config/connection.php';

$userID = $_SESSION['userID'];
$idType = $_POST['idType'];
$carID = $_POST['carID'];
$date = date("Y-m-d H:i:s");

if($idType != "Drivers License"){
    $_SESSION['CarRegistrationStatus'] = "Kindly update your ID, you need to have a License Number";
    header("Location:../create_membership/membership.php");

}
else{



$upd3 = "UPDATE `user` SET userType='Driver' WHERE userID = '$userID'";
$result3=mysqli_query($conn, $upd3);

$upd4 = "UPDATE `car_description` SET verifyCarStatus='$date' WHERE carID = '$carID'";
$result4 =mysqli_query($conn, $upd4);


$_SESSION['CarRegistrationStatus'] = "Registration Succesful!";
header("Location:../create_membership/membership.php");

    
 
}

?>
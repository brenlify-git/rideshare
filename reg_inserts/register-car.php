<?php
session_start();
include 'connection.php';

$userID = $_POST['usersID'];
$licenseNumber = $_POST['licenseNumber'];
$carColor = $_POST['carColor'];
$carType = $_POST['carType'];
$manufacturer = $_POST['manufacturer'];
$seatCapacity = $_POST['seatCapacity'];
$plateNumber = $_POST['plateNumber'];
echo $userID;

$sqlIns = "INSERT INTO car_driver (userID, licenseNumber) VALUES ('$userID','$licenseNumber')";
$result=mysqli_query($conn, $sqlIns);

$_SESSION['newDriverID'] = $userID;


$sqlIns2 = "INSERT INTO car_description (driverID, carColor, carType, manufacturer, carSeatCapacity, plateNumber)
VALUES ('$newID', '$carColor', '$carType', '$manufacturer', '$seatCapacity', '$plateNumber')";
$result2=mysqli_query($conn, $sqlIns2);

$upd3 = "UPDATE `user` SET userType='Driver' WHERE userID = '$userID'";
$result3=mysqli_query($conn, $upd3  );

if($result){
    echo "Data Inserted Succesfully!";
    header("Location:register-passenger.php");
}else{
    die(mysqli_error($conn));
}


?>
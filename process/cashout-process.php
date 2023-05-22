<?php
session_start();
include '../config/connection.php';

$userID = $_SESSION['userID'];
$transType = "Cash Out";
$GCashNo = $_POST['gcashNo'];
$amountReq = $_POST['amount'];
$refNum = "";

$sql = "SELECT * FROM user WHERE userID = '$userID'";
$idx = $conn->query($sql);

$amount = $amountReq;

$thousandCount = floor($amount / 1000); 

$remainder = $amount % 1000; 

if ($remainder > 0 && $remainder <= 999) {
    $thousandCount += 1;
    $thousandCount *= 20;
}
else{
    $thousandCount *= 20;
}
$proFee = $thousandCount;
$conFee = '0.00';
$confirmStatus = 'pending';


$amountNeed = $thousandCount + $amountReq;

while($userGuide = mysqli_fetch_assoc($idx)): 
$getUserBalance = $userGuide['uBalance'];
endwhile;

if ($amountNeed > $getUserBalance){
    $_SESSION['messageResult'] = "Insufficient Fund!";
    header("Location:../trans_model/cashout.php");
}
else{
    $sqlIns2 = "INSERT INTO cashin_cashout(userID, transType, GCashNumber, refNum, amount, proFee, conFee, confirmStatus)
    VALUES ('$userID', '$transType', '$GCashNo', '$refNum', '$amountReq', '$proFee', '$conFee',  '$confirmStatus')";
    $result2=mysqli_query($conn, $sqlIns2);

    $_SESSION['messageResult'] = "Cashout Request Submitted!";
    header("Location:../trans_model/cashout.php");
}








?>
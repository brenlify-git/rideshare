<?php
session_start();
include '../config/connection.php';

$userID = $_SESSION['userID'];
$transType = "Cash In";
$transFrom = $_POST['senderNum'];
$transTo = $_POST['receiverNum'];
$amount = $_POST['amount'];
$refNum = $_POST['refNum'];

if ($amount == '50'){
    $ticketAmount = 40;
}
else if ($amount == '100'){
    $ticketAmount = 40;
}
else if ($amount == '250'){
    $ticketAmount = 200;
}
else if ($amount == '500'){
    $ticketAmount = 450;
}

$proFee = '0';

$conFee = $amount - $ticketAmount;

$confirmStatus = 'pending';


$sqlIns2 = "INSERT INTO cashin_cashout(userID, transType, transFrom, transTo, refNum, amount, proFee, conFee, confirmStatus)
VALUES ('$userID', '$transType', '$transFrom', '$transTo', '$refNum', '$amount', '$proFee', '$conFee',  '$confirmStatus')";
$result2=mysqli_query($conn, $sqlIns2);


if($result2){
    $_SESSION['messageResult'] = "Registration submitted!";
    header("Location:../trans_model/cashin.php");
}else{
    die(mysqli_error($conn));
}


?>
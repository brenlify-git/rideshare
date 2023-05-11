<?php

session_start();
include '../config/connection.php';

if(isset($_POST['accept'])){

    $userIDLogged = $_POST['userID'];
    $transID = $_POST['transID'];
    $amount = $_POST['amount'];
    $conFee = $_POST['conFee'];

    $userBalance = $amount - $conFee;

    $sql = "SELECT * FROM user WHERE userID = '$userIDLogged'";
    $idx = $conn->query($sql);

    while($userGuide = mysqli_fetch_assoc($idx)): 
    $getUserBalance = $userGuide['uBalance'];
    endwhile;

    $getUserBalance += $userBalance;

    $upd4 = "UPDATE user SET uBalance='$getUserBalance' WHERE userID = '$userIDLogged'";
    $result4 =mysqli_query($conn, $upd4);

    $upd4 = "UPDATE cashin_cashout SET confirmStatus = 'accepted' WHERE transID = '$transID'";
    $result4 =mysqli_query($conn, $upd4);

    $_SESSION['idApprovalStatus'] = "Cash In Request Approved!";
    header("Location:../process/approve-cashin.php");
    
    
}
else if(isset($_POST['decline'])){

    $userIDLogged = $_POST['userID'];
    $transID = $_POST['transID'];
    $amount = $_POST['amount'];
    $conFee = $_POST['conFee'];

    $upd4 = "UPDATE cashin_cashout SET confirmStatus='declined' WHERE transId = '$transID'";
    $result4 =mysqli_query($conn, $upd4);


    $_SESSION['idApprovalStatus'] = "Cash In Request Declined!";
    header("Location:../process/approve-cashin.php");
}
?>
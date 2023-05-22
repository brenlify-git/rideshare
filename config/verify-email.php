<?php
session_start();
include '../config/connection.php';
if(isset($_GET['token'])){
    $token = $_GET['token'];
    $verify_query = "SELECT verifyToken, verifyStatus FROM user WHERE verifyToken = '$token' LIMIT 1";
    $verify_query_run = mysqli_query($conn, $verify_query);

    if(mysqli_num_rows($verify_query_run)>0){
        $row = mysqli_fetch_array($verify_query_run);
    //    echo $row['verifyToken'];

      if($row['verifyStatus'] == "Not Yet Verified"){
            $clickedToken = $row['verifyToken'];
            $updateQuery = "UPDATE user SET uBalance = '10.00', verifyStatus = 'Verified' WHERE verifyToken = '$clickedToken' LIMIT 1";
            $updateQuery_Run = mysqli_query($conn, $updateQuery);

            if($updateQuery_Run){
                $_SESSION['status'] = "Account has been verified";
                header("Location: ../reg_inserts/registration-account.php");
                exit(0);
            }
            else{
                $_SESSION['status'] = "Verification Failed!";
                header("Location: ../reg_inserts/registration-account.php");
                exit(0);
            }
      }
      else{
        $_SESSION['status'] = "Email succesfully verified, Try Logging in!";
        header("Location:../logins/index.php");
        exit(0);
      }
    }
    else{
        $_SESSION['status'] = "This token does not exist!";
        header("Location:../logins/index.php");
    }
}
else{
    $_SESSION['status'] = "Not Allowed";
    header("Location: ../logins/index.php");
}
?>
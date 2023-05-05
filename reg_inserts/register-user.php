<?php
session_start();

include '../config/connection.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require '../vendor/autoload.php';

function sendemail_verify($firstName, $email, $verify_token){
    $mail = new PHPMailer(true);

    $mail->isSMTP();  
    $mail->SMTPAuth = true; 

    $mail->Host = 'smtp.gmail.com'; 
    $mail->Username = 'brenlify.mail@gmail.com';
    $mail->Password = 'ruvatbfaopgafclp';

    $mail->SMTPSecure = 'ssl';
    $mail->Port = 465;   
    
    // $mail->AddCustomHeader("Importance: High");
    $mail->setFrom('brenlify.mail@gmail.com', 'Carpool App');
    $mail->addAddress($email);

    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'User Registration';

    $email_template = "
    <h2>You have already Registered with Carpool App</h2>
    <h4>Verify your email address to login with the below given link</h4>
    <br/>
    <a href='https://carpool.infuselibrary.tech/config/verify-email.php?token=$verify_token'>Click to verify email</a>
    ";

    $mail->Body = $email_template;
    $mail->send();
   // echo 'Message has been sent!';
}

if(isset($_POST['register_btn'])){
    $firstName = $_POST['firstName'];
    $middleName = $_POST['middleName'];
    $lastName = $_POST['lastName'];
    $userType = 'Passenger';
    $contactNumber = $_POST['contactNumber'];
    $email = $_POST['email'];
    $street = $_POST['street'];
    $barangay = $_POST['barangay'];
    $municipality = $_POST['municipality'];
    $province = $_POST['province'];
    $idNumber = $_POST['idNumber'];
    $idType = $_POST['idType'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $verifyToken = md5(rand());


    $check_email_query = "SELECT email FROM user WHERE email = '$email' LIMIT 1";
    $check_email_query_run = mysqli_query($conn, $check_email_query);

    if(mysqli_num_rows($check_email_query_run)>0){
        $_SESSION['status'] = 'Email ID already exists!';
        header("Location:registration-account.php");
    }
    else{
        $registerUser = "INSERT INTO user(firstName, middleName, lastName, contactNumber, userType, email, street, barangay, municipality, province, idType, idNumber, username, password, verifyToken) VALUES ('$firstName', '$middleName', '$lastName', '$contactNumber', '$userType', '$email', '$street', '$barangay', '$municipality', '$province', '$idType', '$idNumber', '$username', '$password', '$verifyToken')";
        $registerUser_run = mysqli_query($conn, $registerUser);

        

        if($registerUser_run){
            sendemail_verify("$firstName", "$email", "$verifyToken");
            $_SESSION['status'] = 'Registration Succesfull! Kindly check your email';
            header("Location:registration-account.php");
        }
        else{
            $_SESSION['status'] = 'Registration Failed!';
            header("Location:registration-account.php");
        }
    }
}
?>
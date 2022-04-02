<?php 
session_start();

// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// Load Composer's autoloader
require 'vendor/autoload.php';

// Instantiation and passing `true` enables exceptions
$mail = new PHPMailer(true);

require_once 'auth0.php';
$user = new Auth();

$cUser = new Auth();
// Handle Registeration ajax Request
if(isset($_POST['action']) && $_POST['action'] == 'register'){

$fname = $user->checkInput($_POST['fname']);
$username = $user->checkInput($_POST['username']);
$referrer = $user->checkInput($_POST['referrer']);
$email = $user->checkInput($_POST['email']);
$password = $user->checkInput($_POST['password']);
$activation_code = $_POST['activation_code'];
$user_otp = $_POST['user_otp'];


if($user->userExist($email)){
    echo $user->showMessage('warning', 'This Email Address already Exist');
}elseif($user->usernameExist($username)){
    echo $user->showMessage('warning', 'This Username Already Exist!');
}else{
   
    if($user->register($fname, $email, $password, $username, $referrer, $activation_code, $user_otp)){
        echo 'register';
        $_SESSION['user'] = $email; 
        
       /*  try{
               
            $mail->isSMTP();
            $mail->Host = 'mail.bitmexxtrade.com';
            $mail->SMTPAuth = true;
            $mail->Username = Database::USERNAME;
            $mail->Password = Database::PASSWORD;
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port = 465;
            $mail->setFrom(Database::USERNAME,'Mr.Cejay');
            $mail->addAddress($email);
            $mail->isHTML(true);
            $mail->subject = 'Reset Password';
            $mail->Body = '<h3> Thank You for registering use this code to verify your email address </br>
            '.$user_otp.'
             </br>Regards Mr.Ceejay</h3>'; 

            $mail->send();
            echo $user->showMessage('success', 'We have sent you the reset password link, to your email address
            please open your email and click on the confirmation link!');

            header('location:email_verify.php?code='.$activation_code);
        }
        catch(Exception $e){
            echo $user->showMessage('danger', 'something wen wrong please try again later!');
        } 
 */

    }else{
        echo $user->showMessage('danger', 'something went wrong! try again later');

    }
}
 
}


// Handle login ajax Request
if(isset($_POST['action']) && $_POST['action'] == 'login'){
    $email = $user->checkInput($_POST['email']);
    $pass = $user->checkInput($_POST['password']);

     $loggedInUser = $user->login($email);


    if($loggedInUser != null){
        if($pass == $loggedInUser['password']){

            if(!empty($_POST['rem'])){
                setcookie("email", $email, time()+(30*24*60*60), '/');
                setcookie("password", $pass, time()+(30*24*60*60), '/');
            }
            
            else{
                setcookie("email", "", 1, '/');
                setcookie("password", "", 1, '/');
            }
            echo 'login';
            $_SESSION['user'] = $email;
        }
        else{
            echo $user->showMessage('danger', 'Password Incorect');
        }
    }
    else{
        echo $user->showMessage('danger', 'User Not found'); 
    }

}



    // Handle Forgort Password ajax Request
    if(isset($_POST['action']) && $_POST['action'] == 'forgot'){
        $email = $user->checkInput($_POST['email']);
         $userFound = $user->currentUser($email);
 
         if($userFound != null){
             $token = uniqid();
             $token = str_shuffle($token);
             $user->forgotPassword($email, $token);
 
             try{
               
                 $mail->isSMTP();
                 $mail->Host = 'mail.bigservers.net';
                 $mail->SMTPAuth = true;
                 $mail->Username = Database::USERNAME;
                 $mail->Password = Database::PASSWORD;
                 $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
                 $mail->Port = 465;
                 $mail->setFrom(Database::USERNAME,'Mr.Cejay');
                 $mail->addAddress($email);
                 $mail->isHTML(true);
                 $mail->subject = 'Reset Password';
                 $mail->Body = '<h3> Click on the below link to reset your password </br>
                 <a href="http://localhost/user_system/reset-pass.php?email='.$email.'&token='.$token.'">
                 http://localhost/user_system/reset-pass.php?email='.$email.'&token='.$token.'</a>
                 </br>Regards Mr.Ceejay</h3>'; 
 
                 $mail->send();
                 echo $user->showMessage('success', 'We have sent you the reset password link, to your email address
                 please open your email and click on the confirmation link!');
             }
             catch(Exception $e){
                 echo $user->showMessage('danger', 'something wen wrong please try again later!');
             }
         }
         else{
             echo $user->showMessage('info','this email is not registered!');
         }
     }

?>
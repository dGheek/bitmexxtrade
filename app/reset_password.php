<?php 

require_once 'config/auth0.php';
$user = new Auth();
$msg = '';

if(isset($_GET['email']) && isset($_GET['token'])){
$email = $user->checkInput($_GET['email']);
$token = $user->checkInput($_GET['token']);

$authUser = $user->resetPasswordAuth($email, $token);
if($authUser != null){
    if(isset($_GET['submit'])){
        $newpass = $_POST['pass'];
        $cnewpass = $_POST['cpass'];

        $hnewpass = password_hash($newpass, PASSWORD_DEFAULT);
        if($newpass == $cnewpass){
            $user->updateNewPassword($hnewpass, $email);
            $msg = 'Password Changed Successfully </br> 
            <a href="auth.php"> Login Here!</a>';
        }else{
            $msg = 'Passwoord did not matched'; 
        }
    }
}else{
    header('loaction:auth.php');
    exit();
}

}
else{
    header('auth.php');
    exit();
}

?>

<?php require_once 'config/config.php'; ?>

<?php include 'include/head.php'; ?>

     <!-- cp navi wrapper Start -->

     <?php include 'include/navbar.php'; ?>

    <!-- navi wrapper End -->
    <!-- inner header wrapper start -->
    <div class="page_title_section">

        <div class="page_header">
            <div class="container">
                <div class="row">

                    <div class="col-lg-9 col-md-9 col-12 col-sm-8">

                        <h1>login</h1>
                    </div>
                    <div class="col-lg-3 col-md-3 col-12 col-sm-4">
                        <div class="sub_title_section">
                            <ul class="sub_title">
                                <li> <a href="index.php"> Home </a>&nbsp; / &nbsp; </li>
                                <li>login</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- inner header wrapper end -->

    <!-- login wrapper start -->
    <div class="login_wrapper fixed_portion float_left" id="login-box">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="login_top_box float_left">
                      
                        <form method="post" action="" class="login_form_wrapper" id="login-form">
                        <div class="text-cnter lead my-2"><?= $msg ?></div>
                            <div class="sv_heading_wraper heading_wrapper_dark dark_heading hwd">

                                <h3>Reset Your Password </h3>

                            </div>
                            <div class="form-group icon_form comments_form">

                                <input type="password" class="form-control require" name="pass" placeholder="Enter New Password *" 
                                minlength="7">
                             
                            </div>
                            <div class="form-group icon_form comments_form">

                                <input type="password" class="form-control require" name="cpass" placeholder="Confirm Password *">
                             
                            </div>
                       
                            <input type="submit" value="Reset Password" id="reset-btn" class="form-control Authbtn float-left">
                            
                            <div class="dont_have_account float_left">
                                <p>Don’t have an acount ? <a href="#" id="register-link">Sign in</a></p>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- login wrapper end -->
    
    

    <!-- payments wrapper start -->
    <?php include 'include/payment.php'; ?>
    <!-- payments wrapper end -->

    <!-- footer section start-->
    <?php include 'include/footer.php'; ?>
        <!-- footer section ends-->

<script type="text/javascript">
            
$(document).ready(function(){


//Forgot Password Ajax Request 
$("#forgot-btn").click(function(e){
    if($("#forgot-form")[0].checkValidity()){
        e.preventDefault();
        
        $("#forgot-btn").val("Please Wait...");

        $.ajax({
           url: 'config/action.php',
           method: 'post',
           data: $("#forgot-form").serialize()+'&action=forgot',
           success: function(response){
            $("#forgot-btn").val("Reset Password");
            $("#forgot-form")[0].reset();
            $("#forgotAlert").html(response);


           }
          
        });
    }
});


});
</script>
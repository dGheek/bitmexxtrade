<?php 

session_start();
if(isset($_SESSION['user'])){
    header('location:my_account.php');
    exit();
}

?>

<?php require_once 'config/config.php'; 
$refer="";
if(isset($_GET['ref'])){
    $refer = $_GET['ref'];
};


$activation_code = md5(rand());
$user_otp = rand(1000000, 999999);
?>

<?php include 'include/head.php'; ?>

    <!-- navi wrapper End -->


    <!-- navi wrapper End -->
    <!-- inner header wrapper start -->
    <!-- <div class="page_title_section">

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
    </div> -->
    <!-- inner header wrapper end -->

    <!-- login wrapper start -->
    <div class="login_wrapper  float_left" id="login-box">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="login_top_box float_left">
                        <div class="login_banner_wrapper">
                            <img src="assets/images/blogo2.png" alt="logo">
                            <div class="about_btn google_wrap float_left">

                                <a href="#">login with Gmail <i class="fab fa-google"></i></a>

                            </div>
                            <div class="jp_regis_center_tag_wrapper jb_register_red_or">
                                <h1><i class="fa fa-lock"></i></h1>
                            </div>
                        </div>

                        <form method="post" action="" class="login_form_wrapper" id="login-form">
                        <div id="loginAlert"></div>
                            <div class="sv_heading_wraper heading_wrapper_dark dark_heading hwd">

                                <h3>Welcome Back Login! </h3>

                            </div>
                            <div class="form-group icon_form comments_form">

                                <input type="text" class="form-control require" name="email" placeholder="Email Address*"
                                value="<?php if(isset($_COOKIE['email'])) {echo $_COOKIE['email']; } ?>">
                              
                            </div>
                            <div class="form-group icon_form comments_form">

                                <input type="password" class="form-control require" name="password" placeholder="Password *"
                                value="<?php if(isset($_COOKIE['password'])) {echo $_COOKIE['password']; } ?>">
                             
                            </div>
                            <div class="login_remember_box">
                                <label class="control control--checkbox">Remember me
                                    <input type="checkbox" name="rem" 
                                    value="<?php if(isset($_COOKIE['email'])) { ?> checked <?php } ?>">
                                    <span class="control__indicator"></span>
                                </label>
                                <a href="#" class="forget_password" id="forgot-link">
									Forgot Password
								</a>
                            </div>
                            <input type="submit" value="Sign In" id="login-btn" class="form-control Authbtn float-left">
                            
                            <div class="dont_have_account float_left">
                                <p>Don’t have an acount ? <a href="#" id="register-link">Sign up</a></p>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- login wrapper end -->
    
    
    <!-- Register wrapper start -->
    <div class="login_wrapper fixed_portion float_left" id="register-box" style="display: none;">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="login_top_box float_left">
                        <div class="login_banner_wrapper">
                            <img src="assets/images/blogo2.png" alt="logo">
                          
                            <div class="about_btn google_wrap float_left">
                                <a href="#">register with Gmail <i class="fab fa-pinterest-p"></i></a>
                            </div>

                            <div class="jp_regis_center_tag_wrapper jb_register_red_or">
                                <h1>OR</h1>
                            </div>

                        </div>
                        <form method="post" action="" class="login_form_wrapper" id="register-form">
                            <div id="regAlert"></div>
                            <div class="sv_heading_wraper heading_wrapper_dark dark_heading hwd">
                                <h3> Register With Email</h3>
                            </div>
                            
                            <div class="form-group icon_form comments_form">
                                <input type="text" class="form-control require" name="fname" placeholder="Full Name*" id="fname" required>
                            </div>

                            <div class="form-group icon_form comments_form">
                                <input type="text" class="form-control require" name="username" placeholder="User Name*" id="email" required>
                            </div>

                            <div class="form-group icon_form comments_form">
                                <input type="text" class="form-control require" name="email" placeholder="Email Address*" id="email" required>
                            </div>

                            <div class="form-group icon_form comments_form">
                                <input type="password" class="form-control require" placeholder="Password *" name="password" id="password" minlength="5" required>
                            </div>

                            <div class="form-group icon_form comments_form">
                                <input type="password" class="form-control require" placeholder="Confirm Password *" name="cpassword" id="cpassword" required>
                            </div>
                            
                            <div class="form-group icon_form comments_form">
                                <input type="hidden" class="form-control require" value="<?php echo $refer; ?>" name="referrer" id="referrer">
                            </div>
                            <div class="form-group icon_form comments_form">
                                <input type="hidden" class="form-control require" value="<?= $activation_code; ?>" name="activation_code" id="referrer">
                            </div>
                            <div class="form-group icon_form comments_form">
                                <input type="hidden" class="form-control require" value="<?= $user_otp; ?>" name="user_otp" id="referrer">
                            </div>

                            <div id="passError" class="text-danger font-weight-bold"></div>

                            <input type="submit" value="Sign Up" id="register-btn" class="form-control Authbtn float-left">
                               
                            <div class="dont_have_account float_left">
                                <p>Have an Account <a href="#" id="login-link">Sign In</a></p>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Register wrapper end -->


    <!-- Reste Password wrapper start -->
    <div class="login_wrapper fixed_portion float_left" id="forgot-box" style="display: none;">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="login_top_box float_left">
                        <div class="login_banner_wrapper">
                            <img src="assets/images/blogo2.png" alt="logo">

                            <div class="about_btn google_wrap float_left">
                                <a href="#">register with pinterest <i class="fab fa-pinterest-p"></i></a>
                            </div>

                            
                        </div>
                        <form method="post" action="" class="login_form_wrapper" id="forgot-form">
                        <div id="forgotAlert"></div>
                            <div class="sv_heading_wraper heading_wrapper_dark dark_heading hwd">

                                <h3>Enter Your Email Address!</h3>
                                </br>

                                <p>We will forward a password reset link to your email address 
                                please ensure your email is correct...</p>

                            </div>

                            <div class="form-group icon_form comments_form">
                                <input type="text" class="form-control require" name="email" id="femail" placeholder="Email Address*">
                            </div>
                         
                            <input type="submit" value="Reset Password" id="forgot-btn" class="form-control Authbtn float-left">
                            
                            <div class="dont_have_account float_left">
                            <p>Remember Your Password? <a href="#" id="back-link">Sign In</a></p>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Reset Password wrapper end -->

    <!-- footer section start-->
    <?php include 'include/footer.php'; ?>
        <!-- footer section ends-->

<script type="text/javascript">
            
$(document).ready(function(){

$("#register-link").click(function(){
    $("#login-box").hide();
    $("#register-box").show();
});

$("#login-link").click(function(){
    $("#register-box").hide();
    $("#login-box").show();
});

$("#forgot-link").click(function(){
    $("#login-box").hide();
    $("#forgot-box").show();
});

$("#back-link").click(function(){
    $("#forgot-box").hide();
    $("#login-box").show();
});


// Registeration with ajax request
$("#register-btn").click(function(e){
  if($("#register-form")[0].checkValidity()){
      e.preventDefault();
      $("#register-btn").val("Please Wait...");
      if($("#password").val() != $("#cpassword").val()){
       $("#passError").text("Password did not match");
       $("#register-btn").val("Sign Up");
      }else{
        $("#passError").text("");
        $.ajax({
            url: 'config/action.php',
            method: 'post',
            data: $("#register-form").serialize()+'&action=register',

            success: function(response){
               
            $("#register-btn").val("Sign Up");
             if(response === 'register'){
                 window.location = 'my_account.php';
                 
             }else{
                 $("#regAlert").html(response);
             } 
            
            }
        });
      }
      
  }
});


// Ajax request For Loging Form
$("#login-btn").click(function(e){
  if($("#login-form")[0].checkValidity()){
      e.preventDefault();
      $("#login-btn").val("Please Wait...");

        $.ajax({
            url: 'config/action.php',
            method: 'post',
            data: $("#login-form").serialize()+'&action=login',

            success: function(response){
                
            $("#login-btn").val("Sign In");

            if(response === 'login'){
                 window.location = 'my_account.php';
                 
             }else{
                 $("#loginAlert").html(response);
             
            }
        }

        });
    }
     
});


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
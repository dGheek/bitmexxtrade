<?php 
require_once 'config/session.php';

?>



<?php include 'include/head.php'; ?>

    <!-- cp navi wrapper Start -->
   
<?php include 'include/navbar.php'; ?>
    <!-- navi wrapper End -->
    <!-- inner header wrapper start -->
    <!-- inner header wrapper end -->
	<?php include 'include/sidebar.php'; ?>
        <!-- Main section Start -->
         <div class="l-main">         
         
         <div class="account_top_information">
       <div class="account_overlay"></div>
</div>
<?php if($verified == 'Not Verified!'):  ?>
                    <div class="alert alert-success alert-dismissable text-center mt-2 m-0">
                    <button class="close" type="button" data-dismiss="alert">&times;</button>
                    <strong>Your Email Address is not Verified, Please Check your mail box to Verify Your Email.! </strong>
                    </div>
                    <?php endif; ?> 
            <!--  profile wrapper start -->
 <div class="view_profile_wrapper_top float_left">
<div class="row">

    <div class="col-md-12 col-lg-12 col-sm-12 col-12">
        <div class="sv_heading_wraper">

            <h3>profile</h3>

        </div>
<div id="verifyEmailAlert"></div>
    </div>
    <div class="col-md-12 col-lg-12 col-sm-12 col-12">
        <div class="view_profile_wrapper float_left">
            <div class="row">
                <div class="col-md-12 col-lg-12 col-sm-12 col-12">
                    <div class="profile_view_img">

                        <?php if(!$cphoto): ?>
                        <img src="assets/images/user.png" alt="post_img">
                        <?php else: ?>
                        <img src="<?= 'assets/images/'.$cphoto; ?>" alt="post_img">
                        <?php endif; ?>

                    </div>
                    <div class="profile_width_cntnt">
                        <h4><?= $cname; ?></h4>

                        <div class="width_50 about_btn float_left">
                      
                    <ul>
                        <li>
                            <a href="#" data-toggle="modal" data-target="#editProfile">Edit Profile</a>
                    
                        </li>
                       
                       
                    </ul>
                    
                        </div>
                        
                    </div>
                </div>

                <div class="col-xl-6 col-md-12 col-lg-12 col-sm-12 col-12">
                    <ul class="profile_list">
                    
                        <li><span class="detail_left_part">Full Name</span> <span class="detail_right_part"><?= $cname; ?></span>
                        </li>
                        <li><span class="detail_left_part">User Name: </span> <span class="detail_right_part"><?= $cusername; ?></span>
                        </li>
                        <li><span class="detail_left_part">Email</span> <span class="detail_right_part"><?= $cEmail; ?></span>
                        </li>
                        <li><span class="detail_left_part">Mobile No</span> <span class="detail_right_part"><?= $cphone; ?></span>
                        </li>
                        <li><span class="detail_left_part">Address</span> <span class="detail_right_part"><?= $address; ?></span>
                        </li>
                        <li><span class="detail_left_part">City</span> <span class="detail_right_part"><?= $city; ?></span>
                        </li>
        
                    </ul>
                </div>
                <div class="col-xl-6 col-md-12 col-lg-12 col-sm-12 col-12">
                    <ul class="profile_list">
                    
                    <li><span class="detail_left_part">Country:</span> <span class="detail_right_part"><?= $country; ?></span>
                    </li>
                     <li><span class="detail_left_part">Referral Name:</span> <span class="detail_right_part"><?= $creferrer; ?></span>
                     </li>
                        
                    <li><span class="detail_left_part">Paypal:</span> <span class="detail_right_part">azamsheikh645@gmail.com</span>
                    </li>
                     
                    <li><span class="detail_left_part">Bitcoin Address</span> <span class="detail_right_part"><?= $wallet_address; ?></span>
                    </li>
                    <?php if($verified == 'Not Verified!'): ?>
                    <li><span class="detail_left_part">Email Not Verified</span> <span class="detail_right_part"><a href="" id="verifyEmail">Click Here</a></span></li>
                    <?php endif; ?>

                    </ul>
                </div>

                <div class="about_btn float_left">
               
                    <ul>
                        <li>
                            <a href="#" data-toggle="modal" data-target="#changePassword">Change Passord</a>
                        </li>
                    </ul>
                </div>
            </div>

            

<!--  Edit profile Modal Start -->
            <div class="modal fade question_modal" id="editProfile" role="dialog">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                                <div class="sv_question_pop float_left">
                                    <h1>Edit Your Profile</h1>
                                  
                                    <div class="search_alert_box float_left">
                                    <?php if(!$cphoto): ?>
                                     <img src="assets/images/user.png" alt="post_img">
                                     <?php else: ?>
                                    <img src="<?= 'config/uploads/'.$cphoto; ?>" alt="post_img">
                                     <?php endif; ?>

                                    <form action="" method="post" id="profile-update-form">
                                    <div class="change_field">  
                                    <div class="form-group">
                                    <input type="tel" name="phone" id="phone" value="<?= $cphone; ?>" placeholder="Phone Number">
                                    </div>
                                    <div class="form-group">
                                    <input type="address" name="address" id="address" value="<?= $address; ?>" placeholder="Address">
                                    </div>
                                    <div class="form-group">
                                    <input type="city" name="city" id="city" value="<?= $city; ?>" placeholder="City">
                                    </div>
                                    <div class="form-group">
                                    <input type="country" name="country" id="country" value="<?= $country; ?>" placeholder="Country">
                                    </div>
                                </div>
                                        <div id="profileAlert"></div>
                                     <div class="form-group">
                                        </br>
                                    <input type="submit" value="Make Changes" id="profileUpdateBtn" class="form-control Authbtn float-left">
                                    </div>
        
                                  
                                    </form>
                        </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!--  Edit profile Modal end -->
            <!--  Chnage Paasord Modal Start -->
            <div class="modal fade question_modal" id="changePassword" role="dialog">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                                <div class="sv_question_pop float_left">
                                    <div id="changePassAlert"></div>
                                    <h1>Change Password</h1>
                                    <div class="search_alert_box float_left">
                                   
                                    <form action="" method="post" id="change-pass-form">
                                    <div class="form-group change_field">
                                    <input type="password" class="" name="curpass" id="curpass" placeholder="Current Password*"
                                    required>
                                    </div>
                                    <div class="form-group change_field">
                                    <input type="password" class="" name="newpass" id="newpass" placeholder="New Password*" minlength="7" 
                                    required>
                                    </div>
                                    <div class="form-group change_field">
                                    <input type="password" class="" name="cnewpass" id="cnewpass" placeholder="Confirm Password*" 
                                    minlength="7" required>
                                    </div>
                                    <div class="form-group">
                                        <p id="ChangePassError" class="text-danger"></p>
                                    </div>
                                    <div class="question_sec float_left">
                                    <input type="submit" value="Make Changes" name="changepass" id="changePassBtn" class="form-control Authbtn float-left">
                                    </div>
                             </form>
                        </div> 
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!--  Chnage Password Modal end -->
        </div>
    </div>
</div>
</div>
<!--  profile wrapper end -->

            <!--  footer  wrapper start -->
           <?php include 'include/footer.php'; ?>

           
<script type="text/javascript">
            
            $(document).ready(function(){
            //Update Profile Ajax Request 
             $("#profileUpdateBtn").click(function(e){
                e.preventDefault();
                $("#profileUpdateBtn").val("Updating Details...");

                $.ajax({
                    url: 'config/process.php',
                    method: 'post',
                    data: $("#profile-update-form").serialize()+'&action=updateProfile',
                    success: function(response){
                        $("#profileAlert").html(response);
                        
                    }
                });

                $("#profileUpdateBtn").val("Updated");
            });
            
// Change Password with ajax request

$("#changePassBtn").click(function(e){
  if($("#change-pass-form")[0].checkValidity()){
      e.preventDefault();
      $("#changePassBtn").val("Please Wait...");
      if($("#newpass").val() != $("#cnewpass").val()){
       $("#ChangePassError").text("Password did not match");
       $("#changePassBtn").val("Change Password");
      }else{
    
        $.ajax({
            url: 'config/process.php',
            method: 'post',
            data: $("#change-pass-form").serialize()+'&action=change_pass',

            success: function(response){
          $("#changePassAlert").html(response);
          $("#changePassBtn").val("Change Password");
          $("#ChangePassError").text(" ");
          $("#change-pass-form")[0].reset(); 
            }
        });
      }
      
  }
});

    // Ajax Request to verify email address 
    $("#verifyEmail").click(function(e){
     e.preventDefault();
     $(this).text('Please Wait...');

     $.ajax({
        url: 'config/process.php',
        method: 'post',
        data: { action: 'verify_email' },
        success:function(response){
            $("#verifyEmailAlert").html(response);
            $("#verifyEmail").text('Click Here');
        }
     });
    });

            
 });
</script>
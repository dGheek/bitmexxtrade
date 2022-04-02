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
         
              
            <!--  profile wrapper start -->
            <div class="view_profile_wrapper_top float_left">

<div class="row">

    <div class="col-md-12 col-lg-12 col-sm-12 col-12">
    <div class="account_top_information">
       <div class="account_overlay"></div>
        <?php if($verified == 'Not Verified!'):  ?>
                    <div class="alert alert-success alert-dismissable text-center mt-2 m-0">
                    <button class="close" type="button" data-dismiss="alert">&times;</button>
                    <strong>Your Email Address is not Verified, Please Check your mail box to Verify Your Email.! </strong>
                    </div>
                    <?php endif; ?> 
</div>
        <div class="sv_heading_wraper">

            <h3>Payment details</h3>

        </div>
<div id="verifyEmailAlert"></div>
    </div>
    <div class="col-md-12 col-lg-12 col-sm-12 col-12">
        <div class="view_profile_wrapper float_left">
            <div class="row">
                <div class="col-md-12 col-lg-12 col-sm-12 col-12">
                 
                    <div class="profile_width_cntnt">
                    <div class="width_50 about_btn float_left">
                    <ul>
                        <li><a href="#" data-toggle="modal" data-target="#editpaymentDetails">Update Details</a></li>
                    </ul>
                    </div>
                        
                    </div>
                </div>

                <div class="col-xl-6 col-md-12 col-lg-12 col-sm-12 col-12">
                    <ul class="profile_list" id="">  
            <li><span class="detail_left_part">Wallet Name</span> <span class="detail_right_part">Bitcon</span>
            </li>
            <li><span class="detail_left_part">Wallet Address</span> <span class="detail_right_part"><?= $wallet_address; ?></span>
            </li>
         
                    </ul>
                </div>
            
            </div>

            

<!--  Edit profile Modal Start -->
            <div class="modal fade question_modal" id="editpaymentDetails" role="dialog">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                                <div class="sv_question_pop float_left">
                                    <h1>Edit Your Payments details</h1>
                                    <div class="search_alert_box float_left">

                                    <form action="" method="post" id="payment-details-form">
                                    <div class="change_field">  
                                    <div class="form-group">
                                    <input type="text" name="wallet_name"  value="Bitcoin" >
                                    </div>
                                  
                                    <div class="form-group">
                                    <label for="wallet_address">Bitcoin Address</label>
                                    <input type="text" name="wallet_address" value="<?= $wallet_address; ?>">
                                    </div>  
                                </div>
                                
                                <div class="form-group">
                                        </br>
                                        <div id="updateAlert"></div>
                                    <input type="submit" value="Make Changes" id="paymentDetailsBtn" class="form-control Authbtn float-left">
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

             // Add local Bank Information
             $("#paymentDetailsBtn").click(function(e){
                e.preventDefault();
                $("#paymentDetailsBtn").val("Updating Details...");

                $.ajax({
                    url: 'config/process.php',
                    method: 'post',
                    data: $("#payment-details-form").serialize()+'&action=updatePaymentDetails',
                    success: function(response){
                        $("#updateAlert").html(response);
                        
                    }
                });

                $("#paymentDetailsBtn").val("Updated");
            });

            
         /// Display Bank adetails for Loggged in Users  
        displayBankdetails();
        function displayBankdetails(){
        $.ajax({
            url: 'config/process.php',
            method: 'post',
            data: { action: 'display_bank_details' },
            success: function(response){
               $("#showBankDetails").html(response);
            }
        });
        }

         

  
            
 });
</script>
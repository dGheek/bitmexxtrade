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

            <h3>Finish Payment</h3>

        </div>
<div id="verifyEmailAlert"></div>
    </div>
    <div class="col-md-12 col-lg-12 col-sm-12 col-12">
        <div class="view_profile_wrapper float_left">
            <div class="row">
              
                <div class="col-xl-6 col-md-12 col-lg-12 col-sm-12 col-12">
                    <ul class="profile_list">
                    
                        <!-- <li><span class="detail_left_part">Order ID</span> <span class="detail_right_part"></span>
                        </li>
                        <li><span class="detail_left_part">Investment Package </span> <span class="detail_right_part"></span>
                        </li>
                        </li> -->
                        
                        <!-- <li><span class="detail_left_part">Deposit Amount</span> <span class="detail_right_part"></span> -->
                        <li><span class="detail_left_part">Bitcoin Wallet for payment</span> <span class="detail_right_part">
                        bc1q7xv6ukmv4uw5wnq7c5lqurfvgnlert4wu3jnyf
                        </br>
                        <a href="https://www.bitcoinqrcodemaker.com"><img src="https://www.bitcoinqrcodemaker.com/api/?style=bitcoin&amp;address=bc1q7xv6ukmv4uw5wnq7c5lqurfvgnlert4wu3jnyf" alt="Bitcoin QR Code Generator" height="300" width="300" border="0" /></a></span>
                        </li>
                        <li><span class="detail_left_part">IMPORTANT</span> <span class="detail_right_part">Please Send the exact amount to the bitcoin wallet address above, once we recieve your payment your account will be credited instantly...</span>
                        </li>
                        <li><span class="detail_left_part">Upload POP</span> <span class="detail_right_part">
                        <form action="" method="post" id="pop_form">
                        <input type="hidden" name="payername" value="<?= $cusername ?>">
                        <input type="file" name="pop" placeholder="">

                        </br>
                        <div id="popAlert"></div>
                        </br>

                        <button type="submit" class="btn btn-secondary">Confirm Payment</button>
                        </form>
                        </span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<!--  profile wrapper end -->

            <!--  footer  wrapper start -->
           <?php include 'include/footer.php'; ?>

           
<script type="text/javascript">
            
            $(document).ready(function(){
            
     //Update Profile image Ajax Request UpdateProfileBtn
     $("#pop_form").submit(function(e){
                    e.preventDefault();
    
                    $.ajax({
                       url: 'config/process.php',
                       method: 'post',
                       processData:false,
                       contentType:false,
                       Cache:false,
                       data: new FormData(this),
                       success: function(response){
                          $("#popAlert").html(response);
                       //location.reload();
            
                       }
                      
                    });
                
            });

        
 });
</script>
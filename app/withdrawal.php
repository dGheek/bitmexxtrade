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
                    
          <!--  my account wrapper start -->
            
            <!--  my account wrapper end -->    
            <!--  account wrapper start -->
   
             <!--investment plan wrapper start -->
    <div class="investment_plans index2_investment_plans index3_investment_plans float_left">
         
    <div class="account_top_information">
       <div class="account_overlay"></div>
</div>
<?php if($verified == 'Not Verified!'):  ?>
                    <div class="alert alert-success alert-dismissable text-center mt-2 m-0">
                    <button class="close" type="button" data-dismiss="alert">&times;</button>
                    <strong>Your Email Address is not Verified, Please Check your mail box to Verify Your Email.! </strong>
                    </div>
                    <?php endif; ?> 
<div class="container">
    <div class="row">

    <!--  Make Deposite form Start -->
    <div class="payment_mode_wrapper float_left" id="withrawal-box">
                <div class="row">
                    <div class="col-md-12 col-lg-12 col-sm-12 col-12">
                        <div class="sv_heading_wraper">
                            <h3>Make Withdrawal</h3>
                        </div>

                    </div>
                    <div class="col-md-12 col-lg-12 col-sm-12 col-12">
                        <div class="payment_radio_btn_wrapper float_left">

                        <form action="" method="post" id="withdrawal-form">  

                        <div class="form-group">
                          <input type="hidden" class="form-control" name="recievername" value="<?= $cusername; ?>" id="" placeholder="">
                          </div>

                          <div class="form-group">
                          <input type="hidden" class="form-control" name="wallet_address" value="<?= $wallet_address; ?>" id="" placeholder="">
                          </div>

                        <div class="radio form-group">
                                <input type="radio" name="payment_method" id="poa" value="bitcoin" checked="">
                                <label for="poa"><img src="assets/images/partner3.png" alt="img"></label>
                            </div>

                          <div class="form-group">
                          <label for="amount">Withdrawal Amount:</label>
                          <input type="number" class="form-control" name="amount" id="amount" placeholder="$10 - $100">
                          </div>

                          <div id="withdrawalAlert"></div>
                            <div class="about_btn float_left">

                                <ul>
                                    <li>
                                        <a href="#" id="withdrawalBtn">submit</a>
                                    </li>
                                </ul>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!--  Make Withdrawal Form end -->

    </div>
</div>
</div>
<!--<div class="btm_investment_wrapper float_left">
<div class="investment_overlay"></div>
</div> -->
            

            <!--  footer  wrapper start -->
           <?php include 'include/footer.php'; ?>

                 
<script type="text/javascript">
$(document).ready(function(){
           
            // Make Withdrawal Ajax Request 
            $("#withdrawalBtn").click(function(e){
                e.preventDefault();
                $("#withdrawalBtn").val("Please wait..");

                $.ajax({
                    url: 'config/process.php',
                    method: 'post',
                    data: $("#withdrawal-form").serialize()+'&action=withdrawal',
                    success: function(response){
                        
                     $("#withdrawalAlert").html(response); 
                      
                    }
                });
            });


 });
</script>
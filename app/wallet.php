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
         
    </br>
            <?php if($verified == 'Not Verified!'):  ?>
                    <div class="alert alert-info alert-dismissable text-center mt-2 m-0">
                    <button class="close" type="button" data-dismiss="alert">&times;</button>
                    <strong>Your Email Address is not Verified, Please Check your mail box to Verify Your Email.! </strong>
                    </div>
                    <?php endif; ?>   
            </br>
            </br>

<div class="container">
    <div class="row">

    <!--  Make deposit form Start -->
    <div class="payment_mode_wrapper float_left" id="withrawal-box" style="display: none;">
                <div class="row">
                    <div class="col-md-12 col-lg-12 col-sm-12 col-12">
                        <div class="sv_heading_wraper">

                            <h3>Make Withdrawal</h3>

                        </div>

                    </div>
                    <div class="col-md-12 col-lg-12 col-sm-12 col-12">
                        <div class="payment_radio_btn_wrapper float_left">

                        <form action="" method="post" id="withdrawal-form">  
                            <div class="radio form-group">
                                <input type="radio" name="payment_type" id="paypal" value="paypal" checked="">
                                <label for="poa"><img src="assets/images/partner1.png" alt="img"></label>
                            </div>
                            <div class="radio form-group">
                                <input type="radio" name="payment_type" id="master_card" value="master_card">
                                <label for="job"><img src="assets/images/partner4.png" alt="img"></label>
                            </div>
                            <div class="radio form-group">
                                <input type="radio" name="payment_type" id="payoneer" value="payoneer">
                                <label for="pay1"><img src="assets/images/partner2.png" alt="img"></label>
                            </div>
                            <div class="form-group">
                          <input type="hidden" class="form-control" name="package" id="package" value="gold">
                          </div>
                          <div class="form-group">
                          <label for="amount">Investment Amount:</label>
                          <input type="number" class="form-control" name="amount" id="amount" placeholder="$10 - $100">
                          </div>
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
            <!--  Make Deposit Form end -->

             <!--  Make deposit form -->
    <div class="payment_mode_wrapper float_left" id="deposit-box" style="display: none;">
                <div class="row">
                    <div class="col-md-12 col-lg-12 col-sm-12 col-12">
                        <div class="sv_heading_wraper">

                            <h3>Make Deposit</h3>

                        </div>

                    </div>
                    <div class="col-md-12 col-lg-12 col-sm-12 col-12">
                        <div class="payment_radio_btn_wrapper float_left">

                        <form action="" method="post" id="deposit-form">  
                            <div class="radio form-group">
                                <input type="radio" name="payment_type" id="paypal" value="paypal" checked="">
                                <label for="poa"><img src="assets/images/partner1.png" alt="img"></label>
                            </div>
                            <div class="radio form-group">
                                <input type="radio" name="payment_type" id="master_card" value="master_card">
                                <label for="job"><img src="assets/images/partner4.png" alt="img"></label>
                            </div>
                            <div class="radio form-group">
                                <input type="radio" name="payment_type" id="payoneer" value="payoneer">
                                <label for="pay1"><img src="assets/images/partner2.png" alt="img"></label>
                            </div>
                            <div class="form-group">
                          <input type="hidden" class="form-control" name="package" id="package" value="gold">
                          </div>
                          <div class="form-group">
                          <label for="amount">Investment Amount:</label>
                          <input type="number" class="form-control" name="amount" id="amount" placeholder="$10 - $100">
                          </div>
                            <div class="about_btn float_left">

                                <ul>
                                    <li>
                                        <a href="#" id="depositBtn">submit</a>
                                    </li>
                                </ul>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!--  payment mode wrapper end -->
        
    </div>
</div>
</div>
<!--<div class="btm_investment_wrapper float_left">
<div class="investment_overlay"></div>
</div> -->
            

            <!--  footer  wrapper start -->
           <?php include 'include/footer2.php'; ?>

                 
<script type="text/javascript">
$(document).ready(function(){
           
    $("#withdrawal-link").click(function(){
    $("#withdrawal-box").show();
    
});

      // Make Depossit Ajax Request     
    $('#makeDepositBtn').click(function(e){
        e.preventDefault();
        $('$makeDepositBtn').val("Please wait...");

        $.ajax({
            url: 'config/process.php',
            method: 'post',
            data: $("#makeDeposit-form").serialize()+'&action=deposit',
            success:function(response){
                console.log(response);
            }
        });
      });

            // Make Withdrawal Ajax Request 
            $("#makeWithDrawalBtn").click(function(e){
                e.preventDefault();
                $("#makeWithDrawalBtn").val("Please wait..");

                $.ajax({
                    url: 'config/process.php',
                    method: 'post',
                    data: $("#makeWithdrawal-form").serialize()+'&action=withdraw',
                    success: function(response){
                        console.log(response);
                    }
                });
            });

            // submit KYC Ajax Request 
            $("#submitKycBtn").click(function(e){
                e.preventDefault();
                $("submmitKycbtn").val("Please wait...");

                $.ajax({
                    url: 'config/process.php',
                    method: 'post',
                    data: $("#submitKyc-form").serialize()+'&action=submitKyc',
                    success: function(response){
                        console.log(response);

                    }
                });
            });

            //submit ticket ajax Request
            $("#submitTicketBtn").click(function(e){
                e.preventDefault();
                $("#submitTicket").val("Please wait...");

                $.ajax({
                    url: 'config/process.php',
                    method: 'post',
                    data: $("#submitTeck-form").serialize()+'&action=submitTicket',
                    success: function(response){
                        console.log(response)
                    }
                });
            });

            // Add Crypto currency wallet
            $("#addWalletBtn").click(function(e){
                e.preventDefault();
                $("#addWalletBtn").val("Please wait...");

                $.ajax({
                    url: 'config/process.php',
                    method: 'post',
                    data: $("#addWallet-form").serialize()+'&action=addWallet',
                    success: function(response){
                        console.log(response)
                    }
                });
            });

             // Add local Bank Information
             $("#addBankBtn").click(function(e){
                e.preventDefault();
                $("#addBankBtn").val("Please wait...");

                $.ajax({
                    url: 'config/process.php',
                    method: 'post',
                    data: $("#addBank-form").serialize()+'&action=addBank',
                    success: function(response){
                        console.log(response)
                    }
                });
            });


 });
</script>
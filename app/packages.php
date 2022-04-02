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
        <div class="plan_investment_wrapper float_left">

        <div class="account_top_information">
       <div class="account_overlay"></div> 
</div>

<?php if($verified == 'Not Verified!'):  ?>
                    <div class="alert alert-success alert-dismissable text-center mt-2 m-0">
                    <button class="close" type="button" data-dismiss="alert">&times;</button>
                    <strong>Your Email Address is not Verified, Please Check your mail box to Verify Your Email.! </strong>
                    </div>
                    <?php endif; ?>
                <div class="row">
                    <div class="col-md-12 col-lg-12 col-sm-12 col-12" id="package-title">
                        <div class="sv_heading_wraper">

                            <h3>investment Packages</h3>

                        </div>

                    </div>
                    <div class="col-xl-3 col-md-6 col-lg-6 col-sm-6 col-12" id="gold-box">
                        <div class="investment_box_wrapper sv_pricing_border float_left height_box">
                            <div class="investment_icon_circle parpal_color">
                                <i class="flaticon-movie-tickets"></i>
                            </div>
                            <div class="investment_border_wrapper"></div>
                            <div class="investment_content_wrapper">
                                <h1><a href="#">Flexible Funds</a></h1>
                                <p>
                                    <br> Up to 30% Per 10days
                                    <br> Multiple Trades Allowed
                                    <br> USD/BTC Allowed
                                    <br> WithDraw From day 10
                                    <br> Unlimited support
                                    </p>
                            </div>
                            <div class="about_btn plans_btn bg_btn_color">
                                <ul>
                                    <li>
                                        <a href="#" id="gold-link">choose plan</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6 col-lg-6 col-sm-6 col-12" id="copper-box">
                        <div class="investment_box_wrapper sv_pricing_border float_left height_box height_box_2">
                            <div class="investment_icon_circle red_info_circle">
                                <i class="flaticon-invoice"></i>
                            </div>
                            <div class="investment_border_wrapper red_border_wrapper"></div>
                            <div class="investment_content_wrapper red_content_wrapper">
                                 <h1><a href="#">Fixed Funds</a></h1>
                                <p>
                                    <br> Up to 50% Per 15days
                                    <br> Multiple Trades Allowed
                                    <br> USD/BTC Allowed
                                    <br> WithDraw From day 15
                                    <br> Unlimited support
                                    </p>
                            </div>
                            <div class="about_btn plans_btn red_btn_plans">
                                <ul>
                                    <li>
                                        <a href="#" id="copper-link">choose plan</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6 col-lg-6 col-sm-6 col-12" id="bronze-box">
                        <div class="investment_box_wrapper sv_pricing_border float_left height_box">
                            <div class="investment_icon_circle blue_icon_circle">
                                <i class="flaticon-progress-report"></i>
                            </div>
                            <div class="investment_border_wrapper blue_border_wrapper"></div>
                            <div class="investment_content_wrapper blue_content_wrapper">
                                 <h1><a href="#">Long Term Fixed Funds</a></h1>
                                <p>
                                    <br> Up to 100% Per 50days
                                    <br> Multiple Trades Allowed
                                    <br> USD/BTC Allowed
                                    <br> WithDraw From day 50
                                    <br> Unlimited support
                                    </p>
                            </div>
                            <div class="about_btn plans_btn blue_btn_plans">
                                <ul>
                                    <li>
                                        <a href="#" id="bronze-link">choose plan</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    
                </div>

            </div>
            <!--  profile wrapper end -->

            <!--  payment mode wrapper start -->
             <!--  payment mode wrapper start -->
             <div class="payment_mode_wrapper float_left" id="gold-pay-box" style="display: none;">
                <div class="row">
                    <div class="col-md-12 col-lg-12 col-sm-12 col-12">
                        <div class="sv_heading_wraper">

                            <h3>Flexible Funds</h3>

                        </div>

                    </div>
                    
                    <div class="col-md-12 col-lg-12 col-sm-12 col-12">
                        <div class="payment_radio_btn_wrapper float_left">

                        <form action="" method="post" id="gold-form">
                    
                        <div class="form-group">
                          <input type="hidden" class="form-control" name="investor" id="package" value="<?= $cusername ?>">
                          </div>

                          <div class="form-group">
                          <input type="hidden" class="form-control" name="package" id="package" value="Flexible Funds">
                          </div>

                          <div class="form-group">
                          <input type="hidden" class="form-control" name="roi" id="roi" value="50">
                          </div>

                          <div class="form-group">
                          <input type="hidden" class="form-control" name="no_of_days" id="no_of_days" value="2">
                          </div>
                          
                          <div class="form-group">
                          <label for="amount">Investment Amount:</label>
                          <input type="number" class="form-control" name="amount" id="minGoldDeposit" placeholder="$100 - $1000">
                          </div>
                          <div id="minGoldAlert"></div>
                          <div id="goldPayAlert"></div>
                            <div class="about_btn float_left">
                                <ul>
                                    <li>
                                        <a href="#" id="goldPayBtn">submit</a>
                                    </li>
                                </ul>
                            </div>
                            </form>
                          
                        </div>
                    </div>
                </div>
            </div>
            <!--  payment mode wrapper end -->
            
            <!--  payment mode wrapper end -->
            <div class="payment_mode_wrapper float_left" id="empty-box">
                <div class="row">
                    <div class="col-md-12 col-lg-12 col-sm-12 col-12">
                        <div class="sv_heading_wraper">
                        </div>
                    </div>
                    </div>
</div>
            <!--  footer  wrapper start -->
           <?php include 'include/footer.php'; ?>

            <!--  Make deposit form -->
           
            <!--  payment mode wrapper end -->

<script type="text/javascript">
$(document).ready(function(){
 
$("#gold-link").click(function(){
    $("#package-title").hide();
    $("#gold-box").hide();
    $("#copper-box").hide();
    $("#bronze-box").hide();
    $("#silver-box").hide();
    $("#empty-box").hide();

    $("#gold-pay-box").show();
});

$("#copper-link").click(function(){
    $("#package-title").hide();
    $("#gold-box").hide();
    $("#copper-box").hide();
    $("#bronze-box").hide();
    $("#silver-box").hide();
    $("#empty-box").hide();

    $("#copper-pay-box").show();
});

$("#bronze-link").click(function(){
    $("#package-title").hide();
    $("#gold-box").hide();
    $("#copper-box").hide();
    $("#bronze-box").hide();
    $("#silver-box").hide();
    $("#empty-box").hide();

    $("#bronze-pay-box").show();
});

$("#silver-link").click(function(){
    $("#package-title").hide();
    $("#gold-box").hide();
    $("#copper-box").hide();
    $("#bronze-box").hide();
    $("#silver-box").hide();
    $("#empty-box").hide();

    $("#silver-pay-box").show();
});

            

                  
// Make Investment Ajax Request
$("#goldPayBtn").click(function(e){
      e.preventDefault();
      $("#goldPayBtn").val("Please Wait...");

      if($("#minGoldDeposit").val() < 100 || $("#minGoldDeposit").val() > 1000){
        $("#minGoldAlert").text("Min Deposit is $100 - $1000 for this Package");

      }else{

        $("#minGoldAlert").text(""); 
        
        $.ajax({
            url: 'config/process.php',
            method: 'post',
            data: $("#gold-form").serialize()+'&action=goldPay',
            success: function(response){
    
                $("#goldPayAlert").html(response);

                 console.log(response);
               /*  setTimeout(function() {
                 window.location.href = "makepayment.php";
                }, 2000); 
            */
            } 
        });
    } 

 
      }); 
      
 });
</script>
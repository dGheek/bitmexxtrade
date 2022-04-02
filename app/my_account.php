<?php 
require_once 'config/session.php';

try{
    $sql = "SELECT * FROM investment WHERE investor = '$cusername' AND status = 1";
    $stmt = $cUser->connection->prepare($sql);
    $stmt->execute();
    $countInvestment = $stmt->rowCount();
    $fetchCountedInvestment = $stmt->fetchAll(PDO::FETCH_ASSOC);
     
   
   
}catch(PDOException $e){
    echo 'Error : '.$e->getMessage();
}

// Sum Total iNvestment for user

/* try{
    $sql = "SELECT SUM(amount) AS Total FROM investment WHERE investor = '$cusername'";
        $stmt = $cUser->connection->prepare($sql);
        $stmt->execute(['investor'=>$cusername]);
        $totalInvestment = $stmt->fetch(PDO::FETCH_ASSOC);

        return $totalInvestment['Total'];
   
}catch(PDOException $e){
    echo 'Error : '.$e->getMessage();
} */

$totalInvestment = $cUser->sumAllinvestment($cusername);

?>

<?php include 'include/head.php'; ?>

    <!-- cp navi wrapper Start -->
   
<?php include 'include/navbar.php'; ?>
    <!-- navi wrapper End -->
    <!-- inner header wrapper start -->      
    <!-- inner header wrapper end -->
          
          <!-- inner header wrapper start -->
  

<?php include 'include/sidebar.php'; ?>

<!-- inner header wrapper end -->
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
                   
          <div class="investment_plans index2_investment_plans index3_investment_plans float_left">
             
            <div class="container">
            <div class="row">

            
        <div class="col-xl-3 col-md-6 col-lg-6 col-sm-6 col-12">
            <div class="investment_box_wrapper index2_investment_box_Wraper index3_investment_box_Wraper float_left">
                <img src="assets/images/in2.png" alt="img">
                <div class="investment_icon_circle red_info_circle">
                    <i class="far fa-money-bill-alt"></i>
                </div>
                <div class="investment_border_wrapper red_border_wrapper"></div>
                <div class="investment_content_wrapper red_content_wrapper">
                    <h5><a href="#">$<?= $balance ;?>.00</a></h5> 
                    <div class="line_shape line_shape2"></div>
                    <p>Balance</p>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6 col-lg-6 col-sm-6 col-12">
            <div class="investment_box_wrapper index2_investment_box_Wraper index3_investment_box_Wraper float_left">
                <img src="assets/images/in1.png" alt="img">
                <div class="investment_icon_circle">
                    <i class="fa fa-business-time"></i>
                </div>
                <div class="investment_border_wrapper"></div>
                <div class="investment_content_wrapper">

                    <h5><a href="#"><?php echo $countInvestment; ?></a></h5>

                    <div class="line_shape line_shape2"></div>
                    <!-- <p>Active Investment </br>Up to 5% for 20 Hourly</p> -->
                    <p>Active Investment</p>
                </div>
              
            </div>
        </div>
      
        <div class="col-xl-3 col-md-6 col-lg-6 col-sm-6 col-12">
            <div class="investment_box_wrapper index2_investment_box_Wraper index3_investment_box_Wraper float_left">
                <img src="assets/images/in4.png" alt="img">
                <div class="investment_icon_circle blue_icon_circle">
                    <i class="fa fa-chart-line "></i>
                </div>
                <div class="investment_border_wrapper blue_border_wrapper"></div>
                <div class="investment_content_wrapper blue_content_wrapper">
                    <h5><a href="#">$<?php echo $totalInvestment; ?>.00</a></h5>
                    <div class="line_shape line_shape2"></div>
                    <p>Total investment</p>
            </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6 col-lg-6 col-sm-6 col-12">
            <div class="investment_box_wrapper index2_investment_box_Wraper index3_investment_box_Wraper float_left height_box">
                <img src="assets/images/in3.png" alt="img">
                <div class="investment_icon_circle green_info_circle">
                    <i class="fas fa-users"></i>
                </div>
                <div class="investment_border_wrapper green_border_wrapper"></div>
                <div class="investment_content_wrapper green_content_wrapper">
                    <h5><a href="#">$<?= $ref_bonus; ?></a></h5>
                    <div class="line_shape line_shape2"></div>
                    <p>Referral Bonus</p>
                </div>
              
            </div>
        </div>

        </div>
      </div>
      <!-- TradingView Widget BEGIN -->
<div class="tradingview-widget-container">
  <div id="tradingview_7f1c3"></div>
  <div class="tradingview-widget-copyright"><a href="https://www.tradingview.com/symbols/NASDAQ-AAPL/" rel="noopener" target="_blank"><span class="blue-text">AAPL Chart</span></a> by TradingView</div>
  <script type="text/javascript" src="https://s3.tradingview.com/tv.js"></script>
  <script type="text/javascript">
  new TradingView.widget(
  {
  "width": 980,
  "height": 610,
  "symbol": "NASDAQ:AAPL",
  "interval": "D",
  "timezone": "Etc/UTC",
  "theme": "light",
  "style": "1",
  "locale": "en",
  "toolbar_bg": "#f1f3f6",
  "enable_publishing": false,
  "allow_symbol_change": true,
  "container_id": "tradingview_7f1c3"
}
  );
  </script>
</div>
<!-- TradingView Widget END -->
</div>
 <!--  my account wrapper end --> 
 
            </div>
</div>

 
            <!--  footer  wrapper start -->
<?php include 'include/footer.php'; ?>

    
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
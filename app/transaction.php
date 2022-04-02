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
        <?php if($verified == 'Not Verified!'):  ?>
                    <div class="alert alert-success alert-dismissable text-center mt-2 m-0">
                    <button class="close" type="button" data-dismiss="alert">&times;</button>
                    <strong>Your Email Address is not Verified, Please Check your mail box to Verify Your Email.! </strong>
                    </div>
                    <?php endif; ?> 
</div>
                  <!--  deposit wrapper start -->
             <div class="payment_mode_wrapper float_left">

<div class="row">

    <div class="col-md-12 col-lg-12 col-sm-12 col-12">
        <div class="sv_heading_wraper">

            <h3>My Transactions</h3>

        </div>
    </div>
</div>
<div class="crm_customer_table_main_wrapper deposit_tables float_left">
    <div class="row">
        <div class="col-md-12 col-lg-12 col-sm-12 col-12">
            <div class="deposit_tab_wrapper">
                <ul class="nav nav-tabs">
                    <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#home">My Deposits</a>
                    </li>
                    <li class="nav-item"> <a class="nav-link " data-toggle="tab" href="#menu1">My Withdrawals</a>
                    </li>
                </ul>
            </div>
        </div>

        <div class="col-md-12 col-lg-12 col-sm-12 col-12">
            <div class="tab-content">
                <div id="home" class="tab-pane active">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-12">
                            <div class="table-responsive" id="showDeposits">
                                
                            </div>
                        </div>
                    </div>
                </div>
                <div id="menu1" class="tab-pane fade">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-12">
                            <div class="table-responsive" id="showithdrawals">
                                
                                        
                            </div>
                        </div>
                    </div>
                </div>
                
                        
            </div>
        </div>
    </div>
</div>
</div>
<!--  deposit wrapper end -->

             
            <!--  profile wrapper end -->

             <!--  payment mode wrapper start -->
            
            <!--  payment mode wrapper end -->
           
            <!--  footer  wrapper start -->
           <?php include 'include/footer.php'; ?>

            <!--  Make deposit form -->
          
            <!--  payment mode wrapper end -->

<script type="text/javascript">
$(document).ready(function(){

  /// Display all Oders For Loggged in Users  
  displayUserDeposits();
        function displayUserDeposits(){
        $.ajax({
            url: 'config/process.php',
            method: 'post',
            data: { action: 'displayUserDeposits' },
            success: function(response){
               $("#showDeposits").html(response);
               $("table").DataTable({
                   order: [0, 'dsc']
               });
            }
        });
        }
      
        /// Display all withdrawals For Loggged in Users  
  displayUserWithdrawals();
        function displayUserWithdrawals(){
        $.ajax({
            url: 'config/process.php',
            method: 'post',
            data: { action: 'display_user_withdrawals' },
            success: function(response){
               $("#showithdrawals").html(response);
               $("#table2").DataTable({
                   order: [0, 'dsc']
               });
            }
        });
        }

        /// Display all investments For Loggged in Users  
  displayUserInvestment();
        function displayUserInvestment(){
        $.ajax({
            url: 'config/process.php',
            method: 'post',
            data: { action: 'display_user_investment' },
            success: function(response){
               $("#showinvestment").html(response);
               $("#table3").DataTable({
                   order: [0, 'dsc']
               });
            }
        });
        }
      
 });
</script>
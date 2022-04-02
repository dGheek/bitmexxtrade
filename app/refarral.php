<?php 
$totalRefered = "";
$fetchReferedDetails ="";

require_once 'config/session.php';
try{
    $sql = "SELECT * FROM users WHERE referrer = '$cusername' ";
    $stmt = $cUser->connection->prepare($sql);
    $stmt->execute();
    $totalRefered = $stmt->rowCount();
    $fetchReferedDetails = $stmt->fetchAll(PDO::FETCH_ASSOC);
     
    // if(isset($fetchReferedDetails)){
    //      $sql = "UPDATE referral SET refered_id = :id";
    //      $stmt = $cUser->connection->prepare($sql);
    //      $stmt->execute([':id'=>$fetchReferedDetails]);
       
    // }
   

}catch(PDOException $e){
    echo 'Error : '.$e->getMessage();
}



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
          <!--  my account wrapper start -->
            
            <!--  my account wrapper end -->    
            <!--  account wrapper start -->
   
             <!--investment plan wrapper start -->
    <div class="investment_plans index2_investment_plans index3_investment_plans float_left">
<div class="container">
    <div class="row">

            <!-- referrals wrapper start -->
            <div class="view_profile_wrapper_top float_left">

                <div class="row">
                    <div class="col-md-12 col-lg-12 col-sm-12 col-12">
                        <div class="sv_heading_wraper">

                            <h3>REFERRAL</h3>
                            
                        </div>
                    </div>

                    <div class="col-xl-3 col-md-6 col-lg-6 col-sm-6 col-12">
            <div class="investment_box_wrapper index2_investment_box_Wraper index3_investment_box_Wraper float_left">
                <img src="assets/images/in2.png" alt="img">
                <div class="investment_icon_circle red_info_circle">
                    <i class="far fa-money-bill-alt"></i>
                </div>
                <div class="investment_border_wrapper red_border_wrapper"></div>
                <div class="investment_content_wrapper red_content_wrapper">
                    <h5><a href="#">$500,00</a></h5>
                    <div class="line_shape line_shape2"></div>
                    <p>Refarral Earnings</p>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6 col-lg-6 col-sm-6 col-12">
            <div class="investment_box_wrapper index2_investment_box_Wraper index3_investment_box_Wraper float_left">
                <img src="assets/images/in1.png" alt="img">
                <div class="investment_icon_circle">
                    <i class="fa fa-users"></i>
                </div>
                <div class="investment_border_wrapper"></div>
                <div class="investment_content_wrapper">
                    <h5><a href="#"><?php echo $totalRefered; ?></a></h5>
                    <div class="line_shape line_shape2"></div>
                    <p>Total Refarrals</p>
                </div>
              
            </div>
        </div>
      
        <div class="col-xl-3 col-md-6 col-lg-6 col-sm-6 col-12">
            <div class="investment_box_wrapper index2_investment_box_Wraper index3_investment_box_Wraper float_left">
                <img src="assets/images/in4.png" alt="img">
                <div class="investment_icon_circle blue_icon_circle">
                    <i class="fas fa-gold "></i>
                </div>
                <div class="investment_border_wrapper blue_border_wrapper"></div>
                <div class="investment_content_wrapper blue_content_wrapper">
                    <h5><a href="#">45</a></h5>
                    <div class="line_shape line_shape2"></div>
                    <p>Active Refarrals</p>
            </div>
            </div>
        </div>
        
        <div class="row">
        Your Refarral link:   <strong> http://localhost/savehyp/app/auth.php?ref=<?= $cusername; ?><strong>
        </div>
                      </div>
           

            <!-- referrals wrapper end -->


            <!--  transactions wrapper start -->
            <div class="last_transaction_wrapper float_left">

                <div class="row">

                    <div class="crm_customer_table_main_wrapper float_left">
                        <div class="crm_ct_search_wrapper">
                            <div class="crm_ct_search_bottom_cont_Wrapper">
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="myTable table datatables cs-table crm_customer_table_inner_Wrapper">
                                <thead>
                                    <tr>
                                        <th class="width_table1">level</th>
                                        <th class="width_table1">username:</th>
                                        <th class="width_table1">E-mail:</th>
                                        <th class="width_table1">Date:</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($fetchReferedDetails as $row): ?>
                                    <tr class="background_white">

                                        <td>
                                            <div class="media cs-media">

                                                <div class="media-body">
                                                    <h5><?= $row['id']; ?></h5>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="pretty p-svg p-curve"><?= $row['username']; ?></div>
                                        </td>
                                        <td>
                                            <div class="pretty p-svg p-curve"><?= $row['email']; ?></div>
                                        </td>
                                        <td>
                                            <div class="pretty p-svg p-curve"><?= $row['created_at']; ?></div>
                                        </td>

                                    </tr>
                                 <?php endforeach; ?>
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
            </div>
            <!--  transactions wrapper end -->
                    </div>
                </div>
            </div>
            <!--  transactions wrapper end -->

            <!--  footer  wrapper start -->
           <?php include 'include/footer.php'; ?>

                 
<script type="text/javascript">
$(document).ready(function(){
           

 });
</script>
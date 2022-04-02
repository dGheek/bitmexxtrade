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
        <?php if($verified == 'Not Verified!'):  ?>
                    <div class="alert alert-success alert-dismissable text-center mt-2 m-0">
                    <button class="close" type="button" data-dismiss="alert">&times;</button>
                    <strong>Your Email Address is not Verified, Please Check your mail box to Verify Your Email.! </strong>
                    </div>
                    <?php endif; ?> 
</div>
<div class="container">
    <div class="row">

  <!--  profile wrapper start -->
  <div class="last_transaction_wrapper float_left">
                <div class="row">
                    <div class="col-md-12 col-lg-12 col-sm-12 col-12">
                        <div class="sv_heading_wraper">
                            <h3> Support Ticket</h3>
                        </div>
                    </div>
                    <div class="crm_customer_table_main_wrapper float_left">
                        <div class="crm_ct_search_wrapper">
                            <div class="about_btn float_left">
                                <ul>
                                    <li>
                                        <a href="#" data-toggle="modal" data-target="#ticketModal">new ticket</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="modal fade question_modal" id="ticketModal" role="dialog">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <div class="row">
                                            <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                                                <div class="sv_question_pop float_left">
                                                    <h1>Raise a ticket</h1>
                                                    <div class="search_alert_box float_left">
                                    
                                    <form action="" method="post" enctype="multipart/form-data" id="submit-ticket-form">
                                   
                                    <div class="change_field">  
                                    <div class="form-group">
                                    <input type="text" name="title" id="title" value="" placeholder="Your title " required> 
                                    </div>
                                    
                                    <div class="form-m">
                                    <div class="form-group i-message">
                                    <textarea class="form-control require" name="content" required="" rows="5" id="messageTen" placeholder=" Enter Your Message"></textarea>

                                    </div>
                                    </div>
                                   
                                    </div>
                                    <div class="tb_es_btn_div">
                                    <div class="response"></div>
                                    <div class="tb_es_btn_wrapper conatct_btn2 cont_bnt">
                                    <button type="button" class="submitForm" id="submitTicketBtn">Submit Ticket !</button>
                                    </div>
                                </div>
                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="table-responsive" id="showTicket">
                            
                        </div>
                    </div>
                </div>
            </div>
            <!--  profile wrapper end -->
                    </div>
                </div>
            </div>
            <!--  transactions wrapper end -->

            <!--  footer  wrapper start -->
           <?php include 'include/footer.php'; ?>

                 
<script type="text/javascript">
$(document).ready(function(){
           

            //submit ticket ajax Request
            $("#submitTicketBtn").click(function(e){
                e.preventDefault();
                $("#submitTicketBtn").val("Please wait...");

                $.ajax({
                    url: 'config/process.php',
                    method: 'post',
                    data: $("#submit-ticket-form").serialize()+'&action=submitTicket',
                    success: function(response){
                        $("#submitTicketBtn").val("Submit Ticket...");
                        $("#submit-ticket-form")[0].reset();
                        $("#ticketModal").modal('hide');
                        
                        displayUserTicket();
                    }
                });
            });

        /// Display all Tickets For Loggged in Users  
        displayUserTicket();
        function displayUserTicket(){
        $.ajax({
            url: 'config/process.php',
            method: 'post',
            data: { action: 'display_user_ticket' },
            success: function(response){
               $("#showTicket").html(response);
               $("table").DataTable({
                   order: [0, 'dsc']
               });
            }
        });
        }

 });
</script>
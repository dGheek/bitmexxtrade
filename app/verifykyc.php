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

            <h3>Verify KYC</h3>

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
                        <li><a href="#" data-toggle="modal" data-target="#editKycDetails">Upload Documents</a></li>
                    </ul>
                    </div>
                        
                    </div>
                </div>

                <div class="col-xl-6 col-md-12 col-lg-12 col-sm-12 col-12" id="showKycDetails">
          
                </div>
            </div>

            

<!--  Edit profile Modal Start -->
            <div class="modal fade question_modal" id="editKycDetails" role="dialog">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                                <div class="sv_question_pop float_left">
                                    <h1>Upload Your Documents</h1>
                                    <div class="search_alert_box float_left">

                                    <form action="" method="post" id="kyc-details-form">

                                    <div class="form-group">
                                    <input type="hidden" name="kyc_owner" id="" value="<?= $cusername;?>">
                                    </div>

                                    <div class="form-group">
                                    <select name="kyc_type" id="">
                                    <option value="Drivers Licence">Drivers License</option>
                                    <option value="PassPort">PassPort</option>
                                    <option value="National ID">National ID</option>
                                    </select>
                                    </div>
</br>
</br>
</br>
                                    <div class="form-group">
                                    <input type="file" name="kyc_file" id="" value="">
                                    </div>
                                    <div id="KYCAlert"></div>
                                    <div class="form-group">
                                    <button type="submit" class="btn btn-default">Update Information</button>
                                    </div>

                                </div>
                               
                                
                            </form>
                     
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
             //Update KYC INFO Ajax Request UpdateProfileBtn
             $("#kyc-details-form").submit(function(e){
                    e.preventDefault();
    
                    $.ajax({
                       url: 'config/process.php',
                       method: 'post',
                       processData:false,
                       contentType:false,
                       Cache:false,
                       data: new FormData(this),
                       success: function(response){
                           console.log(response);
                          $("#KYCAlert").html(response);
                       //location.reload();
            
                       }
                      
                    });
                
            });

            
         /// Display Bank adetails for Loggged in Users  
        displayKycdetails();
        function displayKycdetails(){
        $.ajax({
            url: 'config/process.php',
            method: 'post',
            data: { action: 'display_kyc_details' },
            success: function(response){
               $("#showKycDetails").html(response);
            }
        });
        }

         

  
            
 });
</script>
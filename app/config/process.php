<?php 

require_once 'session.php';
     // Update User Profile using Ajax Request

     if(isset($_POST['action']) && $_POST['action'] == 'updateProfile'){
        $phone = $cUser->checkInput($_POST['phone']);
        $address = $cUser->checkInput($_POST['address']);
        $city = $cUser->checkInput($_POST['city']);
        $country = $cUser->checkInput($_POST['country']);
       
        $profileUpdated = $cUser->updateProfile($phone, $address, $city, $country, $cid);
        if($profileUpdated){
          echo $cUser->showMessage('success','Updated Successfully!');
        }else{
          echo $cUser->showMessage('danger','Opps Please Try aagin later!');
        }
       }

 // Handle ajax request for change password
 if(isset($_POST['action']) && $_POST['action'] == 'change_pass'){
  $currentPass = $_POST['curpass'];
  $newPass = $_POST['newpass'];
  $cnewPass = $_POST['cnewpass'];

  //$hnewPass = password_hash($newPass, PASSWORD_DEFAULT);

  if($newPass != $cnewPass){
    echo $cUser->showMessage('danger', 'Password did not match');
  }
  else{
    if($currentPass == $cpass){
      $cUser->changePassword($newPass, $cid);
      echo $cUser->showMessage('success', 'Password Changed Succesfully');
      $cUser->notification($cid, 'admin', 'Password Changed');
    }
    else{
      echo $cUser->showMessage('danger', 'Current password is wrong!');
    }
  }
 }

        // Update Payment Details using Ajax Request
     if(isset($_POST['action']) && $_POST['action'] == 'updatePaymentDetails'){

      $wallet_name = $cUser->checkInput($_POST['wallet_name']);
      $wallet_address = $cUser->checkInput($_POST['wallet_address']);

      $updated = $cUser->updatePaymentDetails($wallet_name, $wallet_address, $cid);
      if($updated){
        echo $cUser->showMessage('success','Updated Successfully!');
      }else{
        echo $cUser->showMessage('danger','OOps Something went WRONG!');
      }

     }

      // Handle Ajax request for Displaying all logged in users Bank Details
      if(isset($_POST['action']) && $_POST['action'] == 'display_kyc_details'){
       
        $output = '';
        $UserKyc = $cUser->displayKycDetails($cusername);
       
        foreach($UserKyc as $row){
        $output = '
        <ul class="profile_list" id="">  
        <li><span class="detail_left_part">Document Type:</span> <span class="detail_right_part">'.$row['kyc_type'].'</span>
        </li>
        <li><span class="detail_left_part">File:</span> <span class="detail_right_part">'.$row['kyc_file'].'</span>
        </ul> ';
      }

      echo $output;
      }

    // Update User KYC Iinformtion using Ajax Request
    if(isset($_FILES['kyc_file'])){
     
     $kyc_owner = $_POST['kyc_owner'];
     $kyc_type = $_POST['kyc_type'];
     $kyc_file = $_FILES['kyc_file'];

      $folder = 'uploads/';
      if(isset($_FILES['kyc_file']['name']) && ($_FILES['kyc_file']['name'] !="" )){
      $newKYC = $folder.$_FILES['kyc_file']['name'];
      move_uploaded_file($_FILES['kyc_file']['tmp_name'], $newKYC);

    }

      $uploaded = $cUser->updateUserKYC($kyc_owner, $kyc_type, $newKYC);
      if(isset($uploaded)){
      echo $cUser->showMessage('success','Uploaded Succesfully');
      }else{
      echo $cUser->showMessage('warning','Failed To Upload');
      } 

}


      
        // Handle Create Investment from Ajax Request
       if(isset($_POST['action']) && $_POST['action'] == 'goldPay'){
         
       $investor = $_POST['investor'];
        $package = $_POST['package'];
        $amount = $_POST['amount'];
        $roi = $_POST['roi'];
        $no_of_days = $_POST['no_of_days'];

        if($amount > $balance){
          echo $cUser->showMessage('danger', 'Your Balance is not enough Please Credit Your Wallet');
        }else{
          

          $goldpay = $cUser->createInvestment($investor, $package, $amount, $roi, $no_of_days);
          if($goldpay){
            echo $cUser->showMessage('success','Oder Created Successfult');
          }else{
            echo $cUser->showMessage('danger', 'Opps.. Something Whent Wrong');
          } 

          /* if($creferrer !=""){
           $goldBonus = 200;
           $add_bonus = $ref_bonus;
            try{
             
              $sql = "UPDATE users SET ref_bonus = $add_bonus ++$goldBonus WHERE username = '$creferrer'";
              $stmt = $cUser->connection->prepare($sql);
              $stmt->execute(['ref_bonus'=>$add_bonus,'username'=>$creferrer]);

            }catch(PDOException $e){
              echo $cUser->showMessage('danger','Faild To Credit Referrer').$e;
            }
           

            return true;

          } */

        }

        

       }

      
       // Handle Ajax Rrequest for submit ticket
       if(isset($_POST['action']) && $_POST['action'] == 'submitTicket'){
         $tile = $cUser->checkInput($_POST['title']);
         $content = $cUser->checkInput($_POST['content']);

         $cUser->submitTicket($cid, $tile, $content);
       }

       // Handle Ajax request for Displaying all logged in users tickets 
       if(isset($_POST['action']) && $_POST['action'] == 'display_user_ticket'){
         $output = '';
         $tickets = $cUser->displayUserTicket($cid);

         if($tickets){
           $output .= '<table class="myTable table datatables cs-table crm_customer_table_inner_Wrapper">
           <thead>
               <tr>
                   <th class="width_table1">ticket no</th>
                   <th class="width_table1">subject</th>
                   <th class="width_table1">status</th>
                   <th class="width_table1">date</th>

               </tr>
           </thead>
           <tbody>';

          foreach($tickets as $row){
            $output .= '<tr class="background_white">

            <td>
                <div class="media cs-media">

                    <div class="media-body">
                        <h5>#'.$row['id'].'</h5>
                    </div>
                </div>
            </td>
            <td>
                <div class="pretty p-svg p-curve">'.$row['title'].'</div>
            </td>
            <td>
                <div class="pretty p-svg p-curve">'.$row['status'].'</div>
            </td>

            <td>
                <div class="pretty p-svg p-curve">'.$row['created_at'].'</div>
            </td>

        </tr>';
          }
          $output .= ' </tbody>
          </table>';
          echo $output;
         }else{
           echo '<h3 class="text-center text-secondary"> :( You have not raised a ticket yet!</h3>';
         }
       }


       // Handle wallet deposit by users
       if(isset($_POST['action']) && $_POST['action'] == 'wallet-deposit'){
        $payername = $_POST['payername'];
        $amount = $_POST['amount'];
        $payment_method = $_POST['payment_method'];
        
 
        $userDeposits =  $cUser->deposits($payername, $amount, $payment_method);

        if(isset($userDeposits)){
          echo $cUser->showMessage('success', 'Please Complete Your Payments');
        }else{
          echo $cUser->showMessage('danger', 'Opps Something Went wrong');
        } 

       }

       // Update User POP using Ajax Request
 if(isset($_FILES['pop'])){
    $pop = $_FILES['pop'];
    $payername = $_POST['payername'];
    
     $folder = 'uploads/';
  if(isset($_FILES['pop']['name']) && ($_FILES['pop']['name'] !="" )){
    $newPOP = $folder.$_FILES['pop']['name'];
    move_uploaded_file($_FILES['pop']['tmp_name'], $newPOP);
  }
  
  $uploaded = $cUser->updateUserPOP($newPOP, $payername);
if(isset($uploaded)){
  echo $cUser->showMessage('success','Uploaded Succesfully');
}else{
  echo $cUser->showMessage('warning','Failed To Upload');
} 
 
}

       // Handle Withdrawal requests by users
       if(isset($_POST['action']) && $_POST['action'] == 'withdrawal'){
        
        $recievername = $_POST['recievername'];
        $amount = $_POST['amount'];
        $wallet_address = $_POST['wallet_address']; 
        $payment_method = $_POST['payment_method'];
       
        if($amount > $balance){
          echo $cUser->showMessage('danger', 'Opps Your Balance Is Low!');

        }else{
          $withdrawall = $cUser->withdrawal($recievername, $amount, $wallet_address, $payment_method);

          if(isset($withdrawall)){
            echo $cUser->showMessage('success','Request sent Successfuly');
          }else{
            echo $cUser->showMessage('danger', 'Opps.. Something went Wrong try again later');
          } 

        }
        

       }

       
       // Handle Ajax request for Displaying all logged in users Deposit
       if(isset($_POST['action']) && $_POST['action'] == 'displayUserDeposits'){
        $output = '';
        $deposits = $cUser->displayUserDeposits($cusername);

        if($deposits){
          $output .= '<table class="myTable table datatables cs-table crm_customer_table_inner_Wrapper">
          <thead>
              <tr>
                  <th class="width_table1">#ID</th>
                  <th class="width_table1">Amount</th>
                  <th class="width_table1">Payment Method</th>
                  <th class="width_table1">Status</th>
                  <th class="width_table1">Date</th>
              </tr>
          </thead>
          <tbody>';

         foreach($deposits as $row){
           if($row['status'] == 0){
            $OrderStatus = "Pending";
           }else{
            $OrderStatus = "Approved";
           }
           $output .= '<tr class="background_white">

           <td>
               <div class="media cs-media">

                   <div class="media-body">
                       <h5>'.$row['id'].'</h5>
                   </div>
               </div>
           </td>
           <td>
               <div class="pretty p-svg p-curve">$'.$row['amount'].'.00</div>
           </td>
           <td>
               <div class="pretty p-svg p-curve">'.$row['payment_method'].'</div>
           </td>
           <td>
               <div class="pretty p-svg p-curve deposit_active">'.$OrderStatus.'</div>
           </td>
           <td>
           <div class="pretty p-svg p-curve">'.$row['created_at'].'</div>
            </td>
          
       </tr>';
         }
         $output .= ' </tbody>
         </table>';
         echo $output;
        }else{
          echo '<h3 class="text-center text-secondary"> :( No Deposit Yet!</h3>';
        }
      }


       // Handle Ajax request for Displaying all logged in users Withdrawals
       if(isset($_POST['action']) && $_POST['action'] == 'display_user_withdrawals'){
        $output = '';
        $withdrawals = $cUser->displayUserWithdrawals($cusername);

        if($withdrawals){
          $output .= '<table class="myTable table datatables cs-table crm_customer_table_inner_Wrapper" id="table2">
          <thead>
              <tr>
                  <th class="width_table1">#ID</th>
                  <th class="width_table1">Amount</th>
                  <th class="width_table1">Withdrawal Method</th>
                  <th class="width_table1">status</th>
                  <th class="width_table1">Date</th>

              </tr>
          </thead>
          <tbody>';

         foreach($withdrawals as $row){
          if($row['status'] == 0){
            $WithdrawStatus = "Pending";
           }else{
            $WithdrawStatus = "Approved";
           }

           $output .= '<tr class="background_white">
            
           <td>
               <div class="media cs-media">

                   <div class="media-body">
                       <h5>'.$row['id'].'</h5>
                   </div>
               </div>
           </td>
           <td>
               <div class="pretty p-svg p-curve">$'.$row['amount'].'.00</div>
           </td>
           <td>
               <div class="pretty p-svg p-curve">'.$row['payment_method'].'</div>
           </td>
           <td>
               <div class="pretty p-svg p-curve deposit_active">'.$WithdrawStatus.'</div>
           </td>
          
           <td>
               <div class="pretty p-svg p-curve">'.$row['created_at'].'</div>
           </td>

          
       </tr>';
         }
         $output .= ' </tbody>
         </table>';
         echo $output;
        }else{
          echo '<h3 class="text-center text-secondary"> :( No Withdrawals Yet!</h3>';
        }
      }

      
       // Handle Ajax request for Displaying all logged in users Investment
       if(isset($_POST['action']) && $_POST['action'] == 'display_user_investment'){
        $output = '';
        $userinvestment = $cUser->displayUserInvestment($cusername);

        if($userinvestment){
          $output .= '<table class="myTable table datatables cs-table crm_customer_table_inner_Wrapper" id="table3">
          <thead>
              <tr>
              <th class="width_table1">#ID</th>
              <th class="width_table1">Package Name</th>
              <th class="width_table1">Amount</th>
              <th class="width_table1">Profit</th>
              <th class="width_table1">ROI</th>
              <th class="width_table1">No Of Days</th>
              <th class="width_table1">Date Created</th>
              <th class="width_table1">EXpiring Date</th>
              <th class="width_table1">status</th>
              </tr>
          </thead>
          <tbody>';

         foreach($userinvestment as $row){
          if($row['status'] == 0){
            $InvestStatus = '<button class="btn btn-danger">Expired</button>';
           }else{
            $InvestStatus = '<button class="btn btn-success">Running</button>';
           }
           $output .= '<tr class="background_white">

           <td>
               <div class="media cs-media">

                   <div class="media-body">
                       <h5>'.$row['id'].'</h5>
                   </div>
               </div>
           </td>
           <td>
               <div class="pretty p-svg p-curve">'.$row['package'].'</div>
           </td>
           <td>
               <div class="pretty p-svg p-curve">$'.$row['amount'].'.00</div>
           </td>
           <td>
           <div class="pretty p-svg p-curve">$'.$row['profit'].'.00</div>
       </td>
           <td>
               <div class="pretty p-svg p-curve">$'.$row['roi'].'.00</div>
           </td>
           <td>
               <div class="pretty p-svg p-curve">'.$row['no_of_days'].'</div>
           </td>
          
           <td>
               <div class="pretty p-svg p-curve">'.$row['created_at'].'</div>
           </td>
           <td>
               <div class="pretty p-svg p-curve">'.$row['exp_date'].'</div>
           </td>

           <td>
               <div class="">'.$InvestStatus.'</div>
           </td>
       </tr>';
         }
         $output .= ' </tbody>
         </table>';
         echo $output;
        }else{
          echo '<h3 class="text-center text-secondary"> :( No Investment Yet!</h3>';
        }
      }

     

?>
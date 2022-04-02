<?php 
require_once 'session.php';

$userinvestment = $cUser->displayUserInvestment($cusername);
foreach($userinvestment as $row){
    $investor = $row['investor'];
    $package = $row['package'];
    $amount = $row['amount'];
    $roi = $row['roi'];
    $profit = $row['profit'];
    $no_of_days = $row['no_of_days'];
    $created_at = $row['created_at'];
    $exp_date = $row['exp_date'];

    
    echo '<p>Investors Name: '.$investor.'</p>';
    echo '<p>Package: '.$package.'</p>';
    echo '<p>Amount: '.$amount.'</p>';
    echo '<p>ROI: '.$roi.'</p>';
    echo '<p>Profit: '.$profit.'</p>';
    echo '<p>NofDays: '.$no_of_days.'</p>';
    echo '<p>Date Created: '.$created_at.'</p>';
    echo '<p>Expiring Date: '.$exp_date.'</p>';
    
    $TotalRoi = $amount * 50 / 100;
    $investROI = $amount + $TotalRoi;
    $DailyProfit = $investROI / $no_of_days; 

    echo '<p>Invesmrnt ROI: '.$investROI.'</p>';
    echo '<p>Daily Profit: '.$DailyProfit.'</p>';
    echo '<p>Total Profit: '.$TotalRoi.'</p>';
}
  

  /* try{
             
    $sql = "UPDATE users SET ref_bonus = $add_bonus ++$goldBonus WHERE username = '$creferrer'";
    $stmt = $cUser->connection->prepare($sql);
    $stmt->execute(['ref_bonus'=>$add_bonus,'username'=>$creferrer]);

  }catch(PDOException $e){
    echo $cUser->showMessage('danger','Faild To Credit Referrer').$e;
  } */
 





?>
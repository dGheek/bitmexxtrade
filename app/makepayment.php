<?php 
require_once 'config/session.php';

?>

<?php 

 $package ;
 $amount ;
 $payment_type ;
 $roi ;
 $no_of_days ;

// Handle Create Orders from Ajax Request
if(isset($_POST['action']) && $_POST['action'] == 'goldPay'){
    print_r($_POST);
    $package = $cUser->checkInput($_POST['package']);
    $amount = $cUser->checkInput($_POST['amount']);
    
    $payment_type = $cUser->checkInput($_POST['payment_type']);
    $roi = $cUser->checkInput($_POST['roi']);
    $no_of_days= $cUser->checkInput($_POST['no_of_days']);

   $goldpay = $cUser->createOders($cid, $package, $amount, $payment_type, $roi, $no_of_days);
    if($goldpay){
      echo $cUser->showMessage('success','Oder Created Successfuly');
    }else{
      echo $cUser->showMessage('warning', 'Opps.. Something Whent Wrong');
    }  

  }

 /*  $scurrency = 'USD';
  $rcurrency = 'BTC';

  $resquest = [
    'amount' => $amount,
    'currency1' => $scurrency,
    'currency2' => $rcurrency,
    'buyer_email' => $cEmail,
    'item' => "Investment",
    'address' => "",
    'ipn_url' => ""
  ];

  $result = $coin->CreateTransaction($resquest);
  if($result['error'] == 'ok'){
      // Do something
  }else{
      print 'Error: '. $result['erroe'] . "\n";
      die();
  } */


?>
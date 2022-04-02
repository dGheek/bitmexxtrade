<?php 

session_start();
require_once 'auth0.php';

$cUser = new Auth();
$totalInvestment = new Auth();
//$activeOders = new Auth();



if(!isset($_SESSION['user'])){
    header('location:auth.php');
    die;
}

$cEmail = $_SESSION['user'];

$data = $cUser->currentUser($cEmail);

$cid = $data['id'];
$cname = $data['fname'];
$cusername = $data['username'];
$cpass = $data['password'];
$cphone = $data['phone'];
$cgender = $data['gender'];
$cdob = $data['dob'];
$cphoto = $data['photo'];
$address = $data['address'];
$city = $data['city'];
$country = $data['country'];
$balance = $data['balance'];
$ref_bonus = $data['ref_bonus'];
$tBalance = $balance + $ref_bonus;
$creferrer = $data['referrer'];
$wallet_name = $data["wallet_name"];
$wallet_address = $data['wallet_address'];
$created = $data['created_at'];
$verified = $data['verified'];

$first_name = strtok($cname, " ");

if($verified  == 0){
    $verified = 'Not Verified!';
}else{
    $verified = 'Verified!';
}

//$activeUserOders = $activeOrders->fetchActiveSingleOders();

  

$sql = "SELECT * FROM orders WHERE uid = $cid AND status == 0";
$stmt = $cUser->connection->prepare($sql);
$stmt->execute(['uid'=>$cid]);
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
return $result;

?> 
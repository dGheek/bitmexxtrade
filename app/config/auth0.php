<?php 
//require_once(ROOT_PATH . "core/class.general.php");
require_once 'config.php';

class Auth extends Database{

    //// Register New Users
    public function register($fname, $email, $password, $username, $referrer, $activation_code, $user_otp){
       try{ 
        $sql = "INSERT INTO users (fname, email, password, username, referrer, activation_code, user_otp) VALUES(:fname, :email, :password, :username, :referrer, :activation_code, :user_otp)";
        $stmt = $this->connection->prepare($sql);
        $stmt->execute(['fname'=>$fname, 'email'=>$email, 'password'=>$password, 'username'=>$username, 'referrer'=>$referrer, 'activation_code'=>$activation_code, 'user_otp'=>$user_otp]);
       

        }catch(PDOException $e){
        echo $e->getMessage();
    }

    try{
        $sql = "INSERT INTO referral (referrer) VALUES (:referrer)";
        $stmt = $this->connection->prepare($sql);
        $stmt->execute(['referrer'=>$referrer]);
      
        }catch(PDOException $e){
        echo $e->getMessage();
    }
    return true;

    }

    //// Check if user exists
    public function userExist($email){
        $sql = "SELECT email FROM users WHERE email = :email";
        $stmt = $this->connection->prepare($sql);
        $stmt->execute(['email'=>$email]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        return $result;
    }

    //// Check if user exists
    public function usernameExist($username){
        $sql = "SELECT username FROM users WHERE username = :username";
        $stmt = $this->connection->prepare($sql);
        $stmt->execute(['username'=>$username]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        return $result;
    }

      //// Login Existing Users
    
        public function login($email){
        $sql = "SELECT email, password FROM users WHERE email = :email AND deleted != 0";
        $stmt = $this->connection->prepare($sql);
        $stmt->execute(['email'=>$email]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        return $row;
            
    }

    // Current Users In Session
    public function currentUser($email){
    $sql = "SELECT * FROM users WHERE email = :email AND deleted != 0";
    $stmt = $this->connection->prepare($sql);
    $stmt->execute(['email'=>$email]);
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    return $row;
    }

    // Forgot Password Method
    public function forgotPassword($email, $token){
        $sql = "UPDATE users SET token = :token, token_expire = DATE_ADD(NOW()
         INTERVAL 10 MINUTES) WHERE email = :email";

        $stmt = $this->connection->prepare($sql);
        $stmt->execute(['email'=>$email, 'token'=>$token]);

        return true;
    }

    // Reset Password Request
    public function resetPasswordAuth($email, $token){
        $sql = "SELECT id FROM users WHERE email = :email AND token = :token AND 
        token != '' AND token_expire > NOW() AND deleted != 0";
        $stmt = $this->connection->prepare($sql);
        $stmt->execute(['email'=>$email, 'token'=>$token]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        return $row;
    }
    
    // Update New Password
    public function updateNewPassword($pass, $email){
        $sql = "UPDATE users SET token = '', password = :pass WHERE email = :email 
        AND deleted != 0";
        $stmt = $this->connection->prepare($sql);
        $stmt->execute(['pass'=>$pass, 'email'=>$email]);

        return true;
    }

    //Update User Profile
    public function updateProfile($phone, $address, $city, $country, $id){
        $sql = "UPDATE users SET phone = :phone, address = :address, city = :city, country = :country WHERE id = :id";
        $stmt = $this->connection->prepare($sql);
        $stmt->execute(['phone'=>$phone, 'address'=>$address, 'city'=>$city, 'country'=>$country,'id'=>$id]);
        
        return true;
    }

    //Update Payments Details
    public function updatePaymentDetails($wallet_name, $wallet_address, $id){
        $sql = "UPDATE users SET wallet_name = :wallet_name, wallet_address = :wallet_address WHERE id = :id";
        $stmt = $this->connection->prepare($sql);
        $stmt->execute(['wallet_name'=>$wallet_name, 'wallet_address'=>$wallet_address ,'id'=>$id]);
        
        return true;
    }

    //change user Password
    public function changePassword($pass, $id){
        $sql = "UPDATE users SET password = :pass WHERE id = :id AND deleted != 0";
        $stmt = $this->connection->prepare($sql);
        $stmt->execute(['pass'=>$pass, 'id'=>$id]);

        return true;
    }

    public function updateUserKYC($kyc_owner, $kyc_type, $kyc_file){
        $sql = "INSERT INTO kyc (kyc_owner, kyc_type, kyc_file) VALUES(:kyc_owner, :kyc_type, :kyc_file)";
        $stmt = $this->connection->prepare($sql);
        $stmt->execute(['kyc_owner'=>$kyc_owner, 'kyc_type'=>$kyc_type, 'kyc_file'=>$kyc_file, ]);
        return true;
    }

    // Insert Notification
    public function notification($uid, $type, $message){
        $sql = "INSERT INTO notification (uid, type, message) VALUES(:uid, :type, :message)";
        $stmt = $this->connection->prepare($sql);
        $stmt->execute(['uid'=>$uid, 'type'=>$type, 'message'=>$message]);

        return true;

    }

    // create oders for users
    public function createInvestment($investor, $package, $amount, $roi, $no_of_days){
        $sql = "INSERT INTO investment (investor, package, amount,  roi, no_of_days) VALUES(:investor, :package, :amount, :roi, :no_of_days)";
        $stmt = $this->connection->prepare($sql);
        $stmt->execute(['investor'=>$investor, 'package'=>$package, 'amount'=>$amount, 'roi'=>$roi, 'no_of_days'=>$no_of_days]);

        return true;
    }

    

     //Fetch all logged in users Oders 
     public function displayUserOders($uid){
        $sql = "SELECT * FROM orders WHERE uid = :uid";
        $stmt = $this->connection->prepare($sql);
        $stmt->execute(['uid'=>$uid]);
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $result;
    }

    

    //submit new ticket
    public function submitTicket($uid, $title, $content){
        $sql = "INSERT INTO tickets (uid, title, content) VALUES(:uid, :title, :content)";
        $stmt = $this->connection->prepare($sql);
        $stmt->execute(['uid'=>$uid, 'title'=>$title, 'content'=>$content]);

        return true;
    }

     //Fetch all logged in users ticket 
     public function displayUserTicket($uid){
        $sql = "SELECT * FROM tickets WHERE uid = :uid";
        $stmt = $this->connection->prepare($sql);
        $stmt->execute(['uid'=>$uid]);
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $result;
    }

    
     //Fetch all logged in users Bank details 
     public function displayKycDetails($cusername){
        $sql = "SELECT * FROM kyc WHERE kyc_owner = '$cusername'";
        $stmt = $this->connection->prepare($sql);
        $stmt->execute(['kyc_owner'=>$cusername]);
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $result;
    }


/* 
    public function walletDeposite($payername, $amount, $payment_type){
        $sql = "INSERT INTO deposit (payername, amount, payment_type) VALUES(:payername, :amount, :payment_type)";
        $stmt = $this->connection->prepare($sql);
        $stmt->execute(['payername'=>$payername, 'amount'=>$amount, 'payment_type'=>$payment_type]);

        return true;
    }
 */

    //process deposit method
public function deposits($payername, $amount, $payment_method){
    $sql = "INSERT INTO deposit (payername, amount, payment_method) VALUES(:payername, :amount, :payment_method)";
    $stmt = $this->connection->prepare($sql);
    $stmt->execute(['payername'=>$payername, 'amount'=>$amount, 'payment_method'=>$payment_method]);

    return true;
}

public function updateUserPOP($pop, $payername){
    $sql = "UPDATE deposit SET pop = :pop WHERE payername = :payername ";
    $stmt = $this->connection->prepare($sql);
    $stmt->execute(['pop'=>$pop,'payername'=>$payername]);
    return true;
}

    //Fetch all logged in users Deposits
    public function displayUserDeposits($payername){
        $sql = "SELECT * FROM deposit WHERE payername = :payername";
        $stmt = $this->connection->prepare($sql);
        $stmt->execute(['payername'=>$payername]);
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $result;
    }

     // process withdrawal method
     public function withdrawal($recievername, $amount, $wallet_address, $payment_method){
        $sql = "INSERT INTO withdrawal (recievername, amount,  wallet_address, payment_method) VALUES(:recievername, :amount, :wallet_address, :payment_method)";
        $stmt = $this->connection->prepare($sql);
        $stmt->execute(['recievername'=>$recievername, 'amount'=>$amount, 'wallet_address'=>$wallet_address, 'payment_method'=>$payment_method]);
    
        return true;
    }

    
    //Fetch all logged in users Withdrawals 
    public function displayUserWithdrawals($recievername){
        $sql = "SELECT * FROM withdrawal WHERE recievername = :recievername";
        $stmt = $this->connection->prepare($sql);
        $stmt->execute(['recievername'=>$recievername]);
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $result;
    }

    //Fetch all logged in users investment
    public function displayUserInvestment($investor){
        $sql = "SELECT * FROM investment WHERE investor = :investor";
        $stmt = $this->connection->prepare($sql);
        $stmt->execute(['investor'=>$investor]);
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $result;
    }



    //Sum all users Orders
    public function sumAllOders($uid){
        $sql = "SELECT SUM(amount) AS Total FROM orders WHERE uid = :uid";
        $stmt = $this->connection->prepare($sql);
        $stmt->execute([':uid'=>$uid]);
        $totalOrders = $stmt->fetch(PDO::FETCH_ASSOC);

        return $totalOrders['Total'];
    
     }

      //Sum all users Orders
    public function sumAllinvestment($cusername){
        $sql = "SELECT SUM(amount) AS Total FROM investment WHERE investor = '$cusername'";
        $stmt = $this->connection->prepare($sql);
        $stmt->execute(['investor'=>$cusername]);
        $totalInvestment = $stmt->fetch(PDO::FETCH_ASSOC);

        return $totalInvestment['Total'];
    
     }

     
    //Fetch all active orders for users
    /* public function fetchActiveSingleOders($uid){

        $sql = "SELECT SUM(amount) AS Total FROM orders WHERE uid = :uid AND status == 1";
        $stmt = $this->connection->prepare($sql);
        $stmt->execute([':uid'=>$uid]);
        $activeOrders = $stmt->fetch(PDO::FETCH_ASSOC);

        return $activeOrders['Total'];
     } */


}


?>
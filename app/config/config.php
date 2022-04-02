<?php 

class Database{

    const USERNAME = 'info@bitmexxtrade.com';
    const PASSWORD = 'EhLq^fZYj_-^';
    
    private $dsn = "mysql:host=localhost;dbname=axjfinmr_bitmex";
    private $dbuser = "axjfinmr_bitmexAdmin";
    private $dbpass = "(y-!x@OS,~%(";

    public $connection;

    public function __construct(){
        try{
            $this->connection = new PDO($this->dsn,$this->dbuser,$this->dbpass);
        
        }catch(PDOException $e){
            echo 'Error : '.$e->getMessage();
        }
        return $this->connection;
    }

    
        // Check For Inputs
    public function checkInput($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    
    // Display Error Message 
        public function showMessage($type, $message){
            return '<div class="alert alert-'.$type.' alert-dismissable">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <strong class="text-center">'.$message.'</strong>
            </div>';
        }
    
    }

?>
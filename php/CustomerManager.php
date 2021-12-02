<?php 
class CustomerManager{
    private $host;
    private $username;
    private $password;
    private $dbname;

    private $conn;

    function __construct(){        
        $this->host = 'localhost';
        $this->username = 'owner';
        $this->password = 'password123';
        $this->dbname = 'kishklothing';


        $this->conn = new PDO("mysql:host=$this->host;dbname=$this->dbname;charset=utf8mb4", $this->username, $this->password);
    }
    function sendtoDB($customer){
        try{
            $name = $customer->getName();
            $measure = $customer->getMeasurement();
            $phone = $customer->getPhoneNum();
            $query1 = $this->conn->exec("INSERT INTO Customer (cusName, contactNumber, measurement) 
                                VALUES ({$name},'{$phone}', '{$measure}')");
            
        }catch(Exception $e){
            echo $e->msgfmt_format_message;
        }
    }

    function getCustFromDB($name){
        $sth = $this->conn->query("SELECT * FROM Customer WHERE Customer.cusName = $name");
        $person = $sth->fetchAll(PDO::FETCH_ASSOC);
        return $person;
    }
}
?>
<?php 
class UserManager{
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
    function getfromDB($username){
        try{
            $query = $this->conn->query("SELECT * FROM User WHERE usern = '$username';");
            $results = $query->fetchAll(PDO::FETCH_ASSOC);
            if($results == null){
                return null;
            }else{
                return $results;
            }
        }catch(Exception $e){
            echo $e->msgfmt_format_message;
        } 
    }
}
?>
<?php 

Class InventoryManager{
    private $host;
    private $username;
    private $password;
    private $dbname;
    private $conn;


    //Constructor
    function __construct(){        
        $this->host = 'localhost';
        $this->username = 'owner';
        $this->password = 'password123';
        $this->dbname = 'kishklothing';

        $this->conn = new PDO("mysql:host=$this->host;dbname=$this->dbname;charset=utf8mb4", $this->username, $this->password);
    }

    function addMaterialintoDB($material){
        try{
            $insert = $this->conn->query("INSERT INTO Materials Values ($material)");
            $results = $insert->fetchAll(PDO::FETCH_ASSOC);
            if($results == null){
                return null;
            }else{
                return $results;
            }
        }catch(Exception $e){
            echo 'error';
        } 
    }

    function updateMaterialfromDB($quantity){
        try{
            // $update = $this->conn->query("UPDATE Materials SET Quantity=$quantity WHERE matName = '$material'");
            $update = $this->conn->query("DELETE FROM Materials WHERE quantity=$quantity");
            $results = $update->fetchAll(PDO::FETCH_ASSOC);
            if($results == null){
                return null;
            }else{
                return $results;
            }
        }catch(Exception $e){
            echo 'error';
        } 
    }

}
?>
<?php
// namespace config;
class User{
    //Properties
    private $usern;
    private $password;


    //Constructor 
    function __construct($name, $pass){
        $this->usern = $name;
        $this->password = $pass;
    }

    public function getUsername(){
        return $this->usern;
    }

    public function getPassword(){
        return $this->password;
    }

    public function setUname($name){
        $this->usern = $name;
    }

    public function setPassword($pass){
        $this->password = $pass;
    }
}
?> 
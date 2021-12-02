<?php

include_once 'User.php';
include_once 'UserManager.php';

class Authorize{
    private $userMng;

    function __construct(){
        $this->userMng = new UserManager();
    }
    
    //methods
    public function returnUser(string $usern, string $password){
        $myuser = $this->userMng->getfromDB($usern);
        if($myuser == null){           
            return null;
        }else{
            for($i = 0; $i < sizeof($myuser); $i++){
                if($myuser[$i]['usern'] === $usern && password_verify( $password, $myuser[$i]['password'])){
                    return new User($myuser[$i]['usern'],$myuser[$i]['password'], $myuser[$i]['usern']);
                }
            }
        }
    }

    public function checkUser(string $usern){
        $myuser = $this->userMng->getfromDB($usern);
        if($myuser == null){           
            return null;
        }else{
            for($i = 0; $i < sizeof($myuser); $i++){
                if($myuser[$i]['usern'] === $usern){
                    return "There exists";
                }
            }
        }
        return "There does not exist";
    }

    public function getuserMng(){
        return $this->userMng;
    }

}


?>
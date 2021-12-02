<?php

require_once 'customer.php';
require_once 'User.php';
require_once 'Authorize.php';
require_once 'InventoryManager.php';
require_once 'CustomerManager.php';


class UIHandler{
    function login($username,$password){
        $authorize = new Authorize();
        try{
            $user = $authorize->returnUser($username, $password);
            if($user == null){
                return null;
            }else{
                return $user;
            }
        }catch(Exception $e){
            return $e;
        }
    }
    function createSerStatus($status){
        $head = "<section class={$status}><h2>{$status}</h2>";
        $end = "</section>";
        foreach($status as $row){
            $status = $row->getStatus();
            if($status == "Complete"){
                $status = "Complete";
            }else if($status == "Cancel"){
                $status = "Cancelled";
            }else{
                $status = "In progress";
            }
            $className = "S".strval($row->getStatus());
            $current = "<div class={$className}><p>Status: {$row->getStatus()}</p><p> Status: {$status}</p>";
            $current .= "<button class='complete' value={$row->getStatus()}>Mark as Complete</button><button class='cancel' value={$row->getStatus()}>Mark as Cancelled</button><hr></div>";
            $head .= $current;
        }
        $head .= $end;
        return $head;
    }

    function buildSerStatusTable($list){
        $head = "<table><tr><th>Service Status</th>";
        $end = "</table>";
        foreach($list as $row){
            $current = "<tr><td>{$row->getStatus()}</td></tr>";
            $head .= $current;
        }
        $head .= $end;
        return $head;
    }
    function buildCustomerTable($list){
        $head = "<table><tr><th>Name</th><th>Phone Number</th><th>Measurement</th></tr>";
        $end = "</table>";
        foreach($list as $row){
            $current = "<tr><td>{$row->getCustFromDB()}</td><td>{$row->getPhoneNum()}</td><td>{$row->getMeasurement()}</td>{$customer}</td>";
            $head .= $current;
        }
        $head .= $end;
        return $head;
    }
    function getCustomers(){
        try{
            $manager = new CustomerManager();
            $cstmr = $manager->getCustFromDB($name);
            $custm = $this->buildCustomerTable($cstmr);
            return $custm;
        }catch(Exception $e){
            return $e;
        }
    }


    //Adding Material to DB
    function addMaterial($matName){
        $manager = new InventoryManager();
        $result = $manager->addMaterialintoDB($matName);
        return $result;
    }

    //Deleting Item from DB
    function deleteItem($matName){
        $manager = new InventoryManager();
        $result = $manager->updateMaterialfromDB($matName);
        return $result;
    }
}
?>

<?php
    //MAIN
    session_start();
    if($_SERVER['REQUEST_METHOD'] == 'GET'){
        $handler = new UIHandler();
        $query_typ = filter_var($_GET['action'], FILTER_SANITIZE_STRING);
        $username;
        $password;
        $name;
        $phone;
        $measure; 
        $material; 

        //below this need fi do

        $regtest = "/^[0-9a-zA-Z]+$/";
        $usr_regex = "/^(?=[a-zA-Z0-9._]{6,20}$)(?!.*[_.]{2})[^_.].*[^_.]$/";
        $eregtest = "/.{1,}@[^.]{1,}/";
        $nregtest = "/^[A-Za-z.\s-]+$/";
        $tregtest = "/^[0-9]*$/";
        $fregtest = "/^[-+]?[0-9]*\.?[0-9]+$/";
        switch($query_typ){
            case 'login':           
                try{
                    $clean_uname = filter_var($_GET['uname'], FILTER_SANITIZE_STRING);
                    $clean_pswrd = filter_var($_GET['pwrd'], FILTER_SANITIZE_STRING);
                    if (empty($clean_uname) || !preg_match ($usr_regex, $clean_uname)){
                        echo "Username Invalid";
                    }else{
                        $uname = strval($clean_uname);
                    }

                    if (empty($clean_pswrd) || !preg_match ($regtest, $clean_pswrd)){
                        echo "Password Invalid";
                    }else{
                        $pwd = strval($clean_pswrd);
                    }
                    if(isset($uname) && isset($pwd)){
                        $user = $handler->login($uname, $pwd);
                        // $_SESSION['username'] = $user->getUname();
                        if($user === null){
                            echo "NO MATCH";
                        }else{
                            $type = $user->getType();
                            $_SESSION['username'] = $user->getUname();
                            $_SESSION['userid'] = $user->getID();
                            $_SESSION['logged-in'] = true;
                            $_SESSION['type'] = $type;
                            if ($type === "owner"){
                                echo "owner";
                                $cust = 0;
                            }else if ($type === "emp1"){
                                echo "emp1";
                            }else if ($type === "emp2"){
                                echo "emp2";
                            }
                        }
                    }
                    exit();
                }catch(Exception $e){

                }
                break;
            
            case 'logout':
                session_unset();
                session_destroy();
                exit();
                break;

            
            case 'getmenu':
                try{
                    $result = $handler->getmenu();
                    if($result == null){
                        echo "No items available";
                    }else{
                        echo $result;
                    }
                    exit();
                }catch(Exception $e){
                    //Thrown exception
                }
                break;

            
            
            case 'processorder':
                try{
                    if(isset($_SESSION['logged-in'])){
                        if(isset($_GET['complete']) && $_SESSION['type'] == "S"){
                            $result = $handler->processorder($_GET['complete'], "complete");
                            echo $result;
                        }else if(isset($_GET['cancel'])){
                            $result = $handler->processorder($_GET['cancel'], "cancel");
                            echo $result;
                        }
                    }
                    exit();
                }catch(Exception $e){
                    //Thrown exception
                }
                exit();
                break;
            
            case 'confirmorder':
                try{
                    if(isset($_SESSION['userid'])){
                        $result = $handler->confirmorder($_SESSION['userid']);
                        echo $result;
                    }
                    exit();
                }catch(Exception $e){
                    //Thrown exception
                }
                exit();
                break;
            
        
        // Menu Management 
            //Getting Items from DB
            case 'getitems':
                try{
                    if(isset($_SESSION['logged-in'])){
                        if($_SESSION['type'] == "M"){
                            $result = $handler->getitems();
                            if($result == null){
                                echo "<h2>No Items Available<h2>";
                            }else{
                                echo $result;
                            }
                        }
                    }
                    exit();
                }catch(Exception $e){
                    //Thrown exception
                }
                break;
            //Getting Form
            case 'getform':
                try{
                    if(isset($_SESSION['logged-in'])){
                        if($_SESSION['type'] == "M"){
                            $result = $handler->getform($_GET['type']);
                            if($result == null){
                                echo "<h2>SERVER ERROR</h2>";
                            }else{
                                echo $result;
                            }
                        }
                    }
                    exit();
                }catch(Exception $e){
                    //Thrown exception
                }
                break;
            //Adding Item to DB
            case 'modifyitem':
                try{
                    if(isset($_SESSION['logged-in'])){
                        if($_GET['operate'] == "add"){
                            $array = explode("|", $_GET['data']);
                            $name;
                            $desc;
                            $tag;
                            $price;
                            $clean_name = filter_var($array[0], FILTER_SANITIZE_STRING);
                            $clean_desc = filter_var($array[1], FILTER_SANITIZE_STRING);
                            $clean_tag = filter_var($array[2], FILTER_SANITIZE_STRING);
                            $clean_price = filter_var($array[3], FILTER_SANITIZE_NUMBER_FLOAT);
                            //Name Validation
                            if (empty($clean_name) || !preg_match ($nregtest, $clean_name)){
                                echo "Name Invalid";
                            }else{
                                $name = strval($clean_name);
                            }
                            //Description Validation
                            if (empty($clean_desc) || !preg_match ($nregtest, $clean_desc)){
                                echo "Description Invalid";
                            }else{
                                $desc = strval($clean_desc);
                            }
                            //Tag Validation
                            if (empty($clean_tag) || !preg_match ($nregtest, $clean_tag)){
                                echo "Tag Invalid";
                            }else{
                                $tag = strval($clean_tag);
                            }
                            //Price Validation
                            if (empty($clean_price) || !preg_match ($fregtest, $clean_price)){
                                echo "Price Invalid";
                            }else{
                                $price = strval($clean_price);
                            }

                            //Add Item to Database
                            if(isset($name) && isset($desc) && isset($tag) && isset($price)){
                                $addmsg = $handler->addItem($name, $desc, $tag, $price);
                                echo $addmsg;
                            }
                        }else if($_GET['operate'] == "delete"){
                            try{
                                $id;
                                $clean_id = filter_var($_GET['data'], FILTER_SANITIZE_NUMBER_INT);
                                //id Validation
                                if (empty($clean_id) || !preg_match ($tregtest, $clean_id)){
                                    echo "ID Invalid";
                                }else{
                                    $id = intval($clean_id);
                                }
                                if(isset($id)){
                                    $report = $handler->deleteItem($id);
                                    echo $report;
                                }
                                exit();
                            }catch(Exception $e){
                                //Throw Exception
                            }
                        }
                    }
                    exit();
                }catch(Exception $e){
                    //Throw Exception
                }
                break;



            
            default:
                exit();
                break;

        }
    }
?>
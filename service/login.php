<?php 

namespace service;
use data\login as DataLogin;
class login { 
    function get(){
        include_once('../data/login.php');        
        $login_d = new DataLogin;
        var_dump($_GET);
        $data = $login_d->get($_GET['user_name'], $_GET['pass_word'], 'encrpt_key'); // key will get from a file or from a database
        return json_encode($data);
    }    
}
?>
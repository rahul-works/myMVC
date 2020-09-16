<?php 

namespace service;
use data\login as DataLogin;
class login { 
    function get(){
        include_once('../data/login.php');        
        $login_d = new DataLogin;
        $data = $login_d->get('rahul.thakur9985@gmail.com', '111111', 'encrpt_key');
        return json_encode($data);
    }    
}
?>
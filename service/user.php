<?php 

namespace service;
use data\user as DataUser;
class user { 
    function get(){
        include_once('../data/user.php');        
        $user_d = new DataUser;
        $data = $user_d->get($_GET['email'], $_GET['password'], 'encrpt_key'); // key will get from a file or from a database
        return json_encode($data);
    }    

    function create_user() {
        include_once('../data/user.php');        
        $user_d = new DataUser;
        $data = $user_d->post($_POST['email'], $_POST['password'], 'encrpt_key'); // key will get from a file or from a database
        return json_encode($data);
    }
}
?>
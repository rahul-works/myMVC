<?php

require_once (__DIR__ .'/../vendor/autoload.php');

/*
 * @File : loginS.php
 * @Class : Login
 * @Description: Service file for login
 * @Created:    01.12.2020
 */
class LoginS {
    
    public function __construct() {}
    
    public function __destruct() {}
    
    public function get() {
        
    }

    public function post() {
        $email      = $_POST['email'];
        $password   = $_POST['password'];
        $login_r = new UserR();
        $result = $login_r->get($email, $password);
        if(isset($_POST['action']) && $_POST['action'] === 'service') {
            if(isset($result) && !empty($result)) {
                echo '1';
            } else {
                echo '0';
            }
            die;
        } 
        return $result;
    }
}
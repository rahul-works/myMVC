<?php
/**
 * @File : User.php Controller
 * @Class : User
 * @Date : 21 Jan 2021
 * @Description	: Login module operations
*/
require_once (__DIR__ .'/../vendor/autoload.php');
class User {
    
    public function __construct() {}
    
    public function __destruct() {}

    public function index() {
        $contentView = new View('./Views/User/Signin');
        echo $contentView->render();
    }
    
    public function signin(){
        $login_s = new LoginS();
        $output = $login_s->post();
        if(isset($output) && !empty($output)) {
            $_SESSION['company_id'] = $output[0]['id'];
            header('Location: /equity'); exit;
        } else {
            header('Location: /?error=1&flag=1'); exit;
        }
    }
    
    public function signinout() {
        session_destroy();
        header('Location: /'); exit;
    }
    
}
?>
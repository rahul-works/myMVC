<?php
/**
 * @File : Login.php Controller
 * @Class : Controller_Login
 * @Date : 21 Jan 2021
 * @Description	: Login module operations
*/
require_once (__DIR__ .'/../vendor/autoload.php');
class Login {
    
    public function __construct() {}
    
    public function __destruct() {}

    public function index() {
        // $contentView = new View('./Views/Login/Login');
        // $templateView = new View('./Views/Template/Login');
        // $templateView->content = $contentView->render();
        // echo $templateView->render();
    }
    
    public function post(){
        // $login_s = new LoginS();
        // $output = $login_s->post();
        // if(isset($output) && !empty($output)) {
        //     $_SESSION['company_id'] = $output[0]['id'];
        //     header('Location: /equity'); exit;
        // } else {
        //     header('Location: /?error=1&flag=1'); exit;
        // }
    }
    
    public function logout() {
        session_destroy();
        header('Location: /'); exit;
    }
    
}
?>


<?php

use service\login as ServiceLogin;

$login = new Login("Login");
if ($_GET['func'] === 'get_name')
    echo $login->get_record(); 

class Login {
    public $name;

    function __construct($name) {
        $this->name = $name;
    }

    function get_record() {
        include_once('../service/login.php');
        $login_service = new ServiceLogin();
        $records = $login_service->get_service();
        ob_start();
        include_once("../view/login.php");
        ob_end_flush();
    }
}


?>
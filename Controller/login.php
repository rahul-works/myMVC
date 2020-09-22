

<?php

use service\login as ServiceLogin;

$login = new Login("Login");
echo $_SERVER['REQUEST_METHOD']; 
//Switch statement
switch ($_SERVER['REQUEST_METHOD']) {
    case 'POST': // create
      break;
    case 'PUT': // update
      break;
    case 'GET': // read
        if ($_GET['func'] === 'record')
           $login->record(); 
    
        if (!isset($_GET['func'])) {
            $login->get(); 
        }
      break;
    case 'DELETE': // remove
      break;
    default:
        $login->get(); 
      break;
}




class Login {
    public $name;

    function __construct($name) {
        $this->name = $name;
    }

    function get() {
        ob_start();
        include_once("../view/login.php");
        ob_end_flush();
    }

    function record() { 
        // library 
        require_once('../library/Date_format.php');
        $date_format = new date_format();
        echo $date_format->get_formatted_date(date("Y/m/d"));
        echo '<br />';
        // service
        include_once('../service/login.php');
        $login_service = new ServiceLogin();
        $records = $login_service->get();
        print_r($records);
        die;
    }
}


?>
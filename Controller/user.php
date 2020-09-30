

<?php

use service\user as ServiceUser;

$user = new User("user");
switch ($_SERVER['REQUEST_METHOD']) {
    case 'POST': // create
      print_r($_POST);
      if ($_POST['func'] === 'signup')
           $user->signup(); 
      break;
    case 'PUT': // update
      break;
    case 'GET': // read
        if ($_GET['func'] === 'record')
           $user->record(); 
    
        if (!isset($_GET['func'])) {
            $user->get(); 
        }
      break;
    case 'DELETE': // remove
      break;
    default:
        $user->get(); 
      break;
}

class User {
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
        // require_once('../library/Date_format.php');
        // $date_format = new date_format();
        // echo $date_format->get_formatted_date(date("Y/m/d"));
        // echo '<br />';
        // service
        include_once('../service/user.php');
        $user_service = new ServiceUser();
        $record = $user_service->get();
        
        echo $record;
        die;
    }

    function signup() {
      include_once('../service/user.php');
      $user_service = new ServiceUser();
      $user_service->create_user();
    }
}


?>
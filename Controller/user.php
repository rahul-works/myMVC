

<?php

use service\user as ServiceUser;

// ini_set("error_reporting", E_ALL | E_STRICT); // this is for warning 
// ini_set('display_startup_errors',1); 
ini_set('display_errors',1); // this is working 
// error_reporting(-1);
// try {
//   echo $a;
// } catch (Exception $e) {
//   print_r($e);
//   print_r(debug_backtrace());
// }

// die;
$user = new User("user");
switch ($_SERVER['REQUEST_METHOD']) {
    case 'POST': // create
      if ($_GET['func'] === 'signup')
           $user->signup(); 
      break;
    case 'PUT': // update
      break;
    case 'GET': // read
        if ($_GET['func'] === 'record'){
           $user->record(); 
        } else if ($_GET['func'] === 'view'){
          $user->view(); 
        }       
    
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
        var_dump($_GET);
        $record = $user_service->get();
        
        echo $record;
        die;
    }

    function signup() {
      try {
        include_once('../service/user.php');
        $user_service = new ServiceUser();
        $create_user_response = $user_service->create_user();
        var_dump(json_decode($create_user_response));
        var_dump($create_user_response == "inserted");
        if (json_decode($create_user_response) == "inserted") {
          // email to the email id 
          $link = 'http://localhost/user/activate/'.$_POST['email'];
          echo $link;
          mail($_POST['email'], 'Activate Email', $link);
          $create_user_response = 'active_user';
        }
        echo $link;
        echo $create_user_response; 
      } catch (Exception $e) {
        throw $e;
      }      
    }

    function view() {
      try {

      // include_once('../core/template/view.php');
      // $view = new view('../view/data.php');
      // $view->name = 'Afflicto';
      // $view->bio = "I'm a geek.";
      // $view->age = 23;
      // $head = new view('../view/header.php');
      // $head->h1 = 'heading';
      // $view->header = $head->render();
      // $view->footer = (new view('../view/footer.php'))->render();
      // echo $view->render();
      var_dump($_GET);
      } catch( Exception $e) {
        echo '<pre>';
        print_r($e);
        print_r(debug_backtrace());
    }
      
      
    }
}


?>
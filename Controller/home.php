
<?php

$home = new Home("Home");
switch ($_SERVER['REQUEST_METHOD']) {
    case 'POST': // create
      break;
    case 'PUT': // update
      break;
    case 'GET': // read
        if ($_GET['func'] === 'record')
           $home->record(); 
    
        if (!isset($_GET['func'])) {
            $home->get(); 
        }
      break;
    case 'DELETE': // remove
      break;
    default:
        $home->get(); 
      break;
}


class Home {
    public $name;

    function __construct($name) {
        $this->name = $name;
    }

    function get() {
        echo 'Home Screen';
    }

    function record() {
        echo 'Home Screen';
    }
    
}
?>
<?php 

require_once './Library/Router.php';
define('BASEPATH','/');

/*
class: Login
function: post
method: Post
params: None
*/
Router::add('/login', function() {
    if(isset($_POST['action']) && $_POST['action'] === 'service') {
        include_once('Service/Login.php');
        $object = new login;
    } else {
        include_once('Controller/Login.php');
        $object = new login;
    }
    $object->post();
}, 'POST');

/*
class: Login
function: post
method: Post
params: None
*/
Router::add('/logout', function() {
    include_once('Controller/Login.php');
    $object = new login;
    $object->logout();
}, 'GET');

/*
class: Any
function: index
method: Get
params: None
*/
Router::add('/([a-z-0-9-_]*)', function($class) {
    if(empty($class)) { // Default Route
        $class = 'Login';
    }
    include_once('Controller/'.$class.'.php');
    $object = new $class;
    $object->index();
}, 'GET');

/*
class: Any
function: Any
method: Get/POST/PUT/DELETE
params: param1
*/

Router::add('/([a-z-0-9-_]*)/([a-z-0-9-]*)', function($class, $param1) {
    include_once('Controller/'.$class.'.php');
    $object = new $class;
    $object->$param1();
}, 'GET');

Router::add('/([a-z-0-9-_]*)/([a-z-0-9-]*)', function($class, $param1) {
    include_once('Controller/'.$class.'.php');
    $object = new $class;
    $object->$param1();
}, 'POST');

Router::add('/([a-z-0-9-_]*)/([a-z-0-9-]*)', function($class, $param1) {
    include_once('Controller/'.$class.'.php');
    $object = new $class;
    $object->update();
}, 'PUT');

Router::add('/([a-z-0-9-_]*)/([a-z-0-9-]*)', function($class, $param1) {
    include_once('Controller/'.$class.'.php');
    $object = new $class;
    $object->delete();
}, 'DELETE');

/* For service and controller */
Router::add('/([a-z-0-9-_]*)/([a-z-0-9-]*)/([a-z-0-9-_]*)', function($class, $param1, $param2) {
    if ($class == 'api') { // param1 - file name, param2 - funciton name 
        include_once('Service/'.$param1.'.php');
        $object = new $param1;
        $object->$param2();
    } else { // class - file name, param1 - function, param2 - inline parameter
        include_once('Controller/'.$class.'.php');
        $object = new $class;
        $object->$param1($param2);
    }
}, 'GET');


// Add a 404 not found route
Router::pathNotFound(function($path) {
  // Do not forget to send a status header back to the client
  // The router will not send any headers by default
  // So you will have the full flexibility to handle this case
  header('HTTP/1.0 404 Not Found');

  echo 'Error 404 <br/>';
  echo 'The requested path "'.$path.'" was not found!';
});

// Add a 405 method not allowed route
Router::methodNotAllowed(function($path, $method) {
  // Do not forget to send a status header back to the client
  // The router will not send any headers by default
  // So you will have the full flexibility to handle this case
  header('HTTP/1.0 405 Method Not Allowed');

  echo 'Error 405 <br/>';
  echo 'The requested path "'.$path.'" exists. But the request method "'.$method.'" is not allowed on this path!';
});

// Run the Router with the given Basepath
Router::run(BASEPATH);

// Enable case sensitive mode, trailing slashes and multi match mode by setting the params to true
//Router::run(BASEPATH, true, true, true);
?>
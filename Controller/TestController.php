<?php 

require_once '../Service/TestService.php';

function get_data(){
    $records = get_service();
    ob_start();
    include_once("../Views/Sample.php");    
    ob_end_flush();
}

$functions = $arr = get_defined_functions()['user']; 

if(!empty($_GET['function']) && in_array($_GET['function'], $functions)) {
    $func = $_GET['function'];
    $func();
}

?>
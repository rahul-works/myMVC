<?php 

namespace service;
class login { 
    function get_service(){
        $data = array();
        $data['id'] = 999;
        $data['status'] = '1';
        $data['sync_status'] = '1';
        $data['customer_id'] = 55555;
        //echo json_encode($data); die;
        return $data;
    }    
}

function get_service(){
    $data = array();
    $data['id'] = 999;
    $data['status'] = '1';
    $data['sync_status'] = '1';
    $data['customer_id'] = 55555;
    //echo json_encode($data); die;
    return $data;
}

$functions = $arr = get_defined_functions()['user']; 

if(!empty($_GET['function']) && in_array($_GET['function'], $functions)) {
    $func = $_GET['function'];
    $func();
}

?>